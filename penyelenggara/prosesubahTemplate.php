<?php
// Load file koneksi.php
include "../includes/config.php";

// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
$idTemplate = $_POST['idTemplate'];

// Ambil Data yang Dikirim dari Form
$namaTemplate = $_POST['namaTemplate'];

// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
    // Ambil data foto yang dipilih dari form
    $foto = $_FILES['gambarTemplate']['name'];
    $tmp = $_FILES['gambarTemplate']['tmp_name'];


    // Set path folder tempat menyimpan fotonya
    $path = "images/".$foto;

    // Proses upload
    if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
        // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim
        $query = "SELECT * FROM templatesertifikatpenyelenggara WHERE IdTemplate='".$idTemplate."'";
        $sql = mysqli_query($con, $query); // Eksekusi/Jalankan query dari variabel $query
        $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

        // Cek apakah file foto sebelumnya ada di folder images

        // Proses ubah data ke Database
        $query = "UPDATE templatesertifikatpenyelenggara SET NamaTemplate='".$namaTemplate."', Template='".$foto."' WHERE IdTemplate='".$idTemplate."'";
        $sql = mysqli_query($con, $query); // Eksekusi/ Jalankan query dari variabel $query

        if($sql){ // Cek jika proses simpan ke database sukses atau tidak
            // Jika Sukses, Lakukan :
            header("location: template.php"); // Redirect ke halaman index.php
        }else{
            // Jika Gagal, Lakukan :
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='template.php'>Kembali Ke Form</a>";
        }
    }else{
        // Jika gambar gagal diupload, Lakukan :
        echo "Maaf, Gambar gagal untuk diupload.";
        echo "<br><a href='template.php'>Kembali Ke Form</a>";
    }
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
    // Proses ubah data ke Database
    $query = "UPDATE templatesertifikatpenyelenggara SET NamaTemplate='".$namaTemplate."' WHERE IdTemplate='".$idTemplate."'";
    $sql = mysqli_query($con, $query); // Eksekusi/ Jalankan query dari variabel $query

    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        header("location: template.php"); // Redirect ke halaman index.php
    }else{
        // Jika Gagal, Lakukan :
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='template.php'>Kembali Ke Form</a>";
    }
}
?>
