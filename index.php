<?php
session_start();
?>

<html>

<head>
  <title>Home | Gourmet's Bite</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <style>
    body, html {
      height: 100%;
      margin: 0;
    }
    .video-container {
      position: fixed;
      right: 0;
      bottom: 0;
      width: 100%;
      height: 100%; /* Adjust the height to make the video cover less area */
      overflow: hidden;
      z-index: -1;
    }
    .video-background {
      position: absolute;
      top: 50%;
      left: 50%;
      height: 100%;
      width: 100%;
      transform: translate(-50%, -50%);
    }
    .navbar-brand {
      display: flex;
      align-items: center;
    }
    .navbar-brand img {
      height: 55px;
      margin-right: 10px;
    }
    .navbar-brand span {
      font-size: 20px;
      color: white;
    }
    .tagline {
      color: #ffcccb;
      font-size: 55px;
      text-align: center;
      margin-top: 20px;
      font-weight: bold;
    }
    .content {
      position: relative;
      z-index: 1;
      color: white;
    }
  </style>
</head>

<body>
  <div class="video-container">
    <video class="video-background" autoplay muted loop>
      <source src="images/food_home.mp4" type="video/mp4">
      Your browser does not support HTML5 video.
    </video>
  </div>

  <div class="content">
    <button onclick="topFunction()" id="myBtn" title="Go to top">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </button>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      window.onscroll = function() {
        scrollFunction()
      };

      function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("myBtn").style.display = "block";
        } else {
          document.getElementById("myBtn").style.display = "none";
        }
      }

      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>

    <nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">
            <img src="images/logo.webp" alt="Gourmet's Bite Logo">
            <span>Gourmet's Bite</span>
          </a>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
          </ul>

          <?php
          if (isset($_SESSION['login_user1'])) {
            // Manager is logged in
            // ... (existing code for manager)
          } else if (isset($_SESSION['login_user2'])) {
          ?>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user2']; ?> </a></li>
              <li><a href="foodlist.php"><span class="glyphicon glyphicon-cutlery"></span> Food Zone </a></li>
              <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart
                  (<?php
                  if (isset($_SESSION["cart"])) {
                    $count = count($_SESSION["cart"]);
                    echo "$count";
                  } else
                    echo "0";
                  ?>)
                </a></li>
              <li><a href="logout_u.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
            </ul>
          <?php
          } else {
          ?>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="customersignup.php">User Sign-up</a></li>
                  <li><a href="managersignup.php">Manager Sign-up</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="customerlogin.php">User Login</a></li>
                  <li><a href="managerlogin.php">Manager Login</a></li>
                </ul>
              </li>
            </ul>
          <?php
          }
          ?>
        </div>
      </div>
    </nav>

    <div class="wide">
      <div class="col-xs-5 line">
        <hr>
      </div>
      <div class="col-xs-5 line">
        <hr>
      </div>
      <div class="tagline">Online Food Order System</div>
    </div>

    <div class="orderblock">
      <h2>Feeling Hungry?</h2>
      <center><a class="btn btn-success btn-lg" href="foodlist.php" role="button">Order Now</a></center>
    </div>
  </div>
</body>

</html>
