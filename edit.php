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
    <div class="container m-3">
        <h2>Edit Data Sekolah</h2>
        <?php
        if ( !empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">NPSN</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="npsn" value="<?php echo $npsn; ?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Status Sekolah</label>
                <div class="col-sm-6">
                    <select class="form-select" name="status" id="<?php echo $status;?>>" aria-label="Default select example">
                        <option selected>-- Pilih Status Sekolah --</option>
                        <option>Negeri</option>
                        <option>Swasta</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Bentuk Pendidikan</label>
                <div class="col-sm-6">
                    <select class="form-select" name="bentuk_pendidikan" id="<?php echo $bentuk_pen; ?>" aria-label="Default select example">
                        <option selected>-- Pilih Jenjang Pendidikan --</option>
                        <option>TK</option>
                        <option>SD</option>
                        <option>SMP</option>
                        <option>SMA</option>
                        <option>SMK</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nama Sekolah</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama_sekolah" value="<?php echo $nama_sekolah; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">SK Pendirian</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="sk_pendirian" value="<?php echo $sk_pendirian; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tanggal Pendirian</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tgl_pendirian" value="<?php echo $pendirian; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">SK Izin Operasional</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="sk_operasional" value="<?php echo $sk_op; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tanggal Izin Operasional</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tgl_operasional" value="<?php echo $tgl_op; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="alamat" value="<?php echo $alamat; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">RT</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="rt" value="<?php echo $rt; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">RW</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="rw" value="<?php echo $rw; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Dusun</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="dusun" value="<?php echo $dusun; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Desa</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="desa" value="<?php echo $desa; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Kecamatan</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="kecamatan" value="<?php echo $kec; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Kabupaten/ Kota</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="kab_kota" value="<?php echo $kab_kota; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Provinsi</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="prov" value="<?php echo $prov; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Kode Pos</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="pos" value="<?php echo $pos; ?>">
                </div>
            </div>

            <?php
                if ( !empty($success)) {
                    echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>$success</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                    </div>
                    
                    ";
                }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/uts/index.php" role="button">Cancel</a>
                </div>
            </div>
            
        </form>

    </div>
</body>
</html>