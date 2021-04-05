<?php include('layout.php');  ?>

<div class="container-fluid menu-head" style="padding: 0px;">
    <nav class="navbar navbar-default" style="border: none !important">
        <div class="container-fluid" style="padding: 0px;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="../images/logo.png" style="width: 50px;height: 50px; margin-top: -15px"></a>
                <!------ problem 1: in LOGO -------->
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#"><i class="fa fa-home header-menu-icons" style="margin-right: 6px;"></i>Home</a></li>
                    <li class="active"><a href="dashboard.php"><i class="fa fa-dashboard header-menu-icons" style="margin-right: 6px;"></i>Dashboard<span class="sr-only">(current)</span>s</a></li>
                    <li><a href="#"><i class="fas fa-user header-menu-icons" style="margin-right: 6px;"></i>Profile</a></li>
                    <li><a href="order.php"><i class="fa fa-list header-menu-icons" style="margin-right: 6px;"></i>Order List </a></li>
                    <li><a href="../functions/logic.php?logout=true"><i class="fa fa-sign-out header-menu-icons" style="margin-right: 6px;"></i>Log Out</a></li>
                    <li><span style="color: #fff">User<p>(ADMIN)</p></span></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="container-fluid bg-color" style="margin-top: 50px;">
    <div class="row row-no-gutters ">
        <div class="col-md-12 col-sm-12 col-xs-12 inp-div-editpro">
            <div class="col-md-6 col-sm-6 col-xs-12 div-inp-editpro">
                <?php
                if (isset($_GET['pro_id'])) {
                    $id = $_GET['pro_id'];
                    $sql = "SELECT * FROM products where id='$id'";
                    $resource = $webApps->Select($sql);
                    $all_products_obj = $resource->fetch_object();
                }
                ?>
                <form action="../functions/logic.php" method="post" enctype="multipart/form-data">
                    <div class="col-md-12 col-sm-12 col-xs-12 custom-div-for-add-pro">
                        <div class="form-group">
                            <label for="product">Product name:</label>
                            <input type="text" name="updated_name" class="form-control" placeholder="product name" value="<?php echo $all_products_obj->name; ?>">
                        </div>
                        <input type="hidden" name="updated_pro_id" value="<?php echo $all_products_obj->id; ?>">

                        <div class="form-group">
                            <label for="brand">Select Brand:</label>
                            <div class="custom-select">
                                <select name="updated_select_brand_in_pro" class="select-option">
                                    <option value="0">Select Brand</option>
                                    <?php
                                    $sql = "SELECT * FROM brands";
                                    $all_brand_resourse = $webApps->Select($sql);
                                    while ($all_brand_obj = $all_brand_resourse->fetch_object()) {

                                    ?>
                                        <option value="<?php echo $all_brand_obj->id; ?>" <?php if ($all_brand_obj->id == $all_products_obj->brand_id) {
                                                                                                echo " selected";
                                                                                            }
                                                                                            ?>><?php echo $all_brand_obj->name; ?></option>;
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" class="form-control" placeholder="quantity" name="updated_quantity" value="<?php echo $all_products_obj->quantity; ?>">
                        </div>

                        <div class="form-group">
                            <label for="brand">Select Unit:</label>
                            <div class="custom-select">
                                <select name="updated_select_unit_in_pro" class="select-option">
                                    <option value="0">Select Unit</option>
                                    <option value="1">kg</option>
                                    <option value="2">lb</option>
                                    <option value="3">gm</option>
                                    <option value="4">meter</option>
                                    <option value="5">feet</option>
                                    <option value="6">piece</option>
                                    <option value="7">liter</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea rows="4" cols="50" class="form-control" placeholder="description" name="updated_description"><?php echo $all_products_obj->description; ?>"</textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">Price (per unit):</label>
                            <input type="number" class="form-control" placeholder="set price" name="updated_price" value="<?php echo $all_products_obj->price; ?>">
                        </div>

                        <?php
                        if (isset($_GET['pro_id'])) {
                            $id = $_GET['pro_id'];
                            $sql = "SELECT * FROM product_images where product_id='$id'";
                            $img_resource = $webApps->Select($sql);
                            $all_products_img = $img_resource->fetch_object();
                        }
                        ?>
                        <div class="form-group">
                            <label for="dImage">Default Image:</label>
                            <input type="file" class="form-control" name="image1">
                            <img src="../pro_image/<?php echo $all_products_img->images; ?>">
                            <input type="hidden" value="<?php echo $all_products_img->images; ?>" name="img1">
                        </div>

                        <div class="form-group">
                            <label for="subImage1">Sub Image:</label>
                            <input type="file" class="form-control" name="image2">
                            <?php echo $all_products_img->images; ?>
                            <input type="hidden" value="<?php echo $all_products_img->images; ?>" name="img2">
                        </div>

                        <div class="form-group">
                            <label for="subImage1">Sub Image:</label>
                            <input type="file" class="form-control" name="image3">
                            <?php echo $all_products_img->images; ?>
                            <input type="hidden" value="<?php echo $all_products_img->images; ?>" name="img3">
                        </div>

                        <button name="product_update" type="submit" class="btn btn-primary save-btn-addpro save-brand-btn">UPDATE</button>
                    </div>
                    <!-- Modal -->
                </form>

            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>