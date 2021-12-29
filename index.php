<?php include('admin/config/config.php');
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cửa hàng đồng hồ Triplen</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/mystyle.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">     

</head><!--/head-->

<body style="background: #f2f2f2;">
    <header id="header"><!--header-->

        
        <div class="header-middle" style ="background-color: #00adee;"><!--header-middle-->
            <div class="container" style ="">
                <div class="row">
                    <div class="col-sm-4">

                        <div class="logo pull-left">
                            <a href="index.php"><img src="images/congty/logocongty.png" style ="width: 300px;" alt="" /></a>
                        </div>
                       
                    </div>
                 
                    <div class="col-sm-9" >
                          <div class="social-icons pull-right">
                            <ul class="nav navbar-nav" style="float: right;">

                                <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook" title ="Đến Facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram" title ="Đến Instagram"></i></a></li>
                                <li><a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube-play" title ="Đến Youtube"></i></a></li>
                            </ul>
                            <br>
                          <div style="float:right;  margin-top: 10px; ">
                          
                            <?php if(isset($_SESSION['dangnhaptaikhoan'])) {?>
                                <div class="top-nav clearfix" >
                                    <ul class="nav pull-right top-menu" > 

                                    <li class="dropdown" >

                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="background:#00aeef; border-radius: 20px; padding-right: 5px; padding-left: 5px; height: 25px; display: -webkit-box;-webkit-box-orient: vertical;    -webkit-line-clamp: 1; overflow: hidden;">
                                            <span class="username" style="font-weight: 1000px;margin-bottom: 10px;  float: right;"><i class="fa fa-user" aria-hidden="true" style="padding: 0px; padding-right: 5px;"></i><b>
                                             <?php
                                                echo $_SESSION['dangnhaptaikhoan'];
                                             ?>   
                                            </b></span>
                                    
                                        </a>

                                        <ul class="dropdown-menu extended logout" style="width: 30px; hover: background: #00adee;">
                                            <li ><a href="?action=thongtintaikhoan" style="color: #000;"><i class="fa fa-user" aria-hidden="true"></i>Tài khoản</a></li><br>
                                            <li><a href="?action=diachi" style="color: #000;"><i class="fa fa-map-marker" aria-hidden="true"></i>Địa chỉ</a></li>
                                            <li><a href="admin/xuly.php?action=dangxuat" style="color: #000;"><i class="fa fa-sign-out" aria-hidden="true"></i>Đăng xuất</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                </div>
                                <?php }else{ ?>
                                 <a href="?action=dangnhap" style="color: #fff; font-size: 16px; float: right;"><b> Đăng nhập/Đăng ký</b></a>    
                                <?php } ?>
                                
                            </div></div>
                        <div class="col-sm-9" style=" margin-top: 30px; float: left;">    
                        <form action ="admin/xuly.php" method="POST" style="">
                            <div class="container-4">

                            <div class="search_box pull-right" style ="margin-top: 5px;">
                                <input type ="text" name ="tukhoa" style ="width: 400px;" value ="" placeholder="Tìm kiếm sản phẩm"/>
                                
                                <button type="submit" name="timkiem" class="icon"><i class="fa fa-search"></i></button>
                                
                            </div>
                        </div> 
                        </form>
                      
                        </div>
                    </div>
           
                   <!--   <div class="col-sm-7">
                        
                    </div> -->
    
                </div>
            </div>
        </div><!--/header-middle-->
    <div class="header-bottom" style =""><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="index.php">Trang chủ</a></li>
                                <li><a href="?action=gioithieu">Giới thiệu<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                        <li><a style ="background: none; margin: 0px;" href="?action=gioithieu">Giới thiệu</a></li> 
                                        <li><a style ="background: none; margin: 0px;" href="?action=baohanh">Chính sách bảo hành</a></li> 
                                        <li><a style ="background: none; margin: 0px;" href="?action=doitra">Chính sách đổi - trả - hoàn tiền</a></li>
                                    </ul></li>
                                <li class="dropdown"><a href="index.php">THƯƠNG HIỆU <i class="fa fa-angle-down"></i></a>
                                
                                <ul role="menu" class="sub-menu">
                                <?php
                                          $sql_lietke_loai = "SELECT * FROM loaihanghoa ORDER BY maloaihang ASC";
                                          $query_lietke_loai = mysqli_query($mysqli, $sql_lietke_loai);
                                          
                                          while($row = mysqli_fetch_array($query_lietke_loai)){
                                            ?> 
                                             <li><a style ="background: none; margin: 0px; line-height: 20px;" href="index.php?action=lietkeloai&idloai=<?php echo $row['maloaihang'] ?>"><?php echo $row['tenloaihang'] ?></a></li>
                                  <?php
                                          }
                                      ?>
                                      </ul></li>  
                                
                                <li style="float: right;"><a href="?action=giohang">GIỎ HÀNG</a>    
                             
                            </ul>
                        </div>
                        <!-- Đăng nhập -->
                         
                    </div>
               
                </div>
            </div>
        </div><!--/header-bottom-->
    </header>
    </section>

 <section>
        <div class="container">
            <div class="row">
                    <?php
                        if(isset($_GET['action'])){
                            $tam = $_GET['action'];
                        }else{
                            $tam = '';
                        }

                        if($tam == 'chitietsanpham'){
                            include("pages/chitietsanpham.php");
                        }elseif($tam == 'lietkeloai'){
                            include("pages/lietkeloai.php");
                        }elseif($tam == 'giohang'){
                            include("pages/giohang.php");
                        }elseif($tam == 'dangnhap'){
                            include("pages/dangnhap.php");
                        }elseif($tam == 'timkiem'){
                            include("pages/timkiem.php");
                        }elseif($tam == 'thongtintaikhoan'){
                            include("pages/taikhoan.php");
                        }elseif($tam == 'diachi'){
                            include("pages/diachi.php");
                        }elseif($tam == 'thanhtoan'){
                            include("pages/thanhtoan.php");
                        }elseif($tam == 'thanhcong'){
                            include("pages/thanhcong.php");
                        }elseif($tam == 'gioithieu'){
                            include("pages/gioithieu.php");
                        }elseif($tam == 'baohanh'){
                            include("pages/baohanh.php");
                        }elseif($tam == 'doitra'){
                            include("pages/doitra.php");
                        }else{
                            include("pages/home.php");
                        }
                    ?>  
        </div>
</section>


    <footer id="footer"style="background: #F0F0E9; border-top: 1px solid #e8e8e8;" ><!--Footer-->
        <div class="footer-widget" style="margin-bottom: 10px;">
            <div class="container" style="padding-top: 0px;">
                <div class="row">

                     <div class="col-sm-6">
                        <div class="single-widget">
                             <div class="companyinfo" style="margin-top: 20px;">
                                <h2><b>CỬA HÀNG ĐỒNG HỒ</b><span style="color: #00adee;"> TRIPLEN</span></h2>
                            <p style="width: 1000px; font-size: 16px;color: #666;"><i class="fa fa-map-marker" style="margin-right: 9px; "></i> Tổ 13, phường Thượng Thanh, quận Long Biên, Hà Nội</p>

                            <h2 >LIÊN HỆ HỖ TRỢ</h2>
                            <p style="width: 1000px; font-size: 16px; color: #666;"><i class="fa fa-phone" style="margin-right: 7px;"></i> Hotline chăm sóc khách hàng: 1900-6035
                            </p>
                            <p style="width: 1000px; font-size: 16px; color: #666;">(1000đ/phút , 8-21h kể cả T7, CN)</p>
                            <p style="width: 1000px; font-size: 16px;color: #666;"><i class="fa fa-envelope-o" style="margin-right: 5px;"></i>khangb1809244@student.ctu.edu.vn</p>

                            
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="single-widget">
                            <h2>CHÍNH SÁCH CHUNG</h2>
                            <ul class="nav nav-pills nav-stacked">
                              
                                
                                <li><a href="?action=baohanh">Chính sách bảo hành</a></li>
                                <li><a href="?action=doitra">Chính sách đổi - trả</a></li>
                            </ul>
                        </div>
                    </div>
                   
                   
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <div class="social-icons pull-right">
                            <h2 style="margin-bottom: 0px;">Kết nối với chúng tôi</h2>
                             <ul class="nav navbar-nav" style="float: right;">
                                
                                <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook" style="margin: 0px;" title ="Đến Facebook của B&B"></i></a></li>
                                <li><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram" style="margin: 0px;" title ="Đến Instagram của B&B"></i></a></li>
                                <li><a href="https://www.youtube.com/" target="_blank" ><i class="fa fa-youtube-play" style="margin: 0px;" title ="Đến Youtube của B&B"></i></a></li>
                 
                            </ul>
        
                        </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="footer-bottom"  style="background: #F0F0E9; padding-bottom: 0px; border-top: 1px solid #e8e8e8;">
            <div class="container">
                <div class="row">
                    <p class="pull-left" style="font-weight: 500; width: 1000px;  font-size: 16px; color: #666663;">© 2016 - Bản quyền của Công Ty Cổ Phần Trực Tuyến Vĩnh Khang</p><br>
                    <p class="pull-left" style="width: 1000px; font-size: 16px; padding-bottom: 10px; color: #666;">Giấy chứng nhận Đăng ký Kinh doanh số 0104938104 đăng ký lần đầu do Sở Kế hoạch & Đầu tư thành phố Hà Nội cấp ngày 07/10/2010<p>
                    <p class="pull-right" style="float: right; margin-top: -20px;"><a target="_blank" href="http://online.gov.vn/Home/WebDetails/21193"><img src="images/congty/congthuong.png" style="width: 100px; margin-right: 20px;"></a></p>
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->
    

  
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/main.js"></script>

  
</body>
</html>