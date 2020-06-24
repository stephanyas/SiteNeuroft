<?php

    $sender_nome = $_GET["nome"];
    $sender_assunto = $_GET["assunto"];
    $sender_email = $_GET["email"];
    $sender_mensagem = $_GET["mensagem"];

    // Inclui o arquivo class.phpmailer.php localizado na pasta class
    require_once("class/class.phpmailer.php");

    // Inicia a classe PHPMailer
	$mail = new PHPMailer(true);
 
	// Define os dados do servidor e tipo de conexão
	$mail->IsSMTP(); // Define que a mensagem será SMTP
	
try {
     $mail->Host = 'smtp.neuroft.com.br'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
     $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
     $mail->Port       = 587; //  Usar 587 porta SMTP
     $mail->Username = 'clinica@neuroft.com.br'; // Usuário do servidor SMTP (endereço de email)
     $mail->Password = 'Neuroft@2019'; // Senha do servidor SMTP (senha do email usado)
	 $mail->CharSet = 'UTF-8';
 
     //Define o remetente
     // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
     $mail->SetFrom('clinica@neuroft.com.br', $sender_nome,0); //Seu e-mail
     $mail->AddReplyTo($sender_email, $sender_nome); //Seu e-mail
     $mail->Subject = 'Contato do site - ' . $sender_assunto;//Assunto do e-mail
 
 
     //Define os destinatário(s)
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     $mail->AddAddress('clinica@neuroft.com.br', 'NeurOft');
 
     //Campos abaixo são opcionais 
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
     //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
     //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo
 
     $mensagem = "<h2>Nova Mensagem</h2><br/>";
     $mensagem .= ("Nome: " . $sender_nome . " <br/>");
     $mensagem .= ("Assunto: " . $sender_assunto . " <br/>");
     $mensagem .= ("Email: " . $sender_email . " <br/><br/>");
     $mensagem .= ("Mensagem: <p>" . $sender_mensagem . "</p>");

     //Define o corpo do email
     $mail->MsgHTML($mensagem); 
 
     ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
     //$mail->MsgHTML(file_get_contents('arquivo.html'));
 
     $mail->Send();
     echo "Mensagem enviada com sucesso</p>\n";
 
    //caso apresente algum erro é apresentado abaixo com essa exceção.
    }
catch (phpmailerException $e) 
	{
      echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
	}

?>
