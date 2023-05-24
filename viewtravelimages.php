<?php
session_start();
$conn = mysqli_connect('localhost','root','','travels');
if(!$conn){
    die();
}

$query = "SELECT * FROM travelimage,travelpostimages WHERE travelimage.ImageID = travelpostimages.ImageID ";
$result = mysqli_query($conn,$query);



?>

<!doctype html>
    <html>
    <head>
        <title>travelimages</title>
    </head>
    <body>
        <h1>All Travel Images</h1>
       
             <?php

            while($row=mysqli_fetch_assoc($result))
            {
                $uid = $row['UID'];
                $pid = $row['PostID'];
                $imageID = $row['ImageID'];
                $path = $row['Path'];
               ?>
               <a href="imagedetail.php?GetID=<?php echo "$imageID";?>&pid=<?php echo "$pid";?>"><?php echo '<img src="images/square-medium/'.$path.'"/>' ;
           }
           ?>
       </a>



    </body>
    </html>