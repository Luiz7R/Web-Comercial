<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrinho extends CI_Controller
{		

		function __construct ()
		{
				parent::__construct();
				$this->load->library('cart');
				$this->load->model('produtos_model');

		}

		public function index ()
		{
			$data = array();
			$data['cartItems'] = $this->cart->contents();
			$this->load->view('produtos/carrinho/index', $data);
		}

		function updateItemQty ()
		{
			$update = 0;
			$rowid = $this->input->get('rowid');
			$qty = $this->input->get('qty');

			if ( !empty($rowid) && !empty($qty) )
			{
				 $data = array(
				 	'rowid' => $rowid,
				 	'qty' => $qty
				 );
				 $update = $this->cart->update($data);
			}

			echo $update? 'ok':'err';	
		}

		function removeItem($rowid)
		{
			$remover = $this->cart->remove($rowid);
			redirect('carrinho/');
			// redireciona para a pagina do carrinho
			//redirect('carrinho/');
		}



} 