<?php include('layout.php'); ?>
<div class="container-fluid bg-color" style="margin-top: 50px;">
    <div class="row row-no-gutters addpro-custom-row">
        <div class="col-md-3 col-sm-4 col-xs-4 add-pro-container">
            <div class="col-md-12 col-sm-12 col-xs-12 div-add-pro">
                <div id="add-cat-btn" class="add-pro-btn"><span class="add-pro-span">Add Category</span></div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 div-add-pro">
                <div id="add-subcat-btn" class="add-pro-btn"><span class="add-pro-span">Add Sub-category</span></div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 div-add-pro">
                <div id="add-brand-btn" class="add-pro-btn"><span class="add-pro-span">Add Brand</span></div>
            </div>
        </div>
        <div class="col-md-9 col-sm-8 col-xs-8 inp-div-addpro">
            <div id="add-cat" class="col-md-6 col-sm-6 col-xs-12 div-inp-addpro">
                <form action="../functions/logic.php" method="post">
                    <!-----------------------------------TO DO onsubmit----------------------->
                    <div class="col-md-12 col-sm-12 col-xs-12 custom-div-for-add-pro">
                        <div class="form-group">
                            <label for="category">Category name:</label>
                            <input type="text" class="form-control" id="add-category" name="category_name" placeholder="category name">
                        </div>
                        <button id="save-cat-btn" type="submit" name="category_insert_btn" class="btn btn-primary save-btn-addpro save-cat-btn">Add Category</button>
                    </div>
                    <!-- Modal -->
                </form>
            </div>
            <div id="add-subcat" class="col-md-6 col-sm-6 col-xs-12 div-inp-addpro">
                <form action="../functions/logic.php" method="post">
                    <div class="col-md-12 col-sm-12 col-xs-12 custom-div-for-add-pro">
                        <div class="form-group">
                            <label for="subcategory">Sub-Category name:</label>
                            <input name="subcategory_name" type="text" class="form-control" id="add-subcat-inp" placeholder="subcategory name">
                        </div>
                        <div class="form-group">
                            <label for="category">Select Category:</label>
                            <div class="custom-select">
                                <select name="select_cat_in_subcat" id="select-cat-in-subcat" class="select-option">
                                    <option value="0">Select Category</option>
                                    <?php
                                    $sql = "SELECT * FROM categories";
                                    $all_Category_resourse = $webApps->Select($sql);
                                    while ($all_Category_obj = $all_Category_resourse->fetch_object()) {
                                        echo "<option value='$all_Category_obj->id'>" . $all_Category_obj->name . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <button name="save_subcat_btn" id="save-subcat-btn" type="submit" class="btn btn-primary save-btn-addpro save-subcat-btn">Add Subcategory</button>
                    </div>
                    <!-- Modal -->
                </form>
            </div>
            <div id="add-brand" class="col-md-6 col-sm-6 col-xs-12 div-inp-addpro">
                <form action="../functions/logic.php" method="post">
                    <div class="col-md-12 col-sm-12 col-xs-12 custom-div-for-add-pro">
                        <div class="form-group">
                            <label for="subcategory">Brand name:</label>
                            <input name="brand_name" type="text" class="form-control" id="add-brand-inp" placeholder="brand name">
                        </div>
                        <div class="form-group">
                            <label for="category">Select Category:</label>
                            <div class="custom-select">
                                <select name="category_in_brand" id="select-cat-in-brand" class="select-option">
                                    <option value="0">Select Category</option>
                                    <?php
                                    $sql = "SELECT * FROM categories";
                                    $all_Category_resourse = $webApps->Select($sql);
                                    while ($all_Category_obj = $all_Category_resourse->fetch_object()) {
                                        echo "<option value='$all_Category_obj->id'>" . $all_Category_obj->name . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category">Select Sub-category:</label>
                            <div class="custom-select">
                                <select name="subcategory_in_brand" id="select-subcat-in-brand" class="select-option">
                                    <option value="0">Select Sub-Category</option>
                                    <?php
                                    $sql = "SELECT * FROM sub_categories";
                                    $all_subcategory_resourse = $webApps->Select($sql);
                                    while ($all_subcategory_obj = $all_subcategory_resourse->fetch_object()) {
                                        echo "<option value='$all_subcategory_obj->id'>" . $all_subcategory_obj->name . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <button id="save-brand-btn" name="brand_insert_btn" type="submit" class="btn btn-primary save-btn-addpro save-brand-btn">Add Brand</button>
                    </div>
                    <!-- Modal -->
                </form>
            </div>

            <?php
            if (isset($_SESSION["category_insert_message"])) {
                echo "<div class='alert alert-success pop-up'>";
                echo $_SESSION["category_insert_message"];
                unset($_SESSION["category_insert_message"]);
                echo "</div>";
            }

            if (isset($_SESSION["category_errors"])) {
                echo "<div class='alert alert-warning pop-up'>";
                echo $_SESSION["category_errors"];
                unset($_SESSION["category_errors"]);
                echo "</div>";
            }

            if (isset($_SESSION["subcat_insert_message"])) {
                echo "<div class='alert alert-success pop-up'>";
                echo $_SESSION["subcat_insert_message"];
                unset($_SESSION["subcat_insert_message"]);
                echo "</div>";
            }

            if (isset($_SESSION["subcat_error_message"])) {
                echo "<div class='alert alert-warning pop-up'>";
                echo $_SESSION["subcat_error_message"];
                unset($_SESSION["subcat_error_message"]);
                echo "</div>";
            }

            if (isset($_SESSION["brand_insert_message"])) {
                echo "<div class='alert alert-success pop-up'>";
                echo $_SESSION["brand_insert_message"];
                unset($_SESSION["brand_insert_message"]);
                echo "</div>";
            }

            if (isset($_SESSION["brand_error_message"])) {
                echo "<div class='alert alert-success pop-up'>";
                echo $_SESSION["brand_error_message"];
                unset($_SESSION["brand_error_message"]);
                echo "</div>";
            }
            ?>
        </div>
    </div>
    <div class="row row-no-gutters customize-row">
        <div class="col-md-12 col-sm-12 col-xs-12 ">
            <div class="panel-body panel-customize no-gutter">
                <h4>Categories</h4>
                <table class="table table-striped table-bordered data-table" style="width:100%">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>categories</th>
                            <th>sub-categories</th>
                            <th>brands</th>
                            <th>products</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT id, name from categories";
                        $all_cat_resources = $webApps->Select($sql);
                        $i = 1;
                        while ($all_cat_obj = $all_cat_resources->fetch_object()) {
                            echo "<tr><td>" . $i++ . "</td><td>" . $all_cat_obj->name . "</td><td>" ?>
                            <?php
                            $sql = "SELECT count(id) as total_subcat from sub_categories where cat_id = '$all_cat_obj->id'";
                            $subcat_resources_cat = $webApps->Select($sql);
                            while ($subcat_obj_cat = $subcat_resources_cat->fetch_object()) {
                                echo "$subcat_obj_cat->total_subcat";
                            }
                            ?>
                            <?php echo "</td><td>" ?><?php
                                                        $sql = "SELECT count(id) as total_brands from brands where cat_id = '$all_cat_obj->id'";
                                                        $brands_resources_cat = $webApps->Select($sql);
                                                        while ($brands_obj_cat = $brands_resources_cat->fetch_object()) {
                                                            echo "$brands_obj_cat->total_brands";
                                                        }
                                                        ?>
                            <?php echo "</td><td>" ?>
                            <?php
                            $sql = "SELECT count(id) as total_products from products where category_id = '$all_cat_obj->id'";
                            $products_resources_cat = $webApps->Select($sql);
                            while ($products_obj_cat = $products_resources_cat->fetch_object()) {
                                echo "$products_obj_cat->total_products";
                            }
                            ?>
                            <?php echo "</td><td>" . '<i class=' . "'fa fa-trash action-icon'" . '></i>' . ' | ' . '<a href=\'edit_categories.php?cat_id=' . $all_cat_obj->id . '\'><i class=' . "'fas fa-edit action-icon'" . '></i></a>' . "</td>" ?>
                        <?php echo "</tr>";
                        }
                        ?>

                    </tbody>
                </table>
                <span class="timeStamp"></span>
            </div>

        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 ">
            <div class="panel-body panel-customize no-gutter">
                <h4>Sub Categories</h4>
                <table class="table table-striped table-bordered data-table" style="width:100%">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>sub-categories</th>
                            <th>total Brands</th>
                            <th>total Products</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * from sub_categories";
                        $all_subcat_resources = $webApps->Select($sql);
                        $i = 1;
                        while (($all_subcat_obj = $all_subcat_resources->fetch_object())) {
                            $cat_id = $all_subcat_obj->cat_id;
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $all_subcat_obj->name ?> </td>
                                <td><?php
                                    $sql = "SELECT count(id) as counted_brands from brands where subcat_id = '$all_subcat_obj->id'";
                                    $counted_brand_subcat = $webApps->Select($sql);
                                    while ($counted_brand_obj = $counted_brand_subcat->fetch_object()) {
                                        echo $counted_brand_obj->counted_brands;
                                    }
                                    ?></td>
                                <td><?php
                                    $sql = "SELECT COUNT(id) as total_product from products where subcat_id = '$all_subcat_obj->id'";
                                    $total_product_count_resources = $webApps->Select($sql);
                                    while ($total_product_count_obj = $total_product_count_resources->fetch_object()) {
                                        echo "$total_product_count_obj->total_product";
                                    } ?></td>

                                <?php echo "</td><td>" . '<i class=' . "'fa fa-trash action-icon'" . '></i>' . ' | ' . '<a href=\'edit_subcat.php?&subcat_id=' . $all_subcat_obj->id. '\'><i class=' . "'fas fa-edit action-icon'" . '></i></a>' . "</td>" ?>
                            <?php echo "</tr>";
                        } ?>
                    </tbody>
                </table>
                <span class="timeStamp"></span>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 ">
            <div class="panel-body panel-customize no-gutter">
                <h4>Brands</h4>
                <table class="table table-striped table-bordered data-table" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Brands</th>
                            <th>Total Products</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $sql = "SELECT id, name from brands";
                        $brands_resources = $webApps->Select($sql);
                        while ($brands_obj = $brands_resources->fetch_object()) {
                        ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo  $brands_obj->name ?></td>
                                <td><?php
                                                        $sql = "SELECT COUNT(id) as count_pro from products where brand_id = '$brands_obj->id'";
                                                        $count_pro_resources = $webApps->Select($sql);
                                                        while ($count_pro_obj = $count_pro_resources->fetch_object()) {
                                                            echo "$count_pro_obj->count_pro";
                                                        }
                                                        ?></td>
                            <?php echo "<td>" . '<i class=' . "'fa fa-trash action-icon'" . '></i>' . ' | ' . '<a href=\'edit_brands.php?brand_id=' . $brands_obj->id . '\'><i class=' . "'fas fa-edit action-icon'" . '></i></a>' . "</td></tr>" ?>
                        <?php } ?>
                    </tbody>
                </table>
                <span class="timeStamp"></span>
            </div>

        </div>
    </div>
</div>
<?php include('footer.php'); ?>