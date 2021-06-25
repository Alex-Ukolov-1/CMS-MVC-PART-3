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
    	$query=$pdo->prepare('INSERT INTO animals (id,название,дата) Values (?,?,?)');

    	$query->bindValue(1,$title);
    	$query->bindValue(2,$content);
    	$query->bindValue(3,time());

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
    <h4>Add Article</h4>
    <br/>

    <?php 
    if(isset($error)){?>
    <small style="color:#aa0000"><?php echo $error;?></small>
    <?php 
    }?>
    <?php
     class Bollean
        {
            public function cow()
            {
            $title=$_POST['название'];
            $content=$_POST['дата'];
            $title = trim($title);
            $content = trim($content);
            if (mail("paveltatyana5@mail.ru", "Заявка с сайта", "ФИО:".$title.". E-mail: ".$content ,"paveltatyana5@mail.ru \r\n"))
            {echo "сообщение успешно отправлено";}
            else {echo "при отправке сообщения возникли ошибки";}
            }
        }
        $new=new Bollean();
        echo $new->cow();

    ?>
    <br/>

    <form action="add.php" method="post" autocomplete="off">
    	<input type="text" name="название" placeholder="Title"/><br/><br/>
    	<textarea rows="15" cols="20" placeholder="Content" name="дата"></textarea><br/><br/>
    	<input type="submit" value="add article">
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