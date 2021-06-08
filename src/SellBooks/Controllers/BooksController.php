<?php

namespace SellBooks\Controllers;

use SellBooks\Models\Books\Book;
use SellBooks\Models\Orders\Order;
use SellBooks\View\View;

class BooksController extends AbstractController
{	

	public function book(int $bookId)
	{
		$book = Book::getById($bookId);

		if ($book === null) {
			throw new NotFoundException();
		}

		$this->view->renderHtml('book/Book.php', [
			'book' => $book
		]);
	}

	public function orderBook(int $bookId)
	{
		$book = Book::getById($bookId);

		if (!empty($_POST)) {
			$_POST['bookId'] = $bookId;
			$order = Order::createOrder($_POST);
			$this->view->renderHtml('book/orderBook.php', [
			'book' => $book]);
			var_dump($_POST);
		} else {
					$this->view->renderHtml('book/orderBook.php', [
			'book' => $book
		]);
		}
	}

	public function adminBook(int $bookId)
	{
		$book = Book::getById($bookId);

		if ($book === null) {
			throw new NotFoundException();
		}

		$this->view->renderHtml('book/adminBook.php', [
			'book' => $book
		]);
	}

	public function bookEdit(int $bookId)
	{
		$book = Book::getById($bookId);

		if ($book === null) {
			throw new NotFoundException();
		}
		
		if(!empty($_POST)) {
			$file = $_FILES['photo'];
			$upOne = realpath(__DIR__ . '/../../..');
			$srcFileName = $file['name'];
			$newFileSrc = $upOne . '/www/img/bookImage/' . $srcFileName;
			move_uploaded_file($file['tmp_name'], $newFileSrc);
			$_POST['photo'] = $file['name'];
			$book->updateFromArray($_POST);
		}

		$this->view->renderHtml('book/bookEdit.php', ['book' => $book]);	
	}

	public function bookDelete(int $bookId)
	{
		$book = Book::delete($bookId);
		$this->view->renderHtml('book/bookDelete.php');
	}

	public function addBook(): void
	{

		if(!empty($_POST)) {
			$file = $_FILES['photo'];
			$upOne = realpath(__DIR__ . '/../../..');
			$srcFileName = $file['name'];
			$newFileSrc = $upOne . '/www/img/bookImage/' . $srcFileName;
			move_uploaded_file($file['tmp_name'], $newFileSrc);
			$_POST['photo'] = $file['name'];
			$book = Book::createFromArray($_POST);
		}

		$this->view->renderHtml('book/addBook.php');	
	}
}