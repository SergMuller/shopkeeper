<script type="text/javascript">
	function ShowDesc(prod_id) {
		$('#desc_' + prod_id).show();
	}
</script>

<div class="wrapper">
	<h1>Товары</h1>
	<a class="button" href="index.php?p=addproduct">Добавить</a>
	<?php if (count($goods) == 0) { ?>
		<p>Тут ничего нет :-(</p>
	<?php } else { ?>
		<?php include 'layout/pager.php' ?>
		<table width="100%">
			<thead>
				<tr>
					<th width="10%">Действие</td>
					<th width="10%">Артикул</th>
					<th width="15%">Наименование</th>
					<th width="15%">Закупочная цена</th>
					<th width="20%">Отпускная цена</th>
					<th width="20%">Описание</th>
					<th width="10%">Остаток</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($goods as $item) { ?>
					<tr class="item">
						<td><a href="index.php?p=deleteproduct&product=<?php echo $item['id'] ?>">Удалить</a></td>
						<td><a href="index.php?p=editproduct&product=<?php echo $item['id'] ?>"><?php if ($item['prod_art'] == '') echo 'неизвестен'; else echo $item['prod_art']; ?></a></td>
						<td><?php echo $item['prod_name'] ?></td>
						<td align="right"><?php echo $item['in_price'] ?> <span class="currency"><?php echo $item['in_cur'] ?></span></td>
						<td align="right"><?php echo $item['out_price'] ?> <span class="currency"><?php echo $item['out_cur'] ?></span></td>
						<td style="position: relative">
							<?php 	if (mb_strlen($item['prod_desc']) > 20) 
										echo '<span class="pseudo-link" onmouseover="ShowDesc(' . $item['id'] . ')">' . mb_substr($item['prod_desc'], 0, 20) . '...</span><div onmouseout="$(this).hide(400)" class="hidden_desc" id="desc_' . $item['id'] . '">' . $item['prod_desc'] . '</div>'; 
									else 
										echo $item['prod_desc']; ?></td>
						<td align="right"><?php echo $item['qty'] ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php include 'layout/pager.php' ?>
	<?php } ?>
</div>