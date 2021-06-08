<?php

namespace SellBooks\Controllers;

use SellBooks\Models\Books\Book;
use SellBooks\View\View; //использовать файл View по неймспейсу

class MainController extends AbstractController //мейн контроллер наследует абстрактный с путём к папке шаблонов 
{
	public function main()
	{
		$books = Book::findAll();
		$this->view->renderHtml('main/main.php', ['books' => $books]); //вызов отрисовки страницы методом renderHtml
	}

	public function adminMain()
	{
		$books = Book::findAll();//получить масив с данными книг из бд
		$this->view->renderHtml('main/adminMain.php', ['books' => $books]); 
	}
}