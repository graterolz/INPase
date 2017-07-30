<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento_tipo_entrada extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model(SYS_MODEL);
		$this->load->model(EVENTO_MODEL);
		$this->load->model(EVENTO_TIPO_ENTRADA_MODEL);
	}

	// Index
	function index(){
		redirect(EVENTO_CONTROLLER, 'refresh');
	}

	// Obtener informacion de evento_tipo_entrada
	function get($idevete = NULL){
		redirect(EVENTO_CONTROLLER, 'refresh');
	}

	// Agregar informacion de evento_tipo_entrada
	function add($ideve = NULL){
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

		$rules = $this->Evento_tipo_entrada_model->evento_tipo_entrada_rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				IDEVE => $ideve,
				DESCRIPCION => $this->input->post(DESCRIPCION),
				PRECIO => $this->input->post(PRECIO),
				CANTIDAD => $this->input->post(CANTIDAD)
			);
			$this->Evento_tipo_entrada_model->add($data);
			redirect(EVENTO_GET.'/'.$ideve, 'refresh');
		}
		
		$data['evento'] = $this->Evento_model->get($ideve);
		$data['evento_rules'] = $this->Evento_model->evento_rules;
		$data['evento_tipo_entrada_rules'] = $rules;
		$data['form_attributes'] = $this->Sys_model->form_attributes;

		$this->load->view(HEADER);
		$this->load->view(MENU);
		$this->load->view(ADD_EVENTO_TIPO_ENTRADA,$data);
		$this->load->view(FOOTER);
	}

	// Editar informacion de evento_tipo_entrada
	function edit($idevete = NULL){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($idevete == NULL){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}		
		if($this->session->userdata(IDROL_SESSION)!=ORGA){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}		
		if(!$this->Evento_tipo_entrada_model->get($idevete)){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}

		$rules = $this->Evento_tipo_entrada_model->evento_tipo_entrada_rules;
		$this->form_validation->set_rules($rules);
		$ideve = $this->Evento_tipo_entrada_model->get($idevete)->row()->ideve;

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				DESCRIPCION => $this->input->post(DESCRIPCION),
				PRECIO => $this->input->post(PRECIO),
				CANTIDAD => $this->input->post(CANTIDAD)
			);
			$this->Evento_tipo_entrada_model->edit($idevete,$data);
			redirect(EVENTO_GET.'/'.$ideve, 'refresh');
		}

		$data['evento'] = $this->Evento_model->get($ideve);
		$data['evento_rules'] = $this->Evento_model->evento_rules;
		$data['evento_tipo_entrada'] = $this->Evento_tipo_entrada_model->get($idevete);
		$data['evento_tipo_entrada_rules'] = $rules;
		$data['form_attributes'] = $this->Sys_model->form_attributes;

		$this->load->view(HEADER);
		$this->load->view(MENU);
		$this->load->view(EDIT_EVENTO_TIPO_ENTRADA,$data);
		$this->load->view(FOOTER);
	}

	// Eliminar informacion de evento_tipo_entrada
	function del($idevete = NULL){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($idevete == NULL){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		if($this->session->userdata(IDROL_SESSION)!=ORGA){
			redirect(TIPO_ENTRADA_CONTROLLER, 'refresh');
		}
		if(!$this->Evento_tipo_entrada_model->get($idevete)){
			redirect(TIPO_ENTRADA_CONTROLLER, 'refresh');
		}

		$ideve = $this->Evento_tipo_entrada_model->get($idevete)->row()->ideve;
		redirect(EVENTO_GET.'/'.$ideve, 'refresh');

		$this->Evento_tipo_entrada_model->del($idevete);
		redirect(EVENTO_GET.'/'.$ideve, 'refresh');
	}
}