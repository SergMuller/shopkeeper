<?php
	if (isset($total_pages)) {
		if (!isset($current_page)) { $current_page = 0; }
		if (!isset($page_size)) { $page_size = $config['page_size']; }
?>
<div class="pager">
	<span class="pager_prefix">Страница: </span>
	<?php for ($page = 0; $page < $total_pages; $page++) { ?>
		<?php if ($page == $current_page) { ?>
			<span class="cur_page"><?php echo ($page + 1) ?></span>
		<?php } else { ?>
			<a class="page_link" href="index.php?p=list&page=<?php echo $page ?>"><?php echo ($page + 1) ?></a>
		<?php } ?>
	<?php } ?>
</div>
<?php } ?>