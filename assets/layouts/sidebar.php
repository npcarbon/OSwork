    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" v-pre>
            <?=$_SESSION['UName'];?> <span class="caret"></span>
        </a>

          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="function/logout.php">
                ออกจากระบบ
            </a>

          </div>
        </li>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
      <img src="assets/dist/img/logo.png" alt="Databar Logo" class="brand-image " style="opacity: .8">
      <span class="brand-text font-weight-light">Databar Co.,Ltd.</span>
    </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="assets/dist/img/avatar04.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="" class="d-block"><?=$_SESSION['UName'];?> </a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview  <?=$menu;?>">
              <a href="#" class="nav-link" >
              <i class="nav-icon fa fa-asterisk"></i>
              <p>
                Service Manager
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
              <ul class="nav nav-treeview">
              <li class="nav-item" >
                  <a href="createjob.php" class="nav-link" >
                  <i class="fa  nav-icon"></i>
                  <p>New Orders</p>
                </a>
                </li>
                <li class="nav-item">
                  <a href="allservice.php" class="nav-link" >
                  <i class="fa  nav-icon"></i>
                  <p>All Orders</p>
                </a>
                </li>
                <li class="nav-item" >
                  <a href="acknowledge.php" class="nav-link" >
                  <i class="fa  nav-icon"></i>
                  <p>Acknowledge</p>
                </a>
                </li>
                <li class="nav-item">
                  <a href="assigned.php" class="nav-link" >
                  <i class="fa  nav-icon"></i>
                  <p>Assigned</p>
                </a>
                </li>
                <li class="nav-item">
                  <a href="quotation.php" class="nav-link">
                  <i class="fa  nav-icon"></i>
                  <p>Quotation</p>
                </a>
                </li>
                <li class="nav-item">
                  <a href="completed.php" class="nav-link" >
                  <i class="fa  nav-icon"></i>
                  <p>Completed or Cancel</p>
                </a>
                </li>

              </ul>
            </li>
            <li class="nav-item has-treeview ">
              <a href="#" class="nav-link">
              <i class="nav-icon fa fa-info-circle"></i>
              <p>
                About ...
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="customer" class="nav-link">
                  <i class="fa  nav-icon"></i>
                  <p>Customers</p>
                </a>
                </li>
                <li class="nav-item">
                  <a href="page=technician" class="nav-link">
                  <i class="fa  nav-icon"></i>
                  <p>Technicials</p>
                </a>
                </li>
                <li class="nav-item">
                  <a href="status" class="nav-link">
                  <i class="fa  nav-icon"></i>
                  <p>Status</p>
                </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview ">
              <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user-circle-o"></i>
              <p>
                Data's Managements
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="newuser.php" class="nav-link">
                  <i class="fa  nav-icon"></i>
                  <p>Create New User</p>
                </a>
                </li>
                <li class="nav-item">
                  <a href="user.php" class="nav-link">
                  <i class="fa  nav-icon"></i>
                  <p>View Users</p>
                </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview ">
              <a href="#" class="nav-link">
              <i class="nav-icon fa fa-exchange"></i>
              <p>
                Borrow Demo
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="viewdemo" class="nav-link">
                    <i class="fa  nav-icon"></i>
                    <p>View</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="borrow" class="nav-link">
                    <i class="fa  nav-icon"></i>
                  <p>Borrow</p>
                </a>
                </li>
                <li class="nav-item">
                  <a href="return" class="nav-link">
                    <i class="fa  nav-icon"></i>
                  <p>Return</p>
                </a>
                </li>
              </ul>
            </li>
          </ul>

        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
