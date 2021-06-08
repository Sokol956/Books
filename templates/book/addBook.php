<?php include __DIR__ . '/../adminheader.php'; ?>
<div class="main-page-wrapper">
	<form action="/admin/add" method="post" enctype="multipart/form-data">
		<h1>Добавление новой книги</h1>
		<label for="name">Название книги</label><br>
		<input type="text" name="name" id="name" value="<?= $_POST['name'] ?? '' ?>" size="50"><br>
		<br>
		<label for="author">Автор</label><br>
		<input type="author" name="author" id="author" value="<?=  $_POST['author'] ?? '' ?>" size="50"><br>
		<br>
		<label for="description">Описание</label><br>
		<textarea name="description" id="description" rows="10" cols="80"><?=  $_POST['description'] ?? '' ?></textarea><br>
		<br>
		<label for="cost">Стоимость</label><br>
		<input type="cost" name="cost" id="cost" value="<?=  $_POST['cost'] ?? '' ?>" size="50"><br>
		<br>
		<label for="photo">Фотография книги</label><br>
		<input type="file" name="photo">
		<br><br>
		<input type="submit" name="Добавить">
	</form>
</div>
<?php include __DIR__ . '/../footer.php'; ?>