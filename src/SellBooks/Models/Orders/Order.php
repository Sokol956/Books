<?php

namespace SellBooks\Models\Orders;

use Sellbooks\Models\ActiveRecordEntity;

class Order extends ActiveRecordEntity
{
	protected $bookId;

	protected $booksNamber;

	protected $customerSurname;

	protected $customerSecondName;

	protected $phone;

	protected $email;

	public function getbookId(): string
	{
		return $this->bookId;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function getSurname(): string
	{
		return $this->surname;
	}

	public function getPhone(): string
	{
		return $this->phone;
	}

	public function getEmail(): string
	{
		return $this->email;
	}

	public function setName(string $name)
	{
		$this->name = $name;
	}
	public function setSurname(string $surname)
	{
		$this->surname = $surname;
	}
	public function setPhone(string $phone)
	{
		$this->phone = $phone;
	}
	public function setEmail(string $email)
	{
		$this->email = $email;
	}

	public function setBooksId(string $booksId)
	{
		$this->booksId = $booksId;
	}

	protected static function getTableName(): string
	{
		return 'orders';
	}

	public static function createOrder(array $fields): Order
	{
		$order = new Order ();
		$order->setName($fields['name']);
		$order->setSurname($fields['surname']);
		$order->setPhone($fields['phone']);
		$order->setEmail($fields['email']);

		$order->save();
		var_dump($order);
		return $order;
	}
}