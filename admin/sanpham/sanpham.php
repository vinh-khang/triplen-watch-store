  <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading" style ="color: #fff; font-size: 20px;">
                            <b>Quản lý sản phẩm</b> 
                        </header>
                        <div class="panel-body">
                       
                            <div class="position-center" style="width: 95%; float: left; margin-left: 20px;">
                                <a href="?action=themsp" class="active" style="margin-right: 20px; background: #fff; padding: 10px 50px 10px 50px; color: #197496; width: 400px; border-radius: 3px; border: 1px dashed #b4b4b4; font-weight: 500;">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Thêm sản phẩm mới</a>
                                    <div style ="float: right; font-weight: 1000; color: #33dd30;">
                                        <?php
                                           
                                            if(isset($_SESSION["message"])){
                                                $message = $_SESSION["message"];
                                                echo $message;
                                                $_SESSION["message"] = null;}
                                        ?>
                                    </div>

                            <?php
                              $sql_lietke_sp = "SELECT * FROM hanghoa JOIN loaihanghoa ON hanghoa.maloaihang = loaihanghoa.maloaihang JOIN hinhhanghoa ON hanghoa.mshh = hinhhanghoa.mshh ORDER BY hanghoa.mshh DESC";
							                 $query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
                            ?>
                              <div class="panel panel-default">
                                    <div class="row w3-res-tb">
         
                                      <br><h4><b><i class="fa fa-list" aria-hidden="true"></i> Liệt kê loại hàng hóa</b></h4>           
       
                                      <div class="col-sm-1">
                                      </div>
                                      <div class="col-sm-6">
                                            <div style ="float: right; font-weight: 1000; color: #33dd30;">
      
                                            </div>
                                      </div>
                                    </div>
                                    <div class="table-responsive">
                                      <table class="table table-striped b-t b-light">
                                        <thead>
                                          <tr>
                                            <th style="width: 400px;">Tên sản phẩm</th>
                                            <th>Hình ảnh</th>
                                           
                                            <th>Đơn vị</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th>Loại sản phẩm</th>
                                            <th width="30px;"></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php

                                          while($row1 = mysqli_fetch_array($query_lietke_sp)){

                                            ?>
                                          <tr>
                                            <td><?php echo $row1['tenhh'] ?></td>
                                            <td><img src="sanpham/upload/<?php echo $row1['tenhinh'] ?>" style="width: 100px; height: 100px;"></td>                                         
                                            <td><?php echo $row1['quycach'] ?></td>
                                            <td><?php echo $row1['soluonghang'] ?></td>
                                            <td><?php echo number_format($row1['gia'],0,',','.').' ₫' ?></td>
                                            <td><?php echo $row1['tenloaihang'] ?></td>
                                            <td>
                                              <a href="?action=suasp&idsp=<?php echo $row1['mshh'] ?>" class="active" style="margin-right: 20px;">
                                                <i class="fa fa-pencil-square-o"></i></a>

                                              <a onclick=" return confirm('Bạn có muốn xóa sản phẩm này không?')" href="xuly.php?action=xoasp&idsp=<?php echo $row1['mshh'] ?>" class="active" ui-toggle-class="">
                                                <i class="fa fa-times text-danger text"></i></a>
                                            </td>
                                          </tr>
                                          <?php
                                          }
                                          ?>
                                        </tbody>
                                      </table>
                                    </div>

                                  </div>

                            </div>

                        </div>
                    </section>

            </div>
  