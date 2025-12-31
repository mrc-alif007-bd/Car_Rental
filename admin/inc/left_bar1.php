
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard_admin.php" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block"><?php echo ($_SESSION['user_id']) ?  $_SESSION['user_id'] : ""; ?></a>
            </div> <br>
            <div class="info">
                <a href="#" class="d-block"><?php echo ($_SESSION['name']) ? $_SESSION['name'] : ""; ?></a>
            </div>            
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-user"></i>
                        <p>
                             Cars
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="all_cars.php" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Cars</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="add_new_car.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Car</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-user"></i>
                        <p>
                             Booking List
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="admin_bookings.php" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bookings</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-user"></i>
                        <p>
                             Payments
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="payment_table.php" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Payments</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-user"></i>
                        <p>
                             Employees
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="employees.php" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Employees</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="add_new_employee.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Employee</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-user"></i>
                        <p>
                             Client
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="client.php" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Client</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Tables
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="contact.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contact Tables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="employees.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Testimonial Table</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li><a href="logout.php" class="btn btn-primary btn-md float-right">logout</a></li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>