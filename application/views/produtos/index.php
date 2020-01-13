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
		</table>	
</div>		
</body>	
</html>