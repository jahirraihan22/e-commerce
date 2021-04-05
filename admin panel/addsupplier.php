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
             <div class="panel-body">
                 <h3><span>Suppliers</span><a href="#">
                         <button id="add-supp-btn" type="button" class="btn btn-primary add-supp-btn"><i class="fa fa-plus"><span style="margin-left: 5px;">Add supplier</span></i></button></a></h3>
             </div>
         </div>
         <div class="col-md-12 col-sm-12 col-xs-12 addsupplier-form">
             <form action="../functions/logic.php" method="post">
                 <div class="col-md-6 half-part-sup-form">
                     <div class="form-group">
                         <label for="fname">First name:</label>
                         <input name="f_name" type="text" class="form-control" id="sup-fname" placeholder="First name">
                     </div>
                     <div class="form-group">
                         <label for="lname">Last name:</label>
                         <input name="l_name" type="text" class="form-control" id="sup-lname" placeholder="Last name">
                     </div>
                     <div class="form-group">
                         <label for="email">Email address:</label>
                         <input name="email" type="email" class="form-control" id="sup-email" placeholder="Email">
                     </div>
                 </div>
                 <div class="col-md-6 half-part-sup-form">
                     <div class="form-group">
                         <label for="phone">phone:</label>
                         <input name="phone" type="text" class="form-control" id="sup-phone" placeholder="Phone">
                     </div>
                     <div class="form-group">
                         <label for="pwd">Password:</label>
                         <input name="passwords" type="password" class="form-control" id="sup-pwd" placeholder="Password">
                     </div>
                     <div class="form-group">
                         <label for="address">Address:</label>
                         <input name="street_address" type="text" class="form-control" id="sup-address" placeholder="Address">
                     </div>

                     <div class="form-group">
                         <label for="category">Select Country:</label>
                         <div class="custom-select">
                             <select name="select_country_in_adsupp" id="select-country-in-adsupp" class="select-option">
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
                 <button name="save_supplier_btn" id="save-sup-form-btn" type="submit" class="btn btn-primary sup-form-save-btn" data-toggle="modal" data-target="#myModal">Add</button>
                 <!-- Modal -->
             </form>
         </div>
     </div>
     <div class="row row-no-gutters">
         <div class="panel panel-default ">
             <div class="panel-body panel-customize bg-color-2 no-gutter">
                 <h4>Supplier Details</h4>
                 <table class="table table-hover custom-supp-table">
                     <thead>
                         <tr>
                             <th>SN</th>
                             <th>Supplier Name</th>
                             <th>Phone</th>
                             <th>Email</th>
                             <th>Address</th>
                             <th>Rating</th>
                             <th>Details</th>
                        </tr>
                     </thead>
                     <tbody>
                         <?php
                            $sql = "SELECT * FROM users where id != 1";
                            $all_supplier_resourse = $webApps->Select($sql);
                            $i = 1;
                            while ($all_supplier_obj = $all_supplier_resourse->fetch_object()) {
                                echo "<tr><td>" . $i . "</td><td>" . $all_supplier_obj->name . "</td><td>" . $all_supplier_obj->phone . "</td><td>" . $all_supplier_obj->email . "</td><td>"; ?> <?php
                                                                                                                                                                                                    $sql = "SELECT address_street FROM users_address WHERE user_id = '$all_supplier_obj->id'";
                                                                                                                                                                                                    $address_resources = $webApps->Select($sql);
                                                                                                                                                                                                    while($address_obj = $address_resources->fetch_object()){
                                                                                                                                                                                                        echo $address_obj->address_street;
                                                                                                                                                                                                    }
                                                                                                                                                                                                ?> <?php echo "</td><td>" . ' ' . "</td><td><a href='#'>" . 'View' . "</td></tr>";
                                    $i++;
                                }
                                    ?>
                     </tbody>
                 </table>
                 <span class="timeStamp"></span>
             </div>
         </div>
     </div>
 </div>
 <?php include('footer.php'); ?>