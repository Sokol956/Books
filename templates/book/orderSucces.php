<?php include __DIR__ . '/../header.php'; ?>
<div class="main-page-wrapper">
	<div>
		<div class="book-photo-main">
			<img class="photo-img" src="/img/bookimage/<?= $book->getImg() ?>">
		</div>
	</div>
	<div class="discription">
		<h1>Заказ</h1>
		<p>Книга: <?= $book->getName() ?></p>
		<p>Стоимость: <?= $book->getCost() ?> руб</p>
		<h2>Ваш заказ принят в обработку</h2>
		<p>Ожидайте звонка по отправленны данным!</p>
	</div>
</div>
<?php include __DIR__ . '/../footer.php'; ?>