<?php
//data_mapper
//lazy_load
class Address
{
	public $street;
	public $town;
}

class Customer
{
	public $id;
	public $name;
	public $address;
}

class Payment
{
	public $amount;
	public $customer;
}

class Database
{

function load($id)
{
  $servername="localhost";
  $username="root";
  $password="root";
  $dbname="data";
  $conn=new mysqli($servername,$username,$password,$dbname);
  $Danish=mysqli_query($conn,"SELECT * FROM `dbo` where `id`=$id");
 
  while($win=mysqli_fetch_assoc($Danish))
 	{
 	echo $win['имя'];
 	echo $win['комментарий'];
    }
}
}

$db=new Database();
echo $payment=$db->load(7);


//тоже самое что и laze load но все выводится в коллекцию , из которой потом извлекают по определенным параметрам
//данные , все зависит только от кретериев которые вводятся ---- если в лаези лоад постоянное подключение // то дата маппер один раз подключает 
?>