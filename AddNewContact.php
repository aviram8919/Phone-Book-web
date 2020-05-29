<?php
require 'config/config.php';

require 'includes/newcontact_handler.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Book Web</title>
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>

    <div>
        
        <form class="fo" action="AddNewContact.php" method="POST">

            <label for="name">Name</label><br><br>

            <input class="input_box" type="text" name="name" value="<?php 
                if(isset($_SESSION['name'])){
                echo $_SESSION['name'];
                } 
                ?>" required><br><br>
                <?php if(in_array("Your user name must be between 3 and 30 characters<br>", $error_array)) echo "Your user name must be between 3 and 30 characters<br>"; ?>

            <label for="username">DOB</label><br><br>

            <input class="input_box" type="text" name="dob" value="<?php 
                if(isset($_SESSION['dob'])){
                echo $_SESSION['dob'];
                } 
                ?>" required><br>

            <label for="username">Mobile Number</label><br><br>

            <input class="input_box" type="number" name="mobileno" value="<?php 
                if(isset($_SESSION['mobileno'])){
                echo $_SESSION['mobileno'];
                } 
                ?>" required><br><br>
                <?php if(in_array("Your mobile no must be of 10 characters<br>", $error_array)) echo "Your mobile no must be of 10 characters<br>"; ?>

            <label for="username">Email</label><br><br>

            <input class="input_box" type="text" name="email" value="<?php 
                if(isset($_SESSION['email'])){
                echo $_SESSION['email'];
                } 
                ?>" required><br><br>
                <?php if(in_array("Invalid email Format<br>", $error_array)) echo "Invalid email Format<br>"; ?>  

            <input class="input_box" type="submit" name="save_contact" value="Save">

        </form>

    </div>
</body>
</html>