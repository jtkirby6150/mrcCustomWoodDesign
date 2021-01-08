<?php
ob_start();
session_start();
date_default_timezone_set('America/Denver');

$conn = mysqli_connect('localhost', 'mrccwd', 's3cret', 'mrc');
if(!$conn){
    echo "NOT CONNECTED";
}
?>