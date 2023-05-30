<?php
    include("konfigurasi.php");

    $tbadmin = "tbadmin";
    $tbmatakuliah = "tbmatakuliah";
    $cnn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME,DBPORT) or die("Koneksi Gagal");

    $sql1 = "CREATE TABLE $tbadmin(
        id INT(6) UNSIGNED AUTO_INCREMENT,
        nama VARCHAR(50) NOT NULL,
        email VARCHAR(255) NOT NULL,
        username VARCHAR(20),
        passkey VARCHAR(255),
        iduser VARCHAR(255),        
        PRIMARY KEY(id)
    );";

$hasil1 = mysqli_query($cnn,$sql1);
if($hasil1 === true){
    echo "Tabel".$tbadmin."Berhasil Dibuat";
}else{
    echo "Tabel".$tbadmin."Gagal Dibuat";
}

    $sql2 = "CREATE TABLE $tbmatakuliah(
        id INT(6) UNSIGNED AUTO_INCREMENT,
        kode VARCHAR(50) NOT NULL,
        nama VARCHAR(255) NOT NULL,
        sks VARCHAR(225),
        idmatkul VARCHAR(255),    
        PRIMARY KEY(id)
    );";

$hasil2 = mysqli_query($cnn,$sql2);
if($hasil2 === true){
    echo "Tabel".$tbmatakuliah."Berhasil Dibuat";
}else{
    echo "Tabel".$tbmatakuliah."Gagal Dibuat";
}

?>