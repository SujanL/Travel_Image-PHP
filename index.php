<?php require_once 'include/header.php'?>
<?php 
    require_once 'include/dbconnect.php';
    $query = "SELECT md5(travelimage.ImageID) as md5_id,travelimage.Path, travelimagedetails.Title,travelimagedetails.Description
                FROM travelimage
                JOIN travelimagedetails on travelimagedetails.ImageID = travelimage.ImageID LIMIT 9";
    $result = mysqli_query($conn,$query);
?>
<div id="sidenav" class="sidenav">
  <a href="#" id="country">Country</a>
  <a href="#" id="city">City</a>
</div>
<style>
.sidenav a {
  position: absolute;
right:  -80px;
transition: 0.3s;
padding: 15px;
width: 100px;
text-decoration: none;
font-size: 20px;
color: white;
border-radius:  0 5px 5px 0;
}

.sidenav a:hover{
  right: 0;
}

.country{
  top: 20px;
background-color: #555;
}

.city{
  top: 80px;
  background-color: #555;
}</style>
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
                      <p>You can support us by contributing a little via PayPal. Please contact <a rel="nofollow" href="https://templatemo.com/contact" target="_parent">TemplateMo</a> via Live Chat or Email. If you have any question or feedback about this template, feel free to talk to us. Also, you may check other CSS templates such as <a rel="nofollow" href="https://templatemo.com/tag/multi-page" target="_parent">multi-page</a>, <a rel="nofollow" href="https://templatemo.com/tag/resume" target="_parent">resume</a>, <a rel="nofollow" href="https://templatemo.com/tag/video" target="_parent">video</a>, etc.</p>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-6">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li><a href="#">Best Templates</a>,</li>
                              <li><a href="#">TemplateMo</a></li>
                            </ul>
                          </div>
                          <div class="col-6">
                            <ul class="post-share">
                              <li><i class="fa fa-share-alt"></i></li>
                              <li><a href="#">Facebook</a>,</li>
                              <li><a href="#">Twitter</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img src="assets/images/blog-post-03.jpg" alt="">
                    </div>
                    <div class="down-content">
                      <span>Fashion</span>
                      <a href="#"><h4>Donec tincidunt leo nec magna</h4></a>
                      <ul class="post-info">
                        <li><a href="#">Admin</a></li>
                        <li><a href="#">May 14, 2020</a></li>
                        <li><a href="#">48 Comments</a></li>
                      </ul>
                      <p>Nullam at quam ut lacus aliquam tempor vel sed ipsum. Donec pellentesque tincidunt imperdiet. Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo. Phasellus interdum, diam commodo egestas rhoncus, turpis nisi consectetur nibh, in vehicula eros orci vel neque.</p>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-6">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li><a href="#">HTML CSS</a>,</li>
                              <li><a href="#">Photoshop</a></li>
                            </ul>
                          </div>
                          <div class="col-6">
                            <ul class="post-share">
                              <li><i class="fa fa-share-alt"></i></li>
                              <li><a href="#">Facebook</a>,</li>
                              <li><a href="#">Twitter</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="main-button">
                    <a href="blog.html">View All Posts</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="sidebar">
              <div class="row">
                <div class="col-lg-12">
                  <div class="sidebar-item search">
                    <form id="search_form" name="gs" method="GET" action="#">
                      <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                    </form>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                      <h2>Recent Posts</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li><a href="#">
                          <h5>Vestibulum id turpis porttitor sapien facilisis scelerisque</h5>
                          <span>May 31, 2020</span>
                        </a></li>
                        <li><a href="#">
                          <h5>Suspendisse et metus nec libero ultrices varius eget in risus</h5>
                          <span>May 28, 2020</span>
                        </a></li>
                        <li><a href="#">
                          <h5>Swag hella echo park leggings, shaman cornhole ethical coloring</h5>
                          <span>May 14, 2020</span>
                        </a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                      <h2>Categories</h2>
                    </div>
                    <div class="content">
                     When contemplating where to travel as a couple, it is important to expand your horizons and truly have a memorable experience together. For this reason, it is wise to carefully consider what you enjoy doing together as a couple and to challenge yourselves with new experience. Through this, you will be able to have a spectacular vacation that will be cherished for many years to come. 
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item tags">
                    <div class="sidebar-heading">
                      <h2>Destination</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li><a href="#">Bali</a></li>
                        <li><a href="#">Easter Island</a></li>
                        <li><a href="#">Ushuaia, Argentina</a></li>
                        <li><a href="#">Bangkok, Thailand</a></li>
                        <li><a href="#">New York City</a></li>
                        <li><a href="#">Paris, France</a></li>
                        <li><a href="#">Las Vegas</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php require_once 'include/footer.php'?>

    
   