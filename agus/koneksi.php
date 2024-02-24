<?php
$connection = mysqli_connect("localhost", "root", "", "bani");
if (!$connection){
    die("Connection Failed:".mysqli_connect_error());
}
?>  