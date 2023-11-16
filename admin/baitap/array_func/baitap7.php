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
                            $yang = $_POST['yang'];
                            $msg = "";
                            if(!empty($yang) or $yang=="0") {
                                if(filter_var($yang, FILTER_VALIDATE_INT) or $yang=='0') {
                                    if($yang >=0 ) {
                                        if($yang >= 3) {
                                            $stems = array('Quý', 'Giáp', 'Ất', 'Bính', 'Đinh', 'Mậu', 'Kỷ', 'Canh', 'Tân', 'Nhâm');
                                            $branches = array('Hợi', 'Tý', 'Sửu', 'Dần', 'Mão', 'Thìn', 'Tỵ', 'Ngọ', 'Mùi', 'Thân', 'Dậu', 'Tuất');
                                            $imagines = array('hoi.jpeg', 'ti.jpeg', 'suu.jpeg', 'dan.jpeg', 'meo.jpeg', 'thin.jpeg', 'ty.jpeg', 'ngo.jpeg', 'mui.jpeg', 'than.jpeg', 'dau.jpeg', 'tuat.jpeg');
                                            $yang -= 3;
                                            $stem = $yang % 10;
                                            $branch = $yang % 12;
                                            $yin = $stems[$stem] . " " . $branches[$branch];
                                            $img = 'img/' . $imagines[$branch];
                                        } else {
                                            switch($yang) {
                                                case '0' : {
                                                    $yin = 'Canh Thân';
                                                    $img = 'img/' . 'than.jpeg';
                                                } break;
                                                case '1' : {
                                                    $yin = 'Tân Dậu';
                                                    $img = 'img/' . 'dau.jpeg';
                                                } break;
                                                case '2' : {
                                                    $yin = 'Nhâm Tuất';
                                                    $img = 'img/' . 'tuat.jpeg';
                                                } break;
                                            }
                                        }
                                    } else $msg = 'Năm dương lịch phải lớn hơn 0';
                                } else $msg = 'Năm dương lịch không đúng định dạng';
                            } else $msg = 'Chưa nhập năm dương lịch';
                        }
                    ?>
                    <form action="baitap7.php" name="calendar" method="post">
                        <table style="background: cyan; margin: 20px auto">
                            <tr>
                                <th colspan="3" style="background: blue; padding: 10px; color: white;">
                                    TÍNH NĂM ÂM LỊCH
                                </th>
                            </tr>
                            <tr>
                                <td style="text-align: center;">
                                    Năm dương lịch:
                                </td>
                                <td>
                                    
                                </td>
                                <td style="text-align: center;">
                                    Năm âm lịch:
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="yang" value="<?php
                                        if(isset($_POST['yang'])) echo $_POST['yang'];
                                    ?>" size="16">
                                </td>
                                <td style="text-align: center;">
                                    <input type="submit" name="submit" value="=>" style="background: yellow; color: red;">
                                </td>
                                <td>
                                    <input type="text" name="yin" value="<?php
                                        if(isset($yin)) echo $yin; else echo "";
                                    ?>" size="16" readonly style="background: yellow; color: red;">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <img src="<?php
                                        if(isset($img)) echo $img; else echo "";
                                    ?>" alt="<?php if(isset($msg)) echo $msg; else echo "Nhập năm dương lịch"; ?>" width="357">
                                </td>
                            </tr>
                        </table>
                    </form>
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