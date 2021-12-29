
<div class="col-lg-12">
                    <section class="panel" style="width: 700px; margin-left: 250px;">
                        <header class="panel-heading" style ="color: #fff; font-size: 20px; width: 700px;">
                          <a href="index.php?action=quanlysp" style="color: #fff;float: left; margin-left: 10px;"><i class="fa fa-home" ></i></a>
                            <b>Thêm sản phẩm</b> 
                        </header>
                        <div class="panel-body">

                            <div class="position-center" style="width: 95%;">
                                <form role="form" action = "../admin/xuly.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label><br>
                                    <input type="text" name ="tensp" class="form-control" placeholder="Nhập tên sản phẩm" style="width: 630px; float: left;" required="" ><br><br>
                                     <div class="form-group">
                                    <label style ="">Hình ảnh</label>
                                    <input type="file" name ="tenhinh" class="form-control"  accept="image/png, image/jpeg" style="width: 630px;">
                                	</div>
                                    
                                    <label>Đơn vị</label><label style ="margin-left: 275px;">Số lượng</label><br>
                                    <input type="text" name ="quycach" class="form-control" placeholder="Nhập quy cách" style="width: 310px; float: left;" required=""  value="">
                                    <input type="number" name ="soluong" class="form-control" placeholder="Nhập số lượng" style="width: 310px; float: left; margin-left: 10px;" required=""  value=""><br><br>
                                     
                                    <label>Giá</label><label style ="margin-left: 295px;">Loại sản phẩm</label><br>
                                    <input type="number" name ="giasp" class="form-control" placeholder="Nhập giá sản phẩm" style="width: 310px; float: left;" required=""  value="">

                                    
                                    <div class="form-group">
                                    <?php
                                      $sql_lietke_loai = "SELECT * FROM loaihanghoa ORDER BY maloaihang ASC";
                                      $query_lietke_loai = mysqli_query($mysqli, $sql_lietke_loai);
                                    ?>
                                     <select name = "loaihang" class="form-control input-sm m-bot15" style="width: 310px; float: left; margin-left: 10px; height: 35px;">
                                       <?php
                                          $i = 0;
                                          while($row = mysqli_fetch_array($query_lietke_loai)){
                                            $i++;
                                            ?>
                                        <option value="<?php echo $row['maloaihang'] ?>"><?php echo $row['tenloaihang'] ?></option>
                                          <?php
                                          }
                                          ?>
                                    </select>
                                      <br><br>
                                    <label>Mô tả</label>
                                    <textarea name ="mota" class="form-control" placeholder="Nhập mô tả" style="width: 630px;" required="" rows="7"></textarea> 
                                </div>
                                <button type="submit" name ="themsp" class="btn btn-info" style="width: 200px; height: 35px;">Thêm</button>
                                </div>
                            </form>

                            </div>
                        </div>
                    </section>

            </div>