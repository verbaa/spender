class DelData{
    constructor(){
        this.todoDel = document.querySelectorAll(".delete");
        this.lenTodo = document.querySelectorAll(".delete").length;
        this.removeItemAll = document.querySelectorAll('.del-item');

        this.fetchInit = {
            'method' : 'GET',
            'headers' : new Headers(),
            'mode' : 'cors',
            'cache' : 'default'
        };

        for(let i = 0; i < this.lenTodo; i++){
            this.todoDel[i].addEventListener("click", this.delTodo.bind(this));
        }
    }

    delTodo(ev){
        let id = ev.target.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML,
        urldel = "";

        urldel = "/product/del?action=delReg&id=" + id;
        fetch(urldel, this.fetchInit).then((respo) => console.log(respo.text()));
    }
}
