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
                        if(isset($_POST['submit'])) {
                            $msg = "";
                            $mail = $_POST['email'];
                            $passwd = $_POST['passwd'];
                            $fullname = $_POST['fullname'];
                            $username = $_POST['username'];
                            $phone = $_POST['phone'];
                            $mail_ex = "/[a-zA-Z0-9]*@[a-zA-Z0-9]*.[a-zA-Z0-9]*/i";
                            $cf_passwd = $_POST['cf_passwd'];
                            if(empty($fullname)) {
                                $msg .= " Họ tên không được để trống. <br>";
                            }
                            if(empty($username)) {
                                $msg .= " Tên người dùng không được để trống. <br>";
                            }
                            if(!strlen($passwd) >= 8) {
                                $msg .= " Mật khẩu phải đủ 8 kí tự.<br>";
                            }
                            if(!preg_match('/[A-Z]/',$passwd)) {
                                $msg .= " Mật khẩu phải có 1 chữ hoa.<br>";     
                            }
                            if(!preg_match('/[0-9]/',$passwd)) {
                                $msg .= " Mật khẩu phải có 1 chữ số.<br>";             
                            }
                            if(!preg_match('/[a-z]/',$passwd)) {
                                $msg .= " Mật khẩu phải có 1 chữ thường.<br>";
                            }
                            if(!preg_match('/[^a-zA-Z0-9]/',$passwd)) {
                                $msg .= " Mật khẩu phải có 1 kí tự đặc biệt.<br>";           
                            }
                            if($passwd !== $cf_passwd) {
                                $msg .= " Xác nhận mật khẩu không khớp.<br>";
                            }

                            if(empty($msg)) $msg = "Đăng kí thành công. Chào mừng " . $fullname; 
                        } 
                    ?>
                    <div>
                        <form method="post" style="width: 50%;">
                            <table style="background: lightpink; margin: 20px auto">
                                <tr style="background: red;">
                                    <th colspan="2">
                                        ĐĂNG KÍ THÀNH VIÊN
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="fullname">Họ tên</label> <br>
                                        <input type="text" name="fullname" value="<?php 
                                                if(isset($_POST['fullname'])) {
                                                    echo $_POST['fullname'];
                                                }
                                        ?>">
                                    </td>
                                    <td>
                                        <label for="username">Tài khoản</label> <br>
                                        <input type="text" name="username" value="<?php
                                            if(isset($_POST['username'])) echo $_POST['username'];
                                        ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="email">Email</label> <br>
                                        <input type="text" name="email" value="<?php
                                            if(isset($_POST['email'])) echo $_POST['email'];
                                        ?>">
                                    </td>
                                    <td>
                                        <label for="phone">Số điện thoại</label> <br>
                                        <input type="text" name="phone" value="<?php
                                            if(isset($_POST['phone'])) echo $_POST['phone'];
                                        ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="passwd">Mật khẩu</label> <br>
                                        <input type="password" name="passwd" value="<?php
                                            if(isset($_POST['passwd'])) echo $_POST['passwd'];
                                        ?>">
                                    </td>
                                    <td>
                                        <label for="cf_passwd">Nhập lại mật khẩu</label> <br>
                                        <input type="password" name="cf_passwd" value="<?php
                                            if(isset($_POST['cf_passwd'])) echo $_POST['cf_passwd'];
                                        ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                            <label for="gender">Giới tính</label> <br>
                                            <input type="radio" name="gender" value="Male" checked>Nam</input>
                                            <input type="radio" name="gender" value="Female">Nữ</input>
                                            <input type="radio" name="gender" value="Prefer not to say">Không thích nói</input>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center;">
                                        <input type="submit" name="submit" value="Đăng kí" style="width: 100%; background: red;">
                                    </td>
                                </tr>
                            </table>
                            
                        </form>
                        <p style="color: red"><?php if(isset($msg)) echo $msg; else echo "" ?></p>
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