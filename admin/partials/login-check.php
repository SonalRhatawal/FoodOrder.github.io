<?php

//Authorization - Access Control
if(!isset($_SESSION['user'])) //if user session is not set
{
   //user is not login
   $_SESSION['no-login-message'] = "<div class='error'>Please login to Access Admin Panel</div>";
   header('location:'.SITEURL.'admin/login.php');
}

?>