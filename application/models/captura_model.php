<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Captura_model extends My_Model {

	//public $has_many = array('qnas');
 	public $table = 'captura_incidencias'; // you MUST mention the table name
 	public $primary_key = 'id'; // you MUST mention the primary key
    public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
   	public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
	
    function __construct()
    {
        
    	
    	parent::__construct();
    }

    public function get_incidencias(){
    
        $this->db->select('*');

        $this->db->from('captura_incidencias');
        $this->db->join('qnas', 'qnas.id = captura_incidencias.qna_id');
        $this->db->join('empleados', 'empleados.id = captura_incidencias.empleado_id');
        $this->db->join('incidencias', 'incidencias.id = captura_incidencias.incidencia_id');
     
        $query = $this->db->get();
        return $query->result();
 }

 public $rules = array(
           
            'qna_id' => array('field'=>'qna_id',
                        'label'=>'QNA',
                        'rules'=>'trim|required',
                        'errors' => array ('required' => 'Error Message rule "required" for field email')
                        ),
            'empleado_id' => array('field'=>'empleado_id',
                        'label'=>'Empleado',
                        'rules'=>'trim|required',
                        'errors' => array ('required' => 'Error Message rule "required" for field email')
                        ),
            'incidencia_id' => array('field'=>'incidencia_id',
                        'label'=>'Codigo de incidencia',
                        'rules'=>'trim|required',
                        'errors' => array ('required' => 'Error Message rule "required" for field email')
                        ),
            'fecha_inicial' => array('field'=>'fecha_inicial',
                        'label'=>'Fecha inicial',
                        'rules'=>'trim|required',
                        'errors' => array ('required' => 'Error Message rule "required" for field email')
                        ),
            'fecha_final' => array('field'=>'fecha_final',
                        'label'=>'Fecha Final',
                        'rules'=>'trim|required',
                        'errors' => array ('required' => 'Error Message rule "required" for field email')
                        ),
            'token' => array('field'=>'token')

    );

}

/* End of file captura_model.php */
/* Location: ./application/models/captura_model.php */