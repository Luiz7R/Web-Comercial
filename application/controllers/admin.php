<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

		function __construct ( )
		{
			parent:: __construct();
			$this->load->model('pedidos_model', 'pm');
			$this->load->model('produtos_model', 'm');
			$this->load->model('produtos_model');
			$this->load->model('usuarios_model', 'u_m');	
		}

		public function index ( )
		{
			$this->load->view('templates/header');
			$this->load->view('templates/nav-top');
			$this->load->view('admin');
			$this->load->view('templates/footer');
			$this->load->view('templates/js');			
		}

		public function mostrarProdutos ( )
		{
			$result = $this->m->mostrarProdutos( );
			echo json_encode($result);
		}


		public function addProdutos( )
		{
			$result = $this->m->addProdutos( );
			$msg['success'] = false;
			$msg['type'] = 'add';
			if ( $result )
			{
				$msg['success'] = true;
			}
			echo json_encode($msg);
		}

		public function EditarProdutos(){
			$result = $this->m->EditarProdutos();
			echo json_encode($result);
		}


		public function updateProdutos(){
			$result = $this->m->updateProdutos();
			$msg['success'] = false;
			$msg['type'] = 'update';
			if($result){
				$msg['success'] = true;
			}
			echo json_encode($msg);
		}


		public function deletarProduto( ){
			$result = $this->m->deletarProduto( );
			$msg['success'] = false;
			if($result){
				$msg['success'] = true;
			}
			echo json_encode($msg);
		}




	    public function pdfdetalhes ()
	    {
	    	if ( $this->uri->segment(3) )
	    	{
	    		 include('pdf.php');	
	    		 $pdf = new Pdf();
	    		 $idPedido = $this->uri->segment(3);
	    		 $html_content = '<link rel="stylesheet" href="http://localhost/web/css/bootstrap.css">';
	    		 $html_content .= $this->produtos_model->buscarPedido($idPedido);
				 $pdf->load_html($html_content);
				 $pdf->render();
				 $pdf->stream("".$idPedido.".pdf", array("Attachment" => 0)); // 1 Baixa o pdf
	    	} 
	    }


		public function mostrarPedidos(){
			$result = $this->pm->mostrarPedidos( );
			echo json_encode($result);
		}

		
		
		public function produtos ( )
		{
			$result = $this->m->mostrarProdutos( );
			$this->load->view('produtosCadastrados');
		}

		public function pedidos ( )
		{
			$resultado2 = $this->pm->mostrarPedidos( );
			$todosPedido = array("pedidos" => $resultado2);
			//print_r($todosPedido);
			$this->load->view('pedidos', $todosPedido);
		}

		public function filtrar ( )
		{
			$this->load->view('filtrar');
		}

		public function buscar ()
		{
			if ( isset($_POST['buscarpedidos']) )
			{
				 $idUs = $_POST['buscarpedidos'];
				 $dadosPedido = $this->pm->buscarPedidos($idUs);
				 $pedido = array("pedidos" => $dadosPedido);
				 //print_r($pedido);
				 $this->load->view('buscar', $pedido);	
			}
			//$query = $this->db->query("SELECT * FROM pedidos ORDER BY id desc");
			/*$dadosPedido = $this->pm->buscarPedidos($id);
			$pedido = array('pedidos' => $dadosPedido );
			$this->load->view(''buscar'');*/
		}

		public function usuarios ( )
		{
			$result = $this->u_m->mostrarUsuarios( );
			$this->load->view('listaUsuarios');
		}


		public function mostrarUsuarios()
		{
			$result = $this->u_m->mostrarUsuarios( );
			echo json_encode($result);
		}


		public function addPedidos( )
		{
			$resultado = $this->m->addPedidos( );
			$msg['success'] = false;
			$msg['type'] = 'add';

			if ($resultado)
			{
				$msg['success'] = true;
			}
			echo json_encode($msg);
		}



		public function EditarPedidos()
		{
			$resultado = $this->m->EditarPedidos();
			echo json_encode($resultado);
		}

		public function updatePedidos( )
		{
			$resultado = $this->m->updatePedidos( );
			$msg['success'] = false;
			$msg['type'] = 'update';
			if ( $resultado )
			{
				 $msg['success'] = true;
			}	
			echo json_encode($msg);
		}


		public function deletarPedido ( )
		{
			$resultado = $this->m->deletarPedido( );
			$msg['success'] = false;

			if ( $resultado )
			{
				 $msg['success'] = true;
			}
			echo json_encode($msg);	
		}


}	
