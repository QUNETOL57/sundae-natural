<?php

$from = 'message@sundae-natural.ru';

//$sendTo = 'ctpperm@yandex.ru';
$sendTo = 'an.1998@yandex.ru';

$subject = 'Новое сообщение с сайта ' . $_SERVER['HTTP_REFERER'];

$fields = [
    'name' => 'Имя',
    'email' => 'Email',
    'message' => 'Сообщение'
];

if (count($_POST) != 0) {
    $emailText = $subject . "\n" . '----------------------' . "\n";

    foreach ($_POST as $key => $value) {
        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }
    echo $emailText;

    $headers = array('Content-Type: text/plain; charset="UTF-8";',
        'From: ' . $from,
        'Reply-To: ' . $_POST['email'],
        'Return-Path: ' . $from,
    );

    mail($sendTo, $subject, $emailText, implode("\n", $headers));
    echo '<script>location.replace("' . $_SERVER['HTTP_REFERER'] . '");</script>';
    exit;
}
?>