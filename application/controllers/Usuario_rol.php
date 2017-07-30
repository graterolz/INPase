<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_rol extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	// Index
	function index(){
		redirect(EVENTO_CONTROLLER, 'refresh');
	}
	
	//
	function get($$idusu = NULL){
		redirect(EVENTO_CONTROLLER, 'refresh');
	}

	//
	function add(){
		redirect(EVENTO_CONTROLLER, 'refresh');
	}

	//
	function edit($$idusu = NULL,$data){
		redirect(EVENTO_CONTROLLER, 'refresh');
	}

	//
	function del($$idusu = NULL){
		redirect(EVENTO_CONTROLLER, 'refresh');
	}
}