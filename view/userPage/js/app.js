const todoExp = document.getElementById("todo-form");
const addInput = document.getElementById("add-input");
const addSum = document.getElementById("add-sum");
const todoList = document.getElementById("todo-list");
const todoItems = document.querySelectorAll(".todo-item");

todoExp.addEventListener("submit", addTodoItem);



function addTodoItem(ev){
    ev.preventDefault();
    if(addInput.value == "" || addSum.value == ""){
        return alert("Заполните все поля");
    }
    const todoItem = createTodoItem(addInput.value, addSum.value);
    todoList.appendChild(todoItem);
    addInput.value = "";
    addSum.value = "";
}

function createTodoItem(title, sum){
    const listItem = document.createElement("li");
    listItem.className = "todo-item";

    const checkbox = document.createElement("input");
    checkbox.type = "checkbox";
    checkbox.className = "checkbox";

    const labHide = document.createElement("label");
    labHide.className = "hide";

    const labelOne = document.createElement("label");
    labelOne.innerText = title;
    labelOne.className = "title";

    const labelTwo = document.createElement("label");
    labelTwo.innerText = sum;
    labelTwo.className = "titleSum";

    const editInputOne = document.createElement("input");
    editInputOne.type = "text";
    editInputOne.className = "textfield";

    const editInputTwo = document.createElement("input");
    editInputTwo.type = "number";
    editInputTwo.className = "numfield";

    const editButton = document.createElement("button");
    editButton.innerText = "Изменить";
    editButton.className = "edit";

    const deletButton = document.createElement("button");
    deletButton.innerText = "Удалить";
    deletButton.className = "delete";

    listItem.appendChild(checkbox);
    listItem.appendChild(labHide);
    listItem.appendChild(labelOne);
    listItem.appendChild(labelTwo);
    listItem.appendChild(editInputOne);
    listItem.appendChild(editInputTwo);
    listItem.appendChild(editButton);
    listItem.appendChild(deletButton);

    bindEvent(listItem);

    return listItem;
}


function bindEvent(todoItem){
    const checkbox = todoItem.querySelector('.checkbox');
    const editButton = todoItem.querySelector('button.edit');
    const deletButton = todoItem.querySelector('button.delete');

    checkbox.addEventListener('change', ad); 
    checkbox.addEventListener('change', toggleTodoItem); 

    editButton.addEventListener('click', ed); 
    editButton.addEventListener('click', editTodoItem);
 
    deletButton.addEventListener('click', deleteTodoItem); 
    deletButton.addEventListener('click', de); 
}

function toggleTodoItem(){
    const listItem = this.parentNode;
    listItem.classList.toggle("completed");

    if(this.parentNode.classList.contains("completed")){
        this.parentNode.childNodes[5].disabled = true;
        this.parentNode.childNodes[6].disabled = true;
        this.parentNode.childNodes[7].disabled = true;
    }else{
        this.parentNode.childNodes[5].disabled = false;
        this.parentNode.childNodes[6].disabled = false;
        this.parentNode.childNodes[7].disabled = false;
    }
}
function ed(){
    let id = this.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML,
        fet =  {
            'method' : 'GET',
            'headers' : new Headers(),
            'mode' : 'cors',
            'cache' : 'default'
        },
        val = this.previousSibling.previousSibling.value,
        sum = this.previousSibling.value,
        urled = "";
    urled = "/product/edit?action=edReg&id=" + id + "&val=" + val + "&sum=" + sum;

    if(this.innerHTML == "Сохранить"){
        fetch(urled, fet).then((respo) => console.log(respo.text()));
    }
}
function de(){
    let id = this.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML,
        fet =  {
            'method' : 'GET',
            'headers' : new Headers(),
            'mode' : 'cors',
            'cache' : 'default'
        },
        urldel = "";

    urldel = "/product/del?action=delReg&id=" + id;
    fetch(urldel, fet).then((respo) => console.log(respo.text()));
}

function ad(){
    let val = this.nextSibling.nextSibling.innerHTML,
        sum = this.nextSibling.nextSibling.nextSibling.innerHTML,
        login2 = document.querySelector(".userName").innerHTML,
        urlcheck = "",
        allMonth = document.querySelectorAll(".slider li"),
        month = "";

        for(let k = 0; k < allMonth.length; k++){
            if(allMonth[k].classList.contains("active")){
            month = "" + (k + 1) ;
            break;
            }
        }
        if(month.length == 1){
            month = "0" + month;
        }

    if(!this.parentNode.classList.contains("completed")){
        urlcheck = "/product/add?action=addReg&login=" + login2 + "&val=" + val + "&sum=" + sum + "&month=" + month;
        console.log(urlcheck);

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
function editTodoItem(){
    const listItem = this.parentNode;
    const title = listItem.querySelector(".title");
    const titleSum = listItem.querySelector(".titleSum");
    const editInputText = listItem.querySelector(".textfield");
    const editInputNum = listItem.querySelector(".numfield");
    const isEdit = listItem.classList.contains("editing");

    if(isEdit){
        title.innerText = editInputText.value;
        titleSum.innerText = editInputNum.value;
        this.innerText = "Изменить";
    }else{
        editInputText.value = title.innerText;
        editInputNum.value = titleSum.innerText;
        this.innerText = "Сохранить";
    }
    listItem.classList.toggle("editing");
}

function deleteTodoItem(){
    const listItem = this.parentNode;
    todoList.removeChild(listItem);    
}