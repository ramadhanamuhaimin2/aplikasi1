<?php
require('form.php');
// require('aksi.php');
class Mahasiswa
{
    // protected $umur;
    // public function __construct($nim = "M31XXXXX", $nama = "anonim", $tahun = 2000)
    // {
    //     $this->nim = $nim;
    //     $this->nama = $nama;
    //     $this->tahunlahir = $tahun;
    //     // $this->umur = $this->hitungUmur();
    // }
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db = 'review';
    private $koneksi;
    public $id;

    public function __construct()
    {
        $this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (mysqli_connect_errno()) {
            echo 'Gagal melakukan koneksi ke Database : ' . mysqli_connect_error();
        } else {
            echo 'Koneksi berhasil ^_^ </br>';
        }
    }

    public function cetakData()
    {
        // echo "Umur Sekarang : " . $this->umur = $this->hitungUmur();
    }

    //non-void : punya return
    private function hitungUmur()
    {
        $tahun = $_POST['tahun'];
        $hasil = date('Y') - ($tahun); //$hasil bukan atribut, krn masuk di lokal
        return $hasil;
    }

    public function inputForm()
    {
        $formMhs = new Form("", "Input Mahasiswa", "Input ke Database");
        $formMhs->text("nim", "NIM Mahasiswa", "text");
        $formMhs->text("nama", "NAMA Mahasiswa", "text");
        $formMhs->text("tahun", "TAHUN LAHIR");
        $formMhs->text("noHP", "Nomer HP");
        $formMhs->password("pass", "Password Mahasiswa", "password");
        $formMhs->radio("status", "Mahasiswa Aktif");
        $formMhs->checkbox("beasiswa", "Mahasiswa Bidikmisi");
        $formMhs->select("prodi", "Prodi", array(
            array('value' => '', 'text' => ''),
            array('value' => 'Teknik Informatika', 'text' => 'Teknik Informatika'),
            array('value' => 'Teknik Mesin', 'text' => 'Teknik Mesin'),
            array('value' => 'Teknik Industri', 'text' => 'Teknik Industri'),
            array('value' => 'Teknik Kimia', 'text' => 'Teknik Kimia'),
            array('value' => 'Teknik Geodesi', 'text' => 'Teknik Geodesi'),
        ));
        $formMhs->textarea("ket", "Keterangan", 10, 3);

        $data = $this;

        if (isset($_POST['tombol'])) {
            $formMhs->getForm(); //imput data
            $this->hitungUmur();
            $formMhs->cetakForm(); //cetak data
            $this->cetakData();
        } elseif (isset($_POST['tombol2'])) {
            $this->inputdb();
        } else {
            $formMhs->displayForm(); //tampil form
        }
    }
    public function editForm()
    {
        $id = $_GET['id'];
        $formMhs = new Form("", "Edit Mahasiswa", "Edit ke Database");
        $formMhs->text("nim", "NIM Mahasiswa", "text");
        $formMhs->text("nama", "NAMA Mahasiswa", "text");
        $formMhs->text("tahun", "TAHUN LAHIR");
        $formMhs->text("noHP", "Nomer HP");
        $formMhs->password("pass", "Password Mahasiswa", "password");
        $formMhs->radio("status", "Mahasiswa Aktif");
        $formMhs->checkbox("beasiswa", "Mahasiswa Bidikmisi");
        $formMhs->select("prodi", "Prodi", array(
            array('value' => '', 'text' => ''),
            array('value' => 'Teknik Informatika', 'text' => 'Teknik Informatika'),
            array('value' => 'Teknik Mesin', 'text' => 'Teknik Mesin'),
            array('value' => 'Teknik Industri', 'text' => 'Teknik Industri'),
            array('value' => 'Teknik Kimia', 'text' => 'Teknik Kimia'),
            array('value' => 'Teknik Geodesi', 'text' => 'Teknik Geodesi'),
        ));
        $formMhs->textarea("ket", "Keterangan", 10, 3);
        if (isset($_POST['tombol'])) {
            $formMhs->getForm();
            $formMhs->cetakForm(); //cetak data
            $this->cetakData();
        } elseif (isset($_POST['tombol2'])) {
            $this->inputdb($id);
        }
    }
    function inputdb()
    {
        $db_host = 'localhost';
        $db_name = 'review'; //nama database
        $db_username = 'root';
        $db_password = '';
        $mysqli = mysqli_connect(
            $db_host,
            $db_username,
            $db_password,
            $db_name
        );
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $tahun = $_POST['tahun'];
        $noHP = $_POST['noHP'];
        $pass = $_POST['pass'];
        $status = $_POST['status'];
        $beasiswa = $_POST['beasiswa'];
        $prodi = $_POST['prodi'];
        $ket = $_POST['ket'];

        $sql = "INSERT INTO mahasiswa2 (nim,nama,tahun_lahir,hp,password,status,beasiswa,prodi,ket) 
           VALUES ('$nim','$nama','$tahun','$noHP','$pass','$status','$beasiswa','$prodi','$ket')";
        $data = mysqli_query($mysqli, $sql);
        if ($sql) {
            echo "<script>window.alert('Berhasil');window.location=('form.php')</script>";
        }
    }

    public function cetakListMhs() //boleh di kasih di view
    {
        $modelmhs = new Mahasiswa();
        $row_data = $modelmhs->listMhsDb();
        $no = 1;
        $data = "<table border='1'>
        <tr>	<th>No</th><th>NIM</th><th>Nama</th><th>Tahun Lahir</th>
        <th>HP</th><th>Password</th><th>Status</th>
        <th>Beasiswa</th><th>Prodi</th><th>Keterangan</th>
        </tr>";
        while ($row = mysqli_fetch_object($row_data)) {
            $id = $row->id;
            $data .= "<tr>
        <td>$no</td>
        <td>" . $row->nim . "</td> 
        <td>" . $row->nama . "</td>
        <td>" . $row->tahun_lahir . "</td>
        <td>" . $row->hp . "</td>
        <td>" . $row->password . "</td>
        <td>" . $row->status . "</td>
        <td>" . $row->beasiswa . "</td>
        <td>" . $row->prodi . "</td>
        <td>" . $row->ket . "</td>
        <td><a href=\"edit.php?id=$row->id\">Edit</a></td>
        <td><a href=\"hapus.php?id=$row->id\">Hapus</a></td>
        <td><a href=\"detail.php?id=$row->id\">Detail</a></td>

            </tr>";
            $no++;
        }

        // $row->nim manut dari nama field
        $data .= "</table>";
        echo $data;
    }

    public function displayView($namaview, $data = '')
    {
        require($namaview);
    }
    public function listMhsDb()
    {
        $query = "SELECT * FROM mahasiswa2";
        $result = mysqli_query($this->koneksi, $query);

        return $result;
    }
    //end class
}
