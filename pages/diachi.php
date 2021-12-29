<?php 
  $sodienthoai = $_SESSION['dangnhaptaikhoan'];
  $sql_diachi = "SELECT * FROM diachikh JOIN khachhang ON diachikh.mskh = khachhang.mskh WHERE khachhang.sodienthoai = '".$sodienthoai."'";
  $query_diachi= mysqli_query($mysqli, $sql_diachi);
  
?>

<div class="features_items" style="background: #fff; border-radius: 5px; margin-bottom: 10px; width: 600px; margin-left: 350px;"> 
<section id="form" style="margin-bottom: 20px; margin-top: 10px; margin-left: 10px;"><!--form-->
        <div class="container">
            <div class="row">   
                <div class="col-sm-8" style="">
                    <div class="signup-form"><!--sign up form-->
                        <h2 style="margin: 0px; color: #3a8fce; font-size: 20px; margin-left: 180px;"><b>Địa chỉ giao hàng</b></h2>

                        <form action="admin/xuly.php" method="POST">
                            <label style="margin-top: 10px; color: #696763;">Thêm địa chỉ mới</label>
                            <input type="text" name="diachi" placeholder="Nhập địa chỉ" required=""  style=" width: 550px; border-radius: 5px;"/>
                            <input type="hidden" name="sodienthoai"  value="<?php echo $sodienthoai; ?>" />
                            <button type="submit" name = "themdiachi" style="margin-top: 10px;">Thêm</button>
                        </form>

                            <label style="margin-top: 20px; color: #696763;">Danh sách địa chỉ hiện tại</label><br>
                        <?php
                        $i = 0; 
                        while($row = mysqli_fetch_array($query_diachi)) { $i++; ?>

                            <label style="margin-top: 10px; color: #696763;">Địa chỉ <?php echo $i; ?> </label>
                            
                            <span  style=""><?php echo $row['diachi']; ?></span><a onclick=" return confirm('Bạn có muốn xóa địa chỉ không?')" href="admin/xuly.php?action=xoadc&madc=<?php echo $row['madc']; ?>" class="active" style="margin-left: 10px;"><i class="fa fa-times text-danger text"></i></a><br>
                         <?php
                           }
                         ?>
                         <div style ="float: left; font-weight: 1000; color: #33dd30; margin-top: 10px;">

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
    </div>
</section></div>
    