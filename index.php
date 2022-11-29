<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM tabel_sekolah"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Homepage</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<body>
	<h3 class="mx-auto text-center mt-5">DATA SEKOLAH</h3>
	<div class="mx-auto py-5 px-5">
<a href="add.html" class="btn btn-secondary btn-sm">Tambah Data</a><br/><br/>

	<table class="table table-sm table-hover" width='100%' border=0>

	<tr class="bg-primary text-white">
		<td>NPSN</td>
		<td>Nama Sekolah</td>
		<td>Bentuk Pendidikan</td>
		<td>Status</td>
		<td>SK Pendirian</td>
		<td>Tanggal Pendirian</td>
		<td>SK Izin Operasional</td>
		<td>Tanggal Izin Operasional</td>
		<td>Alamat</td>
		<td>Rt</td>
		<td>Rw</td>
		<td>Dusun</td>
		<td>Desa</td>
		<td>Kecamatan</td>
		<td>Kabupaten</td>
		<td>Provinsi</td>
		<td>Kode Pos</td>
		<td>Aksi</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['npsn']."</td>";
		echo "<td>".$res['nama_sekolah']."</td>";
		echo "<td>".$res['bentuk_pendidikan']."</td>";
		echo "<td>".$res['status']."</td>";	
		echo "<td>".$res['sk_pendirian']."</td>";	
		echo "<td>".$res['tgl_pendirian']."</td>";	
		echo "<td>".$res['sk_izin_operasional']."</td>";	
		echo "<td>".$res['tgl_izin_operasional']."</td>";	
		echo "<td>".$res['alamat']."</td>";	
		echo "<td>".$res['rt']."</td>";	
		echo "<td>".$res['rw']."</td>";	
		echo "<td>".$res['dusun']."</td>";	
		echo "<td>".$res['desa']."</td>";	
		echo "<td>".$res['kecamatan']."</td>";	
		echo "<td>".$res['kabupaten']."</td>";	
		echo "<td>".$res['provinsi']."</td>";	
		echo "<td>".$res['kode_pos']."</td>";	
		echo "<td><a class='text-success' href=\"edit.php?npsn=$res[npsn]\">Edit</a> | <a class='text-danger' href=\"delete.php?npsn=$res[npsn]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
	</div>
</body>
</html>
