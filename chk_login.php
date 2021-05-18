
<FONT Face="Mitr">
<?php 
session_start();
  $serverName = "localhost";
  $userName = "root";
  $userPassword ="12345678";
  $dbName ="pro";

  $connect_db =mysqli_connect($serverName,$userName,$userPassword,$dbName,);
  date_default_timezone_set("Asia/Bangkok");

$chk_userid="select * from user_member where user_id ='".$_POST["user"]."' ";
 $run_chk_userid = mysqli_query($connect_db,$chk_userid);

 $row_data = mysqli_fetch_array($run_chk_userid,MYSQLI_ASSOC);
if($row_data["pass"]==$_POST["pass"]) {
  $_SESSION["user_id"]=$_POST["user"];
  $_SESSION["fname"]=$row_data["fname"];
  $_SESSION["lname"]=$row_data["lname"];
  $_SESSION["email"]=$row_data["email"];
  $_SESSION["address"]=$row_data["address"];
  $_SESSION["phone"]=$row_data["phone"];
  echo "<script> alert('เข้าสู่ระบบเรียบร้อย!')</script>";
  header('Refresh:0; url=show_index.php');
  

}else{
  echo "<script> alert('Username หรือ Password ผิดพลาด!')</script>";
  header('Refresh:0; url=login.php');
}




mysqli_close($connect_db);
 ?>
</FONT>