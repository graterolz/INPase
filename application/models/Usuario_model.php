<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	// Obtener informacion de usuario
	function get($idusu){
		$this->db->where(IDUSU,$idusu);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->get(TABLA_USUARIO);
		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	// Insertar informacion de usuario
	function add($data){
		$data=array(
			IDUSU => NULL,
			IDROL => $data[IDROL],
			USER => $data[USER],
			PASS => $data[PASS],
			FECHA_REGISTRO => date(FORMATO_FECHA),
			FECHA_EDICION => date(FORMATO_FECHA),
			ESTADO_REGISTRO => ESTADO_REGISTRO_ACTIVO
		);
		$query=$this->db->insert(TABLA_USUARIO,$data);
		return $query;
	}

	// Editar informacion de usuario
	function edit($idusu,$data){
		$data=array(
			USER => $data[USER],
			PASS => $data[PASS],
			FECHA_EDICION => date(FORMATO_FECHA)
		);
		$this->db->where(IDUSU,$idusu);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->update(TABLA_USUARIO,$data);
		return $query;
	}

	// Eliminar informacion de usuario
	function del($idusu){
		$data=array(
			ESTADO_REGISTRO => ESTADO_REGISTRO_ELIMINADO,
			FECHA_EDICION => date(FORMATO_FECHA)
		);
		$this->db->where(IDUSU,$idusu);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->update(TABLA_USUARIO,$data);
		return $query;
	}

	// Login de usuario
	function login($data){
		$this->db->where(USER,$data[USER]);
		$this->db->where(PASS,$data[PASS]);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$this->db->limit(1);
		$query=$this->db->get(TABLA_USUARIO);
		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	// Reglas para formularios
	public $usuario_rules = array();
}