<div class="container">
	<form action="salvar/<?= $produto['id'] ?>" method="post">

		<input type ="hidden" name ="id" value="<?= $produto['id'] ?> ">
		<label for="nome">Nome</label>
		<input type="text" name="nome" class="form-control" value ="<?= $produto['nome'] ?>">

		<label for="nome">Preço</label>
		<input type="text" name="preco" class="form-control" value ="<?= $produto['preco'] ?>">

		<label for="nome">Descrição</label>	
		<textarea class="form-control" name="descricao" id="" cols="30" rows="10"><?= $produto['descricao'] ?></textarea>		

		<button type="submit" class="btn btn-primary">Salvar</button>
		<?= anchor("produtos/index", "Voltar", array('class' => 'btn btn-primary')); ?>
	</form>	
</div>