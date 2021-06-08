<?php

return [
		'~^$~' => [\SellBooks\Controllers\MainController::class, 'main'],
		'~^book/(\d+)$~' => [\SellBooks\Controllers\BooksController::class, 'book'],
		'~^book/(\d+)/order$~' => [\SellBooks\Controllers\BooksController::class, 'orderBook'],
		'~^admin$~' => [\SellBooks\Controllers\MainController::class, 'adminMain'],
		'~^admin/book/(\d+)$~' => [\SellBooks\Controllers\BooksController::class, 'adminBook'],
		'~^admin/book/(\d+)/edit$~' => [\SellBooks\Controllers\BooksController::class, 'bookEdit'],
		'~^admin/book/(\d+)/delete$~' => [\SellBooks\Controllers\BooksController::class, 'bookDelete'],
		'~^admin/add$~' => [\SellBooks\Controllers\BooksController::class, 'addBook'],
];