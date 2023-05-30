<?php
include"function.php";
$id = $_GET['id'];

if(isset($_POST['txUPDATE'])){
    $con = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME,DBPORT) or die ("Gagal Koneksi Database");
    $iduser = $_POST['txID'];
    $kode = $_POST['txKODE'];
    $nama = $_POST['txNAMA'];
    $sks = $_POST['txSKS'];
        $sql = "UPDATE tbmatakuliah SET kode = '$kode', nama = '$nama', sks= '$sks' WHERE id = $iduser";
        $result = mysqli_query($con,$sql);
        if($result == true){
            echo"<script>alert('Berhasil Terupdate');</script>";
            header('location:matakuliah.php');
        }else{
            echo"<script>alert('Gagal Terupdate');</script>";
        }

}

$query = query("SELECT * FROM tbmatakuliah WHERE id = '$id'");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>



<div class="container-fluid">
    <div class="row">
        <div class="col-12 bg-success">
            <h3 class="text-light p-3"><b>Daftar Mata Kuliah</b></h3>
        </div>

        <div class="col-3" style="background-color:#DBDFEA; padding-bottom:38%;">
            <ul class="list-group">
                <li class="list-group-item  mt-2 mb-2"><a href="dashboard.php" style="text-decoration:none;color:#064420;">Dashboard</a></li>
                <li class="list-group-item  mb-2"><a href="matakuliah.php" style="text-decoration:none;color:#064420;">Mata Kuliah</a></li>
                <li class="list-group-item  "><a href="logout.php" style="text-decoration:none;color:#064420;">Logout</a></li>
            </ul>
        </div>
            
        <div class="col-9">
            <div class="row">
                <div class="col-12 p-3 border-bottom border-3">
                    <h1>Input Data Matakuliah</h1>
                </div>
                <div class="col-12">
                <form method="post" action="">
                    <?php foreach ($query as $row): ?>

                    <div>
                        <input type="hidden" name="txID" value="<?php echo $row['id']; ?>">
                    </div>

                    <div>
                        <label class="form-label"><b>KODE</b></label>
                            <input class="form-control" type="text" name="txKODE" placeholder="<?php echo $row['kode']; ?>" >
                    </div>

                    <div>
                        <label class="form-label"><b>Nama Mata Kuliah</b></label>
                            <input class="form-control"  type="text" name="txNAMA" placeholder="<?php echo $row['nama']; ?>">
                    </div>

                    <div>
                        <label class="form-label"><b>SKS</b></label>
                            <input class="form-control"  type="number" name="txSKS" placeholder="<?php echo $row['sks']; ?>">
                    </div>  

                    <div>
                        <button class="btn btn-success text-light mt-3" type="submit" name="txUPDATE" id="update"><b>Update</b></button>
                    </div>

                    <?php endforeach; ?>
                </form>
                </div>
            </div>
        </div>

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>