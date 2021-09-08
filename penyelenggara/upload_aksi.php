<?php
include '../includes/config.php';
require 'PHPExcel/Classes/PHPExcel.php';
require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';


$uploadfile=$_FILES['filepeserta']['tmp_name'];
$ids = $_GET['idAcara'];

$objExcel=PHPExcel_IOFactory::load($uploadfile);



foreach($objExcel->getWorksheetIterator() as $worksheet)
{
    $highestrow=$worksheet->getHighestRow();

    for($row=1;$row<=$highestrow;$row++)
    {
        if ($row>1){
            $name=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
            $email=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
            $nomorHp=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
            $status=$worksheet->getCellByColumnAndRow(3, $row)->getValue();

            if($email!='')
            {
                $insertqry="INSERT INTO `peserta`( `IdPeserta`, `IdAcara`, `NamaPeserta`, `EmailPeserta`, `NomorHpPeserta`, `StatusPeserta`)
                        VALUES ('','$ids','$name','$email','$nomorHp','$status')";
                $insertres=mysqli_query($con,$insertqry);
            }
        }
    }
}
unlink($uploadfile);
header('Location: acara.php');
?>