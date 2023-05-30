<?php
include "konfigurasi.php";
$psn = "";
if(isset($_POST['txNAMA'])) {
    $pass1 = $_POST['txPASS1'];
    $pass2 = $_POST['txPASS2'];
    if($pass1 == $pass2){
        $nama = $_POST['txNAMA'];
        $email = $_POST['txEMAIL'];
        $user = $_POST['txUSER'];

        $sql = "INSERT INTO tbadmin (nama,email,username,passkey,iduser) VALUES ('$nama','$email','$user','".md5($pass1)."','".md5($nama)."')";
        $cnn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME,DBPORT) or die("Gagal koneksi ke database");
        $hasil = mysqli_query($cnn,$sql);
        if($hasil==true){
            $psn = "Registrasi User Sukses,Silahkan login dengan user tersebut";
            header('location:login.php');
        }else{
            $psn = "Registrasi Gagal,Silahkan diulang";
        }

    }else{
        $psn = "Password tidak sama dengan konfirmasi password";
    }
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<?php
if(!$psn == ""){
echo "<div>".$psn."</div>";
}
?>

<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-center" style="margin-top:5%">
                <form class="border border-success p-3 " method="post" action="" style="background-color:#C7E9B0">
                    <div class="bg-success text-center  rounded">
                        <label class="form-label p-2 text-light fs-4"><b>Daftar Mata Kuliah</b></label>
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label"><b>Nama</b></label>
                        <input class="form-control" type="text" name="txNAMA" placeholder="Nama">
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><b>Email</b></label>
                        <input class="form-control" type="email" name="txEMAIL" placeholder="Email">
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><b>Username</b></label>
                        <input class="form-control" type="text" name="txUSER" placeholder="Username">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label"><b>Password</b></label>
                        <input class="form-control" type="password" name="txPASS1" placeholder="Password">
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><b>Konfirmasi Password</b></label>
                        <input class="form-control" type="password" name="txPASS2" placeholder="Password">
                    </div>

                    <div class="bg-success text-center rounded">
                        <button class="btn text-light fs-5" type="submit" name="txREGISTER" id="register"><b>Daftar</b></button>
                    </div>

                    <div class="text-center mt-3 d-flex justify-content-center">
                        <a href="login.php" class="mt-2 bg-success rounded p-2 col-2" style="text-decoration:none;color:white;"><b><i class="fa fa-arrow-left" aria-hidden="true"></i></b></a>
                    </div>
         
                </form>
        </div>
    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>