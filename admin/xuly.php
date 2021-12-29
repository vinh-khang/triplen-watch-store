<?php

include('config/config.php');
session_start();

//Admin

//Loại sản phẩm
$action = '';
if(isset( $_GET['action']))
{
	$action = $_GET['action'];
}

if(isset($_POST['themloai'])){
	$tenloaisp = $_POST['tenloai'];
	$sql_them = "INSERT INTO loaihanghoa(tenloaihang) VALUES('".$tenloaisp."')";
	mysqli_query($mysqli,$sql_them);
	$_SESSION["message"] = "Thêm loại hàng thành công!";
	header('Location:index.php?action=quanlyloaisp');
}elseif($action== 'xoaloai'){
	$id = $_GET['idloai'];
	$sql_xoa_loai = "DELETE FROM loaihanghoa WHERE maloaihang ='".$id."'";
	mysqli_query($mysqli,$sql_xoa_loai);
	$_SESSION["message"] = "Xóa loại hàng thành công!";
	header('Location:index.php?action=quanlyloaisp');
}

//Sản phẩm


if(isset($_POST['themsp'])){
	$tensp = $_POST['tensp'];
	$giasp = $_POST['giasp'];
	$quycach = $_POST['quycach'];
	$soluong = $_POST['soluong'];
	$loaihang = $_POST['loaihang'];
	$mota = $_POST['mota'];
	$tenhinh = $_FILES['tenhinh']['name'];
	$tenhinh_tmp = $_FILES['tenhinh']['tmp_name'];
	$tenhinh = time().'_'.$tenhinh;

	$sql_them = "INSERT INTO hanghoa(tenhh,quycach,gia,soluonghang,maloaihang,mota) VALUES('".$tensp."','".$quycach."','".$giasp."','".$soluong."','".$loaihang."','".$mota."')";
	mysqli_query($mysqli,$sql_them);

	$sql_lietke_sp = "SELECT * FROM hanghoa ORDER BY mshh DESC LIMIT 1";
    $query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
	$row = mysqli_fetch_array($query_lietke_sp);
	$mshh = $row['mshh'];

	$sql_themanh = "INSERT INTO hinhhanghoa(tenhinh,mshh) VALUES('".$tenhinh."','".$mshh."')";
	mysqli_query($mysqli,$sql_themanh);
	move_uploaded_file($tenhinh_tmp,'sanpham/upload/'.$tenhinh);
	$_SESSION["message"] = "Thêm sản phẩm thành công!";
	header('Location:index.php?action=quanlysp');
}elseif(isset($_POST['capnhatsp'])){
	$tensp = $_POST['tensp'];
	$giasp = $_POST['giasp'];
	$quycach = $_POST['quycach'];
	$soluong = $_POST['soluong'];
	$loaihang = $_POST['loaihang'];
	$mota = $_POST['mota'];
	$tenhinh = $_FILES['tenhinh']['name'];
	$tenhinh_tmp = $_FILES['tenhinh']['tmp_name'];
	$tenhinhb = time().'_'.$tenhinh;

	$id_sp = $_POST['idsp'];
	if($tenhinh != ''){
		
		move_uploaded_file($tenhinh_tmp,'sanpham/upload/'.$tenhinhb);
		$sql_xoafileanh = "SELECT * FROM hinhhanghoa WHERE mshh = '".$id_sp."'";
		$query_xoafileanh = mysqli_query($mysqli,$sql_xoafileanh);
		while($row = mysqli_fetch_array($query_xoafileanh)){
			unlink('sanpham/upload/'.$row['tenhinh']);
		}
		$sql_capnhat = "UPDATE hanghoa SET tenhh = '".$tensp."', quycach = '".$quycach."', gia = '".$giasp."', soluonghang = '".$soluong."', maloaihang = '".$loaihang."', mota = '".$mota."' WHERE mshh = '".$id_sp."'";
		mysqli_query($mysqli,$sql_capnhat);

		$sql_capnhat_anh = "UPDATE hinhhanghoa SET tenhinh = '".$tenhinhb."' WHERE mshh = '".$id_sp ."'";
		mysqli_query($mysqli,$sql_capnhat_anh);
		$_SESSION["message"] = "Cập nhật sản phẩm thành công!";
		header('Location:index.php?action=quanlysp');
	}else{
		$sql_capnhat = "UPDATE hanghoa SET tenhh = '".$tensp."', quycach = '".$quycach."', gia = '".$giasp."', soluonghang = '".$soluong."', maloaihang = '".$loaihang."', mota = '".$mota."'  WHERE mshh = '".$id_sp."'";
		mysqli_query($mysqli,$sql_capnhat);
		$_SESSION["message"] = "Cập nhật sản phẩm thành công!";
		header('Location:index.php?action=quanlysp');
	}
}elseif($action == 'xoasp'){
	$id_sp = $_GET['idsp'];
	$sql_xoafileanh = "SELECT * FROM hinhhanghoa WHERE mshh = '".$id_sp."'";
	$query_xoafileanh = mysqli_query($mysqli,$sql_xoafileanh);
	while($row = mysqli_fetch_array($query_xoafileanh)){
		unlink('sanpham/upload/'.$row['tenhinh']);
	}
	$sql_xoa_hinh_sp = "DELETE FROM hinhhanghoa WHERE mshh ='".$id_sp."'";
	mysqli_query($mysqli,$sql_xoa_hinh_sp);
	$sql_xoa_sp = "DELETE FROM hanghoa WHERE mshh ='".$id_sp."'";
	mysqli_query($mysqli,$sql_xoa_sp);
	$_SESSION["message"] = "Xóa sản phẩm thành công!";
	header('Location:index.php?action=quanlysp');
}

//them sanpham vao gio hang
	if(isset($_POST['themgiohang'])){
		//session_destroy();
		$id=$_GET['idsanpham'];
		$soluong = $_POST['soluong'];
		$sql_themgio = "SELECT * FROM hanghoa JOIN loaihanghoa ON hanghoa.maloaihang = loaihanghoa.maloaihang JOIN hinhhanghoa ON
    hanghoa.mshh = hinhhanghoa.mshh WHERE hanghoa.mshh = '".$id."' LIMIT 1";
		$query_themgio = mysqli_query($mysqli,$sql_themgio);
		$row = mysqli_fetch_array($query_themgio);
		if($soluong > $row['soluonghang']){
			$_SESSION['message'] = "Sản phẩm còn lại không đủ!";
			header('Location:../index.php?action=chitietsanpham&idsp='.$id.'');
		}else{
			if($row){
			$new_product= array(array('tenhh'=>$row['tenhh'],'id'=>$id,'soluong'=>$soluong,'gia'=>$row['gia'],'tenhinh'=>$row['tenhinh']));
			//kiem tra session gio hang ton tai
			if(isset($_SESSION['cart'])){
				$found = false;
				$max = false;
				foreach($_SESSION['cart'] as $cart_item){
					//neu du lieu trung
					if($cart_item['id']==$id){
						if($cart_item['soluong'] + $soluong > $row['soluonghang']){
							$max = true;
						}else{
						$product[]= array('tenhh'=>$cart_item['tenhh'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'] + $soluong,'gia'=>$cart_item['gia'],'tenhinh'=>$cart_item['tenhinh']);
					}
					$found = true;
					}else{
						//neu du lieu khong trung
						$product[]= array('tenhh'=>$cart_item['tenhh'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia'],'tenhinh'=>$cart_item['tenhinh']);
					}
				}

				if($max == true){
					$_SESSION['message'] = "Sản phẩm còn lại không đủ!";
					header('Location:../index.php?action=chitietsanpham&idsp='.$id.'');
				}elseif($found == false){
					//lien ket du lieu new_product voi product

					$_SESSION['cart'] = array_merge($product,$new_product);
					header('Location:../index.php?action=giohang');
				}else{
					$_SESSION['cart']=$product;
					header('Location:../index.php?action=giohang');
				}
			}else{
				$_SESSION['cart'] = $new_product;
				header('Location:../index.php?action=giohang');
			}

		}
		
	}
		
	}

		//xoa san pham
	if(isset($_SESSION['cart'])&&isset($_GET['xoa'])){
		$id=$_GET['xoa'];
		foreach($_SESSION['cart'] as $cart_item){

			if($cart_item['id']!=$id){
				$product[]= array('tenhh'=>$cart_item['tenhh'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'gia'=>$cart_item['gia'],'tenhinh'=>$cart_item['tenhinh']);
			}

		$_SESSION['cart'] = $product;
		header('Location:../index.php?action=giohang');
		}
	}

	if(isset($_POST['dangnhap_admin'])){
		$taikhoan = $_POST['msnv'];
		$matkhau = md5($_POST['mk']);
		$sql = "SELECT * FROM nhanvien WHERE msnv='".$taikhoan."' AND matkhau='".$matkhau."' LIMIT 1";
		$row = mysqli_query($mysqli,$sql);
		$count = mysqli_num_rows($row);
		if($count>0){
			$_SESSION['dangnhap'] = $taikhoan;
			header("Location:index.php");
		}else{
			$_SESSION['message'] = "Sai MSNV hoặc mật khẩu!";
			header("Location:admin_login.php");
		}
	} 

	if(isset($_POST['dangkytaikhoan'])){
		$customer_phone = $_POST['customer_phone'];
		$customer_name = $_POST['customer_name'];
		$customer_company = $_POST['customer_company'];
		$customer_fax = $_POST['customer_fax'];
		$customer_password = md5($_POST['customer_password']);
		$customer_password_2 = md5($_POST['customer_password_2']);
		$sql_taikhoan = "SELECT * FROM khachhang WHERE sodienthoai = '".$customer_phone."' LIMIT 1";
		$row = mysqli_query($mysqli,$sql_taikhoan);
		$count = mysqli_num_rows($row);

		if($customer_password != $customer_password_2){
			$_SESSION['chuy_dangky'] = "Nhập lại mật khẩu không chính xác!";
			header('Location:../index.php?action=dangnhap');
		}elseif($count > 0){
			$_SESSION['chuy_dangky'] = "Số điện thoại đã tồn tại!";
			header('Location:../index.php?action=dangnhap');
		}else{
			$sql_themtaikhoan = "INSERT INTO khachhang(hotenkh,tencongty,sodienthoai,sofax,matkhaukh) VALUES('".$customer_name."', '".$customer_company."','".$customer_phone."','".$customer_fax."','".$customer_password."')";
			mysqli_query($mysqli,$sql_themtaikhoan);
			$_SESSION['sodienthoai'] = $customer_phone;
			$_SESSION['matkhau'] = $_POST['customer_password'];
			$_SESSION['chuy_dangky'] = "Đăng ký thành công!";
			header('Location:../index.php?action=dangnhap');	
		}	

	}

	if(isset($_POST['dangnhaptaikhoan'])){
		$customer_phone = $_POST['customer_phone'];
		$customer_password = md5($_POST['customer_password']);
		$sql_dangnhapkh = "SELECT * FROM khachhang WHERE sodienthoai='".$customer_phone."' AND matkhaukh='".$customer_password."' LIMIT 1";
		$query_dangnhap = mysqli_query($mysqli,$sql_dangnhapkh);
		$count = mysqli_num_rows($query_dangnhap);
		if($count>0){
			if(isset($_POST['ghinho'])){
				setcookie("user",$customer_phone, time()+(86400*30), '/');
				setcookie("pass",$_POST['customer_password'], time()+(86400*30), '/');
			}
			$_SESSION['dangnhaptaikhoan'] = $customer_phone;
			header('Location:../index.php');

		}else{
			$_SESSION['chuy_dangnhap'] = "Sai số điện thoại hoặc mật khẩu!";
			header('Location:../index.php?action=dangnhap');
		}
	}

	if(isset($_POST['timkiem'])){
       $tukhoa = $_POST['tukhoa'];
       $_SESSION['tukhoa'] = $tukhoa;
	   header('Location:../index.php?action=timkiem');
       }


	if($action == 'dangxuat'){
       $_SESSION['dangnhaptaikhoan'] = null;
	   header('Location:../index.php');
       }

    if($action == 'thanhtoan'){
    	foreach($_SESSION['cart'] as $cart_item){
    	$mshh = $cart_item['id'];
    	$sql_themgio = "SELECT * FROM hanghoa JOIN loaihanghoa ON hanghoa.maloaihang = loaihanghoa.maloaihang JOIN hinhhanghoa ON
    hanghoa.mshh = hinhhanghoa.mshh WHERE hanghoa.mshh = '".$mshh."' LIMIT 1";
		$query_themgio = mysqli_query($mysqli,$sql_themgio);
		$row = mysqli_fetch_array($query_themgio);

    	if($cart_item['soluong'] > $row['soluonghang']){
    		
    		$_SESSION['message'] = "Sản phẩm '".$cart_item['tenhh']."' không còn đủ số lượng, vui lòng kiểm tra lại!";
	   		header('Location:../index.php?action=giohang');
    	}else{
		header('Location:../index.php?action=thanhtoan');
		}
	}}

	if(isset($_POST['themdiachi'])){
       $diachi = $_POST['diachi'];
       $sodienthoai = $_POST['sodienthoai'];
       $sql_taikhoan = "SELECT * FROM khachhang WHERE sodienthoai='".$sodienthoai."' LIMIT 1";
       $query_sodienthoai = mysqli_query($mysqli,$sql_taikhoan);
       $row = mysqli_fetch_array($query_sodienthoai);
       $mskh = $row['mskh'];

       $sql_themdiachi = "INSERT INTO diachikh(diachi,mskh) VALUES('".$diachi."','".$mskh."')";
	   mysqli_query($mysqli,$sql_themdiachi);

       $_SESSION['message'] = "Thêm địa chỉ thành công!";
	   header('Location:../index.php?action=diachi');
       }   

    if($action == 'xoadc'){
       $madc = $_GET['madc'];
       $sql_xoa_dc = "DELETE FROM diachikh WHERE madc ='".$madc."'";
       mysqli_query($mysqli,$sql_xoa_dc);
       $_SESSION['message'] = "Xóa địa chỉ thành công!";
	   header('Location:../index.php?action=diachi');
       }

    if(isset($_POST['xacnhanthanhtoan'])){
    	$diachi = 0;
		$mskh = $_POST['mskh'];
		$diachi = $_POST['diachi'];
		$ngaygh = $_POST['ngaygh'];
		$ngaydh = $_POST['ngaydh'];
		$giadathang = $_POST['giadathang'];
		$giamgia = 0;
		$trangthaidh = "Chờ xác nhận";
		$nhanvien = 0;
		if($diachi == 0){
			$_SESSION["message"] = "Bạn chưa có địa chỉ nhận hàng!";
			header('Location:../index.php?action=diachi');
		}else{
		$sql_dathang = "INSERT INTO dathang(mskh,madc,ngaydh,ngaygh,trangthaidh,msnv) VALUES('".$mskh."','".$diachi."','".$ngaydh."','".$ngaygh."','".$trangthaidh."','".$nhanvien."')";
		mysqli_query($mysqli,$sql_dathang);

		$sql_donhang = "SELECT * FROM dathang ORDER BY sodondh DESC LIMIT 1";
	    $query_donhang = mysqli_query($mysqli, $sql_donhang);
		$row = mysqli_fetch_array($query_donhang);
		$sodondh = $row['sodondh'];

		foreach($_SESSION['cart'] as $cart_item){
			if($cart_item['soluong'] * $cart_item['gia'] > 3000000){
				$giamgia = ($cart_item['soluong'] * $cart_item['gia'])*10/100; 
			}
			$sql_chitietdathang = "INSERT INTO chitietdathang(sodondh,mshh,soluong,giadathang,giamgia) VALUES('".$sodondh."','".$cart_item['id']."','".$cart_item['soluong']."','".$cart_item['gia']."','".$giamgia."')";
			mysqli_query($mysqli,$sql_chitietdathang);

			$sql_hanghoa = "SELECT * FROM hanghoa WHERE mshh = '".$cart_item['id']."'";
			$query_hanghoa = mysqli_query($mysqli,$sql_hanghoa);
			$hanghoa = mysqli_fetch_array($query_hanghoa);
			$soluongconlai = $hanghoa['soluonghang'] - $cart_item['soluong'];
			$sql_xacnhan = "UPDATE hanghoa SET soluonghang = '".$soluongconlai."' WHERE mshh = '".$cart_item['id']."'";
       		mysqli_query($mysqli,$sql_xacnhan);
		}

		unset($_SESSION['cart']);
		header('Location:../index.php?action=thanhcong');	

	}}

	if($action == 'xoadon'){
		$sodon = $_GET['id'];
		$sql_xoachitietdon = "DELETE FROM chitietdathang WHERE sodondh = '".$sodon."'";
		$query_xoachitietdon = mysqli_query($mysqli,$sql_xoachitietdon);

		$sql_xoadon = "DELETE FROM dathang WHERE sodondh ='".$sodon."'";
		mysqli_query($mysqli,$sql_xoadon);

		$_SESSION["message"] = "Xóa đơn hàng thành công!";
		header('Location:index.php?action=donhang');
	}

    if(isset($_POST['nhanvienxacnhan'])){
       $msnv = $_POST['msnv'];
       $sodon = $_POST['sodon'];
       $trangthai = "Đã xác nhận";
       $sql_xacnhan = "UPDATE dathang SET msnv = '".$msnv."', trangthaidh = '".$trangthai."' WHERE sodondh = '".$sodon ."'";
       mysqli_query($mysqli,$sql_xacnhan);

       $_SESSION['message'] = "Xác nhận thành công!";
	   header('Location:index.php?action=donhang');
       }   

     if(isset($_POST['capnhattaikhoan'])){
       $hotenkh = $_POST['hotenkh'];
       $tencongty = $_POST['tencongty'];
       $sofax = $_POST['sofax'];
       $sodienthoai = $_POST['sodienthoai'];
       $sql_capnhat = "UPDATE khachhang SET hotenkh = '".$hotenkh."', tencongty = '".$tencongty."', sofax = '".$sofax."' WHERE sodienthoai = '".$sodienthoai ."'";
       mysqli_query($mysqli,$sql_capnhat);

       $_SESSION['message'] = "Cập nhật tài khoản thành công!";
	   header('Location:../index.php?action=thongtintaikhoan');
       }
   


?>