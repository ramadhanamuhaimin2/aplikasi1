<?php
class MKA
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db = 'tiket';
    private $koneksi;

    public function __construct()
    {
        $this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (mysqli_connect_errno()) {
            echo 'Gagal melakukan koneksi ke Database : ' . mysqli_connect_error();
        } else {
            echo 'Koneksi berhasil ^_^ </br>';
        }
    }
    public function listMhsDb()
    {
        $query = "SELECT * FROM jadwal";
        $result = mysqli_query($this->koneksi, $query);

        return $result;
    }
    public function listKA()
    {
        $query = "SELECT * FROM data_ka";
        $result = mysqli_query($this->koneksi, $query);

        return $result;
    }
    public function DataDetail()
    {
        $id = $_GET['id'];
        $query = "SELECT * FROM data_ka Where id_KA='$id'";
        $result = mysqli_query($this->koneksi, $query);

        return $result;
    }
    public function pemesanan($id)
    {
        $query = "SELECT * FROM pemesanan Where nik='$id'";
        $result = mysqli_query($this->koneksi, $query);
        return $result;
    }

    public function ambilKereta()
    {
        $query = "SELECT nama_KA FROM data_ka";
        $result = mysqli_query($this->koneksi, $query);
        return $result;
    }
    
    function pesan()
    {
        $db_host = 'localhost';
        $db_name = 'tiket'; //nama database
        $db_username = 'root';
        $db_password = '';
        $mysqli = mysqli_connect(
            $db_host,
            $db_username,
            $db_password,
            $db_name
        );
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $tanggal = $_POST['tanggalberangkat'];
        $nama_ka = $_POST['nama_KA'];


        $sql = "INSERT INTO pemesanan (nik, nama,email,alamat,tanggal, nama_ka) 
           VALUES ('$nik', '$nama','$email','$alamat','$tanggal','$nama_ka')";
        $data = mysqli_query($mysqli, $sql);
        if ($sql) {
            //$pemesanan($nik);
            echo "<script>window.alert('Berhasil');</script>";
            return $nik;
        }

        return "";
    }

    function loginInput()
    {
        $db_host = 'localhost';
        $db_name = 'tiket'; //nama database
        $db_username = 'root';
        $db_password = '';
        $mysqli = mysqli_connect(
            $db_host,
            $db_username,
            $db_password,
            $db_name
        );
        $nama = $_POST['nama'];
        $password = $_POST['password'];

        $sql = "INSERT INTO user (username,password) 
           VALUES ('$nama','$password')";
        $data = mysqli_query($mysqli, $sql);
        if ($sql) {
            echo "<script>window.alert('Berhasil');window.location=('index.php')</script>";
        }
    }
    function jadwalInput()
    {
        $db_host = 'localhost';
        $db_name = 'tiket'; //nama database
        $db_username = 'root';
        $db_password = '';
        $mysqli = mysqli_connect(
            $db_host,
            $db_username,
            $db_password,
            $db_name
        );
        $nama_KA = $_POST['nama_KA'];
        $asal = $_POST['asal'];
        $tujuan = $_POST['tujuan'];
        $jamberangkat = $_POST['jamberangkat'];
        $jamdatang = $_POST['jamdatang'];

        $sql = "INSERT INTO jadwal (nama_KA,asal,tujuan,jamberangkat,jamdatang) 
           VALUES ('$nama_KA','$asal','$tujuan','$jamberangkat','$jamdatang')";
        $data = mysqli_query($mysqli, $sql);
        if ($sql) {
            echo "<script>window.alert('Berhasil');window.location=('index.php')</script>";
        }
    }
    function DataInput()
    {
        $db_host = 'localhost';
        $db_name = 'tiket'; //nama database
        $db_username = 'root';
        $db_password = '';
        $mysqli = mysqli_connect(
            $db_host,
            $db_username,
            $db_password,
            $db_name
        );
        $nama_KA = $_POST['nama_KA'];
        $kelas = $_POST['kelas'];
        $status = $_POST['status'];
        $jumlahkursi = $_POST['jumlahkursi'];


        $sql = "INSERT INTO data_ka (nama_KA,kelas,status,jumlahkursi) 
           VALUES ('$nama_KA','$kelas','$status','$jumlahkursi')";
        $data = mysqli_query($mysqli, $sql);
        if ($sql) {
            echo "<script>window.alert('Berhasil');window.location=('index.php')</script>";
        }
    }
    // function ujiLogin()
    // {
    //     $db_host = 'localhost';
    //     $db_name = 'review'; //nama database
    //     $db_username = 'root';
    //     $db_password = '';
    //     $mysqli = mysqli_connect(
    //         $db_host,
    //         $db_username,
    //         $db_password,
    //         $db_name
    //     );
    //     $nama = $_POST['nama'];
    //     $password = $_POST['password'];

    //     $sql = "SELECT * FROM user";
    //     $data = mysqli_query($mysqli, $sql);
    //     if ($sql) {
    //         if($nama == )
    //     }
    // }

    //end class
}
