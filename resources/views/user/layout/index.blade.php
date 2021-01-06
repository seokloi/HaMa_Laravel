<!DOCTYPE html>
<html lang="en">
@yield('php')
<head>
  <!-- =====  BASIC PAGE NEEDS  ===== -->
  <meta charset="utf-8">
  <title>HandMade Shop | HaMa</title>
  <!-- =====  SEO MATE  ===== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="HaMa">
  <meta name="keywords" content="HandMade,HandMade Shop,HaMa,HaMa Shop">
  <meta name="distribution" content="global">
  <meta name="revisit-after" content="2 Days">
  <meta name="robots" content="ALL">
  <meta name="rating" content="8 YEARS">
  <meta name="Language" content="en-us">
  <meta name="GOOGLEBOT" content="NOARCHIVE">
  <!-- =====  MOBILE SPECIFICATION  ===== -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="viewport" content="width=device-width">
  <!-- =====  CSS  ===== -->
  <link rel="stylesheet" type="text/css" href="user/css/font-awesome.min.css" />
  <link rel="stylesheet" type="text/css" href="user/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="user/css/style.css">
  <link rel="stylesheet" type="text/css" href="user/css/magnific-popup.css">
  <link rel="stylesheet" type="text/css" href="user/css/owl.carousel.css">
  <link rel="shortcut icon" href="user/images/favicon.png">
</head>

<body>
  <!-- =====  LODER  ===== -->
  <div class="loder"></div>
  <!-- <div class="wrapper">
    <div id="subscribe-me" class="modal animated fade in" role="dialog" data-keyboard="true" tabindex="-1">
      <div class="newsletter-popup"> <img class="offer" src="images/newsbg.jpg" alt="offer">
        <div class="newsletter-popup-static newsletter-popup-top">
          <div class="popup-text">
            <div class="popup-title">50% <span>off</span></div>
            <div class="popup-desc">
              <div>Sign up and get 50% off your next Order</div>
            </div>
          </div>
          <form onsubmit="return  validatpopupemail();" method="post">
            <div class="form-group required">
              <input type="email" name="email-popup" id="email-popup" placeholder="Enter Your Email" class="form-control input-lg" required />
              <button type="submit" class="btn btn-default btn-lg" id="email-popup-submit">Subscribe</button>
              <label class="checkme">
                <input type="checkbox" value="" id="checkme" /> Dont show again</label>
            </div>
          </form>
        </div>
      </div>
    </div> -->
    
	@include('user.layout.header')
    
    @yield('content')
    
	@include('user.layout.footer')
    
  </div>
  <a id="scrollup"></a>
  <script src="user/js/jQuery_v3.1.1.min.js"></script>
  <script src="user/js/owl.carousel.min.js"></script>
  <script src="user/js/bootstrap.min.js"></script>
  <script src="user/js/jquery.magnific-popup.js"></script>
  <script src="user/js/jquery.firstVisitPopup.js"></script>
  <script src="user/js/custom.js"></script>
</body>

</html>