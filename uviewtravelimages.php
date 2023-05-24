<?php
session_start();
$useruid=$_SESSION['id'];
$conn = mysqli_connect('localhost','root','','travels');
if(!$conn){
    die();
}
$ID=$_GET['ID'];
$query = "SELECT * FROM travelimage,travelpostimages WHERE travelimage.ImageID = travelpostimages.ImageID ";
$result = mysqli_query($conn,$query);



?>

<!doctype html>
    <html>
    <head>
        <title>travelimages</title>
    </head>
    <body>
        <h1>All Travel Images<?php echo $useruid?></h1>
       
             <?php

            while($row=mysqli_fetch_assoc($result))
            {
                $uid = $row['UID'];
                $pid = $row['PostID'];
                $imageID = $row['ImageID'];
                $path = $row['Path'];
               ?> 
               <a href="imagedetail.php?GetID=<?php echo "$imageID";?>&pid=<?php echo "$pid";?>"><?php echo '<img src="images/square-medium/'.$path.'"/>' ;?>
       </a>
         <a href="addrating.php?GetID=<?php echo "$imageID";?>&useruid=<?php echo "$useruid";?>"><button>Add ratings</button></a><br>
         <?php
     }
 ?><br>




    </body>
    </html>