<?php
class pedidos_model extends CI_Model{

	public function mostrarPedidos(){
		$query = $this->db->get('pedidos');
		if ($query->num_rows() > 0 ) {
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function buscarDTPedido ()
	{
		$this->db->order_by('id', 'DESC');
		return $this->db->get('pedidos')->result_array();	
	}
	
	public function buscarPedidos($id)
	{
		$query = $this->db->get_where("pedidos", array("usuario_id" => $id));
		return $query;
	}

} 

