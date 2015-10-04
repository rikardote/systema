<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Captura extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('captura_model');
	}
	

	public function index()
	{	
		$this->load->helper('dropdown');
		$data['panelheading'] = "Captura de Incidencias";
		$data['token'] = generateRandomString();
		$data['options'] = listData('incidencias','id','incidencia_cod' ,'inc_descripcion');
		
		$data['capturas'] = $this->captura_model->get_incidencias();
		
		

		$data['index'] = "capturar/index";
		$this->load->view('layouts/index', $data);
		
		
	}
	

	public function add() {
		
		$id = $this->captura_model->from_form()->insert();
		
		if($id === FALSE) {
        	$this->load->view('capturar/index');
	    }
    	else
    	{
        	redirect('captura/index');
        	
        	
    	}
	}

	

}

/* End of file capturaController.php */
/* Location: ./application/controllers/capturaController.php */