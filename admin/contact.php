<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Contact us</h1>
        <br/><br />
           <div style="text-align:center;color:#00cec9"; id="address"><b>ADDRESS</b> : Paakashala</div>
           <div style="text-align:center;color:#00cec9";id="address"><b>MOBILE NUMBER</b> : 1234567890</div>
           <div style="text-align:center;color:#00cec9" id="address"><b>MAIL-ID</b> : abcd@gmail.com</div>
           <br><br>
           <?php
        if(isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
        {
            echo $_SESSION['add']; //Display the SEssion Message if SEt
            unset($_SESSION['add']); //Remove Session Message
        }
        ?>
           <h1 style = "color:#1e90ff";>Fill the form if you have any query</h1><br>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="name" placeholder="Enter Your Name"></td>
                </tr>
                <tr>
                <td>Mobile Number</td>
                <td><input type="text" name="mnum" placeholder="Enter Mobile Number"></td>
                </tr>
                <tr>
                    <td>Mail-id</td>
                    <td><input type="text" name="email" placeholder="        @gmail.com"></td>
                </tr>
                <tr>
                    <td>Message</td>
                    <td><textarea name="message" rows="4"></textarea></td>
                </tr>
                <tr>
                <td colspan="2">
                  <input type="Submit" name="Submit" value="Submit" class="btn-secondary">
                </td>
                </tr>

            </table>
        </form>
    </div>
</div>
<?php include('partials/footer.php')?>
<?php
    //process the value from form and save it in database
    //check whether the button is clicked or not
    if(isset($_POST['Submit']))
    {
        //Button clicked 

        // echo "Button Clicked";
        $name=$_POST['name'];
        $mnum=$_POST['mnum'];
        $email=$_POST['email'];
        $message=$_POST['message'];

        $sql = "INSERT INTO tbl_contact SET
          name = '$name',
          mnum = '$mnum',
          email = '$email',
          message = '$message'
        ";
        // echo $sql; die();
        
     $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
     if($res==TRUE)
     {
    
      $_SESSION['add'] = "<div class='success'> Info Added Successfully.";
       //Redirect Page to Manage Admin
       header("location:".SITEURL.'admin/contact.php');
     }
      else{
      $_SESSION['add'] ="<div class='error'> Failed to add info.";
       //Redirect Page to Add Admin
        header("location:".SITEURL.'admin/contact.php');
     }
        
    }
?>