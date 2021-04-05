<?php include('layout.php');?>   
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
                  <a class="navbar-brand" href="#"><img src="../images/logo.png" style="width: 50px;height: 50px; margin-top: -15px"></a> <!------ problem 1: in LOGO -------->
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                       <li><a href="#"><i class="fa fa-home header-menu-icons" style="margin-right: 6px;"></i>Home</a></li>
                        <li><a href="dashboard.php"><i class="fa fa-dashboard header-menu-icons" style="margin-right: 6px;"></i>Dashboard </a></li>
                        <li><a href="#"><i class="fas fa-user header-menu-icons" style="margin-right: 6px;"></i>Profile</a></li>
                        <li class="active"><a href="order.php"><i class="fa fa-list header-menu-icons" style="margin-right: 6px;"></i>Order List <span class="sr-only">(current)</span></a></li>
                        <li><a href="../functions/logic.php?logout=true"><i class="fa fa-sign-out header-menu-icons" style="margin-right: 6px;"></i>Log Out</a></li>
                        <li><span style="color: #fff">Jahir<p>(ADMIN)</p></span></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container-fluid bg-color" style="margin-top: 50px;">
        <div class="row row-no-gutters customize-row">
            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="panel panel-default ">
                    <div class="panel-body panel-customize bg-color-2 no-gutter"><h4>Order Details</h4>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Product</th>
                                    <th>Delivery Condition</th>
                                    <th>Shipping Address</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                        <tbody>
                            <script>
                                 var remaining = [];
                                 for(var i = 0; i < 20; i++){
                                    var store = Math.floor(Math.random() * 10);
                                    remaining.push(store);
                                  }
                                 remaining = remaining.sort();
                                 for(var i = 0; i < 20; i++){
                                     var orderID = Math.floor(Math.random() * 1000 + 500);
                                     document.write("<tr><td>"+orderID+"</a></td><td>"+'Lorem Ipsum'+"</td><td>"+'Doe'+"</td><td>"+'Pending'+"</td><td>"+'Dhaka'+"</td><td><a href='#'>"+'Details'+"</td></tr>");}
                            </script>
                        </tbody>
                    </table>
                        <span class="timeStamp"></span>
                   </div>
               </div>
            </div>
        </div>
    </div>
<?php include('footer.php'); ?>