<?php
    require("utility/utility.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon" />
    <title>Organic Lanka</title>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/sweetalert.js"></script>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />
</head>

<body>
<style>
    /* Inline CSS */
   
    .car-select {
        margin: 50px auto;
        width: 300px;
        border: 1px solid #ccc;
        border-radius: 5px;
        overflow: hidden;
        position: relative;
    }
    .car-select select {
        width: 100%;
        padding: 10px;
        border: none;
        background-color: #fff;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        cursor: pointer;
    }
    .car-select::before {
        content: '\f078';
        font-family: 'Font Awesome 5 Free';
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        color: #888;
        pointer-events: none;
    }
    /* Animation */
    @keyframes fadeIn {
        0% { opacity: 0; }
        100% { opacity: 1; }
    }
    /* Font Awesome Icons */
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
</style>
    <div class="responsive-search" style="margin:20px" id="rss">
        <div class="closediv">
            <i class="uil uil-times" onclick="closerss()"></i>
        </div>
        <div class="seachbox">
        <form action="view.php" method="GET">
                        <input type="hidden" value="" name="n" id="cat" />
                        <input type="text" placeholder="Search Products" name="k" />
                        <button>
                            <i class="uil uil-search"></i>
                        </button>
                    </form>
            <div class="location fadeup" style="margin-left:30px">
                <input type="text" placeholder="Search category here" id="locatin_search" oninput="search_city()" />
                
                <ul>
                    <?php
                $res=mysqli_query($con,"select * from categories");
                while($row=mysqli_fetch_assoc($res)){
            ?>
                    <li onclick="set(<?php echo $row['id']; ?>)">
                                <i class="uil uil-apps"></i>
                                <a href="javascript:void(0)" class="cn-search"><?php echo $row['category']; ?></a>
                            </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <header class="header">
        <div class="top-header">
            <div class="th">
                <div class="logo">
                    <a href="index.php">
                        <img style="width: 200px" src="assets/images/hero_logo.jpg" alt="logo" />
                    </a>
               
               
                </div>
                <div class="searchbox" style="margin-left:160px;">
                    <span>
                        <i class="uil uil-create-dashboard" onclick="show_cat()"></i>
                        <i class="uil uil-angle-down icon__14" onclick="show_cat()"></i>
                    </span>
                    <form action="view.php" method="GET">
                        <input type="hidden" value=""  name="n" id="cat" />
                        <input type="text" placeholder="Search Products" name="k" />
                        <button>
                            <i class="uil uil-search"></i>
                        </button>
                    </form>
                    <div class="location fadeup" id="ctcnpnl">
                        <input type="text" placeholder="Search here" id="cat_search" oninput="search_cat()" />
                        <ul>
                            <?php
                $res=mysqli_query($con,"select * from categories");
                while($row=mysqli_fetch_assoc($res)){
            ?>
                            <li onclick="set(<?php echo $row['id']; ?>)">
                                <i class="uil uil-apps"></i>
                                <a href="javascript:void(0)" class="cn-search"><?php echo $row['category']; ?></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="selecloc">
                    <div class="dropdown" tabindex="0">
                        <div class="text">
                            <i class="uil uil-location-point"></i>
                            <?php
               if(isset($_GET['utm_source'])){
                 $source=$_GET['utm_source'];
                $c=mysqli_num_rows(mysqli_query($con,"select * from city where id='$source'"));
                if($c==0){
                  redirect('index.php');
                  die();
                }
                if(isset($_SESSION['utm_source'])){
                  if($_GET['utm_source']!=$_SESSION['utm_source']){
                    if(isset($_SESSION['USER_CART'])){
                      unset($_SESSION['USER_CART']);
                      unset($_SESSION['CART_QTY']);
                    }
                    $_SESSION['utm_source']=$source;
                    echo getcity($con,$_SESSION['utm_source']);
                  }else{
                    echo getcity($con,$_SESSION['utm_source']);
                  }
                }else{
                  $_SESSION['utm_source']=$source;
                  echo getcity($con,$_SESSION['utm_source']);
                }
               }else{
                if(isset($_SESSION['utm_source'])){
                  echo getcity($con,$_SESSION['utm_source']);
                }else{
                  echo "Location";
                }
               }
                 
               ?>
                        </div>
                        <i class="uil uil-angle-down icon__14"></i>
                    </div>
                    <div class="location fadeup" id="lcnpnl">
                        <input type="text" placeholder="Search here" id="location_search" oninput="search_city()" />
                        <ul>
                            <?php
                $res=mysqli_query($con,"select * from city");
                while($row=mysqli_fetch_assoc($res)){
            ?>
                            <li>
                                <i class="uil uil-location-point"></i>
                                <a href="index.php?utm_source=<?php echo $row['id']; ?>"
                                    class="lcn-search"><?php echo $row['city_name']; ?></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="rightbox">
                    <ul>
                        <li>
                        <a href="./seller/index.php" style="display: inline-block; padding: 5px 20px; background-color: #006A4E; color: #fff; text-decoration: none; border-radius: 5px; border: 2px solid #006A4E;">
    <!-- Font Awesome Icon within the button -->
    <i class="fas fa-store" style="margin-right: 5px;"></i> <!-- Font Awesome Home Icon -->
    Join as a Seller
</a>
                </li>
                        <li>

                        <li>
                        <a href="./view_news.php" style="display: inline-block; padding: 5px 20px; background-color: #006A4E; color: #fff; text-decoration: none; border-radius: 5px; border: 2px solid #006A4E;">
    <!-- Font Awesome Icon within the button -->
    <i class="fas fa-paper" style="margin-right: 5px;"></i> <!-- Font Awesome Home Icon -->
    News
</a>
                </li>
                        <li>

                            <div>
                            <select id="carSelect" style="padding: 5px; font-size: 13px; border: 0.5px solid #006A4E; border-radius: 7px;">
    <option value="0">Select Application:</option>
    <option value="1">Fertilizer application</option>
    <option value="2">Fertilizer Issue Reporting</option>
    <option value="3">Compensation Claims</option>
    <option value="4">Pest & Disease Monitoring</option>
</select>   </div>
                        </li>
                       
                        <li>
                            <a href="" class="rightlink">
                                <i class="uil uil-gift"></i>
                                Offers
                            </a>
                        </li>
                        <li>
                            <a href="" class="rightlink">
                                <i class="uil uil-question-circle"></i>
                                Help
                            </a>
                        </li>
                        <li>
                            <a href="wishlist.php" class="rightlink wl">
                                <i class="uil uil-heart icon_wishlist"></i>
                                <span class="noti_count1">
                                    <?php
                                        if(isset($_SESSION['USER_LOGIN'])){
                                            $uid=$_SESSION['USER_ID'];
                                            $num=mysqli_num_rows(mysqli_query($con,"select * from wishlist where u_id='$uid'"));
                                            echo $num;
                                        }else{
                                            echo 0;
                                        }
                                    ?>
                                </span>
                            </a>
                        </li>
                        <li class="user">
                            <a href="javascript:void(0)" class="rightlink">
                                <i class="uil uil-user-circle bg" onclick="show_userpanel()">
                                </i>
                            </a>
                            <div class="userpanel fadeup" id="userpanel">
                                <ul>
                                    <li>
                                        <i class="uil uil-chat-bubble-user"></i><a href="myac.php">My Account</a>
                                    </li>
                                    <li><i class="uil uil-box"></i><a href="myac.php">My Orders</a></li>
                                    <li>
                                        <i class="uil uil-heart-alt"></i><a href="wishlist.php">My Wishlist</a>
                                    </li>
                                    <li>
                                        <i class="uil uil-shopping-cart"></i><a href="cart.php">My Cart</a>
                                    </li>
                                    <li>
                                        <i class="uil uil-wallet"></i><a href="wallet.php">My Wallet</a>
                                    </li>
                                    <li>
                                        <i class="uil uil-map-marker-alt"></i><a href="address.php">My Address</a>
                                    </li>
                                    <?php if(isset($_SESSION['USER_LOGIN'])){
                                    ?>
                                    <li onclick="logout()">
                                        <i class="uil uil-signout"></i><a href="javascript:void(0)">Logout</a>
                                    </li>
                                    <?php
                                    }else{
                                    ?>
                                    <li>
                                        <i class="uil uil-signin"></i><a href="auth/v2/">Login</a>
                                    </li>

                                    <?php
                                    } ?>



                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bottom-header">
            <div class="sub-header">
                <div class="hamberger" onclick="sidebar()">
                    <i class="uil uil-bars"></i>
                </div>
                <nav>
                   
                    <?php
                $res=mysqli_query($con,"select * from categories limit 10");
                while($row=mysqli_fetch_assoc($res)){
            ?>
                    <div class="div">
                        <?php
                echo $row['category'];
            ?>
                        <i class="uil uil-angle-down icon__14"></i>
                        <div class="userpanel fadeup" id="userpanel">
                            <ul>
                                <?php 
                    $cid=$row['id'];
                    $res2=mysqli_query($con,"select * from subcategories where cat_id='$cid'");
                    while($row2=mysqli_fetch_assoc($res2)){
                    ?>
                                <li>
                                    <a href="view.php?n=<?php echo $row['id'] ?>&k=&scat=<?php echo $row2['id'] ?>"><?php echo $row2['subcat']; ?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <?php
                }
            ?>
                </nav>
                <div class="cart-right" onclick="control.redirect('cart.php')">
                    <i class="uil uil-shopping-cart-alt"></i>Cart
                </div>
                <div class="srch" onclick="openrss()">
                    <i class="uil uil-search"></i>
                </div>
            </div>
        </div>
    </header>
    <div class="slider" id="sidebar">
        <ul>
            <li class="flex flex-center"><a href=""> Home </a></li>
            <?php
                $res=mysqli_query($con,"select * from categories limit 10");
                while($row=mysqli_fetch_assoc($res)){
            ?>
            <li>
                <span class="flex flex-center" onclick="expand(this)">
                <?php
                echo $row['category'];
            ?>
                    <i class="uil uil-angle-down icon__14"></i>
                </span>
                <ul class="inner-ul">
                <?php 
                    $cid=$row['id'];
                    $res2=mysqli_query($con,"select * from subcategories where cat_id='$cid'");
                    while($row2=mysqli_fetch_assoc($res2)){
                    ?>
                    <li class="inner-li">
                    <a href="view.php?n=<?php echo $row['id'] ?>&k=&scat=<?php echo $row2['id'] ?>"><?php echo $row2['subcat']; ?></a>
                        
                    </li>
                  <?php } ?>
                </ul>
            </li>
            <?php } ?>
        </ul>
    </div>

    <script>
    document.getElementById("carSelect").onchange = function() {
        var selectedValue = this.value;
        if (selectedValue == "1") {
            window.location.href = "./forms/fertilizer_application.php";
        }
        if (selectedValue == "2") {
            window.location.href = "./forms/fertilizer_issue_reporting.php";
        }
        if (selectedValue == "3") {
            window.location.href = "./forms/compensation_claims.php";
        }
        if (selectedValue == "4") {
            window.location.href = "./forms/pest_and_disease_monitoring.php";
        }
    };
</script>
