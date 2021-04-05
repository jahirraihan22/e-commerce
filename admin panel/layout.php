<?php
  session_start();
  include('../functions/logic.php');
  include('../admin panel/adminLogincheck.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add products</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Bitter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Anton|Kulim+Park|Montserrat|Muli|Raleway|Solway|Varela+Round&display=swap" rel="stylesheet">
  </head>
  <body>
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
                        <li><a href="dashboard.php"><i class="fa fa-dashboard header-menu-icons" style="margin-right: 6px;"></i>Dashboard</a></li>
                        <li><a href="#"><i class="fas fa-user header-menu-icons" style="margin-right: 6px;"></i>Profile</a></li>
                        <li><a href="order.php"><i class="fa fa-list header-menu-icons" style="margin-right: 6px;"></i>Order List</a></li>
                        <li><a href="#"><i class="fas fa-group header-menu-icons" style="margin-right: 6px;"></i>Users</a></li>
                        <li><a href="#"><i class='fas fa-cog  header-menu-icons' style="margin-right: 6px;"></i>Settings</a></li>
                        <li><a href="../functions/logic.php?logout=true"><i class="fa fa-sign-out header-menu-icons" style="margin-right: 6px;"></i>Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>