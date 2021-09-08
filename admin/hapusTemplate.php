<?php
include "../includes/config.php";

$idTemplate = $_GET['idTemplate'];

$query = "SELECT * FROM templatesertifikat WHERE IdTemplate ='".$idTemplate."'";
$sql = mysqli_query($con, $query);
$data = mysqli_fetch_array($sql);

if(is_file("images/".$data['Template'])) {
    $sqlquery = "DELETE FROM templatesertifikat WHERE IdTemplate='" . $idTemplate . "'";
    $sql2 = mysqli_query($con, $sqlquery);

    if ($sql2) {
        header("location: template.php");
    } else {
        echo "Data gagal dihapus. <a href='template.php'>Kembali</a>";
    }
}
else{
    $sqlquery = "DELETE FROM templatesertifikat WHERE IdTemplate='" . $idTemplate . "'";
    $sql2 = mysqli_query($con, $sqlquery);
    header("location: template.php");
}
?>
