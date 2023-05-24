<?php
session_start();
$conn = mysqli_connect('localhost','root','','travels');
if(!$conn){
    die();
}
$countrycode = $_GET['GetID'];

?>

<!doctype html>
    <html>
    <head>
        <title>country details</title>
        <body>
<?php

             $query ="SELECT * FROM geocountries WHERE fipsCountryCode='".$countrycode."'";
             $result = mysqli_query($conn,$query);
             while ($row=mysqli_fetch_assoc($result))
             {
             	$iso = $row['ISO'];
                $countryname = $row['CountryName'];
                $capital = $row['Capital'];
                $area = $row['Area'];
                $population = $row['Population'];
                $currencycode = $row['CurrencyCode'];
                $description = $row['CountryDescription'];
                ?>
                <h3><?php echo $countryname ?></h3>.
                <p><?php echo '<img src="https://www.countryflags.io/'.$countrycode.'/flat/64.png" width="150"/>' ; ?></p>
                <p>Captial: <?php echo $capital ?></p>
                <p>Area: <?php echo $area ?></p>
                <p>Population: <?php echo $population ?></p>
                <p>Currency code: <?php echo $currencycode ?></p>
                <p><?php echo $description ?></p>
<?php
}
?>
<br>
                <p>Travel images related to this country:</p>
<?php
$query1 = "SELECT * FROM travelimagedetails WHERE CountryCodeISO='".$iso."'";
$result1 = mysqli_query($conn,$query1);
 while($row1=mysqli_fetch_assoc($result1))
            {
                $imageID = $row1['ImageID'];
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
</head>
</html>
