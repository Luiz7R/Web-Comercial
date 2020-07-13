<?php

$output = '';
$total = 0;

$output .= '
             <br>
             <div class="container">
             <table class="table table-bordered table-striped table-responsive" style="border-radius: 20px; margin-left:-20px;">
                  <thead>
                  <tr>
                     <th width="10%">Código do Pedido</th>
                     <th width="180px">Data do Pedido</th>
                     <th>Observação</th>
                     <th width="130px">Forma de Pagamento</th>                   
                  </tr>  
                  </thead>
    ';

     foreach ($pedidos->result_array() as $row)
     {
        $mydt = DateTime::createFromFormat('Y-m-d', $row['order_date'] );
        $formatd = $mydt->format('d/m/yy');
        $total += $row['total'];
        $output .= '
            <tr>
                <td>'. $row['id'] .'</td>
                <td>'. $formatd .'</td>
                <td>'. $row['observacao'] .'</td>
                <td>'. $row['payment_status'] .'</td>                      
            </tr>';
     }

     $output .= '</table></div>';
     echo $output;
     echo '<div class="container"><td><h5 align="center"> <strong>Total dos pedidos : ' .reais($total).'</strong></h5></td></div>'; 
