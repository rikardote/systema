<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('nombre_completo')) {
    
	function nombre_completo($nombres,$apellido_pat,$apellido_mat) 	{
 
		$nombre_completo = $nombres.' '.$apellido_pat.' '.$apellido_mat;
		return $nombre_completo;
 
	}
}

if(!function_exists('generateRandomString')) {
    
	function generateRandomString($length = 64) {
        $time = time();
        $characters = '0123456789abcdefghijk@#$%lmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        
        return hash('sha1',$randomString.$time);
    }
}
if(!function_exists('fecha_dma')) {
    
	function fecha_dma($fecha) {

        $fecha = date("d/m/Y", strtotime($fecha));
        
        return $fecha;
    }
}


 
 
/* End of file dropdwon_helper.php */
/* Location: ./application/helper/dropdown_helper.php */


//VALIDACION DE FORMULARIOS




 