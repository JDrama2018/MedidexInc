<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Medidex Admin - <?php echo $type?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet">
    <?php if ($type == "Provider") { ?>
        <link href="css/provider.css" rel="stylesheet">
    <?php } ?>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin/dashboard"><img src="img/logo_white.png"></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Loreum Ipsum</a>
                        </li>
                        <li>
                            <a href="#">Loreum Ipsum</a>
                        </li>
                        <li>
                            <a href="#">Loreum Ipsum</a>
                        </li>
                        <li>
                            <a href="#">Loreum Ipsum</a>
                        </li>
                        <li>
                            <a href="#">Loreum Ipsum</a>
                        </li>
                        <li>
                            <a href="#">Loreum Ipsum</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/user_dp.png"> <?php echo $username?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/admin/profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/admin/dashboard/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                <?php if ($type == "Patient") { ?>
                    <li class="active"> <a href="/admin/dashboard"><i class="fa fa-tachometer"></i> Dashboard</a> </li>
                    <li> <a href="/admin/health_tracker"><i class="fa fa-heartbeat"></i> Health Tracker</a> </li>
                    <li> <a href="/admin/prescriptions"><i class="fa fa-sticky-note"></i> Prescription</a> </li>
                    <li> <a href="/admin/under_construction"><i class="fa fa-fw fa-table"></i> Lab Results</a> </li>
                    <li> <a href="/admin/appointments"><i class="fa fa-fw fa-edit"></i> Appointmens</a> </li>
                    <li> <a href="/admin/health_overview"><i class="fa fa-heart"></i> Health Overview</a> </li>
                    <li> <a href="/admin/under_construction"><i class="fa fa-file-text"></i> Billing</a> </li>
                    <li> <a href="/admin/under_construction"><i class="fa fa-file-text-o"></i> Forms</a> </li>
                    <li> <a href="/admin/under_construction"><i class="fa fa-ambulance"></i> Emergency</a> </li>
                    <li> <a href="/admin/under_construction"><i class="fa fa-map-marker"></i> Location</a> </li>
                    <li> <a href="/admin/under_construction"><i class="fa fa-user-circle"></i> Care Team</a> </li>
                <?php } else { ?>
                    <li class="active"><a href="/admin/dashboard"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                    <li><a href="/admin/patients"><i class="fa fa-heartbeat"></i> Patients</a></li>
                    <li><a href="/admin/under_construction"><i class="fa fa-sticky-note"></i> Prescription</a></li>
                    <li><a href="/admin/under_construction"><i class="fa fa-fw fa-table"></i> Lab Results</a></li>
                    <li><a href="/admin/appointments"><i class="fa fa-fw fa-edit"></i> Appointmens</a></li>
                    <li><a href="/admin/under_construction"><i class="fa fa-heart"></i>  Pharmacy</a></li>
                    <li><a href="/admin/under_construction"><i class="fa fa-file-text"></i> Reminders</a></li>
                    <li><a href="/admin/under_construction"><i class="fa fa-file-text-o"></i> Calendar</a></li>
                    <li><a href="/admin/under_construction"><i class="fa fa-ambulance"></i> Forms</a></li>
                    <li><a href="/admin/under_construction"><i class="fa fa-map-marker"></i> Insurance</a></li>
                    <li><a href="/admin/under_construction"><i class="fa fa-user-circle"></i> Care Team</a></li>
                <?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                        </h1>
                        
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-bell fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">0</div>
                                        <div>Reminders</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-flag fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">0</div>
                                        <div>Notificatioss</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo count($appointments)?></div>
                                        <div>Appointments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="/admin/appointments">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading pink_head">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Health Tracker</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-area-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading green_head">
                                <h3 class="panel-title"><i class="fa fa-calendar"></i> Appointment Status</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Specialty</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($appointments)) {
                                                foreach ($appointments as $appointment) {
                                                    echo '<tr>';
                                                    echo '<td valign="middle">'.$appointment->availableDate.'</td>';
                                                    echo '<td valign="middle">'.$appointment->name.'</td>';
                                                    echo '<td valign="middle">'.$appointment->specialty.'</td>';
                                                    echo '<td><button class="btn_accept">Accept</button><button class="btn_cancel">Cancel</button></td>';
                                                    echo '</tr>';
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="/admin/appointments">View All Appointment <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
