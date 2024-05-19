<?php
session_start();
?>

<html>

  <head>
    <title> About | Gourmet's Bite </title>
  </head>

  <link rel="stylesheet" type="text/css" href="css/aboutus.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

  <style>
    body {
      margin: 0;
      padding: 0;
      height: 100%;
      overflow: hidden;
    }

    .video-background {
      position: absolute;
      top: 50%;
      left: 50%;
      height: 100%;
      width: 100%;
      transform: translate(-50%, -50%);
    }

    .content {
      position: relative;
      z-index: 100;
      color: white;
    }

    .navbar {
      z-index: 200;
    }

    .wide {
      position: relative;
      text-align: center;
      color: white;
      font-style: italic;
      background-color: rgba(0, 0, 0, 0.5);
      padding: 20px;
    }

    .wide .tagline {
      font-size: 2em;
      font-weight: bold;
    }
  </style>

  <body>
  
    <video autoplay muted loop class="video-background">
      <source src="images/about_vid.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>

    <div class="content">

      <button onclick="topFunction()" id="myBtn" title="Go to top">
        <span class="glyphicon glyphicon-chevron-up"></span>
      </button>
    
      <script type="text/javascript">
        window.onscroll = function() {
          scrollFunction()
        };

        function scrollFunction(){
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
            <a class="navbar-brand" href="index.php">Gourmet's Bite</a>
          </div>

          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Home</a></li>
              <li class="active"><a href="aboutus.php">About Us</a></li>
              <li><a href="contactus.php">Contact Us</a></li>
            </ul>

            <?php
            if (isset($_SESSION['login_user1'])) {
            ?>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user1']; ?> </a></li>
                <li><a href="myrestaurant.php">MANAGER CONTROL PANEL</a></li>
                <li><a href="logout_m.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
              </ul>
            <?php
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
                  } else {
                    echo "0";
                  }
                  ?>)
                </a></li>
                <li><a href="logout_u.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
              </ul>
            <?php
            } else {
            ?>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span> </a>
                  <ul class="dropdown-menu">
                    <li><a href="customersignup.php"> User Sign-up</a></li>
                    <li><a href="managersignup.php"> Manager Sign-up</a></li>
                  </ul>
                </li>

                <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="customerlogin.php"> User Login</a></li>
                    <li><a href="managerlogin.php"> Manager Login</a></li>
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
        <div class="tagline">Healthy<font color="green"><strong>food</strong></font>,healthy<font color="green"><strong><em>life</em>.</strong></font></div>
        <h3>Welcome to Gourmet's Bite, your one-stop destination for convenient and delightful culinary experiences! At Gourmet's Bite, we are passionate about connecting food lovers with the best restaurants in town and providing a seamless online platform to satisfy all your gastronomic desires.</h3>
        <br>
        <h3>Order food & beverages online from us. </h3>
        <br>
        <h3> We place no minimum order restrictions! Order in as little (or as much) as you'd like.</h3>
      </div>

    </div>

  </body>
</html>

