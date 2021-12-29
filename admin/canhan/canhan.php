  <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading" style ="color: #fff; font-size: 20px;">
                            <b>Thông tin cá nhân</b> 
                        </header>
                        <div class="panel-body">
                       
                            <div class="position-center" style="width: 95%; float: left; margin-left: 20px;">
                                    

                            <?php
                              $sql_lietke_nv = "SELECT * FROM nhanvien WHERE msnv = '".$_SESSION['dangnhap']."' LIMIT 1";
							                 $query_lietke_nv = mysqli_query($mysqli, $sql_lietke_nv);
                               while($row = mysqli_fetch_array($query_lietke_nv)) {
                            ?>
                              <div class="panel panel-default">
                                    <div class="row w3-res-tb" style="padding: 0px;">
         
                                      <h4></h4> 
       
                                      <div class="col-sm-1">
                                      </div>
                                      <div class="col-sm-6">

                                      </div>
                                    </div>
                                    <div class="container" style="width: 100%;  background: #fff; border-radius: 5px; margin-bottom: 10px; float: left; padding-bottom: 20px;">                                                      
                                                      <table class="table table-condensed total-result" style="background: #fff; margin-bottom: 0px; color: #fff !important;">
                                                        <tr>
                                                          <td style="padding:5px !important; border:0px !important; width: 150px;">MSNV: </td>
                                                          <td style="padding:5px !important; border:0px !important;"><b><?php echo $row['msnv'] ?></b></td>
                                                        </tr>
                                                        <tr>
                                                          <td style="padding:5px !important; border:0px !important; ">Họ tên: </td>
                                                          <td style="padding:5px !important; border:0px !important; "><b><?php echo $row['hotennv'] ?></b></td>
                                                        </tr>
                                                        <tr>
                                                           <td style="padding:5px !important; border:0px !important; ">Chức vụ: </td>
                                                           <td style="padding:5px !important; border:0px !important; "><b><?php echo $row['chucvu'] ?></b></td>
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

                                  </div>
                                <?php } ?>
                            </div>

                        </div>
                    </section>

            </div>
  