<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Capturas extends My_Model {
 	public $table = 'captura_incidencias'; // you MUST mention the table name
    public $primary_key = 'id'; // you MUST mention the primary key
    public $fillable = array(); // If you want, you can set an array with the fields that can be filled by insert/update
    public $protected = array(); // ...Or you can set an array with the fields that cannot be filled by insert/update
    protected $timestamps = FALSE;
   	
   	function __construct()  {
       parent::__construct();
    
    }
    public function get_i2ncidencias($qna_id){
    
        $this->db->select("captura_incidencias.*, 
            empleado_id AS emp_id,
            incidencias.id AS inc_id,
            count(incidencia_id) AS conteo,
            incidencias.incidencia_cod,
            incidencias.grupo,
            periodos.id AS perio_id, 
            periodos.period, 
            periodos.year,
            empleados.num_empleado, 
            empleados.nombres, 
            empleados.apellido_pat, 
            empleados.apellido_mat, 

        ");

        $this->db->from('captura_incidencias');
        $this->db->join('qnas', 'qnas.id = captura_incidencias.qna_id');
        $this->db->join('empleados', 'empleados.id = captura_incidencias.empleado_id');
        $this->db->join('incidencias', 'incidencias.id = captura_incidencias.incidencia_id');
        $this->db->join('periodos', 'periodos.id = captura_incidencias.periodo_id');
        $this->db->where('qna_id', $qna_id);
        
       
        $this->db->group_by("token"); 
        
        $query = $this->db->get();
        return $query->results();
 }
 public function get_total_incidencias($qna_id, $centro){
    
        $this->db->select("captura_incidencias.*, 
        	
            empleado_id AS emp_id,
            incidencias.id AS inc_id,
            incidencias.incidencia_cod,
            incidencias.grupo,

            adscripciones.id AS adscrip_id,
            adscripciones.adscripcion,
            adscripciones.descripcion,
            
            empleados.adscripcion_id,

        ");

        $this->db->from('captura_incidencias');
        $this->db->join('qnas', 'qnas.id = captura_incidencias.qna_id');
        $this->db->join('empleados', 'empleados.id = captura_incidencias.empleado_id');
        $this->db->join('incidencias', 'incidencias.id = captura_incidencias.incidencia_id');
        $this->db->join('adscripciones', 'adscripciones.id = empleados.adscripcion_id');
        $this->db->where('qna_id', $qna_id);
        $this->db->where('adscripcion_id', $centro);
        //$this->db->where('adscripcion', $grupo);
       
      
        //$this->db->group_by($centro);  
        $query = $this->db->get();
        return $query->num_rows();
 }
  public function get_incidencias($qna_id){
    
        $this->db->select("captura_incidencias.*, 
        	
            empleado_id AS emp_id,
            incidencias.id AS inc_id,
            count(incidencia_id) AS conteo,
            incidencias.incidencia_cod,
            incidencias.grupo,
            periodos.id AS perio_id, 
            periodos.period, 
            periodos.year,
            adscripciones.id AS adscrip_id,
            adscripciones.adscripcion,
            adscripciones.descripcion,
            empleados.num_empleado, 
            empleados.nombres, 
            empleados.apellido_pat, 
            empleados.apellido_mat, 
            empleados.adscripcion_id,

        ");

        $this->db->from('captura_incidencias');
        $this->db->join('qnas', 'qnas.id = captura_incidencias.qna_id');
        $this->db->join('empleados', 'empleados.id = captura_incidencias.empleado_id');
        $this->db->join('incidencias', 'incidencias.id = captura_incidencias.incidencia_id');
        $this->db->join('adscripciones', 'adscripciones.id = empleados.adscripcion_id');
        $this->db->join('periodos', 'periodos.id = captura_incidencias.periodo_id');
        $this->db->where('qna_id', $qna_id);
        //$this->db->where('adscripcion_id', $centro);
        //$this->db->where('adscripcion', $grupo);
       
        //$this->db->group_by("token"); 
        $this->db->group_by('adscripcion_id');  
        $query = $this->db->get();
        return $query->result();
 }
	

}

/* End of file capturas.php */
/* Location: ./application/models/admin/capturas.php */