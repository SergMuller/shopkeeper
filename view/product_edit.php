<script type="text/javascript">
	function convert(in_out) {
		
	}

	$('#submit_button').click(function(){
		if ($('#prod_art').val() == '') {
			
		}
	});
</script>

<div class="wrapper">
	<h1><?php if ($existing) { ?>Обновление<?php } else { ?>Добавление<?php } ?> товара</h1>
	<form action="index.php" method="POST">
		<input type="hidden" name="p" value="saveproduct" />
		<input type="hidden" name="check" value="<?php echo $check_hash ?>" />
		<input type="hidden" name="product" value="<?php echo $id ?>" />
		<div class="row art mandatory">
			<label for="prod_art">Артикул</label>
			<input name="prod_art" size="10" value="<?php echo $art ?>"/>
			<?php if (array_key_exists('warning', $_REQUEST)) { ?>
				<span class="warning">Следует указать артикул</span>
			<?php } ?>
		</div>
		<div class="row name">
			<label for="prod_name">Наименование</label>
			<input name="prod_name" value="<?php echo $name ?>"/>
		</div>
		<div class="row desc">
			<label for="prod_desc">Описание</label>
			<textarea name="prod_desc"><?php echo $desc ?></textarea>
		</div>
		<div class="row in_price">
			<label for="in_price">Закупочная цена</label>
			<input name="in_price" value="<?php echo $in_price ?>"/>
			<label for="in_cur">Валюта</label>
			<select name="in_cur">
				<?php foreach($currencies as $cur) { ?>
					<option value="<?php echo $cur['code'] ?>" <?php if ($cur['code'] == $in_cur) { ?>selected="selected"<?php } ?>><?php echo $cur['name'] ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="row out_price">
			<label for="out_price">Отпускная цена</label>
			<input id="out_price" name="out_price" value="<?php echo $out_price ?>"/>
			<label for="out_cur">Валюта</label>
			<select name="out_cur">
				<?php foreach($currencies as $cur) { ?>
					<option value="<?php echo $cur['code'] ?>" <?php if ($cur['code'] == $out_cur) { ?>selected="selected"<?php } ?>><?php echo $cur['name'] ?></option>
				<?php } ?>
			</select>
		</div>
		<!--- <div class="row conversion">
			<span id="converted"></span>
		</div> --->
		<div class="row qty">
			<label for="qty">Количество</label>
			<input name="qty" value="<?php echo $qty ?>"/>
		</div>
		<button id="submit_button"><?php if ($existing) { ?>Обновить<?php } else { ?>Добавить<?php } ?></button>
	</form>
</div>