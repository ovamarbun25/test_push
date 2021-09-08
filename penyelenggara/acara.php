<?php
    session_start();
    include("../includes/config.php");
    if(strlen($_SESSION['alogin'])==0)
    {
        header('location:../index.php');
    }
    $ret=mysqli_query($con,"SELECT * FROM acara where IdPenyelenggara = $_SESSION[id]");
    $nomor = 1;
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

    <title>E-Sertifikat </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"> <span>E-Sertifikat </span></a>
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
                      <a href="#" class="user-profile" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <img src="images/img.png" alt=""> <?php echo $_SESSION['alogin']; ?>
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
                <h3>Acara</h3>
              </div>
            </div>
            
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a href="tambahAcara.php"><i class="fa fa-upload"></i> Tambah Acara </a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <?php $modal = 0; ?>
                            <?php foreach (mysqli_fetch_all($ret) as $x) {?>
                            <div class="col-md-3  profile_details">
                                <div style="text-align: center;">
                                  <div class="well profile_view" style="padding: 10px; width: 100%"">
                                    <div class="col-sm-12">
                                      <a href="peserta.php?idAcara=<?php echo $x[0]?>">
                                        <h3><?php echo $x[2]?></h3>
                                        <h2><?php echo $x[3]?></h2>
                                        <br>
                                      </a>
                                      <div class="col-sm-12 emphasis">
                                          <button type="button" class="btn btn-success btn-sm">
                                              <a href="lihatAcara.php?idAcara=<?php echo $x[0]?>" style="color: white"><i class="fa fa-eye"></i> View</a>
                                        <button type="button" class="btn btn-info btn-sm">
                                          <a href="ubahAcara.php?idAcara=<?php echo $x[0]?>" style="color: white"><i class="fa fa-pencil"></i> Edit</a>
                                        <button type="button" class="btn btn-danger btn-sm">
                                        <a type="button" style="color: white" data-id="<?php echo $x[0]?>" data-toggle="modal" data-target="#myModal<?php echo $modal; ?>"><i class="fa fa-times"></i> Delete</a>
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                                <!--Modals delete-->
                                <div class="modal" id="myModal<?php echo $modal; ?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Template </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah anda ingin menghapus data acara <?php echo $x[2]?>?</p>
                                                <input type="hidden" name="hiddenValue" id="hiddenValue" value="" />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" onclick="window.location.href='deleteAcara.php?idAcara=<?php echo $x[0]?>';">Hapus</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php  $modal++; } ?>
                            <!-- TUTUP LOOP  Foreach -->

                        </div>
                    </div>
                </div>
                </div>
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
	
  </body>
</html>
