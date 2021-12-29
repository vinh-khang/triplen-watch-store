<?php 
  $tongtien = 0;
  $giamgia = 0;
  $sodon = $_GET['id'];
  $msnv = $_SESSION['dangnhap'];

  $sql_chitietdonhang = "SELECT * FROM dathang JOIN khachhang ON dathang.mskh = khachhang.mskh JOIN diachikh ON dathang.madc = diachikh.madc WHERE dathang.sodondh='".$sodon."' LIMIT 1";
  $query_chitietdonhang = mysqli_query($mysqli, $sql_chitietdonhang);

  
?>
<form action = "../admin/xuly.php" method="post">
  <input type="hidden" name = "msnv" value="<?php echo $msnv ?>">
  <input type="hidden" name = "sodon" value="<?php echo $sodon ?>">

<div class="col-sm-12" style="margin-bottom: 10px;"> 
<?php while($row = mysqli_fetch_array($query_chitietdonhang)) { ?>
<span><h5>Chi tiết đơn hàng #<?php echo $row['sodondh'] ?> - <b><?php echo $row['trangthaidh'] ?></b></h5></span>
</div>
<div class="col-sm-12">     
<div class="container" style="width: 100%;  background: #fff; border-radius: 5px; margin-bottom: 10px; float: left; padding-bottom: 20px;">
      <div class="breadcrumbs">
        <ol class="breadcrumb" style="margin: 0px; background: #fff;">

          <li style="font-size: 20px; font-weight: 700; color: #00adee;">1. Thông tin khách hàng</li>   
        </ol>
            </div>
                
                <table class="table table-condensed total-result" style="background: #fff; margin-bottom: 0px; color: #fff !important;">
                  <tr>
                    <td style="padding:5px !important; border:0px !important; width: 150px;">Họ tên: </td>
                    <td style="padding:5px !important; border:0px !important;"><b><?php echo $row['hotenkh'] ?></b></td>
                  </tr>
                  <tr>
                    <td style="padding:5px !important; border:0px !important; ">Tên công ty: </td>
                    <td style="padding:5px !important; border:0px !important; "><b><?php echo $row['tencongty'] ?></b></td>
                  </tr>
                  <tr>
                     <td style="padding:5px !important; border:0px !important; ">Số fax: </td>
                     <td style="padding:5px !important; border:0px !important; "><b><?php echo $row['sofax'] ?></b></td>
                   </tr>
                    <tr>
                     <td style="padding:5px !important; border:0px !important; ">Số điện thoại: </td>
                     <td style="padding:5px !important; border:0px !important; "><b><?php echo $row['sodienthoai'] ?></b></td>
                   </tr>
                    <tr>
                     <td style="padding:5px !important; border:0px !important; ">Địa chỉ: </td>
                     <td style="padding:5px !important; border:0px !important; "><b><?php echo $row['diachi'] ?></b></td>
                   </tr>
                </table>
                </div> </div> 


                
<?php } ?>
          

<?php 
  $sql_nhanvien = "SELECT * FROM dathang JOIN nhanvien ON dathang.msnv = nhanvien.msnv WHERE dathang.sodondh='".$sodon."' LIMIT 1";
  $query_nhanvien = mysqli_query($mysqli, $sql_nhanvien);
  while($row1 = mysqli_fetch_array($query_nhanvien)) { ?>
<div class="col-sm-12">     
<div class="container" style="width: 100%;  background: #fff; border-radius: 5px; margin-bottom: 10px; float: left; padding-bottom: 20px;">
      <div class="breadcrumbs">
        <ol class="breadcrumb" style="margin: 0px; background: #fff;">

          <li style="font-size: 20px; font-weight: 700; color: #00adee;">2. Thông tin giao hàng: </li>   
        </ol>
            </div>
                
                <table class="table table-condensed total-result" style="background: #fff; margin-bottom: 0px; color: #fff !important;">
                  <tr>
                    <td style="padding:5px !important; border:0px !important; width: 260px;"> Ngày đặt hàng: <b><?php echo $row1['ngaydh'] ?></b></td>
                    <td style="padding:5px !important; border:0px !important; width: 260px;"> Ngày giao hàng:  <b><?php echo $row1['ngaygh'] ?></b></td>
                     <td style="padding:5px !important; border:0px !important; "> Nhân viên:  <b><?php echo $row1['hotennv'] ?></b></td>
                  </tr>
      
                </table>
                </div></div>


                
<?php } ?>
          

 <div class="col-sm-12">   
 <div class="container" style="width: 100%;  background: #fff; border-radius: 5px; margin-bottom: 10px; float: left; padding-bottom: 10px;">
      <div class="breadcrumbs">
        <ol class="breadcrumb" style="margin: 0px; background: #fff;">

          <li style="font-size: 20px; font-weight: 700; color: #00adee;">3. Sản phẩm</li>   
        </ol>

      </div>
      <div class="table-responsive cart_info" style="border-radius: 5px;">
        <table class="table table-condensed" style = "">
            <tr class="cart_menu" style="height: 10px;">
              <td style="width: 400px;">Tên sản phẩm</td>
              <td style="width: 100px;">Hình ảnh</td>
              
              <td class="price">Giá</td>
              <td class="quantity">Số lượng</td>
              <td class="total"  ><span style="float: right; margin-right: 50px;">Tổng tiền</span></td>
            </tr>
          </thead>
          <tbody>
            <?php 
              $sql_chitiet = "SELECT * FROM chitietdathang JOIN hanghoa ON chitietdathang.mshh = hanghoa.mshh JOIN hinhhanghoa ON hanghoa.mshh = hinhhanghoa.mshh WHERE chitietdathang.sodondh='".$sodon."'";
              $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
              while($row2 = mysqli_fetch_array($query_chitiet)) { ?>
            <tr style="border-top: 1px solid #ececec;">
             <td><?php echo $row2['tenhh'] ?></td>
             <td><img src="sanpham/upload/<?php echo $row2['tenhinh'] ?>" style="width: 100px; height: 100px;"></td>
              <td><?php echo number_format($row2['gia'],0,',','.').' ₫' ?></td>
              <td><?php echo $row2['soluong'] ?></td>
              <td class="cart_total" >
                  <?php

                    $tongcong = $row2['gia'] * $row2['soluong'];
                    $tongtien = $tongtien + $tongcong;
                    $giamgia = $giamgia + $row2['giamgia'];
                  ?>
                  <span style="float: right; margin-right: 50px;"><?php echo number_format($tongcong,0,',','.').' ₫'  ?></span>
              </td>
            </tr>
            <?php } ?>
            
          </tbody>
            
        </table>
         <div style="float: right; margin-right: 70px;">

         <h5><span>Tổng tiền: <b style=" border:0px; float: right; "> <?php echo number_format($tongtien,0,',','.').' ₫' ?></b></span></h5>
         <br>

         <h5><span>Giảm giá: <b style=" border:0px; float: right; "> <?php echo number_format($giamgia,0,',','.').' ₫' ?></b></span></h5>

         <br>
         <h5><span>Giảm giá: <b style=" border:0px; float: right; color:red; "> <?php echo number_format($tongtien -$giamgia ,0,',','.').' ₫' ?></b></span></h5><br>
          <?php 
          $sql_xacnhan = "SELECT * FROM dathang WHERE sodondh = '".$sodon."' LIMIT 1";
          $query_xacnhan = mysqli_query($mysqli, $sql_xacnhan);
          while($row3 = mysqli_fetch_array($query_xacnhan)) { 
          if($row3['msnv'] == 0){ ?>
             <button type="submit" name ="nhanvienxacnhan" class="btn btn-info" style="width: 250px; height: 35px;">XÁC NHẬN</button><br><br>
           <?php }else{ ?>
  
          <?php  }} ?>

        </div>  
    </div>

</div></div></form>


