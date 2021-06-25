<?php
session_start();
include_once('../InCludes/connection.php');

if(isset($_SESSION['logged_in']))
{ if(isset($_POST['название'],$_POST['дата']))
   {
    $title=$_POST['название'];
    $content=$_POST['дата'];
    if(empty($title)or empty($content))
    {
    	$error='All fields are required!';
    }
    else
    {
    	$query=$pdo->prepare('INSERT INTO users (id,login,pass,name,фото) Values (?,?,?,?,?)');

    	$query->bindValue(1,$title);
    	$query->bindValue(2,$content);
    	$query->bindValue(3,time());
    	$query->bindValue(4,$title);
    	$query->bindValue(5,$content);


    	$query->execute();
    	header('Location:index.php');
    }

   }
?>
  <html>
     <head>
    <title>CMS TUTORIAL</title>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="container">
    <a href="index.php" id="logo">CMS</a>

    <br/>
    <h4>Add Admin</h4>
    <br/>

    <?php 
    if(isset($error)){?>
    <small style="color:#aa0000"><?php echo $error;?></small>
    <?php 
    }?>
    <br/>

    <form action="draw.php" method="post" autocomplete="off">
    	<input type="text" name="название" placeholder="Title"/><br/><br/>
    	<input type="text" name="дата" placeholder="Title"/><br/><br/>
    	<input type="submit" value="add admin">
    </form>
    </div>
</body>
</html>

  <?php
}
else
{
	header('Location:index.php');
}
?>