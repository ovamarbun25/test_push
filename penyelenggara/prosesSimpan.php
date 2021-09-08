<?php
session_start();
include("../includes/config.php");
if(strlen($_SESSION['alogin'])==0)
{
    header('location:../index.php');
}

if(isset($_POST['uploadGambar'])){
// Ambil Data yang Dikirim dari Form
    $idAdmin = $_POST['idAdmin'];
    $namaTemplate = $_POST['namaTemplate'];
//    $layout = $_POST['layout'];
    $nama_file = $_FILES['gambarTemplate']['name'];
    $ukuran_file = $_FILES['gambarTemplate']['size'];
    $tipe_file = $_FILES['gambarTemplate']['type'];
    $tmp_file = $_FILES['gambarTemplate']['tmp_name'];
// Set path folder tempat menyimpan gambarnya
    $path = "../admin/images/".$nama_file;
    if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
        // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
        if($ukuran_file <= 5000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
            // Proses upload
            if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
                // Jika gambar berhasil diupload, Lakukan :
                // Proses simpan ke Database
                $query = "INSERT INTO templatesertifikatpenyelenggara(IdTemplate,IdPenyelenggara,NamaTemplate,Template) VALUES('','".$idAdmin."','".$namaTemplate."','".$nama_file."')";
                $sql = mysqli_query($con, $query); // Eksekusi/ Jalankan query dari variabel $query

                if($sql){ // Cek jika proses simpan ke database sukses atau tidak
                    // Jika Sukses, Lakukan :
                    header("location: template.php"); // Redirectke halaman index.php
                }else{
                    // Jika Gagal, Lakukan :
                    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
                    echo "<br><a href='uploadTemplate.php'>Kembali Ke Form</a>";
                }
            }else{
                // Jika gambar gagal diupload, Lakukan :
                echo "Maaf, Gambar gagal untuk diupload.";
                echo "<br><a href='uploadTemplate.php'>Kembali Ke Form</a>";
            }
        }else{
            // Jika ukuran file lebih dari 1MB, lakukan :
            echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
            echo "<br><a href='uploadTemplate.php'>Kembali Ke Form</a>";
        }
    }else{
        // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
        echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
        echo "<br><a href='uploadTemplate.php'>Kembali Ke Form</a>";
    }
}

?>
