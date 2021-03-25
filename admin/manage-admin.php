<?php include('partials/menu.php') ; ?>


<div class="main-content">
<div class="wrapper">
    <h1>Manage Admin</h1>
    <br/><br/> 
     
    <?php
    
    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add']; //displaying session msg
        unset($_SESSION['add']); //removing session msg
    }

    if(isset($_SESSION['delete']))
    {
        echo $_SESSION['delete']; //displaying session msg
        unset($_SESSION['delete']); //removing session msg
    }

    if(isset($_SESSION['update']))
    {
        echo $_SESSION['update']; //displaying session msg
        unset($_SESSION['update']); //removing session msg
    }

    if(isset($_SESSION['user-not-found']))
    {
        echo $_SESSION['user-not-found']; //displaying session msg
        unset($_SESSION['user-not-found']); //removing session msg
    }

   if(isset($_SESSION['pwd-not-found']))
   {
       echo $_SESSION['pwd-not-found'];
       unset($_SESSION['pwd-not-found']);
   }


    if(isset($_SESSION['change-pwd']))
    {
        echo $_SESSION['change-pwd'];
        unset($_SESSION['change-pwd']);
    }

    
    
    ?>
    <br/> <br/> <br/>

    <!-- Button to Add Admin-->
    
    <a href="add-admin.php" class="btn-primary">Add Admin</a>
    <br/> <br/> <br/>

    <table class="tbl-full">
    <tr>
    <th>S.N</th>
    <th>Full Name</th>
    <th>Username</th>
    <th>Actions</th>
</tr>





    <?php
    //query to get all admin
    $sql = "SELECT * FROM tbl_admin";
    //execute the query
    $res = mysqli_query($conn,$sql);

    //check whether the query is execute or not
    if($res==TRUE)
    {
       $count = mysqli_num_rows($res); //function to get all rows in db

       $sn=1;

       //check the num of rows
       if($count>0)
       {
           while($rows=mysqli_fetch_assoc($res))
           {
               //using while loop to get all data from db
               $id=$rows['id'];
               $full_name=$rows['full_name'];
               $username=$rows['username'];

               //display the value in table
               ?>
             <tr>
               <td><?php echo $sn++; ?></td>
               <td><?php echo $full_name; ?></td>
               <td><?php echo $username; ?></td>
                <td>
                    <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Change Password</a>
                    <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Update Admin</a>
                    <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a>
                </td>
                </tr>

     

               <?php
           }
       }
      
    }
    
    ?>

   

    
    </table>
    
   


 </div>
     </div>
    <!--Main contant section ends-->

 <?php include('partials/footer.php'); ?>