<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<FONT Face="Mitr">
<?php 

$type_id = $_GET['type_id'];
//echo $type_id;
//exit();


$query_product_type = "SELECT * FROM tbl_product as p
INNER JOIN tbl_type as t
ON p.type_id = t.type_id
WHERE p.type_id = $type_id
ORDER BY p.p_id ASC"; //การ join จากตาราง
  $result_pro =mysqli_query($con, $query_product_type) or die ("Error in query: $query_product_type " . mysqli_error());
    //echo($query_product_type);
    //exit()
//หน้าสินค้าแต่ละประเภท
?>
<div class="container">
<div class=row>
  <?php foreach ($result_pro as $row_pro) { ?>
<div class="card-img-top md-3" style="width: 18rem; margin-top: 10px;">
  <img class="card-img-top" src="p_img/<?php echo $row_pro['p_img'];?>" alt="...">
  <div class="thumbnail">
    <center><h5 class="card-title"><?php echo $row_pro['p_name'];?> </h5></center>
    <p class="card-text"></p>
   <center>ประเภท : <?php echo $row_pro['type_name'];?>
         <center>คลังสินค้าที่เหลือ/จำนวน : <?php echo $row_pro['p_qty']. "(ชิ้น)";?>
          <a href="product_detail.php?id=<?php echo $row_pro['p_id'] ?>" class="btn btn-warning">รายละเอียด</a></center> 
  </div>
</div>&nbsp;&nbsp;

<?php } ?>

</div>
</Font>