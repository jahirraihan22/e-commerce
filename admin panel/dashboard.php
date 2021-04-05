<?php include('layout.php'); ?>
<!-------------------------->
<div class="container-fluid menu-head" style="padding: 0px;">
  <nav class="navbar navbar-default" style="border: none !important">
    <div class="container-fluid" style="padding: 0px;">
      <!-- Brand and toggle get grouped for better mobile display -->
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
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="#"><i class="fa fa-home header-menu-icons" style="margin-right: 6px;"></i>Home</a></li>
          <li class="active"><a href="dashboard.php"><i class="fa fa-dashboard header-menu-icons" style="margin-right: 6px;"></i>Dashboard <span class="sr-only">(current)</span></a></li>
          <li><a href="#"><i class="fas fa-user header-menu-icons" style="margin-right: 6px;"></i>Profile</a></li>
          <li><a href="order.php"><i class="fa fa-list header-menu-icons" style="margin-right: 6px;"></i>Order List</a></li>
          <li><a href="#"><i class="fas fa-group header-menu-icons" style="margin-right: 6px;"></i>Users</a></li>
          <li><a href="#"><i class='fas fa-cog  header-menu-icons' style="margin-right: 6px;"></i>Settings</a></li>
          <li><a href="../functions/logic.php?logout=true"><i class="fa fa-sign-out header-menu-icons" style="margin-right: 6px;"></i>Log Out</a></li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</div>
<div class="container-fluid bg-color" style="margin-top: 50px;">

  <div class="row row-no-gutters customize-row-panel">
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="row customize-row">
        <div class="panel panel-primary custom-border-none ">
          <div class="panel-heading">
            <h3>Supplier Info<i class="fa fa-info-circle panel-header-icons" style="margin-left: 10px;"></i></h3>
          </div>
          <div class="panel-body">
            <div class="col-md-12 col-sm-12 col-md-12">
            <?php 
                $sql = "SELECT COUNT(id) as total_suppliers FROM user_roll where roll_id = 3";
                $total_supp_resources = $webApps->Select($sql);
                while($total_supp_obj = $total_supp_resources->fetch_object()){
                  $total_suppliers = $total_supp_obj->total_suppliers;
                }
              ?>
              <span>Suppliers <span class="badge"><?php echo $total_suppliers;?></span></span>
              <a href="addsupplier.php"><button type="button" class="btn btn-default customize-btn-1">Update</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="row row-no-gutters customize-row">
        <div class="panel panel-primary custom-border-none">
          <div class="panel-heading">
            <h3>Products<i class="fa fa-th-list panel-header-icons" style="margin-left: 10px;"></i></h3>
          </div>
          <div class="panel-body">
            <div class="col-md-12 col-sm-12 col-md-12">
              <?php 
                $sql = "SELECT COUNT(id) as total_cat FROM categories";
                $count_resource_cat = $webApps->Select($sql);
                while($total_cat_obj = $count_resource_cat->fetch_object()){
                  $total_cat = $total_cat_obj->total_cat;
                }
              ?>
              <span>Categories <span class="badge"><?php echo $total_cat;?></span></span>
              <?php 
                $sql = "SELECT COUNT(id) as total_subcat FROM sub_categories";
                $count_resource_subcat = $webApps->Select($sql);
                while($total_subcat_obj = $count_resource_subcat->fetch_object()){
                  $total_subcat = $total_subcat_obj->total_subcat;
                }
              ?>
              <span>Sub-Categories <span class="badge"><?php echo $total_subcat;?></span></span>
              <?php 
                $sql = "SELECT COUNT(id) as total_brands FROM brands";
                $count_resource_brands = $webApps->Select($sql);
                while($total_total_brands_obj = $count_resource_brands->fetch_object()){
                  $total_brands = $total_total_brands_obj->total_brands;
                }
              ?>
              <span>Brand <span class="badge"><?php echo $total_brands;?></span></span>
              <a href="addproduct.php"><button type="button" class="btn btn-default customize-btn-1">Update </button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
      <div class="row customize-row">
        <div class="panel panel-primary custom-border-none">
          <div class="panel-heading">
            <h3>Users Info<i class="fa fa-info-circle panel-header-icons" style="margin-left: 10px;"></i></h3>
          </div>
          <div class="panel-body">
            <div class="col-md-12 col-sm-12 col-md-12">
              <span>Users <span class="badge">10</span></span>
              <a href="#"><button type="button" class="btn btn-default customize-btn-1">Update</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid custome-container-fluid">
  <div class="row row-no-gutters customize-row">
    <div class="col-md-4 col-sm-6 col-xs-12 ">
      <div class="panel panel-default bg-color-1 ">
        <div class="panel-body panel-customize no-gutter">
          <h4>Top 10 Seller</h4>
          <table class="table table-hover border-customize-div">
            <thead>
              <tr>
                <th>Ranking</th>
                <th>Name</th>
                <th>Total sell</th>
                <th>Profile</th>
                <th>Rating</th>
              </tr>
            </thead>
            <tbody>
              <script>
                var totalSell = [];
                var rating = [];
                for (var i = 0; i < 10; i++) {
                  var sell = Math.floor(Math.random() * 100 + 1);
                  var rate = (Math.random() * 4 + 1);

                  totalSell.push(sell);
                  rating.push(rate.toFixed(2));
                }
                totalSell = totalSell.sort(function(a, b) {
                  return a - b
                });
                rating = rating.sort(function(a, b) {
                  return a - b
                });
                for (var i = 10; i > 0; i--) {
                  document.write("<tr><td>" + (totalSell.length - i + 1) + "</td><td>" + 'John' + "</td><td>" + totalSell[i - 1] + "</td><td><a href='#'>" + 'view profile' + "</a></td><td>" + rating[i - 1] + "</td></tr>");
                }
              </script>
            </tbody>
          </table>
          <span class="timeStamp"></span>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12 ">
      <div class="panel panel-default bg-color-1">
        <div class="panel-body panel-customize no-gutter">
          <h4>Top 10 products</h4>
          <table class="table table-hover border-customize-div">
            <thead>
              <tr>
                <th>Ranking</th>
                <th>Products</th>
                <th>Total sell</th>
                <th>View</th>
                <th>Rating</th>
              </tr>
            </thead>
            <tbody>
              <script>
                var totalSell = [];
                var rating = [];
                var product = ["Xiomi M20", "Lorem", "Xiomi M20", "Lorem", "Xiomi M20", "Lorem ", "Xiomi M20", "Lorem ", "Xiomi M20", "Lorem"];
                for (var i = 0; i < 10; i++) {
                  var sell = Math.floor(Math.random() * 100 + 1);
                  var rate = (Math.random() * 4 + 1);
                  totalSell.push(sell);
                  rating.push(rate.toFixed(2));
                }
                totalSell = totalSell.sort(function(a, b) {
                  return a - b
                });
                rating = rating.sort(function(a, b) {
                  return a - b
                });
                for (var i = 10; i > 0; i--) {
                  document.write("<tr><td>" + (totalSell.length - i + 1) + "</td><td>" + (product[product.length - i]) + "</td><td>" + totalSell[i - 1] + "</td><td><a href='#'>" + 'view' + "</a></td><td>" + rating[i - 1] + "</td></tr>");
                }
              </script>
            </tbody>
          </table>
          <span class="timeStamp"></span>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12 ">
      <div class="panel panel-default bg-color-1">
        <div class="panel-body panel-customize no-gutter">
          <h4>Top 10 Customer</h4>
          <table class="table table-hover border-customize-div">
            <thead>
              <tr>
                <th>Ranking</th>
                <th>Name</th>
                <th>Total Buy</th>
                <th>Profile</th>
                <th>Last Buy</th>
              </tr>
            </thead>
            <tbody>
              <script>
                var totalSell = [];
                for (var i = 0; i < 10; i++) {
                  var sell = Math.floor(Math.random() * 100 + 1);
                  totalSell.push(sell);
                }
                totalSell = totalSell.sort(function(a, b) {
                  return a - b
                });
                for (var i = 10; i > 0; i--) {
                  document.write("<tr><td>" + (totalSell.length - i + 1) + "</td><td>" + 'John' + "</td><td>" + totalSell[i - 1] + "</td><td><a href='#'>" + 'view profile' + "</a></td><td>" + "2019-12-25" + "</td></tr>");
                }
              </script>
            </tbody>
          </table>
          <span class="timeStamp"></span>
        </div>
      </div>
    </div>
  </div>
  <div class="row row-no-gutters customize-row">
    <div class="col-md-4 col-sm-12 col-xs-12 ">
      <div class="panel panel-default  bg-color-1">
        <div class="panel-body panel-customize no-gutter">
          <h4>Items Alert</h4>
          <table class="table table-hover border-customize-div">
            <thead>
              <tr>
                <th>Serial</th>
                <th>Product</th>
                <th>Remaining quantity</th>
                <th>View</th>
              </tr>
            </thead>
            <tbody>
              <script>
                var remaining = [];
                for (var i = 0; i < 20; i++) {
                  var store = Math.floor(Math.random() * 10);
                  remaining.push(store);
                }
                remaining = remaining.sort();
                for (var i = 0; i < 20; i++) {
                  document.write("<tr><td>" + (i + 1) + "</td><td>" + 'Lorem' + "</td><td>" + remaining[i] + "</td><td><a href='#'>" + 'view' + "</a></td></tr>");
                }
              </script>
            </tbody>
          </table>
          <span class="timeStamp"></span>
        </div>
      </div>
    </div>
    <div class="col-md-8 col-sm-12 col-xs-12 ">
      <div class="panel panel-default  bg-color-1">
        <div class="panel-body panel-customize no-gutter">
          <h4>Order Details</h4>
          <table class="table table-hover border-customize-div">
            <thead>
              <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Supplier Name</th>
                <th>Created Time</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $data = getOrderListAdmin();
                while($orderList = $data->fetch_object()){

                  echo "<tr><td>".$orderList->id."</td>";
                  echo "<td>".$orderList->client_id."</td>";
                  echo "<td>".$orderList->suplier_id."</td>";
                  echo "<td>".$orderList->created_at."</td></tr>";

                }

              ?>
            </tbody>
          </table>
          <span class="timeStamp"></span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<?php include('footer.php'); ?>