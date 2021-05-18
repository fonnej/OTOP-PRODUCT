
    <!-------------------------------------------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <FONT Face="Mitr">
    <div class="container"> <br>
      <body style="background-color: #ffcc66;">
      <?php include('navbar2.php');?>
    </div>
    <!------------------------รับค่าปุ่ม สั่งซื้อ แก้ไข ยกเลิกสินค้า --------------------------------------------->
    <?php
    session_start();
    error_reporting( error_reporting() & ~E_NOTICE );
    $p_id = $_GET['p_id'];
    $act = $_GET['act'];
    if($act=='add' && !empty($p_id))
    {
    if(isset($_SESSION['cart'][$p_id]))
    {
    $_SESSION['cart'][$p_id]++;
    }
    else
    {
    $_SESSION['cart'][$p_id]=1;
    }
    }
    if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
    {
    unset($_SESSION['cart'][$p_id]);
    }
    if($act=='update') //แก้ไขรายการสินค้า
    {
    $amount_array = $_POST['amount'];
    foreach($amount_array as $p_id=>$amount)
    {
    $_SESSION['cart'][$p_id]=$amount;
    }
    }
    //cancel cart ยกเลิกสินค้า
    if($act=='cancel'){
    unset($_SESSION['cart']);
    }
    ?>
    <!----------------------- ปุ่ม สั่งซื้อ แก้ไข ยกเลิกสินค้า จบ------------------------------>
    <!-------------------------- ตารางยืนยันการสั่งซื้อ ----------------------------------->
    <title>ยืนยันการสั่งซื้อ</title>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <h2 align='center'>ยืนยันการสั่งซื้อ<td><br></h2>
            <a href="index.php" class="btn btn-warning">กลับหน้ารายการสินค้า</a></td>
            <form id="frmcart" name="frmcart" method="post" action="saveorder.php">
              <table class="   table-hover ">
                <br>
                <tr>
                  <th width="5%" bgcolor="ffff99">#</th>
                  <th width="10%" bgcolor="ffff99">รูปสินค้า</th>
                  <th width="10%" bgcolor="ffff99">รหัสสินค้า</th>
                  <th width="30%" bgcolor="ffff99">ชื่อสินค้า</th>
                  <th width="10%" bgcolor="ffff99">คลังสินค้าที่เหลือ/จำนวน(ชิ้น)</th>
                  <th width="5%" align="center" bgcolor="ffff99">ราคา</th>
                  <th width="10%" align="center" bgcolor="ffff99">จำนวน</th>
                  <th width="5%" align="center" bgcolor="ffff99">รวม(บาท)</th>
                </tr>
                <?php
                $total=0;
                if(!empty($_SESSION['cart']))
                {
                include("connect.php");
                foreach($_SESSION['cart'] as $p_id=>$qty)
                {
                $sql = "select * from tbl_product where p_id=$p_id";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($query);
                $sum = $row['p_price'] * $qty; //ราคาสินค้า x จำนวนที่สั่งซื้อ
                $total += $sum; //ราคารวม
                echo "<tr>";
                  echo "<td>" . @$i +=1 . "</td>";
                  echo "<td>"."<img src='p_img/".$row['p_img']."' width='100'>"."</td>";
                  echo "<td>" . $row["p_id"] . "</td>";
                  echo "<td>" . $row["p_name"] . "</td>";
                  echo "<td>" .$row["p_qty"]. "</td>";
                  echo "<td align=''>" .number_format($row["p_price"],2) . "</td>";
                  echo "<td align=''>";
                    echo "<input type='number' name='amount[$p_id]' value='$qty' class='form-control' readonly/></td>";
                    echo "<td align='right'>".number_format($sum,2)."</td>";
                  echo "</tr>";
                  }
                  echo "<tr>";
                    echo "<td colspan='6' bgcolor='#ffff99' align='center'>ราคารวม</td>";
                    echo "<td align='' bgcolor='#ffff99'>"."".number_format($total,2).""."</td>";
                    echo "<td align='' bgcolor='#ffff99'></td>";
                  echo "</tr>";
                  }
                  ?>
                </table>
                <!-------------------- ตารางยืนยันการสั่งซื้อ ปิด --------------------------------------------->
                <!-------------------- แบบฟอร์ม รายละเอียดที่อยู่สำหรับจัดส่งสินค้า -------------------------------->
                <br>
                <h3 align="center">รายละเอียดที่อยู่สำหรับจัดส่งสินค้า</h3>
                <!-- <div class="jumbotron"> -->
                  <center><div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="inputEmail4">ชื่อ :</label>
                      <input type="text" class="form-control" id="inputEmail4" placeholder="ชื่อ-นามสกุล" name="fname"required /value="<?php echo $_SESSION['fname'] ?>">
                    </div>
                    <div class="form-group col-md-4">
                     <label for="sel1">นามสกุล:</label>
                     <input type="text" class="form-control" id="inputCity" placeholder="กรุณาใส่ตำบล/แขวง" name="lname"required /value="<?php echo $_SESSION['lname'] ?>">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputCity">Email :</label>
                        <input type="Email" class="form-control" id="inputCity" placeholder="Email" name="email"required /value="<?php echo $_SESSION['email'] ?>">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputCity">เบอร์โทรศัพท์ :</label>
                        <input type="text" class="form-control" id="inputCity" placeholder="เบอร์โทรศัพท์" name="phone"required /value="<?php echo $_SESSION['phone'] ?>">
                      </div>
                    <div class="form-group col-md-4">
                     <label for="sel1">รายละเอียดที่อยู่ในการจัดส่ง:</label>
                     <input type="text" name="address" id="address" class="form-control" placeholder="328/30 ลาดพร้าวซอย 1 ถนน ลาดพร้าว"/value="<?php echo $_SESSION['address'] ?>"></center> 
                    </div><br>              
                    
              <input type="hidden" name="total" value="<?php echo $total;?>">
              <br>
              <center><button type="submit" name="Submit2" value="สั่งซื้อ" class="btn btn-warning">สั่งซื้อสินค้า</button></center>
            </form>
          </div>
        </div>
        <br>
        </Font>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="assets/jquery.min.js"></script>
<script src="assets/script.js"></script>
</body>
</html>
<?php
mysqli_close($conn);
