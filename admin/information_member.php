<!DOCTYPE html>
<html lang="en">
<?php
    include '../config.php';
 
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <title>JomaShop</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">

    <!-- Chart CSS -->
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <?php include 'header_sidebar.php' ?>
        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Thành viên</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Bài tập</a></li>
                                <li class="breadcrumb-item active">Thông tin cá nhân</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <!-- /Page Header -->
                <!-- View Filter -->
                <div class="row staff-grid-row col-xl-8 m-auto">
						<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-6">
							<div class="profile-widget">
								<div class="profile-img">
									<a href="detail_member.php?detail=1"class="avatar"><img alt="" src="assets/img/profiles/tuan.jpg"></a>
								</div>
								<div class="dropdown profile-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
								</div>
								<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Nguyễn Dương Anh Tuấn</a></h4>
								<h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">62133366</a></h5>
								<div class="small text-muted">Nhóm trưởng</div>
								<a href="detail_member.php?detail=1"class=" btn btn-white btn-sm m-t-10">View Profile</a>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-6">
							<div class="profile-widget">
								<div class="profile-img">
									<a href="detail_member.php?detail=2"class="avatar"><img alt="" src="assets/img/profiles/huy.jpg"></a>
								</div>
								<div class="dropdown profile-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
								</div>
								<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Nguyễn Sanh Quốc Huy</a></h4>
								<h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">62130757</a></h5>
								<div class="small text-muted">Thành viên</div>
								<a href="detail_member.php?detail=2" class="btn btn-white btn-sm m-t-10">View Profile</a>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-6">
							<div class="profile-widget">
								<div class="profile-img">
									<a href="detail_member.php?detail=3"class="avatar"><img src="assets/img/profiles/khoa.jpg" alt=""></a>
								</div>
								<div class="dropdown profile-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
								</div>
								<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Nguyễn Đăng Khoa</a></h4>
								<h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">62130863</a></h5>
								<div class="small text-muted">Thành viên</div>
								<a href="detail_member.php?detail=3"class="btn btn-white btn-sm m-t-10">View Profile</a>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-6">
							<div class="profile-widget">
								<div class="profile-img">
									<a href="detail_member.php?detail=4"class="avatar"><img src="assets/img/profiles/san.jpg" alt=""></a>
								</div>
								<div class="dropdown profile-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
								</div>
								<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Moul Sàn</a></h4>
								<h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">62131775</a></h5>
								<div class="small text-muted">Thành viên</div>
								<a href="detail_member.php?detail=4"class="btn btn-white btn-sm m-t-10">View Profile</a>
							</div>
						</div>
					</div>


            <!-- Add customer Modal -->

            <!-- Edit customer Modal -->

            <!-- Delete customer Modal -->

        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="./assets/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap Core JS -->
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="./assets/js/jquery.slimscroll.min.js"></script>

    <!-- Select2 JS -->
    <script src="./assets/js/select2.min.js"></script>

    <!-- Datetimepicker JS -->
    <script src="./assets/js/moment.min.js"></script>
    <script src="./assets/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Datatable JS -->
    <script src="./assets/js/jquery.dataTables.min.js"></script>
    <script src="./assets/js/dataTables.bootstrap4.min.js"></script>

    <!-- Custom JS -->
    <script src="./assets/js/app.js"></script>

    

</body>

</html>