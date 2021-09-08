<?php
session_start();
if(strlen($_SESSION['alogin'])==0)
{
    header('location:../index.php');
}
include("../includes/config.php");
$ret=mysqli_query($con,"SELECT * FROM acara where IdAcara =  $_GET[idAcara]");
$data = mysqli_fetch_array($ret);
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
                    <form action="ubahAcaraAksi.php?idAcara=<?php echo $_GET['idAcara']?>" method="post" enctype="multipart/form-data">
                        <h1 class="text-center" style="color:#000000 ">Form Ubah Acara</h1>
                        <hr>
                        <input name="idAcara" class="form-control" value="<?php echo $_GET['idAcara']?>" type="hidden" readonly>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend" style="width: 33%">
                                    <span class="input-group-text" style="width: 100%"> Nama Acara </span>
                                </div>
                                <input name="ubahnamaAcara" class="form-control" placeholder="Nama Acara" value="<?php echo $data[2]?>" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <?php
                            $exampleDate = $data["TanggalAcara"];
                            $exampleDate = strtotime($exampleDate);
                            $newDate = date('Y-m-d\TH:i', $exampleDate);
                            ?>
                            <div class="input-group">
                                <div class="input-group-prepend" style="width: 33%">
                                    <span class="input-group-text" style="width: 100%"> Tanggal Acara </span>
                                </div>
                                <input class="form-control" name="ubahtanggalAcara" type="datetime-local" value="<?php echo $newDate?>">
                            </div>
                        </div>
                        <!--                                        LOGO-->
                        <div class="form-group">
                            <div class="input-group">
                                <input id="checklogo" type="checkbox" name="ubah_logo" value="true">
                                <label style="margin-top: -2px;margin-left: 2px" for="checklogo">Check jika ingin mengubah gambar logo</label>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend" style="width: 33%">
                                    <span class="input-group-text" style="width: 100%"> Logo </span>
                                </div>
                                <div class="custom-file">
                                    <input name="ubahlogoAcara" type="file" class="custom-file-input" id="inputGroupFileLogo"
                                           aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFileLogo"><?php echo $data[5]?></label>
                                </div>
                            </div>
                        </div>
                        <!--                                        PENANDATANGAN 1-->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend" style="width: 33%">
                                    <span class="input-group-text" style="width: 100%"> Nama Penandatangan 1 </span>
                                </div>
                                <input name="ubahnamaPenandatangan1" class="form-control" placeholder="Nama Penandatangan 1" value="<?php echo $data[8] ?>" type="text">
                            </div>
                        </div>
                        <!--                                        PENANDATANGAN 2-->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend" style="width: 33%">
                                    <span class="input-group-text" style="width: 100%"> Nama Penandatangan 2 </span>
                                </div>
                                <input name="ubahnamaPenandatangan2" class="form-control" placeholder="Nama Penandatangan 2" value="<?php echo $data[9] ?>" type="text">
                            </div>
                        </div>
                        <!--                                        //TTD1-->
                        <div class="form-group">
                            <div class="input-group">
                                <input id="checkttd1" type="checkbox" name="ubah_ttd1" value="true">
                                <label style="margin-top: -2px;margin-left: 2px" for="checkttd1">Check jika ingin mengubah TTD 1</label>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend" style="width: 33%">
                                    <span class="input-group-text" style="width: 100%"> Tanda tangan 1 </span>
                                </div>
                                <div class="custom-file">
                                    <input name="ubahparaf1" type="file" class="custom-file-input" id="inputGroupFileParaf1"
                                           aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFileParaf1"><?php echo $data[6]?></label>
                                </div>
                            </div>
                        </div>

                        <!--                                        //TTD2-->
                        <div class="form-group">
                            <div class="input-group">
                                <input id="checkttd2" type="checkbox" name="ubah_ttd2" value="true">
                                <label style="margin-top: -2px;margin-left: 2px" for="checkttd2">Check jika ingin mengubah TTD 2</label>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend" style="width: 33%">
                                    <span class="input-group-text" style="width: 100%"> Tanda tangan 2 </span>
                                </div>
                                <div class="custom-file">
                                    <input name="ubahparaf2" type="file" class="custom-file-input" id="inputGroupFileParaf2"
                                           aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFileParaf2"><?php echo $data[7]?></label>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="ubahAcara" class="btn btn-primary btn-block"> UBAH  </button>
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

</body>
</html>
