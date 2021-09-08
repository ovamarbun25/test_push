<?php
include_once("../includes/config.php");
if(isset($_POST['submitEdit'])){
    $id = $_POST['idPenyelenggara'];
    $namaPenyelenggara=$_POST['namaPenyelenggara'];
    $username=$_POST['usernamePenyelenggara'];
    $password=$_POST['passwordPenyelenggara'];
    $query=mysqli_query($con,
        "UPDATE `penyelenggara` SET 
                           `NamaPenyelenggara` = '$namaPenyelenggara', 
                           `UsernamePenyelenggara` = '$username', 
                           `PasswordPenyelenggara` = '$password' 
                            WHERE `penyelenggara`.`IdPenyelenggara` = $id;");
    if($query)
    {
        echo "<script>alert('Data berhasil diubah.');</script>";
        header('location:penyelenggara.php');
    }
    else{
        echo "<script>alert('Data gagal diubah.');</script>";
        header('location:penyelenggara.php');
    }
//    echo $id;
//    echo $namaPenyelenggara;
//    echo $username;
//    echo $password;

}



?>