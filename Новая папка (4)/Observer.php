<?php
Class Event extends ArrayObject
{
	public function __invoke()
	{
		//$this-это ссылка на текущий объект
		//this имеет не только метод,но и свойства;
		//this-это ссылка на свойства объекта
		foreach ($this as $callback)
		{
			//call_user_func_array()-вызывает callback-функцию callback, с параметрами из массива args.;
			//func_get_args()-Возвращает массив, в котором каждый элемент является копией соответствующего члена списка аргументов пользовательской функции.;
          call_user_func_array($callback,func_get_args());
		}
	}
}

$test=new Event();

	$test[]=function($msg,$txt)
	{
		echo "this is the event!<br/>";
	};

    $test[]=function($msg,$txt)
    {
    	echo "<b>Message:</b>:$msg.<b>Text</b>:$txt<br/>";
    };

    $test[]=function($msg,$txt)
    {
    	echo "works great!<br/>";
    };

$test("Some message","Some text");

Class Test extends Eventable
{
	public $onA;

	public function __construct()
	{
		$this->onA=new Event();
	}

	public function A($txt)
	{
		$this->onA("this is A.",$txt);
	}
}

$test=new Test();

$test->onA[] = function($msg, $txt) {
	echo "<b>Message</b>: $msg. <b>Text</b>: $txt <br />";
};

$test->onA[] = function($msg, $txt) {
	echo "Works great! <br />";
};

$test->onA[]=function($msg,$txt)
{
	echo "this is the event<br/>";
};

$test->A("le test");


Class Eventable
{
	public function __call($name,$args)
	{
		if(method_exists($this, $name))
			call_user_func_array(array(&$this,$name),$args);
		else
			if(isset($this->{$name})&& is_callable($this->{$name}))
				call_user_func_array($this->{$name},$args);
	}
}
//https://habr.com/ru/post/106426/
?>