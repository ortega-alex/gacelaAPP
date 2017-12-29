<?php 

/**
* 
*/
class Usuarios_model extends CI_Model{
	
	public function getUsuario($imei = ''){
		if(!empty($imei)){ 
			$row = $this->db->where('imei',$imei)
							->get('csd.usuario');
			
			if ($row->num_rows() > 0) {
				return $row->result();
			}
		}else{
			return false;
		}		
	}
}
 ?>