<?php

		if ( $this->session->userdata("usuario_logado") )
		{

			 $idUsuario = $this->session->userdata("usuario_logado")['id'];
			 if ( $idUsuario == '3' )
			 {
			 ?>
			 		

<div class="wrapper">
	<div class="sidebar">
		<br>	
		<h5 style="color:white;">&nbsp;Administrador</h5>
		<ul>
			<li style="color:white; list-style: none;">
				<a href="produtos"><i style="color:white;">Produtos Cadastrados</i></a></li>
			</li>
			<li style="color:white; list-style: none;">
				<a href="usuarios"><i style="color:white;">Usuarios Cadastrados</i></a>
			</li>
			<li style="color:white; list-style: none;">
				<a href="pedidos"><i style="color:white;">Pedidos Realizados</i></a>
			</li>	
		<ul>
	</div>
</div>
<div class="container" align="center">
		<h5>Painel de Administrador</h5>
			
</div>	

<?php 
		}
		else
		{
			header("location: ./");
			return false;
		}	
	}	
?>
 <style>

 	.wrapper{
 		display:flex;
 		position:relative;
 	}

 	.wrapper .sidebar {
 		position:fixed;
 		width:230px;
 		height:100%;
 		background:#262526;
 		padding:30px 0;
 	}

 	.wrapper .sidebar h5{
 		color:#fff;
 		text-transform: uppercase;
 		text-align: center;
 		margin-bottom: 30px;
 	}

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
