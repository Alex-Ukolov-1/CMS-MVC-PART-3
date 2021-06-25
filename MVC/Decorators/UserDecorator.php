<?php
namespace MVC\Decorators;


class UserDecorator extends DecoratorFactory
{
	public $user;
	
	public function __construct($user)
	{
		$this->user=$user;
	}
	public function title()
	{
		return implode('',[$this->user->first_name,$this->user->last_name,$this->user->password,$this->user->name]);
	}
	public function body()
	{
		return '<strong>'.htmlspecialchars($this->title()).'<strong>'.'('.htmlspecialchars($this->user->email).')
		.'.'<strong>'.'('.htmlspecialchars($this->user->password).')
		.'.'<strong>'.'('.htmlspecialchars($this->user->name).').';
		
	}
	public function items()
	{
		return '<item>'.
		       '<title>'.htmlspecialchars($this->title()).'</title>'.
			   '<email>'.htmlspecialchars($this->user->email).'<email/>'.
			   ' '.'<password>'.htmlspecialchars($this->user->password).'<password/>'.
			   ' '.'<email>'.htmlspecialchars($this->user->first_name).'<email/>'.
			   ' '.'<email>'.htmlspecialchars($this->user->last_name).'<email/>'.
			   '<item>';
	}
	
	
	
}
?>
