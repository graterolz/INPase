<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento_entrada_model extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	// Obtener informacion de evento_entrada
	function get($ident){
		$this->db->where(IDENT,$ident);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->get(TABLA_EVENTO_ENTRADA);
		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	// Insertar informacion de evento_entrada
	function add($data){
		$data=array(
			IDENT => NULL,
			IDEVETEVE => $data[IDEVETEVE],
			NOMBRE_COMPRADOR => $data[NOMBRE_COMPRADOR],
			EMAIL_COMPRADOR => $data[EMAIL_COMPRADOR],
			ESTADO_ENTRADA => ESTADO_ENTRADA_ASIGNADA,
			FECHA_REGISTRO => date(FORMATO_FECHA_SAVE),
			FECHA_EDICION => date(FORMATO_FECHA_SAVE),
			ESTADO_REGISTRO => ESTADO_REGISTRO_ACTIVO
		);
		$query=$this->db->insert(TABLA_EVENTO_ENTRADA,$data);
		return $query;
	}
	
	// Editar informacion de evento_entrada
	function edit($ident,$data){
		return false;
	}
	
	// Eliminar informacion de evento_entrada
	function del($ident){
		$data=array(
			ESTADO_REGISTRO => ESTADO_REGISTRO_ELIMINADO,
			FECHA_EDICION => date(FORMATO_FECHA_SAVE)
		);
		$this->db->where(IDENT,$ident);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->update(TABLA_EVENTO_ENTRADA,$data);
		return $query;
	}

	// Dar acceso a entrada
	function access($ident){
		$data=array(
			ESTADO_ENTRADA => ESTADO_ENTRADA_VALIDADA
		);
		$this->db->where(IDENT,$ident);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->update(TABLA_EVENTO_ENTRADA,$data);
		return $query;
	}

	// Reglas para formularios
	public $evento_entrada_rules = array(
		IDENT => array(
			'label' => 'IDENT'
		),
		NOMBRE_EVENTO => array(
			'field' => NOMBRE_EVENTO,
			'for' => NOMBRE_EVENTO,
			'label' => 'Nombre del Evento',
			'rules' => 'trim|required'
		),
		NOMBRE_USUARIO => array(
			'field' => NOMBRE_USUARIO,
			'for' => NOMBRE_USUARIO,
			'label' => 'Nombre del Vendedor',
			'rules' => 'trim|required'
		),
		TIPO_ENTRADA => array(
			'field' => TIPO_ENTRADA,
			'for' => TIPO_ENTRADA,
			'label' => 'Tipo de Entrada',
			'rules' => 'trim|required'
		),
		NOMBRE_COMPRADOR => array(
			'field' => NOMBRE_COMPRADOR,
			'for' => NOMBRE_COMPRADOR,
			'label' => 'Nombre del Comprador',
			'rules' => 'trim|required'
		),
		EMAIL_COMPRADOR => array(
			'field' => EMAIL_COMPRADOR,
			'for' => EMAIL_COMPRADOR,
			'label' => 'Email del Comprador',
			'rules' => 'trim|required'
		),
		ESTADO_ENTRADA => array(
			'field' => ESTADO_ENTRADA,
			'for' => ESTADO_ENTRADA,
			'label' => 'Estado de Entrada',
			'rules' => 'trim|required'
		)
	);

	public $evento_entrada_rules_search = array(
		IDENT => array(
			'field' => IDENT,
			'for' => IDENT,
			'label' => 'Identificador de Entrada',
			'rules' => 'trim|required'
		)
	);
}