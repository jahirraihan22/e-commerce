<?php include('layout.php'); ?>
<div class="container-fluid bg-color" style="margin-top: 50px;">
    <div class="row row-no-gutters">
        <div class="col-md-12 col-sm-12 col-xs-12 inp-div-addpro">
            <div class="col-md-6 col-sm-6 col-xs-12 div-inp-addpro">
                <?php
                if (isset($_GET['cat_id'])) {
                    $cat_id = $_GET['cat_id'];
                    $sql = "SELECT * from categories where id = '$cat_id'";
                    $cat_resource = $webApps->Select($sql);
                    $cat_obj = $cat_resource->fetch_object();
                }
                ?>
                <form action="../functions/logic.php" method="post">
                    <div class="col-md-12 col-sm-12 col-xs-12 custom-div-for-add-pro">
                        <div class="form-group">
                            <label for="category">Category name:</label>
                            <input type="text" class="form-control" id="add-category" name="updated_cat_name" value="<?php echo "$cat_obj->name"; ?>" placeholder="category name">
                        </div>
                        <input type="hidden" name="edited_cat_id" value="<?php echo $cat_obj->id ?>">
                        <button id="save-cat-btn" type="submit" name="category_update" class="btn btn-primary save-btn-addpro save-cat-btn">Update Category</button>
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
            ?>

            <?php
            if (isset($_SESSION["category_errors"])) {
                echo "<div class='alert alert-warning pop-up'>";
                echo $_SESSION["category_errors"];
                unset($_SESSION["category_errors"]);
                echo "</div>";
            }
            ?>

        </div>
    </div>
</div>
<?php include('footer.php'); ?>