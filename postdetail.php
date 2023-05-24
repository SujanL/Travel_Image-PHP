<?php
$conn = mysqli_connect('localhost','root','','travels');
if(!$conn){
    die();
}
$uid = $_GET['uid'];
$pid = $_GET['GetID'];
$query = "SELECT * FROM travelpost WHERE PostID='".$pid."'";
$result = mysqli_query($conn,$query);



?>

<!doctype html>
    <html>
    <head>
        <?php require_once 'include/header.php'?> 

        <title>post1</title>
        <body>
            <a href="https://www.flybuys.co.nz/extras/carousel/okaritokayaks-jan21"><img src="https://images.ctfassets.net/4h15qvxbuksf/1n3pBANTwMtR3xrzUqGyg7/ea844629bf3f6a80d81e4aea74da7dcc/TNZ_Web-Offer-Banner_April-21_Okarito-Kayaks_FAsb.jpg" width="1280" height="300" ></a>
<table>
  <tr>
    <td> <a href="https://www.tourism.australia.com/en/news-and-media/news-stories/national-tourism-advertising-blitz-to-boost-bookings.html"><img src="https://www.tourism.australia.com/content/corporate/en/news-and-media/news-stories/national-tourism-advertising-blitz-to-boost-bookings/_jcr_content/mainParsys/imagewithcaption_cop/LargeImageTile/largeImageSrc.adapt.740.medium.jpg" width="300" height="800"></a> </td>
    <td>
                <?php

            while($row=mysqli_fetch_assoc($result))
            {
                $title = $row['Title'];
                $msg = $row['Message'];
              
                
?>
       
            <h1><?php echo $title ?></h1>
            <p><?php echo $msg ?></p>

            <?php
        }

        ?>
        <?php
        $query1 = "SELECT * FROM travelpostimages WHERE PostID='".$pid."'";
$result1 = mysqli_query($conn,$query1);
 while($row1=mysqli_fetch_assoc($result1))
            {
                $imageID = $row1['ImageID'];
?>
<?php
                $query2 = "SELECT * FROM travelimage WHERE ImageID='".$imageID."'";
$result2 = mysqli_query($conn,$query2);
                 while($row2=mysqli_fetch_assoc($result2))
            {
                $path = $row2['Path'];
                ?>
            <a href="imagedetail.php?GetID=<?php echo "$imageID";?>&pid=<?php echo "$pid";?>"><?php echo '<img src="images/square-medium/'.$path.'"/>' ;
              }
              ?>
          </a>

              <?php
          }
          ?>
          <?php
          $query3 ="SELECT * FROM traveluserdetails WHERE UID='".$uid."'";
          $result3 = mysqli_query($conn,$query3);
          while($row3=mysqli_fetch_assoc($result3))
          {
            $fname=$row3['FirstName'];
            $lname=$row3['LastName'];
            ?>
            <br><br>
            <p>This post is form <?php echo $fname ?> <?php echo $lname ?>. See all <?php echo $fname ?> <?php echo $lname ?>'s posts here :</p>
            <?php
            $query4 ="SELECT * FROM travelpost WHERE UID='".$uid."'";
            $result4 = mysqli_query($conn,$query4);
            while($row4=mysqli_fetch_assoc($result4))
            {
                $title=$row4['Title'];
                $pid=$row4['PostID'];
                ?>
                <ol>
                <li><a href="postdetail.php?GetID=<?php echo "$pid";?>&uid=<?php echo "$uid";?>"><?php echo $title?></a></li>
            </ol>
                <?php
            }
            ?>
            <?php
          }
          ?>
      
      </td>
  </tr>
</table>
    </body>
</head>
</html>
