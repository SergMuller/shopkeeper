<?php if (!$page_title && $page_title == '') { $page_title = 'Приветики!'; } ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Бижуин :: <?php echo $page_title ?></title>
	<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
	<div class="header">
		<div class="logo"></div>
	</div>
<?php
	include_once 'view/' . $page_template . '.php'; 
?>
</body>
</html>