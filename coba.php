<?php
    $server   = "localhost";
    $user     = "root";
    $password = "";
    $db       = "db_sekolah";
    
    //koneksi
    $connect  = new mysqli($server, $user, $password, $db);
    
    $npsn         = "";
    $status       = "";
    $bentuk_pen   = "";
    $nama_sekolah = "";
    $sk_pendirian = "";
    $pendirian    = "";
    $sk_op        = "";
    $tgl_op       = "";
    $alamat       = "";
    $rt           = "";
    $rw           = "";
    $dusun        = "";
    $desa         = "";
    $kec          = "";
    $kab_kota     = "";
    $prov         = "";
    $pos          = "";

    $errorMessage = "";
    $success      = "";

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if( !isset($_GET["npsn"])) {
            header("location: /uts/index.php");
            exit;
        }
        $npsn = $_GET["npsn"];

        $sql    = "SELECT * FROM data_sekolah WHERE npsn=$npsn";
        $result = $connect->query($sql);
        $row    = $result->fetch_assoc();

        if (!$row){
            header("location: /uts/index.php");
            exit;
        }

        $npsn         = $row["npsn"];
        $status       = $row["status"];
        $bentuk_pen   = $row["bentuk_pendidikan"];
        $nama_sekolah = $row["nama_sekolah"];
        $sk_pendirian = $row["sk_pendirian"];
        $pendirian    = $row["tgl_pendirian"];
        $sk_op        = $row["sk_izin_operasional"];
        $tgl_op       = $row["tgl_izin_operasional"];
        $alamat       = $row["alamat"];
        $rt           = $row["rt"];
        $rw           = $row["rw"];
        $dusun        = $row["dusun"];
        $desa         = $row["desa"];
        $kec          = $row["kecamatan"];
        $kab_kota     = $row["kabupaten_kota"];
        $prov         = $row["provinsi"];
        $pos          = $row["kode_pos"];
    } 
    else {
        $npsn         = $_POST["npsn"];
        $status       = $_POST["status"];
        $bentuk_pen   = $_POST["bentuk_pendidikan"];
        $nama_sekolah = $_POST["nama_sekolah"];
        $sk_pendirian = $_POST["sk_pendirian"];
        $pendirian    = $_POST["tgl_pendirian"];
        $sk_op        = $_POST["sk_operasional"];
        $tgl_op       = $_POST["tgl_operasional"];
        $alamat       = $_POST["alamat"];
        $rt           = $_POST["rt"];
        $rw           = $_POST["rw"];
        $dusun        = $_POST["dusun"];
        $desa         = $_POST["desa"];
        $kec          = $_POST["kecamatan"];
        $kab_kota     = $_POST["kab_kota"];
        $prov         = $_POST["prov"];
        $pos          = $_POST["pos"];

        do {
            if (empty($npsn) || empty($status) ||empty($bentuk_pen) || empty($nama_sekolah) ||empty($sk_pendirian) || empty($sk_op) ||empty($tgl_op) || empty($alamat) || empty($rt) || empty($rw) || empty($dusun) ||empty($desa) || empty($kec) || empty($kab_kota) || empty($prov)|| empty($pos)){
                $errorMessage = "Periksa Data yang Masih Kosong!";
                break;
            }
        
            $sql = "UPDATE data_sekolah ". "SET status = '$status', bentuk_pendidikan = '$bentuk_pen', nama_sekolah ='$nama_sekolah', sk_pendirian = '$sk_pendirian', tgl_pendirian = '$pendirian', sk_izin_operasional = '$sk_op', tgl_izin_operasional = '$tgl_op', alamat = '$alamat', rt = '$rt', rw = '$rw', dusun = '$dusun', desa = '$desa', kecamatan = '$kec', kabupaten_kota = '$kab_kota', provinsi = '$prov', kode_pos = '$pos'".
                   "WHERE npsn = $npsn";

            $result = $connect->query($sql);

            if(!$result){
                $errorMessage = "Invalid Query: " . $connect->error;
                break;
        }
            $success = "Data Berhasil Diperbarui";

            header("location: /uts/index.php");
            exit;

        } while (false);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js
"></script>
</head>
<body> 
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Open modal for @getbootstrap</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>