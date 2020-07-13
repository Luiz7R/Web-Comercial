<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

	function __construct(){
		parent:: __construct();
        // carregar biblioteca do carrinho 
        $this->load->library('cart');
        // carregar  model de produtos
        $this->load->model('produtos_model');
		$this->load->model('produtos_model', 'm');

	}

	public function index()
	{
		$this->load->model("produtos_model");
		$lista = $this->produtos_model->buscaTodos();
		$dados = array("produtos" => $lista);
		$this->load->view('templates/header', $dados);
		$this->load->view('templates/nav-top', $dados);
		$this->load->view('produtos/index', $dados);
		$this->load->view('templates/footer', $dados);
		$this->load->view('templates/js', $dados);

	}

	function addCarrinho ( $idProduto )
	{
			$this->load->library('cart');
			$produto = $this->produtos_model->getRows($idProduto);
			// Adicionar produto ao carrinho
			   $data = array (
			   	 'id' => $produto['id'],
			   	 'qty' => 1,
			   	 'price' => $produto['preco'],
			   	 'name' => $produto['nome'],
			   	 'options' => array('tamanho' => $produto['tamanho'] )
			   );
			   echo $this->input->post('');
			   $this->cart->insert($data);

			   // redirecionar para a pagina do carrinho
			   	  redirect('/');
	}

	public function mostrarProdutos(){
		$result = $this->m->mostrarProdutos( );
		echo json_encode($result);
	}


	public function carrinho ( )
	{
		$this->load->view('produtos/carrinho.php');	
	}

}

