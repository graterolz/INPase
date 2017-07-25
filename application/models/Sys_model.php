<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sys_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	// Regla para formularios
	public $form_attributes = array(
		'role' => 'form',
		'autocomplete' => 'off'
	);

	public $limite_emision = array(
		'' => '(None)',
		'1' => '1 Hs',
		'6' => '6 Hs',
		'12' => '12 Hs',
		'24' => '24 Hs',
		'36' => '36 Hs',
		'48' => '48 Hs'
	);

	// Obtener informacion de todos los eventos
	function getEventos(){
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$this->db->from(TABLA_EVENTO);
		$query=$this->db->get();

		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	// Obtiene informacion de tipos de entradas asociados a un evento
	function getTipoEntradabyEvento($ideve){
		$this->db->where(IDEVE,$ideve);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$this->db->from(TABLA_EVENTO_TIPO_ENTRADA);
		$query=$this->db->get();

		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	// Obtiene informacion de usuario vendedores asociada a un evento
	function getUsuarioVENDByEvento($ideve){
		$this->db->select(
			TABLA_EVENTO_USUARIO.'.'.IDEVEVE.','.
			TABLA_USUARIO_ROL.'.'.NOMBRE.','.
			TABLA_USUARIO_ROL.'.'.APELLIDO.','.
			TABLA_USUARIO_ROL.'.'.EMAIL
		);
		$this->db->where(TABLA_EVENTO_USUARIO.'.'.IDEVE,$ideve);
		$this->db->from(TABLA_EVENTO_USUARIO);
		$this->db->join(
			TABLA_USUARIO_ROL,
			TABLA_USUARIO_ROL.'.'.IDUSU.'='.TABLA_EVENTO_USUARIO.'.'.IDUSU,
			'INNER'
		);
		$this->db->where(TABLA_USUARIO_ROL.'.'.IDROL,VEND);
		$this->db->where(TABLA_EVENTO_USUARIO.'.'.ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$this->db->order_by(1,'ASC');
		$query=$this->db->get();

		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	// Obtiene informacion de usuario vendedores asociada a un evento
	function getUsuarioPORTByEvento($ideve){
		$this->db->select(
			TABLA_EVENTO_USUARIO.'.'.IDEVEVE.','.
			TABLA_USUARIO_ROL.'.'.NOMBRE.','.
			TABLA_USUARIO_ROL.'.'.APELLIDO.','.
			TABLA_USUARIO_ROL.'.'.EMAIL
		);
		$this->db->where(TABLA_EVENTO_USUARIO.'.'.IDEVE,$ideve);
		$this->db->from(TABLA_EVENTO_USUARIO);
		$this->db->join(
			TABLA_USUARIO_ROL,
			TABLA_USUARIO_ROL.'.'.IDUSU.'='.TABLA_EVENTO_USUARIO.'.'.IDUSU,
			'INNER'
		);
		$this->db->where(TABLA_USUARIO_ROL.'.'.IDROL,PORT);
		$this->db->where(TABLA_EVENTO_USUARIO.'.'.ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$this->db->order_by(1,'ASC');
		$query=$this->db->get();

		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}	

	// Obtener informacion de tipos de entradas asociadas a un vendedor
	function getTipoEntradaEventoByVendedor($ideveve){
		$this->db->where(TABLA_EVENTO_TIPO_ENTRADA_VENDEDOR.'.'.IDEVEVE,$ideveve);
		$this->db->select(
			TABLA_EVENTO_TIPO_ENTRADA_VENDEDOR.'.'.IDEVETEVE.','.
			TABLA_EVENTO_TIPO_ENTRADA.'.'.DESCRIPCION.','.
			TABLA_EVENTO_TIPO_ENTRADA_VENDEDOR.'.'.CANTIDAD_ENTRADA
		);
		$this->db->from(TABLA_EVENTO_TIPO_ENTRADA_VENDEDOR);
		$this->db->join(
			TABLA_EVENTO_TIPO_ENTRADA,
			TABLA_EVENTO_TIPO_ENTRADA.'.'.IDEVETE.'='.TABLA_EVENTO_TIPO_ENTRADA_VENDEDOR.'.'.IDEVETE,
			'INNER'
		);
		$this->db->where(TABLA_EVENTO_TIPO_ENTRADA_VENDEDOR.'.'.ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$this->db->order_by(1,'ASC');

		$query=$this->db->get();
		//echo $this->db->last_query();

		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}
	
	// Obtiene informacion de usuario vendedores no asociada a un evento
	function getUsuarioVendedorNoIntoEvento($idrol,$ideve){
		$this->db->where(TABLA_EVENTO_USUARIO.'.'.IDEVE,$ideve);
		$this->db->select(
			TABLA_EVENTO_USUARIO.'.'.IDUSU
		);
		$this->db->from(TABLA_EVENTO_USUARIO);
		$this->db->where(TABLA_EVENTO_USUARIO.'.'.ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->get();
		//echo $this->db->last_query();

		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$data[]=$row[IDUSU];
			}
		}else{
			//return false;
			$data[]=0;
		}
		//var_dump($data);
		
		$this->db->select(
			TABLA_USUARIO_ROL.'.'.IDUSU.','.
			TABLA_USUARIO_ROL.'.'.NOMBRE.','.
			TABLA_USUARIO_ROL.'.'.APELLIDO.','.
			TABLA_USUARIO_ROL.'.'.EMAIL
		);
		$this->db->from(TABLA_USUARIO_ROL);
		$this->db->where(TABLA_USUARIO_ROL.'.'.IDROL,$idrol);
		$this->db->where(TABLA_USUARIO_ROL.'.'.ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$this->db->where_not_in(IDUSU, $data);
		$query=$this->db->get();
		//echo $this->db->last_query();
		
		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	//
	function getTipoEntradaVendedorNoIntoVendedor($ideveve){
		$this->db->where(IDEVEVE,$ideveve);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->get(TABLA_EVENTO_USUARIO);

		if($query->num_rows()>0){
			$ideve = $query->row()->ideve;
		}else{
			$ideve = 0;
		}

		$this->db->where(TABLA_EVENTO_TIPO_ENTRADA_VENDEDOR.'.'.IDEVEVE,$ideveve);
		$this->db->select(
			TABLA_EVENTO_TIPO_ENTRADA_VENDEDOR.'.'.IDEVETE
		);
		$this->db->from(TABLA_EVENTO_TIPO_ENTRADA_VENDEDOR);
		$this->db->where(TABLA_EVENTO_TIPO_ENTRADA_VENDEDOR.'.'.ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->get();
		//echo $this->db->last_query();

		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$data[]=$row[IDEVETE];
			}
		}else{
			//return false;
			$data[]=0;
		}
		//var_dump($data);

		$this->db->select(
			TABLA_EVENTO_TIPO_ENTRADA.'.'.IDEVETE.','.
			TABLA_EVENTO_TIPO_ENTRADA.'.'.DESCRIPCION
		);
		$this->db->from(TABLA_EVENTO_TIPO_ENTRADA);
		$this->db->where(TABLA_EVENTO_TIPO_ENTRADA.'.'.ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$this->db->where_not_in(IDEVETE, $data);
		$this->db->where(TABLA_EVENTO_TIPO_ENTRADA.'.'.IDEVE, $ideve);
		$query=$this->db->get();
		//echo $this->db->last_query();		
		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	// Obtener informacion de eventos asociados a un vendedor
	function getEventoByUsuarioVendedor($idusu){
		$this->db->where(TABLA_EVENTO_USUARIO.'.'.IDUSU,$idusu);
		$this->db->select(
			TABLA_EVENTO_USUARIO.'.'.IDEVEVE.','.
			TABLA_EVENTO.'.'.NOMBRE.','.
			TABLA_EVENTO.'.'.FECHA.','.
			TABLA_EVENTO.'.'.LIMITE_EMISION
		);
		$this->db->from(TABLA_EVENTO_USUARIO);
		$this->db->join(
			TABLA_EVENTO,
			TABLA_EVENTO.'.'.IDEVE.'='.TABLA_EVENTO_USUARIO.'.'.IDEVE,
			'INNER'
		);
		$this->db->where(TABLA_EVENTO_USUARIO.'.'.ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$this->db->order_by(1,'ASC');
		$query=$this->db->get();
		//echo $this->db->last_query();
		
		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	//
	function getsEntradaByEvento($ideve){
		$this->db->select(TABLA_EVENTO_USUARIO.'.'.IDEVEVE);
		$this->db->from(TABLA_EVENTO_USUARIO);
		$this->db->where(IDEVE,$ideve);
		$this->db->where(ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$query=$this->db->get();
		//echo $this->db->last_query();

		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$data[]=$row[IDEVEVE];
			}
		}else{
			$data[]=0;
		}
		//var_dump($data);

		$this->db->select(TABLA_EVENTO_TIPO_ENTRADA_VENDEDOR.'.'.IDEVETEVE);
		$this->db->from(TABLA_EVENTO_TIPO_ENTRADA_VENDEDOR);
		$this->db->where(TABLA_EVENTO_TIPO_ENTRADA_VENDEDOR.'.'.ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$this->db->where_in(IDEVEVE, $data);
		$query=$this->db->get();
		//echo $this->db->last_query();
		unset($data);

		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$data[]=$row[IDEVETEVE];
			}
		}else{
			$data[]=0;
		}
		//var_dump($data);

		$this->db->where(TABLA_EVENTO_ENTRADA.'.'.ESTADO_REGISTRO,ESTADO_REGISTRO_ACTIVO);
		$this->db->where_in(IDEVETEVE, $data);
		$query=$this->db->get(TABLA_EVENTO_ENTRADA);
		//echo $this->db->last_query();

		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}

	// Obtiene informacion de entradas asociados a un evento
	function searchEntrada($ident,$ideve){
		$this->db->select(
			TABLA_EVENTO_TIPO_ENTRADA_VENDEDOR.'.'.IDEVETEVE
		);		
		$this->db->from(TABLA_EVENTO_USUARIO);
		$this->db->where(TABLA_EVENTO_USUARIO.'.'.IDEVE,$ideve);
		$this->db->join(
			TABLA_EVENTO_TIPO_ENTRADA_VENDEDOR,
			TABLA_EVENTO_TIPO_ENTRADA_VENDEDOR.'.'.IDEVEVE.'='.TABLA_EVENTO_USUARIO.'.'.IDEVEVE,
			'INNER'
		);
		$query=$this->db->get();
		//echo $this->db->last_query();

		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$data[]=$row[IDEVETEVE];
			}
		}else{
			$data[]=0;
		}
		//var_dump($data);

		$this->db->where(TABLA_EVENTO_ENTRADA.'.'.IDENT,$ident);
		$this->db->where_in(TABLA_EVENTO_ENTRADA.'.'.IDEVETEVE,$data);
		$query=$this->db->get(TABLA_EVENTO_ENTRADA);
		//echo $this->db->last_query();

		if($query->num_rows()>0){
			return $query;
		}else{
			return false;
		}
	}	
}