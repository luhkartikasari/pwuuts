<?php
include "function.php";
session_start();
if($_SESSION['login'] == false){
    header('Location:login.php');
}
    $query = query("SELECT * FROM tbmatakuliah");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 bg-success">
            <h2 class="text-light p-3"><b>Daftar Mata Kuliah</b></h2>
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
                    <h1>Data Mata Kuliah</h1>
                </div>

                <div class="col-12 mt-3">
                    <div class="text-center border rounded text-light p-2" style="background-color:#DBDFEA;">
                        <div class="d-flex justify-content-start">
                            <a href="tambah.php" class="btn btn-success text-light">Input Mata Kuliah</a>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                <?php $id = 1; ?>
                <?php foreach ($query as $row) : ?>
                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th><?= $id; ?></th>
                                    <td><?= $row['kode'] ?></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['sks'] ?></td>
                                    <td>
                                        <a class="p-1 border rounded" href="delete.php?id=<?=$row['id'];?>"style="text-decoration:none;color:white; background-color:red;"><b>Delete</b></a>||
                                        <a class="p-1 border rounded" href="update.php?id=<?=$row['id'];?>"style="text-decoration:none;color:white; background-color:#064420;"><b>Update</b></a>
                                    </td>
                                </tr>
                            </tbody>
                    </table>
                    <?php $id++; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
</div>














<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>