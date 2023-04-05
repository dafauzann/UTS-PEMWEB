<?php
function connection() {
    //Mengoneksikan Ke Database
    $dbhost = 'localhost';
    $dbUser = 'root';
    $dbPass = "";
    $dbName = "transupn";

    $conn = mysqli_connect($dbhost, $dbUser, $dbPass);

    if($conn) {
        $open = mysqli_select_db($conn, $dbName);
        return $conn;
    } else {
        echo "MySQL Tidak Terhubung";
    }
}
?>