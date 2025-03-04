<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';


$arResult = [
    'RESULT'  => 'ERROR',
    'MESSAGE' => 'Произошла ошибка',
];

$arRequired = [
    'type-sport',
    'step',
    'lastname',
    'name',
    'secondname',
    'sex',
    'city',
    'sport',
    'birthday',
    'phone',
    'email',
    'agree1',
    'agree2',
    'agree3',
    'agree4',
];

function sendEmail($to, $subject, $message, $headers){

    if (!mail($to, $subject, $message, $headers) )
    {
        //echo "<pre>"; print_r('Ошибка'); echo "</pre>";
    }else{
        //echo "<pre>"; print_r('норм'); echo "</pre>";
    }
}

function httpPost($url, $data)
{
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

/*
$_REQUEST = [
    'name' => 'test',
    'email' => 'gomber@bk.ru'
];*/

if($_REQUEST){

    // Проверить поля

    $arError = [];

    foreach($arRequired as $itemRequired){
        if(!array_key_exists($itemRequired, $_REQUEST)){
            $arError[] = $itemRequired;
        }
    }
    if(true || !$arError){

        // Отправить письмо заявителю

        $message1 = ' <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff">
        <tr>
            <td style="    padding-top: 23px;padding-bottom: 23px;">
                <table class="table-450" cellpadding="0" cellspacing="0" width="400" align="left">
                    <tr>
                        <td style="    padding-right: 5px;padding-left: 5px;">
                            <div align="left">
                                Дисциплина: #type-sport#<br>
                                Этап: #step#<br>
                                Фамилия: #lastname#<br>
                                Имя: #name#<br>
                                Отчество: #secondname#<br>
                                Пол: #sex#<br>
                                Город: #city#<br>
                                Спортивный разряд: #sport#<br>
                                Дата рождения: #birthday#<br>
                                Телефон: #phone#<br>
                                Электронная почта: #email#<br>
                                Машина: #auto#<br>
                                Являюсь владельцем ГДОО: Да<br>
                                Я принимаю УЧ и ПНПД: Да<br>
                                Согласен с условиями на ОПД: Да<br>
                                Согласен на использование ФиВ: Да<br>

                            </div>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
        </table>';

        $message = <<<HERE
        <div class="form-popup__title">ВАША ЗАЯВКА ОТПРАВЛЕНА</div><div class="form-popup__scroll show" style="max-height: 433px;">
        <div align="left">

        <p style="
        color: #565656;

        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 140%;
    ">
    Для подтверждения участия с вами свяжутся по указанному адресу электронной почты в течение 48 часов.
        </p>
        <p style="
        color: #565656;

        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 140%;
    ">
    Если по истечении времени с вами не связались, пожалуйста, напишите нам на почту <a href="mailto:shotgun@sport.moscow">shotgun@sport.moscow</a>
        </p>
        <h2 style="color: #3F348E;


        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        line-height: 120%; /* 24px */
        text-transform: uppercase;    padding-top: 10px;">
            Спортинг клуб «Румянцево»
        </h2>
        <p style="
        color: #565656;

        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 140%;
    ">
            г. Москва, ЗАО, район Солнцево, квартал № 4, д. 2, стр. 10
        </p>
        <h2 style="color: #3F348E;


        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        line-height: 120%; /* 24px */
        text-transform: uppercase;    padding-top: 10px;">
            Важная информация
        </h2>
        <p style="
        color: #565656;

        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 140%;
    ">
            Все категории стрелков прибывают на соревнование <span style="
            color: #E6313F;">со своим гладкоствольным оружием.</span>
            <br><br>
            Все стрелки обязаны иметь средства защиты зрения и слуха.<span style="
            color: #E6313F;"> При отсутствии средств защиты
                зрения и слуха стрелки к стрельбе допускаться не будут.</span>
        </p>
        <h2 style="color: #3F348E;


        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        line-height: 120%; /* 24px */
        text-transform: uppercase;    padding-top: 10px;">
            Для допуска к участию в соревнованиях каждый участник должен представить в мандатную
            комиссию:
        </h2>

        <ul style="
        color: #565656;

        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 140%;
    ">
            <li>паспорт;</li>
            <li>медицинский полис;</li>
            <li>договор страхования несчастных случаев, жизни и здоровья;</li>
            <li>заявку на участие в соревнованиях с визой врача;</li>
            <li>рапорт о проведении инструктажа по мерам безопасности;</li>
            <li>разрешение на хранение и ношение гладкоствольного длинноствольного огнестрельного
                оружия
                и патронов к нему;</li>
            <li>согласие на обработку персональных данных.</li>
        </ul>
        <p style="
        color: #565656;

        font-size: 13px;
        font-style: italic;
        font-weight: 400;
        line-height: 140%
        ">

            Соревнования проводятся в соответствии с Правилами по стендовой стрельбе (Утверждены
            приказом Министерства спорта Российской Федерации от 29 декабря 2017 г. № 1138, с
            изменениями, внесенными приказами Минспорта России от 18 февраля 2019 г. № 120, от 28
            января 2020 г. № 33,  от 6 июля 2020 г. № 491) и <span style="
            color: #E6313F;">Регламентом соревнований.</span>
        </p>

        <h2 style="color: #EB3333;


        font-size: 20px;
        font-style: normal;
        font-weight: 700;
        line-height: 120%; /* 24px */
        text-transform: uppercase;">
            Для отмены РЕГИСТРАЦИИ
        </h2>
        <p style="
        color: #565656;

        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 140%;
    ">
            В случае если зарегистрированный участник не может принять участие в соревнованиях, он
            обязан написать письмо с указанием своего ФИО и сообщением о невозможности принять
            участие на электронную почту:
        </p>
        <a style="color: #3F348E;


        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 120%;" href="mailto:shotgun@sport.moscow">shotgun@sport.moscow</a>
        <br><br>
        <div class="form-popup__btn"><a target="_blank" href="/памятка.pdf" style="    border-radius: 10px;
        background: #E62E3E;
        color: #FFF;
        text-align: center;
        font-family: Mossport;
        font-size: 30px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-transform: uppercase;
        padding: 10px 20px 8px 20px;
        outline: none;
        width: 100%;
        border: none;
        display: block;
        text-decoration: none;
        margin-top: 0;">Сохранить</a></div>
    </div>
        </div>
        <style>
        @media (max-width: 768px){
            .form-popup__scroll {
                max-height: calc(100vh - 130px)!important;
            }
        }

        </style>



HERE;

        $headers = "Content-type: text/html; charset=utf-8 \r\n";
        $headers .= "From: Московский спорт <shotgun@sport.moscow>\r\n";
        $headers .= "Reply-To: ".$_REQUEST['email']."\r\n";

        foreach($_REQUEST as $key => $item){
            $message1 = str_replace('#'.$key.'#', $item,$message1);
        }

        /*
        sendEmail(
            $_REQUEST['email'],
            'Заявка на участие '.$_REQUEST['type-sport'].' ' . $_REQUEST['step'] ,
            $message,
            $headers
        );
        */
        // Отправить письмо исполнителю
        /*
        sendEmail(
            'shotgun@sport.moscow',
            'Заявка. '.$_REQUEST['type-sport'].' ' . $_REQUEST['step'] .' ' . $_REQUEST['lastname'] . ' ' . $_REQUEST['name'],
            $message1,
            $headers
        );
        */

        $mail = new PHPMailer;
        $mail->CharSet = 'UTF-8';
        
        // Настройки SMTP
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPDebug = 0;
        
        $mail->Host = 'owa.mos.ru';
        $mail->Port = 587;
        $mail->Username = 'HQ\shotgun';
        $mail->Password = '6}Zv<>?.1vbd.@ncy8VvBqz>P';
        $mail->SMTPSecure = "tls";
        
        // От кого
        $mail->setFrom('shotgun@sport.moscow', 'Московский спорт');		
        
        // Кому
        $mail->addAddress('shotgun@sport.moscow', 'Московский спорт');
        
        // Тема письма
        $mail->Subject = 'Заявка. '.$_REQUEST['type-sport'].' ' . $_REQUEST['step'] .' ' . $_REQUEST['lastname'] . ' ' . $_REQUEST['name'];
        
        // Тело письма
        $body = $message1;
        $mail->msgHTML($body);
        
        $mail->send();

        // Отправить заявку по api

        if($_REQUEST['sex'] == 'М') $_REQUEST['sex'] = 'муж';
        if($_REQUEST['sex'] == 'Ж') $_REQUEST['sex'] = 'жен';

        $data = [
            "discipline" => $_REQUEST['type-sport'],
            "lastName" => $_REQUEST['lastname'],
            "firstName" => $_REQUEST['name'],
            "middleName" => $_REQUEST['secondname'],
            "Gender"  => $_REQUEST['sex'],
            "sportCategory" =>  $_REQUEST['sport'],
            "birthday" => $_REQUEST['birthday'],
            "phone" => $_REQUEST['phone'],
            "email" => $_REQUEST['email'],
            "city" => $_REQUEST['city'],
            "stage" => $_REQUEST['step'],
            "carBrandAndNumber" => $_REQUEST['auto'],
            "participationCondition" => true,
            "processingPersonalInfoCondition" => true,
            "usingMaterialsCondition" => true,
            'lethalWeaponOwner' => true,
        ];

        //echo "<pre>"; print_r($data); echo "</pre>";

        $response = httpPost('https://sport.mos.ru/api/registrationform/users', $data);

        //echo "<pre>"; print_r($response); echo "</pre>";
        $log = date('Y-m-d H:i:s') . ' Отправка: ' . print_r($data, true) . ' Ответ: ' . $response;
        file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);

        $arResult = [
            'RESULT'  => 'OK',
            'MESSAGE' => $message,
            'DEBUG' =>  $mail->ErrorInfo
        ];

    }else{
        $arResult = [
            'RESULT'  => 'ERROR',
            'MESSAGE' => 'Не все поля заполнены',
            'FILDS'   => $arError,
        ];
    }

}else{
    $arResult = [
        'RESULT'  => 'ERROR',
        'MESSAGE' => 'Не верный метод',
    ];
}

echo json_encode($arResult);
?>
