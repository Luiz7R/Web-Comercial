<!DOCTYPE html>
<html>
<head>

  <nav class="navbar navbar-dark bg-dark">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">     
    </div>
  </nav>  
  </nav>


</head>
  <nav class="navbar navbar-dark bg-dark">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
        </li>
        <li class="nav-item">       
        </li>
      </ul>

    </div>
  </nav>  
  </nav>


<body>



    <?php if($this->session->userdata("usuario_logado")) : ?>
    		<?php $idUsuario = $this->session->userdata('usuario_logado')['id']; ?>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
              <div class="outer">
                  <a href="usuarios/conta" class="btn btn-primary btn-xs">Conta</a>
              </div>      
        </div>

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
                <a class="nav-link" href="">Inicio <span class="sr-only">(Página atual)</span></a>
              </li>
    	      	<?php if ($idUsuario == '3'): ?> 
                <li class="nav-item active">
    	      			<a class="nav-link" href="admin/usuarios">Usuarios</a>
                </li>
                  
                <li class="nav-item active">
                  <a class="nav-link" href="admin/pedidos">Pedidos</a>
                </li>               

    	        <?php endif ?>

              <li class="nav-item">       
              </li>
            </ul>
          </div>

<h2>
<a href="usuarios/conta" class="btn btn-primary btn-xs">Conta</a>
</h2>
<style>

h2 {
  position: absolute;
  left: 590px;
  top: -60px;
}

</style>          
          <ul class="navbar-nav ml-auto">

          <ul class="navbar-nav">

              <li class="nav-item">
                <a class="nav-link" href="#">Categorias</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php base_url() ?>carrinho">Carrinho</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                 <?php if ( $this->cart->total_items() > 0 ) { ?>                 
                  <span class="badge badge-danger">
                     <?php echo $this->cart->total_items();  ?> 
                  </span>
                  <?php } ?>
                 </a>
              </li>                             
          </ul> 
        </div>
    </nav>


<?php endif ?> 

</body>
            


 <style>

 	body{
 	background-color: #D5CFCF;
 	}

.outer
{
      margin-left: 550px;
}

	h1 {
	  text-align: center;
	}

  .card {
     background-color: #B5B0B0;
  }


 </style>


</head>

<div class="container">

  <br>

		<?php if($this->session->flashdata("success")): ?>
			<p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>	
		<?php endif ?>	

		<?php if($this->session->flashdata("danger")): ?>
			<p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>			
		<?php endif ?>		
    	

		<?php if($this->session->userdata("usuario_logado")) : ?>

            <?php $idUsuario = $this->session->userdata('usuario_logado')['id']; ?>

		<h1>Produtos</h1>
		<div class="alert alert-success" style="display: none;">


		</div>	 


		<table class="table">
		  <thead>	
			<tr>
				 <th>Nome</th>
				 <th>Descricão</th>
				 <th>Cor</th>
				 <th>Tamanho</th>
				 <th>Preço</th>
         <th></th>
			</tr>
		  </thead>	
		  <tbody id="showdata">
                      	  	
		  </tbody>	

		</table> 



  <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Modal title</h4>
        </div>
        <div class="modal-body">
          	<form id="myForm" action="" method="post" class="form-horizontal">
          		<input type="hidden" name="txtId" value="0">
          		<div class="form-group">
          			<label for="produto" class="label-control col-md-5">Nome do Produto</label>
          			<div class="col-md-10">
          				<input type="text" name="txtNomeProduto" class="form-control">
          			</div>
          		</div>
          		<div class="form-group">
          			<label for="produto" class="label-control col-md-5">Cor</label>
          			<div class="col-md-10">
          				<input type="text" name="txtCorProduto" class="form-control">
          			</div>
          		</div>
          		<div class="form-group">
          			<label for="produto" class="label-control col-md-5">Tamanho</label>
          			<div class="col-md-10">
          				<input type="text" name="txtTamanho" class="form-control">
          			</div>
          		</div>
          		<div class="form-group">
          			<label for="descricao" class="label-control col-md-5">Descricao</label>
          			<div class="col-md-10">
          				<textarea class="form-control" name="txtDescricao"></textarea>
          			</div>
          		</div>
          		<div class="form-group">
          			<label for="produto" class="label-control col-md-5">Preço</label>
          			<div class="col-md-10">
          				<input type="preco" name="txtPreco" class="form-control">
          			</div>
          		</div>        		
          	</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
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
        		Você quer Excluir esse Produto?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          <button type="button" id="btnDeletar" class="btn btn-danger">Excluir</button>
        </div>
      </div>
    </div>
  </div>
  </ul></div></nav>





 <div class="col-lg-6 col-md-6">
  <div id="cart_details">
   <h3 align="center"></h3>
  </div>

 </div>

<script type="text/javascript">


  $(document).ready(function(){
     $('.submitpro').on('submit', function(e){
        e.preventDefault();
        var product_num = $(this).find('.item-carrinho').data('dataid');
        var product_qt = $(this).find('').val('');
     });

  });

</script>

    
  
    

<script>
  


  $(function(){

  		mostrarProdutos();

  		$('#novoProduto').click(function(){
  			$('#myModal').modal('show');
  			$('#myModal').find('.modal-title').text('Add Novo Produto');
  			$('#myForm').attr('action', '<?php base_url() ?>produtos/addProdutos');
  		});



  		$('#btnSave').click(function(){
  			var url = $('#myForm').attr('action');
  			var data = $('#myForm').serialize( );

  			var nomeProduto = $('input[name=txtNomeProduto]');
  			var nomeDescricao = $('textarea[name=txtDescricao]');
  			var preco = $('textarea[name=txtPreco]');
  			var result = '';

			if(nomeProduto.val()==''){
				nomeProduto.parent().parent().addClass('has-error');
			}else{
				nomeProduto.parent().parent().removeClass('has-error');
				result += '1';
			}
			if(nomeDescricao.val()==''){
				nomeDescricao.parent().parent().addClass('has-error');
			}else{
				nomeDescricao.parent().parent().removeClass('has-error');
				result += '2';
			}
			if(preco.val()==''){
				preco.addClass('has-error');
			}else{
				preco.removeClass('has-error');
				result += '3';
			}

			if ( result == '123' ){
				$.ajax({
				  	type: 'ajax',
				  	method: 'post',
				  	url: url,
				  	data: data,
				  	async: false,
				  	dataType: 'json',
				  	success: function(response){
				  	    if(response.success){	
				  		  $('#myModal').modal('hide');
				  		  $('#myForm')[0].reset();
				  		  if(response.type == 'add' ){
				  		  	  var type = 'Adicionado';
				  		  }else if(response.type == 'update' ) {
				  		  	  var type = 'Atualizado';
				  		  }
				  		  $('.alert-success').html('Produto '+type+' com Sucesso').fadeIn( ).delay(4000).fadeOut('slow');
				  		  mostrarProdutos();
				  	    }else{
				  	  	  alert('Error 2');
				  	    }	
				  	},
				  	error: function(){
				  		alert('Nao foi possivel adicionar dados ');
				  	}
				});
			}						
  		});


  // editar produto
  	 $('#showdata').on('click', '.item-edit', function(){
  	 	 var id = $(this).attr('data');
  	 	 $('#myModal').modal('show');
  	 	 $('#myModal').find('.modal-title').text('Editar Produto');
  	 	 $('#myForm').attr('action', '<?php echo base_url() ?>index.php/produtos/updateProdutos');
  	 	 $.ajax({
  	 	 	type: 'ajax',
  	 	 	method: 'get',
  	 	 	url: '<?php  echo base_url( ) ?>index.php/produtos/EditarProdutos',
  	 	 	data: {id: id},
  	 	 	async: false,
  	 	 	dataType: 'json',
  	 	 	success: function(data){
  	 	 		$('input[name=txtNomeProduto]').val(data.nome);
  	 	 		$('input[name=txtCorProduto]').val(data.cor);
  	 	 		$('input[name=txtTamanho]').val(data.tamanho);
  	 	 		$('textarea[name=txtDescricao]').val(data.descricao);
  	 	 		$('input[name=txtPreco]').val(data.preco);
  	 	 		$('input[name=txtId]').val(data.id);
  	 	 	},
  	 	 	error: function(){
  	 	 		alert('Nao foi possivel Editar');	
  	 	 	}
  	 	 });
  	 });
  

  // deletar produto
  	 $('#showdata').on('click', '.item-delete', function(){
  	 	 var id = $(this).attr('data');
  	 	 $('#modalDeletar').modal('show');
  	 	 $('#btnDeletar').unbind( ).click(function(){
  	 	 	 $.ajax({
	  	 	 	type: 'ajax',
	  	 	 	method: 'get',
	  	 	 	async: false,
	  	 	 	url: '<?php  echo base_url( ) ?>index.php/produtos/deletarProduto',
	  	 	 	data: {id: id},
	  	 	 	dataType: 'json',
	  	 	 	success: function(response){
	  	 	 		if(response.success){
		  	 	 		$('#modalDeletar').modal('hide');
		  	 	 		$('.alert-success').html('Produto deletado com Sucesso').fadeIn().delay(4000).fadeOut('slow');
		  	 	 		mostrarProdutos( );
	  	 	 		}else{
	  	 	 			alert('Erro');	
	  	 	 		}
	  	 	 	},
	  	 	 	error: function(){
	  	 	 		alert('Erro ao tentar deletar');	
	  	 	 	}
  	 	 	 });
  	 	 });
  	 });


  		// function mostrarProdutos
  			function mostrarProdutos(){


  				$.ajax({
  					url: '<?php base_url() ?>produtos/mostrarProdutos',
  					async: true,
  					dataType: 'json',
  					success: function (data){
  						var html = '';
  						var i;
  					let formatter = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' });
//                       '<td>'+data[i].tamanho+'</td>'+

  						for ( i = 0; i < data.length; i++ )
  						{
  							  let preco = formatter.format(data[i].preco);	

                   html +='<tr>'+ 
                             '<td>'+data[i].nome+'</td>'+
                             '<td>'+data[i].descricao+'</td>'+
                             '<td>'+data[i].cor+'</td>'+
                             '<td>'+data[i].tamanho+'</td>'+
                             '<td>'+preco+'</td>'+
                             '<td>'+
                               '<a href="produtos/addCarrinho/'+data[i].id+'" class="btn btn-info btn-block">Comprar</a>'+
                            '</td>'+  
                            '</tr>';                          
  						}
              
  						$('#showdata').html(html);
  					},
  					error: function(){
  						alert('erro');
  					}
  				});
          
  			}

  });
      


</script>
		
		<?= anchor("login/logout", "Sair", array("class" => "btn btn-primary")) ?>	
	</div>

		<?php else : ?>
		<br><br>
		<h1>Login</h1>	

		<?php 
			echo form_open ( "login/autenticar");

			echo form_label("Email", "email");
			echo form_input(array(
				"name" => "email",
				"id"	=> "email",
				"class" => "form-control",
				"maxlength" => "255"
			));

			echo form_label("Senha", "senha");
			echo form_password(array(
				"name" => "senha",
				"id"	=> "senha",
				"class" => "form-control",
				"maxlength" => "255"
			));			

			echo form_button(array(
				"class" => "btn btn-primary",
				"type" => "submit",
				"content" => "Login"
			));
			echo form_close();
		?>

		<h1>Cadastro</h1>	

		<?php 
			echo form_open ( "usuarios/novo");

			echo form_label("Nome", "nome");
			echo form_input(array(
				"name" => "nome",
				"id"	=> "nome",
				"class" => "form-control",
				"maxlength" => "255"
			));

			echo form_label("Cpf", "cpf");
			echo form_input(array(
				"name" => "cpf",
				"id"	=> "cpf",
				"class" => "form-control",
				"maxlength" => "20"
			));

			echo form_label("Sexo", "sexo");
			echo form_input(array(
				"name" => "sexo",
				"id"	=> "sexo",
				"class" => "form-control",
				"maxlength" => "25"
			));

			echo form_label("Email", "email");
			echo form_input(array(
				"name" => "email",
				"id"	=> "email",
				"class" => "form-control",
				"maxlength" => "255"
			));

			echo form_label("Senha", "senha");
			echo form_password(array(
				"name" => "senha",
				"id"	=> "senha",
				"class" => "form-control",
				"maxlength" => "255"
			));			

			echo form_button(array(
				"class" => "btn btn-primary",
				"type" => "submit",
				"content" => "Cadastrar"
			));
			echo form_close();
		?>


	<?php endif ?>

	

