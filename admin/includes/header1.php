<?php include('connection.php') ?>

<div class="">
  <nav class="sb-topnav navbar navbar-expand admin-navbar ">
    <!-- Navbar Brand-->

    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!" style="margin-left: 90px;"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
      <div class="input-group">
        <link href="img/logo.png" rel="icon" />
        <!-- <a href="./"><img src="img/logo.png"></a> -->

        <a href="banner.php" style="position: absolute;left: -900px;">
        <img src="img/logo.png" style=" height: 52px;" class="logo-admin"></a>
        <?php
        $sql = "SELECT * FROM `logintable`";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) {
        ?>
            <div class="logout-dropdown" style="padding-top: 10px;">
              <a class="navbar-brand" href="#"><?php echo $row['uname'] ?>
                <i class="fas fa-user-circle"></i>
              </a>
              <ul class="dropdown-logout-list">
                <li><a href="logout.php">LogOut</a></li>
              </ul>
            </div>
        <?php  }
        } ?>


        <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
      <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> -->
      </div>
    </form>
    <!-- Navbar-->
  </nav>
  <div class="side_bar">
    <div id="layoutSidenav" class="">
      <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
          <div class="sb-sidenav-menu">
            <div class="nav">
              <div class="sb-sidenav-menu-heading"></div>
              <!-- <a class="nav-link" href="display.php">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
            Home
          </a> -->
              <a class="nav-link text-dark" href="banner.php">
                <div class="sb-nav-link-icon "><i class="fa fa-home text-dark" style="font-size: large;"></i></div>
                <b> BANNER</b>
              </a>
              <a class="nav-link text-dark" href="products.php">
                <div class="sb-nav-link-icon"><i class="fa fa-shopping-cart text-dark" style="font-size: large;"></i></div>
                <b>PRODUCTS</b>
              </a>
              <a class="nav-link text-dark" href="buyerform.php">
                <div class="sb-nav-link-icon"><i class="fa fa-shopping-bag text-dark" style="font-size: large;"></i></div>
                <b>BUYER FORM</b>
              </a>
              <!-- <div class="sb-sidenav-menu-heading">Interface</div> -->
              <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
            Layouts
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
          </a> -->
              <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <!-- <nav class="sb-sidenav-menu-nested nav">
              <a class="nav-link" href="layout-static.html">Static Navigation</a>
              <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
            </nav> -->
              </div>
              <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
            Pages
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
          </a> -->
              <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                  <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                Authentication
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a> -->
                  <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">

                  </div>
                  <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                Error
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a> -->
                  <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">

                  </div>
                </nav>
              </div>
              <!-- <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a> -->
              <!-- <a class="nav-link" href="addbanner.php">
            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
            ADD BANNER
          </a>
          <a class="nav-link" href="addproducts.php">
            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
            ADD PRODUCTS
          </a> -->
              <!-- <a class="nav-link" href="buyerform.php">
            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
            Buyer Form
          </a> -->
              <!-- buyerform.php -->

            </div>
          </div>
          <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            2nd Heand Cable Machinery
          </div>
        </nav>
      </div>
    </div>
  </div>





  <style>
    /* .sb-sidenav-menu{
    box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;
  } */

    .fa-shopping-bag {
      font-size: 30px;
    }
  </style>