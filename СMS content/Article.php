<?php
include_once('InCludes/connection.php');
include_once('InCludes/article.php');

$article=new Article;

if(isset($_GET['id']))
  {
   $id=$_GET['id'];
   $data=$article->fetch_data($id);
   ?>

   <html>
   <head>
   <title>CMS TUTORIAL</title>
   <link rel="stylesheet" href="style.css">
   </head>
    <body>
    <div class="container">
    <a href="index.php' id="logo">CMS</a>
    <h4><?php echo $data['дата'];?>-<small>posted <?php echo date('l jS',$data['дата']);?> </small></h4>

    <p><?php echo $data['дата'];?></p>
     <a href="index.php">&larr; Back</a>
    </div>
    </body>
    </html>

   <?php

   print_r($data);
  }
else
  {
   header('Location: index.php');
   exit();
  }
?>