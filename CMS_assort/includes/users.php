<?php
include('config.php');
include('database.php');
include('functions.php');
secure();


include('header.php');


if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM users
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
  
  set_message( 'User has been deleted' );
  
  die();
  
}
?>

<h1>USERS</h1>

<?php
$query='SELECT * FROM users ORDER BY last,first';
$result=mysqli_query($connect,$query);
?>

<table border="1">
   <tr>
     <td>first name</td>
     <td>last name</td>
     <td>email address</td>
     <td>status</td>
   </tr>

<?php while($record=mysqli_fetch_assoc($result)):?>
     <tr>  
     	<td><?php echo $record['first'];?></td>
     	<td><?php echo $record['last'];?></td>
     	<td><?php echo $record['email'];?></td>
     	<td><?php echo $record['active'];?></td>
     	<td>
            <?php if( $_SESSION['id'] != $record['id'] ): ?>
            <a href="users.php?delete=<?php echo $record['id'];?>">Delete</a>
            <?php endif; ?>
     	</td>
     </tr>
<?php endwhile; ?>
</table>

<a href="user.add.php">ADD USER</a>