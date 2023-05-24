<?php
session_start();
$conn = mysqli_connect('localhost','root','','travels');
if(!$conn){
    die();
}
$geonameid = $_GET['geonameid'];


?>

<!doctype html>
    <html>
    <head>
        <title>city details</title>
    </head>
    <body>
        <?php

             $query ="SELECT * FROM geocities WHERE GeoNameID='".$geonameid."'";
             $result = mysqli_query($conn,$query);
             while ($row=mysqli_fetch_assoc($result))
             {
                $countrycodeiso = $row['CountryCodeISO'];
                $asciiname = $row['AsciiName'];
                $population = $row['Population'];
                $elevation = $row['Elevation'];
                $latitude = $row['Latitude'];
                $longitude = $row['Longitude'];
                ?>
                <iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $latitude;?>,<?php echo $longitude;?>&output=embed"></iframe>
                <?php
            }
            ?>
            <?php 
            $query1 = "SELECT * FROM geocountries WHERE ISO='".$countrycodeiso."'";
$result1 = mysqli_query($conn,$query1);
 while($row1=mysqli_fetch_assoc($result1))
            {
                $countryname = $row1['CountryName'];
?>
<p>Country: <?php echo $countryname ?></p>
<p>City: <?php echo $asciiname ?></p>
<p>Population: <?php echo $population ?></p>
<p>Elevation: <?php echo $elevation ?></p>
<?php
}
?>
  <br>
                <p>Travel images related to this city:</p>
                <?php
$query4 = "SELECT * FROM travelimagedetails WHERE CountryCodeISO='".$countrycodeiso."'";
$result4 = mysqli_query($conn,$query4);
 while($row4=mysqli_fetch_assoc($result4))
            {
                $imageID = $row4['ImageID'];
?>
<?php 
$query3 = "SELECT * FROM travelpostimages WHERE ImageID='".$imageID."'";
$result3 = mysqli_query($conn,$query3);
while($row3=mysqli_fetch_assoc($result3))
{
    $pid = $row3['PostID'];
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
              <?php 
          }
              ?>
          </a>
          <?php
      }
      ?>
    </body>
    </html>