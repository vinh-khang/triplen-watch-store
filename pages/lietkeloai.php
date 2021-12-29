  <?php
    $sql_lietke_th = "SELECT * FROM hanghoa JOIN loaihanghoa ON hanghoa.maloaihang = loaihanghoa.maloaihang JOIN hinhhanghoa ON
    hanghoa.mshh = hinhhanghoa.mshh where hanghoa.maloaihang = '".$_GET['idloai']."' LIMIT 1";
    $query_lietke_th = mysqli_query($mysqli, $sql_lietke_th);
    while($th = mysqli_fetch_array($query_lietke_th)){
?>

<div class="col-sm-12">
                    <div class="features_items" style="background: #fff; border-radius: 5px; padding-top: 10px;">
                    <h2 class="title text-center" style ="padding-bottom: 5px;  color: #666; text-align: left; border-bottom: 4px solid #00adee;"><i class="fa fa-bookmark" aria-hidden="true" style ="color: #00adee;margin-right: 10px;"></i>THƯƠNG HIỆU <?php echo $th['tenloaihang'] ?></a></h2>
                     <div id="recommended-item-carousel" class="carousel slide" data-interval="false" style ="">
                            <div class="carousel-inner" style ="interval: false;">
  <?php
    }
    $sql_lietke_sp = "SELECT * FROM hanghoa JOIN loaihanghoa ON hanghoa.maloaihang = loaihanghoa.maloaihang JOIN hinhhanghoa ON
    hanghoa.mshh = hinhhanghoa.mshh where hanghoa.maloaihang = '".$_GET['idloai']."' ORDER BY hanghoa.mshh DESC";
    $query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
    while($row = mysqli_fetch_array($query_lietke_sp)){
?>


                      
                              <div class="item active">
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
            </div>