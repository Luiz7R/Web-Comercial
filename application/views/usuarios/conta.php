<?php
		$this->load->view('templates/header');
		$this->load->view('templates/nav-top');
		$this->load->view('templates/footer');
		$this->load->view('templates/js');


if ( $this->session->userdata("usuario_logado") ) 
{
            
    $GLOBALS['pedidos'] = $pedidos;
    $message = '';

        function fetch_request_data()
        {

          $pedidosFeitos = '';
          $pedidosFeitos = $GLOBALS['pedidos'];
          $output = '
          <div class="table-responsive">
            <table class="table table-striped table-bordered">
              <tr>
                 <th>Código do Pedido</th>
                 <th>Data do Pedido</th>
                 <th>Observação</th>
                 <th>Forma de Pagamento</th> 
              </tr>
              <br>
          ';

 
          foreach($pedidosFeitos as $row)
          {
            $mydt = DateTime::createFromFormat('Y-m-d', $row['order_date'] ); 
            $formatd = $mydt->format('d/m/yy');        

            $output .= '
              <tr>
                <td>'.$row['id'].'</td>
                <td>'.$formatd.'</td>
                <td>'.$row['observacao'].'</td>
                <td>'.$row['payment_status'].'</td>
              </tr>
            ';
            
          }


          $output .= '
            </table>
          </div>
          ';
          return $output;
        }


?>
        <?php if($this->session->userdata("usuario_logado")) { ?>
        <?php $idUsuario = $this->session->userdata('usuario_logado')['id']; }?>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">

        <!-- Brand -->
        <!--a class="navbar-brand" href="index.php">Web Store</a-->

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">

          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                <a class="nav-link" href="../">Inicio <span class="sr-only"></span></a>
              </li>
              <?php if ($idUsuario == '3'): ?> 
                <li class="nav-item active">
                  <a class="nav-link" href="../admin/usuarios">Usuarios</a>
                </li>
                  
                <li class="nav-item active">
                  <a class="nav-link" href="../admin/pedidos">Pedidos</a>
                </li>               

              <?php endif ?>

              <li class="nav-item">       
              </li>
            </ul>
          </div>

          <ul class="navbar-nav ml-auto">

          <ul class="navbar-nav">

              <li class="nav-item">
                <a class="nav-link" href="#">Categorias</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../<?php base_url() ?>carrinho">Carrinho</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span class="badge badge-danger">
                 <?php if ( $this->cart->total_items() > 0 ) {
                     echo $this->cart->total_items();
                  } ?>  
                  </span>
                 </a> 
              </li>                             
          </ul> 
        </div>
    </nav>          

<style>

  body{
  background-color: #D5CFCF;
  }

  .card {
    background-color: #B5B0B0;
  }

</style>



<br>
<div class="card">
  <div class="card-header" style= "width: 87rem; background-color:lightgrey">
    <strong><h4 align="center">Minha Conta</h4></strong>
  </div>
</div>  
<br><br>

            <ul><strong><h5>Bem Vindo, <?= $usuario['nome']?> !</h5></strong></ul><br>
      <br />

    <?php if($this->session->flashdata("success")): ?>
      <p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>

    <?php endif ?>


        <div style="clear:both"></div>
        <br>
        <br>

        <div class="container">
          <form method="post">
            <input type="submit" name="action" class="btn btn-danger" value="Enviar PDF" /><?php echo $message; ?>
          </form>
        </div>

        <br>
        <div class="container" id="order_table">
             <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                     <th width="20%">Código do Pedido</th>
                     <th width="180px">Data do Pedido</th>
                     <th>Observação</th>
                     <th width="130px">Forma de Pagamento</th> 
                     <th width="10%">PDF</th>                  
                  </tr>  
                  </thead>
                  <?php
                      foreach($pedidos as $row)
                      {
                        $mydt = DateTime::createFromFormat('Y-m-d', $row['order_date'] ); 
                        $formatd = $mydt->format('d/m/yy');        
                  ?>      
                          <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $formatd ?></td>
                            <td><?= $row['observacao'] ?></td>
                            <td><?= $row['payment_status'] ?></td>
                            <td><a href="../admin/pdfdetalhes/<?php echo $row['id'] ?>" class="btn btn-success btn-xs item-pdf">Ver PDF</a></td>                             
                          </tr>
                   <?php     
                      }
                   ?>     
             </table>
             <!--br /-->

        </div>  

      </div>

    <br><br><br>

    <div class="col-md-6">
       <a href="../" class="btn btn-info">Voltar</a> 
    </div>

<?php
  }

 else 
 { ?>
    <h1 align="center">Error</h1>
<?php } ?>


    <?php     

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;



        // Load Composer's autoloader
        require 'vendor/autoload.php';

        $mail = new PHPMailer(true);
        /*href=" <?= base_url("css/bootstrap.css") ?> "
    '<link rel="stylesheet" href="bootstrap.min.css">';
        */
        if ( isset($_POST["action"]) )
        {
              include('pdf.php');
              $file_name = md5(rand()) . '.pdf';
              $html_code = '<link rel="stylesheet" href="http://localhost/web/css/bootstrap.css">';
              $html_code .= fetch_request_data();//($conexao2,$idUsuario);
              $pdf = new Pdf();
              $pdf->load_html($html_code);
              $pdf->render();
              $file = $pdf->output();
              file_put_contents($file_name, $file);
              /*
              *
              *
              * Deve ficar assim o campo de endereço para enviar email ao usuario,
              $mail->addAddress( <?= $usuario['email']?> , <?= $usuario['nome']?> ); 
              * Ele vai então enviar ao email no banco de dados do usuario
              * se quiser mandar pro seu email para testar faca o abaixo
              * 
              * $mail->addAddress('seuemailaqui@gmail.com', 'Seu Nome'); 
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
              $mail->Username   = 'seuemailaqui@gmail.com'; // SMTP username
              $mail->Password   = 'suasenhaemailgmail';// SMTP password

              $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
              $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
              $mail->CharSet = 'UTF-8';
              $mail->Encoding = 'base64';
              // Recipients
                 $mail->setFrom('seuemailaqui@gmail.com', 'Web Calçados');
              // Add a recipient        
                 $mail->addAddress( $usuario['email'],$usuario['nome']);

              // Anexos
              //$mail->addAttachment('application/views/produtos/nomeDoarquivo) // mesma pasta do programa
              $mail->addAttachment($file_name); // arquivo gerado

              // Content
              $mail->isHTML(true);                                  // Set email format to HTML
              $mail->Subject = 'Lista de Pedidos';
              $mail->Body    = 'Segue em Anexo o PDF , contendo a lista de pedidos';
              $mail->AltBody = 'Segue em Anexo o PDF , contendo a lista de pedidos';

              if ( $mail->send() )
              {  
                   $this->session->set_flashdata("success", "Email enviado com sucesso!" );
                   echo 'Email enviado com sucesso!';
              }

              } // fim try
              catch (Exception $e)
              {
                  $this->session->set_flashdata("danger", "Mensagem não pode ser enviada. Mailer Error:
                  {$mail->ErrorInfo}"); 

                  echo "Mensagem não pode ser enviada. Mailer Error:
                  {$mail->ErrorInfo}";
              }  // fim catch
              unlink($file_name);
        }  

?>


<script>

	$(function(){

  	});

</script>	