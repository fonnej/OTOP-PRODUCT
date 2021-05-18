<!DOCTYPE HTML>
<html>
  <head>
    <meta charset=UTF-8>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
    <div class="center">
      <center>
      <?php
      $username = $_POST["username"];
      $password = $_POST["password"];
      // username มีค่า user123... password 123456
      if($username == "user123" and $password == "123456"){
      echo '
      <script>swal({
      title: "เข้าสู่ระบบสำเร็จ",
      text: "ยินดีต้อนรับ",
      icon: "success",
      buttons: false,
      });
      setTimeout(function(){window.location="index.php";}, 3000)
      </script>
      ';
      }
      else{
      echo '
      <script type="text/javascript">
      swal({
      title: "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง",
      text: "The username and password is incorrect",
      icon: "warning",
      buttons: false,
      });
      setTimeout(function(){window.location="index.php";}, 3000)
      </script>
      ';
      }
      ?>
    </body>
  </html>