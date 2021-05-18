<?php
  session_start();
    include("connect.php");  
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm</title>
</head>
<body>
<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $phone = $_POST["phone"];
  $email = $_POST["email"];
  $address = $_POST["address"];
  $total = $_POST["total"]; //ราคารวมทั้งตระกร้า
  date_default_timezone_set("Asia/Bangkok");
  $dttm = date("Y-m-d H:i:s");   
  
  //บันทึกการสั่งซื้อลงใน order_member
  mysqli_query($conn, "BEGIN"); 
  $sql1 = "insert into order_member values(null, '$dttm', '$fname','$lname', '$address', '$email', '$phone',  '$total')";
  $query1 = mysqli_query($conn, $sql1);
  //ฟังก์ชั่น MAX() จะคืนค่าที่มากที่สุดในคอลัมน์ที่ระบุ 
  $sql2 = "select max(o_id) as o_id from order_member where o_name='$fname' and o_email='$email' and o_dttm='$dttm' ";
  $query2 = mysqli_query($conn, $sql2);
  $row = mysqli_fetch_array($query2);
  $o_id = $row["o_id"];
//PHP foreach() เป็นคำสั่งเพื่อนำข้อมูลออกมาจากตัวแปลที่เป็นประเภท array
  foreach($_SESSION['cart'] as $p_id=>$qty)
  {
    $sql3 = "select * from tbl_product where p_id=$p_id";
    $query3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_array($query3);
    $total  = $row3['p_price']*$qty;
    $count=mysqli_num_rows($query3);
    
    $sql4 = "insert into order_detail values(null, '$o_id', '$p_id', '$qty', '$total' )";
    $query4 = mysqli_query($conn, $sql4);
    
    //ตัดสต๊อก
  for($i=0; $i<$count; $i++){
  $instock =  $row3['p_qty']; //จำนวนสินค้าที่มีอยู่
  
  $updatestock = $instock  - $qty; //จำนวนสินค้าที่มีอยู่ - สินค้าที่สั่งซื้อ
  
  $sql5 = "UPDATE tbl_product SET  
     p_qty=$updatestock
     WHERE p_id=$p_id ";
  $query5 = mysqli_query($conn,$sql5);  
  }
    
  /*   stock  */
  }
  
  if($query1 && $query4){
    mysqli_query($conn, "COMMIT");
    $msg = "สั่งซื้อสำเร็จ ขอบคุณที่ใช้บริการค่ะ";
    foreach($_SESSION['cart'] as $p_id)
    { 
      //unset($_SESSION['cart'][$p_id]);
      unset($_SESSION['cart']);
    }
  }
  else{
    mysqli_query($conn, "ROLLBACK");  
    $msg = "สั่งซื้อไม่สำเร็จ กรุณาสั่งซื้อใหม่อีกครั้ง"; 
  }
?>
<script type="text/javascript">
  alert("<?php echo $msg;?>");
  window.location ='index.php';
</script>
</body>
</html>