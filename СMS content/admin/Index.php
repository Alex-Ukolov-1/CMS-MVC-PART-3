<?php
session_start();
include_once('../InCludes/connection.php');
if(isset($_SESSION['logged_in']))
{
    ?>
 <html>
     <head>
    <title>CMS TUTORIAL</title>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="container">
    <a href="index.php' id="logo">CMS</a>
    <br/>

    <ol>
        <li><a href="add.php">add article</a></li>
        <li><a href="delete.php">delete</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="draw.php">New Admin</a></li>
    </ol>

   
    </div>
</body>
</html>
   <?php
}
else
{

    if(isset($_POST['username'],$_POST['password']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];

        if(empty($username) or empty($password))
        {
         $error='all fields are required';
        }
        else
        {
            $query=$pdo->prepare("SELECT * FROM users WHERE login=? AND pass=?");

            $query->bindValue(1,$username);
            $query->bindValue(2,$password);

            $query->execute();

            $num=$query->rowCount();

            if($num==1)
            {
              $_SESSION['logged_in']=true;
              header('Location:index.php');
              exit();
            }
            else
            {
                $error='Incorrect details!';
            }
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
    <a href="index.php' id="logo">CMS</a>
    <br/>

    <?php 
    if(isset($error)){?>
    <small style="color:#aa0000"><?php echo $error;?></small>
    <?php 
    }?>
    <br/>

    <form action="index.php" method="post" autocomplete="off">
    	<input type="text" name="username" placeholder="Username"/>
    	<input type="password" name="password" placeholder="Password"/>
    	<input type="submit" name="Login" placeholder=""/>
    </form>
    </div>
</body>
</html>
	<?php
}
?>