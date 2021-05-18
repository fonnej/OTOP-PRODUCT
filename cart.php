<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<FONT Face="Mitr">
<div class="container"> <br>
	<?php include('navbar2.php');?> 
	 <body style="background-color: #ffcc66;">
</div>
<!-------------------รับค่า ปุ่ม สั่งซื้อ แก้ไข ยกเลิกสินค้า ----------------------->
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
<!-------------------หน้าตระกร้าสินค้า----------------------->
<title>ตะกร้าสินค้า</title>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<h1 align='center'>ตะกร้าสินค้า<td><br></h1>
				<a href="index.php" class="btn btn-warning">กลับหน้ารายการสินค้า</a></td>
				<form id="frmcart" name="frmcart" method="post" action="?act=update">
					<table class="  table-hover ">
						<br>
						<tr>
							<th width="3%" bgcolor="ffff99">#</th>
							<th width="10%" bgcolor="ffff99">รูปสินค้า</th>
							<th width="10%" bgcolor="ffff99">รหัสสินค้า</th>
							<th width="20%" bgcolor="ffff99">ชื่อสินค้า</th>
							<th width="10%" bgcolor="ffff99">คลังสินค้าที่เหลือ/จำนวน(ชิ้น)</th>
							<th width="10%" align="center" bgcolor="ffff99">ราคา</th>
							<th width="10%" align="center" bgcolor="ffff99">จำนวน</th>
							<th width="5%" align="center" bgcolor="ffff99">รวม(บาท)</th>
							<th width="5%" align="center" bgcolor="ffff99">ลบ</th>
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
								$sum = $row['p_price'] * $qty;
								$total += $sum; //ราคารวม
								$p_qty = $row['p_qty']; //จำนวนสินค้าในสต๊อก
								echo "<tr>";
								echo "<td>" . @$i +=1 . "</td>";
								echo "<td>"."<img src='p_img/".$row['p_img']."' width='100'>"."</td>";
								echo "<td>" . $row["p_id"] . "</td>";
								echo "<td>" . $row["p_name"] ."</td>";
								echo "<td>" .$row["p_qty"]. "</td>";
								echo "<td align=''>".number_format($row["p_price"],2)."</td>";
								echo "<td align='right'>";
								echo "<input type='number' name='amount[$p_id]' value='$qty' class='form-control' min='1' max='$p_qty' /></td>";
								echo "<td align=''>".number_format($sum,2)."</td>";
																		//remove product
								echo "<td align='center'><a href='cart.php?p_id=$p_id&act=remove'class='btn btn-primary btn-sm '>ลบ</a></td>";
								echo "</tr>";
												}
								echo "<tr>";
								echo "<td colspan='7' bgcolor='#ffff99' align='center'>ราคารวม</td>";
								echo "<td align='right' bgcolor='#ffff99'>"."".number_format($total,2).""."</td>";
								echo "<td align='left' bgcolor='#ffff99'></td>";
								echo "</tr>";
											}
								if($total>0){
							?>
							<!-------------------หน้าตระกร้าสินค้า จบ----------------------->
							<!-------------------ปุ่ม สั่งซื้อ แก้ไข ยกเลิกสินค้า ส่งค่าไป confirm.php ------------------------------>
							
							<tr>
								<td colspan="9" align="right"><br>
						<input type="button" class="btn btn-danger" name="btncancel" value="ยกเลิกการสั่งซื้อ" onclick="window.location='cart.php?act=cancel';"/  >
						<input type="submit" class="btn btn-warning" name="button" id="button" value="แก้ไข" />
						<input type="button" class="btn btn-success" name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm.php';" />
								</td>
							</tr>
							<?php }else{
								echo "<font color='red'><h4 align='center'>ไม่มีสินค้าในตระกร้า กรุณาเลือกสินค้าใหม่อีกครั้ง!!</h4></font>";
							} ?>
						</table>
					</form>
				</div>
			</div>
		</div>
		</Font>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>