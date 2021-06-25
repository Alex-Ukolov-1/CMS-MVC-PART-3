<?php
include_once('InCludes/connection.php');
include_once('InCludes/article.php');

$article=new Article;
$articles=$article->fetch_all();

?>

<!DOCTYPE html>
<html>
<head>
	<title>CMS TUTORIAL</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    	<a href="index.php' id="logo">CMS</a>
    	<ol>
    		<?php  foreach($articles as $article){?>
           <li><a href="article.php?id=<?php echo $article['id'];?>">
           <?php echo $article['название'];?>
           </a>
           -<small>
           posted<?php echo date(' l  jS',$article['дата']);?>
            </small>
       </li>
   <?php }?>
    	</ol>
    	<br/>
    	<small><a href="admin">admin</small>
    </div>
</body>
</html>