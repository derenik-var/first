<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHTML(true);
//кому письмо
$Smail->setFrom('PiloMir11@gmail.com', 'Сайт ПилоМир');
//кому отправить
$Smail->addAddress ('vartanandima6@gmail.com');
//тема письма
$Smail->Subject = 'Заказ из сайта"';
//рука
$hand = "Правая"; 
if($_POST[ 'hand' ] == "left") {
    $hand = "Левая";
}
//Тело письма
$body = '‹h1>Поступил заказ ! </h1>';

if(trim(!empty($_POST [' name ']))){
$body.='<p›‹strong>Имя: ‹/strong> '.$_POST['name'].'</p>';
}
if(trim(!empty($_POST [' tel ']))){
$body.='<p›‹strong>Телефон:‹/strong>'.$_POST['tel'].'</p>';
}
if(trim(!empty($_POST [' choose ']))){
 $body.='<p›‹strong> Вид товара: ‹/strong> '.$_POST['choose'].'</p>';
}

if(trim(!empty($_POST [' massage ']))){
    $body.='<p›‹strong>Количество:  ‹/strong> '.$_POST['massage'].'</p>';
    }

    if(trim(!empty($_POST [' buy ']))){
        $body.='<p›‹strong>Способ оплаты:  ‹/strong> '.$_POST['buy'].'</p>';
        }

        if(trim(!empty($_POST [' date ']))){
            $body.='<p›‹strong>Дата: ‹/strong> '.$_POST['date'].'</p>';
            }


            //Отправляем
    if(!$mail ->send()){
        $message = 'Ошибка';
    } else {
        $message = 'Данные отправлены!';
    }

    $response = ['message' => $message];
    header('Content-type: application/json');
    echo json_encode($response);


    ?>