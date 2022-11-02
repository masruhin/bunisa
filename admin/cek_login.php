<?php
session_start();
include "koneksi.php";


$username = $db->real_escape_string(stripslashes(strip_tags(htmlspecialchars(htmlspecialchars($_POST['username']), ENT_QUOTES))));
$pass = $db->real_escape_string(stripslashes(strip_tags(htmlspecialchars(htmlspecialchars($_POST['password']), ENT_QUOTES))));

//memastikan username dan password berupa angka dan huruf
if (!ctype_alnum($username) or !ctype_alnum($pass)) {
  header('location:login.php?msg=1');
}else {
  $login = $db->prepare("SELECT username, password,level, blokir FROM users WHERE username=?");
  $login->bind_param("s", $username);
  $login->execute();
  $ada      = $login->get_result();
  $r        = $ada->fetch_object();
  $passhash = $r->password;
  if ($r->blokir == 'Y') {
    header('location:login.php?msg=2');
  }elseif (password_verify($pass, $passhash)){  
    //jika pwd dan username ditemukan
    if ($ada->num_rows > 0) {
      if (!isset($_SESSION)) {
        session_start();
      } 
      $_SESSION['namauser'] = $r->username;
      $_SESSION['passuser'] = $r->password;
      $_SESSION['level']    = $r->level;
      header('location:index.php');
    }
  }else {
      header('location:login.php?msg=3');
  }
}