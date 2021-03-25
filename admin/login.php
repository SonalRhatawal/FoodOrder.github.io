<?php include('../config/constants.php'); ?>


<html>
<head>
<title>Login - Food Order System</title>
<link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    
    <div class="login">
    <h1 class="text-center">Login</h1>
    <br> <br>

    <?php
    if(isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }

    if(isset($_SESSION['no-login-message']))
    {
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
    }
   
    
    ?>
    <br> <br>
    <!-- login form-->
    <form action="" method="POST" class="text-center">
    Username : 
    <input type="text" name="username" placeholder="Enter Username"><br> <br>

    Password : 
    <input type="password" name="password" placeholder="Enter Your Password"><br> <br>

    <input type="submit" name="submit" value="Login" class="btn-primary">
    <br> <br>
    </form>
     
    <p class="text-center">Created By - <a href="www.sonalrhatawal.com">Sonal Rhatawal</a></p>
    
    </div>

</body>
</html>


<?php

if(isset($_POST['submit']))
{
     $username=$_POST['username'];
     $password=md5($_POST['password']);

     $sql= "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

     $res= mysqli_query($conn,$sql);

     $count = mysqli_num_rows($res);

     if($count==1)
     {
       $_SESSION['login']="<div class='success'>Login Successfull.</div";
       $_SESSION['user'] = $username; //to check whether the user is login or not and logout will unset it
       header('location:'.SITEURL.'admin/');

     }
     else
     {
       $_SESSION['login'] = "<div class='error text-center'>Login Failed</div>";
       header('location:'.SITEURL.'admin/login.php');
     }
}



?>