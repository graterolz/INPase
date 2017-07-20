<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_vendedor extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	// Index
	function index(){
		redirect(EVENTO_CONTROLLER, 'refresh');
	}
	
	//
	function get($idusu){
		redirect(EVENTO_CONTROLLER, 'refresh');
	}

	//
	function add(){
		redirect(EVENTO_CONTROLLER, 'refresh');
	}

	//
	function edit($idusu,$data){
		redirect(EVENTO_CONTROLLER, 'refresh');
	}

	//
	function del($idusu){
		redirect(EVENTO_CONTROLLER, 'refresh');
	}
}