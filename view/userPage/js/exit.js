class Exit{
    constructor(){
        this.exitButton = document.querySelector(".exit");
        this.fetchInit = {
            'method' : 'GET',
            'headers' : new Headers(),
            'mode' : 'cors',
            'cache' : 'default'
        };

                this.exitButton.addEventListener("click", this.sessionDestroy.bind(this));
    }

    sessionDestroy(){

            let urled = "/user/exit";

            fetch(urled, this.fetchInit).then((respo) => window.location.href = 'http://www.nusa.zzz.com.ua');

    }
}
