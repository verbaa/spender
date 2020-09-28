<?php
class ControllerRegistrant
{

    function __construct()
    {
        include_once ROOT. "/models/ModelRegistrant.php";
    }

    public function actionNew()
    {
        include ROOT . "/view/registrationPage/registration.php";
    }

    private function validatorForm($ud){
        $isCorrectData = true;
        $errorMsg = "";
        if(!empty($_POST["login"])){
            if(preg_match ( "/([a-zA-Z_-]+){3,16}/" , $ud['log']) == 0){
                $isCorrectData = false;
                $errorMsg .= "Не корректный логин. ";
            }
            if(preg_match ( "/(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6})/" , $ud['mail']) == 0){
                $isCorrectData = false;
                $errorMsg .= "Не корректный e-mail. ";
            }
            if(preg_match ( "/((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15})/" , $ud['pass1']) == 0){
                $isCorrectData = false;
                $errorMsg .= "Не корректный пароль. ";
            }
            if( $ud['pass1'] != $ud['pass2']){
                $isCorrectData = false;
                $errorMsg .= "Пароли не совпадают. ";
            }
        }
        return [$isCorrectData, $errorMsg];
    }

    public function actionReg($uri){
        $mod = new ModelRegistrant();
        $userData = [];
        $userData['log'] = $_POST["login"];
        $userData['mail'] = $_POST["email"];
        $userData['pass1'] = $_POST["pwd1"];
        $userData['pass2'] = $_POST["pwd2"];

        $checkMass = $this->validatorForm($userData);

        //Проверка на взлом front-end
        if($checkMass[0] == false){
            echo $checkMass[1];
            //Выйти из контроллера
            return false;
        }
        $unicMass = $mod->checkUnicUser($userData['log'], $userData['mail']);
        //Проверка на наличие уже существующих пользователей
        if($unicMass[0] == false){
            echo $unicMass[1];
            //Выйти из контроллера
            return false;
        }
        //Готовим заявку на регистрацию и заносим ее в БД
        $url = $mod->prepareReg($userData['log'],$userData['mail'],$userData['pass1']);
        $this->sendCheckLink($userData['log'],$userData['mail'],$url);
    }

    private function sendCheckLink($log, $mail, $link){
        $to = $mail;
        $subject = "Подтверждение регистрации " . SITE;
        $txt = "Здравствуйте, $log \n\rПодтвердите регистрацию перейдя по URL-адресу \n\r $link" ;
        $headers = "From: hohoho@nusa.zzz.com.ua";
        mail($to,$subject,$txt,$headers);
        echo "На вашу почту " . $mail . " было отправлено письмо с подтверждением.";
    }
    //Подтверждение регистарции через URL
    public function actionCheckLink($uri){
        $timeDelay = 3600 * 2;//2часа
        $l = $_GET["l"];
        $cur = time();
        $l_len = strlen($l);

        if ($l_len > 15){
            $strTime = 1 * (substr($l, 0, $l_len - 10));
            $diap = $cur - $strTime;
            if($diap < $timeDelay)
            {
                $mod = new ModelRegistrant();
                //Ищем в таблице заявок заявку по уникальной строке
                $getUserApp = $mod->searchApp($l);
                //Проверяем, есть ли такой пользователь
                $checkUnicUser = $mod->checkUnicUser($getUserApp['login'], $getUserApp['mail']);
                //записываем в таблицу пользователей логин, хэш пароля, мыло
                if($checkUnicUser[0]){
                    $mod->addNewUser($getUserApp['login'], $getUserApp['mail'], $getUserApp['hash_pass'], $getUserApp['random_str']);
                    //Показываем сообщение -- Успешная регистрация!
                    echo "поздравляем {$getUserApp['login']} вы успешно зарегистрированы по почте {$getUserApp['mail']}";
                    //
                }else{
                    echo $checkUnicUser[1];
                    return false;
                }
            }else{
                //иначе - ссылка больше не действительна
                echo "ссылка больше не действительна";
            }
        }else{
            echo "ссылка не корректна";
        }
    }
}