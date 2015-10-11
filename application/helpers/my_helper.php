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
        $date = date_create($fecha);
        $fecha = date_format($date,"d/m/Y");
        
        return $fecha;
    }
}
if(!function_exists('fecha_ymd')) {
    
    function fecha_ymd($fecha) {
 
        $fecha = date('Y-m-d', strtotime(str_replace('/', '-', $fecha)));
        return $fecha;
    }
}
if ( ! function_exists('active_link'))
{
    function active_link($controller)
    {
        $CI =& get_instance();

        $class = $CI->router->fetch_class();
        return ($class == $controller) ? 'active' : '';
    }
}
if ( ! function_exists('get_total'))
{
    function get_total($qna,$centro) {
        $CI = get_instance();
       
       $data= $CI->capturas->get_total_incidencias($qna,$centro);
        return $data;
    }
}
if ( ! function_exists('get_total_pendientes'))
{
    function get_total_pendientes($qna,$centro) {
        $CI = get_instance();
       
       $data= $CI->capturas->get_total_pendientes($qna,$centro);
        return $data;
    }
}


 
 
/* End of file dropdwon_helper.php */
/* Location: ./application/helper/dropdown_helper.php */


//VALIDACION DE FORMULARIOS




 