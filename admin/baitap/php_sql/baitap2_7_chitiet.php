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
                        include 'bt_config.php';
                        if(isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $query = 'SELECT * FROM sua WHERE Ma_sua = ?';
                            $stmt = $conn->prepare($query);
                            $stmt->bind_param('s', $id);
                            $stmt->execute();
                            $get = $stmt->get_result();
                            $result = $get->fetch_assoc();
                        }
                    ?>
                    <style>
                        table, th, td {
                            border: 1px solid black;
                        }
                        th, td {
                            padding: 5px;
                        }

                        #title_kh th {
                            color: red;
                            font-weight: bold;
                        }
                        h1 {
                            font-family: cursive;
                        }
                        .center {
                            margin-left: auto;
                            margin-right: auto;
                            width: 35%;
                        }
                    </style>
                    <div>
                        <table class="center">
                            <tr style='background:pink;'>
                                <th colspan="5" style="color: red;">
                                    <?= $result['Ten_sua'] ?>
                                </th>
                            </tr>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="./Hinh_sua/<?= $result['Hinh'] ?>" alt="">
                                    </td>
                                    <td>
                                        <strong>Thành phần dinh dưỡng:</strong> <br>
                                        <?= $result['TP_Dinh_Duong'] ?> <br>
                                        <p></p>
                                        <strong>Lợi ích:</strong> <br>
                                        <?= $result['Loi_ich'] ?> <br>
                                        <p style="text-align: right; width: 100%;"><strong>Trọng lượng</strong>: <?= $result['Trong_luong'] ?> gr - <strong>Đơn giá</strong>: <?= $result['Don_gia'] ?> VND</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: right;">
                                        <a href="javascript:window.history.back(-1);">Quay về</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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