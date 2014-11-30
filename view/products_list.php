<div class="wrapper">
	<h1>Товары</h1>
	<a href="index.php?p=addproduct">Добавить</a>
	<table>
		<thead>
			<tr>
				<th>Артикул</th>
				<th>Наименование</th>
				<th>Описание</th>
				<th>Закупочная цена</th>
				<th>Отпускная цена</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($goods as $item) { ?>
				<tr class="item">
					<td><a href="index.php?p=editproduct&product=<?php echo $item['id'] ?>"><?php echo $item['prod_art'] ?></a></td>
					<td><?php echo $item['prod_name'] ?></td>
					<td><?php echo $item['prod_desc'] ?></td>
					<td><?php echo $item['in_price'] ?> <?php echo $item['in_cur'] ?></td>
					<td><?php echo $item['out_price'] ?> <?php echo $item['out_cur'] ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>