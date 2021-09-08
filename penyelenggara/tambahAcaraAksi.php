<?php
session_start();
if(strlen($_SESSION['alogin'])==0)
{
    header('location:../index.php');
}
error_reporting(0);
include("../includes/config.php");

if(isset($_POST['tambahAcara'])) {
    $ids = $_POST['idPenyelenggara'];
    $namaAcara=$_POST['namaAcara'];
    $tanggalAcara = $_POST['tanggal'];
    $ttd1 = $_POST['penandatangan1'];
    $ttd2 = $_POST['penandatangan2'];

    //LOGO
    $nama_file_logo = $_FILES['logoAcara']['name'];
    $ukuran_file_logo = $_FILES['logoAcara']['size'];
    $tipe_file_logo = $_FILES['logoAcara']['type'];
    $tmp_file_logo = $_FILES['logoAcara']['tmp_name'];
    $path_logo = "Item Sertifikat/Logo/" . $nama_file_logo;

    //Paraf 1
    $nama_file_paraf1 = $_FILES['paraf1']['name'];
    $ukuran_file_paraf1 = $_FILES['paraf1']['size'];
    $tipe_file_paraf1 = $_FILES['paraf1']['type'];
    $tmp_file_paraf1 = $_FILES['paraf1']['tmp_name'];
    $path_paraf1 = "Item Sertifikat/Ttd 1/" . $nama_file_paraf1;
    //Paraf 2
    $nama_file_paraf2 = $_FILES['paraf2']['name'];
    $ukuran_file_paraf2 = $_FILES['paraf2']['size'];
    $tipe_file_paraf2 = $_FILES['paraf2']['type'];
    $tmp_file_paraf2 = $_FILES['paraf2']['tmp_name'];
    $path_paraf2 = "Item Sertifikat/Ttd 2/" . $nama_file_paraf2;
    if (trim($nama_file_logo)=="" && trim($nama_file_paraf1) == "" && trim($nama_file_paraf2) =="" ){

                    $query = "insert into acara(IdAcara,IdPenyelenggara,NamaAcara,TanggalAcara,StatusPrint,Logo,Paraf1,Paraf2,Penandatangan1,Penandatangan2) 
                             values('','$ids','$namaAcara','$_POST[tanggal]','','','','','$ttd1','$ttd2')";
                    $sql = mysqli_query($con, $query); // Eksekusi/ Jalankan query dari variabel $query
                    if ($sql) {
                        header("location: acara.php");
                    }else{
                        header("location: index.php");
                    }
    }elseif (trim($nama_file_logo) == "" && trim($nama_file_paraf1)=="")
    {
        if ($tipe_file_paraf2 == "image/png") { // Cek apakah tipe file yang diupload adalah PNG
            // Jika tipe file yang diupload PNG, lakukan :
            if ($ukuran_file_paraf2 <= 10000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                // Proses upload
                if (move_uploaded_file($tmp_file_paraf2,$path_paraf2)){
                    $query = "insert into acara(IdAcara,IdPenyelenggara,NamaAcara,TanggalAcara,StatusPrint,Logo,Paraf1,Paraf2,Penandatangan1,Penandatangan2) 
                             values('','$ids','$namaAcara','$_POST[tanggal]','','','','$nama_file_paraf2','$ttd1','$ttd2')";
                    $sql = mysqli_query($con, $query); // Eksekusi/ Jalankan query dari variabel $query
                    if ($sql) {
                        header("location: acara.php");
                    }else{
                        // Jika Gagal, Lakukan :
                        echo '<script>alert("Maaf, Terjadi kesalahan upload file")</script>';
                        header("location: index.php");
                    }
                }else{
                    echo '<script>alert("Maaf, gambar gagal diupload")</script>';
                    header("location: acara.php");
                }
            } else {
                echo '<script>alert("Maaf, Ukuran gambar yang diupload harus Lebih kecil dari 1 MB")</script>';
                header("location: acara.php");
            }
        } else {
            // Jika tipe file yang diupload bukan PNG, lakukan :
            echo '<script>alert("Maaf, Tipe gambar yang diupload harus PNG.")</script>';
            header("location: acara.php");
        }
    }
    elseif (trim($nama_file_logo) == "" && trim($nama_file_paraf2)==""){
        if ($tipe_file_logo == "image/png" && $tipe_file_paraf1 == "image/png") { // Cek apakah tipe file yang diupload adalah PNG
            // Jika tipe file yang diupload PNG, lakukan :
            if ($ukuran_file_logo <= 10000000 && $ukuran_file_paraf1 <= 10000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                // Proses upload
                if (move_uploaded_file($tmp_file_logo,$path_logo)  &&
                    move_uploaded_file($tmp_file_paraf1,$path_paraf1)){
                    $query = "insert into acara(IdAcara,IdPenyelenggara,NamaAcara,TanggalAcara,StatusPrint,Logo,Paraf1,Paraf2,Penandatangan1,Penandatangan2) 
                             values('','$ids','$namaAcara','$_POST[tanggal]','','$nama_file_logo','$nama_file_paraf1','','$ttd1','$ttd2')";
                    $sql = mysqli_query($con, $query); // Eksekusi/ Jalankan query dari variabel $query
                    if ($sql) {
                        header("location: acara.php");
                    }else{
                        // Jika Gagal, Lakukan :
                        echo '<script>alert("Maaf, Terjadi kesalahan upload file")</script>';
                        header("location: index.php");
                    }
                }else{
                    echo '<script>alert("Maaf, gambar gagal diupload")</script>';
                    header("location: acara.php");
                }
            } else {
                echo '<script>alert("Maaf, Ukuran gambar yang diupload harus Lebih kecil dari 1 MB")</script>';
                header("location: acara.php");
            }
        } else {
            // Jika tipe file yang diupload bukan PNG, lakukan :
            echo '<script>alert("Maaf, Tipe gambar yang diupload harus PNG.")</script>';
            header("location: acara.php");
        }
    }
    elseif (trim($nama_file_paraf1) == "" && trim($nama_file_paraf2)==""){
        if ($tipe_file_logo == "image/png") { // Cek apakah tipe file yang diupload adalah PNG
            // Jika tipe file yang diupload PNG, lakukan :
            if ($ukuran_file_logo <= 10000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                // Proses upload
                if (move_uploaded_file($tmp_file_logo,$path_logo)){
                    $query = "insert into acara(IdAcara,IdPenyelenggara,NamaAcara,TanggalAcara,StatusPrint,Logo,Paraf1,Paraf2,Penandatangan1,Penandatangan2) 
                             values('','$ids','$namaAcara','$_POST[tanggal]','','$nama_file_logo','','','$ttd1','$ttd2')";
                    $sql = mysqli_query($con, $query); // Eksekusi/ Jalankan query dari variabel $query
                    if ($sql) {
                        header("location: acara.php");
                    }else{
                        // Jika Gagal, Lakukan :
                        echo '<script>alert("Maaf, Terjadi kesalahan upload file")</script>';
                        header("location: index.php");
                    }
                }else{
                    echo '<script>alert("Maaf, gambar gagal diupload")</script>';
                    header("location: acara.php");
                }
            } else {
                echo '<script>alert("Maaf, Ukuran gambar yang diupload harus Lebih kecil dari 1 MB")</script>';
                header("location: acara.php");
            }
        } else {
            // Jika tipe file yang diupload bukan PNG, lakukan :
            echo '<script>alert("Maaf, Tipe gambar yang diupload harus PNG.")</script>';
            header("location: acara.php");
        }
    }elseif (trim($nama_file_paraf1) == ""){
        if ($tipe_file_logo == "image/png" && $tipe_file_paraf2 == "image/png") { // Cek apakah tipe file yang diupload adalah PNG
            // Jika tipe file yang diupload PNG, lakukan :
            if ($ukuran_file_logo <= 10000000 && $ukuran_file_paraf2 <= 10000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                // Proses upload
                if (move_uploaded_file($tmp_file_logo,$path_logo)  &&
                    move_uploaded_file($tmp_file_paraf2,$path_paraf2)){
                    $query = "insert into acara(IdAcara,IdPenyelenggara,NamaAcara,TanggalAcara,StatusPrint,Logo,Paraf1,Paraf2,Penandatangan1,Penandatangan2) 
                             values('','$ids','$namaAcara','$_POST[tanggal]','','$nama_file_logo','','$nama_file_paraf2','$ttd1','$ttd2')";
                    $sql = mysqli_query($con, $query); // Eksekusi/ Jalankan query dari variabel $query
                    if ($sql) {
                        header("location: acara.php");
                    }else{
                        // Jika Gagal, Lakukan :
                        echo '<script>alert("Maaf, Terjadi kesalahan upload file")</script>';
                        header("location: index.php");
                    }
                }else{
                    echo '<script>alert("Maaf, gambar gagal diupload")</script>';
                    header("location: acara.php");
                }
            } else {
                echo '<script>alert("Maaf, Ukuran gambar yang diupload harus Lebih kecil dari 1 MB")</script>';
                header("location: acara.php");
            }
        } else {
            // Jika tipe file yang diupload bukan PNG, lakukan :
            echo '<script>alert("Maaf, Tipe gambar yang diupload harus PNG.")</script>';
            header("location: acara.php");
        }
    }elseif (trim($nama_file_paraf2) == ""){
        if ($tipe_file_logo == "image/png" && $tipe_file_paraf1 == "image/png") { // Cek apakah tipe file yang diupload adalah PNG
            // Jika tipe file yang diupload PNG, lakukan :
            if ($ukuran_file_logo <= 10000000 && $ukuran_file_paraf1 <= 10000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                // Proses upload
                if (move_uploaded_file($tmp_file_logo,$path_logo)  &&
                    move_uploaded_file($tmp_file_paraf1,$path_paraf1)){
                    $query = "insert into acara(IdAcara,IdPenyelenggara,NamaAcara,TanggalAcara,StatusPrint,Logo,Paraf1,Paraf2,Penandatangan1,Penandatangan2) 
                             values('','$ids','$namaAcara','$_POST[tanggal]','','$nama_file_logo','$nama_file_paraf1','','$ttd1','$ttd2')";
                    $sql = mysqli_query($con, $query); // Eksekusi/ Jalankan query dari variabel $query
                    if ($sql) {
                        header("location: acara.php");
                    }else{
                        // Jika Gagal, Lakukan :
                        echo '<script>alert("Maaf, Terjadi kesalahan upload file")</script>';
                        header("location: index.php");
                    }
                }else{
                    echo '<script>alert("Maaf, gambar gagal diupload")</script>';
                    header("location: acara.php");
                }
            } else {
                echo '<script>alert("Maaf, Ukuran gambar yang diupload harus Lebih kecil dari 1 MB")</script>';
                header("location: acara.php");
            }
        } else {
            // Jika tipe file yang diupload bukan PNG, lakukan :
            echo '<script>alert("Maaf, Tipe gambar yang diupload harus PNG.")</script>';
            header("location: acara.php");
        }
    }
    else{
        if ($tipe_file_logo == "image/png" && $tipe_file_paraf1 == "image/png" && $tipe_file_paraf2 == "image/png") { // Cek apakah tipe file yang diupload adalah PNG
            // Jika tipe file yang diupload PNG, lakukan :
            if ($ukuran_file_logo <= 10000000 && $ukuran_file_paraf1 <= 10000000 && $ukuran_file_paraf2 <= 10000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                // Proses upload
                if (move_uploaded_file($tmp_file_logo,$path_logo) && move_uploaded_file($tmp_file_paraf1,$path_paraf1) &&
                    move_uploaded_file($tmp_file_paraf2,$path_paraf2)){
                    $query = "insert into acara(IdAcara,IdPenyelenggara,NamaAcara,TanggalAcara,StatusPrint,Logo,Paraf1,Paraf2,Penandatangan1,Penandatangan2) 
                             values('','$ids','$namaAcara','$_POST[tanggal]','','$nama_file_logo','$nama_file_paraf1','$nama_file_paraf2','$ttd1','$ttd2')";
                    $sql = mysqli_query($con, $query); // Eksekusi/ Jalankan query dari variabel $query
                    if ($sql) {
                        header("location: acara.php");
                    }else{
                        // Jika Gagal, Lakukan :
                        echo '<script>alert("Maaf, Terjadi kesalahan upload file")</script>';
                        header("location: index.php");
                    }
                }else{
                    echo '<script>alert("Maaf, gambar gagal diupload")</script>';
                    header("location: acara.php");
                }
            } else {
                echo '<script>alert("Maaf, Ukuran gambar yang diupload harus Lebih kecil dari 1 MB")</script>';
                header("location: acara.php");
            }
        } else {
            // Jika tipe file yang diupload bukan PNG, lakukan :
            echo '<script>alert("Maaf, Tipe gambar yang diupload harus PNG.")</script>';
            header("location: acara.php");
        }
    }
}