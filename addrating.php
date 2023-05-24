<?php 
session_start();
$rate="";
  $conn = mysqli_connect('localhost','root','','travels');
if(!$conn){
    die();
}



    if(isset($_POST['submit']))
    {
        $uid = $_GET['useruid'];
        $imageID = $_GET['GetID'];
        $rate = $_POST['stars'];

$query = "INSERT INTO travelimagerating (ImageID, Rating, UID) VALUES ('$imageID', '$rate', '$uid')";
mysqli_query($conn, $query);

    }


?>

<!doctype html>
  <html>
  <head>
    <title>addrating</title>
  </head>
  <body>
    <h2>Provide rating to this travel image:</h2>
<?php
                $query = "SELECT * FROM travelimage WHERE ImageID='".$imageID."'";
$result = mysqli_query($conn,$query);
                 while($row=mysqli_fetch_assoc($result))
            {
                $path = $row['Path'];
                ?>
                <?php echo '<img src="images/square-medium/'.$path.'" width="200"/>' ;
            }
              ?>
              <br>
<br>
<form action="#" method="POST">
  <label for="stars">On a scale of 1 to 5, select your rating:</label>
  <select id="stars" name="stars">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select>
  <input type="submit" name="submit">
</form>

  </body>
  </html>