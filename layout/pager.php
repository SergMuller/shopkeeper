<?php
	if (isset($total_pages)) {
		if (!isset($current_page)) { $current_page = 0; }
		if (!isset($page_size)) { $page_size = $config['page_size']; }
?>
<div class="pager">
	<span class="pager_prefix">Страница: </span>
	<?php 
		for ($page = 0; $page < $total_pages; $page++) {
			if ($page == $current_page) { ?>
			<span class="cur_page"><?php echo ($page + 1) ?></span>
		<?php } else
			if ($total_pages > 20 && $page > 2 && (($current_page - $page) > 1 || ($page - $current_page) > 1 && ($total_pages - $page) > 3)) { ?>
			<span>.</span>
		<?php } else { ?>
			<a class="page_link" href="index.php?p=list&page=<?php echo $page ?>"><?php echo ($page + 1) ?></a>
		<?php }
		}
	?>
</div>
<?php } ?>