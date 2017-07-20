<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model(SYS_MODEL);
		$this->load->model(USUARIO_MODEL);
		$this->load->model(EVENTO_MODEL);
	}

	// Index
	function index(){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}

		$idusu = $this->session->userdata(IDUSU_SESSION);
		$this->get($idusu);
	}

	// Obtener informacion de usuario
	function get($idusu = NULL){
		if(!$this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_LOGIN, 'refresh');
		}
		if(!$this->Usuario_model->get($idusu)){
			$this->logout();
		}
		if($idusu == NULL){
			$this->logout();
		}
		if ($this->session->userdata(IDROL_SESSION) == ORGA){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		else if ($this->session->userdata(IDROL_SESSION) == VEND){
			redirect(EVENTO_CONTROLLER, 'refresh');
		}
		else if ($this->session->userdata(IDROL_SESSION) == PORT){
			redirect(EVENTO_ENTRADA_SEARCH, 'refresh');
		}

		$this->load->view(HEADER);
		$this->load->view(MENU);
		$this->load->view(FOOTER);
	}

	// Login
	function login(){
		if($this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}		
		if($this->input->post(USER) && $this->input->post(PASS)){
			$data = array(
				USER => $this->input->post(USER),
				PASS => $this->input->post(PASS)
			);
			
			if($this->Usuario_model->login($data)){
				$data['info'] = $this->Usuario_model->login($data);

				$datasession  = array(
					IDUSU_SESSION => $data['info']->result()[0]->idusu,
					IDROL_SESSION => $data['info']->result()[0]->idrol
				);
				$this->session->set_userdata($datasession);
			}
		}
		if($this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}		

		$this->load->view(HEADER);
		$this->load->view(GET_LOGIN);
		$this->load->view(FOOTER);
	}

	// Register
	function register(){
		redirect(USUARIO_CONTROLLER, 'refresh');
		if($this->session->userdata(IDUSU_SESSION)){
			redirect(USUARIO_CONTROLLER, 'refresh');
		}		
		$this->load->view(HEADER);
		$this->load->view(GET_REGISTER);
		$this->load->view(FOOTER);
	}

	// Logout
	function logout(){
		$this->session->sess_destroy();
		redirect(USUARIO_CONTROLLER, 'refresh');
	}
}