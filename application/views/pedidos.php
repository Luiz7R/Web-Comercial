<?php
		$this->load->view('templates/header');
		$this->load->view('templates/nav-top');
		$this->load->view('templates/footer');
		$this->load->view('templates/js');

		if ( $this->session->userdata("usuario_logado") )
		{

			 $idUsuario = $this->session->userdata("usuario_logado")['id'];
			 if ( $idUsuario == '3' )
			 {


// ----------- conexao sql , buscar dados de pedidos ------------

				$conexao = mysqli_connect("localhost", "root", "", "web1" );
				$selecionarTb = "SELECT * FROM pedidos ORDER BY id desc";	
				$resultado = mysqli_query($conexao, $selecionarTb);
				$message = '';
				$conexao2 = new PDO("mysql:host=localhost;dbname=web1", "root", "");


		        function fetch_request_data($conexao2)
		        {
		          $query = "SELECT * FROM pedidos";
		          $statement = $conexao2->prepare($query);
		          $statement->execute();
		          $result = $statement->fetchAll();
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
		          foreach($result as $row)
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
			    <?php if($this->session->flashdata("success")): ?>
			      <p class="alert alert-success">
			      	  <?= $this->session->flashdata("success") ?>
			      </p>  
			    <?php endif ?>  

			    <?php if($this->session->flashdata("danger")): ?>
			      <p class="alert alert-danger">
			      	<?= $this->session->flashdata("danger") ?>
			      </p>
			    <?php endif ?>	


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
            <ul class="navbar-nav mr-auto mt-2 mt-lg-3">
              <li class="nav-item active">
                <a class="nav-link" href="../">Inicio <span class="sr-only"></span></a>
              </li> 
                <li class="nav-item active">
                  <a class="nav-link" href="../admin/usuarios">Usuarios</a>
                </li> 
                 <li class="nav-item active">
                  <a class="nav-link" href="../admin/produtos/">Produtos</a>
                </li>                           
              <li class="nav-item">       
              </li>
            </ul>
          </div>			    		    


<h2>
<a href="../usuarios/conta" class="btn btn-primary btn-xs">Conta</a>
</h2>


<style>

h2 {
  position: absolute;
  left: 590px;
  top: 1px;
}

</style>


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
                 <?php if ( $this->cart->total_items() > 0 ) { ?>                	
                  <!--span class="badge badge-danger">
                     <#?php echo $this->cart->total_items();  ?> 
                  </span-->
                  <?php } ?>  
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

    <?php if($this->session->flashdata("success")): ?>
      <p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>  
    <?php endif ?>

<br><br>

<div class="container">

  <br>    
  <div class="card text">
       <h4 align="center">Lista de Pedidos</h4>  
  </div>
  <br>

      <br />
      <form method="post">
        <input type="submit" name="action" class="btn btn-danger" value="Enviar PDF" /><?php echo $message; ?>
      </form>

  <body>
    <br />
      <div class="row" style="width:900px;">

        <div class="col-md-3">
            <input type="text" name="de_data" id="de_data" class="form-control" placeholder="De Data">
        </div>

        <div class="col-md-3">
            <input type="text" name="a_data" id="a_data" class="form-control" placeholder="Para Data" />
        </div>

        <div class="col-md-5">
          <input type="button" name="filtrar" id="filtrar" value="Filtrar" class="btn btn-info" />
        </div>

        <div style="clear:both"></div>
        <br>
        <br><br>
        <div id="order_table">
             <table class="table table-bordered table-striped table-responsive" style=" width:120%">
                  <thead>
                  <tr>
                     <th width="20%">Código do Pedido</th>
                     <th width="180px">Data do Pedido</th>
                     <th>Observação</th>
                     <th width="130px">Forma de Pagamento</th> 
                     <th>Editar</th>
                     <th>Deletar</th>
                     <th>PDF</th>                  
                  </tr>  
                  </thead><!--td><?#php echo $row['order_date']; ?></td-->
                  <?php
                  while ( $row = mysqli_fetch_array($resultado) )
                  { 
                  ?>
                      <?php $mydt = DateTime::createFromFormat('Y-m-d', $row['order_date'] ); 
                        $formatd = $mydt->format('d/m/yy');
                      ?>
                          <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $formatd ?></td>
                            <td><?php echo $row['observacao']; ?></td>
                            <td><?php echo $row['payment_status']; ?></td>
                            <td><a href="javascript:;" class="btn btn-info btn-xs item-editar" data="<?php echo $row['id'] ?>">Editar</a></td>
                            <td><a href="javascript:;" class="btn btn-danger btn-xs item-delete" data="<?php echo $row['id'] ?>">Deletar</a></td>
                            <td><a href="pdfdetalhes/<?php echo $row['id'] ?>" class="btn btn-success btn-xs item-pdf" data="'+data[i].id+'">PDF</a></td>                            
                          </tr>  
                  <?php
                  }
                  ?>
             </table>

             <br />

        </div>  

      </div>
</div>


        <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal Title</h4>
              </div>  
              <div class="modal-body">
                  <form id="myForm" action="" method="post" class="form-horizontal">
                    <input type="hidden" name="txtId" value="0">
                    <div class="form-group">
                      <label for="pedido" class="label-control col-md-5">Codigo do Pedido</label>
                      <div class="col-md-10">
                        <input type="text" name="txtCodigoProduto" class="form-control">
                      </div>
                    </div> 
                    <div class="form-group">
                       <label for="pedido" class="label-control col-md-5">Data do Pedido</label> 
                       <div class="col-md-10">
                        <input type="text" name="txtDataPedido" class="form-control">
                       </div>  
                    </div>
                    <div class="form-group">
                      <label for="pedido" class="label-control col-md-5">Observação</label>
                        <div class="col-md-10">
                          <textarea name="txtObservacao" class="form-control"></textarea>  
                        </div>
                    </div>
                    <div class="form-group">
                       <label for="pedido" class="label-control col-md-5">Forma de Pagamento</label>
                       <div class="col-md-10">
                          <input type="text" name="txtPagamento" class="form-control">
                       </div> 
                    </div>
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button> 
                  <button type="button" id="btnSalvar" class="btn btn-primary">Salvar Mudanças</button>
              </div>
            </div><!-- /.modal-content -->            
          </div><!-- /.modal-dialog --> 
        </div><!-- /.modal -->


        <div id="modalDeletar" class="modal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Confirmar Exclusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Você quer Excluir esse Pedido?
              </div>
              <div class="modal-footer">      
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" id="btnDeletar" class="btn btn-danger">Excluir</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog --> 
        </div><!-- /.modal --> 



        <button id="novoPedido" class="btn btn-primary" style="margin-left: 1%;">Novo pedido</button>


        <div id="order_pUser"> <!--  Mostrar usuario buscado -->
         
        <br />
        </div> 

        <br>
        <h5 style="text-align:left; margin-left: 22;"> Buscar pedido, do usuario.</h5>
        <div class="col-md-3">
            <input type="text" name="buscarPedidos" id="buscarpedidos" class="form-control" placeholder="Buscar pedidos do usuario, digite o Id" />
        </div>
        <div class="col-md-5">
          <input type="button" name="buscar" id="buscar" value="Buscar" class="btn btn-info" />
        </div>
<?php			      
			 }
			 else
			 {
			 	  header("location: ../");
			 	  return false;
			 }	 			
		}


// ------------------ lembrete ( use e require fora de if ) -------


        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;



        // Load Composer's autoloader
        require 'produtos/vendor/autoload.php';

        $mail = new PHPMailer(true);
        /*href=" <#?= base_url("css/bootstrap.css") ?> "
		'<link rel="stylesheet" href="bootstrap.min.css">';
        */
        if ( isset($_POST["action"]) )
        {
              include('pdf.php');
              $file_name = md5(rand()) . '.pdf';
              $html_code = '<link rel="stylesheet" href="http://localhost/web/css/bootstrap.css">';
              $html_code .= fetch_request_data($conexao2);
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
        }  


?>


  <script>


      mostrarPedidos();

      $(document).ready(function() {
        $.datepicker.setDefaults({
            dateFormat:'dd/mm/yy',
            dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
            monthNames: [ "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ]             
        })
        $( function() {
          $( "#de_data" ).datepicker( );          
          $( "#a_data" ).datepicker( );
        });

        $('#filtrar').click(function(){
            var de_data = $('#de_data').val();


            var a_data = $('#a_data').val();
            
            if( de_data != '' && a_data != '' )
            {
                 $.ajax({
                    url:"filtrar",
                    method:"POST",
                    async:false,
                    data:{de_data:de_data, a_data:a_data},
                    success:function(data)
                    {
                        $('#order_table').html(data);
                    }
                 });
            }
            else
            {
                alert ( " Selecione uma data " );
            }  
        });

        $('#buscar').click(function(){
            var buscarpedidos = $('#buscarpedidos').val();

            if( buscarpedidos != '' )
            {
                 $.ajax({
                    url:"buscar",
                    method:"POST",
                    async:true,
                    data:{buscarpedidos:buscarpedidos},
                    success:function(data)
                    {
                        $('#order_pUser').html(data);
                    }
                 });
            }
            else
            {
                alert ( " Digite um ID " );
            }  
        });

        $('#novoPedido').click(function() {
           $('#myModal').modal('show');
           $('#myModal').find('.modal-title').text('Add Novo Pedido');
           $('#myForm').attr('action', '<?php base_url() ?>addPedidos');
        });

        $('#btnSalvar').click(function(){
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize( );
            var codigoPedido = $('input[name=txtCodigoProduto]');
            var dataPedido = $('input[name=txtDataPedido]');
            var observacao = $('input[name=txtObservacao]');
            var pagamento = $('input[name=txtPagamento]');
            var resultado = '';

            if ( codigoPedido.val() == '' )
            {
                 codigoPedido.parent().parent().addClass('has-error');
            } else {
                 codigoPedido.parent().parent().removeClass('has-error');
                 resultado += '1'; 
            } 
            if ( dataPedido.val() == '' )
            { 
                 dataPedido.parent().parent().addClass('has-error');
            }
            else
            {
                dataPedido.parent().parent().removeClass('has-error');
                resultado += '2';
            }
            if ( observacao.val() == '' )
            {
                 observacao.parent().parent().addClass('has-error'); 
            }
            else
            {
                 observacao.parent().parent().removeClass('has-error');
                 resultado += '3';
            } 
            if ( pagamento.val() == '' )
            {
                pagamento.parent().parent().addClass('has-error');
            }  
            else
            {
                pagamento.parent().parent().removeClass('has-error');
                resultado += '4';
            }

            if ( resultado == '1234' )
            {
                 $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: url,
                    data:data,
                    async: false,
                    dataType: 'json',
                    success: function(response)
                    {
                        if ( response.success ) {
                             $('#myModal').modal('hide');
                             $('#myForm')[0].reset();

                             if ( response.type == 'add' )
                             {
                                  var type = 'Adicionado'; 
                             } else if ( response.type = 'update' )
                             {
                                  var type = 'Atualizado';
                             }
                             $('.alert-success').html('Pedido ' +type+ ' com Sucesso').fadeIn( ).delay(4000).fadeOut('slow');
                               mostrarPedidos();
                             }
                             else
                             {
                                  alert('Error 2');
                             } 
                    },
                    error: function ()
                    {
                        alert('Não foi possivel adicionar os dados')
                    }
                 });
            }  
        }); // btnSalvar

        $('.item-delete').click(function( ){
            var id = $(this).attr('data');
            $('#modalDeletar').modal('show');
            $('#btnDeletar').unbind().click(function(){
              $.ajax({
                type: 'ajax',
                method: 'get',
                async: false,
                url : '<?php echo base_url() ?>index.php/admin/deletarPedido',
                data: { id:id },
                dataType: 'json',
                success: function(response)
                {
                   if ( response.success )
                   {
                        $('#modalDeletar').modal('hide');
                        $('.alert-success').html('Pedido deletado com sucesso').fadeIn().delay(4000).fadeOut('slow');
                        mostrarPedidos();
                   }
                   else
                   {
                        alert('Erro');
                   } 
                },
                error: function()
                {
                   alert( 'Erro ao tentar Deletar ' );
                }
              });
            });
        }); // deletar pedido

        $('.item-editar').click(function(){
           var id = $(this).attr('data');
           $('#myModal').modal('show');
           $('#myModal').find('.modal-title').text('Editar Pedido');
           $('#myForm').attr('action', '<?php echo base_url( ) ?>index.php/admin/updatePedidos');
           $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url( ) ?>index.php/admin/EditarPedidos',
            data: {id: id},
            async: false,
            dataType: 'json',
            success:function(data)
            {
                var formatarData = new Date(data.order_date);
                var dataFormatada = formatarData.toLocaleDateString();
                $('input[name=txtCodigoProduto]').val(data.id);
                $('input[name=txtDataPedido]').val(data.order_date);
                $('textarea[name=txtObservacao]').val(data.observacao);
                $('input[name=txtPagamento]').val(data.payment_status);
                $('input[name=txtId]').val(data.id);
            },
            error:function()
            {
              alert ('Não Foi possivel Editar');
            }
           });
        });  

      }); // documentReady


      // function mostrarPedidos
        function mostrarPedidos(){


          $.ajax({
            url: '<?php base_url() ?>../admin/mostrarPedidos',
            async: true,
            dataType: 'json',
            success: function (data){
              var html = '';
              var i;

            //let formatter = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' });

              for ( i = 0; i < data.length; i++ )
              {
                  //let preco = formatter.format(data[i].preco);
                    var dataFormatada = new Date(data[i].order_date);
                    //console.log( dataDD.toLocaleDateString() );

                html +='<tr>'+
                       '<td>'+data[i].id+'</td>'+
                       '<td>'+dataFormatada.toLocaleDateString()+'</td>'+
                       '<td>'+data[i].observacao+'</td>'+
                       '<td>'+data[i].payment_status+'</td>'+                       
                       '<td></td>'+
                        '<a href="javascript:;" class="btn btn-info btn-xs item-edit" data="'+data[i].id+'">Editar</a>'+
                        '<a href="javascript:;" class="btn btn-danger btn-xs item-delete" data="'+data[i].id+'">Deletar</a>'+ 
                        '<a href="javascript:;" class="btn btn-success btn-xs item-pdf" data="'+data[i].id+'">Ver PDF</a>'+
                      '</td>'+  
                      '</tr>';
              }
              $('#showdataPedidos').html(html);
            },
            error: function(){
              alert('erro');
            }
          });
        }


  </script>
