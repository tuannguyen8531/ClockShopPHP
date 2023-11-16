<!DOCTYPE html>
<html lang="en">
<?php 
include '../config.php';
        if (isset($_GET['detail'])) {
            $WatchesId = $_GET['detail'];
            echo $WatchesId;
            $sql = 'SELECT * FROM watches
            JOIN brands ON watches.brand = brands.brandId
            JOIN styles ON watches.style = styles.styleId
            JOIN movements ON watches.movement = movements.moveId
            JOIN categories ON watches.category = categories.cateId
            JOIN features ON watches.features = features.feaId
            JOIN types ON watches.type = types.typeId
            JOIN caseshapes ON watches.caseShape = caseshapes.caseId
            WHERE watches.id = ? ';
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $WatchesId);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();
    
            $brandName = $result['brandName'];
            $moveName = $result['moveName'];
            $caseName = $result['caseName'];
            $typeName = $result['typeName'];
            $feaName = $result['feaName'];
            $styleName = $result['styleName'];
            $cateName = $result['cateName'];
    
            $name = $result['name'];
            $price = $result['price'];
            $gender = $result['gender'];
            $model = $result['model'];
            $engine = $result['engine'];
            $power = $result['powerReserve'];
            $sale = $result['sale'];
            $instock = $result['instock'];
            $watchLabel = $result['watchLabel'];
            $caseSize = $result['caseSize'];
            $caseMaterial = $result['caseMaterial'];
            $caseThickness = $result['caseThickness'];
            $caseBack = $result['caseBack'];
            $bandMaterial = $result['bandMaterial'];
            $bandType = $result['bandType'];
            $bandColor = $result['bandColor'];
            $bandLength = $result['bandLength'];
            $bandWidth = $result['bandWidth'];
            
            $clasp = $result['clasp'];
            $dialColor = $result['dialColor'];
            $crystal = $result['crystal'];
            $hands = $result['hands'];
            $dialMarkers = $result['dialMarkers'];
            $secondMarker = $result['secondMarkers'];
            $lumine = $result['lumine'];
            $bezel = $result['bezel'];
            $bezelColor = $result['bezelColor'];
            $bezelMaterial = $result['bezelMaterial'];
            $crown = $result['crown'];
            $waterRes = $result['waterRes'];
            $calendar = $result['calendar'];
           
            $function = $result['func'];
            $warranty = $result['warranty'];
            $department = $result['department'];
            $description = $result['description'];
    
            $main_img = $result['img1'];
            echo $main_img;
            // $upload_main_img = "../img/watches/".$main_img;
    
            $sub1_img = $result['img2'];
            // $upload_sub1_img = "../img/watches/".$sub1_img;
    
            $sub2_img = $result['img3'];
            // $upload_sub2_img = "../img/watches/".$sub2_img;             
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
            <div class="content container-fluid" style="padding: 10px 30px 30px 30px;">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Watches</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Quản lý</a></li>
                                <li class="breadcrumb-item active">Watches</li>
                            </ul>
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
                                        <div class="profile-img">
                                            <a href="#"><img alt="" src="../img/watches/<?= $main_img ?>"></a>
                                        </div>
                                    </div>
                                    <div class="profile-basic">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="profile-info-left">
                                                    <h3 class="user-name m-t-0 mb-0"><?=$name?></h3>
                                                    <h5 class="text-muted"><?= $price?>$</h5>
                                                    <medium class="text-muted"><?= $brandName?></medium>           
                                                    <div class="staff-id">Model : <?=$model?></div>
                                                    <medium class="text-muted"><?= $typeName?></medium>
                                                    <div class="small doj text-muted">Instock : <?=$instock?> </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="personal-info">
                                                    <li>
                                                        <div class="title">Category:</div>
                                                        <div class="text"><a href=""><?=$cateName?></a></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Movement:</div>
                                                        <div class="text"><a href=""><?=$moveName?></a></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Case shape:</div>
                                                        <div class="text"><?=$caseName?></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Style:</div>
                                                        <div class="text"><?=$styleName?></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Band material:</div>
                                                        <div class="text"><?=$bandMaterial?></div>
                                                    </li>
                                                    <li>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro-edit"><a class="edit-icon" href="./edit_watches.php?edit=<?= $result['id']?>"><i class="fa fa-pencil"></i></a></div>
                                </div>
                            </div>
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

</body>

</html>