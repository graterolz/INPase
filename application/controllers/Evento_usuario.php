<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento_usuario extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model(SYS_MODEL);
		$this->load->model(EVENTO_MODEL);
		$this->load->model(EVENTO_USUARIO_MODEL);
		$this->load->model(EVENTO_TIPO_ENTRADA_VENDEDOR_MODEL);
		$this->load->model(USUARIO_ROL_MODEL);
	}

	// Index
	function index(){
		redirect(EVENTO_CONTROLLER, 'refresh');
		return false;
	}

	//
	function get($ideveve = NULL){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if($ideveve == NULL){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}		
		if(!$this->Evento_usuario_model->get($ideveve)){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		if($this->session->userdata(IDROL_SESSION)!=ORGA){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}

		$idusu = $this->Evento_usuario_model->get($ideveve)->row()->idusu;
		
		$data['usuario_vendedor'] = $this->Usuario_rol_model->get($idusu);
		$data['usuario_rol_rules'] = $this->Usuario_rol_model->usuario_rol_rules;
		$data['evento_tipo_entrada_vendedor'] = $this->Sys_model->getTipoEntradaEventoByVendedor($ideveve);
		$data['ideveve'] = $ideveve;
		$data['evento_tipo_entrada_vendedor_rules']	= $this->Evento_tipo_entrada_vendedor_model->evento_tipo_entrada_vendedor_rules;

		$this->load->view(HEADER);
		$this->load->view(MENU);
		$this->load->view(GET_EVENTO_USUARIO,$data);
		$this->load->view(FOOTER);
	}

	//
	function add($idrol = NULL,$ideve = NULL){
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
			redirect(EVENTO_CONTROLLER, 'refresh');
		}		

		$rules = $this->Evento_usuario_model->evento_usuario_rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				IDEVE => $ideve,
				IDUSU => $this->input->post(NOMBRE_VENDEDOR)
			);
			$this->Evento_usuario_model->add($data);
			redirect(EVENTO_GET.'/'.$ideve, 'refresh');
		}

		$data['evento'] = $this->Evento_model->get($ideve);
		$data['evento_rules'] = $this->Evento_model->evento_rules;
		//

		if($idrol == VEND){
			$evento_usuario = $this->Sys_model->getUsuarioNoIntoEvento($ideve,VEND);
		}
		else if($idrol == PORT){
			$evento_usuario = $this->Sys_model->getUsuarioNoIntoEvento($ideve,PORT);
		}
		else{
			$evento_usuario = false;
		}
		$evento_usuario_array['']='(None)';
		if($evento_usuario!=false){
			foreach($evento_usuario->result_array() as $row){
				$evento_usuario_array[$row[IDUSU]]=$row[NOMBRE].' '.$row[APELLIDO].' - '.$row[EMAIL];
			}
		}
		//
		$data['evento_vendedor'] = $evento_usuario_array;
		$data['usuario_rol_rules'] = $this->Evento_usuario_model->evento_usuario_rules;
		$data['form_attributes'] = $this->Sys_model->form_attributes;

		$this->load->view(HEADER);
		$this->load->view(MENU);
		$this->load->view(ADD_EVENTO_USUARIO,$data);
		$this->load->view(FOOTER);
	}

	//
	function edit($ideveve = NULL){
		redirect(EVENTO_CONTROLLER, 'refresh');
	}

	//
	function del($ideveve = NULL){	
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

		$ideve = $this->Evento_usuario_model->get($ideveve)->row()->ideve;
		redirect(EVENTO_GET.'/'.$ideve, 'refresh');
		
		$this->Evento_usuario_model->del($ideveve);
		redirect(EVENTO_GET.'/'.$ideve, 'refresh');
	}
}