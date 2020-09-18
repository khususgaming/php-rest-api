<?php
$koneksi = new mysqli("localhost","root","","rest_api");
if($koneksi->connect_errno) {
  echo "Failed to connect to MySQL: ".$koneksi->connect_error;
  exit();
}
?>