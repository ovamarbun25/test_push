<?php
// Load file koneksi.php
include "../includes/config.php";

// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
$idAcara = $_POST['idAcara'];

// Ambil Data yang Dikirim dari Form
$namaAcara= $_POST['ubahnamaAcara'];
$tanggalAcara = $_POST['ubahtanggalAcara'];
$namaPenandatangan1 = $_POST['ubahnamaPenandatangan1'];
$namaPenandatangan2 = $_POST['ubahnamaPenandatangan2'];

// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubah_logo'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
    // Ambil data foto yang dipilih dari form
    $foto_logo = $_FILES['ubahlogoAcara']['name'];
    $tmp_logo = $_FILES['ubahlogoAcara']['tmp_name'];


    // Set path folder tempat menyimpan fotonya
    $path_logo = "Item Sertifikat/Logo/".$foto_logo;

    // Proses upload
    if(move_uploaded_file($tmp_logo, $path_logo)){ // Cek apakah gambar berhasil diupload atau tidak
        // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
        $query = "SELECT * FROM acara WHERE IdAcara='".$idAcara."'";
        $sql = mysqli_query($con, $query); // Eksekusi/Jalankan query dari variabel $query
        $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

        // Cek apakah file foto sebelumnya ada di folder images

        // Proses ubah data ke Database
        $query = "UPDATE acara SET Penandatangan2='".$namaPenandatangan2."', Penandatangan1='".$namaPenandatangan1."' , TanggalAcara='".$tanggalAcara."' ,NamaAcara='".$namaAcara."', Logo='".$foto_logo."' WHERE IdAcara='".$idAcara."'";
        $sql = mysqli_query($con, $query); // Eksekusi/ Jalankan query dari variabel $query

        if($sql){ // Cek jika proses simpan ke database sukses atau tidak
            // Jika Sukses, Lakukan :
            header("location: acara.php"); // Redirect ke halaman index.php
        }else{
            // Jika Gagal, Lakukan :
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='ubahAcara.php'>Kembali Ke Form</a>";
        }
    }else{
        // Jika gambar gagal diupload, Lakukan :
        echo "Maaf, Gambar gagal untuk diupload.";
        echo "<br><a href='ubahAcara.php'>Kembali Ke Form</a>";
    }
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
    // Proses ubah data ke Database
    $query = "UPDATE acara SET Penandatangan2='".$namaPenandatangan2."', Penandatangan1='".$namaPenandatangan1."' , TanggalAcara='".$tanggalAcara."' ,NamaAcara='".$namaAcara."' WHERE IdAcara='".$idAcara."'";
    $sql = mysqli_query($con, $query); // Eksekusi/ Jalankan query dari variabel $query

    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        header("location: template.php"); // Redirect ke halaman index.php
    }else{
        // Jika Gagal, Lakukan :
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='ubahAcara.php'>Kembali Ke Form</a>";
    }
}

if(isset($_POST['ubah_ttd1'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
    // Ambil data foto yang dipilih dari form
    $foto_ttd1 = $_FILES['ubahparaf1']['name'];
    $tmp_ttd1 = $_FILES['ubahparaf1']['tmp_name'];


    // Set path folder tempat menyimpan fotonya
    $path_ttd1 = "Item Sertifikat/Ttd 1/".$foto_ttd1;

    // Proses upload
    if(move_uploaded_file($tmp_ttd1, $path_ttd1)){ // Cek apakah gambar berhasil diupload atau tidak
        // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
        $query = "SELECT * FROM acara WHERE IdAcara='".$idAcara."'";
        $sql = mysqli_query($con, $query); // Eksekusi/Jalankan query dari variabel $query
        $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

        // Cek apakah file foto sebelumnya ada di folder images

        // Proses ubah data ke Database
        $query = "UPDATE acara SET Penandatangan2='".$namaPenandatangan2."', Penandatangan1='".$namaPenandatangan1."' ,
         TanggalAcara='".$tanggalAcara."' ,NamaAcara='".$namaAcara."',Paraf1='".$foto_ttd1."' WHERE IdAcara='".$idAcara."'";
        $sql = mysqli_query($con, $query); // Eksekusi/ Jalankan query dari variabel $query

        if($sql){ // Cek jika proses simpan ke database sukses atau tidak
            // Jika Sukses, Lakukan :
            header("location: acara.php"); // Redirect ke halaman index.php
        }else{
            // Jika Gagal, Lakukan :
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='ubahAcara.php'>Kembali Ke Form</a>";
        }
    }else{
        // Jika gambar gagal diupload, Lakukan :
        echo "Maaf, Gambar gagal untuk diupload.";
        echo "<br><a href='ubahAcara.php'>Kembali Ke Form</a>";
    }
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
    // Proses ubah data ke Database
    $query = "UPDATE acara SET Penandatangan2='".$namaPenandatangan2."', Penandatangan1='"
        .$namaPenandatangan1."' , TanggalAcara='".$tanggalAcara."' ,NamaAcara='".$namaAcara."' WHERE IdAcara='".$idAcara."'";
    $sql = mysqli_query($con, $query); // Eksekusi/ Jalankan query dari variabel $query

    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        header("location: acara.php"); // Redirect ke halaman index.php
    }else{
        // Jika Gagal, Lakukan :
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='ubahAcara.php'>Kembali Ke Form</a>";
    }
}

if(isset($_POST['ubah_ttd2'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
    // Ambil data foto yang dipilih dari form
    $foto_ttd2 = $_FILES['ubahparaf2']['name'];
    $tmp_ttd2 = $_FILES['ubahparaf2']['tmp_name'];


    // Set path folder tempat menyimpan fotonya
    $path_ttd2 = "Item Sertifikat/Ttd 1/".$foto_ttd2;

    // Proses upload
    if(move_uploaded_file($tmp_ttd2, $path_ttd2)){ // Cek apakah gambar berhasil diupload atau tidak
        // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
        $query = "SELECT * FROM acara WHERE IdAcara='".$idAcara."'";
        $sql = mysqli_query($con, $query); // Eksekusi/Jalankan query dari variabel $query
        $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

        // Cek apakah file foto sebelumnya ada di folder images

        // Proses ubah data ke Database
        $query = "UPDATE acara SET Penandatangan2='".$namaPenandatangan2."', Penandatangan1='".$namaPenandatangan1."' ,
         TanggalAcara='".$tanggalAcara."' ,NamaAcara='".$namaAcara."',Paraf2='".$foto_ttd2."' WHERE IdAcara='".$idAcara."'";
        $sql = mysqli_query($con, $query); // Eksekusi/ Jalankan query dari variabel $query

        if($sql){ // Cek jika proses simpan ke database sukses atau tidak
            // Jika Sukses, Lakukan :
            header("location: acara.php"); // Redirect ke halaman index.php
        }else{
            // Jika Gagal, Lakukan :
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='ubahAcara.php'>Kembali Ke Form</a>";
        }
    }else{
        // Jika gambar gagal diupload, Lakukan :
        echo "Maaf, Gambar gagal untuk diupload.";
        echo "<br><a href='ubahAcara.php'>Kembali Ke Form</a>";
    }
}
else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
    // Proses ubah data ke Database
    $query = "UPDATE acara SET Penandatangan2='".$namaPenandatangan2."', 
    Penandatangan1='".$namaPenandatangan1."' , TanggalAcara='".$tanggalAcara."' ,NamaAcara='".$namaAcara."' WHERE IdAcara='".$idAcara."'";
    $sql = mysqli_query($con, $query); // Eksekusi/ Jalankan query dari variabel $query

    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        header("location: acara.php"); // Redirect ke halaman index.php
    }else{
        // Jika Gagal, Lakukan :
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='ubahAcara.php'>Kembali Ke Form</a>";
    }
}

?>
