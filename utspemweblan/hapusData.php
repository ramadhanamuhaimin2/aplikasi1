
<?php
require('controllers/CKA.php');
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'tiket';
$koneksi;
$id;


$koneksi = mysqli_connect($host, $user, $pass, $db);
if (mysqli_connect_errno()) {
    echo 'Gagal melakukan koneksi ke Database : ' . mysqli_connect_error();
} else {
    echo 'Koneksi berhasil ^_^ </br>';
}

$id = $_GET['id'];
echo $id;
$query2 = "DELETE FROM data_ka WHERE id_KA=$id";
$result = mysqli_query($koneksi, $query2);
