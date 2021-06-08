<?php include __DIR__ . '/../adminheader.php'; ?>
<div class="main-page-wrapper">
	<div>
		<div class="book-photo-main">
			<img class="photo-img" src="/img/bookimage/<?= $book->getImg() ?>">
		</div>
		<p>Стоимость: <?= $book->getCost() ?> руб</p><br><br>
		<a href="/admin/book/<?= $book->getId() ?>/edit">Редактировать</a><br><br>
		<a href="/admin/book/<?= $book->getId() ?>/delete">Удалить книгу</a>
	</div>
	<div class="discription">
		<h1><?= $book->getName() ?></h1><p>Добавлено:<?= $book->getDate() ?></p><br><br>
		<p>Автор:<?= $book->getAuthor() ?></p><br><br>
		<p>Описание:<?= $book->getDescription() ?></p>
	</div>
</div>
<?php include __DIR__ . '/../footer.php'; ?>