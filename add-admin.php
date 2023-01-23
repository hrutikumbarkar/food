<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>

        <?php
                if(isset($_SESSION['add'])) //Checking whether the session is set or not 
                {
                    echo $_SESSION['add'];// Displaying Session Message if SET
                    unset($_SESSION['add']); //Removing Session Message
                }
            
            ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="username"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="password"></td>
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
    // Process the value from Form and save it in database
    // check whether the submit button is clicked or not 
    if(isset($_POST['submit'])) 
    {

        // Button Clicked
        // echo "Button Clicked"

        //1. Get the data from Form
         $full_name = $_POST['full_name'];
         $username = $_POST['username'];
         $password = md5($_POST['password']); // Password Encryption With MD5

        // 2. SQL Query to save the data into database

        $sql = "INSERT INTO tbl_admin SET
             full_name='$full_name',
             username='$username',
             password='$password'";

        // 3. Execute Query ansd save data in database

        $res = mysqli_query($conn, $sql) or die(mysqli_error($con));

        //4. Check whether the (Query is executed) data is inserted or not display appropriate message
             
        if($res==TRUE)
        {
            // Data Inserted
            //echo "Data Inserted";
            // Create a Session variable to Display Message
             $_SESSION['add'] = "Admin Added Succesfully";
            // // Redirect page
             header("location:" .SITEURL.'admin/manage-admin.php');
        }

        else{    // Failed to insert data
             echo "Faile to Insert Data ";
             // Create a Session variable to Display Message
             $_SESSION['add'] = "Failed To Add Admin ";
            //  // Redirect Add Admin page
              header("location:" .SITEURL.'admin/manage-admin.php');
        }
    }
?>