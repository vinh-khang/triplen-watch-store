<?php
	session_start();
	include('config/config.php');

?>

<!DOCTYPE html>
<head>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="../css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<link href="../css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="../css/font.css" type="text/css"/>
<link href="../css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="../css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="../css/monthly.css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="../js/jquery2.0.3.min.js"></script>
<script src="../js/raphael-min.js"></script>
<script src="../js/morris.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body style="background-color: #045de9;
background-image: linear-gradient(315deg, #045de9 0%, #09c6f9 74%);">

<div class="log-w3" style ="height: 620px;">
<div class="w3layouts-main" style ="">
	<h2 style ="background: #00adee; padding: 10px;" ><b>Đăng nhập admin</b></h2>
	
		<form action="xuly.php" autocomplete="off" method="POST" style ="margin-top: 30px;">

			<h1 style ="font-size: 15px; color: #000;">Mã số nhân viên:</h1>
			<input type="text" class="ggg" name="msnv" placeholder="Vui lòng điền tên đăng nhập" required="" style="width: 280px;">
			<h1 style ="font-size: 15px; color: #000;">Mật khẩu:</h1>
			<input type="password" class="ggg" name="mk" placeholder="Vui lòng điền mật khẩu" required="" style="width: 280px;">
			<div style="color: red;">
			  <?php                                         
              if(isset($_SESSION['message'])){
                  $message = $_SESSION['message'];
                  echo $message;
                  $_SESSION['message'] = null;
              }
              ?>
			</div>

				<input type="submit" value="Đăng nhập" name="dangnhap_admin" style="width: 280px;">
		</form>
		<!-- <p>Ban chưa có tài khoản ?<a href="registration.html">Tạo tài khoản</a></p> -->
</div>
</div>
<script src="../js/bootstrap.js"></script>
<script src="../js/jquery.dcjqaccordion.2.7.js"></script>
<script src="../js/scripts.js"></script>
<script src="../js/jquery.slimscroll.js"></script>
<script src="../js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="../js/jquery.scrollTo.js"></script>
<script src="../ckeditor/ckeditor.js"></script>
<script type ="text/javascript">
    CKEDITOR.replace('ckeditor');
    CKEDITOR.replace('ckeditor1');
    CKEDITOR.replace('ckeditor2');

</script>
</body>
</html>
