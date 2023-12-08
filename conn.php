<?php
$conn = new mysqli('localhost', 'root','','my_ressources');

if (mysqli_connect_errno()) {
    echo "Failed to connect to mysqli: " . mysqli_connect_error();
    exit();
}
?>