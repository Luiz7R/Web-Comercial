<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

	public function index()
	{
		$this->load->model("produtos_model");
		$lista = $this->produtos_model->buscaTodos();
		$dados = array("produtos" => $lista);
		$this->load->view('produtos/index', $dados);
	}

	public function formulario () {
		$this->load->view('produtos/formulario');
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
			$this->load->view("produtos/formulario");
		}
	}
}

