<?php
namespace MVC\Models;


class Pages
{
	public $collection;
	
	public function __construct($users=null)
	{
	if(is_null($users))
	   {
	   $users=[new Page('page1','password','times','23333'),
	   new Page('page2','password','boston1','9876')];
	   }
	   
	   $this->collection=$users;
	}
	
}

?>
