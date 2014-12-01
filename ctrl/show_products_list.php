<?php
// load app config data
require_once 'site_config.php';

if (array_key_exists('page', $_REQUEST)) {
	$current_page = intval($_REQUEST['page']);
} else {
	$current_page = 0;
}

$db = new mysqli($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);
$db->set_charset('utf8');

if ($db->connect_errno) {}

$offset = $current_page * $config['page_size'];

$sql = 'SELECT COUNT(id) FROM ' . $config['table_products'];
$result = $db->query($sql);
if (!$result) {}
$result_row = $result->fetch_row();
$all_products = $result_row[0];

// setup pager
$total_pages = ceil($all_products/$config['page_size']);

$sql = 'SELECT * FROM ' . $config['table_products'] . ' ORDER BY prod_art ASC LIMIT ' . $offset . ', ' . $config['page_size'];
$result = $db->query($sql);
if (!$result) {}
$goods = $result->fetch_all(MYSQLI_ASSOC);

// set page view
$page_template = 'products_list';
$page_title = 'Товары';

$db->close();

// connect page layout
include_once 'layout/main.php';
?>