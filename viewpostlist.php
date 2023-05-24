<?php
session_start();
$conn = mysqli_connect('localhost','root','','travels');
if(!$conn){
    die();
}

$query = "SELECT * FROM travelpost,traveluserdetails WHERE travelpost.UID = traveluserdetails.UID ";
$result = mysqli_query($conn,$query);



?>



<!doctype html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>All Posts</title>
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
         <div class="container">
            <h1 align="center">All Posts:</h1>
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
        <table class="table table-bordered">
            <tr>
                <td><b>Firstname</b></td>
                <td><b>Lastname</b></td>
                <td><b>UID</b></td>
                <td><b>Title</b></td>
                <td><b>Post ID</b></td>
            </tr>

            <?php

            while($row=mysqli_fetch_assoc($result))
            {
                $uid = $row['UID'];
                $pid = $row['PostID'];
                $title = $row['Title'];
                $fname = $row['FirstName'];
                $lname = $row['LastName'];
?>
                <tr>
                    <td><?php echo $fname ?></td> 
                <td><?php echo $lname ?></td>
                <td><?php echo $uid ?></td>
                <td><?php echo $title ?></td>
                <td><a href="postdetail.php?GetID=<?php echo "$pid";?>&uid=<?php echo "$uid";?>"><?php echo $pid?></a></td>
                </tr>
            <?php 
        }

            ?>
            <?php

            ?>

        </table>
    </div>
</div>
</div>
</div>

            </body>
            </html>