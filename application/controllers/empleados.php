<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('empleado_model');
		$this->load->helper('dropdown');

	
	}

	public function index()
	{
		
		$data['panelheading'] = "Empleados";
			
		$data['options'] = listData('adscripciones','id','adscripcion' ,'descripcion');
		$data['index'] = "empleados/index";
		$this->load->view('layouts/index', $data);

	}
	public function show($id) {
		if ($this->uri->segment(3) != '') {
			$id = $this->uri->segment(3);
		}
			$data['empleado'] = $this->empleado_model->get_empleado_join($id);
			$data['options'] = listData('adscripciones','id','adscripcion' ,'descripcion');
			$data['index'] = "empleados/show";
			$data['panelheading'] = "Empleados";
			
			$this->load->view('layouts/index', $data);
		
	}
	public function add() {
		
		$this->form_validation->set_rules('num_empleado', 'Numero de empleado', 'trim|required|is_unique|numeric|min_length[5]|max_length[6]');
		$this->form_validation->set_rules('nombres', 'Nombre(s)', 'trim|required|min_length[4]|max_length[20]');
		$this->form_validation->set_rules('apellido_pat', 'Apellido Paterno', 'trim|required|min_length[4]|max_length[20]');
		$this->form_validation->set_rules('apellido_mat', 'Apellido Materno', 'trim|required|min_length[4]|max_length[20]');
		$this->form_validation->set_rules('adscripcion_id','Adscripcion', 'required|callback_require_dropdown');
		
		
		if($this->form_validation->run() == FALSE) {
			$data = array(
					'errors' => validation_errors()
				);
			$this->session->set_flashdata($data);
			echo '<div class="label label-danger" role="alert">Llene todos los campos correctamente</div>';
			
		}
		else {
			
			$num_empleado 	= $this->input->post('num_empleado');
			$nombres 		= strtoupper($this->input->post('nombres'));
			$apellido_pat 	= strtoupper($this->input->post('apellido_pat'));
			$apellido_mat 	= strtoupper($this->input->post('apellido_mat'));
			$adscripcion_id = $this->input->post('adscripcion_id');
			$activo 		= 1;//$this->input->post('activo');

			$this->empleado_model->insert(array(
				'num_empleado' => $num_empleado,
				'nombres' => $nombres,
				'apellido_pat' => $apellido_pat,
				'apellido_mat' => $apellido_mat,
				'adscripcion_id' => $adscripcion_id,
				'activo' => $activo
				
			));

			$insert_id = $this->db->insert_id();
			redirect('empleados/'.$insert_id);
			
   			
			echo '<div class="label label-success" role="alert">Empleado capturado satisfactoriamente'.$insert_id.'</div>';

		}

	}
	public function edit($id){
		if ($this->uri->segment(3) != '') {
			$id = $this->uri->segment(3);
			
			$data['options'] = listData('adscripciones','id','adscripcion' ,'descripcion');
			$data['actualizar'] = $this->empleado_model->get_empleado_join($id);
			
			
			$this->load->view('empleados/form_update', $data);	
		}
		
	}



	public function update() {
		
		$this->form_validation->set_rules('num_empleado', 'Numero de empleado', 'trim|required|numeric|min_length[5]|max_length[6]');
		$this->form_validation->set_rules('nombres', 'Nombre(s)', 'trim|required|min_length[4]|max_length[20]');
		$this->form_validation->set_rules('apellido_pat', 'Apellido Paterno', 'trim|required|min_length[4]|max_length[20]');
		$this->form_validation->set_rules('apellido_mat', 'Apellido Materno', 'trim|required|min_length[4]|max_length[20]');
		$this->form_validation->set_rules('adscripcion_id','Adscripcion', 'required|callback_require_dropdown');
		
		
		if($this->form_validation->run() == FALSE) {
			$data = array(
					'errors' => validation_errors()
				);
			$this->session->set_flashdata($data);
			echo '<div class="label label-danger" role="alert">Llene todos los campos correctamente</div>';
			
		}
		else {
			$id	   		    = $this->input->post('id');
			$num_empleado 	= $this->input->post('num_empleado');
			$nombres 		= strtoupper($this->input->post('nombres'));
			$apellido_pat 	= strtoupper($this->input->post('apellido_pat'));
			$apellido_mat 	= strtoupper($this->input->post('apellido_mat'));
			$adscripcion_id = $this->input->post('adscripcion_id');
			$activo 		= $this->input->post('activo');

			$this->empleado_model->update(array(
				'num_empleado' => $num_empleado,
				'nombres' => $nombres,
				'apellido_pat' => $apellido_pat,
				'apellido_mat' => $apellido_mat,
				'adscripcion_id' => $adscripcion_id),
				$id
			);

			echo '<div class="label label-success" role="alert">Adscripcion actualizada satisfactoriamente</div>';
		}
	
	}
	public function delete(){
		if ($this->uri->segment(3) != '') {
			$id = $this->uri->segment(3);
			$activate = $this->empleado_model->get_one($id);
		}
		$activo = ($activate->activo) ? FALSE : TRUE; 
		
		$this->empleado_model->update(array(
					'activo' => $activo),
					$id
				);
		redirect('empleados/'.$id);
		
	
	}



	function require_dropdown($str) { 
        if ($str == 0) {
            $this->form_validation->set_message('require_dropdown', 'Selecciona una adscripcion');
            return FALSE;
        } else {
            return TRUE;

        }
    }
    public function search(){
    	$data['panelheading'] = "Empleados";
		//$data['empleados'] = $this->empleado_model->get_empleados();
		
		$data['empleado'] = $this->empleado_model->get_search();
		$data['options'] = listData('adscripciones','id','adscripcion' ,'descripcion');
		$data['index'] = "empleados/index";
		$this->load->view('layouts/index', $data);
		
	}
	

}

/* End of file qnasController.php */
/* Location: ./application/controllers/qnasController.php */