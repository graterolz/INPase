<?php
// URLs
define ('PATH_MENU','index.php');
define ('PATH_RESOURCES','resources/startbootstrap-sb-admin-2');
define ('PATH_RESOURCES2','resources/imgs');
define ('PATH_RESOURCES3','resources/bower_components');// bootstrap-datepicker-1.6.4-dist

// Variables de SESSION
define ('IDUSU_SESSION','idusu_inpase');
define ('IDROL_SESSION','idrol_inpase');

// Helpers
define ('SYS_HELPER','Sys_helper');

// Modelos
define ('SYS_MODEL','Sys_model');
define ('USUARIO_MODEL','Usuario_model');
define ('USUARIO_ROL_MODEL','Usuario_rol_model');
define ('EVENTO_MODEL','Evento_model');
define ('EVENTO_USUARIO_MODEL','Evento_usuario_model');
define ('EVENTO_TIPO_ENTRADA_MODEL','Evento_tipo_entrada_model');
define ('EVENTO_TIPO_ENTRADA_VENDEDOR_MODEL','Evento_tipo_entrada_vendedor_model');
define ('EVENTO_ENTRADA_MODEL','Evento_entrada_model');

// Controladores
define ('USUARIO_CONTROLLER','usuario');
//define ('USUARIO_ROL_CONTROLLER','usuario_rol');
define ('EVENTO_CONTROLLER','evento');
//define ('EVENTO_USUARIO_CONTROLLER','evento_usuario');
define ('EVENTO_TIPO_ENTRADA_CONTROLLER', 'evento_tipo_entrada');
define ('EVENTO_TIPO_ENTRADA_VENDEDOR_CONTROLLER', 'evento_tipo_entrada_vendedor');
define ('EVENTO_ENTRADA_CONTROLLER', 'evento_entrada');

// Metodos Controlador USUARIO
define ('USUARIO_GET','usuario/get');
define ('USUARIO_LOGIN','usuario/login');
define ('USUARIO_REGISTER','usuario/register');
define ('USUARIO_LOGOUT','usuario/logout');

// Metodos Controlador EVENTO
define ('EVENTO_GET','evento/get');
define ('EVENTO_ADD','evento/add');
define ('EVENTO_EDIT','evento/edit');
define ('EVENTO_DEL','evento/del');

// Metodos Controlador EVENTO_USUARIO
define ('EVENTO_USUARIO_GET','evento_usuario/get');
define ('EVENTO_USUARIO_ADD_VEND','evento_usuario/add/VEND');// /add/vend/1
define ('EVENTO_USUARIO_ADD_PORT','evento_usuario/add/PORT');// /add/port/1
define ('EVENTO_USUARIO_DEL','evento_usuario/del');

// Metodos Controlador EVENTO_TIPO_ENTRADA
//define ('EVENTO_TIPO_ENTRADA_GET','evento_tipo_entrada/get');
define ('EVENTO_TIPO_ENTRADA_ADD','evento_tipo_entrada/add');
define ('EVENTO_TIPO_ENTRADA_EDIT','evento_tipo_entrada/edit');
define ('EVENTO_TIPO_ENTRADA_DEL','evento_tipo_entrada/del');

// Metodos Controlador EVENTO_TIPO_ENTRADA_VENDEDOR
define ('EVENTO_TIPO_ENTRADA_VENDEDOR_ADD','evento_tipo_entrada_vendedor/add');
define ('EVENTO_TIPO_ENTRADA_VENDEDOR_EDIT','evento_tipo_entrada_vendedor/edit');
define ('EVENTO_TIPO_ENTRADA_VENDEDOR_DEL','evento_tipo_entrada_vendedor/del');


// Metodos Controlador EVENTO_ENTRADA
define ('EVENTO_ENTRADA_GET','evento_entrada/get');
define ('EVENTO_ENTRADA_GETS','evento_entrada/gets');
define ('EVENTO_ENTRADA_GETSS','evento_entrada/getss');
define ('EVENTO_ENTRADA_SEARCH','evento_entrada/search');
define ('EVENTO_ENTRADA_ADD','evento_entrada/add');
define ('EVENTO_ENTRADA_EDIT','evento_entrada/edit');

// Tablas
define ('TABLA_USUARIO','usuario');
define ('TABLA_USUARIO_ROL','usuario_rol');
define ('TABLA_EVENTO','evento');
define ('TABLA_EVENTO_USUARIO','evento_usuario');
define ('TABLA_EVENTO_TIPO_ENTRADA','evento_tipo_entrada');
define ('TABLA_EVENTO_TIPO_ENTRADA_VENDEDOR','evento_tipo_entrada_vendedor');
define ('TABLA_EVENTO_ENTRADA','evento_entrada');

// Campos Tabla USUARIO
define ('IDUSU','idusu');
define ('IDROL','idrol');
define ('USER','user');
define ('PASS','pass');
define ('FECHA_REGISTRO','fecha_registro');
define ('FECHA_EDICION','fecha_edicion');
define ('ESTADO_REGISTRO','estado_registro');

// Campos Tabla USUARIO_ROL
define ('NOMBRE','nombre');
define ('APELLIDO','apellido');
define ('TELEFONO','telefono');
define ('DIRECCION','direccion');
define ('EMAIL','email');
define ('FACEBOOK','facebook');
define ('TWITTER','twitter');
define ('URL_FOTO','url_foto');

// Campos Tabla EVENTO
define ('IDEVE','ideve');
define ('IDPROD','idprod');
define ('LUGAR','lugar');
define ('FECHA','fecha');
define ('LIMITE_EMISION','limite_emision');

// Campos Tabla EVENTO_USUARIO
define ('IDEVEVE','ideveve');

// Campos Tabla EVENTO_TIPO_ENTRADA
define ('IDEVETE','idevete');
define ('DESCRIPCION','descripcion');
define ('PRECIO','precio');
define ('CANTIDAD','cantidad');

// Campos Tabla EVENTO_TIPO_ENTRADA_VENDEDOR
define ('IDEVETEVE','ideveteve');
define ('CANTIDAD_ENTRADA','cantidad_entrada');

// Campos Tabla EVENTO_ENTRADA
define ('IDENT','ident');
define ('NOMBRE_COMPRADOR','nombre_comprador');
define ('EMAIL_COMPRADOR','email_comprador');
define ('ESTADO_ENTRADA','estado_entrada');

// Vistas MENU
define ('HEADER','templates/header');
define ('MENU','templates/menu');
define ('FOOTER','templates/footer');
define ('TITULO_MENU','INPase');
define ('TITULO_EVENTO','Informacion de Evento');
define ('TITULO_EVENTO_TIPO_ENTRADA','Informacion de Tipos de Entradas');
define ('TITULO_EVENTO_TIPO_ENTRADA_VENDEDOR','Informacion de  Tipos de Entradas por Vendedor');
define ('TITULO_VENDEDOR','Informacion de Vendedor/s');
define ('TITULO_PORTERO','Informacion de Portero/s');
define ('TITULO_EVENTO_ENTRADA','Informacion de Entrada/s');

// Vistas MENU
define ('MENU_EVENTO','Eventos');
// define ('MENU_ENTRADA_SEARCH','Buscador');
define ('MENU_LOGOUT','Logout');

// Vistas USUARIO
define ('GET_LOGIN','usuario/get_login');
define ('GET_REGISTER','usuario/get_register');

// Vistas EVENTO
define ('LIST_EVENTO_ORGA','evento/list_evento_orga');
define ('LIST_EVENTO_VEND','evento/list_evento_vend');
define ('LIST_EVENTO_PORT','evento/list_evento_port');
define ('GET_EVENTO','evento/get_evento');
define ('ADD_EVENTO','evento/add_evento');
define ('EDIT_EVENTO','evento/edit_evento');

// Vistas EVENTO_USUARIO
define ('ADD_EVENTO_USUARIO_VEND','evento_usuario/add_evento_usuario_vend');
define ('ADD_EVENTO_USUARIO_PORT','evento_usuario/add_evento_usuario_port');
define ('GET_EVENTO_USUARIO','evento_usuario/get_evento_usuario');

// Vistas EVENTO_ENTRADA
define ('GETS_EVENTO_ENTRADA','evento_entrada/gets_evento_entrada');
define ('ADD_EVENTO_ENTRADA','evento_entrada/add_evento_entrada');
define ('SEARCH_EVENTO_ENTRADA','evento_entrada/search_evento_entrada');

// Vistas EVENTO_TIPO_ENTRADA
//define ('LIST_EVENTO_TIPO_ENTRADA','evento_tipo_entrada/list_evento_tipo_entrada');
define ('ADD_EVENTO_TIPO_ENTRADA','evento_tipo_entrada/add_evento_tipo_entrada');
define ('EDIT_EVENTO_TIPO_ENTRADA','evento_tipo_entrada/edit_evento_tipo_entrada');

// Vistas EVENTO_TIPO_ENTRADA_VENDEDOR
define ('ADD_EVENTO_TIPO_ENTRADA_VENDEDOR','evento_tipo_entrada_vendedor/add_evento_tipo_entrada_vendedor');

// Roles
define ('ADM','ADM');
define ('ORGA','ORGA');
define ('VEND','VEND');
define ('PORT','PORT');

// Formato fecha
define ('FORMATO_FECHA_SAVE','Y-m-d H:i:s');
define ('FORMATO_FECHA_VIEW','d-m-Y H:i');

// Estado de Registros
define ('ESTADO_REGISTRO_ELIMINADO','0');
define ('ESTADO_REGISTRO_ACTIVO','1');

// Estado de Entradas
define ('ESTADO_ENTRADA_ASIGNADA','ASIGNADA');
define ('ESTADO_ENTRADA_VALIDADA','VALIDADA');

// Otros - Literales
define ('NOMBRE_USUARIO','nombre_usuario');
define ('NOMBRE_EVENTO', 'nombre_evento');
define ('TIPO_ENTRADA','tipo_entrada');

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2017, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2017, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     testing
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 */
	define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');

/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */
switch (ENVIRONMENT)
{
	case 'development':
		error_reporting(-1);
		ini_set('display_errors', 1);
	break;

	case 'testing':
	case 'production':
		ini_set('display_errors', 0);
		if (version_compare(PHP_VERSION, '5.3', '>='))
		{
			error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
		}
		else
		{
			error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
		}
	break;

	default:
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'The application environment is not set correctly.';
		exit(1); // EXIT_ERROR
}

/*
 *---------------------------------------------------------------
 * SYSTEM DIRECTORY NAME
 *---------------------------------------------------------------
 *
 * This variable must contain the name of your "system" directory.
 * Set the path if it is not in the same directory as this file.
 */
	$system_path = 'system';

/*
 *---------------------------------------------------------------
 * APPLICATION DIRECTORY NAME
 *---------------------------------------------------------------
 *
 * If you want this front controller to use a different "application"
 * directory than the default one you can set its name here. The directory
 * can also be renamed or relocated anywhere on your server. If you do,
 * use an absolute (full) server path.
 * For more info please see the user guide:
 *
 * https://codeigniter.com/user_guide/general/managing_apps.html
 *
 * NO TRAILING SLASH!
 */
	$application_folder = 'application';

/*
 *---------------------------------------------------------------
 * VIEW DIRECTORY NAME
 *---------------------------------------------------------------
 *
 * If you want to move the view directory out of the application
 * directory, set the path to it here. The directory can be renamed
 * and relocated anywhere on your server. If blank, it will default
 * to the standard location inside your application directory.
 * If you do move this, use an absolute (full) server path.
 *
 * NO TRAILING SLASH!
 */
	$view_folder = '';


/*
 * --------------------------------------------------------------------
 * DEFAULT CONTROLLER
 * --------------------------------------------------------------------
 *
 * Normally you will set your default controller in the routes.php file.
 * You can, however, force a custom routing by hard-coding a
 * specific controller class/function here. For most applications, you
 * WILL NOT set your routing here, but it's an option for those
 * special instances where you might want to override the standard
 * routing in a specific front controller that shares a common CI installation.
 *
 * IMPORTANT: If you set the routing here, NO OTHER controller will be
 * callable. In essence, this preference limits your application to ONE
 * specific controller. Leave the function name blank if you need
 * to call functions dynamically via the URI.
 *
 * Un-comment the $routing array below to use this feature
 */
	// The directory name, relative to the "controllers" directory.  Leave blank
	// if your controller is not in a sub-directory within the "controllers" one
	// $routing['directory'] = '';

	// The controller class file name.  Example:  mycontroller
	// $routing['controller'] = '';

	// The controller function you wish to be called.
	// $routing['function']	= '';


/*
 * -------------------------------------------------------------------
 *  CUSTOM CONFIG VALUES
 * -------------------------------------------------------------------
 *
 * The $assign_to_config array below will be passed dynamically to the
 * config class when initialized. This allows you to set custom config
 * items or override any default config values found in the config.php file.
 * This can be handy as it permits you to share one application between
 * multiple front controller files, with each file containing different
 * config values.
 *
 * Un-comment the $assign_to_config array below to use this feature
 */
	// $assign_to_config['name_of_config_item'] = 'value of config item';



// --------------------------------------------------------------------
// END OF USER CONFIGURABLE SETTINGS.  DO NOT EDIT BELOW THIS LINE
// --------------------------------------------------------------------

/*
 * ---------------------------------------------------------------
 *  Resolve the system path for increased reliability
 * ---------------------------------------------------------------
 */

	// Set the current directory correctly for CLI requests
	if (defined('STDIN'))
	{
		chdir(dirname(__FILE__));
	}

	if (($_temp = realpath($system_path)) !== FALSE)
	{
		$system_path = $_temp.DIRECTORY_SEPARATOR;
	}
	else
	{
		// Ensure there's a trailing slash
		$system_path = strtr(
			rtrim($system_path, '/\\'),
			'/\\',
			DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
		).DIRECTORY_SEPARATOR;
	}

	// Is the system path correct?
	if ( ! is_dir($system_path))
	{
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'Your system folder path does not appear to be set correctly. Please open the following file and correct this: '.pathinfo(__FILE__, PATHINFO_BASENAME);
		exit(3); // EXIT_CONFIG
	}

/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
	// The name of THIS file
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// Path to the system directory
	define('BASEPATH', $system_path);

	// Path to the front controller (this file) directory
	define('FCPATH', dirname(__FILE__).DIRECTORY_SEPARATOR);

	// Name of the "system" directory
	define('SYSDIR', basename(BASEPATH));

	// The path to the "application" directory
	if (is_dir($application_folder))
	{
		if (($_temp = realpath($application_folder)) !== FALSE)
		{
			$application_folder = $_temp;
		}
		else
		{
			$application_folder = strtr(
				rtrim($application_folder, '/\\'),
				'/\\',
				DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
			);
		}
	}
	elseif (is_dir(BASEPATH.$application_folder.DIRECTORY_SEPARATOR))
	{
		$application_folder = BASEPATH.strtr(
			trim($application_folder, '/\\'),
			'/\\',
			DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
		);
	}
	else
	{
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'Your application folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
		exit(3); // EXIT_CONFIG
	}

	define('APPPATH', $application_folder.DIRECTORY_SEPARATOR);

	// The path to the "views" directory
	if ( ! isset($view_folder[0]) && is_dir(APPPATH.'views'.DIRECTORY_SEPARATOR))
	{
		$view_folder = APPPATH.'views';
	}
	elseif (is_dir($view_folder))
	{
		if (($_temp = realpath($view_folder)) !== FALSE)
		{
			$view_folder = $_temp;
		}
		else
		{
			$view_folder = strtr(
				rtrim($view_folder, '/\\'),
				'/\\',
				DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
			);
		}
	}
	elseif (is_dir(APPPATH.$view_folder.DIRECTORY_SEPARATOR))
	{
		$view_folder = APPPATH.strtr(
			trim($view_folder, '/\\'),
			'/\\',
			DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR
		);
	}
	else
	{
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'Your view folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
		exit(3); // EXIT_CONFIG
	}

	define('VIEWPATH', $view_folder.DIRECTORY_SEPARATOR);

/*
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------------
 *
 * And away we go...
 */
require_once BASEPATH.'core/CodeIgniter.php';
