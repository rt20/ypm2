<?php
require "function.php";
require "cek.php";

$koneksi = mysqli_connect("localhost","root","","stockbarang");

if (isset($_POST['login'])){
  $username = $_POST['email'];
  $password = $_POST['password'];

  $cekuser = mysqli_query($koneksi,"select * from login where email= '$username' and password= '$password'");
  $hitung = mysqli_num_rows($cekuser);

  if ($hitung>0){
    //kalau data ditemukan
    $ambildatarole = mysqli_fetch_array($cekuser);
    $role = $ambildatarole['roles'];
    
    if($role=='admin'){
      $_SESSION['log'] = 'Logged';
      $_SESSION['roles'] = 'admin';
      header('location:admin');
      
    } else {
      $_SESSION['log'] = 'Logged';
      $_SESSION['roles'] = 'user';
      header('location:user');
    }
  } else {
    echo 'Data tidak ditemukan';
  }
};

?>
