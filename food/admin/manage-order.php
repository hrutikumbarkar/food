<?php include('partials/menu.php'); ?>
<div class="main-content">
        <div class="wrapper">
            <h1>Manage Order</h1>
            <br/><br>
            <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; //displaying session message
                unset($_SESSION['add']);//removing session message
            }
            ?>
            <br><br><br>

    <table class="tbl-full ">
                <tr>
                    <th>Sr.No</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>Hrutik Umbarkar</td>
                    <td>hrtuik1234</td>
                    <td>
                        <a href="#" class="btn-secondary"> Update Admin</a>
                        <a href="#" class="btn-danger"> Delete Admin</a>
                        
                    </td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Dhanraj Manwar</td>
                    <td>dhanraj123</td>
                    <td>
                    <a href="#" class="btn-secondary"> Update Admin</a>
                        <a href="#" class="btn-danger"> Delete Admin</a>
                    </td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Pavan Khalse</td>
                    <td>pavan1234</td>
                    <td>
                    <a href="#" class="btn-secondary"> Update Admin</a>
                        <a href="#" class="btn-danger"> Delete Admin</a>
                    </td>
                </tr>
            </table>
   

</div>
<?php include('partials/footer.php');?>
