<?php
require 'config/config.php';
$id=$_GET['id'];
$query = "DELETE FROM newcontact where id= '$id' ";
$data=mysqli_query($conn,$query);
if($data){
    echo "<script>alert('Record Deleted Successfully')</script>"; ?>
    
    <META HTTP-EQUIV = "Refresh" CONTENT = "0; URL = 'homepage.php'">

    <?php
}
else{
    echo "Failed to delete record from database";
}
?>