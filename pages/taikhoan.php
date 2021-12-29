<?php 
  $khachhang = $_SESSION['dangnhaptaikhoan'];
  $sql_khachhang = "SELECT * FROM khachhang WHERE sodienthoai='".$khachhang."' LIMIT 1";
  $query_khachhang = mysqli_query($mysqli, $sql_khachhang);
  
?>

<div class="features_items" style="background: #fff; border-radius: 5px; margin-bottom: 10px; width: 600px; margin-left: 350px;"> 
<section id="form" style="margin-bottom: 20px; margin-top: 10px; margin-left: 10px;"><!--form-->
        <div class="container">
            <div class="row">   
                <div class="col-sm-8" style="">
                    <div class="signup-form"><!--sign up form-->
                        <h2 style="margin: 0px; color: #3a8fce; font-size: 20px; margin-left: 180px;"><b> Thông tin tài khoản</b></h2>
                        <?php while($row = mysqli_fetch_array($query_khachhang)) { ?>
                        <form action="admin/xuly.php" method="POST">

                            <label style="margin-top: 10px; color: #696763;">Họ tên</label>
                            <input type="text" name="hotenkh" placeholder="Nhập họ tên" required="" value="<?php echo $row['hotenkh']; ?>" style=" width: 550px; border-radius: 5px;"/>
                            <label style="color: #696763;">Tên công ty</label>
                            <input type="text" name="tencongty" placeholder="Nhập tên công ty"  value="<?php echo $row['tencongty']; ?>" style=" width: 550px;"/>
                            <label style="color: #696763;">Số fax</label>
                            <input type="text" name="sofax" placeholder="Nhập số fax" value="<?php echo $row['sofax']; ?>" style=" width: 550px;"/>
                            <label style="color: #696763;">Số điện thoại</label>
                            <span  style="margin-left: 20px;"><?php echo $row['sodienthoai']; ?></span>
                            <input type="hidden" name="sodienthoai" value="<?php echo $row['sodienthoai']; ?>" >
                            <button type="submit" name = "capnhattaikhoan" style="margin-top: 20px;">Cập nhật</button>
                        </form>
                         <?php
                           }
                         ?>
                    </div>
                     <div style ="float: left; font-weight: 1000; color: #33dd30; margin-top: 20px;">
                                    <?php                                         
                                  if(isset($_SESSION['message'])){
                                      $message = $_SESSION['message'];
                                      echo $message;
                                      $_SESSION['message'] = null;
                                  }
                                  ?>
                                </div>
            </div>
        </div>
    </div>
</section></div>
    