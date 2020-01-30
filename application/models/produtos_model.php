<?php
class produtos_model extends CI_Model{
	public function buscaTodos(){
		return $this->db->get("produtos")->result_array();
	}

	public function mostrarProdutos(){

		$query = $this->db->get('produtos');
		if ($query->num_rows() > 0 ) {
			return $query->result();
		}else{
			return false;
		}
	}


	public function addProdutos(){
		$usuarioId = $this->session->userdata("usuario_logado");
		$campo = array(
			'nome' => $this->input->post('txtNomeProduto'),
			'descricao' => $this->input->post('txtDescricao'),
			'preco' => $this->input->post('txtPreco'),
			"usuario_id" => $usuarioId['id']			
		);
		$this->db->insert("produtos", $campo);
		
		if($this->db->affected_rows() > 0 ){
			return true;
		}else{
			return false;
		}
	}

	public function EditarProdutos(){
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get('produtos');
		if($query->num_rows() > 0 ){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateProdutos(){
		$id = $this->input->post('txtId');
		$usuarioId = $this->session->userdata("usuario_logado");
		$campo = array(
			'nome' => $this->input->post('txtNomeProduto'),
			'descricao' => $this->input->post('txtDescricao'),
			'preco' => $this->input->post('txtPreco'),
			'usuario_id' => $usuarioId['id']			
		);	
		$this->db->where('id', $id);
		$this->db->update('produtos', $campo);
		if($this->db->affected_rows() > 0 ){
			return true;
		}else{
			return false;
		}
	}

	function deletarProduto(){
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$this->db->delete('produtos');
		
		if($this->db->affected_rows() > 0 ){
			return true;
		}else{
			return false;
		}
	}

	function deletarProdutos(){
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function salva ($produto){
		$this->db->insert("produtos", $produto);
	}

	public function retorna($id) {
		return $this->db->get_where("produtos", array(
			"id" => $id
		))->row_array( );
	}

	public function deletar_produto($id) {
		$this->db->where('id', $id);
		$this->db->delete('produtos');
		return TRUE;
	}

	public function salvar (){
		$id = $this->input->post('id');

		$produto = array (
			'nome' => $this->input->post('nome'),
			'preco' => $this->input->post('preco'),
			'descricao' => $this->input->post('descricao')
		);

		$this->db->where('id', $id);
		return $this->db->update('produtos', $produto);
	}

}