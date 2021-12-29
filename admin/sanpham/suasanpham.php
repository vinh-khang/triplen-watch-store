  <?php
    $idsp = $_GET['idsp'];
    $sql_lietke_sp = "SELECT * FROM hanghoa JOIN loaihanghoa ON hanghoa.maloaihang = loaihanghoa.maloaihang JOIN hinhhanghoa ON
    hanghoa.mshh = hinhhanghoa.mshh WHERE hanghoa.mshh = '".$idsp."'";
    $query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);

  ?>

<div class="col-lg-12">
                    <section class="panel" style="width: 700px; margin-left: 250px;">
                        <header class="panel-heading" style ="color: #fff; font-size: 20px; width: 700px;">
                          <a href="index.php?action=quanlysp" style="color: #fff;float: left; margin-left: 10px;"><i class="fa fa-home" ></i></a>
                            <b>Cập nhật sản phẩm</b> 
                        </header>
                        <div class="panel-body">
                             <?php
                                while($row = mysqli_fetch_array($query_lietke_sp)){
                               ?>
                            <div class="position-center" style="width: 95%;">
                                <form role="form" action = "../admin/xuly.php?action=capnhatsp" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label><br>
                                    <input type="text" name ="tensp" class="form-control" placeholder="Nhập tên sản phẩm" style="width: 630px; float: left;" required="" value="<?php echo $row['tenhh'] ?>"><br><br>
                                     <div class="form-group">
                                    <label style ="">Hình ảnh</label>
                                    <input type="file" name ="tenhinh" class="form-control"  accept="image/png, image/jpeg" style="width: 630px;"   value="<?php echo $row['tenhh'] ?>">
                                    <img src="sanpham/upload/<?php echo $row['tenhinh'] ?>" style="width: 100px; height: 100px;">
                                	</div>
                                    
                                    <label>Đơn vị</label><label style ="margin-left: 275px;">Số lượng</label><br>
                                    <input type="text" name ="quycach" class="form-control" placeholder="Nhập quy cách" style="width: 310px; float: left;" required=""  value="<?php echo $row['quycach'] ?>">
                                    <input type="number" name ="soluong" class="form-control" placeholder="Nhập số lượng" style="width: 310px; float: left; margin-left: 10px;" required=""  value="<?php echo $row['soluonghang'] ?>"><br><br>
                                     
                                    <label>Giá</label><label style ="margin-left: 295px;">Loại sản phẩm</label><br>
                                    <input type="number" name ="giasp" class="form-control" placeholder="Nhập giá sản phẩm" style="width: 310px; float: left;" required=""  value="<?php echo $row['gia'] ?>">
                                    <input type="hidden" name ="idsp" required=""  value="<?php echo $row['mshh'] ?>">
                                    <input type="hidden" name ="action" required=""  value="<?php echo $row['mshh'] ?>">
                                    
                                    
                                    <div class="form-group">
                                    <?php
    		                              $sql_lietke_loai = "SELECT * FROM loaihanghoa ORDER BY maloaihang ASC";
    		                              $query_lietke_loai = mysqli_query($mysqli, $sql_lietke_loai);
                                      $sql_lietke_sp = "SELECT * FROM hanghoa JOIN loaihanghoa ON hanghoa.maloaihang = loaihanghoa.maloaihang JOIN hinhhanghoa ON hanghoa.mshh = hinhhanghoa.mshh WHERE hanghoa.mshh = '".$idsp."'";
                                      $query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
                                      $row = mysqli_fetch_array($query_lietke_sp);
    		                            ?>
                                     <select name = "loaihang" class="form-control input-sm m-bot15"  value="<?php echo $row['maloaihang'] ?>" style="width: 310px; float: left; margin-left: 10px; height: 35px;">
                                       <?php

                                        while($row1 = mysqli_fetch_array($query_lietke_loai)){    
                                        if($row1['maloaihang'] == $row['maloaihang']){
                                        ?>
                                        <option selected value="<?php echo $row1['maloaihang'] ?>"><?php echo $row1['tenloaihang'] ?></option>
                                        <?php
                                          }else{
                                          ?>
                                        <option value="<?php echo $row1['maloaihang'] ?>"><?php echo $row1['tenloaihang'] ?></option>
                                          <?php
                                          }
                                        }
                                          ?>
                                    </select>
                                      <label>Mô tả</label>
                                    <textarea name ="mota" class="form-control" placeholder="Nhập mô tả" style="width: 630px;" required="" rows="7"><?php echo $row['mota'] ?></textarea>
                                </div><br><br>
                                <button type="submit" name ="capnhatsp" class="btn btn-info" style="width: 200px; height: 35px;">Cập nhật</button>
                                </div>
                            </form>

                            </div>
                             <?php
                                          }
                                          ?>
                        </div>
                    </section>

            </div>