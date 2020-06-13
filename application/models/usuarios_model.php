<?php
class Usuarios_model extends CI_Model
{
	public function salva($usuario) {
		$this->db->insert("usuarios", $usuario);
	}

	public function logarUsuarios($email, $senha) {
		$this->db->where("email", $email);
		$this->db->where("senha", $senha);
		$usuario = $this->db->get("usuarios")->row_array();
		return $usuario;
	}


	public function validateEmail ($par){
		if(filter_var($par, FILTER_VALIDATE_EMAIL)){
			return true;
		}else{
			$this->session->set_flashdata("danger", " Email inválido!" );
			return false;
		}
	}

function validateCpf($cpf) {
 
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
    	$this->session->set_flashdata("danger", "Cpf inválido ! ");
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
    	$this->session->set_flashdata("danger", "Cpf inválido!. ");
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
            $this->session->set_flashdata("danger", "Cpf inválido!. ");
        }
    }
    return true;

}

	public function mostrarUsuarios(){

		$query = $this->db->get('usuarios');
		if ($query->num_rows() > 0 ) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function retorna($id) {
		return $this->db->get_where("usuarios", array(
			"id" => $id
		))->row_array( );
	}

	public function contaUsuario ()
	{
		if ( $this->session->userdata("usuario_logado") )
		{	
    	     $idUsuario = $this->session->userdata('usuario_logado')['id'];
        }      

		$this->load->view('usuarios/conta', $idUsuario);
	}	

	public function updateUsuario( )
	{
		//$id = $this->input->post('txtId');
		//$idUsuario = $this->input->post('txtidUsuario');
		$campo = array(
			'id'   => $this->input->post('txtidUsuario'),
			'nome' => $this->input->post('txtNomeUsuario'),
		 	'cpf'  => $this->input->post('txtCpf'),
			'sexo' => $this->input->post('txtSexo'),
			'email' => $this->input->post('txtEmail')
		);
		$this->db->where('id', $this->input->post('txtidUsuario'));
		$this->db->update("usuarios", $campo);
		if ( $this->db->affected_rows() > 0 )
		{
			 return true;
		}
		else
		{
			return false;
		}	
	}


	public function salvarDados($usuarioUP,$idUsuario)
	{
			$this->db->where('id', $idUsuario);
			$this->db->update("usuarios", $usuarioUP);
			if ( $this->db->affected_rows() > 0 )
			{
				 return true;
			}
			else
			{
				return false;
			}				
	}

	public function EditarUsuario(){
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get('usuarios');
		if($query->num_rows() > 0 ){
			return $query->row();
		}else{
			return false;
		}
	}



	function deletarUsuario(){
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$this->db->delete('usuarios');
		
		if($this->db->affected_rows() > 0 ){
			return true;
		}else{
			return false;
		}
	}


}