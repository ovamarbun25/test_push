<?php
// Load file koneksi.php
include "../includes/config.php";

$idAcara = $_GET['idAcara'];
$query = "SELECT * FROM acara WHERE IdAcara='$idAcara'";
$sql = mysqli_query($con,$query);
$dataAcara = mysqli_fetch_array($sql);
$query2 = "DELETE FROM acara WHERE IdAcara='$idAcara'";
$sql2 = mysqli_query($con, $query2);

if($sql2){
    $dirPath = "Sertifikat/".$dataAcara[2];
    if (! is_dir($dirPath)) {
        header('location:acara.php');
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
    echo "<script>alert('Acara berhasil dihapus.');</script>";
    header('location:acara.php');
}else{
    echo "<script>alert('Acara gagal dihapus.');</script>";
    header('location:acara.php');
}