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
    <title>Spender</title>
    <link rel="stylesheet" href="/view/headPage/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
</head>
<body>
        <div id="range5">
            <div class="outer">
            <div class="middle">
                <div class="inner">
                    <div class="login-wr">
                    <a href="http://www.nusa.zzz.com.ua/"><img src="/view/headPage/img/graph-background-png-7-transparent.png" alt=""></a>

                    <h2>Войти</h2>
                    <form class="form" action="/avtorization/login/" method="post">
                        <input type="text" placeholder="Пользователь" name="Login">
                        <input type="password" placeholder="Пароль" name="Password">
                        <p><a href="/reg/new/">Зарегистрироваться</a></p>
                        <p><a href="/pass/pages/">Забыли пароль?</a></p>
                        <button type="submit"> Вход </button>
                        <?php
                        echo "<p>";
                        echo $err; 
                        echo "</p>";
                        ?>

                    </form>
                    </div>
                </div>
            </div>
            </div>
        </div>

</body>
</html>


