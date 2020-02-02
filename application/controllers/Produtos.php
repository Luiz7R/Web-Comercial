<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('produtos_model', 'm');
		$this->load->model('usuarios_model', 'u_m');

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

	public function mostrarProdutos(){
		$result = $this->m->mostrarProdutos( );
		echo json_encode($result);
	}

	public function addProdutos(){
		$result = $this->m->addProdutos( );
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);

	}


	public function EditarProdutos(){
		$result = $this->m->EditarProdutos();
		echo json_encode($result);
	}

	public function updateProdutos(){
		$result = $this->m->updateProdutos();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	/*public function updateProdutos(){
		$result = $this->m->updateProdutos();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}*/

	public function deletarProduto( ){
		$result = $this->m->deletarProduto( );
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function mostrarUsuarios(){
		$result = $this->u_m->mostrarUsuarios( );
		echo json_encode($result);
	}

	public function usuarios (){
		$result = $this->u_m->mostrarUsuarios( );
		$this->load->view('produtos/listaUsuarios');
	}

	public function formulario () {
		$this->load->view('templates/header');
		$this->load->view('templates/nav-top');		
		$this->load->view('produtos/formulario');
		$this->load->view('templates/footer');
		$this->load->view('templates/js');		
	}

	public function novo () {
		$this->load->library("form_validation");
		$this->form_validation->set_rules("nome", "nome", "required|min_length[5]");
		$this->form_validation->set_rules("descricao", "descricao", "required|min_length[10]");
		$this->form_validation->set_rules("preco", "preco", "required|min_length[1]");
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>" );

		$sucesso = $this->form_validation->run();
		if ($sucesso) {
			$usuarioId = $this->session->userdata("usuario_logado");
			$produto = array (
				"nome" => $this->input->post("nome"),
				"preco" => $this->input->post("preco"),
				"descricao" => $this->input->post("descricao"),
				"usuario_id" => $usuarioId['id']
			);
			$this->load->model("produtos_model");
			$this->produtos_model->salva($produto);
			$this->session->set_flashdata("success", "Produto cadastrado com sucesso!");
			redirect('/');
		}else{
			$this->load->view('templates/header');
			$this->load->view('templates/nav-top');		
			$this->load->view('produtos/formulario');
			$this->load->view('templates/footer');
			$this->load->view('templates/js');
		}
	}

	public function detalhe () {
		$id = $this->input->get('id');
		$this->load->model("produtos_model");
		$produto = $this->produtos_model->retorna($id);
		$dados = array('produto' => $produto);

		$this->load->view('templates/header');
		$this->load->view('templates/nav-top');			
		$this->load->view("produtos/detalhe", $dados);
		$this->load->view('templates/footer');
		$this->load->view('templates/js');		
	}

	public function delete($id) {
		$this->load->model("produtos_model");
		$this->produtos_model->deletar_produto($id);
		$this->session->set_flashdata('success', 'Produto deletado com sucesso!');
		redirect('/');
	}

	public function editar(){
		$id = $this->input->get('id');
		$this->load->model("produtos_model");
		$produto = $this->produtos_model->retorna($id);
		$dados = array('produto' => $produto);

		$this->load->view('templates/header');
		$this->load->view('templates/nav-top');			
		$this->load->view("produtos/editar", $dados);
		$this->load->view('templates/footer');
		$this->load->view('templates/js');			
	}

	public function salvar ($id) {
		$this->load->model("produtos_model");
		$this->produtos_model->salvar($id);
		$this->session->set_flashdata('success', 'Produto alterado com sucesso!');
		redirect('/');
	}
}

