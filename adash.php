<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <title>Travel</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/assets/css/templatemo-stand-blog.css">
    <link rel="stylesheet" href="assets/assets/css/owl.css">
<!--

TemplateMo 551 Stand Blog

https://templatemo.com/tm-551-stand-blog

-->
  </head>

  <body>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>Travel<em>.</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About Us
                </a>
              </li>
              <li class="nav-item">
  <a class="nav-link" href="logout.php">Logout</a>
</li>

                         <div class="dropdown">
  <button class="dropbtn">Browse</button>
  <div class="dropdown-content">
    <a href="viewpostlist.php">Posts</a>
    <a href="aviewtravelimages.php">Images</a>
    <a href="viewuserprofiles.php">Users</a>
     <a href="viewcountries.php">Countries</a>
    <a href="viewcities.php">Cities</a>
    
  </div>
</div>
              <div class="form-outline">
    <input type="search" id="form1" class="form-control" />
    <label class="form-label" for="form1">Search</label>
  </div>
<style>
.dropbtn {
  color: black;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: white}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: }
</style>
                          </ul>
          </div>
        </div>
      </nav>
    </header>
<?php 
    require_once 'include/dbconnect.php';
    $query = "SELECT md5(travelimage.ImageID) as md5_id,travelimage.Path, travelimagedetails.Title,travelimagedetails.Description
                FROM travelimage
                JOIN travelimagedetails on travelimagedetails.ImageID = travelimage.ImageID LIMIT 9";
    $result = mysqli_query($conn,$query);
?>
<a href="https://www.flybuys.co.nz/extras/carousel/okaritokayaks-jan21"><img src="https://images.ctfassets.net/4h15qvxbuksf/1n3pBANTwMtR3xrzUqGyg7/ea844629bf3f6a80d81e4aea74da7dcc/TNZ_Web-Offer-Banner_April-21_Okarito-Kayaks_FAsb.jpg" width="1280" height="300" ></a>
<table>
  <tr>
    <td> <a href="https://www.tourism.australia.com/en/news-and-media/news-stories/national-tourism-advertising-blitz-to-boost-bookings.html"><img src="https://www.tourism.australia.com/content/corporate/en/news-and-media/news-stories/national-tourism-advertising-blitz-to-boost-bookings/_jcr_content/mainParsys/imagewithcaption_cop/LargeImageTile/largeImageSrc.adapt.740.medium.jpg" width="300" height="800"></a> </td>
    <td>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/large/9494464567.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/large/6592294487.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/large/8645912379.jpg" alt="Third slide">
    </div>
  </div>
</div>
</td>
</tr>
</table>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

</div>
    <div class="main-banner header-text">
      <div class="container-fluid">
        <div class="owl-banner owl-carousel">
          <?php while($data = mysqli_fetch_assoc($result)):?>
            <div class="item">
              <img src="<?php echo 'assets/assets/images/travels/'.$data['Path'];?>" alt="">
              <div class="item-content">
                <div class="main-content">
                  <div class="meta-category">
                    <span>Travel</span>
                  </div>
                  <a href="post.php?id=<?php echo $data['md5_id'];?>"><h4><?php echo $data['Title'];?></h4></a>
                  <ul class="post-info">
                    <li><a href="#">Admin</a></li>
                    <li><a href="#">May 12, 2020</a></li>
                    <li><a href="#">12 Comments</a></li>
                  </ul>
                </div>
              </div>
            </div>
          <?php endwhile?>


        </div>
      </div>
    </div>


    <!-- Banner Ends Here -->

    <section class="blog-posts">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img src="assets/images/blog-post-02.jpg" alt="">
                    </div>
                    <div class="down-content">
                      <span>Healthy</span>
                      <a href="#"><h4>Etiam id diam vitae lorem dictum</h4></a>
                      <ul class="post-info">
                        <li><a href="#">Admin</a></li>
                        <li><a href="#">May 24, 2020</a></li>
                        <li><a href="#">36 Comments</a></li>
                      </ul>
                      <p>You can support us by contributing a little via PayPal. Please contact <a rel="nofollow" href="https://