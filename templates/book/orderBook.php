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
		<p>На складе: В наличии</p><br>
		<form action="/book/<?= $book->getId() ?>/order" method="post" enctype="multipart/form-data">
			<label for="name">Имя</label><br>
			<input type="name" name="name" id="name" size="50"><br>
			<br>
			<label for="surname">Фамилия</label><br>
			<input type="surname" name="surname" id="surname" size="50"><br>
			<br>
			<label for="phone">Контактный телефон</label><br>
			<input type="phone" name="phone" id="phone" size="50"><br>
			<br>
			<label for="email">Контактная почта</label><br>
			<input type="email" name="email" id="email" size="50"><br>
			<br>
			<br><br>
			<input type="submit" name="Заказать" value="Заказать">
		</form>
	</div>
</div>
<?php include __DIR__ . '/../footer.php'; ?>