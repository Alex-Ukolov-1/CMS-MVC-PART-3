<?php
try{
    $pdo=new PDO('mysql:host=cms;dbname=registor','root','root');
   }
catch(PDOException $e)
{
  exit('Database error.');
}
?>