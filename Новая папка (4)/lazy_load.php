<?php
//lazy_load

class Database
{

public $connect="succesfull";


private function load($id)
{
  global $Danish;
  $servername="localhost";
  $username="root";
  $password="root";
  $dbname="data";
  $conn=new mysqli($servername,$username,$password,$dbname);
  $Danish=mysqli_query($conn,"SELECT * FROM `dbo` where `id`=$id");
 
  while($win=mysqli_fetch_assoc($Danish))
 	{
  return $a="{$win['имя']} {$win['комментарий']}";
  }
}

public function connect($a,$b)
{
  if($a<$b)
  {
  return $this;
  }
}
  public function ramzi($id)
  {
    return $this->connect(1,2)->load($id); 
  }
}

$db=new Database();
echo $payment=$db->ramzi(7);




// class my_class{
        //public function funcA()
        //{
          //  return $this;
        //}
        //public function funcB()
        //{
      //      return 'Вызов N2';
    //    }

  //  }

//$t = new my_class();
//echo $t->funcA()->funcB();

?>