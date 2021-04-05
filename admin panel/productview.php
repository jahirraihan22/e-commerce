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
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#"><i class="fa fa-home header-menu-icons" style="margin-right: 6px;"></i>Home</a></li>
                    <li><a href="dashboard.php"><i class="fa fa-dashboard header-menu-icons" style="margin-right: 6px;"></i>Dashboard</a></li>
                    <li><a href="#"><i class="fas fa-user header-menu-icons" style="margin-right: 6px;"></i>Profile</a></li>
                    <li><a href="order.php"><i class="fa fa-list header-menu-icons" style="margin-right: 6px;"></i>Order List </a></li>
                    <li><a href="../functions/logic.php?logout=true"><i class="fa fa-sign-out header-menu-icons" style="margin-right: 6px;"></i>Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="container-fluid bg-color" style="margin-top: 50px;">
</div>
<?php include('footer.php'); ?>