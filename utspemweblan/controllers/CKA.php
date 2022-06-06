<?php
require('views/Vmhs/form.php');
require('models/MKA.php');
require('core/Controller.php');
class CKA extends Controller
{
    public function cetakData()
    {
        $modelmhs = new MKA();
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
        // echo $data;
    }

    public function inputForm()
    {
        //require('views/Vtemplate/pesan/pesan.php');

        // $data = $this;
        $input = new MKA();
        $formMhs = new Form("", "Pesan");
        $formMhs->text("nik", "Nomor Identitas", "text");
        $formMhs->text("nama", "Nama Lengkap", "text");
        $formMhs->text("email", "Email", "text");
        $formMhs->text("alamat", "Alamat", "text");
        $formMhs->date("tanggalberangkat", "Tanggal Keberangkatan", "date");
        $kereta = mysqli_fetch_all($input->ambilKereta(), MYSQLI_ASSOC);
        
        $formMhs->select("nama_KA", "Nama Kereta", $kereta);
        $data = $this;
        // $this->nik_sementara = 
        $this->view('views/Vmhs/VInputData.php', $data);
        if (!isset($_POST['tombol2'])) {
            $formMhs->displayForm();
            echo 'test';
        }
        if (isset($_POST['tombol2'])) {
                $this->cetakPemesanan($input->pesan());
        }
    }

    public function inputJadwalKA()
    {
        $input1 = new MKA();
        $formMhs1 = new Form("", "Input Jadwal Kereta", "Input Jadwal ke Database");
        $formMhs1->text("nama_KA", "Nama KA", "text");
        $formMhs1->text("asal", "Asal", "text");
        $formMhs1->text("tujuan", "Tujuan", "text");
        $data1 = $this;
        if (isset($_POST['tombol'])) {
            $formMhs1->getForm();
            $formMhs1->cetakForm(); //cetak data
            $this->cetakData();
        } elseif (isset($_POST['tombol2'])) {
            $input1->jadwalInput();
        }
        // } else {
        //     $formMhs->displayForm(); //tampil form
        // }
        $this->view('views/Vmhs/VInputJadwal.php', $data1);
        if (!isset($_POST['tombol'])) {
            $formMhs1->displayForm();
        }
    }
    public function inputData()
    {
        $input = new MKA();
        $formMhs = new Form("", "Input Data Kereta", "Input Data ke Database");
        $formMhs->text("nama_KA", "Nama KA", "text");
        $formMhs->text("kelas", "Kelas", "text");
        $formMhs->text("status", "Status", "text");
        $formMhs->text("jumlahkursi", "Jumlah Kursi", "text");
        $data = $this;

        if (isset($_POST['tombol'])) {
            $formMhs->getForm();
            $formMhs->cetakForm(); //cetak data
            $this->cetakData();
        } elseif (isset($_POST['tombol2'])) {
            $input->DataInput();
        }
        // } else {
        //     $formMhs->displayForm(); //tampil form
        // }
        $this->view('views/Vmhs/VInputData.php', $data);
        if (!isset($_POST['tombol'])) {
            $formMhs->displayForm();
        }
    }

    public function inputTiket()
    {
        $input = new MKA();
        $formMhs = new Form("", "Pesan");
        $formMhs->text("nama", "Nama Lengkap", "text");
        $formMhs->text("email", "Email", "text");
        $formMhs->text("alamat", "Alamat", "text");
        $formMhs->date("tanggalberangkat", "Tanggal Keberangkatan", "date");
        
        //array kereta
        $kereta = Array('Argo Mulyo', 'Argo Parahyangan');
        $formMhs->select("tanggalberangkat", "Tanggal Keberangkatan", $kereta, "date");
        
        $data = $this;
        if (isset($_POST['tombol'])) {
            $formMhs->getForm();
            $formMhs->cetakForm(); //cetak data
            $this->cetakData();
        } elseif (isset($_POST['tombol2'])) {
            $input->DataInput();
        }
        // } else {
        //     $formMhs->displayForm(); //tampil form
        // }
        $this->view('views/Vmhs/VInputData.php', $data);
        if (!isset($_POST['tombol'])) {
            $formMhs->displayForm();
        }
    }

    public function displayView($namaview, $data = '', $judul = '')
    {
        // require($namaview);
        require('views/Vtemplate/template.php');
    }
    public function cetakJadwalKA() //boleh di kasih di view
    {
        $modelmhs = new MKA();
        $row_data = $modelmhs->listMhsDb();
        $no = 1;
        $data = "<div class='table-responsive'><table border='1' class='table table-hover cl-3'>
        <tr>	<th>No</th><th>Nama KA</th><th>Asal</th><th>Tujuan</th>
        <th>Jam Keberangkatan</th><th>Jam Kedatangan</th>
        <th colspan='3' style='text-align:center'>Aksi</th>
        </tr>";
        while ($row = mysqli_fetch_object($row_data)) {
            $data .= "<tr>
        <td>$no</td>
        <td>" . $row->nama_ka . "</td> 
        <td>" . $row->asal . "</td>
        <td>" . $row->tujuan . "</td>
        <td>" . $row->jamberangkat . "</td>
        <td>" . $row->jamdatang . "</td>
        <td><a href=\"editJadwal.php?id=$row->id_jadwal\">Edit</a></td>
        <td><a href=\"hapusJadwal.php?id=$row->id_jadwal\">Hapus</a></td>
        <td><a href=\"detailJadwal.php?id=$row->id_jadwal\">Detail</a></td>

            </tr>";
            $no++;
        }

        // $row->nim manut dari nama field
        $data .= "</table></div>";
        // include('views/Vmhs/VlistMhs.php');
        $this->view('views/Vmhs/VlistJadwal.php', $data, "Jadwal Kereta Api", "jadwal");
    }
    public function cetakPemesanan($id) //boleh di kasih di view
    {
        $modelmhs = new MKA();
        $row_data = $modelmhs->pemesanan($id); // sedikit
        $no = 1;
        $data = "<div class='table-responsive'><table border='1' class='table table-hover cl-3'>
        <tr>	<th>No</th><th>NIK</th><th>Nama</th><th>Email</th><th>Alamat</th>
        <th>Tanggal Berangkat</th><th>Nama KA</th>
        <th colspan='3' style='text-align:center'>Aksi</th>
        </tr>";
        //var_dump($row_data);
        while ($row = mysqli_fetch_object($row_data)) {
            $data .= "<tr>
        <td>$no</td>
        <td>" . $row->nik . "</td> 
        <td>" . $row->nama . "</td> 
        <td>" . $row->email . "</td>
        <td>" . $row->alamat . "</td>
        <td>" . $row->tanggal . "</td>
        <td>" . $row->nama_ka . "</td>

            </tr>";
            $no++;
        }
        
        // $row->nim manut dari nama field
        $data .= "</table></div>";
        // include('views/Vmhs/VlistMhs.php');
        $this->view('views/Vmhs/VInputPesan.php', $data, "", "");
    }
    public function cetakListKA() //boleh di kasih di view
    {
        $modelmhs = new MKA();
        $row_data = $modelmhs->listKA();
        $no = 1;
        $data = "<div class='table-responsive'><table border='1' class='table table-hover cl-3'>
        <tr>	<th>No</th><th>Nama KA</th>
        <th>Kelas</th><th>Status</th>
        <th>Jumlah Kursi</th>
        <th colspan='3' style='text-align:center'>Aksi</th>
        </tr>";
        while ($row = mysqli_fetch_object($row_data)) {
            $data .= "<tr>
        <td>$no</td>
        <td>" . $row->nama_KA . "</td> 
        <td>" . $row->kelas . "</td> 
        <td>" . $row->status . "</td> 
        <td>" . $row->jumlahkursi . "</td> 
        <td><a href=\"editData.php?id=$row->id_KA\">Edit</a></td>
        <td><a href=\"hapusData.php?id=$row->id_KA\">Hapus</a></td>
        <td><a href=\"detailData.php?id=$row->id_KA\">Detail</a></td>

            </tr>";
            $no++;
        }

        // $row->nim manut dari nama field
        $data .= "</table></div>";
        // include('Vmhs/VlistMhs.php');
        $this->displayView('views/Vmhs/VlistMhs.php', $data, "Data Kereta Api", "data");
    }
    public function detailDataKA() //boleh di kasih di view
    {
        $modelmhs = new MKA();
        $row_data = $modelmhs->DataDetail();
        $no = 1;

        $data = "<div class='table-responsive'><table border='1' class='table table-hover cl-3'>
        <tr>	<th>Nama KA</th>
        </tr>";
        while ($row = mysqli_fetch_object($row_data)) {
            $data .= "<tr>
        <td>" . $row->nama_KA . "</td> 
            </tr>";
            $no++;
        }
        // $row->nim manut dari nama field
        $data .= "</table></div>";
        // include('Vmhs/VlistMhs.php');
        $this->displayView('views/Vmhs/VdetailMhs.php', $data);
    }
    public function login()
    {
        require('views/Vtemplate/index.php');
        if (isset($_POST['tombol'])) {
            $modeluser = new MKA();
            $modeluser->loginInput();
        }
    }
    public function beranda()
    {
        require('views/Vtemplate/product/index.php');
    }
}
