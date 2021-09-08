<?php
session_start();
include("../includes/config.php");
if(strlen($_SESSION['alogin'])==0)
{
    header('location:../index.php');
}
$ret=mysqli_query($con,"SELECT * FROM templatesertifikat");
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="konfirmasihapus/bootbox.min.js"></script>
    <script src="konfirmasihapus/script.js"></script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"> <span>E-Sertifikat </span></a>
            </div>

            <div class="clearfix"></div>


            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
<!--                  <li><a href="index.php"><i class="fa fa-home"></i> Home </span></a></li>-->
                  <li><a href="template.php"><i class="fa fa-edit"></i> Template Sertifikat</a></li>
                  <li><a href="penyelenggara.php"><i class="fa fa-users"></i> Akun Penyelenggara </a></li>
                  <li><a href="../index.php"><i class="fa fa-power-off"></i> Logout </a></li>
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
                        <a class="dropdown-item"  href="../index.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
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
                <h3>Template Sertifikat</h3>
              </div>
            </div>
            
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a href="uploadTemplate.php"><i class="fa fa-upload"></i> Upload Template </a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <?php $modal = 0; ?>
                            <?php foreach (mysqli_fetch_all($ret) as $x) {?>
                            <div class="col-md-55">
                                <div class="thumbnail">
                                <div class="image view view-first">
                                    <img style="width: 100%; display: block;" src="images/<?php echo $x[3]?>" alt="image" />
                                    <div class="mask">
                                    <p><?php echo $x[2]?></p>
                                    <div class="tools tools-bottom">
                                        <a href="ubahTemplate.php?idTemplate=<?php echo $x[0]?>" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a type="button" data-id="<?php echo $x[0]?>" id="temp" data-toggle="modal" data-target="#myModal<?php echo $modal; ?>" title="Delete"><i class="fa fa-times"></i></a>
                                    </div>
                                    </div>
                                </div>
                                <div class="caption">
                                    <p><?php echo $x[2]?></p>
                                </div>
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
                                                    <p>Apakah anda ingin menghapus data <?php echo $x[2]?>?</p>
                                                    <input type="hidden" name="hiddenValue" id="hiddenValue" value="" />
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" onclick="window.location.href='hapusTemplate.php?idTemplate=<?php echo $x[0]?>';">Hapus</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <?php $modal++;
                            } ?>
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


    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <!-- MODAL -->


  </body>

</html>
