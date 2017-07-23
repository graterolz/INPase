<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento_tipo_entrada_vendedor_model extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	//
	function get($ideveteve){
		$this->db->where(IDEVETEVE,$ideveteve);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->get(TABLA_EVENTO_TIPO_ENTRADA_VENDEDOR);

		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	//
	function add($data){
		$data=array(
			IDEVETEVE => NULL,
			IDEVEVE => $data[IDEVEVE],
			IDEVETE => $data[IDEVETE],
			CANTIDAD_ENTRADA => $data[CANTIDAD_ENTRADA],
			FECHA_REGISTRO => date(FORMATO_FECHA_SAVE),
			FECHA_EDICION => date(FORMATO_FECHA_SAVE),
			ESTADO_REGISTRO => ESTADO_REGISTRO_ACTIVO
		);
		$query=$this->db->insert(TABLA_EVENTO_TIPO_ENTRADA_VENDEDOR,$data);
		return $query;
	}

	//
	function edit($ideveteve,$data){
		return false;
	}
	
	//
	function del($ideveteve){
		$data=array(
			ESTADO_REGISTRO => ESTADO_REGISTRO_ELIMINADO,
			FECHA_EDICION => date(FORMATO_FECHA_SAVE)
		);
		$this->db->where(IDEVETEVE,$ideveteve);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->update(TABLA_EVENTO_TIPO_ENTRADA_VENDEDOR,$data);
		return $query;
	}	

	// Obtener informacion de evento_tipo_entrada_vendedor
	/*
	function get($ideve = NULL,$idusu = NULL){
		if($ideve!=NULL){
			$this->db->where(IDEVE,$ideve);
		}		
		if($idusu!=NULL){
			$this->db->where(IDUSU,$idusu);
		}

		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->get(TABLA_EVENTO_TIPO_ENTRADA_VENDEDOR);

		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	// Insertar informacion de evento_tipo_entrada_vendedor
	function add($data){
		return false;
	}

	// Editar informacion de evento_tipo_entrada_vendedor
	function edit($ideve){
		return false;
	}
	// Eliminar informacion de evento_tipo_entrada_vendedor
	function del($ideve){
		return false;
	}
	*/

	// Reglas para formularios
	public $evento_tipo_entrada_vendedor_rules = array(
		IDEVETEVE => array(
			'label' => 'IDEVETEVE',
		),
		TIPO_ENTRADA => array(
			'field' => TIPO_ENTRADA,
			'label' => 'Tipo de Entrada',
		),
		CANTIDAD_ENTRADA => array(
			'field' => CANTIDAD_ENTRADA,
			'for' => CANTIDAD_ENTRADA,
			'label' => 'Cantidad Permitidas',
			'rules' => 'trim|required'
		)
	);
}