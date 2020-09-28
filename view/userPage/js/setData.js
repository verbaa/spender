class SetData{
    constructor(){
        this.addExp = document.querySelector('#add-Exp');
        this.addRegExp = document.querySelector('#add-regExp');
        this.checkAll = document.querySelectorAll('.checkbox');
        this.fetchInit = {
            'method' : 'GET',
            'headers' : new Headers(),
            'mode' : 'cors',
            'cache' : 'default'
        };
       this.addExp.addEventListener('click', this.exp.bind(this));
       this.addRegExp.addEventListener('click', this.regExp.bind(this));

        for(let z = 0; z < this.checkAll.length; z++){
            this.checkAll[z].addEventListener('change', this.addRegInDb.bind(this));
        }
    }
    exp(){
        let product = document.querySelector("#genProduct"),
            sum = document.querySelector("#genSum"),
            category = document.querySelector("#genCategory"),
            login = document.querySelector(".userName").innerHTML,
            allMonth = document.querySelectorAll(".slider li"),
            month = "",
            url = "";

            for(let k = 0; k < allMonth.length; k++){
                if(allMonth[k].classList.contains("active")){
                month = "" + (k + 1) ;
                break;
            }
        }
        if(month.length == 1){
            month = "0" + month;
        }
            url = "/product/add?action=genExp&name=" + login + "&product=" + product.value + "&sum=" + sum.value + "&category=" + category.value + "&month=" + month;
            if(product.value == "" || sum.value == ""){
                alert("Заполните все поля!");
                return false;
            }
            if(category.value == "Выберите каттегорию"){
                alert("Выберите каттегорию");
                return false;
            }
            if(product.value != "" && sum.value != "" && category.value != "Выберите каттегорию"){
                fetch(url, this.fetchInit)
                .then(function (respo){ return respo.json();})
                .then(function(data){
                    Onload.bigFunc(data);
                    product.value = "";
                    sum.value = "";
                })
            } 
            return false;
    }

    regExp(){
        let exp2 = document.querySelector("#add-input").value,
            sum2 = document.querySelector("#add-sum").value,
            login2 = document.querySelector(".userName").innerHTML,
            url2 = "";

        url2 = "/product/add?action=regExp&name=" + login2 + "&product=" + exp2 + "&sum=" + sum2;

        if(exp2 == "" || sum2 == ""){
            alert("Заполните все поля!");
            return false;
        }
        if(exp2 != "" && sum2 != ""){

            fetch(url2, this.fetchInit)
            .then(function (respo){ return respo.json();})
            .then(function(data){
                SetData.creatForm(data);
            })
        }
    }
    addRegInDb(ev){
        let val = ev.target.nextSibling.nextSibling.innerHTML,
            sum = ev.target.nextSibling.nextSibling.nextSibling.innerHTML,
            login2 = document.querySelector(".userName").innerHTML,
            urlcheck = "",
            allMonth = document.querySelectorAll(".slider li"),
            month = "";

            for(let l = 0; l < allMonth.length; l++){
                if(allMonth[l].classList.contains("active")){
                month = "" + (l + 1) ;
                break;
                }
            }
            if(month.length == 1){
                month = "0" + month;
            }

        if(!ev.target.parentNode.classList.contains("completed")){
            urlcheck = "/product/add?action=addReg&login=" + login2 + "&val=" + val + "&sum=" + sum + "&month=" + month;
            fetch(urlcheck, this.fetchInit)
            .then(function (respo){ return respo.json();})
                .then(function(data){
                    Onload.bigFunc(data);
                })
        }else{
            
            urlcheck = "/product/del?action=delRegCost&login=" + login2 + "&val=" + val + "&sum=" + sum + "&month=" + month;
            fetch(urlcheck, this.fetchInit)
            .then(function (respo){return respo.json();})
                .then(function(data){
                    Onload.bigFunc(data);
                })
        }
    }

   
    
    static creatForm(data){
            let colH = document.querySelectorAll(".hide"),
                len = colH.length;
                colH[len-1].innerHTML = data[0][0];
        };
}



