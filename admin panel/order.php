<?php include('layout.php'); ?>
    <style type="text/css">
      *{
        color: #fff!important;
      }
      select,select option{
        color : #000!important;
      }
    </style>
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
                  <a class="navbar-brand" href="#"><img src="../images/logo.png" style="width: 50px;height: 50px; margin-top: -15px"></a> <!------ problem 1: in LOGO -------->
                </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="#"><i class="fa fa-home header-menu-icons"  style="margin-right: 6px;"></i>Home</a></li>
                        <li><a href="dashboard.php"><i class="fa fa-dashboard header-menu-icons"  style="margin-right: 6px;"></i>Dashboard</a></li>
                        <li><a href="#"><i class="fas fa-user header-menu-icons"  style="margin-right: 6px;"></i>Profile</a></li>
                        <li class="active"><a href="order.php"><i class="fa fa-list header-menu-icons"  style="margin-right: 6px;"></i>Order List<span class="sr-only">(current)</span></a></li>s
                        <li><a href="#"><i class="fas fa-group header-menu-icons"  style="margin-right: 6px;"></i>Users</a></li>
                        <li><a href="#"><i class='fas fa-cog  header-menu-icons'  style="margin-right: 6px;"></i>Settings</a></li>
                        <li><a href="../functions/logic.php?logout=true"><i class="fa fa-sign-out header-menu-icons"  style="margin-right: 6px;"></i>Log Out</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
    <div class="container-fluid bg-color" style="margin-top: 50px;"><!--------  problem 2: logo placing problem --------->
        <div class="row row-no-gutters customize-row">
            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="panel panel-default ">
                    <div class="panel-body panel-customize bg-color-2 no-gutter"><h4>Order Details</h4>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Supplier</th>
                                    <th>Delivery Condition</th>
                                    <th>Print invoice</th>
                                </tr>
                            </thead>
                        <tbody>
                          
                          <?php
                             $sql = "SELECT * from orders";
                             $total_order_list = $webApps->Select($sql);
                             while($total_order_lists = $total_order_list->fetch_object()){
                                echo "<form action='../functions/logic.php' method='post'><input type='hidden' value=".$total_order_lists->order_id." name='order_id'>";
                                echo "<tr>";
                                echo "<td>".$total_order_lists->order_id."</td>";
                                echo "<td>".$total_order_lists->client_id."</td>";
                                echo "<td>".$total_order_lists->suplier_id ."</td>";
                                echo "<td><select name='status'><option value='0'>Pending</option><option value='1'>Accepted</option><option value='2'>Delived</option><option value='3'>Cancelled</option></select><input type='submit' name='order_status_update' value='update status'></td> ";
                                echo "<td><a href='invoice.php?id=".$total_order_lists->order_id."'>Print invoice</a></td>";
                                echo "</tr>";
                                echo "</form>";
                              };
                            ?>
                          
                        </tbody>
                    </table>
                        <span class="timeStamp"></span>
                   </div>
               </div>
            </div>
        </div>
    </div>
<?php include('footer.php'); ?>