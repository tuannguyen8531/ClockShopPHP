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
                        $rowsPerPage = 5;
                        if (!isset($_GET['page'])) $_GET['page'] = 1;
                        $offset = ($_GET['page'] - 1) * $rowsPerPage;
                        $query = 'SELECT S.Ten_sua, HS.Ten_hang_sua, LS.Ten_loai, S.Trong_luong, S.Don_gia 
                                FROM sua S 
                                JOIN hang_sua HS 
                                ON S.Ma_hang_sua = HS.Ma_hang_sua 
                                JOIN loai_sua LS
                                ON S.Ma_loai_sua = LS.Ma_loai_sua
                                LIMIT ' . $offset . ', ' . $rowsPerPage . ';';
                        $stmt = $conn->prepare($query);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $numRows = $result->num_rows;
                        $maxPage = ceil($numRows / $rowsPerPage);
                    ?>
                    <style>
                        table, th, td {
                            border: 1px solid black;
                            border-collapse: collapse;
                        }
                        th, td {
                            padding: 20px;
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
                            text-align: center;
                        }
                    </style>
                    <div style='overflow-x: auto;'>
                        <table class="center">
                            <tr style='background:pink;'>
                                <th colspan='6'>
                                    <p class='center'>THÔNG TIN SỮA</p>
                                </th>
                            </tr>
                            <tr>
                                <th>Số TT</th>
                                <th>Tên sữa</th>
                                <th>Hãng sữa</th>
                                <th>Loại sữa</th>
                                <th>Trọng lượng</th>
                                <th>Đơn giá</th>
                            </tr>
                            <?php 
                                $temp = $_GET['page'] * $rowsPerPage;
                                if($temp <= $rowsPerPage) $num = 0;
                                else $num = $temp - $rowsPerPage;
                                if($result->num_rows != 0) {
                                    $color = '';
                                    while($row = $result->fetch_array()) {
                                        $num++;
                                        if($num % 2 == 0) {
                                            $color = 'black;';
                                            echo '<tr>';
                                        } else {
                                            $color = 'red;';
                                            echo '<tr style="background: lightyellow">';
                                        }
                                        echo '<td style="color: ' . $color . '">' . $num . '</td>';
                                        echo '<td style="color: ' . $color . '">' . $row[0] . '</td>';
                                        echo '<td style="color: ' . $color . '">' . $row[1] . '</td>';
                                        echo '<td style="color: ' . $color . '">' . $row[2] . '</td>';
                                        echo '<td style="color: ' . $color . '">' . $row[3] . '</td>';
                                        echo '<td style="color: ' . $color . '">' . $row[4] . '</td>';
                                        echo '</tr>';
                                    }
                                }
                                $re = 'SELECT * FROM sua';
                                $stmt = $conn->prepare($re);
                                $stmt->execute();
                                $re = $stmt->get_result();
                                $numRows = $re->num_rows;
                                $maxPage = floor($numRows/$rowsPerPage) + 1;
                            ?>
                        </table>
                    </div>
                    <div class="center">
                        <?php 
                            echo "<a  href=" . $_SERVER['PHP_SELF'] . "?page=" . (1) . "><<</a> "; 
                            if ($_GET['page'] > 1) {
                                echo "<a  href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . "><</a> "; 
                            }
                            for ($i = 1 ; $i <= $maxPage ; $i++)
                            {
                                if ($i == $_GET['page'])
                                {
                                    echo '<b class="center">'.$i.'</b> '; 
                                }
                                else {
                                    echo "<a  href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . "> " . $i . "</a> ";
                                }
                            }
                            if ($_GET['page'] < $maxPage) {
                                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . ">></a>";  
                            }
                            echo "<a  href=" . $_SERVER['PHP_SELF'] . "?page=" . ($maxPage) . ">>></a> ";
                        ?>
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