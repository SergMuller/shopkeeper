<?php
	
	// main dispatcher
	if($_REQUEST) {
		switch($_REQUEST['p']) {
			case 'editproduct':
			case 'addproduct': include_once 'ctrl/show_product_edit.php'; break;
			case 'saveproduct': include_once 'ctrl/ajax_product_save.php'; break;
			case 'deleteproduct': include_once 'ctrl/ajax_product_delete.php'; break;
			case 'list':
			default: include_once 'ctrl/show_products_list.php';
		}
	} else {
		include_once 'ctrl/show_products_list.php';
	}	
	
?>