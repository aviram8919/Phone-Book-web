<?php

require 'config/config.php';
require 'includes/update_handler.php';
$nm = $_GET['name'];
$db = $_GET['dob'];
$mo = $_GET['mobileno'];
$em = $_GET['email'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
    <div>
        <form class="fo" action="update.php" method="GET">
            <div class="form_content">
                <label for="name">Name</label><br><br>
                
                <input class="input_box" type="text" name="name" value=" <?php echo "$nm" ?> " required><br><br>

                <label for="username">DOB</label><br><br>

                <input class="input_box" type="text" name="dob" value="<?php echo "$db" ?>" required><br><br>

                <label for="username">Mobile Number</label><br><br>

                <input class="input_box" type="text" name="mobileno" value="<?php echo "$mo" ?>" required><br><br>

                <label for="username">Email</label><br><br>

                <input class="input_box" type="text" name="email" value="<?php echo "$em" ?>" required><br><br>

                <input class="input_box" type="submit" name="submit" value="Update">
            
            </div>
        </form>
    </div>
</body>
</html>
