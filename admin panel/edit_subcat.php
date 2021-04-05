<?php include('layout.php'); ?>
<div class="container-fluid bg-color" style="margin-top: 50px;">
    <div class="row row-no-gutters">
        <div class="col-md-12 col-sm-12 col-xs-12 inp-div-addpro">
            <div class="col-md-6 col-sm-6 col-xs-12 div-inp-addpro">
                <?php
                if (isset($_GET['subcat_id'])) {
                    $subcat_id = $_GET['subcat_id'];
                    $sql = "SELECT * from sub_categories where id = '$subcat_id'";
                    $subcat_resource = $webApps->Select($sql);
                    $subcat_obj = $subcat_resource->fetch_object();
                }
                ?>
                <form action="../functions/logic.php" method="post">
                    <div class="col-md-12 col-sm-12 col-xs-12 custom-div-for-add-pro">
                        <div class="form-group">
                            <label for="subcategory">Sub-Category name:</label>
                            <input name="edited_subcat_name" type="text" value="<?php echo $subcat_obj->name; ?>" class="form-control" id="add-subcat-inp" placeholder="subcategory name">
                        </div>
                        <div class="form-group">
                            <label for="category">Select Category:</label>
                            <div class="custom-select">
                                <select name="edited_cat_in_subcat" id="select-cat-in-subcat" class="select-option">
                                    <option value="0">Select Category</option>
                                    <?php
                                    $sql = "SELECT * FROM categories";
                                    $all_Category_resourse = $webApps->Select($sql);
                                    while ($all_Category_obj = $all_Category_resourse->fetch_object()) { ?>
                                        <option value="<?php echo $all_Category_obj->id ?>" <?php if ($all_Category_obj->id == $subcat_obj->cat_id) {
                                                                                                echo "selected";
                                                                                            } ?>> <?php echo $all_Category_obj->name; ?> </option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="edited_subcat_id" value="<?php echo $subcat_obj->id ?>">
                        <button name="update_subcat_btn" id="save-subcat-btn" type="submit" class="btn btn-primary save-btn-addpro save-subcat-btn">Update Subcategory</button>
                    </div>
                    <!-- Modal -->
                </form>
            </div>

            <?php
            if (isset($_SESSION["subcat_insert_message"])) {
                echo "<div class='alert alert-success pop-up'>";
                echo $_SESSION["subcat_insert_message"];
                unset($_SESSION["subcat_insert_message"]);
                echo "</div>";
            }
            ?>

            <?php
            if (isset($_SESSION["subcat_error_message"])) {
                echo "<div class='alert alert-warning pop-up'>";
                echo $_SESSION["subcat_error_message"];
                unset($_SESSION["subcat_error_message"]);
                echo "</div>";
            }
            ?>
            
        </div>
    </div>
</div>
<?php include('footer.php'); ?>