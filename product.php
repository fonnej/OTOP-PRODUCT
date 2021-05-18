<!DOCTYPE html>
<html>
<FONT Face="Mitr">
  <body style="background-color: #ffcc66;">
  <?php session_start() ?>
  <head>
    <br><br>
      <center><h1>รายการสินค้าทั้งหมด</h1></center>
    <?php error_reporting( error_reporting() & ~E_NOTICE );
    include('h.php');?>
   
    <head>
      <body>
        <div class="container">
          
          <p></p>
          <div class="row">
            <div class="col-md-3">
              
              <?php include('menu_left.php');?>
            </div>
            <div class="col-md-6">
              <a href="product.php?act=add" class="btn-info btn-sm">เพิ่ม</a>
              <a href="logout.php" class="btn-danger btn-sm">ออกจากระบบ</a>
              <p></p>
              
              <?php
              $act = $_GET['act'];
              if($act == 'add'){
              include('product_form_add.php');
              }elseif ($act == 'edit') {
              include('product_form_edit.php');
              }
              else {
              include('product_list.php');
              }
              ?>
            </div>
          </div>
          
        </FONT>
        </body>
      </html>