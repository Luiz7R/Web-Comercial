<?php
		$this->load->view('templates/header');
		$this->load->view('templates/nav-top');
		$this->load->view('templates/footer');
		$this->load->view('templates/js');
?>

<!DOCTYPE html>
<html>
<head>


<nav class="navbar navbar-dark bg-dark">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="../">Inicio <span class="sr-only">(Página atual)</span></a>
      </li>
      <li class="nav-item">       
      </li>
    </ul>

  </div>
</nav>  
</nav>

<!-- Modal Usuario -->

<div id="myModalUsuario" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
          <form id="myFormUsuario" action="" method="post" class="form-horizontal">
            <input type="hidden" name="txtId" value="0">
            <div class="form-group">
              <label for="Id.usuario" class="label-control col-md-5">Id</label>
              <div class="col-md-10">
                <input type="text" name="txtidUsuario" class="form-control">
              </div>
            </div>            
            <div class="form-group">
              <label for="usuarioNome" class="label-control col-md-5">Nome do Usuário</label>
              <div class="col-md-10">
                <input type="text" name="txtNomeUsuario" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="usuarioCpf" class="label-control col-md-5">CPF</label>
              <div class="col-md-10">
                <input type="text" name="txtCpf" class="form-control">
              </div>
            </div>            
            <div class="form-group">
              <label for="sexo" class="label-control col-md-5">Sexo</label>
              <div class="col-md-10">
                <input class="form-control" name="txtSexo"></input>
              </div>
            </div>
            <div class="form-group">
              <label for="produto" class="label-control col-md-5">Email</label>
              <div class="col-md-10">
                <input type="preco" name="txtEmail" class="form-control">
              </div>
            </div>            
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnSaveUsuario" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="modalDeletarUsuario" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmar Exclusão</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          Você quer Excluir esse Usuário?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="button" id="btnDeletarUsuario" class="btn btn-danger">Excluir</button>
      </div>
    </div>
  </div>
</div>

  
 <style>

  body{
  background-color: #D5CFCF;
  }


  h1 {
    text-align: center;
  }


 </style>
</head>
</html>


<?php $idUsuario = $this->session->userdata('usuario_logado')['id']; ?>
        
<?php if ($idUsuario == '3'): ?>
            <!--#?= anchor("produtos/usuarios", "Usuarios", array("class" => "btn btn-primary btn-md float-right")) ?-->

<!DOCTYPE html>
<html>
<head>
<style>
h1 {
  text-align: center;
}

</style>
</head>
<body>
  <div class="container">


    <br>
    <h1>Usuários Cadastrados</h1>	
    <div class="alert alert-success" style="display: none;">
    </div>

    		<table class="table">
    		  <thead>	
    			<tr>
    				 <th>Id</th>
    				 <th>Nome</th>
             <th>Cpf</th>
             <th>Sexo</th>
             <th>Email</th>
    			</tr>
    		  </thead>	
    		  <tbody id="showdata">
    		  	
    		  </tbody>		  	
    		</table>
  </div>      
</body>
</html>

<script>
	
	$(function(){
		mostrarUsuarios();

      $('#btnSaveUsuario').click(function(){
        var url = $('#myFormUsuario').attr('action');
        var data = $('#myFormUsuario').serialize( );

        var id_Us = $('input[name=txtidUsuario]');
        var cpfUsuario = $('input[name=txtCpf]');
        var nomeUsuario = $('input[name=txtNomeUsuario]');
        var sexo = $('input[name=txtSexo]');
        var email = $('input[name=txtEmail]');
        var result = '';

        if(id_Us.val()==''){
          id_Us.parent().parent().addClass('has-error');
        }else{
          id_Us.parent().parent().removeClass('has-error');
          result += '1';
        }       
        if(nomeUsuario.val()==''){
          nomeUsuario.parent().parent().addClass('has-error');
        }else{
          nomeUsuario.parent().parent().removeClass('has-error');
          result += '1';
        }
        if(cpfUsuario.val()==''){
          cpfUsuario.parent().parent().addClass('has-error');
        }else{
          cpfUsuario.parent().parent().removeClass('has-error');
          result += '1';
        }         
        if(sexo.val()==''){
          sexo.parent().parent().addClass('has-error');
        }else{
          sexo.parent().parent().removeClass('has-error');
          result += '2';
        }
        if(email.val()==''){
          email.addClass('has-error');
        }else{
          email.removeClass('has-error');
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
                    console.log("teste");
                      if(response.success){ 
                      $('#myModalUsuario').modal('hide');
                      $('#myFormUsuario')[0].reset();
                      if(response.type == 'add' ){
                          var type = 'Adicionado';
                      }else if(response.type == 'update' ) {
                          var type = 'Atualizado';
                      }
                      $('.alert-success').html('Usuario '+type+' com Sucesso').fadeIn( ).delay(4000).fadeOut('slow');
                      mostrarUsuarios();
                      }else{
                        alert('Error !');
                      } 
                  },
                  error: function(){
                    alert('Nao foi possivel adicionar dados ');
                  }
              });
        }

      });  

  // editar usuarios
     $('#showdata').on('click', '.item-edit', function(){
       var id = $(this).attr('data');
       $('#myModalUsuario').modal('show');
       $('#myModalUsuario').find('.modal-title').text('Editar Usuario');
       $('#myFormUsuario').attr('action', '<?php echo base_url() ?>index.php/usuarios/updateUsuario');
         $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php  echo base_url( ) ?>index.php/usuarios/EditarUsuario',
            data: {id: id},
            async: false,
            dataType: 'json',
            success: function(data){
              $('input[name=txtidUsuario]').val(data.id);
              $('input[name=txtCpf]').val(data.cpf);              
              $('input[name=txtNomeUsuario]').val(data.nome);
              $('input[name=txtSexo]').val(data.sexo);
              $('input[name=txtEmail]').val(data.email);
            },
            error: function(){
              alert('Nao foi possivel Editar'); 
            }
         });       
      }); 


  // deletar usuario
 
     $('#showdata').on('click', '.item-delete', function(){
       var id = $(this).attr('data');
       $('#modalDeletarUsuario').modal('show');
       $('#btnDeletarUsuario').unbind( ).click(function(){
         $.ajax({
          type: 'ajax',
          method: 'get',
          async: false,
          url: '<?php  echo base_url( ) ?>index.php/usuarios/deletarUsuario',
          data: {id: id},
          dataType: 'json',
          success: function(response){
            if(response.success){
              $('#modalDeletarUsuario').modal('hide');
              $('.alert-success').html('Usuário deletado com Sucesso').fadeIn().delay(4000).fadeOut('slow');
              mostrarUsuarios( );
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


  			function mostrarUsuarios(){
  				$.ajax({ 					
  					url: '<?php base_url() ?>mostrarUsuarios',
  					async: true,
  					dataType: 'json',
  					success: function (data){
  						var ht = '';
  						var i;
  						for ( i = 0; i < data.length; i++ )
  						{
  							
  							ht +='<tr>'+
  									  '<td>'+data[i].id+'</td>'+
		  							   '<td>'+data[i].nome+'</td>'+
                       '<td>'+data[i].cpf+'</td>'+
                       '<td>'+data[i].sexo+'</td>'+
		  							   '<td>'+data[i].email+'</td>'+
		  							   '<td>'+
			  								'<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'">Editar</a>'+
			  								'<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id+'">Deletar</a>'+
			  							'</td>'+	
	  							    '</tr>';
  						}
  						$('#showdata').html(ht)
  					}

  				});
  			}

	});


</script>

<?php endif ?>


<!--?php
if ( $idUsuario != '3' || strstr($_SERVER['REQUEST_URI'],'index.php')){
    header('HTTP/1.0 404 Not Found');
    echo "<h1>404 Not Found</h1>";
    echo "The page that you have requested could not be found.";
    exit();
}
?-->