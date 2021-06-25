<?php
include_once('config.php');
include_once('database.php');
include_once('functions.php');

if(isset($_POST['email']))
{
    
    $query='SELECT * FROM users WHERE email="'.$_POST['email'].'" 
    AND password="'.$_POST['password'].'"
    AND active="YES" LIMIT 1';
    $result=mysqli_query($connect,$query);

    if(mysqli_num_rows($result))
    {
      $record=mysqli_fetch_assoc($result);
      
      $_SESSION['id']=$record['id'];
      $_SESSION['email']=$_POST['email'];

      header('Location: dashboard.php');
      die();
    }
}
include_once('header.php');
?>

<form method="post">
   Email:
   <input type="text" name="email">
   <br>
   Password:
   <input type="text" name="password">
   <br>
   <input type="submit" name="login" >
</form>

<?php
include_once('footer.php');
?>