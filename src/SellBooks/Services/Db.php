<?php

namespace SellBooks\Services;

use SellBooks\Models\Books\Book;
use SellBooks\Exceptions\DbException;

class Db
{
	private static $instaceCount = 0;//переменная показвающая есть ли подключение

	private static $instanse;

	private $pdo;//переменная для подключения

	private function __construct()//соеденение с базой данніх
	{
		self:$instaceCount++;

		$dbOptions = (require __DIR__ . '/../../settings.php')['db'];//подключить файл с данными для водключения к БД.

		try{
			$this->pdo = new \PDO ( //подключаем пдо пл даннім из файла сеттингс
				'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'], 
				$dbOptions['user'],
				$dbOptions['password']
			);

			$this->pdo->exec('SET NAMES UTF8');//кодировка
		} catch (\PDOException $e) {
        throw new DbException('Ошибка при подключении к базе данных: ' . $e->getMessage());
    }
	}


	public function query(string $sql, $params = [], string $className = 'stdClass'): ?array//функция для отправки запросов в базу данных, принимает название базы и параметры для входа
	{
		$sth = $this->pdo->prepare($sql);//подготовить запрос к выполнению
		$result = $sth->execute($params);//запустить подготовленный запрос

		if (false === $result) {//если не получилось запутсить ничего не возвращает
			return null;
		}

		return $sth->fetchAll(\PDO::FETCH_CLASS, $className);//вернуть массив со всеми строками
	}

	public static function getInstance(): self
	{
		if (self::$instanse === null) {
			self::$instanse = new self();
		}

		return self::$instanse;
	}

	public function getLastInsertId(): int 
    {
        return (int) $this->pdo->lastInsertId();
    }
}