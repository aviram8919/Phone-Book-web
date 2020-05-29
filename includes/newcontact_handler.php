<?php
//declaring variables to prevent errors
$contactName=""; //user name 
$dob=""; //Date of Birth
$mobileNo=""; //mobile number
$emailId="";  //Email Id
$error_array=array(); //holds error message

if(isset($_POST['save_contact']))
{ 
    //Add New Contact Values

    //Name Of Contact
    $contactName=strip_tags($_POST['name']); //remove html tags
    $contactName=str_replace(' ', '',$contactName); //remove spaces
    $contactName= ucfirst(strtolower($contactName)); //uppercase first letter
    $_SESSION['name']=$contactName; //stores username in session variable

    //Date of birth
    $dob=strip_tags($_POST['dob']); //remove html tags
    $dob=str_replace(' ', '',$dob); //remove spaces
    $_SESSION['dob']=$dob; //stores username in session variable

   //email
   $emailId=strip_tags($_POST['email']); //remove html tags
   $emailId=str_replace(' ', '',$emailId); //remove spaces
   $_SESSION['email']=$emailId; //stores email in session variable

  //mobile Number
  $mobileNo=strip_tags($_POST['mobileno']); //remove html tags

    //check if email is in valid format
    if(filter_var($emailId, FILTER_VALIDATE_EMAIL)){
      $emailId=filter_var($emailId, FILTER_VALIDATE_EMAIL);
    }
    else{
      array_push($error_array,"Invalid email Format<br>");
    }

    //validation
  
    if(strlen($contactName)>30 || strlen($contactName)<3){
        array_push($error_array,"Your user name must be between 3 and 30 characters<br>");
    }

    if(strlen($mobileNo)<10 || strlen($mobileNo)>10){
        array_push($error_array,"Your mobile number must be of 10 characters<br>");
    }
     
    $query=mysqli_query($conn,"INSERT INTO newcontact VALUES ('', '$contactName', '$dob', '$mobileNo', '$emailId')");
    
    if($query){
        echo "<script>alert('Record Added Suceesfully')</script>"; ?>

        <META HTTP-EQUIV = "Refresh" CONTENT = "0; URL = 'homepage.php'">
        <?php
    }
    else{
        echo "failed to add the record";
    }

    //clear session variable
    $_SESSION['name']="";
    $_SESSION['dob']="";
    $_SESSION['mobileno']="";
    $_SESSION['email']="";

}
?>