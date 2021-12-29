<?php 
  $tongtien = 0;
?> 
  <div class="col-sm-12" style="margin-bottom: 10px;">
        <div class="features_items" style="background: #fff; border-radius: 5px; "><section id="cart_items">
    <div class="container" style="width: 1250px; float: left; background: #fff; border-radius: 5px; ">
      <div class="breadcrumbs">
        <ol class="breadcrumb" style="margin: 0px;">

          <li class="active" style="font-size: 16px; font-weight: 1000; color: #666;">Giỏ hàng của bạn</li>
      </div>
      <div class="table-responsive cart_info" style="border-radius: 5px; margin-bottom: 10px;">
        <table class="table table-condensed">
          <thead>
            <tr class="cart_menu" style="height: 5px; background: #3a8fce;">
              <td>STT</td>
              <td>Hình ảnh</td>
              <td class="description" style="width: 600px;">Tên sản phẩm</td>
              <td class="price">Giá</td>
              <td class="quantity">Số lượng</td>
              <td class="total" style="float: right; margin-right: 10px;">Tổng cộng</td>
              <td></td>
            </tr>
          </thead>
          <tbody>
          <?php
          if(isset($_SESSION['cart'])){
            $i = 0;
            $tongtien = 0;
            foreach($_SESSION['cart'] as $cart_item){
              $thanhtien = $cart_item['soluong']*$cart_item['gia'];
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
              <td>
                <a href="admin/xuly.php?xoa=<?php echo $cart_item['id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
              </td>
            </tr>
        <?php
          }
          if($tongtien == 0){
            echo 'Giỏ hàng hiện tại đang trống';
          }
        }
        ?>  
          </tbody>
         
        </table>
      
    </div>
     <div style ="float: left; color: red; margin-top: 10px;">

                                  <?php                                         
                                  if(isset($_SESSION['message'])){
                                      $message = $_SESSION['message'];
                                      echo $message;
                                      $_SESSION['message'] = null;
                                  }
                                  ?>
                                </div>          
      <div style="float: right; margin-right: 40px;">
      <p style = "">
         <h5><span>Tổng tiền: <b style=" border:0px; float: right; color: red; margin-left: 20px;"> <?php echo number_format($tongtien,0,',','.').' ₫' ?></b></span></h5>
      </p>
  </div>  

</div>
   <?php if($tongtien == 0) {?>

   <?php }elseif(isset($_SESSION['dangnhaptaikhoan'])) {?>               
  <a href="admin/xuly.php?action=thanhtoan"><button type="submit" class="btn btn-fefault cart add-to-cart"  style="width:250px; border-radius: 5px; margin-top: 7px; float: right; margin-right: 20px;">MUA NGAY</button></a>
    <?php }else{ $_SESSION['chuy_dangnhap'] = "Vui lòng đăng nhập để thanh toán!"; ?>
<a href="index.php?action=dangnhap"><button type="submit" class="btn btn-fefault cart add-to-cart" style="width:200px; border-radius: 5px; margin-top: 7px; float: right; margin-right: 20px;">MUA NGAY</button>
    <?php   }    ?>

</div>   

