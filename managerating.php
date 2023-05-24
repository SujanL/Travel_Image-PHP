<?php
$conn = mysqli_connect('localhost','root','','travels');
if(!$conn){
    die();
}
$imageID = $_GET['GetID'];

?>

<!doctype html>
	<html>
	<head>
		<title>managerating</title>
		 <style>
         .container {
  max-width: 350px;
  margin: auto;
  text-align: center;
  font-family: arial;
}
        table,
        th,
        td{
            padding: 10px;
            border: 1px solid black;
            border-collapse: colllapse;
            
        }
    </style>
	</head>
	<body class="bg-dark">
        		<h3 align="center">All ratings received for this travel image:</h3>
                   <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
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
              <br><br>
        <table class="table table-bordered" align="center">
            <tr>
                <td><b>Ratings out of 5 stars</b></td>
                <td><b>Delete</b></td>
            </tr>
              <?php 
                $query1 = "SELECT * FROM travelimagerating WHERE ImageID ='".$imageID."'";
                $result1 = mysqli_query($conn,$query1);
                 while($row1=mysqli_fetch_assoc($result1))
            {
                $rating = $row1['Rating'];
                $imageratingID = $row1['ImageRatingID'];
                ?>
                <tr>
                	<td><?php echo $rating ?><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtHhPg-4WOIiLSF_ksGEYhi9TN0mrcTkHNCA&usqp=CAU" width="13" height="13"></td>
                	<td><a href="adeleterating.php?Del=<?php echo $imageratingID ?>" onclick="return confirm('Are you sure?')"><button>Delete</button></a></td>
                </tr>
                <?php
             }
?>
</table>
</div>
</div>
</div>
</div>
	</body>
	</html>