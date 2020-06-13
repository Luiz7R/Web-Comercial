<?php

if ( isset($_POST['buscarpedidos']) )
{
     $connect = mysqli_connect("localhost", "root", "", "web1");
     $output = ''; 
  	 $selecionarTb = "SELECT * FROM pedidos ORDER BY id desc"; 
  	 $resultado = mysqli_query($connect, $selecionarTb);
  	 $total = 0;

   $output .= '
             <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                     <th>Código do Pedido</th>
                     <th>Data do Pedido</th>
                     <th>Observação</th>
                     <th>Forma de Pagamento</th>                   
                  </tr>  
                  </thead>
    ';

     while ( $row = mysqli_fetch_array($resultado) )
     {
     		 if ( $row['usuario_id'] == $_POST['buscarpedidos'] )
     		 {	
     		 	  $total += $row['total'];
                  $output .= '
                      <tr>
                          <td>'. $row['id'] .'</td>
                          <td>'. $row['order_date'] .'</td>
                          <td>'. $row['observacao'] .'</td>
                          <td>'. $row['payment_status'] .'</td>                      
                      </tr>
     '; 			 
         }
     }        
     $output .= '</table>';
     echo $output;
     echo '<div class="container"><td><h5 align="center"> <strong>Total dos pedidos : ' .reais($total).'</strong></h5></td></div>'; 
}

