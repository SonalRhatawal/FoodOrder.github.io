<?php include('partials-front/menu.php'); ?>

<section class="food-search">
    <div class="container">
       <h2 class="text-center text-white">Contact</h2>
              
        <form action="" method="POST" class="order">  
             
                <fieldset>
                    
                    <div class="order-label">Username</div>
                    <input type="text" name="username" placeholder="E.g. Sonal Rhatawal" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="mobile" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@sonalR.com" class="input-responsive" required>

                    <div class="order-label">Comment</div>
                    <textarea name="comment" rows="10" placeholder="E.g. Food Taste is Good" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                </fieldset>

         
            
        </form>

        <?php

        if(isset($_POST['submit']))
        {
            $username = $_POST['username'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $comment = $_POST['comment'];

            $sql = "INSERT INTO contact SET
                username = '$username',
                mobile = '$mobile',
                email = '$email',
                comment = '$comment'
            ";

            $res = mysqli_query($conn, $sql);
        }

        ?>
    </div>
</section>    

<?php include('partials-front/footer.php'); ?>
