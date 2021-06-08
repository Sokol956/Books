<?php

namespace SellBooks\View;

class View
{
	private $templatesPath;//переменная для пути до папки

    private $extraVars = [];//переменная масив для полученых данны необходимых в мсиве

    public function __construct(string $templatesPath)//конструктор пути до папки
    {
    	$this->templatesPath = $templatesPath;
    }

    public function setVar(string $name, $value): void
    {
        $this->extraVars[$name] = $value;
    }

    public function renderHtml(string $templateName, array $vars = [], int $code = 200)//метод для передачи пути до файла, принимает название шаблона
    {
    	http_response_code($code);//установить полученный код ответа траницы

    	extract($this->extraVars);//извлекает массив в переменные
    	extract($vars);//извлекает массив в переменные

    	ob_start(); //включение буфера вывода(скрипты не выводится, а сохраняется в буфере)
    	include $this->templatesPath . '/' . $templateName; // подключить шаблон templatesPath - путь до папки / templateName какой шаблон открыть.
    	$buffer = ob_get_contents(); //сохранить данные из буфера в переменной buffer
    	ob_end_clean();//выключить и очистить буфер

    	echo $buffer; //вывести данные из переменное где находятся данные буфера.
    }
}