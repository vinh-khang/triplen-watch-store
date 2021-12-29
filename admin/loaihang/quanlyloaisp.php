  <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading" style ="color: #fff; font-size: 20px;">
                            <b>Quản lý loại hàng hóa</b> 
                        </header>
                        <div class="panel-body">
                       
                            <div class="position-center" style="width: 95%; float: left; margin-left: 20px;">
                                <form role="form" action = "../admin/xuly.php" method="post">
                                <div class="form-group">
                                    <h5><b><i class="fa fa-plus-square-o" aria-hidden="true"></i> Thêm loại hàng hóa</b></h5>
                                    <div style ="float: right; font-weight: 1000; color: #33dd30;">
                                        <?php
                                           
                                            if(isset($_SESSION["message"])){
                                                $message = $_SESSION["message"];
                                                echo $message;
                                                $_SESSION["message"] = null;}
                                        ?>
                                    </div>
                                    <br>
                                    <input type="text" name ="tenloai" class="form-control" placeholder="Nhập tên loại hàng hóa" style="width: 500px; float: left;">
                                
                                <button type="submit" name ="themloai" class="btn btn-info" style="width: 100px; float: left; margin-left: 10px; padding: 5px;">Thêm</button>
                                </div>
                            </form>
                            <br>
                            <br>
                            <?php
                              $sql_lietke_loai = "SELECT * FROM loaihanghoa ORDER BY maloaihang ASC";
                              $query_lietke_loai = mysqli_query($mysqli, $sql_lietke_loai);
                            ?>
                              <div class="panel panel-default">
                                    <div class="row w3-res-tb">
         
                                      <h5><b><i class="fa fa-list" aria-hidden="true"></i> Liệt kê loại hàng hóa</b></h5>           
       
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
                                            <th>STT</th>
                                            <th>Tên loại hàng hóa</th>
                                            <th>Xóa</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          $i = 0;
                                          while($row = mysqli_fetch_array($query_lietke_loai)){
                                            $i++;
                                            ?>
                                          <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row['tenloaihang'] ?></td>
                                            <td>
                                              <a onclick=" return confirm('Bạn có muốn xóa loại hàng hóa này không?')" href="xuly.php?action=xoaloai&idloai=<?php echo $row['maloaihang'] ?>" class="active" ui-toggle-class="">
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
  