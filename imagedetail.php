<?php
session_start();
$conn = mysqli_connect('localhost','root','','travels');
if(!$conn){
    die();
}
$pid = $_GET['pid'];
$imageID = $_GET['GetID'];

?>

<!doctype html>
    <html>
    <head>
        <title>image details</title>
        <body>
<?php

             $query1 ="SELECT * FROM travelimagedetails WHERE ImageID='".$imageID."'";
             $result1 = mysqli_query($conn,$query1);
             while ($row1=mysqli_fetch_assoc($result1))
             {
                $imagetitle = $row1['Title'];
                $description = $row1['Description'];
                $latitude = $row1['Latitude'];
                $longitude = $row1['Longitude'];
                $citycode = $row1['CityCode'];
                $countrycodeiso = $row1['CountryCodeISO'];
                ?>
                <iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $latitude;?>,<?php echo $longitude;?>&output=embed"></iframe>
                <?php 
            }
            ?>
                <?php
                $query2 = "SELECT * FROM travelimage WHERE ImageID='".$imageID."'";
$result2 = mysqli_query($conn,$query2);
                 while($row2=mysqli_fetch_assoc($result2))
            {
                $path = $row2['Path'];
                ?>
                <p><?php echo $imagetitle ?>:</p>
                <?php echo '<img src="images/square-medium/'.$path.'"/>' ;
            }
              ?>
               <p><?php echo $description ?></p>
                <p>City code: <?php echo $citycode?></p>
                <p> Country code ISO: <?php echo $countrycodeiso ?></p>
                <?php
                $query3 = "SELECT * FROM travelimagelocations WHERE ImageID ='".$imageID."'";
                $result3 = mysqli_query($conn,$query3);
                 while($row3=mysqli_fetch_assoc($result3))
            {
                $location = $row3['LocationName'];
                ?>
               <p>Location: <?php echo $location ?></p>
                <?php
            }
            ?>
            <p>All ratings provided out of 5 stars:</p>
            <?php 
                $query4 = "SELECT * FROM travelimagerating WHERE ImageID ='".$imageID."'";
                $result4 = mysqli_query($conn,$query4);
                 while($row4=mysqli_fetch_assoc($result4))
            {
                $rating = $row4['Rating'];
                ?>
                <ul>
                <li><?php echo $rating ?><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtHhPg-4WOIiLSF_ksGEYhi9TN0mrcTkHNCA&usqp=CAU" width="13" height="13"></li>
            </ul>
                <?php
             }
?>
<br>
            <p>See all posts for <?php echo $imagetitle ?> here:</p>
          <?php
          $query5 ="SELECT * FROM travelpost WHERE PostID='".$pid."'";
          $result5 = mysqli_query($conn,$query5);
          while($row5=mysqli_fetch_assoc($result5))
          {
            $title=$row5['Title'];
            $uid=$row5['UID'];
            $pid=$row5['PostID'];
                ?>
                <ol>
                <li><a href="postdetail.php?GetID=<?php echo "$pid";?>&uid=<?php echo "$uid";?>"><?php echo $title?></a></li>
            </ol>
                <?php
            }
            ?>

        </body>
    </head>
    </html>