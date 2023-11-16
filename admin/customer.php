<!DOCTYPE html>
<html lang="en">
<?php
    include '../config.php';
    $sql = 'SELECT * FROM customers';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $results = $stmt->get_result();
    $count = 1;
    if (isset($_GET['searchCustomer'])) {
        
		$id = $_GET['cusId'];
		$name = $_GET['cusName'];
		
		$sql = 'SELECT * FROM customers WHERE 1=1 ';
		
		if (!empty($id) and !empty($name)) {
			$sql .= ' AND customers.cusId LIKE CONCAT("%", ?, "%") AND CONCAT(customers.cusFirstName, " ", customers.cusLastName) LIKE CONCAT("%", ?, "%")';
			
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("is", $id, $name);
		} else  {
            if (!empty($id)) {
                $sql.= ' AND customers.cusId LIKE CONCAT("%", ?, "%")';
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);       
            }
                   
            if (!empty($name)) {
                $sql.= ' AND  CONCAT(customers.cusFirstName, " ", customers.cusLastName) LIKE CONCAT("%", ?, "%")';
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
                            <h3 class="page-title">Khách hàng</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Quản lý</a></li>
                                <li class="breadcrumb-item active">Khách hàng</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Search Filter -->
                <form action="customer.php" method="get">
                    <div class="row filter-row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group form-focus">
                                <input type="text" class="form-control floating" name="cusId" value="<?php if (isset($id)) echo $id ?>">
                                <label class="focus-label">Khách hàng ID</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group form-focus">
                                <input type="text" class="form-control floating" name="cusName" value="<?php if(isset($name)) echo $name ?>">
                                <label class="focus-label">Họ tên khách hàng</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <button type="submit" class="btn btn-success btn-block" name="searchCustomer">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
                <!-- View Filter -->
                <div class="row" style="width: 100%;">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Company</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address 1</th>
                                        <th>Address 2</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Zip</th>
                                        <th>Country</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = $results->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?= $row['cusId']?></td>
                                            <td><?= $row['cusLastName'] ?></td>
                                            <td><?= $row['cusFirstName'] ?></td>
                                            <td><?= $row['cusCompany'] ?></td>
                                            <td><?= $row['cusPhone'] ?></td>
                                            <td><?= $row['cusEmail'] ?></td>
                                            <td><?= $row['cusAdd1'] ?></td>
                                            <td><?= $row['cusAdd2'] ?></td>
                                            <td><?= $row['cusCity'] ?></td>
                                            <td><?= $row['cusState'] ?></td>
                                            <td><?= $row['cusZip'] ?></td>
                                            <td><?= $row['cusCountry'] ?></td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item"  href="detail_customer.php?detail=<?= $row['cusId']?>"><i class="fa fa-pencil m-r-5"></i> Detail</a>
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