
<div class="features_items" style="background: #fff; border-radius: 5px; width: 900px; margin-left: 200px; margin-bottom: 10px;">
	<header class="panel-heading" style ="background:#00aeef; color: #fff; font-size: 20px; text-align: center;">
                            <b>ĐĂNG NHẬP/ĐĂNG KÝ TÀI KHOẢN</b>
                        </header>
<section id="form" style="margin-bottom: 40px; margin-top: 10px;"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1" style="margin-left: 80px;">
					<div class="login-form"><!--login form-->
						<h2 style="margin: 0px;"><b>Đăng nhập vào tài khoản</b></h2>
						<form action="admin/xuly.php" method="POST">

							<label style="margin-top: 10px; color: #696763;">Số điện thoại</label>
							<input type="text" name = "customer_phone" value="<?php 
							if(isset($_SESSION['sodienthoai'])){
							echo $_SESSION['sodienthoai'];
							$_SESSION['sodienthoai'] = null;
							}else if(isset($_COOKIE['user'])){
								echo $_COOKIE['user'];
							}
							?>" placeholder="Nhập số điện thoại" required="" />
							<label style="color: #696763;">Mật khẩu</label>
							<input type="password" name = "customer_password" value="<?php
							 if(isset($_SESSION['matkhau'])){
							 echo $_SESSION['matkhau'];
							 $_SESSION['matkhau'] = null;
							}else if(isset($_COOKIE['pass'])){
								echo $_COOKIE['pass'];
							}

							 ?>" placeholder="Nhập mật khẩu" required=""/>
							<span>
								<input type="checkbox" class="checkbox" name="ghinho"> 
								Ghi nhớ tôi
							</span>
							<button type="submit" name ="dangnhaptaikhoan" style="">Đăng nhập</button>
						</form>
					</div>  
					<div style ="float: left; font-weight: 1000; color: #ff5050; margin-top: 20px;">
							 <?php                                         
						              if(isset($_SESSION['chuy_dangnhap'])){
						                  $message = $_SESSION['chuy_dangnhap'];
						                  echo $message;
						                  $_SESSION['chuy_dangnhap'] = null;
						              }
						              ?>
                                </div>
                  
				</div>

				<div class="col-sm-4" style="margin-left: 80px;">
					<div class="signup-form"><!--sign up form-->
						<h2 style="margin: 0px;"><b>Đăng ký tài khoản mới</b></h2>
						<form action="admin/xuly.php" method="POST">
							<label style="margin-top: 10px; color: #696763;">Số điện thoại</label>
							<input type="text" name="customer_phone" placeholder="Nhập số điện thoại" required=""  pattern="[0-9]{10}" title="Sai hình thức một số điện thoại"/>
							<label style="color: #696763;">Họ tên</label>
							<input type="text" name="customer_name" placeholder="Nhập họ tên" required="" />
							<label style="color: #696763;">Tên công ty</label>
							<input type="text" name="customer_company" placeholder="Nhập tên công ty"/>
							
							<label style="color: #696763;">Số fax</label>
							<input type="number" name="customer_fax" placeholder="Nhập số fax" />
							
							<label style="color: #696763;">Mật khẩu</label>
							<input type="password" name="customer_password" placeholder="Nhập mật khẩu" required=""/>
							<label style="color: #696763;">Nhập lại mật khẩu</label>
							<input type="password" name="customer_password_2" placeholder="Nhập lại mật khẩu" required=""/>
							<button type="submit" name="dangkytaikhoan" style="margin-top: 20px;">Đăng ký</button>
						</form>
					</div>
					   <div style ="float: right; font-weight: 1000; color: #ff5050; margin-top: 20px;">
                    				 <?php                                         
						              if(isset($_SESSION['chuy_dangky'])){
						                  $message = $_SESSION['chuy_dangky'];
						                  echo $message;
						                  $_SESSION['chuy_dangky'] = null;
						              }
						              ?>
                                </div>
			</div>
		</div>
	</section>
</div>