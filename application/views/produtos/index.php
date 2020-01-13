<html>
<head>
	<link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?> ">
	<title>Web</title>
</head>	
<body>
<div class="container">
		<h1>Produtos</h1>
		<table class="table">
			<tr>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Preço</th>
			</tr>
			<?php foreach ($produtos as $produto) : ?>
			<tr>
				<td><?= $produto['nome']?></td>
				<td><?= $produto['descricao']?></td>
				<td><?= reais($produto['preco']) ?></td>
			</tr>	
			<?php endforeach ?>
<<<<<<< HEAD
		</table>

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
=======
		</table>	
>>>>>>> f1dd9f9a16bad4cdcc5f616b73fc7d7d78dcd0f2
</div>		
</body>	
</html>