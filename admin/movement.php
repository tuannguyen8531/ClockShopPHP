<!DOCTYPE html>
<html lang="en">

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
							<h3 class="page-title">Movement</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Quản lý</a></li>
								<li class="breadcrumb-item active">Movement</li>
							</ul>
						</div>
						<div class="col-auto float-right ml-auto">
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_movement"><i class="fa fa-plus"></i>Thêm Movement</a>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				<!-- Search Filter -->

				<!-- View Filter -->
				<?php
				include '../config.php';

				// Truy vấn SQL với phân trang
				$sql = 'SELECT * FROM movements';

				$stmt = $conn->prepare($sql);
				$stmt->execute();
				$result = $stmt->get_result();

				?>
				<div class="row" style="width: 100%;">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table datatable">
								<thead>
									<tr>
										<th>No</th>
										<th>Movement Name</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$count = 1;
									while ($row = $result->fetch_assoc()) {
									?>
										<tr>
											<td><?= $count++ ?></td>
											<td><?= $row['moveName'] ?></td>

											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_move"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_move"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Add Employee Modal -->

		<!-- Edit Employee Modal -->


		<!-- Delete Employee Modal -->

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