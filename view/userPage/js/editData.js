class EditData{
    constructor(){
        this.todoEdit = document.querySelectorAll(".edit");
        this.passChenge = document.querySelector("#chengePassButton");
        this.lenTodoEdit = document.querySelectorAll(".edit").length;
        this.fetchInit = {
            'method' : 'GET',
            'headers' : new Headers(),
            'mode' : 'cors',
            'cache' : 'default'
        };

        for(let i = 0; i < this.lenTodoEdit; i++){
            this.todoEdit[i].addEventListener("click", this.editTodo.bind(this));
        }

        this.passChenge.addEventListener("click", this.chengePass.bind(this));
    }

    chengePass(ev){
        let oldP = document.querySelector("#oldPass"),
            newP = document.querySelector("#newPass1"),
            newP2 = document.querySelector("#newPass2"),
            user = document.querySelector(".userName").innerHTML,
            err = document.querySelector(".err"),
            url = "";
            err.innerHTML = "";

          
        if(/((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15})/.test(oldP.value)){
            if(/((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15})/.test(newP.value)){
                if(newP.value == newP2.value){
                    url = "/pass/chenge?user=" + user + "&old=" + oldP.value + "&new=" + newP.value;
                    console.log(url);
                    fetch(url, this.fetchInit)
                    .then(function (respo){ return respo.json();})
                    .then(function(data){err.innerHTML = data[0]['name'];});
                    oldP.value = "";
                    newP.value = "";
                    newP2.value = "";
                }else{
                    err.innerHTML = "Пароли не совпадают";
                    return false;
                }
            }else{
                err.innerHTML = "Не подходящий новый пароль \n\r Используйте не менее 8 латинских символов и букв разного регистра";
                return false;
            }
        }else{
            err.innerHTML = "Старый пароль не верный";
            return false;
        }
    }

    editTodo(ev){
        let id = ev.target.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML,
            val = ev.target.previousSibling.previousSibling.value,
            sum = ev.target.previousSibling.value,
            urled = "";
            urled = "/product/edit?action=edReg&id=" + id + "&val=" + val + "&sum=" + sum;

        if(ev.target.innerHTML == "Сохранить"){
            fetch(urled, this.fetchInit).then((respo) => console.log(respo.text()));
        }
    }
}
