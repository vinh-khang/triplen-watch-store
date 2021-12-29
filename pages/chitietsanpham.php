  <?php
    $idsp = $_GET['idsp'];
    $sql_chitiet = "SELECT * FROM hanghoa JOIN loaihanghoa ON hanghoa.maloaihang = loaihanghoa.maloaihang JOIN hinhhanghoa ON
    hanghoa.mshh = hinhhanghoa.mshh WHERE hanghoa.mshh = '".$idsp."'";
    $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
    while($row = mysqli_fetch_array($query_chitiet)){
  ?>

<div class="col-sm-12">
    <div class="features_items" style="border-radius: 5px; padding-top: 10px; margin-bottom: 10px;">
    		<div class="product-details" style="background: #fff; padding: 15px; margin: 0px 0px 10px 0px; border-radius: 5px; "><!--product-details-->
						<div class="col-sm-5" >
							<div class="view-product">
								<img src="admin/sanpham/upload/<?php echo $row['tenhinh'] ?>" alt="" style ="margin-left: 20px;  width: 400px; height: 400px;  box-shadow: 0px 0px 2px #cbcbcb;">
							<!-- 	<h3>ZOOM</h3> -->
							</div>
	
						</div>
						<div class="col-sm-7" >
							<div class="book-information" style="padding-bottom: 20px;"><!--/product-information-->								
								<h4 style="text-transform: uppercase; color: #666; margin-top: 10px; line-height: 1.3;"><b><?php echo $row['tenhh'] ?></b></h4>

								<span class="price-k" style="font-size: 35px;"><?php echo number_format($row['gia']).' '.'₫' ?></span>
								<form action="admin/xuly.php?idsanpham=<?php echo $row['mshh'] ?>" method="POST">	
									<div>
                                    <label>Số lượng:</label>
                                    <input type="number" name="soluong" min = "1" value="1" style="width: 100px;"/>					
									<button type="submit" class="btn btn-fefault cart add-to-cart" name="themgiohang">
										<i class="fa fa-shopping-cart"></i>
										Thêm vào giỏ
									</button>
								</div>
								</form>
								<br>
								<p style="">Số lượng sản phẩm còn trong kho: <?php echo $row['soluonghang'] ?></p>
								<div style ="float: left; color: red;">
									 <?php                                         
						              if(isset($_SESSION['message'])){
						                  $message = $_SESSION['message'];
						                  echo $message;
						                  $_SESSION['message'] = null;
						              }
						              ?>
                                </div>
								<br>
								<p><b>Thương hiệu: </b><a href ="index.php?action=lietkeloai&idloai=<?php echo $row['maloaihang'] ?>"><?php echo $row['tenloaihang'] ?></a></p>
								<br>
								<p><b>Mô tả: </b><?php echo $row['mota'] ?></p>
								<br>
							</div><!--/product-information-->
						</div>
					</div></div>

					<div class="recommended_items" style=" border-radius: 5px; padding-top: 2px; margin-bottom: 10px; margin-top: 10px;">
						<h2 class="title text-center" style="color: #666; padding: 5px;">SẢN PHẨM CÙNG THƯƠNG HIỆU</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel" style="background: #fff; padding: 10px; ">
							<div class="carousel-inner">
								<div class="item active">
								  <?php
								    $sql_goiy = "SELECT * FROM hanghoa JOIN loaihanghoa ON hanghoa.maloaihang = loaihanghoa.maloaihang JOIN hinhhanghoa ON hanghoa.mshh = hinhhanghoa.mshh WHERE hanghoa.mshh != '".$idsp."' AND hanghoa.maloaihang = '".$row['maloaihang']."' LIMIT 5";
								    $query_goiy = mysqli_query($mysqli, $sql_goiy);
								    while($row = mysqli_fetch_array($query_goiy)){
								  ?>
                                <a href ="index.php?action=chitietsanpham&idsp=<?php echo $row['mshh'] ?>">	
								 <div class="col-sm-4" style="width: 20%; height: 300px;">
                                    <div class="product-image-wrapper" style="margin-bottom: 0px;">
                                        <div class="single-products" style ="height: 290px;">
                                                <div class="productinfo text-center">
                                                    <img src="admin/sanpham/upload/<?php echo $row['tenhinh'] ?>" alt="" style="width: 180px; height: 180px;">
                                                     <p><?php echo $row['tenhh'] ?></p>
                                                    <h2  style ="margin-top: 10px; margin-left: 10px; margin-right: 10px; font-weight: 1000; font-size: 18px; text-align: left; color: #428bca;"><?php echo number_format($row['gia']).' '.'₫' ?></h2>
                                                   
                                          
                                                </div>

                                        </div>
                                    
                                    </div>
                                </div></a>
									<?php
									    }
									?>

									
								</div>
							</div>		
						</div>
					</div>
          
    </div>
</div>
<?php
    }
?>



					
