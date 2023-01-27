<?php include('partials/menu.php'); ?>
<link rel="stylesheet" href="css/admin.css">

    <!--main content section part-->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1> 
            <br><br>
            
            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];// Displaying Session Message
                    unset($_SESSION['add']); //Removing Session Message
                }
                if(isset($_SESSION['delete'] ) )
                {
                  echo $_SESSION['delete'];
                  unset($_SESSION['delete']);
}
               if(isset($_SESSION['update']));
{
                  echo $_SESSION['update'];
                   unset($_SESSION['update']);
}
         
                  if(isset($_SESSION['user not found']))
                  {
                    echo $_SESSION['user not found'];
                    unset($_SESSION['user not found']);
                  }
                  if(isset($_SESSION['pwd not match ']))
                {
                    echo $_SESSION['pwd not match'];
                    unset($_SESSION['pwd not match']);
                }
                if(isset($_SESSION['change-pwd']))
                {
                    echo $_SESSION['change-pwd'];
                    unset ($_SESSION['change-pwd']); 
                }
            ?>
            <br><br><br>

            <!-- Button To Add Admin -->
            <a href="add-admin.php" class="btn-primary" >Add Admin</a>
            <br><br><br><br>

            <table class="tbl-full ">
                <tr>
                    <th>Sr.No</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
                <?php
                    // Query to Get All Admin
                    $sql = "SELECT * FROM tbl_admin";
                        // Execute the Query
                    $res = mysqli_query($conn, $sql);

                    // check whether the Query is Excuted of not
                    if($res==TRUE)
                    {
                            // Vount Rows to Chech Whether We have data in database or not
                            $count = mysqli_num_rows($res);//Function to get all the  rows in database

                            //  $sn=1; // Create a variale nad Assign the value

                            // Checj the data in rows
                            if($count>0)
                            {
                                // We have data in database
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    // Using while loop to get all the data from database
                                    // And while lop will run as long as we have data in databse


                                    // Get Indivisual Data
                                    $sn=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];

                                    // Display the value in our Table
                                    ?>
                                    <tr>
                    <td><?php echo $sn++;?></td>
                    <td><?php echo $full_name;?></td>
                    <td><?php echo $username;?></td>
                    <td>
                        <a href=""class="btn-primary">change password </a>
                    <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Delete Admin</a>
                    <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                    </td>
                </tr>
                                    <?php
                                    
                                    
                                }
                            }
                            else{
                                // we do not have data in database
                            }
                    }
                    
                    ?>
               
                    

                
            </table>

            
        </div>
    </div>
    <!--main content section ends-->

   <?php include('partials/footer.php'); ?>