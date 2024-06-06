<?php
session_start();
try {
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'grocerry');
    define('D', "/backend_projects/grocerry");
} catch (mysqli_sql_exception $e) {
    echo 'Connection error: ' . $e->getMessage();
    // You can also log the error message for further analysis
}
?>
