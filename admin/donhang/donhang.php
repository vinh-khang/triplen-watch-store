
  <div class="panel panel-default">
    <div class="panel-heading">
      <b>Liệt kê đơn hàng</b>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
       <h4><b><i class="fa fa-list" aria-hidden="true"></i> Liệt kê đơn hàng</b></h4></div>
      <div class="col-sm-7">

          <div style ="float: right; font-weight: 1000; color: #33dd30;">
               <?php
                                           
                    if(isset($_SESSION["message"])){
                        $message = $_SESSION["message"];
                        echo $message;
                        $_SESSION["message"] = null;}
                ?>
          </div>
      </div>
    </div>

    <div class="table-responsive" style="margin-top: 0px;">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>

            <th>Mã đơn</th>
            <th>Khách hàng</th>
            <th>Ngày đặt</th>
            <th>Ngày giao</th>
            <th>Trạng thái đơn</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
           <?php
            $sql_lietke_donhang = "SELECT * FROM dathang JOIN khachhang ON dathang.mskh = khachhang.mskh JOIN nhanvien ON dathang.msnv = nhanvien.msnv ORDER BY dathang.sodondh DESC";
            $query_lietke_donhang = mysqli_query($mysqli, $sql_lietke_donhang);
            while($row1 = mysqli_fetch_array($query_lietke_donhang)){
           ?>
          <tr>

            <td><?php echo $row1['sodondh']; ?></td>
            <td><?php echo $row1['hotenkh']; ?></td>
            <td><?php echo $row1['ngaydh']; ?></td>
            <td><?php echo $row1['ngaygh']; ?></td>
            <td><?php echo $row1['trangthaidh']; ?></td>
            
            <td>
              <a href="?action=chitietdon&id=<?php echo $row1['sodondh']; ?>" class="active" ui-toggle-class="">
               <i class="fa fa-list-alt" aria-hidden="true"></i></a>
              <a onclick=" return confirm('Bạn có muốn xóa đơn hàng này không?')" href="xuly.php?action=xoadon&id=<?php echo $row1['sodondh']; ?>" class="active" ui-toggle-class="">
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

</form>
