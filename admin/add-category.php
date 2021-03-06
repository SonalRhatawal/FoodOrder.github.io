<?php include('partials/menu.php');  ?>

<div class="main-content">
<div class="wrapper">
<h1>Add Category</h1>
<br> <br>

<?php
    
    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }

    if(isset($_SESSION['upload']))
    {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }
    
    ?>

    <br> <br>

<form action="" method="POST" enctype="multipart/form-data">
   
   <table class="tbl-30">
     <tr>
       <td>Title : </td>
       <td>
         <input type="text" name="title" placeholder="Category Title">
       </td>
     </tr>

     <tr>
     <td>Select Image: </td>
     <td>
        <input type="file" name="image">
     </td>
     </tr>

     <tr>
       <td>Featured: </td>
        <td>
         <input type="radio" name="featured" value="Yes">Yes
         <input type="radio" name="featured" value="No">No
        </td>
     </tr>

    <tr>
     <td>Active: </td>
     <td>
       <input type="radio" name="active" value="Yes">Yes
       <input type="radio" name="active" value="No">No
     </td>
    </tr> <br>
    

    <tr>
    <td colspam="2">
       <input type="submit" name="submit" value="Add Category" class="btn-secondary">
    </td>
    
    </tr>
   
   </table>

</form>



<?php


   if(isset($_POST['submit']))
   {
       $title=$_POST['title'];
       
       if(isset($_POST['featured']))
       {
        $featured = $_POST['featured'];
       }
       else
       {
         $featured = "No";
       }

       if(isset($_POST['active']))
       {
           $active= $_POST['active'];
       }
       else
       {
           $active = "No";
       }

        //chech whether the image is selected or not
        //print_r($_FILES['image']);

        //die(); //break the code

        if(isset($_FILES['image']['name']))
        {
            //upload the image
            //to upload image we need image name,source path,and destination
            $image_name = $_FILES['image']['name'];

            //upload img if img is selected
            if($image_name != "")
            {

            

               //auto rename
               //get the extention of our image (.jpg, .png, .gif, etc) e.g. "special.food1.jpg"
               $ext = end(explode('.', $image_name));

               //rename the img
               $image_name = "Food_Category_".rand(000, 999).'.'.$ext;

               $source_path = $_FILES['image']['tmp_name'];

               $destination_path = "../images/category/".$image_name;

               //upload a image
               $upload = move_uploaded_file($source_path, $destination_path);

               //check whether the image uploaded or not
               //and if the img is not uploaded then we will stop the proccess and redirect with error message
               if($upload==false)
               {
                  $_SESSION['upload'] = "<div class='error'</div>Failed to upload the Image</div>";
                  header('location:'.SITEURL.'admin/add-category.php');

                  die();
                }

            }  

        }
        else
        {
            $image_name="";
        }

       $sql="INSERT INTO tbl_category SET
        title = '$title',
        image_name = '$image_name',
        featured = '$featured',
        active = '$active'
       ";

       $res=mysqli_query($conn,$sql);

      // query for data added or not
       if($res==true)
       {
           //query execute and category added
          $_SESSION['add'] = "<div class='success'>Category Added Successfully</div>";
          header('location:'.SITEURL.'admin/manage-category.php');
       }
       else
       {
          $_SESSION['add'] = "<div class='error'>Failed To Add Category Added</div>";
          header('location:'.SITEURL.'admin/manage-category.php');
       }
   }



?>



</div>
</div>

<?php include('partials/footer.php'); ?>