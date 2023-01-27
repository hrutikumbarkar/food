<?php include('partials/menu.php');  ?>

<div class="main-content"> 

        <div class="wrapper">
        <h1>Update Admin </h1>

     <br><br>
          <?php

  //1.get the id of tghe selected admin 
          $id=$_GET['id'];

  //2.create a sql id to get the sql detailse
          $sql="SELECT * FROM tbl_admin WHERE id=%id";

  //3.execute the query 
          $res=mysqli_query($conn  ,$sql);
  //check whether the query is executed or not 
          if($res==true)
  {
  //check whether the daqta is available or not
          $count =mysqli_num_rows($res);   

  //check whether we have admin data or not   
          if($count==1) 
          {
            //get the detailse 
            echo "admin Available";
          } 
          else
          {
            //redirect to manage Admin Page 
            header('location'.SITEURL.'admin/manage-admin.php');
          }     
  }

  ?>

  <form action="" method="POST"> 
    <table class="tbl-30">
      <tr>

        <td>Full Name:</td>
        <td>

          <input type="text" name="fullname" value="<?php echo $full_name;?> ">
</td>

</tr>

<tr>
  <td>Username: </td>
         <td>
   <input type="text" name="username" value="<?php echo $username; ?>">
          </td>
           </tr>
           <tr>
            <td colspan="2">
              <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" value="Update Admin" class="btn-secondary">
           </td>
            </tr>

          </table>
                   </form>
                        </div>
                 </div>
            <?php 
    //checked whether the submit button is clickd or not 
    if(isset($_POST['submit ']))
    {
      //echo"Button Clicked "
      //get the all values from form update 
      
      echo $id = $_POST['id'];
      echo $full_name = $_POST['full_name'];
      echo $username =$_POST['username'];
      //create a sql query to update the admin
      $sql ="UPDATE tbl_admin  SET 
      full_name= '$full_name'
      username='$username'
      WHERE id='$id'
      "; 
      //execute the query
      $res =mysqli_query($conn,$sql);

      //check whether the query executed successfully or not 
      if($res==true)
      {
        //query executed and Admin updated 
        $_SESSION['update'] = "<div class='error'>Failed to delete Admin</div>";
        //redirect to manage admin page 
        header('location'.SITEURL.'admin/manage-admin.php');
      }
      else
       {
        //failed to update admin 
        $_SESSION['update'] ="<div class='error'>Failed to delete Admin.</div>";
        //redirect to manage Admin                   npage 
        header('location:'.SITEURL.'admin/manage-admin.php'); 

        
      }

    }
    
                             ?>
              

<?php include('partials/menu.php');?>