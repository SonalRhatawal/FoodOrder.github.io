<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br/> <br/>

        <?php
         
         if(isset($_SESSION['add']))
         {
             echo $_SESSION['add']; //displaying session msg
             unset($_SESSION['add']); //removing session msg
         } 
         
        
        ?>

        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" placeholder="Your Username"></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" placeholder="Enter Your Password">
                    </td>
                </tr>
                

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php include('partials/footer.php'); ?>

<?php

//Process the value from form and save it in database
//check whether the button is click or not 

if(isset($_POST['submit']))
{
    // Button click 
    //echo "Button Clicked";

    //Get data from from
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);  //password Encryption with md5

    //sql query to save data into database
     $sql = "INSERT INTO tbl_admin SET
        full_name='$full_name',
        username='$username',
        password='$password'
     
     ";

     
//Executing query and save data into DB
      $res = mysqli_query($conn, $sql) or die(mysqli_error());

      //check whether the data is inserted or not and display appropiate msg
      if($res==TRUE)
      {
          //data inserted
          //echo "Data Inserted";
          //create a session variable to display message
          $_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
          //Redirect Page
          header("location:".SITEURL.'admin/manage-admin.php');
      }
      else
      {
          //failed
         // echo "Failed to inserted data";

          //create a session variable to display message
          $_SESSION['add'] = "<div class='error'>Failed to Add Admin</div>";
          //Redirect Page
          header("location:".SITEURL.'admin/add-admin.php');
      }

}





?>