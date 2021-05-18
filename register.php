<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<?php
			$serverName = "localhost";
			$userName = "root";
			$userPassword ="12345678";
			$dbName ="pro";
			$connect_db =mysqli_connect($serverName,$userName,$userPassword,$dbName,);
			date_default_timezone_set("Asia/Bangkok");
			$apply_date =date("F j, Y, g:i a");
			
		$sql_command= "insert into user_member (user_id,pass,title,fname,lname,gender,email,Social_account,address,phone,apply_date) values ('".$_POST["user"]."','".$_POST["pass"]."','".$_POST["title"]."','".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["gender"]."','".$_POST["email"]."','".$_POST["Social_account"]."','".$_POST["address"]."','".$_POST["phone"]."','".$apply_date."')";
		$chk_userid="select * from user_member where user_id ='".$_POST["user"]." '";
		$run_chk_userid = mysqli_query($connect_db,$chk_userid);
		if (mysqli_num_rows($run_chk_userid)>0) {
		echo "<script> alert('Username นี้มีผู้ใช้งานแล้ว กรุณากรอก Username ใหม่อีกครั้ง')</script>";
		header('Refresh:0; url=register.html');
		
		}else{
		$run_queary = mysqli_query($connect_db,$sql_command);
		if($run_queary == true){
		echo "<script> alert('บันทึกข้อมูลเรียบร้อย!')</script>";
		header('Refresh:0; url=login.php');
		}
		else{
		echo "<script> alert('บันทึกข้อมูลผิดพลาด!!')</script>";
		header('Refresh:0; url=register.html');
		}
		}
		mysqli_close($connect_db);
		?>
		</script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
	</body>
</html>