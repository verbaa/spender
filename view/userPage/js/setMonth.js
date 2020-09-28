class SetMonth{
    constructor(month){
        this.fetchInit = {
            'method' : 'GET',
            'headers' : new Headers(),
            'mode' : 'cors',
            'cache' : 'default'
        };
        this.month = month;

        this.setNewMonth(this.month);
    }

    setNewMonth(month){
        let loadMonthUrl = "/product/load?action=load&login=" + document.querySelector(".userName").innerHTML;

        fetch(loadMonthUrl, this.fetchInit)
                .then(function (respo){ return respo.json();})
                .then(function(data){

                    Onload.yearInfo(data);

                    let temp = [];

                    for(let w = 0; w < data[0].length; w++){
                        temp = data[0][w][2].split("-");
                        if(temp[1] != month){
                            data[0].splice(w, 1)
                            w--;
                        }
                    }
                    SetMonth.clearTable();
                    SetMonth.clearExp();
                    Onload.creatTable(data);
                    Onload.creatExp(data);
                    SetMonth.addEvent();

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
                });
    }

    static clearTable(){
        let trColl = document.querySelectorAll(".dataTable tr"),
            trCollLength = trColl.length;
    
            for(let i = trCollLength-1; i > 0; i--){
                trColl[i].remove(); 
            }
    }
    static clearExp(){
        let liColl = document.querySelectorAll("#todo-list li"),
            liCollLength = liColl.length;
    
            for(let i = liCollLength; i > 0; i--){
                liColl[i-1].remove(); 
            }
    }

    static addEvent(){
        let del = new DelData();
        let edit = new EditData();
        const checkboxAll = document.querySelectorAll('.checkbox');
        const editButtonAll = document.querySelectorAll('button.edit');
        const deletButtonAll = document.querySelectorAll('button.delete');
    
        for(let i = 0; i < checkboxAll.length; i++){
            checkboxAll[i].addEventListener('change', ad);  
            checkboxAll[i].addEventListener('change', toggleTodoItem);
            editButtonAll[i].addEventListener('click', editTodoItem); 
            deletButtonAll[i].addEventListener('click', deleteTodoItem); 
        }
    }
}



