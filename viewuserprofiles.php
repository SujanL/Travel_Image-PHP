<?php

$conn = mysqli_connect('localhost','root','','travels');
if(!$conn){
    die();
}
$query = "SELECT * FROM traveluser,traveluserdetails WHERE traveluser.UID = traveluserdetails.UID ";
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
            <h1 align="center">All Users:</h1>
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
        <table class="table table-bordered">
            <tr>
                <td><b>Firstname</b></td>
                <td><b>Lastname</b></td>
                <td><b>Email</b></td>
                <td><b>Password</b></td>
                <td><b>Address</b></td>
                <td><b>City</b></td>
                <td><b>Region</b></td>
                <td><b>Country</b></td>
                <td><b>Postcode</b></td>
                <td><b>Phone</b></td>
                <td><b>Edit</b></td>
                <td><b>Delete</b></td>
            </tr>

            <?php

            while($row=mysqli_fetch_assoc($result))
            {
                $uid = $row['UID'];
                $fname = $row['FirstName'];
                $lname = $row['LastName'];
                $email = $row['Email'];
                $password = $row['Pass'];
                $address = $row['Address'];
                $city=$row['City'];
                $region=$row['Region'];
                $country=$row['Country'];
                $postcode=$row['Postal'];
                $phone=$row['Phone'];
?>
                <tr>
                <td><?php echo $fname ?></td>
                <td><?php echo $lname ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $password ?></td>
                <td><?php echo $address ?></td>
                <td><?php echo $city ?></td>
                <td><?php echo $region ?></td>
                <td><?php echo $country ?></td>
                <td><?php echo $postcode ?></td>
                <td><?php echo $phone ?></td>
                <td><a href="updateuserprofile.php?ID=<?php echo $uid ?>"><button>Edit Account</button></a></td>
                <td> <a href="adeleteuseraccount.php?Del=<?php echo $uid ?>" onclick="return confirm('Are you sure?')"><button>Delete Account</button></a></td>
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