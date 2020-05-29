<?php

if(isset($_GET['submit'])){
    $name = $_GET['name'];
    $dob = $_GET['dob'];
    $mobileno = $_GET['mobileno'];
    $email = $_GET['email'];
    
    $query = "UPDATE newcontact SET name ='$name', dob ='$dob' , mobileno = '$mobileno' , email = '$email' where name ='$name' "; 

    $data = mysqli_query($conn,$query);

    if($data){

        echo "<script>alert('Record Updated')</script>"; ?>

        <META HTTP-EQUIV = "Refresh" CONTENT = "0; URL = 'homepage.php'">
        <?php
    }
    else{
        echo "failed to update record";
    }
}
?>