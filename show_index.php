<!-- Required meta tags -->
<?php Session_start();?>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<FONT Face="Mitr">
<title>สินค้า OTOP </title>
<body>
      <div class="container" >
<?php include('navbar.php');?>
<img src="p_img/bg2.jpg" width="100%" align='center'>
 <?php 
if(isset($_SESSION['user_id'])==true){
  echo "<font color=green>";
  echo "<br>";
  // echo "username ของท่านคือ : ".$_SESSION["user_id"];
  echo "<br><h4><div>";
  echo "ยินดีต้อนรับคุณ "."'".$_SESSION["fname"]." ".$_SESSION["lname"]." ' ";
  echo "</font></h4></div>";

$serverName = "localhost";
      $userName = "root";
      $userPassword ="12345678";
      $dbName ="pro";
      $connect_db =mysqli_connect($serverName,$userName,$userPassword,$dbName,);
      date_default_timezone_set("Asia/Bangkok");

  mysqli_close($connect_db);
  }else{

    echo "<script> alert('คุณยังไม่ได้ทำการ login กรุณา login ใหม่อีกครั้ง')</script>";
    header('Refresh:0; url=logout.php');
  }

  ?>
<!--Start slide -->
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img class="d-block w-100" src="p_img/slide/q1.png" alt="First slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="p_img/slide/q2.png" alt="Second slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="p_img/slide/q3.png" alt="Third slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100" src="p_img/slide/q4.png" alt="Third slide">
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				<!--end slide -->
				<!-- สินค้าแนะนำหน้าแรก 8ชิ้น-------------------------------------------------------------------->
				
              <!-- <?php include('menu.php');?> -->
             
				<div class="col-2"></div>
				<div class="col-100"></div>
				<br>
				<!-- show product -->
				<font color=#666633;><P><h1 style="text-align:center;">&nbsp;&nbsp;สินค้าแนะนำ</h1><P></font>
					<div class="container"><br>
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-3">
								<div class="thumbnail">
									<center><img src="p_img/p1.jpg" height="250" width="250" alt="..."></center>
									<div class="caption">
										<center><h5> ลำใยกรอบ</h5></center>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3">
								<div class="thumbnail">
									<center><img src="p_img/a1.jpg" height="250" width="250" alt="..."></center>
									<div class="caption">
										<center><h5>ขนุนกรอบ</h5></center>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3">
								<div class="thumbnail">
									<center><img src="p_img/s5.jpg" height="250" width="250" alt="..."></center>
									<div class="caption">
										<center><h5>กาแฟ แจ๊สเบอร์ พรีเมียม</h5></center>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3">
								<div class="thumbnail">
									<center><img src="p_img/s9.jpg" height="250" width="250" alt="..."></center>
									<div class="caption">
										<center><h5>ฮันนี่ วีนีก้าร์</h5></center>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3">
								<div class="thumbnail">
									<center><img src="p_img/g7.jpg" height="250" width="250" alt="..."></center>
									<div class="caption">
										<center><h5>ก้านไม้หอมกลิ่น warm jasmine</h5></center>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3">
								<div class="thumbnail">
									<center><img src="p_img/g6.jpg" height="250" width="250" alt="..."></center>
									<div class="caption">
										<center><h5>สเปรย์น้ำแร่</h5></center>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3">
								<div class="thumbnail">
									<center><img src="p_img/a6.jpg" height="250" width="250" alt="..."></center>
									<div class="caption">
										<center><h5>โลชั่นบำรุงผิวกายข้าวก่ำ</h5></center>
									</div>
								</div>
							</div><div class="col-xs-12 col-sm-6 col-md-3">
							<div class="thumbnail">
								<center><img src="p_img/a7.jpg" height="250" width="250" alt="..."></center>
								<div class="caption">
									<center><h5>สบู่เหลวข้าวก่ำ</h5></center>
								</div><br><br>
							</div>
						</div>
					</div>
					<center><a href="index.php" class="btn btn-warning"> ไปหน้ารายการสินค้า</a> </center><br>
					  </Font>
					  <!-- Optional JavaScript -->
				<!-- jQuery first, then Popper.js, then Bootstrap JS -->
				<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
				<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>