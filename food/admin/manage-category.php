<?php include('partials/menu.php'); ?>
<div class="main-content">
        <div class="wrapper">
            <h1>Manage Category</h1>
            <br><br>
            <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset ($_SESSION['add']);
        }
        ?><br><br>
    <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary" >Add Category</a>
            <br><br><br><br>

    <table class="tbl-full ">
                <tr>
                    <th>Sr.No</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
                <?php
                        //Query to Get all Category from Database
                        $sql = "SELECT * FROM tbl_category";

                        //Execute Query
                        $res = mysqli_query($conn, $sql);

                        //Count Rows
                        $count = mysqli_num_rows($res);

                        //Create serial number Variable and assign value as 1
                        $sn=1;

                        //Check whether we have data in database
                        if($count>0)
                        {
                            //we have data in database
                            //get the data and display
                            while($row = mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $iamge_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];

                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>

                                        <td>
                                            <?php 
                                                    //Check whether image name is available or not
                                                    if($iamge_name!=="")
                                                    {
                                                        //Display the Image
                                                        ?>
                                                        <img src="<?php echo SITEURL; ?> images/category/<?php echo $image_name;?>" >

                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        //Diaplay the Message
                                                        echo "<div class='error'>Image Not Added</div>";
                                                    }
                                            
                                            ?>
                                        </td>

                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                            <a href="#" class="btn-secondary"> Update Category</a>
                                            <a href="#" class="btn-danger"> Delete Category</a>
                                            
                                        </td>
                                    </tr>


                                <?php
                            }
                        }
                        else
                        {
                            //we do not have data 
                            //we will display the message inside table
                            ?>

                                <tr>
                                    <td colspan="6"><div class="error">No Category Added.</div></td>
                                </tr>

                            <?php


                        }

                ?>
                <tr>
                    <td>1.</td>
                    <td>Hrutik Umbarkar</td>
                    <td>hrtuik1234</td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="#" class="btn-secondary"> Update Category</a>
                        <a href="#" class="btn-danger"> Delete Category</a>
                        
                    </td>
                </tr>
                
            </table>
   

</div>
<?php include('partials/footer.php');?>
