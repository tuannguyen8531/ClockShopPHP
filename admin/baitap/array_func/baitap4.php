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
                        if(isset($_POST['search'])) {
                            $str = $_POST['str'];
                            $msg = "";
                            if(!empty($str) or $str='0') {
                                $isValid = true;
                                $n = $_POST['n'];
                                $array = createArray($str);
                                foreach($array as $x) {
                                    if(!filter_var($x, FILTER_VALIDATE_INT) and $x!='0') {
                                        $isValid = false;
                                        break;
                                    }
                                }
                                if($isValid) {
                                    if(!empty($n) or $n=="0") {
                                        if(filter_var($n, FILTER_VALIDATE_INT) or $n=="0") {
                                            $result = searchInArray($n, $array);
                                        } else $msg = 'Dữ liệu tìm không phải là số';
                                    } else $msg = 'Dữ liệu chưa được nhập';
                                } else $msg = "Mảng nhập vào không đúng định dạng";
                            } else $msg = "Mảng chưa được nhập";
                        }

                        function createArray($str) {
                            $array = explode(", ", $str);
                            return $array;
                        }

                        function searchInArray($n, $array) {
                            $isFound = 0;
                            $foundList = array();
                            $count = 0;
                            for($i=0; $i < sizeof($array); $i++) {
                                if($array[$i] == $n) {
                                    $isFound = 1;
                                    $foundList[$count] = $i;
                                    $count++;
                                }
                            }
                            if($isFound) {
                                $str = "";
                                foreach($foundList as $x) {
                                    $str .= $x . ", ";
                                }
                                $str = substr($str, 0, -2);
                                return "Đã tìm thấy " . $n . " tại vị trí " . $str . " trong mảng";
                            } else return "Không tim thấy " . $n . " trong mảng";
                        }
                    ?>
                    <form action="baitap4.php" name="calculator" method="post">
                        <table style="background-color: #9933FF; margin: 20px auto">
                            <tr>
                                <th colspan="2" style="background-color: #CC0066; color: white;">
                                    TÌM KIẾM
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    Nhập mảng:
                                </td>
                                <td>
                                    <input type="text" name="str" value="<?php
                                        if(isset($_POST['str'])) echo $_POST['str'];
                                    ?>" size="50">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Nhập số cần tìm:
                                </td>
                                <td>
                                    <input type="text" name="n" value="<?php
                                        if(isset($_POST['n'])) echo $_POST['n'];
                                    ?>" size="16">
                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>
                                    <input type="submit" name="search" style="background-color: lightyellow; padding: 10px" value="Tìm kiếm">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Mảng:
                                </td>
                                <td>
                                    <input type="text" value="<?php
                                        if(isset($str)) echo $str;
                                    ?>" size="50" readonly style="background: greenyellow;">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Kết quả tìm kiếm:
                                </td>
                                <td>
                                    <input type="text" name="result" value="<?php
                                        if(isset($result)) echo $result;
                                    ?>" size="50" readonly style="background: greenyellow; text-align: center;">
                                </td>
                            </tr>
                            <tr >
                                <td colspan="2" style="color: white; text-align: center;">(Các phần tử trong mảng sẽ cách nhau bằng dấu ", ")</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="color: red;">
                                    <?php if(isset($msg)) echo $msg; else echo ""; ?>
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