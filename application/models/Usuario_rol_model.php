<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_rol_model extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	// Obtener informacion de usuario_rol
	function get($idusu){
		$this->db->where(IDUSU,$idusu);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->get(TABLA_USUARIO_ROL);
		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	// Insertar informacion de usuario_rol
	function add($data){
		$data=array(
			IDUSU => $data[IDUSU],
			NOMBRE => $data[NOMBRE],
			APELLIDO => $data[APELLIDO],
			TELEFONO => $data[TELEFONO],
			DIRECCION => $data[DIRECCION],
			EMAIL => $data[EMAIL],
			FACEBOOK => $data[FACEBOOK],
			TWITTER => $data[TWITTER],
			URL_FOTO => $data[URL_FOTO],
			FECHA_REGISTRO => date(FORMATO_FECHA_SAVE),
			FECHA_EDICION => date(FORMATO_FECHA_SAVE),
			ESTADO_REGISTRO => ESTADO_REGISTRO_ACTIVO
		);
		$query=$this->db->insert(TABLA_USUARIO_ROL,$data);
		return $query;
	}

	// Editar informacion de usuario_rol
	function edit($idusu,$data){
		$data=array(
			NOMBRE => $data[NOMBRE],
			APELLIDO => $data[APELLIDO],
			TELEFONO => $data[TELEFONO],
			DIRECCION => $data[DIRECCION],
			EMAIL => $data[EMAIL],
			FACEBOOK => $data[FACEBOOK],
			TWITTER => $data[TWITTER],
			URL_FOTO => $data[URL_FOTO],
			FECHA_EDICION => date(FORMATO_FECHA_SAVE)
		);
		$this->db->where(IDUSU,$idusu);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->update(TABLA_USUARIO_ROL,$data);
		return $query;
	}

	// Eliminar informacion de usuario_rol
	function del($idusu){
		$data=array(
			ESTADO_REGISTRO => ESTADO_REGISTRO_ELIMINADO,
			FECHA_EDICION => date(FORMATO_FECHA_SAVE)
		);
		$this->db->where(IDUSU,$idusu);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->update(TABLA_USUARIO_ROL,$data);
		return $query;
	}

	// Reglas para formularios
	public $usuario_rol_rules = array(
		IDUSU => array(
			'label' => 'IDUSU'
		),
		NOMBRE => array(
			'field' => NOMBRE,
			'for' => NOMBRE,
			'label' => 'Nombre',
			'rules' => 'trim|required'
		),
		APELLIDO => array(
			'field' => APELLIDO,
			'for' => APELLIDO,
			'label' => 'Apellido',
			'rules' => 'trim|required'
		),
		TELEFONO => array(
			'field' => TELEFONO,
			'for' => TELEFONO,
			'label' => 'Telefono',
			'rules' => 'trim|required'
		),
		DIRECCION => array(
			'field' => DIRECCION,
			'for' => DIRECCION,
			'label' => 'Direccion',
			'rules' => 'trim|required'
		),
		EMAIL => array(
			'field' => EMAIL,
			'for' => EMAIL,
			'label' => 'Email',
			'rules' => 'trim|required'
		),
		FACEBOOK => array(
			'field' => FACEBOOK,
			'for' => FACEBOOK,
			'label' => 'Facebook',
			'rules' => 'trim|required'
		),
		TWITTER => array(
			'field' => TWITTER,
			'for' => TWITTER,
			'label' => 'Twitter',
			'rules' => 'trim|required'
		),
		URL_FOTO => array(
			'field' => URL_FOTO,
			'for' => URL_FOTO,
			'label' => 'Foto',
			'rules' => 'trim|required'
		)
	);
}