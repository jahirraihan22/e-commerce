<?php include('layout/header.php'); ?>
<?php
$pro_id = $_GET['pro_id'];
$sql = "SELECT * FROM products where id='$pro_id'";
$pro = $webApps->Select($sql);
$pro_details = $pro->fetch_object(); ?>
<!-- Start Top Search -->
<div class="top-search">
    <div class="container">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" class="form-control" placeholder="Search">
            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
        </div>
    </div>
</div>
<!-- End Top Search -->

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Shop Detail</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">Shop Detail </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Detail  -->
<div class="shop-detail-box-main">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-6">
                <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <?php
                        $sql = "SELECT * from product_images where product_id ='$pro_id'";
                        $img_res = $webApps->Select($sql);
                        while ($img_obj = $img_res->fetch_object()) {
                        ?>
                            <div class="carousel-item <?php if ($img_obj->statuses == 1) {
                                                            echo 'active';
                                                        } ?>"> <img class="d-block w-100" src="../pro_image/<?php echo $img_obj->images ?>" alt="First slide"> </div>
                        <?php } ?>
                    </div>
                    <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                    <ol class="carousel-indicators">
                        <?php
                        $sql = "SELECT * from product_images where product_id ='$pro_id'";
                        $img_res = $webApps->Select($sql);
                        while ($img_obj = $img_res->fetch_object()) {
                            $i = 0;
                        ?>
                            <li data-target="#carousel-example-1" data-slide-to="<?php echo $i++ ?>" class="active">
                                <img class="d-block w-100 img-fluid" src="../pro_image/<?php echo $img_obj->images ?>" alt="" />
                            </li>
                        <?php } ?>
                    </ol>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-6">
                <div class="single-product-details">
                    <h2><?php echo $pro_details->name; ?></h2>
                    <h5> $<?php echo $pro_details->price; ?></h5>
                    <p class="available-stock"><span> More than 20 available / <a href="#">8 sold </a></span>
                        <p>
                            <h4>Short Description:</h4>
                            <p><?php echo $pro_details->description; ?></p>
                            <div class="add-to-btn">
                                <div class="add-comp">
                                    <a class="btn hvr-hover" href="#"><i class="fas fa-heart"></i> Add to wishlist</a>
                                    <a class="btn hvr-hover" href="#"><i class="fas fa-sync-alt"></i> Add to Compare</a>

                                    <a class="btn hvr-hover" href="../functions/logic.php?cart=<?php echo $pro_details->id ?>"><i class="fas fa-sync-alt"></i> ADD TO CART </a>
                                </div>
                                <div class="share-bar">
                                    <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                    <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                                    <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                    <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                                    <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                </div>
                            </div>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Featured Products</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                </div>
                <div class="featured-products-box owl-carousel owl-theme">

                    <?php
                    $sql = "SELECT * from products where brand_id = '$pro_details->brand_id'";
                    $pro_res = $webApps->Select($sql);
                    while ($pro_obj = $pro_res->fetch_object()) {
                        $sql = "SELECT * from product_images where product_id = '$pro_obj->id' and statuses = '1'";
                        $pro_img_res = $webApps->Select($sql);
                        while ($pro_img_obj = $pro_img_res->fetch_object()) {
                    ?>
                            <div class="item">
                                <div class="products-single fix">
                                    <div class="box-img-hover">
                                        <img src="../pro_image/<?php echo $pro_img_obj->images ?>" class="img-fluid" alt="Image">
                                        <div class="mask-icon">
                                            <ul>
                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                            <a class="cart" href="#">Add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="why-text">
                                        <h4>Lorem ipsum dolor sit amet</h4>
                                        <h5> $9.79</h5>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Cart -->

<!-- Start Instagram Feed  -->
<div class="instagram-box">
    <div class="main-instagram owl-carousel owl-theme">
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-01.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <!-- <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-02.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-03.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-04.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-05.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-06.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-07.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-08.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-09.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="ins-inner-box">
                <img src="images/instagram-img-05.jpg" alt="" />
                <div class="hov-in">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div> -->
    </div>
</div>
<!-- End Instagram Feed  -->


<?php include('layout/footer.php'); ?>