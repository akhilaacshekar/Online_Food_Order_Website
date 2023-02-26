<?php
 include('../config/constants.php');
// echo "Delete page";
if(isset($_GET['category_id']) AND isset($_GET['image_name']))
{
    $category_id = $_GET['category_id'];
    $image_name = $_GET['image_name'];
    // echo "get value and delete";
    if($image_name != "")
        {
            //Image is Available. So remove it
            $path = "../images/category/".$image_name;
            //REmove the Image
            $remove = unlink($path);
            if($remove==false)
            {
                //Set the SEssion Message
                $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image.</div>";
                //REdirect to Manage Category page
                header('location:'.SITEURL.'admin/manage-category.php');
                //Stop the Process
                die();
            }
        }
         $sql = "DELETE FROM tbl_category WHERE category_id=$category_id";
         $res = mysqli_query($conn, $sql);
         if($res==true)
        {
            //SEt Success MEssage and REdirect
            $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>";
            //Redirect to Manage Category
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            //SEt Fail MEssage and Redirecs
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Category.</div>";
            //Redirect to Manage Category
            header('location:'.SITEURL.'admin/manage-category.php');
        }
}
else{
    header('location:'.SITEURL.'admin/manage-category.php');
}
?>