<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model(SYS_MODEL);
		$this->load->model(EVENTO_MODEL);
		$this->load->model(EVENTO_VENDEDOR_MODEL);
		$this->load->model(EVENTO_TIPO_ENTRADA_MODEL);
		$this->load->model(EVENTO_ENTRADA_MODEL);
		$this->load->model(USUARIO_ROL_MODEL);		
	}

	// Index
	function index(){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		/*if($this->session->userdata(IDROL_SESSION)==PORT){
			redirect(EVENTO_ENTRADA_SEARCH, 'refresh');
		}*/
		$idusu = $this->session->userdata(IDUSU_SESSION);

		$this->load->view(HEADER);
		$this->load->view(MENU);
		if ($this->session->userdata(IDROL_SESSION) == ORGA){
			$data['evento'] = $this->Sys_model->getEventos();
			$data['evento_rules'] = $this->Evento_model->evento_rules;
			$this->load->view(LIST_EVENTO_ORGA,$data);
		}
		if ($this->session->userdata(IDROL_SESSION) == VEND){
			$data['usuario_vendedor'] = $this->Usuario_rol_model->get($idusu);
			$data['usuario_rol_rules'] = $this->Usuario_rol_model->usuario_rol_rules;
			$data['evento'] = $this->Sys_model->getEventoByUsuarioVendedor($idusu);
			$data['evento_rules'] = $this->Evento_model->evento_rules;
			$data['evento_vendedor_rules'] = $this->Evento_vendedor_model->evento_vendedor_rules;
			$this->load->view(LIST_EVENTO_VEND,$data);
		}
		if($this->session->userdata(IDROL_SESSION)==PORT){
			//redirect(EVENTO_ENTRADA_SEARCH, 'refresh');
			$data['usuario_vendedor'] = $this->Usuario_rol_model->get($idusu);
			$data['usuario_rol_rules'] = $this->Usuario_rol_model->usuario_rol_rules;
			$data['evento'] = $this->Sys_model->getEventoByUsuarioVendedor($idusu);
			$data['evento_rules'] = $this->Evento_model->evento_rules;
			$data['evento_vendedor_rules'] = $this->Evento_vendedor_model->evento_vendedor_rules;
			$this->load->view(LIST_EVENTO_PORT,$data);
		}		
		$this->load->view(FOOTER);
	}

	// Obtener informacion de evento
	function get($ideve = NULL){
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
		$data['evento_tipo_entrada'] = $this->Sys_model->getTipoEntradabyEvento($ideve);
		$data['evento_tipo_entrada_rules'] = $this->Evento_tipo_entrada_model->evento_tipo_entrada_rules;

		$data['usuario_vendedor'] = $this->Sys_model->getUsuarioVENDByEvento($ideve);
		$data['usuario_portero'] = $this->Sys_model->getUsuarioPORTByEvento($ideve);
		$data['usuario_rol_rules'] = $this->Usuario_rol_model->usuario_rol_rules;
		$data['evento_vendedor_rules'] = $this->Evento_vendedor_model->evento_vendedor_rules;

		$this->load->view(HEADER);
		$this->load->view(MENU);
		$this->load->view(GET_EVENTO,$data);
		$this->load->view(FOOTER);
	}

	// Agregar informacion de evento
	function add(){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($this->session->userdata(IDROL_SESSION)!=ORGA){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}

		$rules = $this->Evento_model->evento_rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				NOMBRE => $this->input->post(NOMBRE),
				LUGAR => $this->input->post(LUGAR),
				FECHA => date_create($this->input->post(FECHA)),
				LIMITE_EMISION => $this->input->post(LIMITE_EMISION)
			);
			$this->Evento_model->add($data);
			redirect(EVENTO_CONTROLLER, 'refresh');
		}

		$data['evento_rules'] = $rules;
		$data['form_attributes'] = $this->Sys_model->form_attributes;
		$data['limite_emision'] = $this->Sys_model->limite_emision;

		$this->load->view(HEADER);
		$this->load->view(MENU);
		$this->load->view(ADD_EVENTO,$data);
		$this->load->view(FOOTER);
	}

	// Editar informacion de evento
	function edit($ideve = NULL){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($ideve == NULL){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}		
		if($this->session->userdata(IDROL_SESSION)!=ORGA){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}		
		if(!$this->Evento_model->get($ideve)){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}

		$rules = $this->Evento_model->evento_rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				NOMBRE => $this->input->post(NOMBRE),
				LUGAR => $this->input->post(LUGAR),
				FECHA => date_create($this->input->post(FECHA)),
				LIMITE_EMISION => $this->input->post(LIMITE_EMISION)
			);

			$this->Evento_model->edit($ideve,$data);
			redirect(EVENTO_CONTROLLER, 'refresh');
		}

		$data['evento'] = $this->Evento_model->get($ideve);
		$data['evento_rules'] = $rules;
		$data['form_attributes'] = $this->Sys_model->form_attributes;
		$data['limite_emision'] = $this->Sys_model->limite_emision;

		$this->load->view(HEADER);
		$this->load->view(MENU);
		$this->load->view(EDIT_EVENTO,$data);
		$this->load->view(FOOTER);
	}

	//
	function del($ideve = NULL){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($ideve == NULL){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		if($this->session->userdata(IDROL_SESSION)!=ORGA){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		if(!$this->Evento_model->get($ideve)){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		
		redirect(EVENTO_CONTROLLER, 'refresh');
		$this->Evento_model->del($ideve);
		redirect(EVENTO_CONTROLLER, 'refresh');
	}
}