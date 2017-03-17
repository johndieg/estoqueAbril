<?php
/*
Plugin Name: Estoque Plugin
Plugin URI: http://#
Description: Plugin Teste
Version: 1.0
Author: John Diego
Author URI: http://exemplo.org
License: GPLv2
*/

add_action('init', function(){
	include dirname(__FILE__) . '/includes/class-produto-admin-menu.php';
	include dirname(__FILE__) . '/includes/class-produto-list-table.php';
	include dirname(__FILE__) . '/includes/class-form-handler.php';
	include dirname(__FILE__) . '/includes/produto-functions.php';

	new Produto_Admin_Menu();
} );

?>