<?php include('layout.php'); ?>
<div class="container-fluid bg-color" style="margin-top: 50px;height: 1000px;background-color: #EAF0F1">
    <div class="row row-no-gutters">
        <div class="panel panel-default addsupplier-header">
            <?php
            if (isset($_SESSION["add_supplier_error"])) {
                echo "<div class='alert alert-warning pop-up'>";
                echo $_SESSION["add_supplier_error"];
                unset($_SESSION["add_supplier_error"]);
                echo "</div>";
            }
            ?>

            <?php
            if (isset($_SESSION["add_supplier_insert"])) {
                echo "<div class='alert alert-success pop-up'>";
                echo $_SESSION["add_supplier_insert"];
                unset($_SESSION["add_supplier_insert"]);
                echo "</div>";
            }
            ?>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 editsupplier-form">
            <form action="../functions/logic.php" method="post">
                <div class="col-md-6 half-part-sup-form">
                    <div class="form-group">
                        <label for="fname">First name:</label>
                        <input name="f_name" type="text" class="form-control" placeholder="First name">
                    </div>
                    <div class="form-group">
                        <label for="lname">Last name:</label>
                        <input name="l_name" type="text" class="form-control" placeholder="Last name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input name="email" type="email" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="col-md-6 half-part-sup-form">
                    <div class="form-group">
                        <label for="phone">phone:</label>
                        <input name="phone" type="text" class="form-control"  placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input name="passwords" type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input name="street_address" type="text" class="form-control"  placeholder="Address">
                    </div>

                    <div class="form-group">
                        <label for="category">Select Country:</label>
                        <div class="custom-select">
                            <select name="select_country_in_adsupp" id="edit-country-in-adsupp" class="select-option">
                                <option value="0">Select Country</option>
                                <?php
                                $sql = "SELECT * FROM countries";
                                $all_Country_resourse = $webApps->Select($sql);
                                while ($all_Country_obj = $all_Country_resourse->fetch_object()) { ?>
                                    <option value="<?php echo $all_Country_obj->id; ?>"> <?php echo $all_Country_obj->name; ?> </option>;
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <button name="save_supplier_btn" id="update-sup-form-btn" type="submit" class="btn btn-primary sup-form-save-btn" data-toggle="modal" data-target="#myModal">Update</button>
                <!-- Modal -->
            </form>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>