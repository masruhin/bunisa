<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "bunisa";

$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($db->connect_errno) {
  echo 'Koneksi Berhasil';
}