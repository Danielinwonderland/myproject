<?php
session_start();
$error_message = '';

function clearText($name){
  $name = preg_replace("/<script>.*<\/script>/", "", $name);
  $name = strip_tags($name);
  $name = preg_replace('/[^-\w]|_/u', ' ', $name);
  $name = preg_replace('/_+/u', ' ', $name);
  $name = trim($name);
  $name = preg_replace('/ +/', " ", $name);
  
  return $name;
}

function mailWrite(){

  $_SESSION['mail_form'] = [
    'status' => 0,
    'message' => true,
  ];

  $mailDir = "mail/";
  $filename = "mail.txt";

  $name = $_POST['name'] ?? '';
  $email = $_POST['email'] ?? '';
  $phone = $_POST['phone'] ?? '';
  $text = clearText($_POST['text']);

  $message = 'Дата: ' . date("j.m.Y. H:i:s") . PHP_EOL;
  $message .= 'Имя: ' . $name . PHP_EOL;
  $message .= 'Email: ' . $email . PHP_EOL;
  $message .= 'Телефон: ' . $phone . PHP_EOL;
  $message .= 'Сообщение: ' . $text . PHP_EOL . PHP_EOL;

  try{
    if(!is_dir($mailDir)){
      if(mkdir($mailDir, 0755, true)){
      }else{
          echo 'Ошибка создания каталога: "Невозможно создать каталог для записи"';
      }
  };

  $handle = @fopen($mailDir.$filename, 'a');
  if($handle = fopen($mailDir.$filename, 'a')) {
      fwrite($handle, $message);
      fclose($handle);
  };
  $_SESSION['mail_form']['status'] = 1;
  $_SESSION['mail_form']['message'] = 'Ваше сообщение успешно отправлено';

  header("Location: contacts.php");

  } catch (Exception $e){
    $_SESSION['mail_form']['message'] = $e->getMessage();
  }

  
 
};

if(!empty($_POST)){
  mailWrite();
}

header("Location: /contacts/");