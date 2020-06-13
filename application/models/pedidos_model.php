<?php
class pedidos_model extends CI_Model{

	public function mostrarPedidos(){
		$query = $this->db->get('pedidos');
		if ($query->num_rows() > 0 ) {
			return $query->result();
		}else{
			return false;
		}
	}
} 

