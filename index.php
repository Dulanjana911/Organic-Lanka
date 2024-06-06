<?php require('require/top.php'); ?>

<div class="main-banner-slider">
    <div class="container mx-auto">
        <div class="row">
            <div class="owl-carousel owl-theme main-slider owl-one">
                <div class="item">
                    <img src="assets/images/sample/offer-1.jpg" alt="banner" />
                    <div class="detail">
                        <h5>20% off</h5>
                        <h5>Get it now</h5>
                        <h5>lorem ispum</h5>
                    </div>
                </div>
                <div class="item">
                    <img src="assets/images/sample/offer-1.jpg" alt="banner" />
                    <div class="detail">
                        <h5>20% off</h5>
                        <h5>Get it now</h5>
                        <h5>lorem ispum</h5>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>


<section class="defaultPadding mt4">
    <div class="container mrlAuto">
        <div class="heading">
            <span>Shop By</span>
            <h2>Categories</h2>
        </div>
        <div class="row mt3 ct-row">
            <div class="owl-carousel owl-theme cate-slider">
                <?php
                $res = mysqli_query($con, "select * from categories");
                while ($row = mysqli_fetch_assoc($res)) {
                ?>
                    <div class="item">
                        <a class="category-Item" href="view.php?n=<?php echo $row['id'] ?>&k=">
                            <div class="cate-img">
                                <img src="assets/images/svg/icon-7.svg" alt="" />
                            </div>
                            <h4><?php
                                echo $row['category'];
                                ?></h4>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php
if (isset($_GET['utm_source']) || isset($_SESSION['utm_source'])) {
    $s = '';
    if (isset($_SESSION['utm_source']) && !isset($_GET['utm_source'])) {
        $s = $_SESSION['utm_source'];
    } else {
        $s = $_GET['utm_source'];
    }
    verify_source($con, $s);
    $featured = get_featured_products($con);
    //  prx($featured);
?>
    <section class="defaultPadding mt4">
        <div class="container mrlAuto">
            <div class="heading">
                <span>For You</span>
                <h2>Top Featured Products</h2>
            </div>
            <div class="row mt3 ct-row">
                <div class="owl-carousel owl-theme product-slider">
                    <?php
                    if (count($featured) > 0) {
                        foreach ($featured as $product) {
                    ?>
                            <div class="item">
                                <div class="productBox">
                                    <a href="javascript:void(0)" class="product-image">
                                        <img src="media/product/<?php echo $product['img1']; ?>" alt="product" />
                                        <div class="topOption">
                                            <span class="offer"><?php
                                                                $offn = ($product['fa'] * 100) / $product['price'];
                                                                $off = round(100 - $offn);
                                                                echo $off . '%';
                                                                ?></span>
                                            <?php
                                            if (!isset($_SESSION['USER_LOGIN'])) {
                                            ?>
                                                <span class="wishlist" onclick="addwish(<?php echo $product['id']; ?>)">
                                                    <i class="uil uil-heart"></i>
                                                </span>
                                                <?php
                                            } else {
                                                $pid = $product['id'];
                                                $uid = $_SESSION['USER_ID'];
                                                $n = mysqli_num_rows(mysqli_query($con, "select * from wishlist where u_id='$uid' and p_id='$pid'"));
                                                if ($n > 0) {
                                                ?>
                                                    <span class="wishlist" onclick="gowish()">
                                                        <i class="uil uil-heart"></i>
                                                    </span>
                                                <?php
                                                } else {
                                                ?>
                                                    <span class="wishlist" onclick="addwish(<?php echo $product['id']; ?>)">
                                                        <i class="uil uil-heart"></i>
                                                    </span>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </a>
                                    <div class="product-detail">
                                        <p><?php
                                            if ($product['qty'] > 0) {
                                                echo "Available(In Stock)";
                                            } else {
                                                echo "Unavailable(Out of Stock)";
                                            } ?></p>
                                        <h4 style="cursor:pointer" onclick="control.redirect('product_detail.php?pid=<?php echo $product['id'] ?>')"><?php echo $product['product_name']; ?></h4>
                                        <div class="price">Rs. <?php echo $product['fa']; ?>
                                            <span>Rs. <?php echo $product['price']; ?></span>
                                        </div>
                                        <div class="cartqt">
                                            <?php

                                            if (!isset($_SESSION['USER_LOGIN'])) {
                                                if (isset($_SESSION['USER_CART'])) {
                                                    if (in_array($product['id'], $_SESSION['USER_CART'])) {
                                                        $index = array_search($product['id'], $_SESSION['USER_CART']);
                                            ?>
                                                        <div class="quantity buttons_added">
                                                            <input type="button" value="-" class="minus minus-btn" onclick="decrement(this)" />
                                                            <input type="number" name="quantity" value="<?php echo $_SESSION['CART_QTY'][$index]; ?>" class="qty-text" />
                                                            <input type="button" value="+" class="plus plus-btn" onclick="increment(this)" />
                                                        </div>
                                                        <div class="ct-icon" onclick="go_to_cart()">
                                                            <i class="uil uil-shopping-cart-alt"></i>
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="quantity buttons_added">
                                                            <input type="button" value="-" class="minus minus-btn" onclick="decrement(this)" />
                                                            <input type="number" name="quantity" value="1" class="qty-text" />
                                                            <input type="button" value="+" class="plus plus-btn" onclick="increment(this)" />
                                                        </div>
                                                        <div class="ct-icon" onclick="add_cart(<?php echo $product['id']; ?>,this)">
                                                            <i class="uil uil-shopping-cart-alt"></i>
                                                        </div>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <div class="quantity buttons_added">
                                                        <input type="button" value="-" class="minus minus-btn" onclick="decrement(this)" />
                                                        <input type="number" name="quantity" value="1" class="qty-text" />
                                                        <input type="button" value="+" class="plus plus-btn" onclick="increment(this)" />
                                                    </div>
                                                    <div class="ct-icon" onclick="add_cart(<?php echo $product['id']; ?>,this)">
                                                        <i class="uil uil-shopping-cart-alt"></i>
                                                    </div>
                                                <?php
                                                }
                                            } else {
                                                $p_idd = $product['id'];
                                                $u_id = $_SESSION['USER_ID'];
                                                $query = "select cart.u_id,cart_detail.qty from cart,cart_detail where cart.u_id='$u_id' and cart_detail.p_id='$p_idd' and cart_detail.cart_id=cart.id";
                                                $rs = mysqli_query($con, $query);
                                                $i = mysqli_num_rows($rs);
                                                if ($i > 0) {
                                                    $g = mysqli_fetch_assoc($rs);
                                                ?>

                                                    <div class="quantity buttons_added">
                                                        <input type="button" value="-" class="minus minus-btn" onclick="decrement(this)" />
                                                        <input type="number" name="quantity" value="<?php echo $g['qty'] ?>" class="qty-text" />
                                                        <input type="button" value="+" class="plus plus-btn" onclick="increment(this)" />
                                                    </div>
                                                    <div class="ct-icon" onclick="go_to_cart()">
                                                        <i class="uil uil-shopping-cart-alt"></i>
                                                    </div>

                                                <?php
                                                } else {
                                                ?>
                                                    <div class="quantity buttons_added">
                                                        <input type="button" value="-" class="minus minus-btn" onclick="decrement(this)" />
                                                        <input type="number" name="quantity" value="1" class="qty-text" />
                                                        <input type="button" value="+" class="plus plus-btn" onclick="increment(this)" />
                                                    </div>
                                                    <div class="ct-icon" onclick="add_cart(<?php echo $product['id']; ?>,this)">
                                                        <i class="uil uil-shopping-cart-alt"></i>
                                                    </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
    </section>
    <section class="defaultPadding mt4">
        <div class="container mrlAuto">
            <div class="heading">
                <span>Offers</span>
                <h2>Best Values</h2>
            </div>
            <div class="row mt3 ct-row banner-row">
                <div class="row1">
                    <div class="ban">
                        <a href="#">
                            <img src="assets/images/banner/offer-1.jpg" alt="banner1" />
                        </a>
                    </div>
                    <div class="ban">
                        <a href="#">
                            <img src="assets/images/banner/offer-2.jpg" alt="banner1" />
                        </a>
                    </div>
                    <div class="ban">
                        <a href="#">
                            <img src="assets/images/banner/offer-3.jpg" alt="banner1" />
                        </a>
                    </div>
                </div>
                <div class="row1">
                    <a href="#" class="long-banner">
                        <img src="assets/images/banner/offer-4.jpg" alt="banner1" />
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="defaultPadding mt4">
        <div class="container mrlAuto">
            <div class="heading">
                <span>For You</span>
                <h2> Fresh Products</h2>
            </div>
            <div class="row mt3 ct-row">
                <div class="owl-carousel owl-theme product-slider">
                    <?php
                    if (count($featured) > 0) {
                        foreach ($featured as $product) {
                    ?>
                            <div class="item">
                                <div class="productBox">
                                    <a href="javascript:void(0)" class="product-image">
                                        <img src="media/product/<?php echo $product['img1']; ?>" alt="product" />
                                        <div class="topOption">
                                            <span class="offer"><?php
                                                                $offn = ($product['fa'] * 100) / $product['price'];
                                                                $off = round(100 - $offn);
                                                                echo $off . '%';
                                                                ?></span>
                                            <?php
                                            if (!isset($_SESSION['USER_LOGIN'])) {
                                            ?>
                                                <span class="wishlist" onclick="addwish(<?php echo $product['id']; ?>)">
                                                    <i class="uil uil-heart"></i>
                                                </span>
                                                <?php
                                            } else {
                                                $pid = $product['id'];
                                                $uid = $_SESSION['USER_ID'];
                                                $n = mysqli_num_rows(mysqli_query($con, "select * from wishlist where u_id='$uid' and p_id='$pid'"));
                                                if ($n > 0) {
                                                ?>
                                                    <span class="wishlist" onclick="gowish()">
                                                        <i class="uil uil-heart"></i>
                                                    </span>
                                                <?php
                                                } else {
                                                ?>
                                                    <span class="wishlist" onclick="addwish(<?php echo $product['id']; ?>)">
                                                        <i class="uil uil-heart"></i>
                                                    </span>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </a>
                                    <div class="product-detail">
                                        <p><?php
                                            if ($product['qty'] > 0) {
                                                echo "Available(In Stock)";
                                            } else {
                                                echo "Unavailable(Out of Stock)";
                                            } ?></p>
                                        <h4 style="cursor:pointer" onclick="control.redirect('product_detail.php?pid=<?php echo $product['id'] ?>')"><?php echo $product['product_name']; ?></h4>
                                        <div class="price">Rs. <?php echo $product['fa']; ?>
                                            <span>Rs. <?php echo $product['price']; ?></span>
                                        </div>
                                        <div class="cartqt">
                                            <?php

                                            if (!isset($_SESSION['USER_LOGIN'])) {
                                                if (isset($_SESSION['USER_CART'])) {
                                                    if (in_array($product['id'], $_SESSION['USER_CART'])) {
                                                        $index = array_search($product['id'], $_SESSION['USER_CART']);
                                            ?>
                                                        <div class="quantity buttons_added">
                                                            <input type="button" value="-" class="minus minus-btn" onclick="decrement(this)" />
                                                            <input type="number" name="quantity" value="<?php echo $_SESSION['CART_QTY'][$index]; ?>" class="qty-text" />
                                                            <input type="button" value="+" class="plus plus-btn" onclick="increment(this)" />
                                                        </div>
                                                        <div class="ct-icon" onclick="go_to_cart()">
                                                            <i class="uil uil-shopping-cart-alt"></i>
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="quantity buttons_added">
                                                            <input type="button" value="-" class="minus minus-btn" onclick="decrement(this)" />
                                                            <input type="number" name="quantity" value="1" class="qty-text" />
                                                            <input type="button" value="+" class="plus plus-btn" onclick="increment(this)" />
                                                        </div>
                                                        <div class="ct-icon" onclick="add_cart(<?php echo $product['id']; ?>,this)">
                                                            <i class="uil uil-shopping-cart-alt"></i>
                                                        </div>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <div class="quantity buttons_added">
                                                        <input type="button" value="-" class="minus minus-btn" onclick="decrement(this)" />
                                                        <input type="number" name="quantity" value="1" class="qty-text" />
                                                        <input type="button" value="+" class="plus plus-btn" onclick="increment(this)" />
                                                    </div>
                                                    <div class="ct-icon" onclick="add_cart(<?php echo $product['id']; ?>,this)">
                                                        <i class="uil uil-shopping-cart-alt"></i>
                                                    </div>
                                                <?php
                                                }
                                            } else {
                                                $p_idd = $product['id'];
                                                $u_id = $_SESSION['USER_ID'];
                                                $query = "select cart.u_id,cart_detail.qty from cart,cart_detail where cart.u_id='$u_id' and cart_detail.p_id='$p_idd' and cart_detail.cart_id=cart.id";
                                                $rs = mysqli_query($con, $query);
                                                $i = mysqli_num_rows($rs);
                                                if ($i > 0) {
                                                    $g = mysqli_fetch_assoc($rs);
                                                ?>

                                                    <div class="quantity buttons_added">
                                                        <input type="button" value="-" class="minus minus-btn" onclick="decrement(this)" />
                                                        <input type="number" name="quantity" value="<?php echo $g['qty'] ?>" class="qty-text" />
                                                        <input type="button" value="+" class="plus plus-btn" onclick="increment(this)" />
                                                    </div>
                                                    <div class="ct-icon" onclick="go_to_cart()">
                                                        <i class="uil uil-shopping-cart-alt"></i>
                                                    </div>

                                                <?php
                                                } else {
                                                ?>
                                                    <div class="quantity buttons_added">
                                                        <input type="button" value="-" class="minus minus-btn" onclick="decrement(this)" />
                                                        <input type="number" name="quantity" value="1" class="qty-text" />
                                                        <input type="button" value="+" class="plus plus-btn" onclick="increment(this)" />
                                                    </div>
                                                    <div class="ct-icon" onclick="add_cart(<?php echo $product['id']; ?>,this)">
                                                        <i class="uil uil-shopping-cart-alt"></i>
                                                    </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
    </section>
    <section class="defaultPadding mt4">
        <div class="container mrlAuto">
            <div class="heading">
                <span>For You</span>
                <h2>New Products</h2>
            </div>
            <div class="row mt3 ct-row">
                <div class="owl-carousel owl-theme product-slider">
                    <?php
                    if (count($featured) > 0) {
                        foreach ($featured as $product) {
                    ?>
                            <div class="item">
                                <div class="productBox">
                                    <a href="javascript:void(0)" class="product-image">
                                        <img src="media/product/<?php echo $product['img1']; ?>" alt="product" />
                                        <div class="topOption">
                                            <span class="offer"><?php
                                                                $offn = ($product['fa'] * 100) / $product['price'];
                                                                $off = round(100 - $offn);
                                                                echo $off . '%';
                                                                ?></span>
                                            <?php
                                            if (!isset($_SESSION['USER_LOGIN'])) {
                                            ?>
                                                <span class="wishlist" onclick="addwish(<?php echo $product['id']; ?>)">
                                                    <i class="uil uil-heart"></i>
                                                </span>
                                                <?php
                                            } else {
                                                $pid = $product['id'];
                                                $uid = $_SESSION['USER_ID'];
                                                $n = mysqli_num_rows(mysqli_query($con, "select * from wishlist where u_id='$uid' and p_id='$pid'"));
                                                if ($n > 0) {
                                                ?>
                                                    <span class="wishlist" onclick="gowish()">
                                                        <i class="uil uil-heart"></i>
                                                    </span>
                                                <?php
                                                } else {
                                                ?>
                                                    <span class="wishlist" onclick="addwish(<?php echo $product['id']; ?>)">
                                                        <i class="uil uil-heart"></i>
                                                    </span>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </a>
                                    <div class="product-detail">
                                        <p><?php
                                            if ($product['qty'] > 0) {
                                                echo "Available(In Stock)";
                                            } else {
                                                echo "Unavailable(Out of Stock)";
                                            } ?></p>
                                        <h4 style="cursor:pointer" onclick="control.redirect('product_detail.php?pid=<?php echo $product['id'] ?>')"><?php echo $product['product_name']; ?></h4>
                                        <div class="price">Rs. <?php echo $product['fa']; ?>
                                            <span>Rs. <?php echo $product['price']; ?></span>
                                        </div>
                                        <div class="cartqt">
                                            <?php

                                            if (!isset($_SESSION['USER_LOGIN'])) {
                                                if (isset($_SESSION['USER_CART'])) {
                                                    if (in_array($product['id'], $_SESSION['USER_CART'])) {
                                                        $index = array_search($product['id'], $_SESSION['USER_CART']);
                                            ?>
                                                        <div class="quantity buttons_added">
                                                            <input type="button" value="-" class="minus minus-btn" onclick="decrement(this)" />
                                                            <input type="number" name="quantity" value="<?php echo $_SESSION['CART_QTY'][$index]; ?>" class="qty-text" />
                                                            <input type="button" value="+" class="plus plus-btn" onclick="increment(this)" />
                                                        </div>
                                                        <div class="ct-icon" onclick="go_to_cart()">
                                                            <i class="uil uil-shopping-cart-alt"></i>
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="quantity buttons_added">
                                                            <input type="button" value="-" class="minus minus-btn" onclick="decrement(this)" />
                                                            <input type="number" name="quantity" value="1" class="qty-text" />
                                                            <input type="button" value="+" class="plus plus-btn" onclick="increment(this)" />
                                                        </div>
                                                        <div class="ct-icon" onclick="add_cart(<?php echo $product['id']; ?>,this)">
                                                            <i class="uil uil-shopping-cart-alt"></i>
                                                        </div>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <div class="quantity buttons_added">
                                                        <input type="button" value="-" class="minus minus-btn" onclick="decrement(this)" />
                                                        <input type="number" name="quantity" value="1" class="qty-text" />
                                                        <input type="button" value="+" class="plus plus-btn" onclick="increment(this)" />
                                                    </div>
                                                    <div class="ct-icon" onclick="add_cart(<?php echo $product['id']; ?>,this)">
                                                        <i class="uil uil-shopping-cart-alt"></i>
                                                    </div>
                                                <?php
                                                }
                                            } else {
                                                $p_idd = $product['id'];
                                                $u_id = $_SESSION['USER_ID'];
                                                $query = "select cart.u_id,cart_detail.qty from cart,cart_detail where cart.u_id='$u_id' and cart_detail.p_id='$p_idd' and cart_detail.cart_id=cart.id";
                                                $rs = mysqli_query($con, $query);
                                                $i = mysqli_num_rows($rs);
                                                if ($i > 0) {
                                                    $g = mysqli_fetch_assoc($rs);
                                                ?>

                                                    <div class="quantity buttons_added">
                                                        <input type="button" value="-" class="minus minus-btn" onclick="decrement(this)" />
                                                        <input type="number" name="quantity" value="<?php echo $g['qty'] ?>" class="qty-text" />
                                                        <input type="button" value="+" class="plus plus-btn" onclick="increment(this)" />
                                                    </div>
                                                    <div class="ct-icon" onclick="go_to_cart()">
                                                        <i class="uil uil-shopping-cart-alt"></i>
                                                    </div>

                                                <?php
                                                } else {
                                                ?>
                                                    <div class="quantity buttons_added">
                                                        <input type="button" value="-" class="minus minus-btn" onclick="decrement(this)" />
                                                        <input type="number" name="quantity" value="1" class="qty-text" />
                                                        <input type="button" value="+" class="plus plus-btn" onclick="increment(this)" />
                                                    </div>
                                                    <div class="ct-icon" onclick="add_cart(<?php echo $product['id']; ?>,this)">
                                                        <i class="uil uil-shopping-cart-alt"></i>
                                                    </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
    </section>
<?php
} else {

?>

<section class="defaultPadding mt4 ml4">
    <div class="container mrlAuto">
        <div class="heading">
            <h2>All Products</h2>
            <br>
            <div class="outerbox" style="display: flex; flex-wrap: wrap; justify-content: flex-start; width: 100%;">

                <?php
                // Call the function to get all products
                $all_products = get_all_products($con);

                // Check if any products are found
                if (count($all_products) > 0) {
                    // Display products
                    $counter = 0;
                    foreach ($all_products as $product) {
                        $counter++;
                ?>
                <div class="product" style="background: #fff; border-radius: 12px; box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); width: 23%; margin-bottom: 20px; margin-right: 2%; box-sizing: border-box;">
                    <div class="image" style="position: relative; overflow: hidden; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                        <img src="media/product/<?php echo $product['img1'] ?>" alt="product" style="width: 100%; height: auto; display: block;">
                    </div>
                    <div class="detail" style="padding: 10px;">
                        <h4 style="margin: 0; font-size: 16px; font-weight: bold; color: #333;"><?php echo $product['product_name'] ?></h4>
                        <p class="price" style="margin: 5px 0 10px; font-size: 14px; color: #777;">Rs. <span class="ftrp" style="font-weight: bold;"><?php echo $product['fa'] ?></span></p>
                        <div style="display: flex; align-items: center; justify-content: space-between;">
                            <a href="product_detail.php?pid=<?php echo $product['id']; ?>&type='detail'&show='2'" style="text-decoration: none; color: #555;"><i class="fa fa-info-circle" style="margin-right: 5px;"></i>Details</a>
                            <a href="product_detail.php?pid=<?php echo $product['id']; ?>" style="background-color: #4CAF50; color: white; padding: 8px 12px; border: none; border-radius: 6px; cursor: pointer; text-decoration: none; display: inline-block;"><i class="fa fa-cart-plus" style="margin-right: 5px;"></i>View Product</a>
                        </div>
                    </div>
                </div>

                <?php
                        // Break line after every 4 products
                        if ($counter % 4 == 0) {
                            echo '<div style="width: 100%;"></div>'; // Line break
                        }
                    }
                } else {
                    echo "<h1>Nothing Found</h1>";
                }
                ?>

            </div>
        </div>
    </div>
</section>


            </div>
        </div>
    </div>
</section>

<?php

}
?>


<?php require('require/foot.php'); ?>
<?php require('require/csOwl.php'); ?>
<?php require('require/last.php'); ?>