

<?php


// ------------------ lembrete ( use e require fora de if ) -------




        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;



        // Load Composer's autoloader
        require 'produtos/vendor/autoload.php';

        $mail = new PHPMailer(true);

              $file_name = md5(rand()) . '.pdf';
              $html_code = '<link rel="stylesheet" href="http://localhost/web/css/bootstrap.css">';
              $html_code .= fetch_request_data( );
              $pdf = new Pdf();
              $pdf->load_html($html_code);
              $pdf->render();
              $file = $pdf->output();
              file_put_contents($file_name, $file);


             /*
              *
              *
              * No campo abaixo coloque o email do administrador que vai receber
              * todos os relatorios de pedidos , obs: não precisar ser do gmail
              *
              $mail->addAddress( emailAdministrador@yahoo.com.br, Administrador ); 
              * Ele vai então enviar ao email o relatorio de todos os pedidos
              * 
              * 
              * Agora configurar a conta de onde vai ser enviado o email
              * no campo abaixo coloque o email e a senha
              * $mail->Username   = 'seuemailaqui@gmail.com'; // seu email 
              * $mail->Password   = 'suasenhaemailgmail';         // sua senha
              * então esta configurado a conta que vai enviar os emails
              *
              *
              * Ele esta configurado para enviar o email de uma conta gmail
              * Então no campo 
              * $mail->setFrom('seuEmailGmail@gmail.com', 'Nome Desejado');
              * você deve informar o email gmail de onde vai enviar e o nome que 
              * quer que apareça quando a pessoa ver o Email
             */


              try 
              {  
		              //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
		              $mail->isSMTP();                                            // Send using SMTP
		              $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
		              $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		              $mail->Username   = 'seuemailaqui@gmail.com';              // SMTP username
		              $mail->Password   = 'suasenhaemailgmail';                              // SMTP password
		              $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		              $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
		              $mail->CharSet = 'UTF-8';
		              $mail->Encoding = 'base64';
		              //Recipients
		              $mail->setFrom('seuEmailGmail@gmail.com', 'Nome Desejado');
		              $mail->addAddress('emailAdministrador@yahoo.com.br', 'Administrador');// Add a recipient        

		              // Anexos
		              	 //$mail->addAttachment('application/views/produtos/blue.jpg) // mesma pasta do programa
		                 $mail->addAttachment($file_name); 

		              // Content
		              $mail->isHTML(true);                                  // Set email format to HTML
		              $mail->Subject = 'Lista de Pedidos';
		              $mail->Body    = 'Segue em Anexo o PDF , contendo a lista de pedidos';
		              $mail->AltBody = 'Segue em Anexo o PDF , contendo a lista de pedidos';


	              if ( $mail->send() )
	              {  
	                   $this->session->set_flashdata("success", "Email enviado com sucesso!" );
	                   echo '<h5>Mensagem enviada com sucesso !</h5>';     
	              }

              } // fim try
              catch (Exception $e)
              {
                  $this->session->set_flashdata("danger", "Mensagem não pode ser enviada. Mailer Error:
                  {$mail->ErrorInfo}"); 

                  echo "Mensagem não pode ser enviada. Mailer Error:
                  {$mail->ErrorInfo}";
              }  // fim catch
              unlink($file_name); // Exclui PDF Gerado, depois que envia o email        