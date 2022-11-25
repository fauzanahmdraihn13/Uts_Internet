<?php
date_default_timezone_set("Asia/Jakarta");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js
"></script>
</head>
<body>
    <div class="container m-3">
        <h2>Data Sekolah</h2>
        <a class="btn btn-primary" href="/uts/add.php" role="button">Tambah Sekolah</a>
        <br>
        <table class="table table-striped table-hover">
            <thead>
                <tr class="text-center">
                    <th>NPSN</th>
                    <th>Status Sekolah</th>
                    <th>Bentuk Pendidikan</th>
                    <th>Nama Sekolah</th>
                    <th>SK Pendirian Sekolah</th>
                    <th>Tanggal Pendirian</th>
                    <th>SK Izin Operasional</th>
                    <th>Tanggal Izin Operasional</th>
                    <th>Alamat</th>
                    <th>RT</th>
                    <th>RW</th>
                    <th>Dusun</th>
                    <th>Desa</th>
                    <th>Kecamatan</th>
                    <th>Kabupaten/Kota</th>
                    <th>Provinsi</th>
                    <th>Kode Pos</th>
                    <th colspan="2">Action</th>
                </tr>    
            </thead>
            <tbody>
            <?php
            $server   = "localhost";
            $user     = "root";
            $password = "";
            $db       = "db_sekolah";

            //koneksi
            $connect  = new mysqli($server, $user, $password, $db);

            //cek
            if($connect->connect_error){
                die("Gagal Koneksi: ". $connect->connect_error);
            }

            //menampilkan data dari database
        
            $sql    = "SELECT * FROM data_sekolah";
            $result = $connect->query($sql);

            if(!$result){
                die("Invalid Query: ". $connect->error);
            }

            while($row = $result->fetch_assoc()){
                echo"
                <tr>
                    <td>$row[npsn]</td>
                    <td>$row[status]</td> 
                    <td>$row[bentuk_pendidikan]</td>
                    <td>$row[nama_sekolah]</td>
                    <td>$row[sk_pendirian]</td>
                    <td>$row[tgl_pendirian]</td>
                    <td>$row[sk_izin_operasional]</td>
                    <td>$row[tgl_izin_operasional]</td>
                    <td>$row[alamat]</td>
                    <td>$row[rt]</td>
                    <td>$row[rw]</td>
                    <td>$row[dusun]</td>
                    <td>$row[desa]</td>
                    <td>$row[kecamatan]</td>
                    <td>$row[kabupaten_kota]</td>
                    <td>$row[provinsi]</td>
                    <td>$row[kode_pos]</td>
                
                    <td>
                    <button type='button'class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-whatever='@mdo'>Edit</button>
                    <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                        <div class='modal-dialog modal-xl'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h1 class='modal-title fs-5' id='exampleModalLabel'>Edit Data</h1>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                            <div class='modal-body'>
                                <form>
                                    <div class='mb-3'>
                                        <label for='npsn' class='col-form-label'>NPSN</label>
                                        <input class='form-control' type='text' name='npsn' value='<?php echo $npsn; ?>' readonly>
                                    </div>
                                    <div class='mb-3'>
                                        <label for='message-text' class='col-form-label'>Message:</label>
                                        <textarea class='form-control' id='message-text'></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                <button type='button' class='btn btn-primary'>Send message</button>
                            </div>
                        </div>
                    </div>
                </div>
                        <a class='btn btn-primary btn-sm' href='/uts/coba.php?npsn=$row[npsn]'>Edit</a>  
                    </td>
                    <td>
                        <a class='btn btn-dark btn-sm' href='/uts/delete.php?npsn=$row[npsn]'>Delete</a>
                    </td>
              </tr>
                ";
            }

            ?> 
            </tbody>
        </table>
    </div>
</body>
</html>