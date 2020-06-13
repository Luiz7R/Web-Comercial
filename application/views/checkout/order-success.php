<?php
        $this->load->view('templates/header');
        $this->load->view('templates/nav-top');
        $this->load->view('templates/footer');
        $this->load->view('templates/js');
?>



<style> 

h3
{
    color:green;
    padding-right: 70%; 
}


</style>


<div class="card-header">

     <h3 align="center">Status do Pedido</h3>
   
</div>
<br>
<!--table>
<h2 align="center"> Status do Pedido </h2>
</table-->
<p class="ord-succ" style="padding-left: 8%; font-size: 130%;"> Seu pedido foi realizado com Sucesso</p>
<br>
<!--status do pedido & informacao de entrega -->

<div class="card-header">   
<div class="row col-lg-12 ord-addr-info">
    <div class="col-sm-6 adr">
    </div>
      </div>  
    <?php 
        // Formatar data 
           $formatacao = DateTime::createFromFormat('Y-m-d', $order['order_date'] );
           $dataFormatada = $formatacao->format('d/m/yy');
           
    ?>
    <div class="col-sm-6 info">   
        <div class="hdr"><strong>Informações do Pedido</strong></div><br>
        <p><b>Método de Pagamento :</b> <?php echo $order['payment_status']; ?></p>
        <p><b>Data do Pedido :</b> <?php echo $dataFormatada; ?></p>
        <br />
        <div class="hdr"><strong> Endereço</strong></div>
        <p><?php echo $usuario['endereco']; ?></p>
        <br />
        <p><b>Pedido: </b> <?php echo $order['id']; ?></p>
        <p><b>Total </b> <?php echo reais ( $order['total'] ); ?></p> 
        <strong><h2><?php  ?></h2></strong>    
        
    </div>
</div>    
</div>

<!-- Produtos do Pedido -->
<br><br>
<div class="row ord-items">

    <div class="hdr" style=" padding-left: 10%;"><strong>Produtos</strong></div><br>
    <?php if(!empty($order['items'])){ foreach($order['items'] as $item){ ?>
    <div class="col-lg-12 item">
        <br>
        <div class="card-header"><!--"col-sm-4"-->
            <p><b><?php echo $item["nome"]; ?></b></p>
            <p><?php echo reais($item["preco"]); ?></p>
            <p>Quantidade : <?php echo $item["quantidade"]; ?></p>

            <p><b><?php echo reais( $item["sub_total"] ); ?></b></p>
        </div>
    </div>
    <?php } } ?>
</div>