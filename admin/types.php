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
							<h3 class="page-title">Category</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.php">Quản lý</a></li>
								<li class="breadcrumb-item active">Category</li>
							</ul>
						</div>
						<div class="col-auto float-right ml-auto">
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_types"><i class="fa fa-plus"></i>Thêm Types</a>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				<!-- Search Filter -->

				<!-- View Filter -->
				<?php
				include '../config.php';

				// Truy vấn SQL với phân trang
				$sql = 'SELECT * FROM types';

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
										<th>Type Name</th>
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
											<td><?= $row['typeName'] ?></td>

											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_type"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_type"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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

		<?php
		session_start();
		include 'config.php';

		$update = false;
		$id = "";
		$typeName = "";

		if (isset($_POST['add'])) {
			$typeName = $_POST['typename'];

			// Kiểm tra giá trị có được truyền vào hay không
			if (!empty($typeName)) {
				// Thực hiện truy vấn để thêm loại mới vào cơ sở dữ liệu
				$query = 'INSERT INTO types(typeName) VALUES (?)';
				$stmtInsert = $conn->prepare($query);
				$stmtInsert->bind_param("s", $typeName);
				$stmtInsert->execute();

				// Kiểm tra xem truy vấn có bị lỗi hay không
				if ($stmtInsert->errno) {
					echo "Error: " . $stmtInsert->error;
				} else {
					// Truy vấn thành công, thực hiện các hành động khác nếu cần
					header('location:index.php');
					$_SESSION['response'] = "Successfully Inserted to the database!";
					$_SESSION['res_type'] = "success";
				}
			} else {
				// Hiển thị thông báo nếu giá trị trống
				echo "Tên loại không được để trống!";
			}
		}

		if (isset($_GET['delete'])) {
			$id = $_GET['delete'];

			$query = "DELETE FROM types WHERE typeId=?";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("i", $id);
			$stmt->execute();

			header('location:index.php');
			$_SESSION['response'] = "Successfully Deleted!";
			$_SESSION['res_type'] = "danger";
		}

		if (isset($_GET['edit'])) {
			$id = $_GET['edit'];

			$query = "SELECT * FROM types WHERE typeId=?";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();

			$id = $row['typeId'];
			$typeName = $row['typeName'];

			$update = true;
		}

		if (isset($_POST['update'])) {
			$id = $_POST['id'];
			$typeName = $_POST['typename'];

			$query = "UPDATE types SET typeName=? WHERE typeId=?";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("si", $typeName, $id);
			$stmt->execute();

			$_SESSION['response'] = "Updated Successfully!";
			$_SESSION['res_type'] = "primary";
			header('location:index.php');
		}

		if (isset($_GET['details'])) {
			$id = $_GET['details'];
			$query = "SELECT * FROM types WHERE typeId=?";
			$stmt = $conn->prepare($query);
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();

			$typeId = $row['typeId'];
			$typeName = $row['typeName'];
		}
		?>
		<!-- Add Types -->
		<div id="add_types" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Thêm Types</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">Types Name<span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="typename">
									</div>
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn" name="add">Thêm</button>
								</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Edit -->
		<div id="edit_type" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Sửa Types</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post">
							<div class="form-group">
								<input type="hidden" name="id" id="edit_id" value="">
								<label class="col-form-label">Tên loại mới<span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="new_typename" id="new_typename" required>
							</div>
							<div class="submit-section">
								<button class="btn btn-primary submit-btn" name="update">Sửa</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Delete -->
		<div id="delete_type" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Xóa Types</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post">
							<p>Bạn có chắc chắn muốn xóa loại này?</p>
							<div class="submit-section">
								<button class="btn btn-danger submit-btn" name="delete">Xóa</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
	
	<!-- /Page Wrapper -->

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