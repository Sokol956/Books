<?php

namespace SellBooks\Models\Books;

use Sellbooks\Models\ActiveRecordEntity;

class Book extends ActiveRecordEntity
{
	protected $name;

	protected $author;

	protected $cost;

	protected $description;

	protected $img;

	public function getName(): string
	{
		return $this->name;
	}

	public function getDate()
	{
		return $this->created_at;
	}

	public function getAuthor(): string
	{
		return $this->author;
	}

	public function getCost(): string
	{
		return $this->cost;
	}

	public function getDescription(): string
	{
		return $this->description;
	}

	public function getImg(): string
	{
		return $this->img;
	}

	protected static function getTableName(): string
	{
		return 'books';
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function setAuthor(string $author)
	{
		$this->author = $author;
	}

	public function setDescription(string $description)
	{
		$this->description = $description;
	}

	public function setName(string $name)
	{
		$this->name = $name;
	}

	public function setCost(string $cost)
	{
		$this->cost = $cost;
	}

	public function setPhoto($srcFileName)
	{
		$this->img = $srcFileName;
	}


	public function updateFromArray(array $fields): Book
	{
		$this->setName($fields['name']);
		$this->setAuthor($fields['author']);
		$this->setDescription($fields['description']);
		$this->setCost($fields['cost']);
		$this->setPhoto($fields['photo']);

		$this->save();

		return $this;
	}

	public static function createFromArray(array $fields): Book
	{
		$book = new Book ();
		$book->setName($fields['name']);
		$book->setAuthor($fields['author']);
		$book->setDescription($fields['description']);
		$book->setCost($fields['cost']);
		$book->setPhoto($fields['photo']);

		$book->save();
		
		return $book;
	}
}