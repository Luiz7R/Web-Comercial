<?php
		$this->load->view('templates/header');
		$this->load->view('templates/nav-top');
		$this->load->view('templates/footer');
		$this->load->view('templates/js');
?>

<script>
/* Atualizar quantidade de itens */

function updateCartItem(obj, rowid)
{
	$.get("<?php echo base_url('index.php/carrinho/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
		
		if(resp == 'ok')
		{
			location.reload();
		}
		else
		{
			alert('Erro ao Atualizar o carrinho, tente novamente');
		}
	});
}
</script>

<!DOCTYPE HTML>

 <style>

 	body{
 	background-color: #D5CFCF;
 	}

</style>

<nav class="navbar navbar-dark bg-dark">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <!--a class="nav-link" href="../">Inicio <span class="sr-only">(Página atual)</span></a-->
      </li>
      <li class="nav-item">       
      </li>
    </ul>

  </div>
</nav>  
</nav>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">

     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="./">Inicio <span class="sr-only">(Página atual)</span></a>
            </li>
            <li class="nav-item">       
            </li>
          </ul>

        </div>

        <ul class="navbar-nav ml-auto">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="../">Produtos</a>
          </li>
          <!--li class="nav-item">
          	No futuro?
            <a class="nav-link" href="#">Categorias</a>
          </li-->
          <li class="nav-item">
            <a class="nav-link" href="#">Carrinho</a>
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


<br>

<h3 align="center">Carrinho</h3><br>

<div class="row cart">
	<table class="table">
	<thead>	
		<tr>
			 <th width="10%"></th>	
		     <th width="30%">Nome</th>
		     <th width="15%">Preço</th>
		     <th width="15%">Quantidade</th>
		     <th width="15%">Total</th>	
		     <th width="12%"></th>	
		</tr>		
	</thead>
	<tbody>
		<?php $count = 0; ?>
		<?php if ( $this->cart->total_items() > 0 ) {  
			

			foreach ( $this->cart->contents() as $items )
			{ $count++; ?>


				<tr>
					<td></td>
					<td><?php echo $items["name"] ?></td>
					<td><?php echo reais($items["price"]) ?></td>
					<td>
					<div class="form-group col-md-6">
						<input type="number" class="form-control text-center"
						value="<?php echo $items["qty"]; ?>" 
						onchange="updateCartItem(this, '<?php echo $items["rowid"]; ?>')">
					</div> 
					</td>
					<td><?php echo reais($items["subtotal"]) ?></td>
					<td>
						<a href="<?php echo base_url('index.php/carrinho/removeItem/'.$items["rowid"]);?>" class="btn btn-danger">Remover</a>
			        </td>	
				</tr>
			<?php } } else { ?>
				<tr><td colspan="6" align="center"><p>Carrinho Vazio..</p></td>
			<?php }	?>
	</tbody>

	<tfoot>
		 <td class="text-center">
			<td colspan="4">
				<?php if ( $this->cart->total_items() > 0 ) { ?>
				<strong><h5 align="right" style="margin-right:7%;">Total <?php echo reais($this->cart->total()); ?></h5></strong>
				<?php } ?>	
			</td>
		  </td>			
		<tr>	
			<td><a href="<?php echo base_url() ?>index.php/" class="btn btn-primary">Voltar</a></td>
			<td colspan="3"></td>
			<?php if ( $this->cart->total_items() > 0 ) { ?>
			<td></td>	
			<td><a href="./checkout/index" class="btn btn-success btn-block">Finalizar</a></td>
		    <?php } ?>

		</tr>	
	</tfoot>	
 	</table>

</div> 
