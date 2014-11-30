<?php
	
	// main dispatcher
	if($_REQUEST) {
		switch($_REQUEST['p']) {
			case 'list': include_once 'ctrl/show_products_list.php'; break;
			case 'editproduct':
			case 'addproduct': include_once 'ctrl/show_product_edit.php'; break;
			case 'saveproduct': include_once 'ctrl/ajax_product_save.php'; break;
			default: include_once 'ctrl/show_shop_main.php';
		}
	}	
	
?>