<?php 
$conn = mysqli_connect('localhost','root','','travels');
if(!$conn){
    die();
}


    if(isset($_POST['update']))
    {
        $uid = $_GET['ID'];
        $fname = $_POST['cfname'];
        $lname = $_POST['clname'];
        $email = $_POST['cemail'];
        $password = $_POST['cpassword'];
        $address=$_POST['caddress'];
        $city=$_POST['ccity'];
        $region=$_POST['cregion'];
        $country=$_POST['ccountry'];
        $postcode=$_POST['cpostcode'];
        $phone=$_POST['cphone'];

        $sql = "UPDATE traveluserdetails SET FirstName = '".$fname."', LastName = '".$lname."', Email ='".$email."', Address ='".$address."', City ='".$city."', Region ='".$region."', Country ='".$country."', Postal ='".$postcode."', Phone ='".$phone."' WHERE  UID ='".$uid."'";
        $sql1 = "UPDATE traveluser SET Pass ='".$password."', UserName ='".$email."' WHERE UID ='".$uid."'";
        if(mysqli_query($conn,$sql) && mysqli_query($conn,$sql1))
        {
            header("location:userprofile.php");
        }
        else
        {
            echo ' Please Check Your Query ';
            echo "ERROR: Could not execute $sql.";
        }
    }
    else
    {
        header("location:userprofile.php");
    }


?>