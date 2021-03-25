<?php

include('../config/constants.php');

 if(isset($_GET['id']) && isset($_GET['image_name']))
 {
     //echo "Process to delete";
     $id = $_GET['id'];
     $image_name = $_GET['image_name'];

     //check whether the img is available or not
     if($image_name!=="")
     {
         $path = "../images/food/".$image_name;

         //remove img file from folder
         $remove = unlink($path);

         //check whether the img is removed or not
         if($remove==false)
         {
             //failed to remove img
             $_SESSION['upload'] = "<div class='error'>Failed To Remove Image...</div>";
             header('location:'.SITEURL.'admin/manage-food.php');
             die();
         }
     }

     $sql = "DELETE FROM tbl_food WHERE id=$id";
 
     //execute the query
     $res=mysqli_query($conn,$sql);

     if($res==true)
     {
         $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully</div>";
         header('location:'.SITEURL.'admin/manage-food.php');
     }
     else
     {
        $_SESSION['delete'] = "<div class='error'>Failed To Delete Food Deleted</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
     }

 }
 else
 {
    //echo "redirect";
    $_SESSION['Unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
    header('location:'.SITEURL.'admin/manage-food.php');

 }

?>