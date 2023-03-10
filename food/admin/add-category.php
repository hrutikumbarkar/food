<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1><br><br>

        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset ($_SESSION['add']);
        }
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset ($_SESSION['upload']);
        }
        ?><br><br>
        <!-- Add Category Form startd -->
        <form action="" method="POST" enctype="multipart/form-data">
    <table class="tbl_30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="category title">
                    </td>
                </tr>
                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image" >
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="feartured" value="Yes" >Yes
                        <input type="radio" name="feartured" value="No" >No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes" >Yes 
                        <input type="radio" name="active" value="No" >No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name=" submit"value="Add Category " class="btn-secondary">
                    </td>
                </tr>

    </table>
        </form>

        <?php
            //Check whether the submit Butto is Clicked or not
            if(isset($_POST['submit']))
            {
                // echo"clicked";

                //1. Get the from Category form
                $title = $_POST['title'];

                //For Radio Input, We need to Check Whether the Button is Selected or Not 
                if(isset($_POST['featured']))
                {
                    //1.Get the value from form
                    $featured = $_POST['featured'];
                }
                else{
                    //Set the default value
                    $featured = "No";
                }
                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else{
                    $active = "No";
                }

                //Check whether the image is selected or not and set the value for image name accordingly
                // print_r($_FILES['image']);

                // die(); //Break the Code Here

                if(isset($_FILES['image']['name']))
                {
                    //Upload the image
                    //To Upload Image we need image name , source path and destination path
                    $image_name = $_FILES['image']['name'];

                    //Auto Rename our Image
                    //Get the Extension of our Image(jpg, png, gif, etc) e.g."food1.jpg"
                    $ext =end( explore('.', $image_name));

                    //Rename the Image
                    $image_name = "Food_category_".rand(000, 999).'.'.$ext; //e.g. Food_Category_834.jpg

                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "../images/category/".$image_name;

                    //Finally Upload the Image
                    $upload = move_uploaded_file( $source_path, $destination_path );

                    //Check whether the image is uploaded or not
                    //And if the image is not uploaded then we will stop the process and redirect with error message
                    if($upload==false)
                    {
                        //Set message
                        $_SESSION['upload'] = "<div class='error'>Failed to upload image</div>";
                        //Redirect to Add category page
                        header('location:'.SITEURL.'admin/add-category.php');
                        //Stop the Process 
                        die();

                    }
                }
                else
                {
                    //Dont Upload image and Set the image_name value as blank
                    $image_name="";
                }

                //2.Create SQL Query to InsertCategory into Database
                $sql = "INSERT INTO tbl_category SET 
                title='$title',
                image_name='$image_name',
                featured='$featured',
                active='$active'";

                //3. Execute the Query and Save in Database
                $res = mysqli_query($conn, $sql);

                //4.Check whether the Query Executed ornot and data added or not
                if($res==true)
                {
                    //Query  Executed and Ctegory Added
                    $_SESSION['add'] = "<div class='success'>Ctegory Added Succesfully.</div>";
                    //Redirect to Manage Category Page
                    header('location:' . SITEURL. 'admin/manage-category.php');
                }
                else{
                    //Failed to Added Category
                    $_SESSION['add'] = "<div class='error'>Failed to Added Category.</div>";
                    //Redirect to Manage Category Page
                    header('location:' . SITEURL. 'admin/add-category.php');

                }
            }
        ?>
        <!-- Add Category Form Ends -->
    </div>
</div>


<?php include('partials/footer.php'); ?>

