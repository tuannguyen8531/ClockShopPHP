<!DOCTYPE html>
<html lang="en">
<?php 
    include '../config.php';
    if (isset($_GET['detail'])){
        $billId = $_GET['detail'];
        echo $billId;

        $sql = 'SELECT * FROM billdetails
        JOIN bills ON bills.billId = billdetails.billId
        JOIN watches ON watches.id = billdetails.watchId
        WHERE billdetails.billId = ? ';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $billId);
        $stmt->execute();
        $results = $stmt->get_result();



        if (isset($_GET['delete'])) {
            $watchesId = $_GET['delete'];  
            $delete = 'DELETE FROM watches WHERE id = ? ';
            $stmt = $conn->prepare($delete);
            $stmt->bind_param("i", $watchesId);
            
            if ($stmt->execute()) {
                echo '<script language="javascript">alert("Delete successfull!");</script>';
                header("Refresh: 0; URL=watches.php");
            }else{
                echo '<script language="javascript">alert("Delete failed!");</script>';
            } 
            
    
        }
        if (isset($_GET['searchWatches'])) {
            
            $id = $_GET['watches_id'];
            $name = $_GET['name_watches'];
     
            $sql = 'SELECT * FROM watches
                JOIN brands ON watches.brand = brands.brandId
                JOIN styles ON watches.style = styles.styleId
                JOIN movements ON watches.movement = movements.moveId
                JOIN categories ON watches.category = categories.cateId
                JOIN features ON watches.features = features.feaId
                JOIN types ON watches.type = types.typeId
                JOIN caseshapes ON watches.caseShape = caseshapes.caseId
                WHERE 1=1 ';
    
            if (!empty($id) and !empty($name)) {
                $sql.= ' and watches.id LIKE CONCAT("%", ?, "%") and watches.name LIKE CONCAT("%", ?, "%")';
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("is",$id, $name);   
            } else  {
                if (!empty($id)) {
                    $sql.= ' and watches.id LIKE CONCAT("%", ?, "%")';
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $id);       
                }
                       
                if (!empty($name)) {
                    $sql.= ' and watches.name LIKE CONCAT("%", ?, "%")';
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
                <form method="GET" action="watches.php">
                    <div class="row filter-row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group form-focus">
                                <input type="number" class="form-control floating" name="watches_id" value="<?php if(isset($id)) echo $id ?>">
                                <label class="focus-label">Watches ID</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group form-focus">
                                <input type="text" class="form-control floating" name="name_watches" value="<?php if (isset($name)) echo $name ?>">
                                <label class="focus-label">Name Watches</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <button type="submit" class="btn btn-success btn-block" name="searchWatches">Tìm kiếm</button>
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
                                        <th>Bill id</th>
                                        <th>Watch name</th>
                                        <th>Quanlity</th>
                                        <th>SoldPrice</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    while ($row = $results->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?= $row['billDetailId'] ?> </td>
                                            <td><?= $row['billId'] ?></td>
                                            <td><?= $row['name'] ?></td>
                                            <td><?= $row['quanlity'] ?></td>
                                            <td><?= $row['soldPrice'] ?></td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="edit_bill.php?edit=<?= $row['billDetailId']?>" ><i class="fa fa-pencil m-r-5"></i>Edit</a>
                                                        <a class="dropdown-item" href="detail_bill.php?detail=<?= $row['billDetailId']?>" ><i class="fa fa-eye m-r-5"></i>Detail</a>
                                                        <a class="dropdown-item" href="watches.php?delete=<?= $row['billDetailId']?>" onclick="return confirm('Are you sure want to delete?')"; ><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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