<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento_tipo_entrada_vend extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model(SYS_MODEL);
		$this->load->model(USUARIO_ROL_MODEL);
		$this->load->model(EVENTO_MODEL);
		$this->load->model(EVENTO_USUARIO_MODEL);
		$this->load->model(EVENTO_TIPO_ENTRADA_VEND_MODEL);
	}

	//
	function index(){
		redirect(EVENTO_CONTROLLER, 'refresh');
	}

	//
	function get($ideveteve = NULL){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($ideveteve == NULL){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		if($this->session->userdata(IDROL_SESSION)!=ORGA){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		if(!$this->Evento_tipo_entrada_vend_model->get($ideveteve)){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		redirect(EVENTO_CONTROLLER, 'refresh');
	}

	//
	function add($ideveve = NULL){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($ideveve == NULL){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		if($this->session->userdata(IDROL_SESSION)!=ORGA){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		if(!$this->Evento_usuario_model->get($ideveve)){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}

		$rules = $this->Evento_tipo_entrada_vend_model->evento_tipo_entrada_vend_rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				IDEVEVE => $ideveve,
				IDEVETE => $this->input->post(TIPO_ENTRADA),
				CANTIDAD_ENTRADA => $this->input->post(CANTIDAD_ENTRADA)
			);
			$this->Evento_tipo_entrada_vend_model->add($data);
			redirect(EVENTO_USUARIO_GET.'/'.$ideveve, 'refresh');
		}

		$idusu = $this->Evento_usuario_model->get($ideveve)->row()->idusu;
		$data['usuario_vend'] = $this->Usuario_rol_model->get($idusu);
		$data['usuario_rol_rules'] = $this->Usuario_rol_model->usuario_rol_rules;
		$data['evento_tipo_entrada_vend_rules']	= $rules;

		$evento_tipo_entrada_vendedor = $this->Sys_model->getTipoEntradaVendedorNoIntoVendedor($ideveve);
		$evento_tipo_entrada_vendedor_array['']='(None)';

		if($evento_tipo_entrada_vendedor!=false){
			foreach($evento_tipo_entrada_vendedor->result_array() as $row){
				$evento_tipo_entrada_vendedor_array[$row[IDEVETE]]=$row[DESCRIPCION];
			}
		}
		$data['evento_tipo_entrada_vendedor'] = $evento_tipo_entrada_vendedor_array;
		$data['form_attributes'] = $this->Sys_model->form_attributes;

		$this->load->view(HEADER);
		$this->load->view(MENU);
		$this->load->view(ADD_EVENTO_TIPO_ENTRADA_VEND,$data);
		$this->load->view(FOOTER);
	}

	//
	function edit($ideveteve = NULL){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($ideveteve == NULL){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		if($this->session->userdata(IDROL_SESSION)!=ORGA){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		if(!$this->Evento_tipo_entrada_vend_model->get($ideveteve)){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		$ideveve = $this->Evento_tipo_entrada_vend_model->get($ideveteve)->row()->ideveve;
		redirect(EVENTO_USUARIO_GET.'/'.$ideveve, 'refresh');
	}

	// Eliminar informacion de evento_tipo_entrada
	function del($ideveteve = NULL){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($ideveteve == NULL){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		if($this->session->userdata(IDROL_SESSION)!=ORGA){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		if(!$this->Evento_tipo_entrada_vend_model->get($ideveteve)){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}

		$ideveve = $this->Evento_tipo_entrada_vend_model->get($ideveteve)->row()->ideveve;
		redirect(EVENTO_USUARIO_GET.'/'.$ideveve, 'refresh');
		$this->Evento_tipo_entrada_vend_model->del($ideveteve);
		redirect(EVENTO_USUARIO_GET.'/'.$ideveve, 'refresh');
	}
}