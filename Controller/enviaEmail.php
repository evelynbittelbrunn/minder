<?php

	$email = $_POST['nNewLogin'];
	include("conexao.php");
	include("function.php");
    require_once('../src/PHPMailer.php');
	require_once('../src/SMTP.php');
	require_once('../src/Exception.php');

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	$mail = new PHPMailer(true);

	$sql  =  "SELECT Email FROM tb_usuario AS EMAIL"
        ." WHERE Email = '".$email."'";

	$result = mysqli_query($conn,$sql);

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo "Digite um email válido";
		
	}else{
		if(mysqli_num_rows($result) > 0){

			try {
	
				$novaSenha = geraSenha(10, true, true, true);
	
				$mail->SMTPDebug = SMTP::DEBUG_SERVER;
				$mail->isSMTP();
				$mail->Host = 'smtp.gmail.com';
				$mail->SMTPAuth = true;
				$mail->Username = 'mindersenha@gmail.com';
				$mail->Password = '!M1nD3r$';
				$mail->Port = 587;
			
				$mail->setFrom('mindersenha@gmail.com');
				$mail->addAddress($email);
			
				$mail->isHTML(true);
				$mail->Subject = 'Nova senha. Não responda';
				$mail->Body = 'Sua nova senha é: '.$novaSenha;
				$mail->AltBody = 'Envio de nova senha';
				
				$sql  =  "UPDATE tb_usuario"
						." SET Senha = MD5('".$novaSenha."')"
						." WHERE Email = '".$email."'";
	
				$result = mysqli_query($conn,$sql);
	
				if($mail->send()) {
					header('location:'.$_SERVER['HTTP_REFERER']);
					echo 'Email enviado com sucesso';
				} else {
					echo 'Falha no envio do E-mail';
				}
			} catch (Exception $e) {
				echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
			}
		}else{
			echo "Email não cadastrado";
		}
	
	}
?>