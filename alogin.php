             <?php

$host="localhost";
$user="root";
$password="";
$db="travels";

session_start();

$data=mysqli_connect($host,$user,$password,$db);
if($data===false)
{
    die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username=$_POST["username"];
    $password=$_POST["password"];

    $sql="select * from admin where UserName='".$username."' AND Pass='".$password."'";

    $result=mysqli_query($data,$sql);

    $row=mysqli_fetch_array($result);

    $count=mysqli_num_rows($result);

    if($count>0)
    {
     $_SESSION["username"]=$username;

        header("location:adash.php");
  
}
      else
{
   $_SESSION['error'] = "*Username or password error";
}
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="description" content="Login - Register Template">
    <meta name="author" content="Lorenzo Angelino aka MrLolok">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/assets/css/main.css">
    <style>
        body {
            background-color: #303641;
        }
        .error{
            color: #D8000C;
            background-color: #FFBABA;
        }
    </style>
</head>

<body>
    <div id="container-login">
        <div id="title">
            <i class="material-icons lock">lock</i> Login
        </div>
        <?php if(isset($_SESSION['error'])):?>
            <div class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']);?></div>
        <?php endif?>
        <form action="#" method="post">
            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">face</i>
                </div>
                <input id="username" placeholder="Username" type="text" name="username" required class="validate" autocomplete="off">
            </div>

            <div class="clearfix"></div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">vpn_key</i>
                </div>
                <input id="password" placeholder="Password" type="password"  name="password" required class="validate" autocomplete="off">
            </div>

            <div class="remember-me">
                <input type="checkbox">
                <span style="color: #DDD">Remember Me</span>
            </div>

            <input type="submit" name="login" value="Log In" />
        </form>

        <div class="forgot-password">
            <a href="#">Forgot your password?</a>
        </div>
        <div class="privacy">
            <a href="#">Privacy Policy</a>
        </div>

        <div class="register">
            Click here to go to home page
            <a href="index.php"><button id="register-link">Go back</button></a>
        </div>
    </div>
</body>

</html>
