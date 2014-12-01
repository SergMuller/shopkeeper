<?php

	$config = array(
		'secret_key' => 'BIJOU1604',
		'db_host' => 'localhost',
		'db_name' => 'bijou_shop',
		'db_user' => 'root',
		'db_pass' => '',
		'table_products' => 'goods',
		'table_currencies' => 'currencies',
		'page_size' => 20
	);

	ini_set('precision', 2);
	mb_internal_encoding('utf-8');
?>