<?php
include('config.php');
include('database.php');
include('functions.php');
secure();


include('header.php');


if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM projects
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
  
  set_message( 'User has been deleted' );
  
  die();
  
}
?>

<h1>USERS</h1>

<?php
$query='SELECT * FROM projects ORDER BY title,content';
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
     	<td><?php echo $record['title'];?></td>
     	<td><?php echo $record['content'];?></td>
     	<td><?php echo $record['url'];?></td>
     	<td><?php echo $record['type'];?></td>
     	<td>
            <?php if( $_SESSION['id'] != $record['id'] ): ?>
            <a href="projects.php?delete=<?php echo $record['id'];?>">Delete</a>
            <?php endif; ?>
     	</td>
     </tr>
<?php endwhile; ?>
</table>

<a href="projects.add.php">ADD USER</a>