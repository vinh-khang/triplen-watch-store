            <div class="col-sm-12">
                    <img src="images/banner/banner1.jpg" style="width: 1245px; margin-bottom: 10px;"><br>
                    <a href="index.php?action=lietkeloai&idloai=21" style="margin-right: 5px;"><img src="images/banner/casio.jpg" style="width: 200px;"></a>
                    <a href="index.php?action=lietkeloai&idloai=27" style="margin-right: 5px;"><img src="images/banner/orient.jpg" style="width: 200px;"></a>
                    <a href="index.php?action=lietkeloai&idloai=28" style="margin-right: 5px;"><img src="images/banner/seiko.jpg" style="width: 200px;"></a>
                    <a href="index.php?action=lietkeloai&idloai=22" style="margin-right: 5px;"><img src="images/banner/citizen.jpg" style="width: 200px;"></a>
                    <a href="index.php?action=lietkeloai&idloai=30" style="margin-right: 5px;"><img src="images/banner/tissot.jpg" style="width: 200px;"></a>
                    <a href="index.php?action=lietkeloai&idloai=23" style="margin-right: 5px;"><img src="images/banner/dw.jpg" style="width: 200px;"></a>

                    <div class="features_items" style="border-radius: 5px; padding-top: 10px; margin-bottom: 10px; margin-top: 10px;">
                    <h2 class="title text-center" style ="padding-bottom: 5px;  color: #666; text-align: left; border-bottom: 4px solid #00adee;"><i class="fa fa-bookmark" aria-hidden="true" style ="color: #00adee;margin-right: 10px;"></i>SẢN PHẨM MỚI</a></h2>

                       <div id="recommended-item-carousel" class="carousel slide" data-interval="false" style ="">
                            <div class="carousel-inner" style ="interval: false;">
                              <div class="item active">

                                <?php
                                    $sql_lietke_sp = "SELECT * FROM hanghoa JOIN loaihanghoa ON hanghoa.maloaihang = loaihanghoa.maloaihang JOIN hinhhanghoa ON
                                    hanghoa.mshh = hinhhanghoa.mshh ORDER BY hanghoa.mshh DESC LIMIT 10";
                                    $query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
                                    ?>

                                   <?php
                                        while($row = mysqli_fetch_array($query_lietke_sp)){
                                   ?>

                                <a href ="index.php?action=chitietsanpham&idsp=<?php echo $row['mshh'] ?>">
                                <div class="col-sm-4" style="width: 20%; height: 310px;">
                                    <div class="product-image-wrapper" style ="background: #fff;">
                                        <div class="single-products" style ="height: 290px;">
                                                <div class="productinfo text-center">
                                                    <img src="admin/sanpham/upload/<?php echo $row['tenhinh'] ?>" alt="" style="width: 180px; height: 180px;">
                                                    <p style =""><?php echo $row['tenhh'] ?></p>
                                                    <h2 style ="color: #428bca; margin-top: 10px; margin-left: 10px; margin-right: 10px; font-weight: 1000; font-size: 18px; text-align: left;"><?php echo number_format($row['gia']).' '.'₫' ?></h2>
                                                    
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

             <div class="features_items" style="border-radius: 5px; padding-top: 10px; margin-bottom: 10px; margin-top: 10px;">
                    <h2 class="title text-center" style ="padding-bottom: 5px;  color: #666; text-align: left; border-bottom: 4px solid #00adee;"><i class="fa fa-star" aria-hidden="true" style ="color: #00adee;margin-right: 10px;"></i>SẢN PHẨM GỢI Ý</a></h2>

                       <div id="recommended-item-carousel" class="carousel slide" data-interval="false" style ="">
                            <div class="carousel-inner" style ="interval: false;">
                              <div class="item active">

                                <?php
                                    $sql_lietke_sp = "SELECT * FROM hanghoa JOIN loaihanghoa ON hanghoa.maloaihang = loaihanghoa.maloaihang JOIN hinhhanghoa ON hanghoa.mshh = hinhhanghoa.mshh ORDER BY RAND() LIMIT 5 ";
                                    $query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
                                    ?>

                                   <?php
                                        while($row = mysqli_fetch_array($query_lietke_sp)){
                                   ?>

                                <a href ="index.php?action=chitietsanpham&idsp=<?php echo $row['mshh'] ?>">
                                <div class="col-sm-4" style="width: 20%; height: 310px;">
                                    <div class="product-image-wrapper" style ="background: #fff;">
                                        <div class="single-products" style ="height: 290px;">
                                                <div class="productinfo text-center">
                                                    <img src="admin/sanpham/upload/<?php echo $row['tenhinh'] ?>" alt="" style="width: 180px; height: 180px;">
                                                    <p style =""><?php echo $row['tenhh'] ?></p>
                                                    <h2 style ="color: #428bca; margin-top: 10px; margin-left: 10px; margin-right: 10px; font-weight: 1000; font-size: 18px; text-align: left;"><?php echo number_format($row['gia']).' '.'₫' ?></h2>
                                                    
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


            <div class="col-sm-12" style="padding: 0px;">
            <div class="category-tab shop-details-tab" style="background: #fff; border-radius: 5px;  margin: 10px 0px 10px 0px; height: 420px; padding-top: 10px;"><!--category-tab-->
                        <div class="col-sm-12">
                             <h2 class="title text-center" style ="color: #666; text-align: left;  margin-bottom: 7px;"><i class="fa fa-tasks" aria-hidden="true" style ="color: #00adee;margin-right: 10px;"></i>THƯƠNG HIỆU NỔI BẬT</a></h2>
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#vanhoc" data-toggle="tab">CASIO</a></li>
                                <li><a href="#kinhte" data-toggle="tab">CITIZEN</a></li>
                                <li><a href="#tamly" data-toggle="tab">ORIENT</a></li>
                                <li><a href="#khoahoc" data-toggle="tab">SEIKO</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="vanhoc" >
                                  <?php
                                    $sql_lietke_sp = "SELECT * FROM hanghoa JOIN loaihanghoa ON hanghoa.maloaihang = loaihanghoa.maloaihang JOIN hinhhanghoa ON
                                    hanghoa.mshh = hinhhanghoa.mshh WHERE hanghoa.maloaihang = 21 LIMIT 5 ";
                                    $query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
                                    ?>

                                   <?php
                                        while($row = mysqli_fetch_array($query_lietke_sp)){
                                   ?>

                                          <a href ="index.php?action=chitietsanpham&idsp=<?php echo $row['mshh'] ?>">
                                          <div class="col-sm-4" style="width: 20%; height: 310px;">
                                              <div class="product-image-wrapper" style ="background: #fff;">
                                                  <div class="single-products" style ="height: 290px;">
                                                          <div class="productinfo text-center">
                                                              <img src="admin/sanpham/upload/<?php echo $row['tenhinh'] ?>" alt="" style="width: 180px; height: 180px;">
                                                              <p style =""><?php echo $row['tenhh'] ?></p>
                                                              <h2 style ="color: #428bca; margin-top: 10px; margin-left: 10px; margin-right: 10px; font-weight: 1000; font-size: 18px; text-align: left;"><?php echo number_format($row['gia']).' '.'₫' ?></h2>
                                                              
                                                  </div>
                                          </div>
                                      </div>
                                  </div></a>
                                   <?php
                                         }
                                    ?>  
                                    <div class="col-sm-12">
                                    <span><a href="index.php?action=lietkeloai&idloai=21" style="float: right; text-transform: none; font-size: 16px; font-weight: 500; margin-top: -5px; margin-right: 20px;">Xem thêm...</a></span></div>
                                    
                            </div>
                            <div class="tab-pane fade" id="kinhte" >
                                    <?php
                                    $sql_lietke_sp = "SELECT * FROM hanghoa JOIN loaihanghoa ON hanghoa.maloaihang = loaihanghoa.maloaihang JOIN hinhhanghoa ON
                                    hanghoa.mshh = hinhhanghoa.mshh WHERE hanghoa.maloaihang = 22 LIMIT 5 ";
                                    $query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
                                    ?>

                                   <?php
                                        while($row = mysqli_fetch_array($query_lietke_sp)){
                                   ?>

                                          <a href ="index.php?action=chitietsanpham&idsp=<?php echo $row['mshh'] ?>">
                                          <div class="col-sm-4" style="width: 20%; height: 310px;">
                                              <div class="product-image-wrapper" style ="background: #fff;">
                                                  <div class="single-products" style ="height: 290px;">
                                                          <div class="productinfo text-center">
                                                              <img src="admin/sanpham/upload/<?php echo $row['tenhinh'] ?>" alt="" style="width: 180px; height: 180px;">
                                                              <p style =""><?php echo $row['tenhh'] ?></p>
                                                              <h2 style ="color: #428bca; margin-top: 10px; margin-left: 10px; margin-right: 10px; font-weight: 1000; font-size: 18px; text-align: left;"><?php echo number_format($row['gia']).' '.'₫' ?></h2>
                                                              
                                                  </div>
                                          </div>
                                      </div>
                                  </div></a>
                                   <?php
                                         }
                                    ?>  
                                        <div class="col-sm-12">
                                             <span><a href="index.php?action=lietkeloai&idloai=22" style="float: right; text-transform: none; font-size: 16px; font-weight: 500; margin-top: -5px; margin-right: 20px;">Xem thêm...</a></span></div>
                                    
                            </div>
                            <div class="tab-pane fade" id="tamly" >
                                    <?php
                                    $sql_lietke_sp = "SELECT * FROM hanghoa JOIN loaihanghoa ON hanghoa.maloaihang = loaihanghoa.maloaihang JOIN hinhhanghoa ON
                                    hanghoa.mshh = hinhhanghoa.mshh WHERE hanghoa.maloaihang = 27 LIMIT 5 ";
                                    $query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
                                    ?>

                                   <?php
                                        while($row = mysqli_fetch_array($query_lietke_sp)){
                                   ?>

                                          <a href ="index.php?action=chitietsanpham&idsp=<?php echo $row['mshh'] ?>">
                                          <div class="col-sm-4" style="width: 20%; height: 310px;">
                                              <div class="product-image-wrapper" style ="background: #fff;">
                                                  <div class="single-products" style ="height: 290px;">
                                                          <div class="productinfo text-center">
                                                              <img src="admin/sanpham/upload/<?php echo $row['tenhinh'] ?>" alt="" style="width: 180px; height: 180px;">
                                                              <p style =""><?php echo $row['tenhh'] ?></p>
                                                              <h2 style ="color: #428bca; margin-top: 10px; margin-left: 10px; margin-right: 10px; font-weight: 1000; font-size: 18px; text-align: left;"><?php echo number_format($row['gia']).' '.'₫' ?></h2>
                                                              
                                                  </div>
                                          </div>
                                      </div>
                                  </div></a>
                                   <?php
                                         }
                                    ?>  
                                        <div class="col-sm-12">
                                    <span><a href="index.php?action=lietkeloai&idloai=27" style="float: right; text-transform: none; font-size: 16px; font-weight: 500; margin-top: -5px; margin-right: 20px;">Xem thêm...</a></span></div>
                                    
                            </div> 
                            <div class="tab-pane fade" id="khoahoc" >
                                      <?php
                                    $sql_lietke_sp = "SELECT * FROM hanghoa JOIN loaihanghoa ON hanghoa.maloaihang = loaihanghoa.maloaihang JOIN hinhhanghoa ON
                                    hanghoa.mshh = hinhhanghoa.mshh WHERE hanghoa.maloaihang = 28 LIMIT 5 ";
                                    $query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
                                    ?>

                                   <?php
                                        while($row = mysqli_fetch_array($query_lietke_sp)){
                                   ?>

                                          <a href ="index.php?action=chitietsanpham&idsp=<?php echo $row['mshh'] ?>">
                                          <div class="col-sm-4" style="width: 20%; height: 310px;">
                                              <div class="product-image-wrapper" style ="background: #fff;">
                                                  <div class="single-products" style ="height: 290px;">
                                                          <div class="productinfo text-center">
                                                              <img src="admin/sanpham/upload/<?php echo $row['tenhinh'] ?>" alt="" style="width: 180px; height: 180px;">
                                                              <p style =""><?php echo $row['tenhh'] ?></p>
                                                              <h2 style ="color: #428bca; margin-top: 10px; margin-left: 10px; margin-right: 10px; font-weight: 1000; font-size: 18px; text-align: left;"><?php echo number_format($row['gia']).' '.'₫' ?></h2>
                                                              
                                                  </div>
                                          </div>
                                      </div>
                                  </div></a>
                                   <?php
                                         }
                                    ?>  
                                        <div class="col-sm-12">
                                         <span><a href="index.php?action=lietkeloai&idloai=28" style="float: right; text-transform: none; font-size: 16px; font-weight: 500; margin-top: -5px; margin-right: 20px;">Xem thêm...</a></span></div>
                                    
                            </div>        
                            </div>
</div></div>
<div>
   <img src="images/banner/gioithieu.jpg" style="width: 1250px; z-index: 0;  position: relative; margin-bottom: 20px;"></div>
  <h3 style="z-index: 0; position: absolute; margin-top: -200px; text-align: center; width: 1300px; border-radius: 20px;"><b>CỬA HÀNG ĐỒNG HỒ TRIPLEN</b></h3>
  <h5 style="z-index: 0; position: absolute; margin-top: -160px; text-align: center; width: 1300px; border-radius: 20px;">Triplen hiện tại có hơn 50 cửa hàng, đại lý phủ khắp toàn quốc.</h5>
  <h5 style="z-index: 0; position: absolute; margin-top: -140px; text-align: center; width: 1300px; border-radius: 20px;">Triplen có mặt trong các chuỗi phân phối lớn như: AEON, Big C, Gigamall, TGDĐ,…</h5>
  <a  href="?action=gioithieu" class="btn btn-fefault cart add-to-cart" style="z-index: 0; position: absolute; margin-top: -80px; margin-left: 550px; width: 200px; border-radius: 20px;">XEM NGAY</a>
  
</div>

</div></div>
              

            </div>