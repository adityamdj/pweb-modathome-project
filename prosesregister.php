<?php
//error_reporting(0);
session_start();
include('database.php');
error_reporting(0);
if(isset($_POST['signup']))
{
  $name = $_POST['name'];
  $email=$_POST['email']; 
  $password=md5($_POST['password']); 
  $sql="INSERT INTO  user(nama,email,password) VALUES(:name,:email,:password)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':name',$name,PDO::PARAM_STR);
  $query->bindParam(':email',$email,PDO::PARAM_STR);
  $query->bindParam(':password',$password,PDO::PARAM_STR);
  $query->execute();
  $lastInsertId = $dbh->lastInsertId();
  if($lastInsertId)
  {
    echo "<script>alert('Berhasil mendaftar, silahkan login');document.location='/modah/login.php'</script>";
  }
  else 
  {
    echo "<script>alert(Gagal mendaftar');document.location='/modah/register.php'</script>";
  }
}
?>
