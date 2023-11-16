<!DOCTYPE html>
<html lang="en">
<?php 
	include '../config.php';
    if (isset($_GET['detail'])) {
        $manId = $_GET['detail'];
        $sql = 'SELECT * FROM managers
        JOIN accounts ON managers.manId = accounts.accId
        JOIN authorities ON authorities.authId = accounts.accAuthority 
        WHERE manId = ? ';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $manId);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

		$firstName = $result['manFirstName'];
		$lastName = $result['manLastName'];
		$phone = $result['manPhone'];
		$authority = $result['authName'];		
	}
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
			<!-- Select2 CSS -->
	<link rel="stylesheet" href="assets/css/select2.min.css">

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
							<h3 class="page-title">Nhân viên</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Quản lý</a></li>
								<li class="breadcrumb-item active">Nhân viên</li>
							</ul>
						</div>
						<div class="col-auto float-right ml-auto">
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i>Thêm nhân viên</a>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-view">
                                    <div class="profile-img-wrap">
                                    </div>
                                    <div class="profile-basic">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="profile-info-left">
                                                    <h3 class="user-name m-t-0 mb-0"><?=$lastName." ". $firstName?></h3>
                                                    <h5 class="text-muted">&nbsp;</h5>
                                                    <div class="staff-id">Phone : <?=$phone?></div>
                                                    <medium class="text-muted">&nbsp;</medium>
                                                    <div class="small doj text-muted">&nbsp;</div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="personal-info">
                                                    <li>
                                                        <div class="title">First name:</div>
                                                        <div class="text"><a href=""><?=$firstName?></a></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Last name:</div>
                                                        <div class="text"><a href=""><?=$lastName?></a></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Position:</div>
                                                        <div class="text"><?=$authority?></div>
                                                    </li>
            
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro-edit"><a class="edit-icon" href="edit_employee.php?edit=<?= $manId ?>"><i class="fa fa-pencil"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
                <div class="submit-section">
                    <a class="btn btn-dark submit-btn mr-4 " href="employee.php">Back</a>
                </div>
			</div>
		</div>
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