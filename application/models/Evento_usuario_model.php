<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento_usuario_model extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	// Obtener informacion de evento_vendedor
	function get($ideveve){
		$this->db->where(IDEVEVE,$ideveve);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->get(TABLA_EVENTO_USUARIO);
		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	// Insertar informacion de evento_vendedor
	function add($data){
		$data=array(
			IDEVEVE => NULL,
			IDEVE => $data[IDEVE],
			IDUSU => $data[IDUSU],
			FECHA_REGISTRO => date(FORMATO_FECHA_SAVE),
			FECHA_EDICION => date(FORMATO_FECHA_SAVE),
			ESTADO_REGISTRO => ESTADO_REGISTRO_ACTIVO
		);
		$query=$this->db->insert(TABLA_EVENTO_USUARIO,$data);
		return $query;
	}
	

	// Editar informacion de evento_vendedor
	function edit($ideveve,$data){
		$data=array(
			ESTADO_REGISTRO => ESTADO_REGISTRO_ELIMINADO,
			FECHA_EDICION => date(FORMATO_FECHA_SAVE)
		);
		$this->db->where(IDEVEVE,$ideveve);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->update(TABLA_EVENTO_USUARIO,$data);
		return $query;
	}

	// Eliminar informacion de evento_vendedor
	function del($ideveve){
		$data=array(
			ESTADO_REGISTRO => ESTADO_REGISTRO_ELIMINADO,
			FECHA_EDICION => date(FORMATO_FECHA_SAVE)
		);
		$this->db->where(IDEVEVE,$ideveve);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->update(TABLA_EVENTO_USUARIO,$data);
		return $query;
	}
	
	// Reglas para formularios
	public $evento_vendedor_rules = array(
		IDEVEVE => array(
			'label' => 'IDEVEVE'
		),		
		NOMBRE_VENDEDOR => array(
			'field' => NOMBRE_VENDEDOR,
			'for' => NOMBRE_VENDEDOR,
			'label' => 'Nombre del Vendedor',
			'rules' => 'trim|required'
		)
	);
}