<?php
namespace MVC\Models;

class Users
{
	public $collection;
	
	public function __construct($users=null)
	{
	if(is_null($users))
	   {
	   $users=[new User('alexukolov@yandex.ru','Password','alex','ukolov'),
	   new User('alexnogotkov@gmail.com','Password','alexnogotkov','nogotkov')];
	   }
	   
	   $this->collection=$users;
	}
	
}

?>
