document.addEventListener("DOMContentLoaded", getMonthOnSlider);
document.querySelector('.prev').addEventListener("click", goprev);
document.querySelector('.next').addEventListener("click", gonext);

 /* конфигурация */
     var width = 100; // ширина изображения
    var count = ""; // количество изображений

    var carousel = document.getElementById('carousel');
    var list = document.querySelector('.slider ul');
    var listElems = document.querySelectorAll('.slider li');

  for(let h = 0; h < listElems.length; h++){
    listElems[h].addEventListener("click", setMonthOnSlider);
  }



    function setMonthOnSlider(){
      let month = "";
      for(let k = 0; k < listElems.length; k++){
        listElems[k].classList.remove('active');
      }
      this.className = 'active';

      for(let l = 0; l < listElems.length; l++){
        if(listElems[l].classList.contains("active")){
        month = "" + (l + 1) ;
        break;
        }
    }

    if(month.length == 1){
        month = "0" + month;
    }
      let sM = new SetMonth(month);
    }

    function goprev() {
      var position = getComputedStyle(list).marginLeft;
      position = position.substring(0, position.length - 2);
     // сдвиг влево
      // последнее передвижение влево может быть не на 3, а на 2 или 1 элемент
      position = Math.min(position*1 + (width + 4), 0)
      console.log(position);
      list.style.marginLeft = position + 'px';
    };

    function gonext() {
      var position = getComputedStyle(list).marginLeft;
      position = position.substring(0, position.length - 2);
      console.log(position);

      // сдвиг вправо
      // последнее передвижение вправо может быть не на 3, а на 2 или 1 элемент
      position = Math.max(position - (width + 4), -width * (listElems.length - 3) - 35 );
      console.log(position);
      list.style.marginLeft = position + 'px';
    };

    function getMonthOnSlider(){
      let realMonth = new Date().getMonth(),
          monthCollection = document.querySelectorAll(".slider li");

          count = realMonth + 1;

          for(let i = 0; i < monthCollection.length; i++){
            if(i == realMonth){
              monthCollection[i].classList = "active";
            }
          }

          if(realMonth != 0 && realMonth != 11){
            list.style.marginLeft = (0 - (realMonth-1) * (100+4)) + "px";
          }

          if(realMonth == 0){
            list.style.marginLeft = 0 + "px";
          }
          if(realMonth == 11){
            list.style.marginLeft = (-935 + "px");
          }

    }