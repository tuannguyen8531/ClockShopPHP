<!DOCTYPE html>
<html lang="en">
<?php 
    include '../config.php';
    $sql = 'SELECT * FROM watches
    JOIN brands ON watches.brand = brands.brandId
    JOIN styles ON watches.style = styles.styleId
    JOIN movements ON watches.movement = movements.moveId
    JOIN categories ON watches.category = categories.cateId
    JOIN features ON watches.features = features.feaId
    JOIN types ON watches.type = types.typeId
    JOIN caseshapes ON watches.caseShape = caseshapes.caseId';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $results = $stmt->get_result();
    $count = 1;

    $file_name="";
    if (isset($_POST['button_add_watches'])) {
        $brands = $_POST['brands'];
        $movements = $_POST['movements'];
        $caseshapes = $_POST['caseshapes'];
        $types = $_POST['types'];
        $features = $_POST['features'];
        $styles = $_POST['styles'];
        $categories = $_POST['categories'];

        $name = $_POST['name'];
        $price = $_POST['price'];
        $gender = $_POST['gender'];
        $model = $_POST['model'];
        $engine = $_POST['engine'];
        $power = $_POST['power'];
        $sale = $_POST['sale'];
        $instock = $_POST['instock'];
        $watchLabel = $_POST['watchlabel'];
        $caseSize = $_POST['casesize'];
        $caseMaterial = $_POST['casematerial'];
        $caseThinkness = $_POST['casethinkness'];
        $caseBack = $_POST['caseback'];
        $bandMaterial = $_POST['bandmaterial'];
        $bandType = $_POST['bandtype'];
        $bandColor = $_POST['bandcolor'];
        $bandLength = $_POST['bandlength'];
        $bandWidth = $_POST['bandwidth'];
        
        $clasp = $_POST['clasp'];
        $dialColor = $_POST['dialcolor'];
        $crystal = $_POST['crystal'];
        $hands = $_POST['hands'];
        $dialMarkers = $_POST['dialmarkers'];
        $secondMarker = $_POST['secondmarker'];
        $lumine = $_POST['lumine'];
        $bezel = $_POST['bezel'];
        $bezelColor = $_POST['bezelcolor'];
        $bezelMaterial = $_POST['bezelmaterial'];
        $crown = $_POST['crown'];
        $waterRes = $_POST['waterres'];
        $calendar = $_POST['calendar'];
       
        $function = $_POST['function'];
        $warranty = $_POST['warranty'];
        $department = $_POST['department'];
        $description = $_POST['description'];

        $main_img = $_FILES['main_img']['name'];
        $upload_main_img = "../img/watches/".$main_img;

        $sub1_img = $_FILES['sub1_img']['name'];
        $upload_sub1_img = "../img/watches/".$sub1_img;

        $sub2_img = $_FILES['sub2_img']['name'];
        $upload_sub2_img = "../img/watches/".$sub2_img;

        if (!empty($main_img) and !empty($name) and !empty($model) and !empty($price) and (!empty($instock) or $instock==0) and !empty($description) ) {
            $insertWatches = 'INSERT INTO watches (`name`, `brand`, `description`, `price`, `model`, `gender`, `sale`, `caseSize`, `img1`, `img2`, `img3`, `instock`, `watchLabel`, `movement`, `engine`, `powerReserve`, `caseThickness`, `caseMaterial`, `caseShape`, `caseBack`, `bandMaterial`, `bandType`, `bandColor`, `bandLength`, `bandWidth`, `clasp`, `dialColor`, `type`, `crystal`, `hands`, `dialMarkers`, `secondMarkers`, `lumine`, `bezel`, `bezelColor`, `bezelMaterial`, `crown`, `waterRes`, `calendar`, `func`, `features`, `style`, `warranty`, `department`, `category`)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
            $stmt = $conn->prepare($insertWatches);
            $stmt->bind_param("sisdsiddsssisisidsissssddssissssssssssssiissi", $name, $brands, $description, $price, $model, $gender, $sale, $caseSize, $main_img,$sub1_img, $sub2_img, $instock, $watchLabel, $movements, $engine, $power, $caseThinkness, $caseMaterial, $caseshapes, $caseBack, $bandMaterial, $bandType, $bandColor, $bandLength, $bandWidth, $clasp, $dialColor, $types, $crystal, $hands, $dialMarkers, $secondMarker, $lumine, $bezel, $bezelColor, $bezelMaterial, $crown, $waterRes, $calendar, $function, $features, $styles, $warranty, $department, $categories);
            if ($stmt->execute()) {
                move_uploaded_file($_FILES['main_img']['tmp_name'], $upload_main_img);
                move_uploaded_file($_FILES['sub1_img']['tmp_name'], $upload_sub1_img);
                move_uploaded_file($_FILES['sub2_img']['tmp_name'], $upload_sub2_img);
                echo '<script language="javascript">alert("Watches added successfully!");</script>';
                header("Refresh: 2; URL=watches.php");
            }else{
                echo '<script language="javascript">alert("Failed to add watches!");</script>';
            }  
        }  else {
            echo '<script language="javascript">alert("Failed to add watches!");</script>';
        }               
    }
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

        <!-- Header -->
        <div class="header">

            <!-- Logo -->
            <div class="header-left">
                <a href="index.php" class="logo">
                    <!-- <img src="../dist/file/jomashop_logo.7c0762d85d36b44f0c59.png" style="width: 90%; height: auto;"  alt=""> -->
                    <img src="assets/img/logo.png" width="40" height="40" alt="">
                </a>
            </div>
            <!-- /Logo -->

            <a id="toggle_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <!-- Header Title -->
            <div class="page-title-box">
                <h3>JomaShop</h3>
            </div>
            <!-- /Header Title -->
        </div>
        <!-- /Header -->

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>JomaShop</span>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-dashboard"></i> <span>Quản lý</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="index.php">Quản trị Admin</a></li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#" class=""><i class="la la-user"></i> <span>Nhân Viên</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="employee.php">Thông tin nhân viên</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#" class=""><i class="la la-cube"></i> <span>Sản Phẩm</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li>
                                    <a href="./watches.php"> Watches</a>
                                </li>
                                <li>
                                    <a href="./category.php">Category</a>
                                </li>
                                <li>
                                    <a href="./types.php">Types</a>
                                </li>
                                <li>
                                    <a href="./movement.php">Movement</a>
                                </li>
                                <li>
                                    <a href="./features.php">Features</a>
                                </li>
                                <li>
                                    <a href="./caseshape.php">CaseShape</a>
                                </li>
                                <li>
                                    <a href="./brand.php">Brand</a>
                                </li>
                                <li>
                                    <a href="./style.php">Style</a>
                                </li>
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#" class=""><i class="la la-user"></i> <span>Khách Hàng</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="custormer.php">Thông tin khách hàng</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#" class=""><i class="la la-money"></i> <span>Hóa Đơn</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="#">Thanh Toán</a></li>
                                <li><a href="#"></i>Thống kê</a></li>
                            </ul>
                        </li>
                        <li class="menu-title">
                            <span>Tài khoản</span>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-user"></i> <span>Hồ Sơ</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="la la-key"></i> <span>Cài đặt</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="login.php"> Đăng nhập </a></li>
                                <li><a href="register.php"> Đăng ký </a></li>
                                <li><a href="forgot-password.php"> Quên mật khẩu </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->

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
                                <li class="breadcrumb-item active">Watches</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_watches"><i class="fa fa-plus"></i>Thêm Watches</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Search Filter -->
                <form method="GET" action="watches.php">
                    <div class="row filter-row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group form-focus">
                                <input type="number" class="form-control floating" name="watches_id">
                                <label class="focus-label">Watches ID</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group form-focus">
                                <input type="text" class="form-control floating" name="name_watches">
                                <label class="focus-label">Name Watches</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <button type="submit" class="btn btn-success btn-block" name="searchWatches">Tìm kiếm</button>
                        </div>
                    </div>
                </form>


                <!-- View Filter -->
                <?php
    
                // // Số lượng bản ghi trên mỗi trang
                // $recordsPerPage = 10;

                // // Xác định trang hiện tại
                // if (isset($_GET['page'])) {
                //     $currentPage = (int)$_GET['page'];
                // } else {
                //     $currentPage = 1;
                // }

                // // Tính toán OFFSET cho truy vấn SQL
                // $offset = ($currentPage - 1) * $recordsPerPage;

                // Truy vấn SQL với phân trang
                // $sql = 'SELECT * FROM watches
                //         JOIN brands ON watches.brand = brands.brandId
                //         JOIN styles ON watches.style = styles.styleId
                //         JOIN movements ON watches.movement = movements.moveId
                //         JOIN categories ON watches.category = categories.cateId
                //         JOIN features ON watches.features = features.feaId
                //         JOIN types ON watches.type = types.typeId
                //         JOIN caseshapes ON watches.caseShape = caseshapes.caseId';
                // $stmt = $conn->prepare($sql);
                // $stmt->execute();
                // $result = $stmt->get_result();

                // Tính tổng số bản ghi
                // $totalRecords = $result->num_rows;

                // // Tính toán tổng số trang
                // $totalPages = ceil($totalRecords / $recordsPerPage);
                ?>



                <!-- Pagination -->
                <div class="row" style="width: 100%;">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Brand</th>
                                        <th>Price</th>
                                        <th>Gender</th>
                                        <th>Model</th>
                                        <th>Sale</th>
                                        <th>Instock</th>
                                        <th>Movement</th>
                                        <th>CaseShape</th>
                                        <th>Type</th>
                                        <th>Features</th>
                                        <th>Style</th>
                                        <th>Warranty</th>
                                        <th>Category</th>
                                        <th>View</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = $results->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['name'] ?></td>
                                            <td><?= $row['brandName'] ?></td>
                                            <td><?= $row['price'] ?></td>
                                            <td><?php
                                                switch ($row['gender']) {
                                                    case 1:
                                                        echo "Men's";
                                                        break;
                                                    case 2:
                                                        echo "Ladies";
                                                        break;
                                                    default:
                                                        echo "Unisex";
                                                        break;
                                                }
                                                ?></td>
                                            <td><?= $row['model'] ?></td>
                                            <td><?= $row['sale'] ?></td>
                                            <td><?= $row['instock'] ?></td>
                                            <td><?= $row['moveName'] ?></td>
                                            <td><?= $row['caseName'] ?></td>
                                            <td><?= $row['typeName'] ?></td>
                                            <td><?= $row['feaName'] ?></td>
                                            <td><?= $row['styleName'] ?></td>
                                            <td><?= $row['warranty'] ?></td>
                                            <td><?= $row['cateName'] ?></td>
                                            <td><?= $row['view'] ?></td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="edit_watches.php?edit=<?= $row['id']?>" ><i class="fa fa-pencil m-r-5"></i>Edit</a>
                                                        <a class="dropdown-item" href="detail_watches.php?detail=<?= $row['id']?>" ><i class="fa fa-eye m-r-5"></i>Detail</a>
                                                        <a class="dropdown-item" href="watches.php?delete=<?= $row['id']?>" onclick="return confirm('Are you sure want to delete?')"; ><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
        <div id="add_watches" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" >
                <style>
                    @media (min-width: 992px) {
                        .modal-lg, .modal-xl {
                            max-width: 1300px;
                        }
                    }
                </style>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Watches</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form  method="post" enctype="multipart/form-data" > 
                            <div class="row">
                                <h4 class="modal-sub-title col-md-12">INFORMATION</h4>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Name<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" required value="<?php if (isset($name)) echo $name ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Price<span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" step="any" name="price" required value="<?php if (isset($price)) echo $price ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Brands</label>
                                        <select class="select" name="brands">
                                            <?php
                                                $brand = 'SELECT * FROM brands';
                                                $stmt = $conn->prepare($brand);
                                                $stmt->execute(); 
                                                $result = $stmt->get_result();
                                                while ($rows = $result->fetch_assoc()) { 
                                                    if ($brands==$rows['brandId']) {
                                                        $selected = "selected";
                                                    } else $selected="";
                                                    echo "<option value='{$rows['brandId']}' $selected >{$rows['brandName']}</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Gender</label>
                                        <select class="select" name="gender">
                                            <option value="1" <?php if (isset($gender) and $gender==1) echo "selected"?>>Men</option>
                                            <option value="0" <?php if (isset($gender) and $gender==0) echo "selected"?>>Ladies</option>
                                            <option value="2" <?php if (isset($gender) and $gender==2) echo "selected"?>>Unisex</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Model<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="model" required  value="<?php if (isset($model)) echo $model ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label  class="col-form-label">Movement<span class="text-danger">*</span></label>
                                        <select class="select" name="movements">
                                        <?php
                                            $movement = 'SELECT * FROM movements';
                                            $stmt = $conn->prepare($movement);
                                            $stmt->execute(); 
                                            $result = $stmt->get_result();
                                            while ($rows = $result->fetch_assoc()) { 
                                                if ($movements==$rows['moveId']) {
                                                    $selected = "selected";
                                                } else $selected="";
                                                echo "<option value='{$rows['moveId']}' $selected >{$rows['moveName']}</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Engine<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="engine"  value="<?php if (isset($engine)) echo $engine ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Power reserve<span class="text-danger"></span></label>
                                        <input type="number" step="any" class="form-control" name="power"  value="<?php if (isset($power)) echo $power ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Sale<span class="text-danger"></span></label>
                                        <input class="form-control" type="number" step="any" name="sale"  value="<?php if (isset($sale)) echo $sale ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label" >Instock<span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" step="any" name="instock"  required value="<?php if (isset($instock)) echo $instock ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Watch label<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="watchlabel"  value="<?php if (isset($watchLabel)) echo $watchLabel ?>">
                                    </div>
                                </div>
                                <h4 class="modal-sub-title col-md-12">CASE</h4>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label">Case size</label>
                                        <input class="form-control" type="number" step="any" name="casesize"  value="<?php if (isset($caseSize)) echo $caseSize ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Case material<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="casematerial"  value="<?php if (isset($caseMaterial)) echo $caseMaterial ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Case thickness<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="casethinkness"  value="<?php if (isset($caseThinkness)) echo $caseThinkness ?>">
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label  class="col-form-label">Case shape <span class="text-danger">*</span></label>
                                        <select class="select" name="caseshapes">
                                        <?php
                                            $caseshape = 'SELECT * FROM caseshapes';
                                            $stmt = $conn->prepare($caseshape);
                                            $stmt->execute(); 
                                            $result = $stmt->get_result();
                                            while ($rows = $result->fetch_assoc()) { 
                                                if ($caseshapes==$rows['caseId']) {
                                                    $selected = "selected";
                                                } else $selected="";
                                                echo "<option value='{$rows['caseId']}' $selected >{$rows['caseName']}</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Case back<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="caseback"  value="<?php if (isset($caseBack)) echo $caseBack ?>">
                                    </div>
                                </div>

                
                                <h4 class="modal-sub-title col-md-12">BAND</h4>
                        
                        
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Band material<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="bandmaterial"  value="<?php if (isset($bandMaterial)) echo $bandMaterial ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Band type<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="bandtype"  value="<?php if (isset($bandType)) echo $bandType ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Band color<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="bandcolor"  value="<?php if (isset($bandColor)) echo $bandColor ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Band length<span class="text-danger"></span></label>
                                        <input type="number" step="any" class="form-control" name="bandlength"  value="<?php if (isset($bandLength)) echo $bandLength ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Band width<span class="text-danger"></span></label>
                                        <input type="number" step="any" class="form-control" name="bandwidth"  value="<?php if (isset($bandWidth)) echo $bandWidth ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Clasp<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="clasp"  value="<?php if (isset($clasp)) echo $clasp ?>">
                                    </div>
                                </div>

                                <h4 class="modal-sub-title col-md-12">DIAL</h4>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Dial color<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="dialcolor"  value="<?php if (isset($dialColor)) echo $dialColor ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label  class="col-form-label">Types<span class="text-danger">*</span></label>
                                        <select class="select" name="types">
                                        <?php
                                            $type = 'SELECT * FROM types';
                                            $stmt = $conn->prepare($type);
                                            $stmt->execute(); 
                                            $result = $stmt->get_result();
                                            while ($rows = $result->fetch_assoc()) { 
                                                if ($types==$rows['typeId']) {
                                                    $selected = "selected";
                                                } else $selected="";
                                                echo "<option value='{$rows['typeId']}' $selected >{$rows['typeName']}</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Crystal<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="crystal"  value="<?php if (isset($crystal)) echo $crystal ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Hands<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="hands"  value="<?php if (isset($hands)) echo $hands ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Dial markers<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="dialmarkers"  value="<?php if (isset($dialMarkers)) echo $dialMarkers ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Second markers<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="secondmarker"  value="<?php if (isset($secondMarker)) echo $secondMarker ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Lumine<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="lumine" value="<?php if (isset($lumine)) echo $lumine ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Bezel<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="bezel" value="<?php if (isset($bezel)) echo $bezel ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Bezel color<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="bezelcolor" value="<?php if (isset($bezelColor)) echo $bezelColor ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Bezel Material<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="bezelmaterial" value="<?php if (isset($bezelMaterial)) echo $bezelMaterial ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Crown<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="crown" value="<?php if (isset($crown)) echo $crown ?>">
                                    </div>
                                </div>
                                <h4 class="modal-sub-title col-md-12">FEATURES</h4>
                                
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Water resistance<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="waterres" value="<?php if (isset($waterRes)) echo $waterRes ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Calendar<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="calendar" value="<?php if (isset($calendar)) echo $calendar ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Function<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="function" value="<?php if (isset($function)) echo $function ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label  class="col-form-label">Features<span class="text-danger">*</span></label>
                                        <select class="select" name="features">
                                        <?php
                                            $feature = 'SELECT * FROM features';
                                            $stmt = $conn->prepare($feature);
                                            $stmt->execute(); 
                                            $result = $stmt->get_result();
                                            while ($rows = $result->fetch_assoc()) { 
                                                if ($features==$rows['feaId']) {
                                                    $selected = "selected";
                                                } else $selected="";
                                                echo "<option value='{$rows['feaId']}' $selected >{$rows['feaName']}</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>

                                <h4 class="modal-sub-title col-md-12">ADDITIONAL INFO</h4>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label  class="col-form-label">Styles<span class="text-danger">*</span></label>
                                        <select class="select" name="styles">
                                        <?php
                                            $style = 'SELECT * FROM styles';
                                            $stmt = $conn->prepare($style);
                                            $stmt->execute(); 
                                            $result = $stmt->get_result();
                                            while ($rows = $result->fetch_assoc()) { 
                                                if ($styles==$rows['styleId']) {
                                                    $selected = "selected";
                                                } else $selected="";
                                                echo "<option value='{$rows['styleId']}' $selected >{$rows['styleName']}</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Warranty<span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="warranty" value="<?php if (isset($warranty)) echo $warranty ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Department<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="department" value="<?php if (isset($department)) echo $department ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label  class="col-form-label">Category<span class="text-danger">*</span></label>
                                        <select class="select" name="categories">
                                        <?php
                                            $category = 'SELECT * FROM categories';
                                            $stmt = $conn->prepare($category);
                                            $stmt->execute(); 
                                            $result = $stmt->get_result();
                                            while ($rows = $result->fetch_assoc()) { 
                                                if ($categorys==$rows['cateId']) {
                                                    $selected = "selected";
                                                } else $selected="";
                                                echo "<option value='{$rows['cateId']}' $selected >{$rows['cateName']}</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <h4 class="modal-sub-title col-md-12">IMAGE</h4> 
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">Main image<span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="main_img" accept="image/*" required accept="">
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">sub image<span class="text-danger"></span></label>
                                        <input type="file" class="form-control" name="sub1_img" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-4">  
                                    <div class="form-group">
                                        <label class="col-form-label">sub image<span class="text-danger"></span></label>
                                        <input type="file" class="form-control" name="sub2_img" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description<span class="text-danger">*</span></label>
                                        <textarea rows="4" class="form-control" placeholder="Enter description" required name="description" value="<?php if (isset($description)) echo $description ?>"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn" type="submit" name="button_add_watches">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal custom-modal fade" id="delete_watches" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete Watches</h3>
									<p>Are you sure want to delete?</p>
								</div>
                                <form method="post" action="watches.php">
                    <input type="hidden" name="delete_id" id="delete_id" value="">
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary continue-btn" name="delete_watch">Delete</button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-primary cancel-btn" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
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