<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('produtos_model', 'm');
		$this->load->model('usuarios_model', 'u_m');
		//$idUsuario = $this->session->userdata('usuario_logado')['id'];

	}

	public function novo( ) {
	$this->load->model("usuarios_model");

		$usuario = array (
			"nome" => htmlspecialchars($this->input->post("nome")),
			"cpf" => $this->input->post("cpf"),
			"sexo" => htmlspecialchars($this->input->post("sexo")),
			"email" => htmlspecialchars($this->input->post("email")),	
			"senha" => md5($this->input->post("senha"))
		);

		if(! $this->usuarios_model->validateEmail($this->input->post("email")) )
		{
			redirect('/');
		}
		else if( ! $this->usuarios_model->validateCpf($this->input->post("cpf")) )
		{
			redirect('/');
		}
		else
		{	
			$this->usuarios_model->salva($usuario);
			$this->load->view('usuarios/novo');
		}
	}

	public function Conta(){

		if ( $this->session->userdata("usuario_logado") )
		{
			$idUsuario = $this->session->userdata('usuario_logado')['id'];	
			$id = $idUsuario;
			$this->load->model("usuarios_model");
			$usuario = $this->usuarios_model->retorna($id);
			$pedidos = $this->usuarios_model->retornaPedidos($id);
			$dados = array('usuario' => $usuario, 'pedidos' => $pedidos);
			 
			$this->load->view('templates/header');
			$this->load->view('templates/nav-top');			
			$this->load->view("usuarios/conta", $dados);
			$this->load->view('templates/footer');
			$this->load->view('templates/js');
		}			
	}


	public function dadosUsuarios(){
		if ( $this->session->userdata("usuario_logado") )
		{
			$idUsuario = $this->session->userdata('usuario_logado')['id'];	
			$id = $idUsuario;
			$this->load->model("usuarios_model");
			$usuario = $this->usuarios_model->retorna($id);
			$dados = array('usuario' => $usuario);

			$this->load->view('templates/header');
			$this->load->view('templates/nav-top');			
			$this->load->view("checkout/order-success", $dados);
			$this->load->view('templates/footer');
			$this->load->view('templates/js');
		}			
	}


	public function dadosUsuario ($id) 
	{
	      $usuario = $this->usuarios_model->retorna($id);
	      $dados = array('usuario' => $usuario );		
		  return $dados;		
	}

	public function EditarUsuario(){
		$result = $this->u_m->EditarUsuario();
		echo json_encode($result);
	}

	public function updateUsuario( )
	{
		$result = $this->u_m->updateUsuario( );
		$msg['success'] = false;
		$msg['type'] = 'update';
		if ( $result )
		{
			 $msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deletarUsuario( ){
		$result = $this->u_m->deletarUsuario( );
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}