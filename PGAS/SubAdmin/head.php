<?php

include("sessionvalidation.php");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SUB-ADMIN</title>
  <link rel="shortcut icon" type="image/png" href="../Assets/Templates/Admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../Assets/Templates/Admin/assets/css/styles.min.css" />
  <link rel="stylesheet" href="../Assets/Templates/Main/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Assets/Templates/Main/mystyle.css">
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a  class="logo-img">
            <img src="../Assets/Templates/Admin/assets/images/logos/dark-logo.svg" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./Homepage.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">COMPONENTS</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./OwnerVerification.php" aria-expanded="false">
                <span>
                  <i class="ti ti-stack"></i>
                </span>
                <span class="hide-menu">Owner Verification</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./UserVerification.php" aria-expanded="false">
                <span>
                  <i class="ti ti-location"></i>
                </span>
                <span class="hide-menu">User Verification</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./VerifiedUser.php" aria-expanded="false">
                <span>
                  <i class="ti ti-road"></i>
                </span>
                <span class="hide-menu">Verified User</span>
              </a>
            </li> 
            <li class="sidebar-item">
              <a class="sidebar-link" href="./VerifiedOwner.php" aria-expanded="false">
                <span>
                  <i class="ti ti-pizza"></i>
                </span>
                <span class="hide-menu">Verified Owner</span>
              </a>
            </li>
            
            <li class="sidebar-item">
              <a class="sidebar-link" href="./RejectedUsers.php" aria-expanded="false">
                <span>
                  <i class="ti ti-heart-handshake"></i>
                </span>
                <span class="hide-menu">Rejected Users</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./RejectedOwners.php" aria-expanded="false">
                <span>
                  <i class="ti ti-clipboard-text"></i>
                </span>
                <span class="hide-menu">Rejected Owners</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./Complaints.php" aria-expanded="false">
                <span>
                  <i class="ti ti-tie"></i>
                </span>
                <span class="hide-menu">Complaints</span>
              </a>
            </li>
            
            
          </ul>
          
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              
            </li>
          </ul>
          <div class=" navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../Assets/Templates/Admin/assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="logout.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                    <a href="Myprofile.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Profile</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid" id="main-content">