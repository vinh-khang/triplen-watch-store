<?php 
  $tongtien = 0;
  $giamgia = 0;
  $khachhang = $_SESSION['dangnhaptaikhoan'];
  $sql_khachhang = "SELECT * FROM khachhang WHERE sodienthoai='".$khachhang."' LIMIT 1";
  $query_khachhang = mysqli_query($mysqli, $sql_khachhang);
  
?>
<form action="admin/xuly.php" method="post">
  <div class="col-sm-12" style="margin-bottom: 10px;">

  <div class="features_items" style="background: #fff; border-radius: 5px; padding-bottom: 10px;">
    <div class="container" style="width: 1250px; float: left; background: #fff; border-radius: 5px; ">
      <div class="breadcrumbs">
        <ol class="breadcrumb" style="margin: 0px;">
          <li class="active" style="font-size: 16px; font-weight: 1000; color: #3a8fce;">1. Thông tin mua hàng: </li></ol>
      </div>
        <?php while($row = mysqli_fetch_array($query_khachhang)){ ?>
                <table class="table table-condensed total-result" style="background: #fff; margin-bottom: 0px;">
                  <tr>
                    <td style="width: 60px;  border:0px;">Họ tên</td>
                    <td style="width: 250px; border:0px;">
                    <span><b><?php echo $row['hotenkh']; ?></b></span>
                    <input type="hidden" name="mskh" value="<?php echo $row['mskh']; ?>">
                  </td>

                    <td style="width: 40px; border:0px;">SĐT</td>
                    <td style="width: 270px; border:0px;"><span><b><?php echo $row['sodienthoai']; ?></b></span></td>

                    <td style="width: 60px; border:0px;">Địa chỉ</td>
                    <td style=" border:0px;"><span>

                                    <?php
                                      $sql_lietke_dc = "SELECT * FROM diachikh JOIN khachhang ON diachikh.mskh = khachhang.mskh WHERE khachhang.sodienthoai = '".$khachhang."'";
                                      $query_lietke_dc = mysqli_query($mysqli, $sql_lietke_dc);
                                    ?>
                                     <select name = "diachi" class="form-control input-sm m-bot15" style="width: 510px; float: right; margin-left: 10px; ">
                                       <?php
                                        while($row1 = mysqli_fetch_array($query_lietke_dc)){
                                        ?>
                                        <option value="<?php echo $row1['madc']; ?>"><?php echo $row1['diachi']; ?></option>
                                        <?php
                                      }
                                          ?>
                                    </select>
                    </span>

                    </td>

                  </tr>

                </table>  
                
               <?php } ?>

      </div></div></div>



  <div class="col-sm-12" style="margin-bottom: 10px;">
  <div class="features_items" style="background: #fff; border-radius: 5px; "><section id="cart_items">
    <div class="container" style="width: 1250px; float: left; background: #fff; border-radius: 5px; ">
      <div class="breadcrumbs">
        <ol class="breadcrumb" style="margin: 0px;">

          <li class="active" style="font-size: 16px; font-weight: 1000; color: #3a8fce;">2.Sản phẩm </li></ol>
      </div>
      <div class="table-responsive cart_info" style="border-radius: 5px; margin-bottom: 10px;">
        <table class="table table-condensed">
          <thead>
            <tr class="cart_menu" style="height: 5px; background: #3a8fce;">
              <td>STT</td>
              <td>Hình ảnh</td>
              <td class="description">Tên sản phẩm</td>
              <td class="price">Giá</td>
              <td class="quantity">Số lượng</td>
              <td class="total" style="float: right; margin-right: 10px;">Tổng cộng</td>
            </tr>
          </thead>
          <tbody>
          <?php
          if(isset($_SESSION['cart'])){
            $i = 0;
            
            foreach($_SESSION['cart'] as $cart_item){
              $thanhtien = $cart_item['soluong']*$cart_item['gia'];
              if($thanhtien > 3000000){
                $giamgia = $giamgia +  ($cart_item['soluong']*$cart_item['gia'])*10/100;
              }
              $tongtien+=$thanhtien;

              $i++;
          ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td>
                <img src="admin/sanpham/upload/<?php echo $cart_item['tenhinh']; ?>" width="90px">
              </td>
              <td class="cart_name">
                <?php echo $cart_item['tenhh']; ?>
              </td>
              <td class="cart_price">
                <?php echo number_format($cart_item['gia'],0,',','.').' ₫'; ?>
              </td>
              <td class="cart_quantity">
                 <?php echo $cart_item['soluong']; ?>
              </td>
              <td class="cart_total">
                <p class="cart_total_price" >
                  <h5 style="float: right; margin-right: 10px;"><span><?php echo number_format($thanhtien,0,',','.').' ₫' ?></span></h5>
                </p>
              </td>
            </tr>
        <?php
          }
        }
        ?>  
          </tbody>
         
        </table>
      
    </div>
  </div>  

</div>
</div>

<div class="col-sm-6" style="margin-bottom: 10px; width: 680px; float: left; ">

  <div class="features_items" style="background: #fff; width: 100%; border-radius: 5px; padding: 0px 10px 10px 0px; height: 200px;">
    <div class="container" style="width: 100%; float: left; background: #fff; border-radius: 5px;">
      <div class="breadcrumbs">
        <ol class="breadcrumb" style="margin: 0px;">
          <li class="active" style="font-size: 16px; font-weight: 1000; color: #3a8fce;">3. Thông tin giao hàng: </li></ol>
      </div>
                <table class="table table-condensed total-result" style="background: #fff; margin: 0px;">
                  <tr>
                    <td style="width: 100px;  border:0px;">Ngày đặt hàng: </td>
                    <td style="width: 100px; border:0px;">
                    <span><b><?php echo date('d-m-Y'); ?></b></span>
                    <input type="hidden" name="ngaydh" value="<?php echo date('d-m-Y'); ?>">
                  </td>

                    <td style="width: 100px; border:0px;">Ngày giao hàng: </td>
                    <td style="width: 100px; border:0px;"><span><b><?php  $date = date('d-m-Y'); echo date('d-m-Y', strtotime($date. ' + 3 days')); ?></b></span></td>
                    <input type="hidden" name="ngaygh" value="<?php $date = date('d-m-Y'); echo date('d-m-Y', strtotime($date. ' + 3 days')); ?>">
                    </span>

                    </td>

                  </tr>

                </table>  
                <h5>Hiện tại, Triplen chỉ hỗ trợ phương thức thanh toán bằng tiền mặt khi nhận hàng bằng tiền mặt</h5>

      </div></div>
      </div>


<div class="col-sm-6" style="margin-bottom: 10px; float: right; width: 600px; padding-left: 0px;">

  <div class="features_items" style="background: #fff; border-radius: 5px; padding: 0px 10px 10px 0px;">
    <div class="container" style="float: left; width: 100%; background: #fff; border-radius: 5px; margin: 0px;">
      <div class="breadcrumbs">
        <ol class="breadcrumb" style="margin: 0px;">
          <li class="active" style="font-size: 16px; font-weight: 1000; color: #3a8fce;">4. Thanh toán: </li></ol>
      </div>
                <table class="table table-condensed total-result" style="background: #fff; margin: 0px;">
                  
                  <tr>
                    <td style="width: 100px;  border:0px;">Tổng tiền: </td>
                    <td style="width: 200px; border:0px; float: right;">
                    <span style="float: right ;"><b><?php echo  number_format($tongtien,0,',','.').' ₫'; ?></b></span>
                     <input type="hidden" name="giadathang" value="<?php echo $tongtien; ?>">
                  </td>
                  </tr>
                   <tr>
                    <td style="width: 100px;  border:0px;">Giảm giá: </td>
                    <td style="width: 200px; border:0px; float: right;">
                    <span style="float: right ;"><b><?php
                     echo  number_format($giamgia,0,',','.').' ₫'; 
                     ?></b></span>
                     <input type="hidden" name="giamgia" value="<?php echo $giamgia; ?>">
                  </td>
                  </tr>
                   <tr>
                    <td style="width: 100px;  border:0px;">Thành tiền: </td>
                    <td style="width: 200px; border:0px; float: right;">
                    <span style="float: right ; color: red;"><b><?php  $tien = $tongtien - $giamgia; echo number_format($tien,0,',','.').' ₫'; ?></b></span>
                  </td>
                  </tr>
                </table>
                    <button type="submit" class="btn btn-fefault cart add-to-cart" name="xacnhanthanhtoan" style="float: right ;width: 250px; border-radius: 5px; margin-top: 7px;" 
                  >THANH TOÁN</button> 

      </div></div><h5 style="color: red; font-weight: 400; float: right;">(Với những sản phẩm có tổng giá trị trên 3.000.000 VNĐ sẽ được giảm giá 10%)</h5></div>

</form>