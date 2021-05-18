
<FONT Face="Mitr">
<?php 
session_start();
  $serverName = "localhost";
  $userName = "root";
  $userPassword ="12345678";
  $dbName ="pro";

  $connect_db =mysqli_connect($serverName,$userName,$userPassword,$dbName,);
  date_default_timezone_set("Asia/Bangkok");

$chk_userid="select * from tbl_admin where id_admin ='".$_POST["admin"]."' ";
 $run_chk_admin_id = mysqli_query($connect_db,$chk_userid);

 $row_data = mysqli_fetch_array($run_chk_admin_id,MYSQLI_ASSOC);
if($row_data["pass"]==$_POST["pass"]) {
  $_SESSION["id_admin"]=$_POST["admin"];
  $_SESSION["fname"]=$row_data["fname"];
  $_SESSION["lname"]=$row_data["lname"];
  $_SESSION["status"]=$row_data["status"];
  echo "<script> alert('คุณคือ admin ยินดีต้อนรับสู่ระบบหลังบ้าน')</script>";
  header('Refresh:0; url=product.php');
  

}else{
  echo "<script> alert('คุณไม่สามารถเข้าสู่ระบบ admin ได้ กรุณา login ใหม่อีกครั้ง')</script>";
  header('Refresh:0; url=login_admin.php');
}




mysqli_close($connect_db);
 ?>
</FONT>