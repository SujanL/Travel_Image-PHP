<?php 

  $conn = mysqli_connect('localhost','root','','travels');
if(!$conn){
    die();
}

    if(isset($_GET['Del']))
    {
        $imageratingID = $_GET['Del'];
        $query = "DELETE FROM travelimagerating WHERE ImageRatingID = '".$imageratingID."'";
        $result = mysqli_query($conn,$query);
        if($result)
        {
            
            header("location:aviewtravelimages.php");
        }
        else{
            echo 'Please Check Your Query';
        }
    }
    else
    {
        header("location:aviewtravelimages.php");
    }