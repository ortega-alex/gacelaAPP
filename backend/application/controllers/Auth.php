<?php 
/**
* 
*/
class Auth extends CI_Controller{

	function __construct() {

	    header('Access-Control-Allow-Origin: *');
	    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
	    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	    $method = $_SERVER['REQUEST_METHOD'];
	    if($method == "OPTIONS") {
	        die();
	    }
	    parent::__construct();
	    $this->load->model('Usuarios_model');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function login(){
		$imei = json_decode(file_get_contents('php://input'));
		$row = $this->Usuarios_model->getUsuario($imei->imei);
		if (!$row) {
			$data = array(
				usuario => 0,
				mensaje => "No cuenta con accesos comunicarse al departamento de soporte"
			);
			echo json_encode($data);
		}else{
			echo json_encode($row);
		}
	}

}
?>