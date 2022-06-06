<?php
require('views/Vmhs/form.php');
// require('mahasiswa.php');
$id = $_GET['id'];
$editForm = new Form("", "Input Jadwal Kereta", "Input Jadwal ke Database");
// $input = new MKA();
$editForm->text("nama_KA", "Nama KA", "text");
if (isset($_POST['tombol'])) {
    $editForm->getForm();
    $editForm->cetakForm();
} elseif (isset($_POST['tombol2'])) {
    $host = 'localhost';
    $user = 'root';
    $passdb = '';
    $db = 'tiket';
    $koneksi;
    $id;

    $nama_KA = $_POST['nama_KA'];

    $koneksi = mysqli_connect($host, $user, $passdb, $db);
    if (mysqli_connect_errno()) {
        echo 'Gagal melakukan koneksi ke Database : ' . mysqli_connect_error();
    } else {
        echo 'Koneksi berhasil ^_^ </br>';
    }

    $query2 = "UPDATE jadwal SET nama_KA='$nama_KA'
    WHERE id_jadwal='$id'";
    $result = mysqli_query($koneksi, $query2);
} else {
    $editForm->displayForm();
}
