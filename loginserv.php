<?php
session_start();
$error=''; //Variable to Store error message;
if(isset($_POST['submit'])){
if(empty($_POST['user']) || empty($_POST['pass'])){
$error = "Username or Password is ผิดพลาด";
}
else
{
//Define $user and $pass
$user=$_POST['user']; //ค่าที่ส่งมากจาก หน้า login
$pass=$_POST['pass'];
//เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect("localhost", "root", "12345678");
//Selecting Database
$db = mysqli_select_db($conn, "pro");
$query = mysqli_query($conn, "SELECT * FROM user_member WHERE pass='$pass' AND user_id='$user'"); //'$user' ชื่อ database

$rows = mysqli_num_rows($query);
if($rows == 1){
echo "<script> alert('เข้าสู่ระบบเรียบร้อย!')</script>";
header('Refresh:0; url=show_index.php');
}
else
{
echo "<script> alert('Username หรือ password ผิดพลาด!')</script>";
header('Refresh:0; url=login.php');
}
mysqli_close($conn); // Closing connection
}
}
?>