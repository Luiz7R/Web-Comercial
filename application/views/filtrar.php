        <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal Title</h4>
              </div>  
              <div class="modal-body">
                  <form id="myForm" action="" method="post" class="form-horizontal">
                    <input type="hidden" name="txtId" value="0">
                    <div class="form-group">
                      <label for="pedido" class="label-control col-md-5">Codigo do Pedido</label>
                      <div class="col-md-10">
                        <input type="text" name="txtCodigoProduto" class="form-control">
                      </div>
                    </div> 
                    <div class="form-group">
                       <label for="pedido" class="label-control col-md-5">Data do Pedido</label> 
                       <div class="col-md-10">
                        <input type="text" name="txtDataPedido" class="form-control">
                       </div>  
                    </div>
                    <div class="form-group">
                      <label for="pedido" class="label-control col-md-5">Observação</label>
                        <div class="col-md-10">
                          <textarea name="txtObservacao" class="form-control"></textarea>  
                        </div>
                    </div>
                    <div class="form-group">
                       <label for="pedido" class="label-control col-md-5">Forma de Pagamento</label>
                       <div class="col-md-10">
                          <input type="text" name="txtPagamento" class="form-control">
                       </div> 
                    </div>
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button> 
                  <button type="button" id="btnSalvar" class="btn btn-primary">Salvar Mudanças</button>
              </div>
            </div><!-- /.modal-content -->            
          </div><!-- /.modal-dialog --> 
        </div><!-- /.modal -->





        <div id="modalDeletar" class="modal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Confirmar Exclusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Você quer Excluir esse Pedido?
              </div>
              <div class="modal-footer">      
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" id="btnDeletar" class="btn btn-danger">Excluir</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog --> 
        </div><!-- /.modal -->   


<?php

if ( isset($_POST['de_data'], $_POST["a_data"] ) )
{
     $deData = $_POST['de_data'];
     $aData = $_POST["a_data"];
     $connect = mysqli_connect("localhost", "root", "", "web1"); 
     $output = '';
     $formatarDataDD = DateTime::createFromFormat('d/m/yy', $deData );
     $formatarDataAD = DateTime::createFromFormat('d/m/yy', $aData );
     $dataFormatadaDD = $formatarDataDD->format('Y-m-d');
     $dataFormatadaAD = $formatarDataAD->format('y-m-d');

     //echo ' DataFormatada-deData == ' . $dataFormatada . ' DataFormatada-aData == ' . $dataFormatada_Adata;
     //echo ' de_data ' . $deData . ' a data : ' . $aData;

          $query = "
          SELECT * FROM pedidos 
          WHERE order_date BETWEEN '".$dataFormatadaDD."' AND '".$dataFormatadaAD."'
     "; 

     /*$query = "
          SELECT * FROM pedidos 
          WHERE order_date BETWEEN '".$_POST["de_data"]."' AND '".$_POST["a_data"]."'
     ";*/

     $result = mysqli_query($connect, $query);
     $output .= '
             <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                     <th width="150px">Código do Pedido</th>
                     <th width="150px">Data do Pedido</th>
                     <th width="300px">Observação</th>
                     <th>Forma de Pagamento</th> 
                     <th></th> 
                     <th></th>
                     <th></th>                 
                  </tr>  
                  </thead>
     ';
     if ( mysqli_num_rows($result) > 0 )
     {
          while ( $row = mysqli_fetch_array($result) )
          {
                  $output .= '
                      <tr>
                          <td>'. $row['id'] .'</td>
                          <td>'. $row['order_date'] .'</td>
                          <td width="300px">'. $row['observacao'] .'</td>
                          <td>'. $row['payment_status'] .'</td> 
                          <td><a href="javascript:;" class="btn btn-info btn-xs item-editar" data="'.$row['id'].'">Editar</a></td>
                          <td><a href="javascript:;" class="btn btn-danger btn-xs item-delete" data="'.$row['id'].'">Deletar</a></td>
                          <td><a href="pdfdetalhes/'.$row['id'].'" class="btn btn-success btn-xs item-pdf" data="'.$row['id'].'">PDF</a></td>                    
                      </tr>
                  ';
          } 
     }
     else
     {
            $output .= '
                <tr>
                    <td colspan="5"> Nenhum Pedido Encontrado </td>
                </tr>
            ';
     }
     $output .= '</table>';
     echo $output; 
}

?>



<script>


        $('#btnSalvar').click(function(){
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize( );
            var codigoPedido = $('input[name=txtCodigoProduto]');
            var dataPedido = $('input[name=txtDataPedido]');
            var observacao = $('input[name=txtObservacao]');
            var pagamento = $('input[name=txtPagamento]');
            var resultado = '';

            if ( codigoPedido.val() == '' )
            {
                 codigoPedido.parent().parent().addClass('has-error');
            } else {
                 codigoPedido.parent().parent().removeClass('has-error');
                 resultado += '1'; 
            } 
            if ( dataPedido.val() == '' )
            { 
                 dataPedido.parent().parent().addClass('has-error');
            }
            else
            {
                dataPedido.parent().parent().removeClass('has-error');
                resultado += '2';
            }
            if ( observacao.val() == '' )
            {
                 observacao.parent().parent().addClass('has-error'); 
            }
            else
            {
                 observacao.parent().parent().removeClass('has-error');
                 resultado += '3';
            } 
            if ( pagamento.val() == '' )
            {
                pagamento.parent().parent().addClass('has-error');
            }  
            else
            {
                pagamento.parent().parent().removeClass('has-error');
                resultado += '4';
            }

            if ( resultado == '1234' )
            {
                 $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: url,
                    data:data,
                    async: false,
                    dataType: 'json',
                    success: function(response)
                    {
                        if ( response.success ) {
                             $('#myModal').modal('hide');
                             $('#myForm')[0].reset();

                             if ( response.type == 'add' )
                             {
                                  var type = 'Adicionado'; 
                             } else if ( response.type = 'update' )
                             {
                                  var type = 'Atualizado';
                             }
                             $('.alert-success').html('Pedido ' +type+ ' com Sucesso').fadeIn( ).delay(4000).fadeOut('slow');
                             }
                             else
                             {
                                  alert('Error 2');
                             } 
                    },
                    error: function ()
                    {
                        alert('Não foi possivel adicionar os dados')
                    }
                 });
            }  
        }); // btnSalvar


        $('.item-delete').click(function( ){
            var id = $(this).attr('data');
            $('#modalDeletar').modal('show');
            $('#btnDeletar').unbind().click(function(){
              $.ajax({
                type: 'ajax',
                method: 'get',
                async: false,
                url : '<?php echo base_url() ?>index.php/produtos/deletarPedido',
                data: { id:id },
                dataType: 'json',
                success: function(response)
                {
                   if ( response.success )
                   {
                        $('#modalDeletar').modal('hide');
                        $('.alert-success').html('Pedido deletado com sucesso').fadeIn().delay(4000).fadeOut('slow');
                   }
                   else
                   {
                        alert('Erro');
                   } 
                },
                error: function()
                {
                   alert( 'Erro ao tentar Deletar ' );
                }
              });
            });
        }); // deletar pedido  

        $('.item-editar').click(function(){
           var id = $(this).attr('data');
           $('#myModal').modal('show');
           $('#myModal').find('.modal-title').text('Editar Pedido');
           $('#myForm').attr('action', '<?php echo base_url( ) ?>index.php/produtos/updatePedidos');
           $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url( ) ?>index.php/produtos/EditarPedidos',
            data: {id: id},
            async: false,
            dataType: 'json',
            success:function(data)
            {
                //var formatarData = new Date(data.order_date);
                //var dataFormatada = formatarData.toLocaleDateString();
                $('input[name=txtCodigoProduto]').val(data.id);
                $('input[name=txtDataPedido]').val(data.order_date);
                $('textarea[name=txtObservacao]').val(data.observacao);
                $('input[name=txtPagamento]').val(data.payment_status);
                $('input[name=txtId]').val(data.id);
            },
            error:function()
            {
              alert ('Não Foi possivel Editar');
            }
           });
        }); 


</script>

