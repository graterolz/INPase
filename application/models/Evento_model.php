<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento_model extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	// Obtener informacion de evento
	function get($ideve){
		$this->db->where(IDEVE,$ideve);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->get(TABLA_EVENTO);

		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	// Insertar informacion de evento
	function add($data){
		$data=array(
			IDEVE => NULL,
			IDPROD => 1,
			NOMBRE => $data[NOMBRE],
			FECHA => $data[FECHA],
			LIMITE_EMISION => $data[LIMITE_EMISION],
			FECHA_REGISTRO => date(FORMATO_FECHA),
			FECHA_EDICION => date(FORMATO_FECHA),
			ESTADO_REGISTRO => ESTADO_REGISTRO_ACTIVO
		);		
		$query=$this->db->insert(TABLA_EVENTO,$data);
		return $query;
	}

	// Editar informacion de evento
	function edit($ideve,$data){
		$data=array(
			NOMBRE => $data[NOMBRE],
			FECHA => $data[FECHA],
			LIMITE_EMISION => $data[LIMITE_EMISION],
			FECHA_EDICION => date(FORMATO_FECHA)
		);
		$this->db->where(IDEVE,$ideve);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->update(TABLA_EVENTO,$data);
		return $query;
	}

	// Eliminar informacion de evento
	function del($ideve){
		$data=array(
			ESTADO_REGISTRO => ESTADO_REGISTRO_ELIMINADO,
			FECHA_EDICION => date(FORMATO_FECHA)
		);
		$this->db->where(IDEVE,$ideve);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->update(TABLA_EVENTO,$data);
		return $query;
	}

	// Reglas para formularios
	public $evento_rules = array(
		IDEVE => array(
			'label' => 'IDEVE',
		),
		NOMBRE => array(
			'field' => NOMBRE,
			'for' => NOMBRE,
			'label' => 'Nombre del evento',
			'rules' => 'trim|required'
		),
		FECHA => array(
			'field' => FECHA,
			'for' => FECHA,
			'label' => 'Fecha',
			'rules' => 'trim|required'
		),
		LIMITE_EMISION => array(
			'field' => LIMITE_EMISION,
			'for' => LIMITE_EMISION,
			'label' => 'Limite de Emision (Hs)',
			'rules' => 'trim|required'
		),
		FECHA_REGISTRO => array(
			'field' => FECHA_REGISTRO,
			'for' => FECHA_REGISTRO,
			'label' => 'Fecha de Registro'
		)
	);
}