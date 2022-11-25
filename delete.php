<?php
if( isset($_GET["npsn"])){
    $npsn = $_GET["npsn"];

    $server   = "localhost";
    $user     = "root";
    $password = "";
    $db       = "db_sekolah";

    //koneksi
    $connect  = new mysqli($server, $user, $password, $db);

    $sql = "DELETE FROM data_sekolah WHERE npsn=$npsn";
    $connect->query($sql);
}
header("location: /uts/index.php");
exit;
?>