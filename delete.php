<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$npsn = $_GET['npsn'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM tabel_sekolah WHERE npsn='$npsn'");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

