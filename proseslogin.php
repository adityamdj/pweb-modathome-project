<?php
//error_reporting(0);
session_start();
include('database.php');
error_reporting(0);
if(isset($_POST['login']))
{
  $email=$_POST['email']; 
  $password=md5($_POST['password']); 
  $sql="Select * from user where email=:email and password=:password";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email',$email,PDO::PARAM_STR);
  $query->bindParam(':password',$password,PDO::PARAM_STR);
  $query->execute();
  $res = $query->fetchAll(PDO::FETCH_OBJ);
// var_dump($res);
// die;
  if($query->rowCount()>0)
  {
    $_SESSION['login']=true;
    $_SESSION['email']=$_POST['email'];
    $_SESSION['nama']=$res[0]->nama;
    echo "<script>alert('Login sukses');document.location='/modah/index.php'</script>";
  }
  else 
  {
    echo "<script>alert('Gagal login');document.location='/modah/login.php'</script>";
  }
}
