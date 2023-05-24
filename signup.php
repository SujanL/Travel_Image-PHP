<?php require_once 'include/header.php'?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<?php
$fname="";
$lname="";
$address="";
$city="";
$state="";
$country="";
$postcode="";
$phone="";
$email="";
$errors=array();
$status="";
$db = mysqli_connect("localhost","root","","travels");

if (isset($_POST['reg_user'])){
    $fname = mysqli_real_escape_string($db,$_POST['fname']);
    $lname = mysqli_real_escape_string($db,$_POST['lname']);
    $address = mysqli_real_escape_string($db,$_POST['address']);
    $city = mysqli_real_escape_string($db,$_POST['city']);
    $region = mysqli_real_escape_string($db,$_POST['region']);
    $country = mysqli_real_escape_string($db,$_POST['country']);
    $postcode = mysqli_real_escape_string($db,$_POST['postcode']);
    $phone = mysqli_real_escape_string($db,$_POST['phone']);
    $email = mysqli_real_escape_string($db,$_POST['UserName']);
    $password_1=mysqli_real_escape_string($db,$_POST['password_1']);
    $password_2=mysqli_real_escape_string($db,$_POST['password_2']);

    if (empty($email)){array_push($errors,"Email is required");}
    if (empty($password_1)){array_push($errors,"Password is required");}
    if ($password_1 != $password_2){
    array_push($errors, "The two passwords do not match");
    }

    $user_check_query = "SELECT * FROM traveluser WHERE UserName ='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user){
    if ($user['UserName'] === $email){
    array_push($errors, "Email already exists");
    }
    }
    if (count($errors) == 0){
    $password = ($password_1);
    $query = "INSERT INTO traveluserdetails (FirstName, LastName, Address, City, Region, Country, Postal, Phone, Email) VALUES ('$fname', '$lname','$address','$city','$region','$country','$postcode','$phone', '$email')";
    $query1 = "INSERT INTO traveluser (UserName, Pass) VALUES ('$email', '$password')";
    echo $address; 
    mysqli_query($db, $query); 
    mysqli_query($db, $query1);
    $status="Account created successfully";
    }
}
?>

<form action="#" method="POST">
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <a href="login.php">Login</a>
                         <p><?php echo $status; ?></p>
                         <p><?php include('errors.php');?></p>
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Register Page</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="FirstName *" name="fname" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="LastName *" name="lname"required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Your Email *" name="UserName" value="<?php echo $email;?>" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Unit/Street address *" name="address" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="City *" name="city" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Region *" name="region" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Country *" name="country" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Postcode *" name="postcode" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Phone *" name="phone" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password *" name="password_1" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"  placeholder="Confirm Password *" name="password_2" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btnRegister"  name="reg_user">Register</button>
                                    </div>
                                </div>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
          </form>
<style>
    .register{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    margin-top: 3%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}
</style>
<?php require_once 'include/footer.php'?>