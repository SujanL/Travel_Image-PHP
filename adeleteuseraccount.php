<?php 

  $conn = mysqli_connect('localhost','root','','travels');
if(!$conn){
    die();
}

    if(isset($_GET['Del']))
    {
        $uid = $_GET['Del'];
        $query = "DELETE FROM traveluserdetails WHERE UID = '".$uid."'";
        $query1 = "DELETE FROM traveluser WHERE UID ='".$uid."'";
        $result = mysqli_query($conn,$query);
        $result1 = mysqli_query($conn,$query1);
        if($result && $result1)
        {
            
            header("location:viewuserprofiles.php");
        }
        else{
            echo 'Please Check Your Query';
        }
    }
    else
    {
        header("location:viewuserprofiles.php");
    }