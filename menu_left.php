<FONT Face="Mitr">
<!-- <div class="list-group">

	<a href="product.php" class="list-group-item list-group-item-action ">จัดการสินค้า</a>
	<a href="logout.php" class="list-group-item list-group-item-action ">ออกจากระบบ</a>
</div> -->

<?php session_start();
if(isset($_SESSION['id_admin'])==true){
	echo "<center>";
	echo "<br>";
  echo "<h5>username : ".$_SESSION["id_admin"]."</h5>";
  echo "<h5>สถานะของคุณคือ : ".$_SESSION["status"]."</h5>";
  echo "ยินดีต้อนรับคุณ '".$_SESSION["fname"]." ".$_SESSION["lname"]."'";
  echo "<br>";
  

$serverName = "localhost";
      $userName = "root";
      $userPassword ="12345678";
      $dbName ="pro";
      $connect_db =mysqli_connect($serverName,$userName,$userPassword,$dbName,);
      date_default_timezone_set("Asia/Bangkok");

  mysqli_close($connect_db);
  }else{

    echo "<script> alert('คุณไม่สามารถเข้าสู่ระบบ admin ได้ กรุณา login ใหม่อีกครั้ง')</script>";
    header('Refresh:0; url=login_admin.php');
  }

  ?>
</Font>