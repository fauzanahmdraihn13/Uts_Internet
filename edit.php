<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$npsn = mysqli_real_escape_string($mysqli, $_POST['npsn']);
	$status = mysqli_real_escape_string($mysqli, $_POST['status']);
	$bentuk_pendidikan = mysqli_real_escape_string($mysqli, $_POST['bentuk_pendidikan']);
	$nama_sekolah = mysqli_real_escape_string($mysqli, $_POST['nama_sekolah']);
	$sk_pendirian = mysqli_real_escape_string($mysqli, $_POST['sk_pendirian']);
	$tgl_pendirian = mysqli_real_escape_string($mysqli, $_POST['tgl_pendirian']);
	$sk_izin_operasional = mysqli_real_escape_string($mysqli, $_POST['sk_izin_operasional']);
	$tgl_izin_operasional = mysqli_real_escape_string($mysqli, $_POST['tgl_izin_operasional']);
	$alamat = mysqli_real_escape_string($mysqli, $_POST['alamat']);
	$rt = mysqli_real_escape_string($mysqli, $_POST['rt']);
	$rw = mysqli_real_escape_string($mysqli, $_POST['rw']);
	$dusun = mysqli_real_escape_string($mysqli, $_POST['dusun']);
	$desa = mysqli_real_escape_string($mysqli, $_POST['desa']);
	$kecamatan = mysqli_real_escape_string($mysqli, $_POST['kecamatan']);
	$kabupaten = mysqli_real_escape_string($mysqli, $_POST['kabupaten']);
	$provinsi = mysqli_real_escape_string($mysqli, $_POST['provinsi']);
	$kode_pos = mysqli_real_escape_string($mysqli, $_POST['kode_pos']);
	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE tabel_sekolah SET npsn='$npsn', status='$status', bentuk_pendidikan='$bentuk_pendidikan', 
		nama_sekolah='$nama_sekolah', sk_pendirian='$sk_pendirian', tgl_pendirian='$tgl_pendirian', sk_izin_operasional='$sk_izin_operasional', 
		tgl_izin_operasional='$tgl_izin_operasional', alamat='$alamat', rt='$rt', 
		rw='$rw', dusun='$dusun', desa='$desa', kecamatan='$kecamatan', kabupaten='$kabupaten', provinsi='$provinsi', kode_pos='$kode_pos' WHERE npsn='$npsn'");
		//redirectig to the display page. In our case, it is index.php
		if($result){
			echo 'berhasil update';
		} else{
			echo mysqli_error($mysqli);	
		}
		header("Location: index.php");
	}

?>
<?php
//getting id from url
$npsn = $_GET['npsn'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM tabel_sekolah WHERE npsn='$npsn'");

while($res = mysqli_fetch_array($result))
{
	$npsn = $res['npsn'];
	$status = $res['status'];
	$bentuk_pendidikan = $res['bentuk_pendidikan'];
	$nama_sekolah = $res['nama_sekolah'];
	$sk_izin_operasional = $res['sk_izin_operasional'];
	$tgl_izin_operasional = $res['tgl_izin_operasional'];
	$sk_pendirian = $res['sk_pendirian'];
	$tgl_pendirian = $res['tgl_pendirian'];
	$alamat = $res['alamat'];
	$rt = $res['rt'];
	$rw = $res['rw'];
	$dusun = $res['dusun'];
	$desa = $res['desa'];
	$kecamatan = $res['kecamatan'];
	$kabupaten = $res['kabupaten'];
	$provinsi = $res['provinsi'];
	$kode_pos = $res['kode_pos'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<body>
	<div class="container mt-5">
		<h3 class="mx-auto text-center">Update Data</h3>
		<a href="index.php" class="btn btn-primary btn-sm">Home</a>
		<br/><br/>
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>NPSN</td>
				<td><input type="text" name="npsn" value="<?php echo $npsn;?>"></td>
			</tr>
			<tr> 
				<td>Status</td>
				<td>
				<select name="status" id="status"value="<?php echo $status;?>">
					<option value="Negeri">Negeri</option>
					<option value="Swasta">Swasta</option>
				</select></td>
			</tr>
			<tr> 
				<td>Bentuk Pendidikan</td>
				<td>
				<select name="bentuk_pendidikan" id="bentuk_pendidikan"value="<?php echo $bentuk_pendidikan;?>">
					<option value="TK">TK</option>
					<option value="SD">SD</option>
					<option value="SMP">SMP</option>
					<option value="SMA">SMA</option>
					<option value="SMk">SMk</option>
				</select></td>
			</tr>
			<tr> 
				<td>Nama Sekolah</td>
				<td><input type="text" name="nama_sekolah" value="<?php echo $nama_sekolah;?>"></td>
			</tr>
			<tr> 
				<td>SK Pendirian</td>
				<td><input type="text" name="sk_pendirian" value="<?php echo $sk_pendirian;?>"></td>
			</tr>
			<tr> 
				<td>Tanggal Pendirian</td>
				<td><input type="text" name="tgl_pendirian" value="<?php echo $tgl_pendirian;?>"></td>
			</tr>
			<tr> 
				<td>SK Izin Operasional</td>
				<td><input type="text" name="sk_izin_operasional" value="<?php echo $sk_izin_operasional;?>"></td>
			</tr>
			<tr> 
				<td>Tanggal Izin Operasional</td>
				<td><input type="text" name="tgl_izin_operasional" value="<?php echo $tgl_izin_operasional;?>"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?php echo $alamat;?>"></td>
			</tr>
			<tr> 
				<td>Rt</td>
				<td><input type="text" name="rt" value="<?php echo $rt;?>"></td>
			</tr>
			<tr> 
				<td>Rw</td>
				<td><input type="text" name="rw" value="<?php echo $rw;?>"></td>
			</tr>
			<tr> 
				<td>Dusun</td>
				<td><input type="text" name="dusun" value="<?php echo $dusun;?>"></td>
			</tr>
			<tr> 
				<td>Desa</td>
				<td><input type="text" name="desa" value="<?php echo $desa;?>"></td>
			</tr>
			<tr> 
				<td>Kecamatan</td>
				<td><input type="text" name="kecamatan" value="<?php echo $kecamatan;?>"></td>
			</tr>
			<tr> 
				<td>Kabupaten</td>
				<td><input type="text" name="kabupaten" value="<?php echo $kabupaten;?>"></td>
			</tr>
			<tr> 
				<td>Provinsi</td>
				<td><input type="text" name="provinsi" value="<?php echo $provinsi;?>"></td>
			</tr>
			<tr> 
				<td>Kode Pos</td>
				<td><input type="text" name="kode_pos" value="<?php echo $kode_pos;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="npsn" value=<?php echo $_GET['npsn'];?>></td>
				<td><input type="submit" name="update" class="btn btn-success btn-sm mt-3" value="Update"></td>
			</tr>
		</table>
	</form>
	</div>
</body>
</html>
