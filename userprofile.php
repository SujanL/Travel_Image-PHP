<?php
session_start();

$conn = mysqli_connect('localhost','root','','travels');
if(!$conn){
    die();
}

$query = "SELECT * FROM traveluser,traveluserdetails WHERE traveluser.UID = traveluserdetails.UID ";
$result = mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $uid = $row['UID'];
        $fname = $row['FirstName'];
        $lname = $row['LastName'];
        $email = $row['Email'];
        $password = $row['Pass'];
        $address=$row['Address'];
        $city=$row['City'];
        $region=$row['Region'];
        $country=$row['Country'];
        $postcode=$row['Postal'];
        $phone=$row['Phone'];
    }

?>
<!doctype html>
    <html>
<head>
    <title>Document</title>
    <style>
    .container {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 350px;
  margin: auto;
  text-align: center;
  font-family: arial;
}
</style>
</head>
<body>
                        <div class="container">
                            <h2>My Account</h2>
                            <img src="https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg" alt="img" border="0" alt="img" style="width:50%">
                            <form action="updateuserprofile.php?ID=<?php echo $uid ?>" method="post">
                                <table>
                                    <tr>
                                <td align="left">Firstname:</td><td align="left"> <input type="text" class="form-control mb-2" placeholder=" First Name " name="cfname" value="<?php echo $fname ?>"></td>
                            </tr>
                            <tr>
                                <td align="left">Lastname:</td><td align="left"> <input type="text" class="form-control mb-2" placeholder=" Last Name " name="clname" value="<?php echo $lname ?>"></td>
                            </tr>
                            <tr>
                                <td align="left">Email:</td><td align="left"><input type="email" class="form-control mb-2" placeholder=" Email " name="cemail" value="<?php echo $email ?>"></td>
                            </tr>
                            <tr>
                                <td align="left">Password:</td><td align="left"><input type="text" class="form-control mb-2" placeholder=" password " name="cpassword" value="<?php echo $password ?>"></td>
                            </tr>
                            <tr>
                                <td align="left">Address:</td><td align="left"><input type="text" class="form-control mb-2" placeholder=" Address " name="caddress" value="<?php echo $address ?>"></td>
                            </tr>
                            <tr>
                                <td align="left">City:</td><td align="left"><input type="text" class="form-control mb-2" placeholder=" City " name="ccity" value="<?php echo $city ?>"></td>
                            </tr>
                            <tr>
                                <td align="left">Region:</td><td align="left"><input type="text" class="form-control mb-2" placeholder=" Region " name="cregion" value="<?php echo $region ?>"></td>
                            </tr>
                            <tr>
                                <td align="left">Country:</td><td align="left"><input type="text" class="form-control mb-2" placeholder=" Country " name="ccountry" value="<?php echo $country ?>"></td>
                            </tr>
                            <tr>
                                <td align="left">Postcode:</td><td align="left"><input type="text" class="form-control mb-2" placeholder=" Postcode " name="cpostcode" value="<?php echo $postcode ?>"></td>
                            </tr>
                            <tr>
                                <td align="left">Phone-number:</td><td align="left"><input type="tel" class="form-control mb-2" placeholder=" Phone Number " name="cphone" value="<?php echo $phone ?>"></td>
                            </tr>
                        </table><br><br>
                                <button class="btn btn-primary" name="update">Update</button>
                            </form>
                            <br>
                             <a href="deleteuseraccount.php?Del=<?php echo $uid ?>" onclick="return confirm('Are you sure?')"><button>Delete Account</button></a>

                        </div>
    </body>
    </html>