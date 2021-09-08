<?php
session_start();
if(strlen($_SESSION['alogin'])==0)
{
    header('location:../index.php');
}
include("../includes/config.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />
    <link rel="stylesheet" href="css/daftarPenyelenggara.css">

    <title>E-Sertifikat </title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/eff288a703.js" crossorigin="anonymous"></script>
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"> <span>E-Sertifikat </span></a>
                </div>

                <div class="clearfix"></div>


                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a href="template.php"><i class="fa fa-edit"></i> Template Sertifikat </span></a></li>
                            <li><a href="acara.php"><i class="fa fa-file"></i> Acara</a></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout </a></li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                    <ul class=" navbar-right">
                        <li class="nav-item dropdown open" style="padding-left: 15px;">
                            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                <img src="images/img.png" alt=""> <?php echo $_SESSION['alogin']; ?>
                            </a>
                            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"  href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Ubah Acara</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <div class="signup-form-xl">
                    <form action="ubahAcaraAksi.php" method="post" enctype="multipart/form-data">
                        <h1 class="text-center" style="color:#000000 ">Pilih yang di Print</h1>
                        <hr>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <label class="control-label col-md-6 col-sm-6 ">Nama Acara</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <div style="width: 100%">
                                            <label>
                                                <input type="checkbox" class="js-switch" checked />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <label class="control-label col-md-6 col-sm-6 ">Tanggal Acara</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <div style="width: 100%">
                                            <label>
                                                <input type="checkbox" class="js-switch" checked />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <label class="control-label col-md-6 col-sm-6 ">Penandatangan 1</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <div style="width: 100%">
                                            <label>
                                                <input type="checkbox" class="js-switch" checked />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <label class="control-label col-md-6 col-sm-6 ">Penandatangan 2</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <div style="width: 100%">
                                            <label>
                                                <input type="checkbox" class="js-switch" checked />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="control-label col-md-6 col-sm-6 ">Logo</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <div style="width: 100%">
                                                <label>
                                                    <input type="checkbox" class="js-switch" checked />
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group">
                                    <label class="control-label col-md-6 col-sm-6 ">Nama Peserta</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <div style="width: 100%">
                                            <label>
                                                <input type="checkbox" class="js-switch" checked />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <label class="control-label col-md-6 col-sm-6 ">Status Peserta</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <div style="width: 100%">
                                            <label>
                                                <input type="checkbox" class="js-switch" checked />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="" class="btn btn-primary btn-block"> Print</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                PAIII-05 2021 D4 TRPL <a href="https://www.del.ac.id">IT Del</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="../vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="../vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="../vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="../vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="../vendors/Flot/jquery.flot.js"></script>
<script src="../vendors/Flot/jquery.flot.pie.js"></script>
<script src="../vendors/Flot/jquery.flot.time.js"></script>
<script src="../vendors/Flot/jquery.flot.stack.js"></script>
<script src="../vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="../vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="../vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>
<script src="../vendors/switchery/dist/switchery.min.js"></script>
</body>
</html>
