<?php include('layout.php'); ?>
<div class="container-fluid bg-color" style="margin-top: 50px;">
    <div class="row row-no-gutters">
        <div class="col-md-12 col-sm-12 col-xs-12 inp-div-addpro">
            <div class="col-md-6 col-sm-6 col-xs-12 div-inp-addpro">
                <?php
                    if(isset($_GET['brand_id'])){
                        $brand_id = $_GET['brand_id'];
                        $sql = "SELECT * from brands where id = '$brand_id'";
                        $brands_resources = $webApps->Select($sql);
                        $brands_obj = $brands_resources->fetch_object();
                    }
                ?>
                <form action="../functions/logic.php" method="post">
                    <div class="col-md-12 col-sm-12 col-xs-12 custom-div-for-add-pro">
                        <div class="form-group">
                            <label for="subcategory">Brand name:</label>
                            <input name="update_brand_name" type="text" class="form-control" id="add-brand-inp" placeholder="brand name" value="<?php echo $brands_obj->name;?>">
                        </div>
                        <div class="form-group">
                            <label for="category">Select Category:</label>
                            <div class="custom-select">
                                <select name="update_cat_in_brand" id="select-cat-in-brand" class="select-option">
                                    <option value="0">Select Category</option>
                                    <?php
                                    $sql = "SELECT * FROM categories";
                                    $all_Category_resourse = $webApps->Select($sql);
                                    while ($all_Category_obj = $all_Category_resourse->fetch_object()) {?>
                                        <option value="<?php echo $all_Category_obj->id ?>" <?php if($all_Category_obj->id == $brands_obj->cat_id){
                                            echo "selected";
                                        }?>><?php echo "$all_Category_obj->name"?></option>;
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category">Select Sub-category:</label>
                            <div class="custom-select">
                                <select name="update_subcat_in_brand" id="select-subcat-in-brand" class="select-option">
                                    <option value="0">Select Sub-Category</option>
                                    <?php
                                    $sql = "SELECT * FROM sub_categories";
                                    $all_subcategory_resourse = $webApps->Select($sql);
                                    while ($all_subcategory_obj = $all_subcategory_resourse->fetch_object()) {?>
                                        <option value="<?php echo $all_subcategory_obj->id ?>" <?php if($all_subcategory_obj->id == $brands_obj->subcat_id){
                                            echo "selected";
                                        }?> > <?php echo "$all_subcategory_obj->name"?> </option>;
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="edited_brand_id" value="<?php echo $brands_obj->id ?>">
                        <button id="update-brand-btn" name="brand_update_btn" type="submit" class="btn btn-primary save-btn-addpro save-brand-btn">Update Brand</button>
                    </div>
                </form>
            </div>
            <?php
            if (isset($_SESSION["brand_insert_message"])) {
                echo "<div class='alert alert-success pop-up'>";
                echo $_SESSION["brand_insert_message"];
                unset($_SESSION["brand_insert_message"]);
                echo "</div>";
            }
            ?>

            <?php
            if (isset($_SESSION["brand_error_message"])) {
                echo "<div class='alert alert-success pop-up'>";
                echo $_SESSION["brand_error_message"];
                unset($_SESSION["brand_error_message"]);
                echo "</div>";
            }
            ?>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>