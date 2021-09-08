<?php
include "../includes/config.php";

$idAcara=$_GET['idAcara'];

$query2 = "DELETE FROM peserta";
$sql2 = mysqli_query($con, $query2);

    if($sql2){
        echo "<script>alert('Data peserta berhasil dihapus.');</script>";
        header('location:acara.php');
    }else{
        echo "<script>alert('Data peserta gagal dihapus.');</script>";
        header('location:acara.php');
    }
