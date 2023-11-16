<!DOCTYPE html>
<html lang="en">
<?php 
	
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

	<title>JomaShop</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="../../assets/css/font-awesome.min.css">

	<!-- Lineawesome CSS -->
	<link rel="stylesheet" href="../../assets/css/line-awesome.min.css">

	<!-- Chart CSS -->
	<link rel="stylesheet" href="../../assets/plugins/morris/morris.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="../../assets/css/style.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header -->
		<div class="header">

			<!-- Logo -->
			<div class="header-left">
				<a href="index.php" class="logo">
					<img src="../../assets/img/logo.png" width="40" height="40" alt="">
				</a>
			</div>
			<!-- /Logo -->

			<a id="toggle_btn" href="javascript:void(0);">
				<span class="bar-icon">
					<span></span>
					<span></span>
					<span></span>
				</span>
			</a>

			<!-- Header Title -->
			<div class="page-title-box">
				<h3>JomaShop</h3>
			</div>
			<!-- /Header Title -->
		</div>
		<!-- /Header -->

		<!-- Sidebar -->
		<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li class="menu-title">
							<span>JomaShop</span>
						</li>
						<li class="submenu">
							<a href="#"><i class="la la-dashboard"></i> <span>Quản lý</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="index.php">Quản trị Admin</a></li>
							</ul>
						</li>

						<li class="submenu">
							<a href="#" class=""><i class="la la-user"></i> <span>Nhân Viên</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="employee.php">Thông tin nhân viên</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#" class=""><i class="la la-cube"></i> <span>Sản Phẩm</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li>
									<a href="./watches.php"> Watches</a>
								</li>
								<li>
									<a href="./category.php">Category</a>
								</li>
								<li>
									<a href="./types.php">Types</a>
								</li>
								<li>
									<a href="./movement.php">Movement</a>
								</li>
								<li>
									<a href="./features.php">Features</a>
								</li>
								<li>
									<a href="./caseshape.php">CaseShape</a>
								</li>
								<li>
									<a href="./brand.php">Brand</a>
								</li>
								<li>
									<a href="./style.php">Style</a>
								</li>
							</ul>
						</li>

						<li class="submenu">
							<a href="#" class=""><i class="la la-user"></i> <span>Khách Hàng</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="custormer.php">Thông tin khách hàng</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#" class=""><i class="la la-money"></i> <span>Hóa Đơn</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="#">Thanh Toán</a></li>
								<li><a href="#"></i>Thống kê</a></li>
							</ul>
						</li>
						<li class="menu-title">
							<span>Tài khoản</span>
						</li>
						<li class="submenu">
							<a href="#"><i class="la la-user"></i><span>Hồ Sơ</span></a>
						</li>
						<li class="">
							<a href="./login.php"><i class="la la-key"></i><span>Đăng xuất</span></a>
						</li>
						<li class="submenu">
							<a href="#"><i class="la la-book"></i><span>Bài tập</span><span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="#">Bài tập</a></li>
								<li><a href="#"></i>Thông tin cá nhân</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Sidebar -->

		<!-- Page Wrapper -->
		<div class="page-wrapper">

			<!-- Page Content -->
			<div class="content container-fluid">
				<?php include '../template.php' ?>

                <div>
                    <?php 
                        if(isset($_POST['tinh'])) {
                            $msg = "";
                            $name = $_POST['ten'];
                            $old = $_POST['cscu'];
                            $new = $_POST['csmoi'];
                            $price = $_POST['dongia'];
                            $total = 0;
                            if(!empty($name)) {
                                if(is_numeric($old) and is_numeric($new) and is_numeric($price)) {
                                    if($old >= 0 and $new >= 0 and $price > 0) {
                                        if($old <= $new) {
                                            $total = ($new - $old) * $price;
                                        } else $msg = "Chỉ số mới không được nhỏ hơn chỉ số cũ";
                                    } else $msg = "Chỉ số mới, chỉ số cũ và đơn giá phải lớn hơn 0";
                                } else $msg = "Chỉ số mới, chỉ số cũ và đơn giá phải là số và không để trống";
                            } else $msg = "Tên chủ hộ không được để trống";
                        }
                    ?>
                    <div>
                        <form action="baitap3.php" name="baitap3" method="post">
                            <table style="background: lightyellow; margin: 20px auto;">
                                <tr style="background: orange;">
                                    <th colspan="2">
                                        THANH TOÁN TIỀN ĐIỆN
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        Tên chủ hộ
                                    </td>
                                    <td>
                                        <input type="text" name="ten" value="<?php
                                            if(isset($_POST['ten'])) echo $_POST['ten'];
                                        ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Chỉ số cũ
                                    </td>
                                    <td>
                                        <input type="text" name="cscu" value="<?php
                                            if(isset($_POST['cscu'])) echo $_POST['cscu'];
                                        ?>">
                                        <span>(Kw)</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Chỉ số mới
                                    </td>
                                    <td>
                                        <input type="text" name="csmoi" value="<?php
                                            if(isset($_POST['csmoi'])) echo $_POST['csmoi'];
                                        ?>">
                                        <span>(Kw)</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Đơn giá
                                    </td>
                                    <td>
                                        <input type="text" name="dongia" value="<?php
                                            if(isset($_POST['dongia'])) echo $_POST['dongia'];
                                            else echo "2000";
                                        ?>">
                                        <span>(VNĐ)</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Số tiền thanh toán
                                    </td>
                                    <td>
                                        <input type="number" name="tienthanhtoan" value="<?php
                                            if(isset($total)) echo $total;
                                            else echo "0";
                                        ?>" disabled style="background: lightpink;">
                                        <span>(VNĐ)</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center;">
                                        <input type="submit" name="tinh" value="Tính">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="color: red;">
                                        <?php if(isset($msg)) echo $msg; else echo "" ?>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
			</div>
			<!-- /Page Content -->

		</div>
		<!-- /Page Wrapper -->

	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="../../assets/js/jquery-3.5.1.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="../../assets/js/popper.min.js"></script>
	<script src="../../assets/js/bootstrap.min.js"></script>

	<!-- Slimscroll JS -->
	<script src="../../assets/js/jquery.slimscroll.min.js"></script>

	<!-- Chart JS -->
	<script src="../../assets/plugins/morris/morris.min.js"></script>
	<script src="../../assets/plugins/raphael/raphael.min.js"></script>
	<script src="../../assets/js/chart.js"></script>

	<!-- Custom JS -->
	<script src="../../assets/js/app.js"></script>

</body>

</html>