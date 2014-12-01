<?php
// load app config data
require_once 'site_config.php';

// read from db
$db = new mysqli($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
$db->set_charset('utf8');

if ($db->connect_errno) {
	echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}

// get currencies
$sql = 'SELECT * FROM ' . $config['table_currencies'] . ' ORDER BY id ASC';

$result = $db->query($sql);

if (!$result) {
	echo "Operation failed: (" . $db->errno . ") " . $db->error;
}
$currencies = $result->fetch_all(MYSQLI_ASSOC);

// prepare data
if (array_key_exists('product', $_REQUEST) && intval($_REQUEST['product']) > 0) {
	// load existing product
	$sql = 'SELECT * FROM ' . $config['table_products'] . ' WHERE id = ' . $_REQUEST['product'];
	$result = $db->query($sql);
	if (!$result) {}
	$product = $result->fetch_assoc();

	$id			= $product['id'];
	$art 		= $product['prod_art'];
	$name 		= $product['prod_name'];
	$desc 		= $product['prod_desc'];
	$in_cur 	= $product['in_cur'];
	$in_price 	= $product['in_price'];
	$out_cur 	= $product['out_cur'];
	$out_price 	= $product['out_price'];
	$qty		= $product['qty'];
	
	$existing 	= true;
} else {
	$id			= 0;
	$art 		= '';
	$name 		= '';
	$desc 		= '';
	$in_cur 	= $currencies[0]['code'];
	$in_price 	= 0.0;
	$out_cur 	= $currencies[1]['code'];
	$out_price 	= 0.0;
	$qty		= 1;

	$existing 	= false;
}

//prepare secret hash variable
$check_base = 0;
foreach($currencies as $cur) {
	$check_base += $cur['inUSD'];
}
$check_hash = hash_hmac('sha256', $check_base, $config['secret_key']);

// set page view
$page_template = 'product_edit';
if ($existing) {
	$page_title = 'Обновление товара';
} else {
	$page_title = 'Добавление товара';
}

// connect page layout
include_once 'layout/main.php';
?>