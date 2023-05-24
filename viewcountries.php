
<?php
session_start();
$conn = mysqli_connect('localhost','root','','travels');
if(!$conn){
    die();
}

$query = "SELECT * FROM geocountries";
$result = mysqli_query($conn,$query);



?>

<!doctype html>
    <html>
    <head>
        <title>countries</title>
    </head>
    <body>
        <h1>Countries</h1>
       
             <?php

            while($row=mysqli_fetch_assoc($result))
            {
                $countrycode = $row['fipsCountryCode'];
               ?>
              <a href="countrydetail.php?GetID=<?php echo "$countrycode";?>"><?php echo '<img src="https://www.countryflags.io/'.$countrycode.'/flat/64.png"/>' ;
           }
       ?>
       </a>



    </body>
    </html>