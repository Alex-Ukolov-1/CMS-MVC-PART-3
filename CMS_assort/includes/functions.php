<?php
   function secure()
   {
   	if(isset($_SESSION['id']))
   	{
   		set_message("you must first to log to view this page!");
          die();
   	}
   }

   function set_message($message)
   {
      $_SESSION['message']=$message;
   }

   function get_message()
   {
      if(isset($_SESSION['message']))
      {
        echo '<p>'.$_SESSION['message'].'</p>'."<br>";
        unset($_SESSION['message']);

      }
   }

?>