<?php
/*
Plugin Name: Cadastro Cliente Plugin
Plugin URI: http://#
Description: Plugin Teste
Version: 1.0
Author: John Diego
Author URI: http://#
License: GPLv2
*/

add_action('init', function(){
	include dirname(__FILE__) . '/includes/class-cliente-admin-menu.php';
	include dirname(__FILE__) . '/includes/class-cliente-list-table.php';
	/*include dirname(__FILE__) . '/includes/class-form-handler.php';*/
	include dirname(__FILE__) . '/includes/cliente-functions.php';

	new Cliente_Admin_Menu();
} );