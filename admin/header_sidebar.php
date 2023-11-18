<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JomaShop</title>
    <style>
        .disabled {
            pointer-events: none;
            opacity: 0.6;
        }
    </style>
</head>
<?php
    session_start();

    if(!isset($_SESSION['username'])) {
		header('location: login.php');
	}

    include '../config.php';

    $sql = 'SELECT * FROM accounts
        JOIN authorities ON accounts.accAuthority = authorities.authId
        WHERE accounts.accUsername LIKE ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $_SESSION['username']);
    $stmt->execute();

    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    $_SESSION['auth'] = $admin['authId'];

    if($_SESSION['auth'] != 1) {
        $sql = 'SELECT * FROM accounts
            JOIN managers ON accounts.accId = managers.manAccount
            WHERE accounts.accUsername LIKE ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $_SESSION['username']);
        $stmt->execute();
        $result = $stmt->get_result();
        $manager = $result->fetch_assoc();
        $isAdmin = false;
    } else {
        $isAdmin = true;
    }
?>
<body>
    <!-- Header -->
    <div class="header">

        <!-- Logo -->
        <div class="header-left">
        <a href="index.php" class="logo">
            <img src="../dist/file/jomashop_logo.7c0762d85d36b44f0c59.png" style="width: 90%; height: auto;"  alt="">
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
                    <li class="submenu <?= $isAdmin ? '' : 'disabled' ?>">
                        <a href="#" class=""><i class="la la-user"></i> <span>Nhân Viên</span> <span class="menu-arrow" style="display: <?= $isAdmin ? 'block' : 'none' ?>;"></span></a>
                        <ul style="display: none;">
                            <li><a href="employee.php">Thông tin nhân viên</a></li>
                        </ul>
                    </li>
                    <li class="submenu <?= $isAdmin ? '' : 'disabled' ?>">
                        <a href="#" class=""><i class="la la-cube"></i> <span>Sản Phẩm</span> <span class="menu-arrow" style="display: <?= $isAdmin ? 'block' : 'none' ?>;"></span></a>
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
                    <li class="submenu <?= $isAdmin ? '' : 'disabled' ?>">
                        <a href="#" class=""><i class="la la-user"></i> <span>Khách Hàng</span> <span class="menu-arrow" style="display: <?= $isAdmin ? 'block' : 'none' ?>;"></span></a>
                        <ul style="display: none;">
                            <li><a href="customer.php">Thông tin khách hàng</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="#" class=""><i class="la la-money"></i> <span>Hóa Đơn</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="bill.php">Hóa đơn</a></li>
                            <li><a href="./bill_accept.php">Đang chờ duyệt</a></li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="./report.php"><i class="la la-area-chart"></i> <span>Thống kê</span></a>
                    </li>
                    <li class="menu-title">
                        <span>Tài khoản</span>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="la la-user"></i> <span>Hồ Sơ</span></a>
                    </li>
                    <li class="">
                        <a href="./login.php"><i class="la la-key"></i><span>Đăng xuất</span></a>
                    </li>
                    <li class="submenu <?= $isAdmin ? '' : 'disabled' ?>">
                        <a href="#"><i class="la la-book"></i><span>Bài tập</span><span class="menu-arrow" style="display: <?= $isAdmin ? 'block' : 'none' ?>;"></span></a>
                        <ul style="display: none;">
                            <li><a href="./baitap/php_form/baitap1.php">Bài tập</a></li>
                            <li><a href="information_member.php"></i>Thông tin cá nhân</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<!-- /Sidebar -->
</body>
</html>