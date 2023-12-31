<?php


session_start();
date_default_timezone_set('Asia/Jakarta');
define("DBNAME", 'pesantren2');
define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('HARGA', 1500000);


$koneksi    = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME) or die('DATABASE GAGAL TERHUBUNG');



function ambilData($query)
{
    global $koneksi;
    $data = [];

    $q = mysqli_query($koneksi, $query);
    while ($d = mysqli_fetch_assoc($q)) {
        $data[] = $d;
    }
    return $data;
}


function upload($tanda = 0, $name = 'file')
{
    //cek semua data yang dibutuhkan
    $namaGambar = $_FILES[$name]["name"];
    $temp       = $_FILES[$name]["tmp_name"];
    $ukuran     = $_FILES[$name]["size"];
    $error      = $_FILES[$name]["error"];


    //buat seleksi pada gambar
    //cek apakah ada gambar 
    if ($error === 4) {
        echo "<script>alert('Tidak ada file yang diupload');</script>";
        return false;
    }
    //izinkan eksistensi file
    $gambarValid        = ['pdf'];
    //pecah string gambar menjadi array dipisahkan setelah tanda .
    $namaGambarValid    = explode('.', $namaGambar);
    //ambil array diindex terakhir lalu ubah menjadi hurufkecil
    $jenisFile          = strtolower(end($namaGambarValid));

    //cek jika tidak ada jenis file didalam array 
    if (!in_array($jenisFile, $gambarValid)) {
        echo "<script>
        Swal.fire({
            position: 'center',
            type: 'error',
            title: 'Jenis file tidak sesuai',
            showConfirmButton: false,
            timer: 1000
        })
        </script>";
        return false;
    }

    //cek ukuran gambar
    if ($ukuran > 10000000) {
        echo "<script>
        Swal.fire({
            position: 'center',
            type: 'error',
            title: 'Ukuran file maksimal 10mb',
            showConfirmButton: false,
            timer: 1000
        })
        </script>";
        return false;
    }

    //buat nama dengan string acak
    $gambarBaru = uniqid();
    $gambarBaru .= '.';
    $gambarBaru .= $jenisFile;

    //pindahkan gambar dari folder sementara ke folder tujuan
    if (!$tanda) {
        move_uploaded_file($temp, 'assets/berkas/' . $gambarBaru);
    } else if ($tanda == 1) {
        move_uploaded_file($temp, '../admin/assets/gambar/undangan/' . $gambarBaru);
    } else if ($tanda == 2) {
        move_uploaded_file($temp, '../admin/assets/gambar/desainundangan/' . $gambarBaru);
    }



    return $gambarBaru;
}


function generateRandomString($length = 10)
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}


function clearData($data)
{
    global $koneksi;
    $data = ucwords(mysqli_real_escape_string($koneksi, htmlspecialchars($data)));
    return $data;
}


function tambahAdmin($data)
{
    global $koneksi, $validator;

    // make it
    $validation = $validator->make($_POST, [
        'nama'                  => 'required',
        'email'                 => 'required|email',
        'password'              => 'required',
        'tanggal'               => 'required|date',
        'nohp'                  => 'required|numeric',
        'bidang'                => 'required',
        'alamat'                => 'required'
    ]);

    // then validate
    $validation->validate();

    if ($validation->fails()) {
        // handling errors
        // $errors = $validation->errors();
        // echo "<pre>";
        // print_r($errors->firstOfAll());
        // echo "</pre>";
        // exit;

        return 0;
    } else {
        // validation passes

        $nama       = clearData($data['nama']);
        $hak        = clearData($data['hak']);
        $email      = clearData($data['email']);
        $tanggal    = clearData($data['tanggal']);
        $nohp       = clearData($data['nohp']);
        $bidang     = clearData($data['bidang']);
        $alamat     = clearData($data['alamat']);
        $password   = $data['password'];
        $password   = password_hash($password, PASSWORD_BCRYPT);


        $query = "INSERT INTO pengurus VALUES('','{$email}','{$password}','{$nama}','{$bidang}','{$tanggal}','{$alamat}','{$nohp}','{$hak}')";
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }
}




function editAdmin($data)
{
    global $koneksi, $validator;

    // make it
    $validation = $validator->make($_POST, [
        'nama'                  => 'required',
        'email'                 => 'required|email',
        'tanggal'               => 'required|date',
        'nohp'                  => 'required|numeric',
        'bidang'                => 'required',
        'alamat'                => 'required'
    ]);

    // then validate
    $validation->validate();

    if ($validation->fails()) {
        return 0;
    } else {
        // validation passes

        $nama       = clearData($data['nama']);
        $hak        = clearData($data['hak']);
        $idpengurus = clearData($data['idpengurus']);
        $email      = clearData($data['email']);
        $tanggal    = clearData($data['tanggal']);
        $nohp       = clearData($data['nohp']);
        $bidang     = clearData($data['bidang']);
        $alamat     = clearData($data['alamat']);



        $password   = $data['password'];



        $query = "UPDATE pengurus SET email = '{$email}', nama = '{$nama}', bidang = '{$bidang}', tanggal_lahir = '{$tanggal}', alamat = '{$alamat}', no_hp = '{$nohp}', hak_akses = '{$hak}'";


        if ($password) {
            $password   = password_hash($password, PASSWORD_BCRYPT);
            $query .= ", password = '{$password}'";
        }

        $query .= " WHERE id_pengurus = {$idpengurus}";

        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }
}


function editTanggal($data)
{
    global $koneksi;

    $idtanggalpendaftaran   = $data['idtanggalpendaftaran'];
    $mulai                  = clearData($data['mulai']);
    $selesai                = clearData($data['selesai']);


    $query = "UPDATE tanggal_pendaftaran SET tanggal_mulai = '{$mulai}', tanggal_selesai = '{$selesai}' WHERE id_tanggal_pendaftaran = {$idtanggalpendaftaran}";



    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}



function tambahSantri($data)
{
    global $koneksi, $validator;



    // $validation = $validator->make($_POST + $_FILES, [
    //     'nama'                  => 'required',
    //     'nohp'                  => 'required|numeric',
    //     'jk'                    => 'required|',
    //     'tanggal'               => 'required|date',
    //     'tempatlahir'           => 'required',
    //     'alamat'                => 'required',
    //     'namawali'              => 'required',
    //     'emailwali'             => 'required|email',
    //     'password'              => 'required',
    //     'tanggalwali'           => 'required|date',
    //     'tempatlahirwali'       => 'required',
    //     'alamatwali'            => 'required',
    // ]);

    // make it
    $validation = $validator->make($_POST + $_FILES, [
        'nama'                  => 'required',
        'nohp'                  => 'required|numeric',
        'jk'                    => 'required|',
        'tanggal'               => 'required|date',
        'tempatlahir'           => 'required',
        'alamat'                => 'required',
    ]);

    // then validate
    $validation->validate();

    if ($validation->fails()) {


        // handling errors
        // $errors = $validation->errors();
        // echo "<pre>";
        // print_r($errors->firstOfAll());
        // echo "</pre>";
        // exit;

        return 0;
    } else {
        // validation passes



        //santri
        $idwalisantri       = $_SESSION['user'];
        $nama               = clearData($data['nama']);
        $nohp               = clearData($data['nohp']);
        $jk                 = clearData($data['jk']);
        $tanggal            = clearData($data['tanggal']);
        $tempatlahir        = clearData($data['tempatlahir']);
        $alamat             = clearData($data['alamat']);

        // $emailwali          = clearData($data['emailwali']);
        // $namawali           = clearData($data['namawali']);
        // $emailwali          = clearData($data['emailwali']);
        // $password           = clearData($data['password']);
        // $tanggalwali        = clearData($data['tanggalwali']);
        // $tempatlahirwali    = clearData($data['tempatlahirwali']);
        // $alamatwali         = clearData($data['alamatwali']);


        // $password           = password_hash($password, PASSWORD_BCRYPT);

        $berkas = upload();

        if (!$berkas) return false;

        $return = 0;

        $query = "INSERT INTO santri VALUES('',{$idwalisantri},'{$nama}','{$jk}','{$alamat}','{$tempatlahir}','{$tanggal}','{$nohp}')";
        mysqli_query($koneksi, $query);

        $return += mysqli_affected_rows($koneksi);
        $idsantri = mysqli_insert_id($koneksi);

        // $query = "INSERT INTO wali_santri VALUES('',{$idsantri},'{$namawali}','{$emailwali}','{$password}','{$alamatwali}','{$tempatlahirwali}','{$tanggalwali}','{$nohp}')";
        // mysqli_query($koneksi, $query);
        // $return += mysqli_affected_rows($koneksi);

        $query = "INSERT INTO berkas VALUES('',{$idsantri},'{$berkas}')";
        mysqli_query($koneksi, $query);
        $return += mysqli_affected_rows($koneksi);

        $query = "INSERT INTO pendaftaran VALUES('',{$idsantri},NOW(),0)";
        mysqli_query($koneksi, $query);
        $return += mysqli_affected_rows($koneksi);



        return $return;
    }
}


function editSantri($data)
{
    global $koneksi, $validator;



    // make it
    $validation = $validator->make($_POST + $_FILES, [
        'nama'                  => 'required',
        'nohp'                  => 'required|numeric',
        'jk'                    => 'required|',
        'tanggal'               => 'required|date',
        'tempatlahir'           => 'required',
        'alamat'                => 'required',
    ]);

    // then validate
    $validation->validate();

    if ($validation->fails()) {


        // handling errors
        // $errors = $validation->errors();
        // echo "<pre>";
        // print_r($errors->firstOfAll());
        // echo "</pre>";
        // exit;

        return 0;
    } else {
        // validation passes

        $return = 0;

        $nama               = clearData($data['nama']);
        $nohp               = clearData($data['nohp']);
        $jk                 = clearData($data['jk']);
        $tanggal            = clearData($data['tanggal']);
        $tempatlahir        = clearData($data['tempatlahir']);
        $alamat             = clearData($data['alamat']);
        $idsantri           = clearData($data['idsantri']);
        $idpendaftaran      = clearData($data['idpendaftaran']);



        $query = "UPDATE santri SET nama = '{$nama}', jk = '{$jk}', alamat = '{$alamat}', tempat_lahir = '{$tempatlahir}', tanggal_lahir = '{$tanggal}', no_hp = '{$nohp}' WHERE id_santri = {$idsantri}";
        mysqli_query($koneksi, $query);
        $return += mysqli_affected_rows($koneksi);

        $query2 = "UPDATE pendaftaran SET status = 0 WHERE id_pendaftaran = {$idpendaftaran}";
        mysqli_query($koneksi, $query2);
        $return += mysqli_affected_rows($koneksi);


        if ($_FILES['file']['name']) {
            $berkasSekarang = ambilData("SELECT nama_berkas FROM berkas WHERE id_santri = {$idsantri}")[0]['nama_berkas'];
            $berkas         = upload();
            if (!$berkas) return false;
            unlink("assets/berkas/" . $berkasSekarang);
            $query = "UPDATE berkas SET nama_berkas = '{$berkas}' WHERE id_santri = {$idsantri}";
            mysqli_query($koneksi, $query);
            $return += mysqli_affected_rows($koneksi);
        }


        // $idwalisantri = ambilData("SELECT id_wali_santri FROM wali_santri WHERE id_santri = {$idsantri}")[0]['id_wali_santri'];



        return $return;
    }
}



function tambahWaliSantri($data)
{

    global $koneksi, $validator;





    // make it
    $validation = $validator->make($_POST + $_FILES, [
        'namawali'              => 'required',
        'emailwali'             => 'required|email',
        'password'              => 'required',
        'tanggalwali'           => 'required|date',
        'tempatlahirwali'       => 'required',
        'alamatwali'            => 'required',
        'nohp'                  => 'required|numeric'
    ]);


    // then validate
    $validation->validate();

    if ($validation->fails()) {
        return 0;
    } else {
        // validation passes
        //santri



        $emailwali          = clearData($data['emailwali']);
        $namawali           = clearData($data['namawali']);
        $emailwali          = clearData($data['emailwali']);
        $password           = $data['password'];
        $tanggalwali        = clearData($data['tanggalwali']);
        $tempatlahirwali    = clearData($data['tempatlahirwali']);
        $alamatwali         = clearData($data['alamatwali']);
        $nohp               = clearData($data['nohp']);

        $password           = password_hash($password, PASSWORD_BCRYPT);
        $return = 0;
        $cekEmail = ambilData("SELECT * FROM wali_santri WHERE email = '{$emailwali}'");

        if (count($cekEmail)) return 0;



        // $password           = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO wali_santri VALUES('','{$namawali}','{$emailwali}','{$password}','{$alamatwali}','{$tempatlahirwali}','{$tanggalwali}','{$nohp}')";
        mysqli_query($koneksi, $query);
        $return += mysqli_affected_rows($koneksi);

        return $return;
    }
}


function editWaliSantri($data)
{
    global $koneksi, $validator;

    // make it
    $validation = $validator->make($_POST, [
        'namawali'              => 'required',
        'emailwali'             => 'required|email',
        'tanggalwali'           => 'required|date',
        'tempatlahirwali'       => 'required',
        'alamatwali'            => 'required',
        'nohp'                  => 'required'
    ]);


    // then validate
    $validation->validate();

    if ($validation->fails()) {

        // handling errors
        $errors = $validation->errors();
        echo "<pre>";
        print_r($errors->firstOfAll());
        echo "</pre>";
        exit;
        return 0;
    } else {
        // validation passes
        //santri
        $emailwali          = clearData($data['emailwali']);
        $namawali           = clearData($data['namawali']);
        $emailwali          = clearData($data['emailwali']);

        $tanggalwali        = clearData($data['tanggalwali']);
        $tempatlahirwali    = clearData($data['tempatlahirwali']);
        $alamatwali         = clearData($data['alamatwali']);
        $nohp               = clearData($data['nohp']);
        $idwalisantri = $data['idwalisantri'];


        $query = "UPDATE wali_santri SET nama = '{$namawali}', email = '{$emailwali}', alamat = '{$alamatwali}', tempat_lahir = '{$tempatlahirwali}', tanggal_lahir = '{$tanggalwali}',no_hp = '{$nohp}'";






        $password           = $data['password'];
        $return = 0;

        if ($password) {
            $password           = password_hash($password, PASSWORD_BCRYPT);
            $query .= ", password = '{$password}'";
        }


        $query .= " WHERE id_wali_santri = {$idwalisantri}";


        mysqli_query($koneksi, $query);
        $return += mysqli_affected_rows($koneksi);

        return $return;
    }
}


function prosesSantri($data)
{
    global $koneksi;


    $idsantri   = clearData($data['idsantriproses']);
    $proses     = clearData($data['proses']);


    if ($proses == 1) {
        $kelas          = clearData($data['kelas']);
        $kamar          = clearData($data['kamar']);
        $keterangan     = clearData($data['keterangan']);

        $query = "INSERT INTO kamar VALUES('',{$idsantri},'{$kamar}','{$keterangan}')";
        mysqli_query($koneksi, $query);
        $query = "INSERT INTO kelas VALUES('',{$idsantri},'{$kelas}')";
        mysqli_query($koneksi, $query);
    }
    $query      = "UPDATE pendaftaran SET status = {$proses} WHERE id_santri = {$idsantri}";



    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}


function hakAkses($role, $page)
{
    $akses = [
        [],
        ['tambahpengurus', 'pengurus', 'tanggalpendaftaran', 'santridaftar', 'pembayaran', 'laporankeuangan', 'walisantripengurus', 'laporanpendaftaran', 'laporansantri', 'santriditerima'],
        ['walisantri', 'pembayaran', 'tambahsantri', 'profil', 'santriditerima']
    ];



    if (!in_array($page, $akses[$role])) {
        return 0;
    }
    return 1;
}


function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
