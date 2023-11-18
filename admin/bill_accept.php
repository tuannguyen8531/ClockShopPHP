<!DOCTYPE html>
<html lang="en">
<?php 
    include '../config.php';
    $sql = 'SELECT * FROM bills
        JOIN customers ON customers.cusId = bills.billCustomer
        WHERE bills.billStatus = 1';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->get_result();

    $man = 1;
    if(isset($_POST['save'])) {
        $man = $_POST['man'];
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
                            <h3 class="page-title">Duyệt đơn</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Quản lý</a></li>
                                <li class="breadcrumb-item active">Duyệt đơn</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Search Filter -->
                
                <form method="post">
                    <div class="row filter-row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group form-focus select-focus">
                                <select class="select floating" name="man" <?= $isAdmin ? '' : 'disabled' ?>>
                                    <?php
                                        $sqlMan = 'SELECT * FROM managers';
                                        $stmt = $conn->prepare($sqlMan);
                                        $stmt->execute();
                                        $resMan = $stmt->get_result();
                                    ?>
                                    <?php while($row = $resMan->fetch_assoc()) { ?>
                                        <option value="<?= $row['manId'] ?>" <?= (((!$isAdmin) and ($manager['manId']==$row['manId'])) or ($isAdmin && $man==$row['manId']))  ? 'selected' : '' ?>><?=  $row['manLastName'] . ' ' . $row['manFirstName'] ?></option>
                                    <?php } ?>
                                </select>
                                <label class="focus-label">Nhân viên đang duyệt</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-2">
                            <button type="submit" class="btn btn-success btn-block" name="save" <?= $isAdmin ? '' : 'disabled' ?>>Lưu</button>
                        </div>
                    </div>
                </form>

                <!-- View Filter -->

                <div style="margin: 30px auto;"></div>

                <!-- Pagination -->
                <div class="row" style="width: 100%;">
                    <div class="col-md-12">
                        <div class="table-responsive" style="overflow-x: hidden;">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bill ID</th>
                                        <th>Ordered Date</th>
                                        <th>Delivered Date</th>
                                        <th>Customer</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $index = 1;
                                        if(!$isAdmin) {
                                            $man = $manager['manId'];
                                        }
                                    ?>
                                    <?php while($row = $res->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?= $index ?></td>
                                            <td><?= $row['billId'] ?></td>
                                            <td><?= $row['billOrderDate'] ?></td>
                                            <td><?= ($row['billDeliveryDate']!='0000-00-00') ? $row['billDeliveryDate'] : '' ?></td>
                                            <td><?= $row['cusFirstName'] . ' ' . $row['cusLastName'] ?></td>
                                            <td><?= $row['billTotal'] ?></td>
                                            <td>Ordered/Waiting</td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="./action.php?act=accept&id=<?= $row['billId'] ?>&man=<?= $man ?>"><i class="fa fa-check m-r-5"></i>Accept</a>
                                                        <a class="dropdown-item" href="./action.php?act=cancel&id=<?= $row['billId'] ?>&man=<?= $man ?>"><i class="fa fa-ban m-r-5"></i>Cancel</a>
                                                        <a class="dropdown-item" href="detail_bill.php?detail=<?= $row['billId']?>"><i class="fa fa-eye m-r-5"></i>Detail</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
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