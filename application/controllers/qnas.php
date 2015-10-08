<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qnas extends My_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('qna_model');
		
	}

	public function index()
	{
		$data['user_id']    = $this->tank_auth->get_user_id();
        $data['username']   = $this->tank_auth->get_username();
        $data['is_admin']   = $this->tank_auth->is_admin();
		//$config = array();
		$data['panelheading'] = "Quincenas";
		
		$data['index'] = "qnas/index";
		

		///PAGINACION
		$config["base_url"] = base_url() . "qnas/index";
		$total_row = $this->qna_model->count();
		$config["total_rows"] = $total_row;
		$config["per_page"] = 4;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $total_row;
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
	    $config['cur_tag_close'] = '</a></li>';
	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
	    $config['last_link'] = FALSE;
	    $config['first_link'] = FALSE;
	    $config['next_link'] = '&raquo;';
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';
	    $config['prev_link'] = '&laquo;';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';
		$this->pagination->initialize($config); 
		  
		if($this->uri->segment(3)){
			$page = ($this->uri->segment(3)) ;
		}
		else{
			$page = 1;
		}

		$data['qnas'] = $this->qna_model->order_by('qna_year', 'DESC')->order_by('qna_mes', 'DESC')->paginate($config["per_page"],$total_row);
		

		$this->load->view('layouts/index', $data);	

	}
	public function getAll() {
		
		
	}

	public function add() {
		$this->form_validation->set_rules('qna_mes', 'Qna', 'trim|required|numeric|min_length[1]|max_length[2]');
		$this->form_validation->set_rules('qna_year', 'Ano', 'trim|required|numeric|min_length[4]|max_length[4]');
		$this->form_validation->set_rules('qna_descripcion', 'Descripcion', 'trim|required|min_length[4]|max_length[20]');
		if($this->form_validation->run() == FALSE) {
			$data = array(
					'errors' => validation_errors()
				);
			$this->session->set_flashdata($data);
			echo '<div class="label label-danger" role="alert">Llene todos los campos correctamente</div>';
		}
		else {
			$qna_mes 	= $this->input->post('qna_mes');
			$qna_year 	= $this->input->post('qna_year');
			$descripcion 	= strtoupper($this->input->post('qna_descripcion'));

			
				$this->qna_model->insert(array(
				'qna_mes' => $qna_mes,
				'qna_year' => $qna_year,
				'qna_descripcion' => $descripcion
			
				));
				//$data['qnas'] = $this->qna_model->obtenerTodos();
				echo '<div class="label label-success" role="alert">Quincena capturada satisfactoriamente</div>';
				//$this->load->view('qnas/show', $data);
			
			
			
			//redirect('qnas');
			
		}
		
	}
	/*public function delete($id) {

		
		$this->qna_model->delete($id);
		$this->session->set_flashdata('correct', 'Borrado Exitosamente');
		redirect('qnas');
	
	}*/
	public function edit($id){
		if ($this->uri->segment(3) != '') {
			$id = $this->uri->segment(3);
			$data['actualizar'] = $this->qna_model->get_one($id);
						
			$this->load->view('qnas/form_update', $data);	
		}
		
	}
	public function update() {
		$this->form_validation->set_rules('qna_mes', 'Qna', 'trim|required|numeric|min_length[1]|max_length[2]');
		$this->form_validation->set_rules('qna_year', 'Ano', 'trim|required|numeric|min_length[4]|max_length[4]');
		$this->form_validation->set_rules('qna_descripcion', 'Descripcion', 'trim|required|min_length[4]|max_length[20]');
		if($this->form_validation->run() == FALSE) {
			$data = array(
					'errors' => validation_errors()
				);
			$this->session->set_flashdata($data);
			echo '<div class="label label-danger" role="alert">Llene todos los campos correctamente</div>';
		}
		else {



			$id	   		     = $this->input->post('id');
			$qna_mes	     = $this->input->post('qna_mes');
			$qna_year        = $this->input->post('qna_year');
			$qna_descripcion 	 = strtoupper($this->input->post('qna_descripcion'));

			$this->qna_model->update(array(
					'qna_mes' => $qna_mes,
					'qna_year' => $qna_year,
					'qna_descripcion' => $qna_descripcion),
					$id
				
				);

			echo '<div class="label label-success" role="alert">Quincena actualizada satisfactoriamente</div>';
		}
	
	}
	public function activate(){
		if ($this->uri->segment(3) != '') {
			$id = $this->uri->segment(3);
			$activate = $this->qna_model->get_one($id);
		}
		$activa = ($activate->activa) ? FALSE : TRUE; 
		
		$this->qna_model->update(array(
					'activa' => $activa),
					$id
				);
		redirect('qnas');
	}
    
		

}

/* End of file qnasController.php */
/* Location: ./application/controllers/qnasController.php */