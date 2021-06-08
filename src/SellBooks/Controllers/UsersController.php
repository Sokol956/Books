<?php

namespace SellBooks\Controllers;

use SellBooks\View\View;

class UsersController extends AbstractController
{
	public function login()
	{
		$this->view->renderHtml('Users/login.php');
	}
}