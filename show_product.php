<FONT Face="Mitr">
<?php
$query_product = "SELECT * FROM tbl_product as p
INNER JOIN tbl_type as t
ON p.type_id = t.type_id
ORDER BY p.p_id ASC"; //การ join จากตาราง
$result_pro =mysqli_query($con, $query_product) or die ("Error in query: $query_product " . mysqli_error());
//echo($query_product);
//exit()
//วนลูปจากตาราง product ;;

//หน้า index.php สินค้าทั้งหมด
?>
<div class="container">
<div class=row>
  <?php foreach ($result_pro as $row_pro){ ?>

      <div class="card-img-top md-3" style="width: 18rem; margin-top: 10px;">
          <center><img class="card-img-top" src="p_img/<?php echo $row_pro['p_img'];?>" alt="..."></center>
          <div class="card-body">
          <center><h5 class="card-title"><?php echo $row_pro['p_name'];?> </h5></center>
          <p class="card-text"></p>
         <center>ประเภท : <?php echo $row_pro['type_name'];?>
         <center>คลังสินค้าที่เหลือ/จำนวน : <?php echo $row_pro['p_qty']. "(ชิ้น)";?>
          <a href="product_detail.php?id=<?php echo $row_pro['p_id'] ?>" class="btn btn-warning">รายละเอียด</a></center> 
        </div>
      </div>&nbsp;&nbsp;
      <?php } ?>
    </div>
    </div>
    </Font>