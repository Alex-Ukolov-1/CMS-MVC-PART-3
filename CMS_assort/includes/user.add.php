<?php
include('config.php');
include('database.php');
include('functions.php');
secure();


    $query = 'INSERT INTO users (
        first,
        last,
        email,
        password,
        active
      ) VALUES (
        "'.mysqli_real_escape_string( $connect, $_POST['first'] ).'",
        "'.mysqli_real_escape_string( $connect, $_POST['last'] ).'",
        "'.mysqli_real_escape_string( $connect, $_POST['email'] ).'",
        "'.md5( $_POST['password'] ).'",
        "'.$_POST['active'].'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'User has been added' );

 


include('header.php');
?>

<h1>add user</h1>


<form method="post">
	First:
  <input type="text" name="first">

<br>
	Last:
  <input type="text" name="last">
<br>

	EmailAddress:
<input type="text" name="email">
<br>

   Password:
  <input type="text" name="password">
  <br>


  Active:
  <select name="active" id="active">
  <?php
    $values=array("yes","no");
foreach( $values as $key => $value )
  {
    echo '<option value="'.$value.'"';
    echo '>'.$value.'</option>';
  }
 
  ?>
  </select>

  <br>

  <input type="submit" name="add user">

</form>
