<?php
namespace MVC\Decorators;


class PageDecorator extends DecoratorFactory
{
	public $user;
	
	public function __construct($user)
	{
		$this->page=$user;
	}
	public function title()
	{
		return implode('',[$this->page->first_name,$this->page->last_name,$this->page->name,$this->page->password]);
	}
	public function body()
	{
		return '<strong>'.htmlspecialchars($this->title())
		.'<strong>'.'('.htmlspecialchars($this->page->email).').'
		.'<strong>'.'('.htmlspecialchars($this->page->password).').'
		;
		
	}
	public function items()
	{
		return '<item>'.
		       '<br/>'.
		       '<title>'.htmlspecialchars($this->title()).'</title>'.
			   '<email>'.htmlspecialchars($this->page->email).'<email/>'.
			    ' '.'<password>'.htmlspecialchars($this->page->password).'<password/>'.
				' '.'<password>'.htmlspecialchars($this->page->first_name).'<password/>'.
				' '.'<password>'.htmlspecialchars($this->page->last_name).'<password/>'.
			   '<item>';
	}
	
	
	
}
?>
