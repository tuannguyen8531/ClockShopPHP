<!DOCTYPE html>
<html lang="en">
<?php 
    include '../config.php';
    $sql = 'SELECT * FROM bills
    JOIN customers ON customers.cusId = bills.billCustomer
    JOIN statuses ON statuses.statusId  = bills.billStatus 
    JOIN managers ON managers.manId = bills.billManager';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $results = $stmt->get_result();
   
    if (isset($_GET['delete'])) {
        $billId = $_GET['delete'];  
        $delete = 'DELETE FROM bills WHERE billId = ? ';
        $stmt = $conn->prepare($delete);
        $stmt->bind_param("i", $billId);
        
        if ($stmt->execute()) {
            echo '<script language="javascript">alert("Delete successfull!");</script>';
            header("Refresh: 0; URL=bill.php");
        }else{
            echo '<script language="javascript">alert("Delete failed!");</script>';
        } 
        

    }
    if (isset($_GET['searchBill'])) {
        
        $id = $_GET['bill_id'];
        $statuses = $_GET['statuses'];
        echo $id."".$statuses;
 
        $sql = 'SELECT * FROM bills 
        JOIN customers ON customers.cusId = bills.billCustomer
        JOIN statuses ON statuses.statusId  = bills.billStatus 
        JOIN managers ON managers.manId = bills.billManager  
        WHERE 1=1 ';

        if (!empty($id) and !empty($statuses)) {
            $sql.= ' and bills.billId  LIKE CONCAT("%", ?, "%") and bills.billStatus LIKE CONCAT("%", ?, "%")';
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii",$id, $statuses);   
        } else  {
            if (!empty($id)) {
                $sql.= ' and bills.billId LIKE CONCAT("%", ?, "%")';
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);       
            }
                   
            if (!empty($statuses)) {
                $sql.= ' and bills.billStatus LIKE CONCAT("%", ?, "%")';
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $statuses);       
            }
        }   

        if ((empty($id) and empty($statuses))) {
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
                            <h3 class="page-title">Watches</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Quản lý</a></li>
                                <li class="breadcrumb-item active">Bills</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Search Filter -->
                <form method="GET" action="bill.php">
                    <div class="row filter-row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group form-focus">
                                <input type="number" class="form-control floating" name="bill_id" value="<?php if(isset($id)) echo $id ?>">
                                <label class="focus-label">Bill ID</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group form-focus select-focus">
                                    <select class="select floating" name="statuses"> 
                                        <option value=""> Select status</option>
                                        <?php
                                            $status = 'SELECT * FROM statuses';
                                            $stmt = $conn->prepare($status);
                                            $stmt->execute(); 
                                            $result = $stmt->get_result();
                                            while ($rows = $result->fetch_assoc()) { 
                                                if ($statuses==$rows['statusId']) {
                                                    $selected = "selected";
                                                } else $selected="";
                                                echo "<option value='{$rows['statusId']}' $selected >{$rows['statusName']}</option>";
                                            }
                                        ?>
                                    </select>
                                    <label class="focus-label">Status</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <button type="submit" class="btn btn-success btn-block" name="searchBill">Tìm kiếm</button>
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
                                        <th>OrderDate</th>
                                        <th>DeliveryDate</th>
                                        <th>Customer</th>
                                        <th>Manager</th>
                                        <th>Status</th>
                                        <th>Revice Address</th>
                                        <th>Total</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    while ($row = $results->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?= $row['billId'] ?> </td>
                                            <td><?= $row['billOrderDate'] ?></td>
                                            <td><?= ($row['billDeliveryDate']!='0000-00-00') ? $row['billDeliveryDate'] : '' ?></td>
                                            <td><?= $row['cusLastName']." ".$row['cusFirstName'] ?></td>
                                            <td><?= $row['manLastName']." ".$row['manFirstName'] ?></td>
                                            <td class="<?php switch ($row['statusId']) {
                                                case 1: echo "text-black";break;
                                                case 2: echo "text-blue";break;
                                                case 3: echo "text-warning";break;
                                                case 4: echo "text-success";break;
                                                case 5: echo "text-danger";break;

                                            }  ?>" ><?= $row['statusName'] ?> </td>
                                            <td><?= $row['billRevAdd'] ?></td>
                                            <td><?= $row['billTotal'] ?></td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="edit_bill.php?edit=<?= $row['billId']?>" ><i class="fa fa-pencil m-r-5"></i>Edit</a>
                                                        <a class="dropdown-item" href="detail_bill.php?detail=<?= $row['billId']?>" ><i class="fa fa-eye m-r-5"></i>Detail</a>
                                                        <a class="dropdown-item" href="bill.php?delete=<?= $row['billId']?>" onclick="return confirm('Are you sure want to delete?')"; ><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
        
    </div>

            <!-- Add Watch Modal -->
           
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
            <script>
</script>


</body>

</html>