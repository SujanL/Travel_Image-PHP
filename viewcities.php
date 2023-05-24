<?php
session_start();
$conn = mysqli_connect('localhost','root','','travels');
if(!$conn){
    die();
}

$query = "SELECT * FROM geocities,travelimagedetails WHERE geocities.CountryCodeISO=travelimagedetails.CountryCodeISO";
$result = mysqli_query($conn,$query);



?>

<!doctype html>
    <html>
    <head>
        <title>cities</title>
    </head>
    <body>
        <h1>All Cities that have travel images:</h1>
       
             <?php

            while($row=mysqli_fetch_assoc($result))
            {
                $geonameid = $row['GeoNameID'];
                $asciiname = $row['AsciiName'];
               ?>
               <br>
              <a href="citydetail.php?geonameid=<?php echo "$geonameid";?>"><?php echo $asciiname;
           }
       ?>
       </a>
</body>
    </html>