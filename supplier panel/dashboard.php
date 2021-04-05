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
                    <li><span style="color: #fff">NAME<p>(ADMIN)</p></span></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="container-fluid bg-color" style="margin-top: 50px;">
    <div class="row row-no-gutters ">
        <div class="col-md-3 col-sm-4 col-xs-4 add-pro-container">
            <div class="col-md-12 col-sm-12 col-xs-12 div-add-pro">
                <div id="add-pro-btn" class="add-pro-btn"><span class="add-pro-span">Add Product</span></div>
            </div>
        </div>
        <div class="col-md-9 col-sm-8 col-xs-8 inp-div-addpro">
            <div id="add-pro" class="col-md-6 col-sm-6 col-xs-12 div-inp-addpro">
                <form action="../functions/logic.php" method="post" enctype="multipart/form-data">
                    <div class="col-md-12 col-sm-12 col-xs-12 custom-div-for-add-pro">
                        <div class="form-group">
                            <label for="product">Product name:</label>
                            <input type="text" name="name" class="form-control" id="add-product-inp" placeholder="product name">
                        </div>

                        <div class="form-group">
                            <label for="brand">Select Brand:</label>
                            <div class="custom-select">
                                <select id="select-brand-in-pro" name="select_brand_in_pro" class="select-option">
                                    <option value="0">Select Brand</option>
                                    <?php
                                    $sql = "SELECT * FROM brands";
                                    $all_brand_resourse = $webApps->Select($sql);
                                    while ($all_brand_obj = $all_brand_resourse->fetch_object()) {
                                        echo "<option value='$all_brand_obj->id'>" . $all_brand_obj->name . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" class="form-control" id="add-quantity-inp" placeholder="quantity" name="quantity">
                        </div>

                        <div class="form-group">
                            <label for="brand">Select Unit:</label>
                            <div class="custom-select">
                                <select id="select-unit-in-pro" name="select_unit_in_pro" class="select-option">
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
                            <textarea rows="4" cols="50" class="form-control" id="add-desc-inp" placeholder="description" name="description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">Price (per unit):</label>
                            <input type="number" class="form-control" id="add-price-inp" placeholder="set price" name="price">
                        </div>

                        <div class="form-group">
                            <label for="dImage">Default IMAGE:</label>
                            <input type="file" class="form-control" name="image1">
                        </div>

                        <div class="form-group">
                            <label for="subImage1">Sub IMAGE:</label>
                            <input type="file" class="form-control" name="image2">
                        </div>


                        <div class="form-group">
                            <label for="subImage1">Sub IMAGE:</label>
                            <input type="file" class="form-control" name="image3">
                        </div>

                        <button id="save-pro-btn" name="product_submit" type="submit" class="btn btn-primary save-btn-addpro save-brand-btn">Add Product</button>
                    </div>
                    <!-- Modal -->
                </form>
            </div>

            <?php
            if (isset($_SESSION["product_insert_message"])) {
                echo "<div class='alert alert-success pop-up'>";
                echo $_SESSION["product_insert_message"];
                unset($_SESSION["product_insert_message"]);
                echo "</div>";
            }

            if (isset($_SESSION["delete_message"])) {
                echo "<div class='alert alert-success pop-up'>";
                echo $_SESSION["delete_message"];
                unset($_SESSION["delete_message"]);
                echo "</div>";
            }

            if (isset($_SESSION["product_errors"])) {
                echo "<div class='alert alert-warning pop-up'>";
                echo $_SESSION["product_errors"];
                unset($_SESSION["product_errors"]);
                echo "</div>";
            }
            if (isset($_SESSION["pro_update_message"])) {
                echo "<div class='alert alert-success pop-up'>";
                echo $_SESSION["pro_update_message"];
                unset($_SESSION["pro_update_message"]);
                echo "</div>";
            }
            ?>
        </div>
    </div>
</div>
<div class="container-fluid bg-color" style="margin-top: 50px;">
    <div class="row row-no-gutters customize-row">
        <div class="col-md-12 col-sm-12 col-xs-12 ">
            <table class="table table-striped table-bordered data-table" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Brand</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = 'SELECT * FROM products';
                    $all_products_resources = $webApps->Select($sql);
                    while ($all_products_obj = $all_products_resources->fetch_object()) { ?>

                        <tr>
                            <td><?php echo $all_products_obj->id ?></td>
                            <td><?php echo $all_products_obj->name ?></td>
                            <td><?php echo $all_products_obj->category_id ?></td>
                            <td><?php echo $all_products_obj->subcat_id ?></td>
                            <td><?php echo $all_products_obj->brand_id ?></td>
                            <td><?php echo $all_products_obj->quantity ?></td>
                            <td><?php echo $all_products_obj->price ?></td>
                            <td><?php echo $all_products_obj->description ?></td>
                            <td>
                                <a href=""><i class="fa fa-eye"></i></a>
                                <a href='../functions/logic.php?delete_pro_id=<?php echo "$all_products_obj->id" ?>'><i class='fa fa-trash action-icon'></i></a>
                                <a href='pro_edit.php?pro_id=<?php echo "$all_products_obj->id "?>'> <i class='fas fa-edit action-icon'></i></a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
            <span class="timeStamp"></span>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>