document.querySelector(".btnRes").addEventListener("click", restorePass);

function restorePass(ev){
    const mail = document.querySelector(".mail").value;
    let pCol = document.querySelectorAll("p");

    for(let i = 0; i < pCol.length; i++){
        pCol[i].remove();
    }



    if(checkMail(mail)){
        return true;
    }else{
        ev.preventDefault();
            let err2 = document.createElement('p');
            err2.innerHTML = "Введен не корректно e-mail!";
            document.querySelector("form").appendChild(err2);
    }
}

function checkMail(b){
    if(/(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6})/.test(b)){
        return true;
    }else return false;
    
}
