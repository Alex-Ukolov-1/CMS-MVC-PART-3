<?php
session_start();
include_once('../InCludes/connection.php');
include_once('../InCludes/article.php');

$article=new article;


if(isset($_SESSION['logged_in']))
{
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$query=$pdo->prepare('DELETE FROM animals WHERE id=?');
		$query->bindValue(1,$id);
		$query->execute();

		header('Location:delete.php');
	}
	$articles=$article->fetch_all();
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


    <h4>Select an Articleto Delete:</h4>
    

     <form action="delete.php" method="get">
         <select onchange="this.form.submit();" name="id">
         	 <?php  foreach($articles as $article){?>
         	 	<option value="<?php echo $article['id'];?>"><?php echo $article['id']; ?></option>
         	 <?php }?>
         </select>
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