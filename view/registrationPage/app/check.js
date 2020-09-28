document.querySelector(".btn").addEventListener("click", checkForm);

function checkForm(ev){
    const name = document.querySelector(".log").value;
    const mail = document.querySelector(".mail").value;
    const passFirst = document.querySelector(".pass").value;
    const passSecond = document.querySelector(".pass2").value;
    let pCol = document.querySelectorAll("p");

    for(let i = 0; i < pCol.length; i++){
        pCol[i].remove();
    }



    if(checkLogin(name) && checkMail(mail) && checkPass(passFirst, passSecond)){
        return true;
    }else{
        ev.preventDefault();

        if(!checkLogin(name)){
            let err1 = document.createElement('p');
            err1.innerHTML = "Логин введен не верно!";
            document.querySelector("form").appendChild(err1);
        }
        if(!checkMail(mail)){
            let err2 = document.createElement('p');
            err2.innerHTML = "Введен не корректно e-mail!";
            document.querySelector("form").appendChild(err2);
        }
    }
}


function checkLogin(a){
    if(/([a-zA-Z_-]+){3,16}/.test(a)){
        return true;
    }else return false;
}

function checkMail(b){
    if(/(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6})/.test(b)){
        return true;
    }else return false;
    
}

function checkPass(c, d){
    if(/((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15})/.test(c)){
        console.log(true)

        if(c == d){
            console.log(true)
            return true;
        }else {
            let err4 = document.createElement('p');
            err4.innerHTML = "Пароли не совпадают";
            document.querySelector("form").appendChild(err4);
            return false;
        }
    }else{
        let err3 = document.createElement('p');
            err3.innerHTML = "Не подходящий пароль";
            document.querySelector("form").appendChild(err3);
        console.log(false)
        return false
    }   
    
}