<?php
		$this->load->view('templates/header');
		$this->load->view('templates/nav-top');
		$this->load->view('templates/footer');
		$this->load->view('templates/js');
?>

<!-- Estilo -->

 <style>

  body
  {
  		background-color: #D5CFCF;



  }
  .orderBtn {
  	 margin-left: 77%; /* Coloca o Button de fechar o pedido na esquerda */
  }

 </style>




<!-- Pedido -->

<h2 align="center">Visualização do Pedido</h2>
<br><br>

<br><br>
<div class="row checkout">
	<table class="table">
		<thead>
		   <tr>
		   		<th width="13%"></th>
		   		<th width="34%">Produto</th>
		   		<th width="18%">Preço</th>
		   		<th width="13%">Quantidade</th>
		   		<th width="22%">Total</th>
		   </tr>
		</thead>
		<tbody>
            <?php $dadosPedido = ''; ?>

	        <?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){ ?>
                <?php $dadosPedido .= ' Produto : ' .$item["name"] . ' Quantidade : ' . $item["qty"] . ' Preço : ' . reais($item["subtotal"]) ."\n"; ?>
	        <tr>
	            <td>
	            </td>
	            <td><?php echo $item["name"]; ?></td>
	            <td><?php echo '$'.$item["price"]; ?></td>
	            <td><?php echo $item["qty"]; ?></td>
	            <td><?php echo reais($item["subtotal"]); ?></td>
	        </tr>
	        <?php } } else{ ?>
	        <tr>
	            <td colspan="5"><p>Sem Items no seu carrinho...</p></td>
	        </tr>
	        <?php } ?>
	    </tbody>
	    <tfoot>
	    	<tr>
	    		<td colspan="4">
	    			<?php if ( $this->cart->total_items() > 0 ) { ?>
	    				<td class="text-center">
	    			      	<strong>Total <?php echo reais($this->cart->total()); ?></strong>
	    			    </td>  	
	    			<?php } ?>	
	    		</td>	
	    	</tr>	
	    </tfoot>
    </table>
</div>



<br><br>

<div class="container-fluid">
<div class="row col-sm-10">
  <section id="conteudo">
<div class="form-group col-md-6">
    <label for="pagamento"><strong>Escolha a Forma de pagamento</strong></label>
    <select id="pagamento">
        <option>Selecione</option>
        <option value="Dinheiro">Dinheiro</option>    
        <option value="Cartão">Cartão de Credito</option>
        <option value="Cheque">Cheque</option>
    </select>
</div>
</section>
</div>


<script>
    
var count = 1;
$(document).on('change', '#pagamento', function(){

  $('#nomePagamento'+count).val(this.value);
});

</script>

    <!-- Shipping address -->
    <form class="form-horizontal" method="post">
    <div class="ship-info">
            <h4></h4>
            <input type="hidden" class="form-control" name="dadosdoPedido" id="dadosPedidos1" value="<?php echo $dadosPedido?>">
            <input type="hidden" class="form-control" name="nomePagamento" id="nomePagamento1">             

        <?php

            if ( empty($dadosUs['usuario']['endereco']) )
            {
                 echo '<div class="form-group"';
                 echo "<br>";
                 //echo $dadosUs['usuario']['endereco'];
                 echo "<br><br>";
                 echo '<label>
                 <strong class="col-sm-10"> Endereço de entrega não cadastrado, cadastre abaixo o seu endereço</strong>
                 </label>';
                 echo "</div>";                
            ?>  
            <div class="col-sm-10">   
            <input type="text" class="form-control" name="endereco" id="enderecoUs" placeholder="Digite o Endereço">
            </div>
            <br>
            </div>
        <?php                     
            }    
        ?>
    </div>

<br>
    <div class="footBtn">
        <a href="../carrinho" class="btn btn-warning">Voltar Carrinho</a>    	
        <button type="submit" name="placeOrder" class="btn btn-success orderBtn">Fechar Pedido</button>
    </div>




			
		


