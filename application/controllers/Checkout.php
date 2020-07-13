<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('form');

		$this->load->library('cart');

		$this->load->library('form_validation');
		$this->load->model('produtos_model');

		$this->controller = 'checkout';
	}

	function index ()
	{

		 if ( $this->session->userdata("usuario_logado") )
		 {
		 	  $idUsuario = $this->session->userdata('usuario_logado')['id'];
		 }


        if($this->cart->total_items() <= 0){
            redirect('produtos_model/');
        }

		$custData = $data = array();


		$submit = $this->input->post('placeOrder');

		if ( isset($submit) )
		{
			//$this->form_validation->set_rules('nome','Nome', 'required');
			//$this->form_validation->set_rules('endereco', 'endereco', 'required');
			/*$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('telefone', 'telefone', 'required');
			$this->form_validation->set_rules('endereco', 'endereco', 'required');
			*/
			/*$custData = array(
				'nome' => strip_tags($this->input->post('nome')),
				'email' => strip_tags($this->input->post('email')),
				'telefone' => strip_tags($this->input->post('telefone')),
				'endereco' => strip_tags($this->input->post('endereco'))
			);*/

			$metodoPagamento = htmlspecialchars($this->input->post('nomePagamento'));
			$dadosPedidos = htmlspecialchars($this->input->post('dadosdoPedido'));
			$enderecoPedido = htmlspecialchars($this->input->post('endereco'));
			
			if ( !empty($enderecoPedido) )
			{
                 $addEndereco = array ( 'endereco' => $enderecoPedido);
                 $emailUsuario = $this->session->userdata('usuario_logado')['email'];
                 $this->db->where('email', $emailUsuario);
                 $this->db->update('usuarios', $addEndereco);
			}	

			//echo 'Endereco cadastrado : ' . $enderecoPedido;

			if ( isset($submit) )//( $this->form_validation->run() == true )
			{
				 //$insert = $this->produtos_model->insertCustomer($custData);

				 if ( isset($submit) )
				 {
				 	  $order = $this->placeOrder($dadosPedidos,$metodoPagamento,$idUsuario);

				 	  if ( $order )
				 	  {
				 	  	   $this->session->set_userdata('success_msg', 'Pedido realizado com sucesso.');
				 	  	   redirect($this->controller.'/orderSuccess/'.$order);
				 	  }	
				 	  else
				 	  {
				 	  	   $data['error_msg'] = 'Pedido falhou, por favor tente novamente.';	
				 	  }
				 }
				 else
				 {
				 	$data['error_msg'] = 'ERRO , tente novamente';
				 }	
			}	
		}	
		$idUsuario = $this->session->userdata('usuario_logado')['id'];
  	   	$id = $idUsuario;
  	   	$this->load->model("usuarios_model");
  	   	$usuario = $this->usuarios_model->retorna($id);
  	   	$dados = array('usuario' => $usuario);	
  	   	$data['dadosUs'] = $dados;	
		$data['custData'] = $custData;
		$data['cartItems'] = $this->cart->contents();
		$this->load->view($this->controller.'/index',$data);		
	}

	function placeOrder ($dadosPedidos,$metodoPagamento,$idUsuario) 
	{

	   /*if ( $this->session->userdata("usuario_logado") )
	   {
		 	  //$idUsuario = $this->session->userdata('usuario_logado')['id'];
	   }*/

	   /*
	   	* Pegar Descricao
	   $query2 = $this->db->get('produtos');
	   $row2 = $query2->row();
	   $descricao = $row2->descricao; */


	   $ordData = array (	
		'usuario_id' => $idUsuario,
		'observacao' => $dadosPedidos,
		'payment_status' => $metodoPagamento,
		'total' => $this->cart->total()
	   );
	   $insertOrder = $this->produtos_model->insertOrder($ordData);
	   


	   if ($insertOrder)
	   {
	   		$cartItems = $this->cart->contents();
	   		$ordItemData = array();
	   		$i=0;
	   		foreach ( $cartItems as $item )
	   		{
	   			$ordItemData[$i]['id_pedido'] = $insertOrder;
	   			$ordItemData[$i]['id_produto'] = $item['id'];
	   			$ordItemData[$i]['quantidade'] = $item['qty'];
	   			$ordItemData[$i]['sub_total'] = $item['subtotal'];
	   			$i++;
	   		}

	   		if (!empty($ordItemData))
	   		{
	   			 $insertOrderItems = $this->produtos_model->insertOrderItems($ordItemData);

	   			 if($insertOrderItems)
	   			 {
	   			 	$this->cart->destroy();

	   			 	return $insertOrder;
	   			 }	
	   		}	
	   }
	   return false;	
	}

    function orderSuccess($ordID)
    {
        // Buscar dados do pedido 
           $data['order'] = $this->produtos_model->getOrder($ordID);
      	// dados do cliente
      	   $idUsuario = $this->session->userdata('usuario_logado')['id'];
      	   $id = $idUsuario;
      	   $this->load->model("usuarios_model");
      	   $usuario = $this->usuarios_model->retorna($id);
      	   $dados = array('usuario' => $usuario);

      	   $this->load->view('checkout/order-success', array_merge($data, $dados) );
    }

	
}