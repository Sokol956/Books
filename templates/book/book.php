<?php include __DIR__ . '/../header.php'; ?>
<div class="main-page-wrapper">
	<div>
		<div class="book-photo-main">
			<img class="photo-img" src="/img/bookimage/<?= $book->getImg() ?>">
		</div>
		<p>Стоимость: <?= $book->getCost() ?> руб</p><br>
		<a href="/book/<?= $book->getId() ?>/order">Заказать</a><br><br>
	</div>
	<div class="discription">
		<h1><?= $book->getName() ?></h1><p>Добавлено:<?= $book->getDate() ?></p><br><br>
		<p>Автор:<?= $book->getAuthor() ?></p><br><br>
		<p>Описание:<?= $book->getDescription() ?></p>
	</div>
</div>
<?php include __DIR__ . '/../footer.php'; ?>