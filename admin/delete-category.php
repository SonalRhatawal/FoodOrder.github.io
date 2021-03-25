<?php

include('../config/constants.php');

//check whether the id and imd name set or not

if(isset($_GET['id']) AND isset($_GET['image_name']))
{
   $id= $_GET['id'];
   $image_name = $_GET['image_name'];

   if($image_name !="")
   {
       $path = "../images/category/".$image_name;

       //remove the img
       $remove = unlink($path);

       //if fail to remove image then add an error message
       if($remove==false)
       {
          $_SESSION['remove']= "<div class='error'>Failed To Remove Category Image<div>";
          header('location:'.SITEURL.'admin/manage-category.php');

          //stop the proccess
          die();
       }
   }

   $sql = "DELETE FROM tbl_category WHERE id=$id";

   $res = mysqli_query($conn,$sql);

   if($res==true)
   {
      $_SESSION['delete'] = "<div class='success'>Category Delete Successfully</div>";
      header('location:'.SITEURL.'admin/manage-category.php');
   }
   else
   {
      $_SESSION['delete'] = "<div class='error'>Failed to Delete Category</div>";
      header('location:'.SITEURL.'admin/manage-category.php');
   }

}
else
{
   header('location:'.SITEURL.'admin/manage-category.php');
}

?>