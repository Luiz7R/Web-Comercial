<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('produtos_model', 'm');
		$this->load->model('usuarios_model', 'u_m');

	}

	public function novo( ) {
	$this->load->model("usuarios_model");
	$verificar = false;

		$usuario = array (
			"nome" => $this->input->post("nome"),
			"cpf" => $this->input->post("cpf"),
			"sexo" => $this->input->post("sexo"),
			"email" => $this->input->post("email"),	
			"senha" => md5($this->input->post("senha"))
		);
		
		if(! $this->u_m->validateEmail($this->input->post("email")) )
		{
			redirect('/');
		}
		else if( ! $this->u_m->validateCpf($this->input->post("cpf")) )
		{
			redirect('/');
		}
		else  {	
			$this->usuarios_model->salva($usuario);
			$this->load->view('usuarios/novo');
		}
	}

	public function EditarUsuario(){
		$result = $this->u_m->EditarUsuario();
		echo json_encode($result);
	}

	public function updateUsuario(){
		$result = $this->u_m->updateUsuario();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
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