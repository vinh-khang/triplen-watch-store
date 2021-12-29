<div class="col-sm-12">
                    <div class="features_items" style="border-radius: 5px; padding-top: 10px; margin-bottom: 10px; margin-top: 10px;">
                    <h2 class="title text-center" style ="padding-bottom: 5px;  color: #666; text-align: left; border-bottom: 4px solid #00adee;"><i class="fa fa-search" aria-hidden="true" style ="color: #00adee;margin-right: 10px;"></i>TÌM KIẾM TỪ KHÓA '<?php  echo $_SESSION['tukhoa'] ?>'</a></h2>

                       <div id="recommended-item-carousel" class="carousel slide" data-interval="false" style ="">
                            <div class="carousel-inner" style ="interval: false;">
                              <div class="item active">
                                   <?php
                                        if(isset($_SESSION['tukhoa'])){
                                        $tukhoa = $_SESSION['tukhoa'];
                                        
                                        $sql_timkiem = "SELECT * FROM hanghoa JOIN loaihanghoa ON hanghoa.maloaihang = loaihanghoa.maloaihang JOIN hinhhanghoa ON hanghoa.mshh = hinhhanghoa.mshh WHERE hanghoa.tenhh LIKE '%".$tukhoa."%' ORDER BY hanghoa.mshh DESC ";
                                        $query_timkiem = mysqli_query($mysqli,$sql_timkiem);
                                        while($row = mysqli_fetch_array($query_timkiem)){
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
                               $_SESSION['tukhoatrangchu'] = $tukhoa;
                             }
                          ?>  
                    </div>               
                        

                    </div>
                 </div>
            </div>
          </div>