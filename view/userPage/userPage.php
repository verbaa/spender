<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Free Web tutorial">
    <meta name="author" content="Lukin Aleksandr">
    <meta name="keyworld" content="HTML, CSS, JavaScript, PHP, MySQL">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="data:image/x-icon;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAAAADNXx0FzV8dB81fHQQAAAAAzV8dDCKFB/8ihQf/IoUH/yKFB/8ihQf/IoUH/81fHQwAAAAAzV8dBM1fHQfNXx0FzV8dB81fHQTNXx0GIoUH/yKFB/8AAAD/AAAA/wDX//8AAAD/AAAA/wAAAP8ihQf/IoUH/81fHQbNXx0EzV8dB81fHQTNXx0KIoUH/wAAAP8AAAD/AAAA/wAAAP8A1///AAAA/wAAAP8AAAD/AAAA/wAAAP8ihQf/zV8dC81fHQQAAAAAIoUH/wAAAP8AAAD/AAAA/wDX//8A1///ANf//wDX//8A1///AAAA/wAAAP8AAAD/AAAA/yKFB/8AAAAAzV8dCyKFB/8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/ANf//wAAAP8AAAD/AAAA/wAAAP8ihQf/zV8dDM1fHRcihQf/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wDX//8AAAD/AAAA/wAAAP8AAAD/IoUH/81fHRfNXx0JIoUH/wAAAP8AAAD/AAAA/wDX//8A1///ANf//wDX//8A1///AAAA/wAAAP8AAAD/AAAA/yKFB//NXx0KAAAAACKFB/8AAAD/AAAA/wAAAP8A1///AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8ihQf/AAAAAM1fHQMihQf/IoUH/wAAAP8AAAD/ANf//wAAAP8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8ihQf/IoUH/81fHQPNXx0HAAAAACKFB/8AAAD/AAAA/wDX//8A1///ANf//wDX//8A1///AAAA/wAAAP8ihQf/IoUH/wAAAADNXx0HzV8dBs1fHQgAAAAAIoUH/yKFB/8AAAD/AAAA/wDX//8AAAD/AAAA/wAAAP8ihQf/IoUH/wAAAADNXx0IzV8dBs1fHQbNXx0IzV8dCAAAAADNXx0FIoUH/wAAAP8A1///AAAA/wAAAP8ihQf/AAAAAAAAAADNXx0IzV8dCM1fHQbNXx0GzV8dCM1fHQjNXx0GAAAAACKFB/8AAAD/AAAA/wAAAP8AAAD/IoUH/wAAAADNXx0HzV8dCM1fHQjNXx0GzV8dBs1fHQjNXx0HzV8dASKFB/8AAAD/AAAA/wAAAP8AAAD/AAAA/wAAAP8ihQf/zV8dAc1fHQfNXx0IzV8dBs1fHQfNXx0IzV8dBc1fHQ8ihQf/AAAA/wAAAP8AAAD/AAAA/wAAAP8AAAD/IoUH/81fHRDNXx0FzV8dCM1fHQfNXx0FzV8dBs1fHQbNXx0GIoUH/yKFB/8ihQf/IoUH/yKFB/8ihQf/IoUH/yKFB//NXx0GzV8dBs1fHQbNXx0F+B8AAOAHAADAAwAAgAEAAIABAACAAQAAgAEAAIABAACAAQAAwAMAAOAHAAD4HwAA+B8AAPAPAADwDwAA8A8AAA==" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="/view/userPage/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Jura" rel="stylesheet">
    <link rel="stylesheet" href="/view/userPage/css/slider.css">
    <!-- animation -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>  -->
    <!-- graf -->
    <script src="/view/userPage/js/fusioncharts/fusioncharts.js"></script>
    <script src="/view/userPage/js/fusioncharts/fusioncharts.charts.js"></script>
    <script src="/view/userPage/js/fusioncharts/fusioncharts.zoomline.js"></script>
    <script src="/view/userPage/js/fusioncharts/fusioncharts.timeseries.js"></script>

    <!-- theme graf -->
    <script src="/view/userPage/js/fusioncharts/themes/fusioncharts.theme.candy.js"></script>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <title>Spender</title>
</head>
<body>
  <section class="lft-menu">
    <div class="userInfo">
       <a href=""><img src="<?php echo $_SESSION['user']['photo']; ?>" alt="" width="80%"></a> 
        <h3 class="userName"><?php echo  $_SESSION['user']['login'];?></h3>

      <ul>
        <li>
        <span class="hider">Установить изображение</span>
        <div id="hidden" style="display: none;">
            <form enctype="multipart/form-data" method="post" action="/user/photo/">
              <input type="file" name="photo">
              <input type="submit" value="Отправить">
            </form>
          </div>
        </li>
          
        <li>
          <span class="hider2">Смена пароля</span>
          <div id="hidden2" style="display: none;">
            <div class="chengePassForm">
              <input id="oldPass" type="password" placeholder="Старый пароль">
              <input id="newPass1" type="password" placeholder="Новый пароль">
              <input id="newPass2" type="password" placeholder="Новый пароль">
              <button id="chengePassButton" type="submit"  value="Изменить">Изменить</button>
            </div>
            <h3 class="err"></h3>
          </div>
        </li>
      </ul>
    </div>
    
  </section>

  <section class="section-header">
      <div id="particles-js">
          <h1>SPENDER</h1>
          <button class="exit">Выход</button>
          <h3 class="userName"><?php echo $_SESSION['user']['login'];?></h3>
          <i><img src="<?php echo $_SESSION['user']['photo']; ?>" alt="" width="80%"></i>
     </div>
</section>

<section class="section-time">
    <div class="cour">
      <i class="arrow prev"></i>
      <div class="slider">
        <ul>
        <li><img src="/view/userPage/img/jan.png"></li>
        <li><img src="/view/userPage/img/feb.png"></li>
        <li><img src="/view/userPage/img/mar.png"></li>
        <li><img src="/view/userPage/img/apr.png"></li>
        <li><img src="/view/userPage/img/may.png"></li>
        <li><img src="/view/userPage/img/jun.png"></li>
        <li><img src="/view/userPage/img/jul.png"></li>
        <li><img src="/view/userPage/img/aug.png"></li>
        <li><img src="/view/userPage/img/sep.png"></li>
        <li><img src="/view/userPage/img/oct.png"></li>
        <li><img src="/view/userPage/img/nov.png"></li>
        <li><img src="/view/userPage/img/dec.png"></li>
      </ul>
      </div>
      <i class="arrow next"></i>
    </div>
  </section>
  <section class="section-content">
    <article class="article-menu">
                                     <!-- Блок "Общие расходы" -->
        <div class="genExp">
            <div class="form first">
                <h3>Общие Расходы</h3>
                <div class="form-inner">
                    <div class="wrap">
                    <input type="text" placeholder="Название" name="product" id="genProduct">
                    <input type="number" placeholder="Сумма в грн." name="sum" id="genSum">
                    <select type="text" form="form" required id="genCategory">
                        <option selected>Выберите каттегорию</option>
                        <option value="Продукты питания">Продукты питания</option>
                        <option value="Развлечения и спорт">Развлечения и спорт</option>
                        <option value="Красота и медицина">Красота и медицина</option>
                        <option value="Транспорт">Транспорт</option>
                        <option value="Кафе и рестораны">Кафе и рестораны</option>
                        <option value="Туризм">Туризм</option>
                        <option value="Одежда и обувь">Одежда и обувь</option>
                        <option value="Животные">Животные</option>
                        <option value="Другое">Другое</option>
                      </select>
                    </div>  
                    
                    <button type="submit" id="add-Exp">Добавить</button>
                </div>
            </div>
          </div>
                              <!-- Конец блока "Общие расходы" -->
          <div class="standartExp">
              <div class="form second">
                  <h3>Ежемесячные расходы</h3>
                  <div class="form-inner">
                      <form id="todo-form">
                        <div class="wrap">
                          <input id="add-input" type="text" placeholder="Название">
                          <input id="add-sum" type="number" placeholder="Сумма в грн.">
                        </div>
                          <button id="add-regExp" type="submit">Добавить</button>
                      </form>
                  </div>
                  <ul id="todo-list">

                  </ul>
              </div>
            </div>
    </article>
    <article class="article-list">
      <div class="listExp">
        <h3>Перечень расходов за месяц</h3>
        <table class="dataTable">
          <tr>
            <th>id</th>
            <th>Дата</th>
            <th>Наименование</th>
            <th>Категория</th>
            <th>Цена</th>
            <th></th>
          </tr>

        </table>
      </div>
    </article>
    <article class="article-grafic">
      <div class="result">
        <div class="resultMonth">
               <h3>Итого за месяц:</h3>
        </div>
        <div class="resultYear">
                <h3>Итого за год:</h3>
        </div>
      </div>
      <div id="chart-container"></div>

  </article>
  </section>


<script src="/view/userPage/js/app.js"></script>
<script src="/view/userPage/js/slider.js"></script>
<script src="/view/userPage/js/setData.js"></script>
<script src="/view/userPage/js/delData.js"></script>
<script src="/view/userPage/js/editData.js"></script>
<script src="/view/userPage/js/onload.js"></script>
<script src="/view/userPage/js/setMonth.js"></script>
<script src="/view/userPage/js/exit.js"></script>
<script src="/view/userPage/js/google.js"></script>
<script src="jquery.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){
    $(".hider").click(function(){
        $("#hidden").slideToggle("slow");
        return false;
    });
});
$(document).ready(function(){
    $(".hider2").click(function(){
        $("#hidden2").slideToggle("slow");
        return false;
    });
});
</script>

  <script>
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
    data: []
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
      </script>
      

</body>
</html>