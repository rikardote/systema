<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Empleado_model extends My_Model {

    	public $table = 'empleados'; // you MUST mention the table name
     	public $primary_key = 'id'; // you MUST mention the primary key
        public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
       	public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
    	
        function __construct()
        {
            
        	
        	parent::__construct();
        }
    public function get_empleados(){
                   
            $this->db->select("empleados.*, adscripciones.id AS ads_id, adscripciones.adscripcion");
            $this->db->from($this->table);
            $this->db->join('adscripciones', 'adscripcion_id = adscripciones.id');
            $query = $this->db->get();
            return $query->result();
     }
     public function get_empleado_join($id){
        
            $this->db->select("empleados.*, adscripciones.id AS ads_id, adscripciones.adscripcion");
            $this->db->from($this->table);
            $this->db->join('adscripciones', 'adscripcion_id = adscripciones.id');
            $this->db->where('empleados.id', $id);
            
            $query = $this->db->get();
            return $query->row();
     }
        function get_search($centros=NULL) {
          $match = $this->input->post('search');
          $this->db->select("empleados.*, adscripciones.id AS ads_id, adscripciones.adscripcion");
          $this->db->from('empleados');
          $this->db->join('adscripciones', 'adscripcion_id = adscripciones.id');
          $this->db->where_in('adscripcion_id',$centros);
          $this->db->where('empleados.num_empleado', $match);
          //$this->db->or_where('empleados.apellido_pat', $match);
          //$this->db->or_where('empleados.apellido_mat', $match);
          
          $query = $this->db->get();
          return $query->result();
        }
    
 
}

/* End of file empleado_model.php */
/* Location: ./application/models/empleado_model.php */