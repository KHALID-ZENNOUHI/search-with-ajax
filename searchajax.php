<?php
require 'conn.php';
$name = $_POST['name'];
$query = "SELECT * FROM users where UserName like '$name%'";
$queryconn = mysqli_query($conn,$query);
$data = '';
while ($row = mysqli_fetch_array($queryconn)) {
    $data = "<tr><td>".$row['UserID']."</td><td>".$row['UserName']."</td><td>".$row['UserEmail']."</td></tr>";
}
echo $data;
?>