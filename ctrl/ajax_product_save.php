<?php
// load app config data
require_once 'site_config.php';

$id			= intval($_POST['product']);
$art 		= trim($_POST['prod_art']);
$name 		= trim($_POST['prod_name']);
$desc 		= trim($_POST['prod_desc']);
$in_cur 	= $_POST['in_cur'];
$in_price 	= floatval($_POST['in_price']);
$out_cur 	= $_POST['out_cur'];
$out_price 	= floatval($_POST['out_price']);

// read from db
$db = new mysqli($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
$db->set_charset('utf8');

if ($db->connect_errno) {}

// get currencies to check hash/currencies
$sql = 'SELECT * FROM ' . $config['table_currencies'] . ' ORDER BY id ASC';

$result = $db->query($sql);

if (!$result) {}
$currencies = $result->fetch_all(MYSQLI_ASSOC);

//prepare secret hash variable
$check_base = 0;
foreach($currencies as $cur) {
	$check_base += $cur['inUSD'];
}
$check_hash = hash_hmac('sha256', $check_base, $config['secret_key']);

if ($check_hash == $_POST['check']) {
	$existing = $id > 0;
	if (!$existing) {
		// insert values into products table
		$sql = 'INSERT INTO ' . $config['table_products'] . ' (prod_art, prod_name, prod_desc, in_cur, in_price, out_cur, out_price)' .
				' VALUES ("' . $db->real_escape_string($art) . '", "'
						. $db->real_escape_string($name) . '", "'
						. $db->real_escape_string($desc) . '", "'
						. $db->real_escape_string($in_cur) . '", '
						. $in_price . ', "'
						. $db->real_escape_string($out_cur) . '", '
						. $out_price . ')';
	} else {
		$sql = 'UPDATE ' . $config['table_products'] .
				' SET prod_art = "' . $db->real_escape_string($art) . 
					'", prod_name = "' . $db->real_escape_string($name) . 
					'", prod_desc = "' . $db->real_escape_string($desc) . 
					'", in_cur = "' . $db->real_escape_string($in_cur) . 
					'", in_price = ' . $in_price . 
					', out_cur = "' . $db->real_escape_string($out_cur) . 
					'", out_price = ' . $out_price . 
				' WHERE id = ' . $_POST['product'];
	}
	
	$result = $db->query($sql);
	
	if (!$result) {
		$insert_result = 1;
	} else {
		if ($existing) {
			$insert_id = $_POST['product'];
		} else {
			$insert_id = $db->insert_id();
		}
		$insert_result = 2;
	}
} else {
	$insert_result = 0;
}

$db->close();

echo $insert_result;
header('Location: index.php?p=list');
?>