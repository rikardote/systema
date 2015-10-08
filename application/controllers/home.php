<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends My_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function index()
	{
		$data['user_id']    = $this->tank_auth->get_user_id();
        $data['username']   = $this->tank_auth->get_username();
		$data['panelheading'] = "Inicio";
		
		$data['index'] = "home";
		$this->load->view('layouts/index', $data);
		
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */