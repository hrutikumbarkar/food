<?phpinclude('patials/menu.php');
?>
<div class="main-content">
    <div class="wrapper">
        <h1>change Password</h1>
        <br><br>

        <?php 
           if(isset($_GET['id']))

          {

            $id=$_GET['id'];
          }
        ?>
        <form class="tbl-30">
            <tr>
                <td>Current Password: </td>
                <td> <inout type="password" name="current password" placeholder="current password">

                </td>

            </tr>

            <tr>New Password:</td>
            <td> <inout type="password" name="new_password" placeholder="new_password">

        </td>
           </tr>

           <tr>
            <td> Confirm Password:</td>
            <td> <inout type="password" name="confirm_password" placeholder="confirm_password">

</td> 
           </tr>
           <tr>
            <td colspan="2">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="submit" name="submit" value="change Password" class="btn-secondary">

            </td>
           </tr>
</table>

    </div>
</div>
<?php 
    //check whether the submit button is clicked or not 
    if(isset($_POST['submit']))
    
    {
        //echo "clicked";
        //1.get the data from the form 
        $id=$_POST['id'];
        $current_password = md5($_POST['$current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);


        //2.check whether the  user with current id or password or not 
        $sql ="SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

        //execute the query 
        $res = mysqli_query($conn,$sql);
        
        if($res=true)
        {

            //check whether data is available or not 
            $conut=mysqli_num_rows($res);

            if($conut==1)
            {
                
                //user exists but password can be changed 
                //echo "user Found";  
                //check whether the new password or confirmed password match or not 
                if($new_password==$confirm_password)
                {
                    //update the password 
                    //echo "password match "

                    $sql2 ="UPDATE tbl_admin SET 
                    password='new_password'
                    WHERE id=$id
                    ";
                    //execute the query 
                    $res2 = mysqli_query($conn, $sql2);
                    //check whether query executed or not 
                    if($res==true)
                    {
                        //dispaly success message 
                        //redirect to manage asmin page with success message
                    $_SESSION['changed pwd'] ="<div class='success'>password changed successfully .</div>";  
                    //redirect the user 
                    header('locatin:'.SITEURL.'admin/manage admin.php');
                    }
                    else{

                        //display error message
                        //redirect to manage asmin page with error message
                    $_SESSION['changed pwd'] ="<div class='error'>failed to change password.</div>";  
                    //redirect the user 
                    header('locatin:'.SITEURL.'admin/manage admin.php');
                    }
                    //wriitten by Pawank

                }
                else { 
                    //redirect to manage asmin page with error message
                    $_SESSION['pwd not match '] ="<div class='error'>password did not match .</div>";  
                //redirect the user 
                header('locatin:'.SITEURL.'admin/manage admin.php');
            } 
                }
            }
            else{
                //user does not exist det message and redirect 
                $_SESSION['user not found'] ="<div class='error'>user not Found.</div>";  
                //redirect the user 
                header('locatin:'.SITEURL.'admin/manage admin.php');
            }

        }

        //3.check whether the current password or new password match or not 
         
        //4.change password if all above is true 
    }
?>

<?php include('partials/footer.php');?>