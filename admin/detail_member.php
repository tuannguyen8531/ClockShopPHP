<!DOCTYPE html>
<html lang="en">
<?php
    include '../config.php';
    if (isset($_GET['detail'])){
        $idMem = $_GET['detail'];

        $name = "";   
        $class = "";  
        $birthDay = "";
        $idStudent="";
        $address="";
        $phone ="";
        $email="";
        $img="";

        switch ($idMem) {
            case 1: {            
                $name = "Nguyễn Dương Anh Tuấn";   
                $class = "62cntt3";  
                $birthDay = "12/07/2002";
                $idStudent="62133366";
                $address="Cam Ranh - Khánh Hòa";
                $phone ="0923503225";
                $email="tuan.nda.62cntt@ntu.edu.vn";
                $img="tuan.jpg";
                break;
            }
            case 2: {            
                $name = "Nguyễn Sanh Quốc Huy";   
                $class = "62-CNTT3";  
                $birthDay = "21/11/2002";
                $idStudent="62130757";
                $address="Nha Trang - Khánh Hòa";
                $phone ="0559474588";
                $email="huy.nsq.62cntt@ntu.edu.vn";
                $img="huy.jpg";
                break;
            }
            case 3: {            
                $name = "Nguyễn Đăng Khoa";   
                $class = "62cntt2";  
                $birthDay = "22/06/2002";
                $idStudent="62130863";
                $address="Diên khánh";
                $phone ="0703362500";
                $email="khoa.nd.62cntt@ntu.edu.vn";
                $img="khoa.jpg";
                break;
            }
            case 4: {            
                $name = "Moul Sàn";   
                $class = "62-CNTT1";  
                $birthDay = "05/05/2002";
                $idStudent="62131775";
                $address="Di Linh - Lâm Đồng";
                $phone ="0865304955";
                $email="san.m.62cntt@ntu.edu.vn";
                $img="san.jpg";
                break;
            }

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
                            <h3 class="page-title">Thành viên</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Bài tập</a></li>
                                <li class="breadcrumb-item active">Thông tin cá nhân</li>
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
                                            <a href="#"><img alt="" src="assets/img/profiles/<?= $img ?>" ></a>
                                        </div>
                                    </div>
                                    <div class="profile-basic">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="profile-info-left">
                                                    <h3 class="user-name m-t-0 mb-0"><?=$name?></h3>
                                                    <h5 class="text-muted">&nbsp;</h5>
                                                    <div class="staff-id">Email : <?=$email?></div>          
                                                    <div class="small doj text-muted">&nbsp;</div>
                                                    <medium class="text-muted"><?=$idStudent;?></medium>
                                                    <medium class="text-muted">&nbsp;</medium>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="personal-info">

                                                    <li>
                                                        <div class="title">Phone:</div>
                                                        <div class="text"><a href=""><?=$phone?></a></div>
                                                    </li>
                    
                                                    <li>
                                                        <div class="title">Class:</div>
                                                        <div class="text"><?=$class?></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Birthday:</div>
                                                        <div class="text"><?=$birthDay?></div>
                                                    </li>
    
                                                    <li>
                                                        <div class="title">Address:</div>
                                                        <div class="text"><?=$address?></div>
                                                    </li>
                    

            
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro-edit"><a class="edit-icon" href="edit_employee.php?edit=<?= $cusId ?>"><i class="fa fa-pencil"></i></a></div>
                                </div>
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