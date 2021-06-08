<?php include __DIR__ . '/../header.php'; ?>
<div class="main-page-wrapper">
	<section class="main-page-filters">
		<div class="filters-span">
			<span>Фильтры:</span>
		</div>
		<form name="search" method="post" action="search.php">
			<fieldset class="main-page-genres">
				<legend class="main-page-legend">Поиск по жанрам</legend>
				<input type="search" name="query" placeholder="Введите жанр">
				<button class="button-filter" type="submit">Показать</button>
			</fieldset>
		</form>
		<hr>
		<form name="search" method="post" action="search.php">
			<fieldset class="main-page-authors">
				<legend class="main-page-legend">Поиск по авторам</legend>
				<input type="search" name="query" placeholder="Введите автора">
				<button class="button-filter" type="submit">Показать</button>
			</fieldset>
		</form>
	</section>
	<section class="main-page-books">
		<?php foreach ($books as $book): ?>
			<article class="book">
				<div class="book-photo">
					<a href="/book/<?= $book->getId() ?>"><img src="img/bookimage/<?= $book->getImg() ?>"></a>
				</div>
				<div class="book-info">
					<a href="#"><span>Автор: <?= $book->getAuthor() ?></span></a><br>
					<span>Стоимость: <?= $book->getCost() ?> руб</span>
				</div>
			</article>
		<?php endforeach; ?>
	</section>
</div>
<?php include __DIR__ . '/../footer.php'; ?>