<?php

include( 'database.php' );
include( 'config.php' );
include( 'functions.php' );

secure();


  
    $query = 'INSERT INTO projects (
        title,
        content,
        url,
        type,
        date
      ) VALUES (
         "'.$_POST['title'] .'",
         "'.$_POST['content'] .'",
         "'.$_POST['url'] .'",
           "'.$_POST['type'] .'",
         "'.$_POST['date'] .'"
      )';

    mysqli_query( $connect, $query );
    
    set_message( 'Article has been added' );
  
  
include( 'header.php' );
?>

<h2>Add Article</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title">
    
  <br>
  
  <label for="content">Content:</label>
  <input type="text" name="content" id="content">
      
  <br>
  
  <label for="url">URL:</label>
  <input type="text" name="url" id="url">
  
  <br>
  
  <label for="type">Type:</label>
  <?php
  
  $values = array("Graphic Design");
  
  echo '<select name="type" id="type">';
  foreach( $values as $key => $value )
  {
    echo '<option value="'.$value.'"';
    echo '>'.$value.'</option>';
  }
  echo '</select>';
  
  ?>
  
  
  <br>


  <label for="date">Date:</label>
  <input type="date" name="date" id="date">
  
  <br>
  
  
  
  <input type="submit" value="Add Article">
  
</form>

<p><a href="projects.php"><i class="fas fa-arrow-circle-left"></i> Return to Article List</a></p>


<?php

include( 'footer.php' );

?>