<!DOCTYPE html>
<html lang="en">
<?php 
	include '../config.php';
	$sql = 'SELECT * FROM managers';
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$results = $stmt->get_result();

	if (isset($_POST['add_employee'])) {
		$firstName = $_POST['firstname'];
		$lastName = $_POST['lastname'];
		$phone = $_POST['phone'];
		$userName = $_POST['accUsername'];
		$passWord = $_POST['accPassword'];
		$authority = $_POST['accAuthority'];
		$errUserName="";
		$errPassword="";
		// Kiểm tra xem giá trị của username đã tồn tại trong bảng accounts chưa
			$sql = 'SELECT * FROM accounts WHERE accUsername = ? ';
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("s", $userName);
			$stmt->execute();
			$result = $stmt->get_result();


		if ($result->num_rows != 0) {	
			$errUserName = "Username already exists";
			echo '<script language="javascript">alert("Failed to add employee!");</script>';
		} else {
			$option = [
                'cost' => 12,
            ];
        	$passHash = password_hash($passWord, PASSWORD_DEFAULT, $option);    
			$sql = 'INSERT INTO accounts(accUsername, accPassword, accAuthority) VALUES (?, ?, ?)';
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("sss", $userName, $passHash, $authority);
			$stmt->execute();

			$sql = 'SELECT * FROM accounts WHERE accUsername LIKE ?';
			$stmt = $conn->prepare($sql);
			$stmt->bind_param('s', $userName);
			$stmt->execute();
			$result = $stmt->get_result()->fetch_assoc();
			$id = $result['accId'];

			$sql = 'INSERT INTO managers (manFirstName, manLastName, manPhone, manAccount) VALUES (?, ?, ?, ?)';
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("sssi", $firstName, $lastName, $phone, $id );
			$stmt->execute();
			echo '<script language="javascript">alert("Employee added successfully!");</script>';
			header("Refresh: 1; URL=employee.php");
		}
		
	}

	if (isset($_GET['delete'])) {
        $manId = $_GET['delete'];

		$sql = 'SELECT * FROM managers WHERE manId = ?';
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("i", $manId);
		$stmt->execute();
		$result = $stmt->get_result()->fetch_assoc();
		$manAcc = $result['manAccount'];


        $delete = 'DELETE FROM managers WHERE manId = ? ';
        $stmt = $conn->prepare($delete);
        $stmt->bind_param("i", $manId);
		$stmt->execute();

	
		$sql = 'DELETE FROM accounts WHERE accId = ?';
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("i", $manAcc);
     
        if ($stmt->execute()) {
            echo '<script language="javascript">alert("Delete successfull!");</script>';

            header("Refresh: 0; URL=employee.php");
        }else{
            echo '<script language="javascript">alert("Delete failed!");</script>';
        } 
        

    }

	if (isset($_GET['searchEmployee'])) {
        
		$id = $_GET['manId'];
		$name = $_GET['name'];
		
		$sql = 'SELECT * FROM managers WHERE 1=1 ';
		
		if (!empty($id) and !empty($name)) {
			$sql .= ' AND managers.manId LIKE CONCAT("%", ?, "%") AND CONCAT(managers.manFirstName, " ", managers.manLastName) LIKE CONCAT("%", ?, "%")';
			
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("is", $id, $name);
		} else  {
            if (!empty($id)) {
                $sql.= ' AND managers.manId LIKE CONCAT("%", ?, "%")';
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);       
            }
                   
            if (!empty($name)) {
                $sql.= ' AND  CONCAT(managers.manFirstName, " ", managers.manLastName) LIKE CONCAT("%", ?, "%")';
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $name);       
            }
        }   

        if ((empty($id) and empty($name))) {
            $stmt = $conn->prepare($sql);
        }        
        $stmt->execute();
        $results = $stmt->get_result();

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

				<!-- Search Filter -->
			<form method="GET" action="employee.php">
				<div class="row filter-row">
					<div class="col-sm-6 col-md-3">
						<div class="form-group form-focus">
							<input type="text" class="form-control floating" name="manId" value="<?php if (isset($manId)) echo $manId ?>">
							<label class="focus-label">Nhân viên ID</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group form-focus">
							<input type="text" class="form-control floating" name="name" value="<?php if (isset($name)) echo $name ?>">
							<label class="focus-label">Họ tên nhân viên</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<button type="submit" class="btn btn-success btn-block" name="searchEmployee">Tìm kiếm</button>
					</div>
				</div>
			</form>
				<!-- View Filter -->
				<!-- Pagination -->
				<div class="row" style="width: 100%;">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table datatable">
								<thead>
									<tr>
										<th>Id</th>
										<th>Last Name</th>
										<th>First Name</th>
										<th>Phone</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$count = 1;
									while ($row = $results->fetch_assoc()) {
									?>
										<tr>
											<td><?= $row['manId']?></td>
											<td><?= $row['manLastName'] ?></td>
											<td><?= $row['manFirstName'] ?></td>
											<td><?= $row['manPhone'] ?></td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="detail_employee.php?detail=<?= $row['manId']?>" ><i class="fa fa-eye m-r-5"></i>Detail</a>
                                                        <a class="dropdown-item" href="employee.php?delete=<?= $row['manId']?>" onclick="return confirm('Are you sure want to delete?')"; ><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
		<div id="add_employee" class="modal custom-modal fade" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Employee</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post" action="employee.php">
							<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
										<label class="col-form-label">Fist Name<span class="text-danger">*</span></label>
										<input class="form-control" type="text" required name="firstname" value="<?php if (isset($firstName)) echo $firstName;?>">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">Last Name<span class="text-danger">*</span></label>
										<input class="form-control" type="text"  required name="lastname" value="<?php if (isset($lastName)) echo $lastName;?>">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">Phone<span class="text-danger">*</span></label>
										<input class="form-control" type="number" required name="phone" value="<?php if (isset($phone)) echo $phone;?>">
									</div>
								</div>			
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">UserName<span class="text-danger">*</span></label>
										<input class="form-control" type="text" required name="accUsername" value="<?php if (isset($userName)) echo $userName;?>">
										<medium class="text-danger"><?php if (isset($errUserName)) echo $errUserName?></medium>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">Password<span class="text-danger">*</span></label>
										<input class="form-control" type="password" required name="accPassword">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-form-label">Vai trò</label>
										<select class="select" name="accAuthority">
											<option value="2" <?php if (isset($authority) and $authority == 2 ) echo "selected" ?>>Nhân viên</option>
											<option value="1" <?php if (isset($authority) and $authority == 1 ) echo "selected" ?>>Admin</option>
										</select>
									</div>
								</div>
							</div>
							<div class="submit-section">
								<button class="btn btn-primary submit-btn" type="submit" name="add_employee">Thêm</button>
							</div>
						</form>
					</div>
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