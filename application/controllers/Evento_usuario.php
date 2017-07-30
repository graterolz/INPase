<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento_usuario extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model(SYS_MODEL);
		$this->load->model(EVENTO_MODEL);
		$this->load->model(EVENTO_USUARIO_MODEL);
		$this->load->model(EVENTO_TIPO_ENTRADA_VEND_MODEL);
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
		
		$data['usuario_vend'] = $this->Usuario_rol_model->get($idusu);
		$data['usuario_rol_rules'] = $this->Usuario_rol_model->usuario_rol_rules;
		$data['evento_tipo_entrada_vend'] = $this->Sys_model->getTipoEntradaEventoByVEND($ideveve);
		$data['ideveve'] = $ideveve;
		$data['evento_tipo_entrada_vend_rules']	= $this->Evento_tipo_entrada_vend_model->evento_tipo_entrada_vend_rules;

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
		if($idrol != VEND && $idrol != PORT){
			redirect(EVENTO_CONTROLLER, 'refresh');
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
				IDUSU => $this->input->post(NOMBRE_USUARIO)
			);
			$this->Evento_usuario_model->add($data);
			redirect(EVENTO_GET.'/'.$ideve, 'refresh');
		}

		$data['evento'] = $this->Evento_model->get($ideve);
		$data['evento_rules'] = $this->Evento_model->evento_rules;

		if($idrol == VEND){
			$evento_usuario = $this->Sys_model->getUsuarioNoIntoEvento($ideve,VEND);
		}
		else if($idrol == PORT){
			$evento_usuario = $this->Sys_model->getUsuarioNoIntoEvento($ideve,PORT);
		}
		$evento_usuario_array['']='(None)';
		if($evento_usuario!=false){
			foreach($evento_usuario->result_array() as $row){
				$evento_usuario_array[$row[IDUSU]]=$row[NOMBRE].' '.$row[APELLIDO].' - '.$row[EMAIL];
			}
		}

		$data['evento_usuario'] = $evento_usuario_array;
		$data['evento_usuario_rules'] = $this->Evento_usuario_model->evento_usuario_rules;
		$data['form_attributes'] = $this->Sys_model->form_attributes;

		$this->load->view(HEADER);
		$this->load->view(MENU);
		if($idrol == VEND){
			$this->load->view(ADD_EVENTO_USUARIO_VEND,$data);
		}
		else if($idrol == PORT){
			$this->load->view(ADD_EVENTO_USUARIO_PORT,$data);
		}
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