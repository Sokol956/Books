<?php

namespace SellBooks\Models;

use SellBooks\Services\Db;

abstract class ActiveRecordEntity
{
	protected $id;

	public function getId(): int //получение id
	{
		return $this->id;
	}

	public function __set(string $name, $value)
	{
		$camelCaseName = $this->underscoreToCamelCase($name);
		$this->$camelCaseName = $value;
	}


	public static function findAll(): array//получить масив из таблицы
	{
		$db = Db::getInstance();
		return $db->query('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
	}

	private function underscoreToCamelCase(string $source): string
	{
		return lcfirst(str_replace('_', '', ucwords($source, '_')));
	}

	abstract protected static function getTableName(): string; // получить название таблицы

	public static function getById(int $id): ?self // Запрос на получение строки из бд
	{
		$db = Db::getInstance();
		$entities = $db->query(
			'SELECT * FROM `' . static::getTableName() . '` WHERE id=:id;',
			[':id' => $id],
			static::class
		);
		return $entities ? $entities[0] : null;
	}

	private function mapPropertiesToDbFormat(): array //привести текст в формат для DB
	{
		$reflector = new \ReflectionObject($this);
		$properties = $reflector->getProperties();

		$mappedProperties = [];
		foreach ($properties as $property) {
			$propertyName = $property->getName();
			$propertyNameAsUnderscore = $this->camelCaseToUnderscore($propertyName);
			$mappedProperties[$propertyNameAsUnderscore] = $this->$propertyName;
		}

		return $mappedProperties;
	}

	private function camelCaseToUnderscore(string $source): string//привести текст к нижнему региструи поставить_
	{
		return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $source));
	}

	public function save(): void//проверка данных(не пустойли масив)и выбор соответствующего метода
	{
		$mappedProperties = $this->mapPropertiesToDbFormat();
		if ($this->id !== null) {
			$this->update($mappedProperties);
		} else {
			$this->insert($mappedProperties);
		}
	}

	private function update(array $mappedProperties): void//обновление данных в бд
	{
		$columns2params = [];//масив соответствий - в какие поля ставить значения
    $params2values = [];//масив значений
    $index = 1;
    foreach ($mappedProperties as $column => $value) {//пройти по масиву для бд и сформировать 2 масива
    	$param = ':param' . $index; //создать параметр для каждого нидекса - :param1
    	$columns2params[] = $column . ' = ' . $param;// масив соответствия значений и мараметров -  column1 = :param1
    	$params2values[$param] = $value;//масив значиений в параметрах -  [:param1 => value1]
    	$index++;
    }
    $sql = 'UPDATE ' . static::getTableName() . ' SET ' . implode(', ', $columns2params) . ' WHERE id = ' . $this->id;//формировать запрос
    $db =  Db::getInstance();//проверка подключения к дб, если не подключено то подключить 
    $db->query($sql, $params2values, static::class);//отправка запроса на обновление
  }

  private function insert(array $mappedProperties): void
  {
  	$filteredProperties = array_filter($mappedProperties);

  	$columns = [];
  	$paramsNames = [];
  	$params2values = [];
  	foreach ($filteredProperties as $columnName => $value) {
  		$columns[] = '`' . $columnName. '`';
  		$paramName = ':' . $columnName;
  		$paramsNames[] = $paramName;
  		$params2values[$paramName] = $value;
  	}

  	$columnsViaSemicolon = implode(', ', $columns);
  	$paramsNamesViaSemicolon = implode(', ', $paramsNames);

  	$sql = 'INSERT INTO ' . static::getTableName() . ' (' . $columnsViaSemicolon . ') VALUES (' . $paramsNamesViaSemicolon . ');';

  	$db = Db::getInstance();
  	$db->query($sql, $params2values, static::class);
  	$this->id = $db->getLastInsertId();
  	var_dump($sql);
  }

  public static function delete(int $id)
  {
  	$array = ["a" => "1", "b" => "2"];
  	$db = Db::getInstance();
  	$sql = 'DELETE FROM ' . static::getTableName() . ' WHERE id = ' . $id . ';';
		$db->query($sql, $array, static::class);
		
  }
}