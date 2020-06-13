<?php

/*class shopping_cart_model extends CI_Model {

	function fetch_all ()
	{
		$query = $this->db->get("produtos");
		return $query->result();
	}


    public function insertCustomer($data){
        // Add created and modified date if not included
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        
        // Insert customer data
        $insert = $this->db->insert($this->custTable, $data);

        // Return the status
        return $insert?$this->db->insert_id():false;
    }

     public function insertOrder($data){
        // Add created and modified date if not included
        if(!array_key_exists("created", $data)){
            $dataCr = date('Y-m-d');
            $mydt = DateTime::createFromFormat('Y-m-d', $dataCr );
            $formatd = $mydt->format('d/m/yy');
            $data['created'] = date('d/m/yy');
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("d-m-Y");
        }
        
        // Insert order data
        $insert = $this->db->insert($this->ordTable, $data);

        // Return the status
        return $insert?$this->db->insert_id():false;
    }   

}*/