<?php
//include constants.php file here
include('../config/constants.php');
//1..get the id of admin to be deleted
$id = $_GET['id'];
//2.create sql query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

$res = mysqli_query($conn, $sql);
//check whether the query executed or not
if($res==true){
    //query executed successfully
    echo "admin deleted";
}
else{
    //fail to delete admin
    echo "failed to delete admin";
}
//3.redirect to manage admin page with message (success/error)

?>