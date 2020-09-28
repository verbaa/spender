<?php
class ControllerPass
{

    function __construct()
    {
        //Инициализация
        include_once ROOT. "/models/ModelPass.php";
    }

    public function passPage()
    {
        include ROOT . "/view/passPage/passPage.php";
    }

    public function chenge(){
        $mod = new ModelPass();
        $user = $_GET["user"];
        $old = $_GET["old"];
        $new = $_GET["new"];
        $chengePass = $mod->chengePass($user, $old,  $new);

        echo json_encode($chengePass);
    }

    public function res(){
        $mod = new ModelPass();
        $mail = $_POST["email"];
        $check = $this->validatorForm($mail);
        //Проверка на взлом front-end
        if($check[0] == false){
            echo $checkMass[1];
            //Выйти из контроллера
            return false;
        }

        $userInDb = $mod->checkUser($mail);
        //Проверка на наличие уже существующих пользователей
        if($userInDb[0] == false){
            echo $userInDb[1];
            //Выйти из контроллера
            return false;
        }
        $passGen = $this->randomPass();
        $this->sendNewPass($mail, $passGen);
        $editPass = $mod->editPass($mail, $passGen);
    }

    private function validatorForm($mail){
        $isCorrectData = true;
        $errorMsg = "";
        
        if(!preg_match ( "/(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6})/" , $mail)){
            $isCorrectData = false;
            $errorMsg .= "Некорректный e-mail. ";
        }
        return [$isCorrectData, $errorMsg];
    }

    private function randomPass(){
        $pass = "";
        $simv = array ("92", "83", "T7", "66", "45", "4F", "36", "22", "1S", "0F", 
                   "Sk", "lD", "mR", "n", "oG", "p", "q", "1R", "3s", "aA", "bH", "cR", "dY", "5e", "Jf", "gV", "hW", "Ii", "j6", "tK", "uX", "v9", "Fw", "x5", "6y", "z5");
        for ($k = 0; $k < 8; $k++)
        {
          shuffle ($simv);
          $pass = $pass.$simv[1];
        }
        return $pass;
    }

    private function sendNewPass($mail, $pas){
        $to = $mail;
        $subject = "Новый пароль к сайту " . SITE;
        $txt = "Здравствуйте, ваш новый пароль: " .  $pas ;
        $headers = "From: new-pass@nusa.zzz.com.ua";
        mail($to,$subject,$txt,$headers);
        echo "На вашу почту " . $mail . " было отправлено письмо с новым паролем.";
    }
}