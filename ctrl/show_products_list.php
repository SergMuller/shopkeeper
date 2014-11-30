<?php
// load app config data
require_once 'site_config.php';

// read from db
$db = new mysqli($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
$db->set_charset('utf8');

if ($db->connect_errno) {
	echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}

// by default select 20 topmost articles
$sql = 'SELECT * FROM ' . $config['table_products'] . ' ORDER BY prod_art ASC LIMIT 20';

$result = $db->query($sql);

if (!$result) {
	echo "Operation failed: (" . $db->errno . ") " . $db->error;
}
$goods = $result->fetch_all(MYSQLI_ASSOC);

// set page view
$page_template = 'products_list';
$page_title = 'Товары';

// connect page layout
include_once 'layout/main.php';
?>