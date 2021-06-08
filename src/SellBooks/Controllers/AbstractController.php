<?php

namespace SellBooks\Controllers;

use SellBooks\View\View;

abstract class AbstractController//клас для адресса к шаблонам
{
	protected $view;


	public function __construct() 
	{
		$this->view = new View(__DIR__ . '/../../../templates');
	}
}