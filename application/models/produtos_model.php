<?php
class produtos_model extends CI_Model{
	public function buscaTodos(){
		return $this->db->get("produtos")->result_array();
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

}