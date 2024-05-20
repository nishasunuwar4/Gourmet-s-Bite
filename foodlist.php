<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['login_user2'])) {
    header("location: customerlogin.php");
}

require 'connection.php';
$conn = Connect();

// Get the sorting criteria
$sort = isset($_POST['sort']) ? $_POST['sort'] : '';
$veg_filter = isset($_POST['veg_filter']) ? $_POST['veg_filter'] : '';

// Construct the SQL query based on sorting criteria
$sql = "SELECT * FROM FOOD WHERE options = 'ENABLE'";

// Apply veg/non-veg filter
if ($veg_filter == 'Vegetarian') {
    $sql .= " AND category = 'Vegetarian'";
} elseif ($veg_filter == 'Non-Vegetarian') {
    $sql .= " AND category = 'Non-Vegetarian'";
}

// Apply sorting
if ($sort == 'price_asc') {
    $sql .= " ORDER BY price ASC";
} elseif ($sort == 'price_desc') {
    $sql .= " ORDER BY price DESC";
} else {
    $sql .= " ORDER BY F_ID";
}

$result = mysqli_query($conn, $sql);

?>

<html>

<head>
    <title>Explore | Food Gourmet's Bite</title>
    <link rel="stylesheet" type="text/css" href="css/foodlist.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<style>
    .jumbotron, .panel {
        background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
      }
      .navbar-inverse {
        background-color: rgba(0, 0, 0, 0.8); /* Semi-transparent black background */
        border-color: rgba(0, 0, 0, 0.8);
      }
      .navbar-inverse .navbar-brand, 
      .navbar-inverse .navbar-nav > li > a {
        color: #fff;
      }
 </style>
<body>

    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </button>

    <script type="text/javascript">
        window.onscroll = function () {
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
                <a class="navbar-brand" href="index.php">Gourmet's Bite</a>
            </div>

            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="aboutus.php">About</a></li>
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
                        <li class="active"><a href="foodlist.php"><span class="glyphicon glyphicon-cutlery"></span> Food Zone </a></li>
                        <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart  (<?php
                            if (isset($_SESSION["cart"])) {
                                $count = count($_SESSION["cart"]);
                                echo "$count";
                            } else {
                                echo "0";
                            }
                            ?>) </a></li>
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
                                <li><a href="#"> Admin Sign-up</a></li>
                            </ul>
                        </li>

                        <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="customerlogin.php"> User Login</a></li>
                                <li><a href="managerlogin.php"> Manager Login</a></li>
                                <li><a href="#"> Admin Login</a></li>
                            </ul>
                        </li>
                    </ul>

                    <?php
                }
                ?>
            </div>
        </div>
    </nav>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">

            <div class="item active">
                <img src="images/slide002.jpg" style="width:100%;">
                <div class="carousel-caption">
                </div>
            </div>

            <div class="item">
                <img src="images/slide001.jpg" style="width:100%;">
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <img src="images/slide003.jpg" style="width:100%;">
                <div class="carousel-caption">
                </div>
            </div>

        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="jumbotron">
        <div class="container text-center">
            <h1>Welcome To Gourmet's Bite</h1>
        </div>
    </div>

    <div class="container" style="width:95%;">

        <!-- Sorting and filtering form -->
        <form method="POST" action="foodlist.php" class="form-inline text-center">
            <div class="form-group">
                <label for="sort">Sort by:</label>
                <select name="sort" class="form-control" id="sort">
                    <option value="default" <?php if ($sort == 'default') echo 'selected'; ?>>Default</option>
                    <option value="price_asc" <?php if ($sort == 'price_asc') echo 'selected'; ?>>Price: Low to High</option>
                    <option value="price_desc" <?php if ($sort == 'price_desc') echo 'selected'; ?>>Price: High to Low</option>
                </select>
            </div>
            <div class="form-group">
                <label for="veg_filter">Filter:</label>
                <select name="veg_filter" class="form-control" id="veg_filter">
                    <option value="all" <?php if ($veg_filter == 'all') echo 'selected'; ?>>All</option>
                    <option value="Vegetarian" <?php if ($veg_filter == 'Vegetarian') echo 'selected'; ?>>Vegetarian</option>
                    <option value="Non-Vegetarian" <?php if ($veg_filter == 'Non-Vegetarian') echo 'selected'; ?>>Non-Vegetarian</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Apply</button>
        </form>

        <!-- Display all Food from food table -->
        <?php
        if (mysqli_num_rows($result) > 0) {
            $count = 0;

            while ($row = mysqli_fetch_assoc($result)) {
                if ($count == 0) {
                    echo "<div class='row'>";
                }
                ?>
                <div class="col-md-3">

                    <form method="post" action="cart.php?action=add&id=<?php echo $row["F_ID"]; ?>">
                        <div class="mypanel" align="center";>
                            <img src="<?php echo $row["images_path"]; ?>" class="img-responsive">
                            <h4 class="text-dark"><?php echo $row["name"]; ?></h4>
                            <h5 class="text-info"><?php echo $row["description"]; ?></h5>
                            <h5 class="text-danger">RS: <?php echo $row["price"]; ?>/-</h5>
                            <h5 class="text-info">Quantity: <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 60px;"> </h5>
                            <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                            <input type="hidden" name="hidden_RID" value="<?php echo $row["R_ID"]; ?>">
                            <input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">
                        </div>
                    </form>
                </div>
                <?php
                $count++;
                if ($count == 4) {
                    echo "</div>";
                    $count = 0;
                }
            }
        } else {
            ?>
            <div class="container">
                <div class="jumbotron">
                    <center>
                        <label style="margin-left: 5px;color: red;">
                            <h1>Oops! No food is available.</h1>
                        </label>
                        <p>Stay Hungry...! :P</p>
                    </center>
                </div>
            </div>
            <?php
        }
        ?>

    </div>
</body>

</html>
