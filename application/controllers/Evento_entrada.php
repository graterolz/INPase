<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento_entrada extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model(SYS_MODEL);
		$this->load->model(EVENTO_MODEL);
		$this->load->model(EVENTO_USUARIO_MODEL);
		$this->load->model(EVENTO_ENTRADA_MODEL);
		$this->load->model(USUARIO_ROL_MODEL);
		$this->load->model(EVENTO_TIPO_ENTRADA_MODEL);
		$this->load->model(EVENTO_TIPO_ENTRADA_VENDEDOR_MODEL);
	}

	// Index
	function index(){
		redirect(EVENTO_CONTROLLER, 'refresh');	
	}

	// Obtener informacion de evento_entrada
	function get($ident = NULL){
		redirect(EVENTO_CONTROLLER, 'refresh');
	}

	// Obtener informacion de evento_entrada (ORGA)
	function gets($ideve = NULL){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($ideve == NULL){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		if(!$this->Evento_model->get($ideve)){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		if($this->session->userdata(IDROL_SESSION)!=ORGA){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}

		$data['evento'] = $this->Evento_model->get($ideve);
		$data['evento_rules'] = $this->Evento_model->evento_rules;
		$data['evento_entrada'] = $this->Sys_model->getsEntradaByEvento($ideve);
		$data['evento_entrada_rules'] = $this->Evento_entrada_model->evento_entrada_rules;

		$this->load->view(HEADER);
		$this->load->view(MENU);
		$this->load->view(GETS_EVENTO_ENTRADA,$data);
		$this->load->view(FOOTER);
	}

	// Obtener informacion de evento_entrada (VEND)
	function getss($ideveve = NULL){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($ideveve == NULL){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		if(!$this->Evento_usuario_model->get($ideveve)){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		if($this->session->userdata(IDROL_SESSION)!=VEND){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}
		$ideve = $this->Evento_usuario_model->get($ideveve)->row()->ideve;
		$data['evento'] = $this->Evento_model->get($ideve);
		$data['evento_rules'] = $this->Evento_model->evento_rules;
		$data['evento_entrada'] = null; //$this->Sys_model->getsEntradaByEvento($ideve);
		$data['evento_entrada_rules'] = $this->Evento_entrada_model->evento_entrada_rules;

		$this->load->view(HEADER);
		$this->load->view(MENU);
		$this->load->view(GETS_EVENTO_ENTRADA,$data);
		$this->load->view(FOOTER);
	}

	//
	public function search($ideveve = NULL){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($ideveve == NULL){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}		
		if($this->session->userdata(IDROL_SESSION)!=PORT){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}

		$ideve = $this->Evento_usuario_model->get($ideveve)->row()->ideve;
		$data['evento'] = $this->Evento_model->get($ideve);
		$data['evento_tipo_entrada'] =


		$data['evento_rules'] = $this->Evento_model->evento_rules;

		$rules = $this->Evento_entrada_model->evento_entrada_rules_search;
		$this->form_validation->set_rules($rules);

		$data['evento_entrada'] = FALSE;

		if ($this->form_validation->run() == TRUE) {
			$ident = $this->input->post(IDENT);


			//$data['evento_entrada'] = $this->Evento_entrada_model->get($ident);
			$data['evento_entrada'] = $this->Sys_model->searchEntrada($ident,$ideve);

			if ($data['evento_entrada']){
				$ideveteve = $data['evento_entrada']->row()->ideveteve;
				//
				$ideveve = $this->Evento_tipo_entrada_vendedor_model->get($ideveteve)->row()->ideveve;
				$idevete = $this->Evento_tipo_entrada_model->get($ideveteve)->row()->idevete;
				//
				$ideve = $this->Evento_usuario_model->get($ideveve)->row()->ideve;
				//
				$data['evento'] = $this->Evento_model->get($ideve);
				$data['evento_tipo_entrada'] = $this->Evento_tipo_entrada_model->get($idevete);
			}
		}

		$data['form_attributes'] = $this->Sys_model->form_attributes;
		$data['evento_entrada_rules'] = $rules;

		$this->load->view(HEADER);
		$this->load->view(MENU);
		$this->load->view(SEARCH_EVENTO_ENTRADA,$data);
		$this->load->view(FOOTER);
	}

	// Agregar informacion de evento_entrada
	function add($ideveve = NULL){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($ideveve == NULL){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		if(!$this->Evento_usuario_model->get($ideveve)){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		if($this->session->userdata(IDROL_SESSION)!=VEND){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}

		$rules = $this->Evento_usuario_model->evento_vendedor_rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				IDEVEVE => $ideveve,
				IDEVETEVE => $this->input->post(TIPO_ENTRADA),
				NOMBRE_COMPRADOR => $this->input->post(NOMBRE_COMPRADOR),
				EMAIL_COMPRADOR => $this->input->post(EMAIL_COMPRADOR)
			);
			$this->Evento_entrada_model->add($data);
			redirect(EVENTO_ENTRADA_GETSS.'/'.$ideveve, 'refresh');
		}

		$ideve = $this->Evento_usuario_model->get($ideveve)->row()->ideve;
		$idusu = $this->Evento_usuario_model->get($ideveve)->row()->idusu;
		$data['evento'] = $this->Evento_model->get($ideve);

		$rules = $this->Evento_entrada_model->evento_entrada_rules;
		$data['evento_entrada_rules'] = $rules;
		$data['usuario_vendedor'] = $this->Usuario_rol_model->get($idusu);
		//
		$tipo_entrada_vendedor = $this->Sys_model->getTipoEntradaEventoByVendedor($ideveve);
		$tipo_entrada_vendedor_array['']='(None)';
		if($tipo_entrada_vendedor!=false){
			foreach($tipo_entrada_vendedor->result_array() as $row){
				$tipo_entrada_vendedor_array[$row[IDEVETEVE]]=$row[DESCRIPCION].'- Cantidad: ('.$row[CANTIDAD_ENTRADA].')';
			}
		}
		//
		$data['tipo_entrada_vendedor'] = $tipo_entrada_vendedor_array;
		$data['form_attributes'] = $this->Sys_model->form_attributes;

		$this->load->view(HEADER);
		$this->load->view(MENU);
		$this->load->view(ADD_EVENTO_ENTRADA,$data);
		$this->load->view(FOOTER);
	}

	//
	function edit($ident = NULL){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($ident == NULL){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		if(!$this->Evento_entrada_model->get($ident)){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		if($this->session->userdata(IDROL_SESSION)==PORT){
			$this->Evento_entrada_model->access($ident);
			redirect(USUARIO_CONTROLLER, 'refresh');
		}
		redirect(EVENTO_CONTROLLER, 'refresh');
	}

	//
	function del($ident = NULL){
		redirect(EVENTO_CONTROLLER, 'refresh');
	}
}