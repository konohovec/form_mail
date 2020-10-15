<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';

	$mail = new PHPMailer(true);
	$mail -> CharSet = 'UTF-8';
	$mail->serLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	$mail->setForm('Новый пользователь');
	$mail->addAddress('lizunova.252@yandex.ru');
	$mail->Subject = "Тестовое письмо";

	$hand = 'Правая';
	if ($_POST['hand'] == 'left') {
		$hand = 'Левая';
	}

	$body = '<h1>Письмо!</h1>';

	if (trim(!empty($_POST['name']))){
		$body.='<p><strong>Имя:</strong> '.$POST['name'].'</p>';
	}
	if (trim(!empty($_POST['email']))){
		$body.='<p><strong>E-mail:</strong> '.$POST['email'].'</p>';
	}
	if (trim(!empty($_POST['hand']))){
		$body.='<p><strong>Рука:</strong> '.$hand.'</p>';
	}
	if (trim(!empty($_POST['age']))){
		$body.='<p><strong>Возраст:</strong> '.$POST['age'].'</p>';
	}
	if (trim(!empty($_POST['message']))){
		$body.='<p><strong>Сообщение:</strong> '.$POST['message'].'</p>';
	}


	$mail->Body = $body;


	if (!$mail->send()) {
		$message = "Ошибка";
	}else {
		$message = "Данные отправлены!";
	}

	$response = ['message' => $message];
	header('Content-type: application/json');
	echo json_encode($response);

?>