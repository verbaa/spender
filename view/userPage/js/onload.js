class Onload{
    constructor(){
        this.fetchInit = {
            'method' : 'GET',
            'headers' : new Headers(),
            'mode' : 'cors',
            'cache' : 'default'
        };
        document.addEventListener('DOMContentLoaded', this.loaded.bind(this));
    }
    loaded(){
        let loadUrl = "/product/load?action=load&login=" + document.querySelector(".userName").innerHTML;

        fetch(loadUrl, this.fetchInit)
                .then(function (respo){ return respo.json();})
                .then(function(d){
                    Onload.bigFunc(d);
                    Onload.creatExp(d);
                    Onload.addEvent();
                });
    }

    static yearInfo(d){
        let ans = 0;
        for(let e = 0; e < d[0].length; e++){
            ans += d[0][e][5] * 1;
        }
        document.querySelector('.resultYear h3').innerHTML = "Итого за год: " + ans + " грн.";
    }

    static addEvent(){
        let del = new DelData();
        let edit = new EditData();
        let set = new SetData();
        let exit = new Exit();
        const checkboxAll = document.querySelectorAll('.checkbox');
        const editButtonAll = document.querySelectorAll('button.edit');
        const deletButtonAll = document.querySelectorAll('button.delete');
    
        for(let i = 0; i < checkboxAll.length; i++){
            checkboxAll[i].addEventListener('change', toggleTodoItem); 
            editButtonAll[i].addEventListener('click', editTodoItem); 
            deletButtonAll[i].addEventListener('click', deleteTodoItem); 
        }
    }

    static remItem(ev){
        let idItem  = ev.target.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerHTML,
            sum     = ev.target.previousSibling.innerHTML,
            cat     = ev.target.previousSibling.previousSibling.innerHTML,
            nam     = ev.target.previousSibling.previousSibling.previousSibling.innerHTML,
            liCollection = document.querySelectorAll(".todo-item"),
            checkCollection = document.querySelectorAll(".checkbox"),
            titleColection = document.querySelectorAll(".title"),
            sumColection =  document.querySelectorAll(".titleSum");

        let urldel2 = "/product/del?action=delItem&id=" + idItem + "&login=" + document.querySelector(".userName").innerHTML;
        if(cat == "Регулярные платежи"){
            for(let v = 0 ; v < liCollection.length; v++){
                if(titleColection[v].innerHTML == nam && sumColection[v].innerHTML == sum){
                    liCollection[v].classList.toggle("completed");
                    checkCollection[v].checked = false;
                }
            }
        }
        fetch(urldel2, this.fetchInit)
            .then(function (respo){return respo.json();})
                .then(function(data){
                    Onload.bigFunc(data);
                })
    }
    
    static creatTable(data){
            let trCount = data[0].length,
            row = "",
            collumn = "",
            table = document.querySelector(".dataTable tbody");
    
        for(let tr = 0; tr < trCount; tr++){
            row = document.createElement('tr');
            for(let td = 0; td < 6; td++){
                if(td != 1){
                    collumn = document.createElement('td');
                    collumn.innerHTML = data[0][tr][td];
                    row.appendChild(collumn);
                }
            }
            collumn = document.createElement('td');
            collumn.innerHTML = "-";
            collumn.classList.add("del-item");
            collumn.addEventListener("click", Onload.remItem);
            row.appendChild(collumn);
            table.appendChild(row);
        }
    };
    static creatExp(data){
    
        let ul = document.querySelector("#todo-list"),
            li = "",
            inpCheck = "",
            labHid = "",
            labTit = "",
            labSum = "",
            inpText = "",
            inpNum = "",
            butEd = "",
            butDel = "";
    
            for (let j = 0; j < data[1].length; j++){
                li = document.createElement("li");
                li.className = "todo-item";
                inpCheck = document.createElement("input");
                inpCheck.type = "checkbox";
                inpCheck.className = "checkbox";
                labHid = document.createElement("label");
                labHid.className = "hide";
                labHid.innerHTML = data[1][j][0];
                labTit = document.createElement("label");
                labTit.className = "title";
                labTit.innerHTML = data[1][j][2];
                labSum = document.createElement("label");
                labSum.className = "titleSum";
                labSum.innerHTML = data[1][j][3];
                inpText = document.createElement("input");
                inpText.type = "text";
                inpText.className = "textfield";
                inpNum = document.createElement("input");
                inpNum.type = "number";
                inpNum.className = "numfield";
                butEd = document.createElement("button");
                butEd.className = "edit";
                butEd.innerHTML = "Изменить";
                butDel = document.createElement("button");
                butDel.className = "delete";
                butDel.innerHTML = "Удалить";

                for(let k = 0; k < data[0].length; k++){
                    if(data[1][j][1] == data[0][k][1] && data[1][j][2] == data[0][k][3] && data[1][j][3] == data[0][k][5] && "Регулярные платежи" == data[0][k][4]){
                        li.classList.add("completed");
                        inpCheck.checked = 'true';
                        butEd.disabled = true;
                        butDel.disabled = true;
                    }
                }
                li.appendChild(inpCheck);
                li.appendChild(labHid);
                li.appendChild(labTit);
                li.appendChild(labSum);
                li.appendChild(inpText);
                li.appendChild(inpNum);
                li.appendChild(butEd);
                li.appendChild(butDel);
                ul.appendChild(li);
            }
    };
    
    static loadGraf(d){
        let ctgr = [],
            total = [],
            res = 0,
            proc = [],
            data = [];
        
        for(var i = 0; i < d.length; i++){
    
            if(ctgr.indexOf(d[i][4]) == (-1)){
                ctgr.push(d[i][4]);
                total.push(Number(d[i][5]));
            }else{
                total[ctgr.indexOf(d[i][4])] += Number(d[i][5]);
            }
    
        }
        
        if(total.length != 0){
            res = total.reduce(function(sum, current) {
                return sum + current
            });
        }else{
            res = 0;
        } 
        for(var h = 0; h < total.length; h++){
            proc.push(total[h] / (res / 100));
        }
        for(var j = 0; j < proc.length; j++){
            data.push({"label" : ctgr[j], "value" : proc[j]})
        }
        document.querySelector('.resultMonth h3').innerHTML = "Итого за месяц: " + res + " грн.";
        return data;
    }


    static bigFunc(data){

        Onload.yearInfo(data);

        let temporal = [],
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

        for(let q = 0; q < data[0].length; q++){
            temporal = data[0][q][2].split("-");
            if(temporal[1] != month){
                data[0].splice(q, 1);
                q--
            }
        }
        SetMonth.clearTable();
        Onload.creatTable(data);

        const dataSource = {
            chart: {
                caption: "",
                subcaption: "Процентное соотношение затрат за месяц",
                showvalues: "1",
                showpercentintooltip: "0",
                numberprefix: "%",
                enablemultislicing: "1",
                theme: "candy"
            },
            data: Onload.loadGraf(data[0])
        };

        FusionCharts.ready(function() {
            var myChart = new FusionCharts({
                type: "pie3d",
                renderAt: "chart-container",
                width: "100%",
                height: "100%",
                dataFormat: "json",
                dataSource
                }).render();
            });  
    }
}

let onload = new Onload();

