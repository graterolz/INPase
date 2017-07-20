<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento_vendedor extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model(SYS_MODEL);
		$this->load->model(EVENTO_MODEL);
		$this->load->model(EVENTO_VENDEDOR_MODEL);
		$this->load->model(EVENTO_TIPO_ENTRADA_VENDEDOR_MODEL);
		$this->load->model(USUARIO_VENDEDOR_MODEL);
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
		if(!$this->Evento_vendedor_model->get($ideveve)){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		if($this->session->userdata(IDROL_SESSION)!=ORGA){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}

		$idusu = $this->Evento_vendedor_model->get($ideveve)->row()->idusu;
		
		$data['usuario_vendedor'] = $this->Usuario_vendedor_model->get($idusu);
		$data['usuario_vendedor_rules'] = $this->Usuario_vendedor_model->usuario_vendedor_rules;
		$data['evento_tipo_entrada_vendedor'] = $this->Sys_model->getTipoEntradaEventoByVendedor($ideveve);
		$data['ideveve'] = $ideveve;
		$data['evento_tipo_entrada_vendedor_rules']	= $this->Evento_tipo_entrada_vendedor_model->evento_tipo_entrada_vendedor_rules;

		$this->load->view(HEADER);
		$this->load->view(MENU);
		$this->load->view(GET_EVENTO_VENDEDOR,$data);
		$this->load->view(FOOTER);
	}

	//
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
			redirect(EVENTO_CONTROLLER, 'refresh');
		}		

		$rules = $this->Evento_vendedor_model->evento_vendedor_rules;
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				IDEVE => $ideve,
				IDUSU => $this->input->post(NOMBRE_VENDEDOR)
			);
			$this->Evento_vendedor_model->add($data);
			redirect(EVENTO_GET.'/'.$ideve, 'refresh');
		}

		$data['evento'] = $this->Evento_model->get($ideve);
		$data['evento_rules'] = $this->Evento_model->evento_rules;
		//
		$evento_vendedor = $this->Sys_model->getUsuarioVendedorNoIntoEvento($ideve);
		$evento_vendedor_array['']='(None)';
		if($evento_vendedor!=false){
			foreach($evento_vendedor->result_array() as $row){
				$evento_vendedor_array[$row[IDUSU]]=$row[NOMBRE].' '.$row[APELLIDO].' - '.$row[EMAIL];
			}
		}
		//
		$data['evento_vendedor'] = $evento_vendedor_array;
		$data['usuario_vendedor_rules'] = $this->Evento_vendedor_model->evento_vendedor_rules;
		$data['form_attributes'] = $this->Sys_model->form_attributes;

		$this->load->view(HEADER);
		$this->load->view(MENU);
		$this->load->view(ADD_EVENTO_VENDEDOR,$data);
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
		if(!$this->Evento_vendedor_model->get($ideveve)){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}

		$ideve = $this->Evento_vendedor_model->get($ideveve)->row()->ideve;
		redirect(EVENTO_GET.'/'.$ideve, 'refresh');
		
		$this->Evento_vendedor_model->del($ideveve);
		redirect(EVENTO_GET.'/'.$ideve, 'refresh');
	}
}
/*
	//
	function gets(){
		$this->load->view(HEADER);
		$this->load->view(MENU);
		//$this->load->view(ADD_EVENTO_ENTRADA,$data);
		$this->load->view(FOOTER);
	}

	//
	function getsbyeve(){
		$this->load->view(HEADER);
		$this->load->view(MENU);
		//$this->load->view(ADD_EVENTO_ENTRADA,$data);
		$this->load->view(FOOTER);
	}
*/