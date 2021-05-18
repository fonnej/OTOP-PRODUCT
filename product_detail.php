<FONT Face="Mitr">
<?php
include('h.php');
include('backend/condb.php');
$p_id = $_GET["id"];
?>
<!DOCTYPE html>
<head>
  <title>รายละเอียดสินค้า</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <style>
  div.polaroid {
  width: 80%;
  background-color: white;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  margin-bottom: 25px;
  }
  div.container_di {
  text-align: center;
  padding: 10px 20px;
  }
  </style>
</head>
<body>
  
  <div class="container">
    <?php include('navbar.php'); ?><br><br>
    <div class="row">
      <?php
      $sql = "SELECT * FROM tbl_product as p
      INNER JOIN tbl_type  as t ON p.type_id=t.type_id
      AND p_id = $p_id ";
      $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
      $row = mysqli_fetch_array($result);
      ?>
      <!-- หน้ารายละเอียดสินค้า --------------------------------------------->
      <center><h2>รายละเอียดสินค้า</h2>
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="thumbnail">
              <?php echo"<img src='p_img/".$row['p_img']."'width='100%' align='left'>";?>
              <div class="container_di">
                <h5><?php echo $row["p_name"];?></h5>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <br><center><h2><?php echo $row["p_name"];?></h2></center>
            <center><h5> ประเภท : <?php echo $row["type_name"];?></h5></center>
            <center><h4><?php echo $row['p_price'];?> THB</center></h4>
            <center><?php echo $row["p_detail"];?></center>
            <p>
<center><a href='cart.php?p_id=<?php echo $row['p_id']?>&act=add' class="btn btn-warning" type="submit" name="Add_to_Cart" role="button">สั่งซื้อ</a></p></center>
<center><a href="index.php" class="btn btn-dark"> กลับไปหน้ารายการสินค้า</a> </center><br>


</form>
</div>

</p>
</div>
</div>
</div>
</div>
</div>
</Font>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>