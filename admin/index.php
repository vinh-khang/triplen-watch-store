<?php include('config/config.php');
?>

<?php
// bắt đầu session
session_start();
?>

<!DOCTYPE html>
<head>
<title>Trang quản lý cửa hàng đồng hồ Triplen</title>
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
<!-- //font-awesome icons -->
<script src="../js/jquery2.0.3.min.js"></script>
<script src="../js/raphael-min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body style ="background: #f5f5f5;">
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix" style ="background: #fff;">
<!--logo start-->
<div class="brand" style="background-color: #00aeef;">
    <a class="logo" href="index.php">
        ADMIN
    </a>
    <div class="sidebar-toggle-box" style="background: #00aeef;">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->


<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <?php
            $day_calendar = date('d-m-Y');
            $week_calendar_array = array('Chủ nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư','Thứ Năm','Thứ Sáu', 'Thứ Bảy');
            $week_calendar = $week_calendar_array[date('w')];
        ?>
         <span style="float: left; margin-top: 5px; font-weight: 500;"><i class="fa fa-calendar-o" style="margin-right: 10px;"></i> Hôm nay: <?php echo $week_calendar;?>, <?php  echo $day_calendar;  ?></span>
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="background:#00aeef; border: 1px solid #00aeef; padding: 3px;">
               
                <span class="username" style="padding: 10px;">
                    <i class="fa fa-user" aria-hidden="true"></i> 
                    <?php
                        echo $_SESSION['dangnhap'];
                    ?>

                </span>
                <i class="fa fa-caret-down" aria-hidden="true"></i>
            </a>
            <ul class="dropdown-menu extended logout" style="margin-top: -20px;">
                <li><a href="admin_login.php"><i class="fa fa-key"></i>Đăng xuất</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                 <li class="sub-menu">
                    <a href="index.php?action=donhang">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span>Đơn hàng</span>
                    </a>
                </li>
                   <li class="sub-menu">
                    <a href="index.php?action=quanlysp">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <span>Sản phẩm</span>
                    </a>
                </li>

                  <li class="sub-menu">
                    <a href="index.php?action=quanlyloaisp">
                        <i class="fa fa-trademark" aria-hidden="true"></i>
                        <span>Loại sản phẩm</span>
                    </a>
                </li>
                 <li class="sub-menu">
                    <a href="index.php?action=canhan">
                        <i class="fa fa-suitcase" aria-hidden="true"></i>
                        <span>Thông tin cá nhân</span>
                    </a>
                </li>
                
               
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
    <?php
        if(isset($_GET['action'])){
            $tam = $_GET['action'];
        }else{
            $tam = '';
        }

        if($tam == 'quanlyloaisp'){
            include("loaihang/quanlyloaisp.php");
        }elseif($tam == 'quanlysp'){
            include("sanpham/sanpham.php");
        }elseif($tam == 'suasp'){
            include("sanpham/suasanpham.php");
        }elseif($tam == 'themsp'){
            include("sanpham/themsanpham.php");
        }elseif($tam == 'donhang'){
            include("donhang/donhang.php");
        }elseif($tam == 'chitietdon'){
            include("donhang/chitietdon.php");
        }elseif($tam == 'canhan'){
            include("canhan/canhan.php");
        }else{
            include("sanpham/sanpham.php");
        }
    ?>	

</section>

</section>
<!--main content end-->
</section>
<script src="../js/bootstrap.js"></script>
<script src="../js/jquery.dcjqaccordion.2.7.js"></script>
<script src="../js/scripts.js"></script>
<script src="../js/jquery.slimscroll.js"></script>
<script src="../js/jquery.nicescroll.js"></script>
<script src="../js/jquery.scrollTo.js"></script>


	</script>

</body>
</html>
