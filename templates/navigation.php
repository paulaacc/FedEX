<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="../web/dashboard.php" class="site_title">
                        <i class="fa fa-home"></i>
                        <span>Main</span>
                    </a>
                </div>

                <div class="clearfix"></div>

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-home"></i>Dashboard<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
<!--                                    <li><a href="d1.php">View Drums</a></li>-->
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-home"></i> Filter <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
<!--                                    <li><a href="e1.php">Add Jobs</a></li>-->
<!--                                    <li><a href="e1-2.php">Add Jobs 2</a></li>-->
                                    <li><a href="filterList.php">Filter List</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a> -->
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"aria-expanded="false">
								<?php echo $_SESSION['username'];?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
							
								<?php								
									if ($_SERVER['SERVER_NAME'] == "localhost") {
										$path = "http://localhost/KSLetricMalaysia/includes/server/newranksys.php?action=logout";
									} else {
										$path = "http://" . $_SERVER['SERVER_NAME'] . "/includes/server/newranksys.php?action=logout";
									}										
								?>						
							
                                <li><a href="<?php echo $path; ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->
