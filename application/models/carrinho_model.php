<?php 


class Carrinho_model extends CI_Model 
{
	 function buscarTd ( )
	 {
	 		$query = $this->db->get("produtos");
	 		return $query->result();
	 }
}
