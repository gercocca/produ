<?php
	include_once('class.phpmailer.php');
	// Indica si los datos provienen del formulario
	$postback = isset($_POST['postback']) ? true : false;
	
	if ($postback) {
		extract($_POST);
		$mail = new phpmailer (); # Crea una instancia
		$mail -> From = $from; // desde quien
		$mail -> FromName = $txttipohab; nombre y apellido# Puede obtenerse del formulario, por facilidad se hace de esta manera "BuayaCorp"
		$mail -> AddAddress ($to);
		$mail -> Subject = $sbj;
		$mail -> Body = $msg;
		$mail -> IsHTML (true);
		$archivos = '';
		$msg = "Mensaje Enviado";
		
		if (!$mail -> Send ()){
			$msg = "No se pudo enviar el email";
		}
	}
?>

 <?php if (isset($msg)) echo $msg;?>