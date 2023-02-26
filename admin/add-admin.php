 <?php include('partials/menu.php');?>



<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br/><br />
        <?php
        if(isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
        {
            echo $_SESSION['add']; //Display the SEssion Message if SEt
            unset($_SESSION['add']); //Remove Session Message
        }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>

                    
                </tr>
                <tr>
                    <td>User Name:</td>
                    <td>
                        <input type="text" name="username" placeholder="Your username">
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" placeholder="Enter Your Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="Submit" name="Submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        
    </div>
</div>

<?php include('partials/footer.php');?>

<?php
    //process the value from form and save it in database
    //check whether the button is clicked or not
    if(isset($_POST['Submit']))
    {
        //Button clicked 

        // echo "Button Clicked";

        //1.get data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);//password encryption with md5
        // //2.SQL query to save the data into database
        $sql = "INSERT INTO tbl_admin SET
          full_name = '$full_name',
          username = '$username',
          password = '$password'
        ";
        
   $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
   if($res==TRUE)
   {
    
    $_SESSION['add'] = "<div class='success'> Admin Added Successfully.";
    //Redirect Page to Manage Admin
    header("location:".SITEURL.'admin/manage-admin.php');
   }
   else{
    $_SESSION['add'] ="<div class='error'> Failed to add admin.";
    //Redirect Page to Add Admin
    header("location:".SITEURL.'admin/add-admin.php');
   }



}


?>  
