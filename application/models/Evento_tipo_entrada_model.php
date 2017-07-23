<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento_tipo_entrada_model extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	// Obtener informacion de evento_tipo_entrada
	function get($idevete){
		$this->db->where(IDEVETE,$idevete);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->get(TABLA_EVENTO_TIPO_ENTRADA);

		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	// Insertar informacion de evento_tipo_entrada
	function add($data){
		$data=array(
			IDEVETE => NULL,
			IDEVE => $data[IDEVE],
			DESCRIPCION => $data[DESCRIPCION],
			PRECIO => $data[PRECIO],
			CANTIDAD => $data[CANTIDAD],
			FECHA_REGISTRO => date(FORMATO_FECHA_SAVE),
			FECHA_EDICION => date(FORMATO_FECHA_SAVE),
			ESTADO_REGISTRO => ESTADO_REGISTRO_ACTIVO
		);
		$query=$this->db->insert(TABLA_EVENTO_TIPO_ENTRADA,$data);
		return $query;
	}

	// Editar informacion de evento_tipo_entrada
	function edit($idevete,$data){
		$data=array(
			DESCRIPCION => $data[DESCRIPCION],
			PRECIO => $data[PRECIO],
			CANTIDAD => $data[CANTIDAD],
			FECHA_EDICION => date(FORMATO_FECHA_SAVE)
		);		
		$this->db->where(IDEVETE,$idevete);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->update(TABLA_EVENTO_TIPO_ENTRADA,$data);
		return $query;
	}

	// Eliminar informacion de evento_tipo_entrada
	function del($idevete){
		$data=array(
			ESTADO_REGISTRO => ESTADO_REGISTRO_ELIMINADO,
			FECHA_EDICION => date(FORMATO_FECHA_SAVE)
		);		
		$this->db->where(IDEVETE,$idevete);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->update(TABLA_EVENTO_TIPO_ENTRADA,$data);
		return $query;
	}

	// Reglas para formularios
	public $evento_tipo_entrada_rules = array(
		IDEVETE => array(
			'label' => 'IDEVETE',
		),
		DESCRIPCION => array(
			'field' => DESCRIPCION,
			'for' => DESCRIPCION,
			'label' => 'Tipo de Entrada',
			'rules' => 'trim|required'
		),
		PRECIO => array(
			'field' => PRECIO,
			'for' => PRECIO,
			'label' => 'Precio de Entrada',
			'rules' => 'trim|required'
		),
		CANTIDAD => array(
			'field' => CANTIDAD,
			'for' => CANTIDAD,
			'label' => 'Cantidad de Entradas',
			'rules' => 'trim|required'
		),
	);
}