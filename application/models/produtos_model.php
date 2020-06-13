<?php
class produtos_model extends CI_Model{

	function __construct() {
		$this->proTable = 'produtos';
		$this->custTable = 'clientes';	
		$this->ordTable = 'pedidos';
		$this->ordItemsTable = 'lista_pedidos';
	}	
	public function buscaTodos(){
		return $this->db->get("produtos")->result_array();
	}

	public function buscarDTPedido ()
	{
		$this->db->order_by('id', 'DESC');
		return $this->db->get('pedidos');	
	}

	public function buscarPedido($idPedido)
	{
		$this->db->where('id', $idPedido);
		$data = $this->db->get('pedidos');
		$saida = '<div class="table-responsive">
            <table class="table table-striped table-bordered">
              <tr>
                 <th>Código do Pedido</th>
                 <th>Data do Pedido</th>
                 <th>Observação</th>
                 <th>Forma de Pagamento</th> 
              </tr>
              <br>';
		foreach ( $data->result() as $row )
		{
			$formatarData = DateTime::createFromFormat('Y-m-d', $row->order_date );	
			$dataFormatada = $formatarData->format('d/m/yy');	
			$saida .= '
				<tr>
					<td>'.$row->id.'</td>
					<td>'.$dataFormatada.'</td>
					<td>'.$row->observacao.'</td>
					<td>'.$row->payment_status.'</td>
				</tr>
			';
		}
		$saida .= '</div>
				  </table>';
		return $saida;
	}

	public function buscar_detalhesPd($idpedido)
	{
		$this->db->where('id', $idpedido);
		$data = $this->db->get('pedidos');        
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
			'tamanho'   => $this->input->post('txtTamanho'),
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

	public function addPedidos ( )
	{
		$usuarioId = $this->session->userdata("usuario_logado");
		//'order_date' => $this->input->post('txtDataPedido'),
		$formatarData = DateTime::createFromFormat('d/m/yy', $this->input->post('txtDataPedido'));
		$dataFormatada = $formatarData->format('Y-m-d');
		$campo = array(
			'id' => $this->input->post('txtCodigoProduto'),
			'order_date' => $dataFormatada,
			'observacao' => $this->input->post('txtObservacao'),
			'payment_status' => $this->input->post('txtPagamento'),
			'usuario_id'  => $usuarioId['id']
		);
		$this->db->insert("pedidos", $campo);

		if ( $this->db->affected_rows() > 0 )
		{
			 return true;
		}
		else
		{
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

	public function EditarPedidos(){
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get('pedidos');
		if($query->num_rows() > 0 ){
			return $query->row();
		}else{
			return false;
		}
	}

	public function getRows($id = '')
	{
		$this->load->library('cart');	
		$this->db->select('*');
		$this->db->from($this->proTable);
		$this->db->where('status', '1');

		if($id)
		{
			$this->db->where('id', $id);
			$query = $this->db->get();
			$result = $query->row_array();
		}	
		else
		{
			$this->db->order_by('nome','asc');
			$query = $this->db->get();
			$result = $query->result_array();
		}	

		return !empty($result)?$result:false;
	}

	public function getOrder ($id)
	{		
        /*$this->db->select('o.*, c.nome, c.email, c.telefone, c.endereco');*/
        /*$this->db->join($this->custTable.' as c', 'c.usuario_id = o.usuario_id', 'left');*/
        $this->db->from($this->ordTable.' as o');
        $this->db->where('o.id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        
        // Get order items
        $this->db->select('i.*, p.nome, p.preco');
        $this->db->from($this->ordItemsTable.' as i');
        $this->db->join($this->proTable.' as p', 'p.id = i.id_produto', 'left');
        $this->db->where('i.id_pedido', $id);
        $query2 = $this->db->get();
        $result['items'] = ($query2->num_rows() > 0)?$query2->result_array():array();
        
        // Return fetched data
        return !empty($result)?$result:false;
	}

    public function insertCustomer($data){
        // Add created and modified date if not included
        if(!array_key_exists("criado", $data)){
            $data['criado'] = date('d/m/Y');
        }
        if(!array_key_exists("modificado", $data)){
            $data['modificado'] = date("d/m/y");
        }
        
        // Insert customer data
        $insert = $this->db->insert($this->custTable, $data);

        // Return the status
        return $insert?$this->db->insert_id():false;
    }
    
    public function insertOrder($data){
        // Add created and modified date if not included
        if(!array_key_exists("order_date", $data)){
        	$dataOr = date('y/m/d');
            $data['order_date'] = $dataOr; //date('Y/d/m');
        }
        if(!array_key_exists("modificado", $data)){
        	$dataOr = date('y/m/d');
            $data['modificado'] = $dataOr;//date("d/m/y");
        }
        
        // Insert order data
        $insert = $this->db->insert($this->ordTable, $data);

        // Return the status
        return $insert?$this->db->insert_id():false;
    }

    public function insertOrderItems($data = array()) {
        
        // Insert order items
        $insert = $this->db->insert_batch($this->ordItemsTable, $data);

        // Return the status
        return $insert?true:false;
    }
        

	public function updateProdutos(){
		$id = $this->input->post('txtId');
		$usuarioId = $this->session->userdata("usuario_logado");
		$campo = array(
			'nome' => $this->input->post('txtNomeProduto'),
			'cor' => $this->input->post('txtCorProduto'),
			'tamanho' => $this->input->post('txtTamanho'),
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


	public function updatePedidos( )
	{
		$id = $this->input->post('txtId');	
		$usuarioId = $this->session->userdata("usuario_logado");
		//$formatarData = DateTime::createFromFormat('Y-m-d', $this->input->post('txtDataPedido'));
		//$dataFormatada = $formatarData->format('d/m/y');
		//$this->input->post('txtDataPedido'),
		$campo = array
		(
			'id' => $this->input->post('txtCodigoProduto'),
			'order_date' => $this->input->post('txtDataPedido'),
			'observacao' => $this->input->post('txtObservacao'),
			'payment_status' => $this->input->post('txtPagamento'),
			'usuario_id'  => $usuarioId['id']
		);
		$this->db->where('id', $id);
		$this->db->update('pedidos', $campo);
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

	function deletarPedido ( )
	{
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$this->db->delete('pedidos');

		if ( $this->db->affected_rows() > 0 )
		{
			 return true;
		}	
		else
		{
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