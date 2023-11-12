<!DOCTYPE html>
<html lang="en">
<?php 
    include 'config.php';


    session_start();
    $_SESSION['username'] = 'none';
    $_SESSION['openSideBar'] = 'none';

    $sql = 'SELECT * FROM watches';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $numRows = $result->num_rows;

    $ramdomDisplay = array();
    $index = 0;
    while($index < 4) {
        $randomNum = rand(1, $numRows);
        $has = false;
        foreach($ramdomDisplay as $x) {
            if($x==$randomNum) $has = true;
        }
        if(!$has) {
            $ramdomDisplay[$index] = $randomNum;
            $index++;
        } 
    }

    // Featured Daily Deals
    $sqlFeaturedDailyDeals = 'SELECT * FROM watches
        JOIN brands ON watches.brand = brands.brandId
        JOIN styles ON watches.style = styles.styleId
        JOIN movements ON watches.movement = movements.moveId
        JOIN categories ON watches.category = categories.cateId
        JOIN features ON watches.features = features.feaId
        JOIN types ON watches.type = types.typeId
        JOIN caseshapes ON watches.caseShape = caseshapes.caseId
        WHERE watches.id LIKE ?';
    
    $stmt = $conn->prepare($sqlFeaturedDailyDeals);
    $stmt->bind_param('i', $ramdomDisplay[0]);
    $stmt->execute();
    $result = $stmt->get_result();
    $featuredDeals0 = $result->fetch_assoc();

    $stmt = $conn->prepare($sqlFeaturedDailyDeals);
    $stmt->bind_param('i', $ramdomDisplay[1]);
    $stmt->execute();
    $result = $stmt->get_result();
    $featuredDeals1 = $result->fetch_assoc();

    $stmt = $conn->prepare($sqlFeaturedDailyDeals);
    $stmt->bind_param('i', $ramdomDisplay[2]);
    $stmt->execute();
    $result = $stmt->get_result();
    $featuredDeals2 = $result->fetch_assoc();

    $stmt = $conn->prepare($sqlFeaturedDailyDeals);
    $stmt->bind_param('i', $ramdomDisplay[3]);
    $stmt->execute();
    $result = $stmt->get_result();
    $featuredDeals3 = $result->fetch_assoc();

    // Trending Slider
    $sqlTrending = 'SELECT * FROM watches 
        JOIN brands ON watches.brand = brands.brandId
        JOIN styles ON watches.style = styles.styleId
        JOIN movements ON watches.movement = movements.moveId
        JOIN categories ON watches.category = categories.cateId
        JOIN features ON watches.features = features.feaId
        JOIN types ON watches.type = types.typeId
        JOIN caseshapes ON watches.caseShape = caseshapes.caseId
        ORDER BY watches.view DESC
        LIMIT 20';
    $stmt = $conn->prepare($sqlTrending);
    $stmt->execute(); 
    $trendingResult = $stmt->get_result();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jomashop.com: Online Shopping for Watches &amp; More - Jomashop</title>
    <link rel="stylesheet" href="./dist/css/1882.d22b2a4d319f5798c600.initial.css">
    <link rel="stylesheet" href="./dist/css/1634.1a661808a4dbdbef312c.initial.css">
    <link rel="stylesheet" href="./dist/css/3482.0051ec8bf96fa0b92067.bundle.css">
    <link rel="stylesheet" href="./dist/css/591.af82319651e53c8c3f1a.bundle.css">

    <link rel="stylesheet" href="./dist/css/1312.31d6cfe0d16ae931b73c.bundle.css">
    <link rel="stylesheet" href="./dist/css/5531.2501ef6314da696e9b86.bundle.css">
    <link rel="stylesheet" href="./dist/css/2557.53c4e93c6ec21bc19e7c.bundle.css">
    <link rel="stylesheet" href="./dist/css/9695.0508d067424b8b31465c.bundle.css">
   
    <link rel="stylesheet" href="./dist/css/5458.6250c0fd295eeca21e3a.bundle.css">
    <link rel="stylesheet" href="./dist/css/629.ac02469f0d06a538712a.bundle.css">

    <link rel="stylesheet" href="./dist/css/256.9a4d8502ef8eea2ebf3f.bundle.css">
    <link rel="stylesheet" href="./dist/css/5606.6b4ee6bd0876f7792e52.bundle.css">
    <link rel="stylesheet" href="./dist/css/8825.51df8c031c82efbe88b4.bundle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#continue").on("click", function(){
            let emailC = $("#emailC").val();
            let email = $("#email_register");

            let acRegisterForm = $(".account-register-form");
            let acLoginForm = $(".account-login-form");
            let acLoginForm2 = $(".account-login-form-2");
             
            console.log(emailC);
            let errEmailC = $(".errEmailC");
            $.ajax({
            url: "checkEmail.php",
            method: "POST",
            data: { emailC : emailC},
            success : function(response){
                var vc = response; 
                if (response == "") {

                    acRegisterForm.css("display", "block");
                    acLoginForm.css("display", "none");
                    email.val(emailC);
                    console.log(email);
                            
                }else if (response=="This field is required"){
                    errEmailC.html("This field is required");  
                    
                } else if (response=="Invalid email"){
                    errEmailC.html("Invalid email");
                     
                } else if (response=="Email already exist"){
                    errEmailC.html("Email already exist");  
                    acLoginForm.css("display", "none");
                    acLoginForm2.css("display", "block");
                } 
                errEmailC.addClass("root_error");
            }
            });

	    });

        $("#create").on("click", function() {
            let email = $("#email_register").val();
            console.log(email);
            let firstName = $("#first_name").val();
            let lastName = $("#last_name").val();
            let passWord = $("#pass_word").val();
            let confirmPassword = $("#confirm_password").val();
            let acRegisterForm = $(".account-register-form");
            
            let acSignInForm = $(".signin");
            
            let errEmail = $(".errEmail");
            let errFirstName = $(".errFirstName");
            let errLastName = $(".errLastName");
            let errPass = $(".errPass");
            let errConfirm = $(".errConfirm");

            $.ajax({
                url: "RegisterAccCus.php",
                method: "POST",
                data: { email: email, firstName: firstName, lastName: lastName, passWord: passWord, confirmPass: confirmPassword },
                dataType: 'json', // Expect JSON response
                success: function(response) {
                    // Clear previous error messages
                    errEmail.html("");
                    errFirstName.html("");
                    errLastName.html("");
                    errPass.html("");
                    errConfirm.html("");

                    // Check for specific errors and display messages
                    if (response.errorEmail) {
                        errEmail.html(response.errorEmail);
                        errEmail.addClass("root_error");
                    }
                    if (response.errorFirstName) {
                        errFirstName.html(response.errorFirstName);
                        errFirstName.addClass("root_error");
                    }
                    if (response.errorLastName) {
                        errLastName.html(response.errorLastName);
                        errLastName.addClass("root_error");
                    }
                    if (response.errorPass) {
                        errPass.html(response.errorPass);
                        errPass.addClass("root_error");
                    }
                    if (response.errorConfirm) {
                        errConfirm.html(response.errorConfirm);
                        errConfirm.addClass("root_error");
                    }

                    if (response.success) {
                        acRegisterForm.css("display", "none");
                        acSignInForm.css("display", "block");
                        console.log(response.success);
                    }
                    
                },
                error: function(xhr, status, error) {
                    console.log("Error in AJAX request:", status, error);
                }
            });
        });
    });

</script>


</head>
<body id="body" >
    <div id="root" data-react-rendered="true" class="home-page">
        <div class="Main" data-render-context="lazy">
            <header class="page-header">
                <div class="header-toolbar">
                    <div class="center-content">
                        <nav class="MegaMenu css-0">
                            <button aria-label="menu" aria-expanded="false" class="hamburger-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path d="M3 4H21V6H3V4ZM3 11H21V13H3V11ZM3 18H21V20H3V18Z"></path>
                                </svg>
                            </button>
                            <div class="outside-menu-mobile"></div>
                            <div class="menu-container">
                                <div class="mega-menu"></div>
                            </div>
                        </nav>
                        <div class="center">
                            <span class="logo">
                                <a href="/"><img src="./dist/file/jomashop_logo.7c0762d85d36b44f0c59.png" alt="logo"></a>
                            </span>
                            <div class="header-search-bar-desktop">
                                <div class="searchbar">
                                    <div class="root-open">
                                        <div class="container">
                                            <div class="search">
                                                <div class="search-suggestions">
                                                    <div class="search-input-wrapper">
                                                        <input type="text" class="search-field-input" placeholder="Search for product or brands..." aria-label="Search box" value="">
                                                        <span class="icon-search">
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9.49996 2.75C8.16495 2.75 6.85991 3.14588 5.74989 3.88757C4.63986 4.62927 3.7747 5.68347 3.26381 6.91686C2.75292 8.15026 2.61925 9.50745 2.8797 10.8168C3.14015 12.1262 3.78302 13.3289 4.72702 14.2729C5.67102 15.2169 6.87375 15.8598 8.18311 16.1202C9.49248 16.3807 10.8497 16.247 12.0831 15.7361C13.3165 15.2252 14.3707 14.3601 15.1124 13.25C15.854 12.14 16.2499 10.835 16.2499 9.49996C16.2498 7.70979 15.5386 5.99298 14.2728 4.72714C13.0069 3.46131 11.2901 2.75011 9.49996 2.75Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10"></path>
                                                                <path d="M14.5352 14.5359L19.2493 19.25" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"></path>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rhs">
                            <button class="rhs-item rhs-account">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.1368 2.24993C6.65341 2.17587 2.17684 6.65243 2.25091 12.1359C2.32403 17.3948 6.60606 21.6768 11.865 21.7499C17.3493 21.8249 21.825 17.3484 21.75 11.8649C21.6778 6.60509 17.3958 2.32305 12.1368 2.24993ZM18.0628 17.5898C18.0441 17.61 18.0212 17.6258 17.9957 17.6362C17.9703 17.6465 17.9428 17.6511 17.9154 17.6497C17.8879 17.6483 17.8611 17.6408 17.8368 17.6279C17.8126 17.6149 17.7914 17.5968 17.775 17.5748C17.3557 17.0262 16.8422 16.5566 16.2586 16.1877C15.0651 15.4218 13.5529 14.9999 12.0009 14.9999C10.4489 14.9999 8.93669 15.4218 7.74325 16.1877C7.1596 16.5564 6.64614 17.0259 6.22684 17.5743C6.21037 17.5963 6.18926 17.6145 6.16499 17.6274C6.14073 17.6404 6.11392 17.6478 6.08645 17.6493C6.05899 17.6507 6.03154 17.6461 6.00607 17.6357C5.98059 17.6253 5.9577 17.6095 5.93903 17.5893C4.56357 16.1045 3.78442 14.1643 3.75091 12.1406C3.6745 7.57915 7.41747 3.76118 11.9808 3.74993C16.544 3.73868 20.2509 7.44415 20.2509 11.9999C20.2525 14.0725 19.4709 16.0691 18.0628 17.5898Z" fill="black"></path>
                                    <path d="M11.9995 6.75C11.0751 6.75 10.2393 7.09641 9.64541 7.72594C9.0515 8.35547 8.75479 9.22594 8.82182 10.1602C8.95775 12 10.3832 13.5 11.9995 13.5C13.6157 13.5 15.0384 12 15.1771 10.1606C15.2465 9.23531 14.9521 8.37281 14.3484 7.73156C13.7521 7.09875 12.9178 6.75 11.9995 6.75Z" fill="black"></path>
                                </svg>
                                <span class="rhs-text">Sign in</span>
                            </button>
                            <button class="rhs-item wishlist-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25052 8.28028C2.27976 5.42838 4.54537 3 7.45736 3C9.24474 3 10.5595 3.88475 11.3985 4.71777C11.6321 4.94972 11.8326 5.18108 12.0005 5.39441C12.1684 5.18108 12.3688 4.94972 12.6024 4.71777C13.4415 3.88475 14.7562 3 16.5436 3C19.4556 3 21.7212 5.42838 21.7504 8.28028L21.7504 8.28049C21.8059 13.8427 17.3366 17.6908 12.8442 20.7403C12.5954 20.9095 12.3014 21.0001 12.0005 21.0001C11.6995 21.0001 11.4056 20.9095 11.1567 20.7403C6.66392 17.6908 2.19456 13.8427 2.25052 8.28042L2.25052 8.28028ZM12.6704 7.08725C12.543 7.34027 12.2839 7.5 12.0005 7.5C11.7171 7.5 11.458 7.34029 11.3306 7.08729C11.3304 7.08698 11.3301 7.08638 11.3297 7.0855C11.3288 7.08372 11.3273 7.08081 11.3251 7.0768C11.324 7.07467 11.3227 7.07223 11.3213 7.0695C11.3128 7.0537 11.2988 7.02796 11.2792 6.9937C11.2399 6.92508 11.1786 6.82288 11.0952 6.69831C10.9277 6.44793 10.676 6.11413 10.3417 5.78223C9.6699 5.11525 8.71309 4.5 7.45736 4.5C5.42314 4.5 3.7719 6.20966 3.75044 8.29551M12.6704 7.08725C12.6705 7.08694 12.6708 7.08635 12.6713 7.0855C12.6727 7.08278 12.6755 7.07739 12.6797 7.0695C12.6881 7.0537 12.7022 7.02796 12.7218 6.9937C12.7611 6.92508 12.8224 6.82288 12.9058 6.69831C13.0733 6.44793 13.325 6.11413 13.6593 5.78223C14.3311 5.11525 15.2879 4.5 16.5436 4.5C18.5778 4.5 20.229 6.20963 20.2505 8.29545C20.2972 12.9826 16.5329 16.4235 12.0011 19.4996L12.0005 19.5001L11.9998 19.4996C7.46758 16.4235 3.70336 12.9827 3.75044 8.29566" fill="black"></path>
                                </svg>
                            </button>
                            <button class="rhs-item bag">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2.97169C11.0149 2.97169 10.0641 3.36275 9.35841 4.06842C8.6518 4.77504 8.25 5.73911 8.25 6.74988V7.52808H15.75V6.74988C15.75 5.73911 15.3482 4.77504 14.6416 4.06842C13.9359 3.36275 12.9851 2.97169 12 2.97169ZM17.25 7.52808V6.74988C17.25 5.37371 16.7036 4.04859 15.7224 3.06738C14.7402 2.08522 13.4019 1.52808 12 1.52808C10.5981 1.52808 9.25978 2.08522 8.27763 3.06738C7.29641 4.04859 6.75 5.37371 6.75 6.74988V7.52808H3.75C3.3427 7.52808 2.95817 7.69013 2.67928 7.96903C2.40133 8.24698 2.25 8.61827 2.25 8.99988V19.1249C2.25 20.9147 3.76646 22.4717 5.625 22.4717H18.375C20.2118 22.4717 21.75 20.9947 21.75 19.1835V8.99988C21.75 8.61827 21.5987 8.24698 21.3207 7.96903C21.0418 7.69013 20.6573 7.52808 20.25 7.52808H17.25ZM3.75864 8.97168C3.75511 8.97613 3.75 8.98573 3.75 8.99988V19.1249C3.75 20.1701 4.64854 21.0281 5.625 21.0281H18.375C19.3732 21.0281 20.25 20.2073 20.25 19.1835V8.99988C20.25 8.98573 20.2449 8.97613 20.2414 8.97168H3.75864Z" fill="black"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 9.77808C7.91421 9.77808 8.25 10.1012 8.25 10.4999V11.2499C8.25 12.2607 8.6518 13.2247 9.35841 13.9313C10.0641 14.637 11.0149 15.0281 12 15.0281C12.9851 15.0281 13.9359 14.637 14.6416 13.9313C15.3482 13.2247 15.75 12.2607 15.75 11.2499V10.4999C15.75 10.1012 16.0858 9.77808 16.5 9.77808C16.9142 9.77808 17.25 10.1012 17.25 10.4999V11.2499C17.25 12.6261 16.7036 13.9512 15.7224 14.9324C14.7402 15.9145 13.4019 16.4717 12 16.4717C10.5981 16.4717 9.25979 15.9145 8.27763 14.9324C7.29641 13.9512 6.75 12.6261 6.75 11.2499V10.4999C6.75 10.1012 7.08579 9.77808 7.5 9.77808Z" fill="black"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div id="MegaMenu_Desktop">
                        <nav class="MegaMenu css-0">
                            <div class="menu-container">
                                <div class="mega-menu">
                                    <ul class="MenuWrapper">
                                        <li class="menu-item level-1 shop-by-brands">
                                            <div class="menu-item-header">
                                                <input class="menu-item-input" aria-label="Shop By Brand">
                                                <a class="levelTop" href="" aria-label="Shop By Brand" tabindex="-1">Shop By Brand</a>
                                            </div>
                                            <div class="subCat">
                                                <div class="subCatParent">
                                                    <div class="imageWrapper imageWrapper-1"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="menu-item level-1 watches-for-men">
                                            <div class="menu-item-header">
                                                <input class="menu-item-input" aria-label="Men's">
                                                <a class="levelTop" href="" aria-label="Men's" tabindex="-1">Men's</a>
                                            </div>
                                            <div class="subCat">
                                                <div class="subCatParent">
                                                    <div class="imageWrapper imageWrapper-1"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="menu-item level-1 watches-for-women">
                                            <div class="menu-item-header">
                                                <input class="menu-item-input" aria-label="Ladies">
                                                <a class="levelTop" href="" aria-label="Ladies" tabindex="-1">Ladies</a>
                                            </div>
                                            <div class="subCat">
                                                <div class="subCatParent">
                                                    <div class="imageWrapper imageWrapper-1"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="menu-item level-1 watches">
                                            <div class="menu-item-header">
                                                <input class="menu-item-input" aria-label="Watches">
                                                <a class="levelTop" href="" aria-label="Watches" tabindex="-1">Watches</a>
                                            </div>
                                            <div class="subCat">
                                                <div class="subCatParent">
                                                    <div class="imageWrapper imageWrapper-1"></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="menu-item level-1 flash-sale-offers">
                                            <div class="menu-item-header">
                                                <input class="menu-item-input" aria-label="Sale">
                                                <a class="levelTop" href="" aria-label="Sale" tabindex="-1">Sale</a>
                                            </div>
                                            <div class="subCat">
                                                <div class="subCatParent">
                                                    <div class="imageWrapper imageWrapper-1"></div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="megamenu-background"></div>
                        </nav>
                    </div>
                    <div class="header-search-bar-mobile">
                        <div class="searchbar">
                            <div class="root-open">
                                <div class="container">
                                    <div class="search">
                                        <div class="search-suggestions">
                                            <div class="search-input-wrapper">
                                                <input type="text" class="search-field-input" placeholder="Search for product or brands..." aria-label="Search box" value="">
                                                <span class="icon-search">
                                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M9.49996 2.75C8.16495 2.75 6.85991 3.14588 5.74989 3.88757C4.63986 4.62927 3.7747 5.68347 3.26381 6.91686C2.75292 8.15026 2.61925 9.50745 2.8797 10.8168C3.14015 12.1262 3.78302 13.3289 4.72702 14.2729C5.67102 15.2169 6.87375 15.8598 8.18311 16.1202C9.49248 16.3807 10.8497 16.247 12.0831 15.7361C13.3165 15.2252 14.3707 14.3601 15.1124 13.25C15.854 12.14 16.2499 10.835 16.2499 9.49996C16.2498 7.70979 15.5386 5.99298 14.2728 4.72714C13.0069 3.46131 11.2901 2.75011 9.49996 2.75Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10"></path>
                                                        <path d="M14.5352 14.5359L19.2493 19.25" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-search-bar">
                    <div class="searchbar">
                        <div class="root-open">
                            <div class="container">
                                <div class="search">
                                    <div class="search-suggestions">
                                        <div class="search-input-wrapper">
                                            <input type="text" class="search-field-input" placeholder="Search by brand or model" aria-label="Search box" value="">
                                            <span class="icon-search">
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.49996 2.75C8.16495 2.75 6.85991 3.14588 5.74989 3.88757C4.63986 4.62927 3.7747 5.68347 3.26381 6.91686C2.75292 8.15026 2.61925 9.50745 2.8797 10.8168C3.14015 12.1262 3.78302 13.3289 4.72702 14.2729C5.67102 15.2169 6.87375 15.8598 8.18311 16.1202C9.49248 16.3807 10.8497 16.247 12.0831 15.7361C13.3165 15.2252 14.3707 14.3601 15.1124 13.25C15.854 12.14 16.2499 10.835 16.2499 9.49996C16.2498 7.70979 15.5386 5.99298 14.2728 4.72714C13.0069 3.46131 11.2901 2.75011 9.49996 2.75Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10"></path>
                                                    <path d="M14.5352 14.5359L19.2493 19.25" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"></path>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sticky-search-bar">
                    <div class="searchbar">
                        <div class="root-open">
                            <div class="container">
                                <div class="search">
                                    <div class="search-suggestions">
                                        <div class="search-input-wrapper" tabindex="0">
                                            <input type="text" class="search-field-input " placeholder="Search by brand or model" aria-label="Search box">
                                            <span class="icon-search">
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.49996 2.75C8.16495 2.75 6.85991 3.14588 5.74989 3.88757C4.63986 4.62927 3.7747 5.68347 3.26381 6.91686C2.75292 8.15026 2.61925 9.50745 2.8797 10.8168C3.14015 12.1262 3.78302 13.3289 4.72702 14.2729C5.67102 15.2169 6.87375 15.8598 8.18311 16.1202C9.49248 16.3807 10.8497 16.247 12.0831 15.7361C13.3165 15.2252 14.3707 14.3601 15.1124 13.25C15.854 12.14 16.2499 10.835 16.2499 9.49996C16.2498 7.70979 15.5386 5.99298 14.2728 4.72714C13.0069 3.46131 11.2901 2.75011 9.49996 2.75Z" stroke="black" stroke-width="1.5" stroke-miterlimit="10"></path>
                                                    <path d="M14.5352 14.5359L19.2493 19.25" stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"></path>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-promo-mob"></div>
                <div class="bottom-promo">
                    <div class="click-handler">
                        <div class="row-contained-EzA header-promo-bottom-wrapper">
                            <div style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px; display: flex; justify-content: flex-start; flex-direction: column;">
                                <div>
                                    <div class="banner">
                                        <a class="banner-content" style="text-decoration: none;" href="">
                                            <div class="banner-content">
                                                <img src="./img/banner/bg_banner_HALLOWEEN_2023.png">
                                                <span class="text">HALLOWEEN SALE:
                                                    <span>Up to 75% Off</span>
                                                </span>
                                                <span class="shop-now">Shop Now</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="multi-slide-wrapper-overlay"></div>
            <div class="multi-slide-wrapper open">
                <div class="multi-slideout-container">
                    <div class="multi-slideout-header">
                        <div class="slide-out-tabs open">
                            <button class="slide-out-tab wishlist-tab"><span>Wishlist</span>(0)</button>
                            <button class="slide-out-tab account-tab ">My Account</button>
                            <button class="slide-out-tab cart-tab"><span>Bag</span>(0)</button>
                        </div>
                        <button class="btn-close">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.0007 5.5865L11.9504 0.636719L13.3646 2.05093L8.4149 7.0007L13.3646 11.9504L11.9504 13.3646L7.0007 8.4149L2.05093 13.3646L0.636719 11.9504L5.5865 7.0007L0.636719 2.05093L2.05093 0.636719L7.0007 5.5865Z"
                                    fill="black"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="slide-out-content">
                        <div class="account-form" 
                             style="<?php 
                                        if ($_SESSION['username']=='none') {
                                            echo "display:block";
                                        } else {
                                            echo "display:none";
                                        } 
                             ?>">
          
                            <div class="account-form-steps open">
                                <div aria-labelledby="account-login-form-heading" class="account-login-form account-form-wrapper">
                                    <h3 class="title">Sign In To Jomashop</h3>
                                    <form>
                                    <div id="error" style="color: red;"></div><div id="ok" style="color: green"></div>
                                        <button type="submit" class="social-login social-login__google btn btn-primary btn-block btn-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M22.56 12.25C22.56 11.47 22.49 10.72 22.36 10H12V14.26H17.92C17.66 15.63 16.88 16.79 15.71 17.57V20.34H19.28C21.36 18.42 22.56 15.6 22.56 12.25Z"
                                                    fill="#4285F4">
                                                </path>
                                                <path
                                                    d="M11.9999 23.0001C14.9699 23.0001 17.4599 22.0201 19.2799 20.3401L15.7099 17.5701C14.7299 18.2301 13.4799 18.6301 11.9999 18.6301C9.13993 18.6301 6.70993 16.7001 5.83993 14.1001H2.17993V16.9401C3.98993 20.5301 7.69993 23.0001 11.9999 23.0001Z"
                                                    fill="#34A853">
                                                </path>
                                                <path
                                                    d="M5.84 14.0901C5.62 13.4301 5.49 12.7301 5.49 12.0001C5.49 11.2701 5.62 10.5701 5.84 9.91007V7.07007H2.18C1.43 8.55007 1 10.2201 1 12.0001C1 13.7801 1.43 15.4501 2.18 16.9301L5.03 14.7101L5.84 14.0901Z"
                                                    fill="#FBBC05">
                                                </path>
                                                <path
                                                    d="M11.9999 5.38C13.6199 5.38 15.0599 5.94 16.2099 7.02L19.3599 3.87C17.4499 2.09 14.9699 1 11.9999 1C7.69993 1 3.98993 3.47 2.17993 7.07L5.83993 9.91C6.70993 7.31 9.13993 5.38 11.9999 5.38Z"
                                                    fill="#EA4335">
                                                </path>
                                            </svg>
                                            <span class="button-words">Sign in with Google</span>
                                        </button>
                                        <button type="submit" class="social-login social-login__apple btn btn-primary btn-block btn-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
                                                <g clip-path="url(#clip0_2040_85660)">
                                                    <path
                                                        d="M15.769 0C15.822 0 15.875 0 15.931 0C16.061 1.606 15.448 2.806 14.703 3.675C13.972 4.538 12.971 5.375 11.352 5.248C11.244 3.665 11.858 2.554 12.602 1.687C13.292 0.879 14.557 0.16 15.769 0Z"
                                                        fill="black">
                                                    </path>
                                                    <path
                                                        d="M20.67 16.716C20.67 16.732 20.67 16.746 20.67 16.761C20.215 18.139 19.566 19.32 18.774 20.416C18.051 21.411 17.165 22.75 15.583 22.75C14.216 22.75 13.308 21.871 11.907 21.847C10.425 21.823 9.61 22.582 8.255 22.773C8.1 22.773 7.945 22.773 7.793 22.773C6.798 22.629 5.995 21.841 5.41 21.131C3.685 19.033 2.352 16.323 2.104 12.855C2.104 12.515 2.104 12.176 2.104 11.836C2.209 9.35396 3.415 7.33596 5.018 6.35796C5.864 5.83796 7.027 5.39496 8.322 5.59296C8.877 5.67896 9.444 5.86896 9.941 6.05696C10.412 6.23796 11.001 6.55896 11.559 6.54196C11.937 6.53096 12.313 6.33396 12.694 6.19496C13.81 5.79196 14.904 5.32996 16.346 5.54696C18.079 5.80896 19.309 6.57896 20.069 7.76696C18.603 8.69996 17.444 10.106 17.642 12.507C17.818 14.688 19.086 15.964 20.67 16.716Z"
                                                        fill="black">
                                                    </path>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_2040_85660">
                                                        <rect width="22.773" height="22.773" fill="white"></rect>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <span class="button-words">Sign in with Apple</span>
                                        </button>
                                    </form>
                                    <div class="login-msg__line-break">
                                        <div class="login-msg__text">OR</div>
                                    </div>
                                    <div class="login-msg">Enter your email address to sign in or to create an account</div>
                                    <form method="post">
                                        <div class="field-wrapper  can-focus  ">
                                            <label for="email_address" class="label">Email<span class="requiredSymbol">*</span></label>
                                            <div class="field-icons" style="--iconsBefore: 0; --iconsAfter: 0;">
                                                <span class="input-block"><input class="input-box-new-design" field="email"
                                                    type="email" autocomplete="email" placeholder="Email" id="emailC" name="emailC"
                                                    aria-required="true" value="">
                                                </span>
                                                <span class="before"></span>
                                                <span class="after"></span>
                                            </div>
                                            <span class="message-root">
                                                <p class="errEmailC"  > <?php if (isset($errEmailC)) echo $errEmailC;?></p>
                                            </span>
                                        </div>
                                        <div class="actions-toolbar">
                                            <button class="btn-new-design primary" type="button" name="continue" id="continue">Continue</button>
                                        </div>
                                    </form>
                                </div>
                                <div aria-labelledby="account-register-form-heading" class="account-register-form account-form-wrapper"
                                    style="display: none; <?php  
                                        // if (isset($_POST['continue']) and $errEmailC=="") {
                                        //     echo "display:block";
                                        // } else {
                                            
                                        //     echo "display:none";
                                        // }  
                                        // echo $emailC;            
                                        ?>">
                                    <div class="welcome">Welcome!</div>
                                    <div class="title">Add password to create your account</div>
                                    <form method="post">
                                        <div class="field-wrapper  can-focus   show-label is-focused">
                                            <label for="email_register" class="label">Email<span class="requiredSymbol">*</span></label>
                                            <div class="field-icons" style="--iconsBefore: 0; --iconsAfter: 0;">
                                                <span class="input-block">
                                                    <input type="email" autocomplete="off" placeholder="Email" aria-required="true" class=""
                                                        id="email_register" name="email" value=" <?php if (isset($emailC)) echo $emailC ?> ">
                                                </span>
                                                <span class="before"></span><span class="after"></span>
                                            </div>
                                                <span class="message-root"> 
                                                    <p class="errEmail"> <?php if (isset($errEmail)) echo $errEmail;?></p>
                                                </span>
                                        </div>
                                        <div class="field-wrapper  can-focus  ">
                                            <label for="first_name" class="label">First Name<span class="requiredSymbol">*</span></label>
                                            <div class="field-icons" style="--iconsBefore: 0; --iconsAfter: 0;">
                                                <span class="input-block">
                                                    <input type="text" autocomplete="given-name" placeholder="First Name" aria-required="true" class=""
                                                        id="first_name" name="firstname" value="<?php if (isset($firstName)) echo $firstName ?>">
                                                </span>
                                                <span class="before"></span>
                                                <span class="after"></span>
                                            </div>
                                            <span class="message-root">
                                                <p class="errFirstName"  > <?php if (isset($errFirstName)) echo $errFirstName;?></p>
                                            </span>
                                        </div>
                                        <div class="field-wrapper  can-focus  "><label for="last_name" class="label">Last Name<span
                                                    class="requiredSymbol">*</span></label>
                                            <div class="field-icons" style="--iconsBefore: 0; --iconsAfter: 0;"><span class="input-block"><input
                                                        type="text" autocomplete="family-name" placeholder="Last Name" aria-required="true" class=""
                                                        id="last_name" name="lastname" value="<?php if (isset($lastName)) echo $lastName ?>"></span><span class="before"></span><span
                                                    class="after"></span></div><span class="message-root">
                                                    <p class="errLastName"> <?php if (isset($errLastName)) echo $errLastName;?></p>
                                            </span>
                                        </div>
                                        <div class="ReactPasswordStrength input-password-wrapper is-strength-null">
                                            <div class="field-wrapper  can-focus  " style="position: relative;">
                                                <label class="label">Password
                                                    <span class="requiredSymbol">*</span>
                                                </label>
                                                <input type="password"
                                                    class="ReactPasswordStrength-input input-password" autocomplete="off" placeholder="Password"
                                                    id="pass_word" name="password" value="<?php if (isset($passWord)) echo $passWord ?>"
                                                    style="transition: none 0s ease 0s;">
                                                    <span class="message-root">
                                                        <p class="errPass" > 
                                                            <?php 
                                                                if (isset($errPass)) echo $errPass;
                                                            ?>
                                                        </p>
                                                    </span>
                                            </div>
                                            <div class="ReactPasswordStrength-strength-bar"></div>
                                        </div>
                                        <div class="field-wrapper  can-focus  "><label for="confirm_password" class="label">Confirm Password<span
                                                    class="requiredSymbol">*</span></label>
                                            <div class="field-icons" style="--iconsBefore: 0; --iconsAfter: 0;"><span class="input-block"><input
                                                        type="password" placeholder="Confirm Password" aria-required="true" class=""
                                                        id="confirm_password" name="confirm" value="<?php if (isset($confirm)) echo $confirm ?>"></span><span class="before"></span><span
                                                    class="after"></span></div><span class="message-root">
                                                    <p class="errConfirm"  > </p>
                                            </span>
                                        </div>
                                        <div></div><button class="btn-new-design primary" type="button" name="create" id="create">Create Account</button>
                                        <div aria-hidden="true" class="ownid-form-clearfix"
                                            style="overflow:hidden;z-index:-100;position:absolute;width:1px;-webkit-filter:blur(5vw);-moz-filter:blur(5px);-o-filter:blur(5px);-ms-filter:blur(5px);height:1px;background-color:#fff;">
                                            <input id="password-text-field-8wadnr2zbem" aria-hidden="true" type="password"
                                                autocomplete="current-password" tabindex="-1"><input id="password-text-field-8wadnr2zbem2"
                                                aria-hidden="true" type="password" autocomplete="current-password" tabindex="-1"></div>
                                    </form>
                                    <div class="terms-wrapper">
                                        <div class="terms"><span>By creating an account, you are agreeing to our <a title="privacy policy"
                                                    href="https://help.jomashop.com/hc/en-us/articles/19861667238939-Privacy-Policy">privacy
                                                    policy</a>and<a title="terms of use"
                                                    href="https://help.jomashop.com/articles/61058-terms-conditions">terms of use</a>.</span></div>
                                    </div>
                                    <div class="sign-in-link-wrapper"><span class="text">Have an account?</span>
                                        <button class="btn-new-design link" title="Sign In">Sign In</button>
                                    </div>
                                </div>
                                <?php 
                                    if (isset($_POST['login'])) {
                                        $passLogin = $_POST['passLogin'];
                                        $emailLogin = $_POST['emailLogin'];
                                        $sqlLogin = 'SELECT * FROM accounts';
                                        $stmt = $conn->prepare($sqlLogin);
                                        $stmt->execute();
                                        $result = $stmt->get_result();

                                        if (!$result) die ('<br <b> Query failed </b>');
                                        if ($result->num_rows!=0) {
                                            while ($row = $result->fetch_assoc()) {
                                                if ($row['accUsername'] == $emailLogin and password_verify($passLogin, $row['accPassword'])) {
                                                    $_SESSION['username'] = $emailLogin;
                                                    echo $_SESSION['username'];
                                                    // header("Location: welcome.php");
                                                    break;
                                                };
                                            }
                                        }
                                    }
                                
                                ?>
                                <div aria-labelledby="account-login-form-heading" class="account-login-form account-login-form-2 account-form-wrapper" 
                                    style="<?php 
                                                if (isset($_POST['continue']) and $errEmailC == "Email already exist") {
                                                    echo "display:block";
                                                } else {
                                                    echo "display:none";
                                                }                    
                                            ?>"     
                                    >
                                    <div id="account-login-form-heading" class="customer exist"><span>Enter your password to continue</span></div>
                                        <form method="post">
                                            <div class="field-wrapper  can-focus  "><label for="email_address" class="label">Email<span class="requiredSymbol">*</span></label>
                                                <div class="field-icons" style="--iconsBefore: 0; --iconsAfter: 0;"><span class="input-block"><input class="input-box-new-design" field="email" type="email" autocomplete="email" placeholder="Email" id="email_address" aria-required="true" name="emailLogin" value="<?php if (isset($emailC)) echo $emailC ?>" sr-value="*************"></span><span class="before"></span><span class="after"></span></div><span class="message-root">
                                                    <p class="root"></p>
                                                </span>
                                            </div>
                                            <div class="field-wrapper  can-focus  "><label for="password" class="label">Password<span class="requiredSymbol">*</span></label>
                                                <div class="field-icons" style="--iconsBefore: 0; --iconsAfter: 0;"><span class="input-block" style="position: relative;"><input class="input-box-new-design" field="password" type="password" autocomplete="new-password" placeholder="Password" id="password" aria-required="true" value="" name="passLogin" style="width: 290px !important; margin-right: 78px !important; transition: none 0s ease 0s;"><ownid-win-button-widget data-or="or" position="end" height="44" language="en" tabindex="0" style="--ownid-button-widget-background: #FFFFFF; --ownid-button-widget-color: #0070F2; --ownid-button-widget-border-color: #000000; opacity: 1; height: 44px; --ownid-qr-or-width: 24px; top: 0px; left: 300px;">Skip Password<ownid-tooltip-expandable slot="tooltip" position="bottom" arrow-position="right" data-title="Sign-in faster without a password" data-details-title="Sign-in faster without a password" data-details-description="Sign in securely with your device’s unlock method, when available, or by scanning a QR code. Biometric data never leaves your device." data-c="Close" data-mi="More info" style="--ownid-tooltip-arrow-bg-color: var(--ownid-tooltip-bg-color); --ownid-tooltip-arrow-horizontal-pos: 22px;"></ownid-tooltip-expandable></ownid-win-button-widget></span><span class="before"></span><span class="after"></span></div><span class="message-root">
                                                    <p class="root"></p>
                                                </span>
                                            </div>
                                            <div class="actions-toolbar"><button class="btn-new-design primary" type="submit" name="login">Sign In</button>
                                                <div></div><a title="Forgot password?" class="forgot-password-link" href="/">Forgot password?</a>
                                            </div>
                                        </form>
                                        <p class="text-align-center">Or</p>
                                        <form class="form-email-onetime"><button class="btn-new-design primary" type="submit">Email One Time Link</button></form>
                                    </div>
                                </div>
                        </div>
                        <div class="account-form signin" style="display: none;">
                            <div class="account-form-dropdown">
                                <h3 class="account-form-title"><a href="#">Welcome, <?php  if (isset($_SESSION['customer'])) echo $_SESSION['customer'] ?></a></h3>
                                <div class="account-form-group">
                                    <h4 class="group-title">Recent Orders</h4><a href="#" class="group-item"><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                            <path
                                                d="M12 1L21.5 6.5V17.5L12 23L2.5 17.5V6.5L12 1ZM5.49388 7.0777L12.0001 10.8444L18.5062 7.07774L12 3.311L5.49388 7.0777ZM4.5 8.81329V16.3469L11.0001 20.1101V12.5765L4.5 8.81329ZM13.0001 20.11L19.5 16.3469V8.81337L13.0001 12.5765V20.11Z"
                                                fill="currentColor"></path>
                                        </svg><span class="group-item-name">View All Orders</span><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon-right">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg></a>
                                    <h4 class="group-title">My Payment Data</h4><a href="#" class="group-item group-item-card"><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                            <path
                                                d="M3.00488 3H21.0049C21.5572 3 22.0049 3.44772 22.0049 4V20C22.0049 20.5523 21.5572 21 21.0049 21H3.00488C2.4526 21 2.00488 20.5523 2.00488 20V4C2.00488 3.44772 2.4526 3 3.00488 3ZM20.0049 12H4.00488V19H20.0049V12ZM20.0049 8V5H4.00488V8H20.0049Z"
                                                fill="currentColor"></path>
                                        </svg><span class="group-item-name">Manage Cards</span><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon-right">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg></a>
                                    <h4 class="group-title">Gift Cards</h4><a href="#" class="group-item group-item-card"><svg
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                            <path
                                                d="M14.5049 2.00293C16.4379 2.00293 18.0049 3.56993 18.0049 5.50293C18.0049 6.04014 17.8839 6.54908 17.6676 7.00397L21.0049 7.00293C21.5572 7.00293 22.0049 7.45064 22.0049 8.00293V12.0029C22.0049 12.5552 21.5572 13.0029 21.0049 13.0029H20.0049V21.0029C20.0049 21.5552 19.5572 22.0029 19.0049 22.0029H5.00488C4.4526 22.0029 4.00488 21.5552 4.00488 21.0029V13.0029H3.00488C2.4526 13.0029 2.00488 12.5552 2.00488 12.0029V8.00293C2.00488 7.45064 2.4526 7.00293 3.00488 7.00293L6.34219 7.00397C6.12591 6.54908 6.00488 6.04014 6.00488 5.50293C6.00488 3.56993 7.57189 2.00293 9.50488 2.00293C10.4849 2.00293 11.3708 2.40569 12.0061 3.05471C12.639 2.40569 13.5249 2.00293 14.5049 2.00293ZM18.0049 13.0029H6.00488V20.0029H18.0049V13.0029ZM20.0049 9.00293H4.00488V11.0029H20.0049V9.00293ZM9.50488 4.00293C8.67646 4.00293 8.00488 4.6745 8.00488 5.50293C8.00488 6.28263 8.59977 6.92338 9.36042 6.99606L9.50488 7.00293H11.0049V5.50293C11.0049 4.72323 10.41 4.08248 9.64934 4.0098L9.50488 4.00293ZM14.5049 4.00293L14.3604 4.0098C13.6473 4.07794 13.0799 4.64536 13.0117 5.35847L13.0049 5.50293V7.00293H14.5049L14.6493 6.99606C15.41 6.92338 16.0049 6.28263 16.0049 5.50293C16.0049 4.72323 15.41 4.08248 14.6493 4.0098L14.5049 4.00293Z"
                                                fill="currentColor"></path>
                                        </svg><span class="group-item-name">Gift Cards</span><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon-right">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg></a>
                                    <h4 class="group-title">Settings</h4><a href="#" class="group-item"><svg xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24" width="24" height="24">
                                            <path
                                                d="M3.33946 17.0002C2.90721 16.2515 2.58277 15.4702 2.36133 14.6741C3.3338 14.1779 3.99972 13.1668 3.99972 12.0002C3.99972 10.8345 3.3348 9.824 2.36353 9.32741C2.81025 7.71651 3.65857 6.21627 4.86474 4.99001C5.7807 5.58416 6.98935 5.65534 7.99972 5.072C9.01009 4.48866 9.55277 3.40635 9.4962 2.31604C11.1613 1.8846 12.8847 1.90004 14.5031 2.31862C14.4475 3.40806 14.9901 4.48912 15.9997 5.072C17.0101 5.65532 18.2187 5.58416 19.1346 4.99007C19.7133 5.57986 20.2277 6.25151 20.66 7.00021C21.0922 7.7489 21.4167 8.53025 21.6381 9.32628C20.6656 9.82247 19.9997 10.8336 19.9997 12.0002C19.9997 13.166 20.6646 14.1764 21.6359 14.673C21.1892 16.2839 20.3409 17.7841 19.1347 19.0104C18.2187 18.4163 17.0101 18.3451 15.9997 18.9284C14.9893 19.5117 14.4467 20.5941 14.5032 21.6844C12.8382 22.1158 11.1148 22.1004 9.49633 21.6818C9.55191 20.5923 9.00929 19.5113 7.99972 18.9284C6.98938 18.3451 5.78079 18.4162 4.86484 19.0103C4.28617 18.4205 3.77172 17.7489 3.33946 17.0002ZM8.99972 17.1964C10.0911 17.8265 10.8749 18.8227 11.2503 19.9659C11.7486 20.0133 12.2502 20.014 12.7486 19.9675C13.1238 18.8237 13.9078 17.8268 14.9997 17.1964C16.0916 16.5659 17.347 16.3855 18.5252 16.6324C18.8146 16.224 19.0648 15.7892 19.2729 15.334C18.4706 14.4373 17.9997 13.2604 17.9997 12.0002C17.9997 10.74 18.4706 9.5632 19.2729 8.6665C19.1688 8.4405 19.0538 8.21822 18.9279 8.00021C18.802 7.78219 18.667 7.57148 18.5233 7.36842C17.3457 7.61476 16.0911 7.43414 14.9997 6.80405C13.9083 6.17395 13.1246 5.17768 12.7491 4.03455C12.2509 3.98714 11.7492 3.98646 11.2509 4.03292C10.8756 5.17671 10.0916 6.17364 8.99972 6.80405C7.9078 7.43447 6.65245 7.61494 5.47428 7.36803C5.18485 7.77641 4.93463 8.21117 4.72656 8.66637C5.52881 9.56311 5.99972 10.74 5.99972 12.0002C5.99972 13.2604 5.52883 14.4372 4.72656 15.3339C4.83067 15.5599 4.94564 15.7822 5.07152 16.0002C5.19739 16.2182 5.3324 16.4289 5.47612 16.632C6.65377 16.3857 7.90838 16.5663 8.99972 17.1964ZM11.9997 15.0002C10.3429 15.0002 8.99972 13.6571 8.99972 12.0002C8.99972 10.3434 10.3429 9.00021 11.9997 9.00021C13.6566 9.00021 14.9997 10.3434 14.9997 12.0002C14.9997 13.6571 13.6566 15.0002 11.9997 15.0002ZM11.9997 13.0002C12.552 13.0002 12.9997 12.5525 12.9997 12.0002C12.9997 11.4479 12.552 11.0002 11.9997 11.0002C11.4474 11.0002 10.9997 11.4479 10.9997 12.0002C10.9997 12.5525 11.4474 13.0002 11.9997 13.0002Z"
                                                fill="currentColor"></path>
                                        </svg><span class="group-item-name">Account Settings</span><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon-right">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg></a><a href="#" class="group-item"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            width="24" height="24">
                                            <path
                                                d="M12 20.8995L16.9497 15.9497C19.6834 13.2161 19.6834 8.78392 16.9497 6.05025C14.2161 3.31658 9.78392 3.31658 7.05025 6.05025C4.31658 8.78392 4.31658 13.2161 7.05025 15.9497L12 20.8995ZM12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364L12 23.7279ZM12 13C13.1046 13 14 12.1046 14 11C14 9.89543 13.1046 9 12 9C10.8954 9 10 9.89543 10 11C10 12.1046 10.8954 13 12 13ZM12 15C9.79086 15 8 13.2091 8 11C8 8.79086 9.79086 7 12 7C14.2091 7 16 8.79086 16 11C16 13.2091 14.2091 15 12 15Z"
                                                fill="currentColor"></path>
                                        </svg><span class="group-item-name">My Addresses</span><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon-right">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg></a><button class="btn-new-design secondary">Sign Out</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="cart-page">
                            <div class="cart-container">
                                <div class="empty-cart">
                                    <div class="empty-cart-face"><svg width="168" height="188" viewBox="0 0 168 188"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M154.082 172.793a19.266 19.266 0 0 1-14.327 6.394H25.988c-4.654 0-9.1-1.985-12.195-5.444a16.271 16.271 0 0 1-4.05-12.693L21.795 55.192h24.01v11.225c0 2.434 1.982 4.404 4.419 4.404 2.437 0 4.418-1.975 4.418-4.404V55.192h59.316v11.225c0 2.434 1.981 4.404 4.418 4.404a4.412 4.412 0 0 0 4.419-4.404V55.192h24.347l11.692 102.687a19.113 19.113 0 0 1-4.75 14.914zM54.642 38.368c0-16.297 13.303-29.555 29.654-29.555 16.352 0 29.66 13.258 29.66 29.555v8.017H54.642zm112.98 118.524l-12.137-106.6a4.412 4.412 0 0 0-4.391-3.907h-28.295v-8.017C122.8 17.208 105.527 0 84.302 0c-21.23 0-38.498 17.214-38.498 38.368v8.017H17.847a4.412 4.412 0 0 0-4.392 3.907L.96 160.057a25.095 25.095 0 0 0 6.24 19.557A25.256 25.256 0 0 0 25.993 188h113.768c7.98 0 15.607-3.4 20.92-9.336a27.951 27.951 0 0 0 6.94-21.772z"
                                                            fill="#d0d0d0"></path>
                                                    </g>
                                                    <g>
                                                        <path d="M59.8 116a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" fill="#d0d0d0"></path>
                                                    </g>
                                                    <g>
                                                        <path d="M108.8 116a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" fill="#d0d0d0"></path>
                                                    </g>
                                                    <g>
                                                        <path
                                                            d="M113.343 154.865C112.308 153.354 102.757 142 85.282 142c-17.472 0-28.99 11.354-30.025 12.881a2.622 2.622 0 0 0 .697 3.653c.445.3.964.46 1.5.454.167.016.338.016.504 0a2.64 2.64 0 0 0 1.694-1.095c.868-1.282 10.891-10.558 25.652-10.558 14.761 0 22.796 9.212 23.664 10.489a2.707 2.707 0 0 0 3.671.7 2.622 2.622 0 0 0 .708-3.648c0-.006 0-.01-.005-.01z"
                                                            fill="#d0d0d0"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg></div>
                                    <h2 class="subtitle">Your Shopping Bag is empty</h2>
                                    <p class="text">You have no items in your shopping bag Let’s go buy something!</p><button
                                        class="btn-new-design primary button-wrap">Continue Shopping</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>


            <main class="page" id="maincontent">
                <a id="contentarea" tabindex="-1"></a>
                <div class="click-handler">
                    <div class="row-contained-EzA hp-hero-banner">
                        <div >
                            <div>
                                <div class="row-root-SkX hero-banner-wrapper" style="text-align: center; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin-right: 0px; margin-left: 0px; display: flex; justify-content: center; flex-direction: column;">
                                    <div class="columnGroup-root-Q2r" style="display: flex;">
                                        <div class="column-root-k2m pagebuilder-column" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; width: 100%;">
                                            <div class="banner-root-Wut hero-banner __PRIMARY_CONTENT_PRELOAD__">
                                                <?php 
                                                    $randomBanner = rand(1, 9);
                                                    switch($randomBanner) {
                                                        case 1:
                                                        case 2:
                                                        case 3: {
                                                            $banner = 'banner_main_HALLOWEEN_2023_1600_1.jpg';
                                                            break;
                                                        }
                                                        case 4:
                                                        case 5:
                                                        case 6: {
                                                            $banner = 'banner_main_EARLY_BIRD_2023_1600_03.jpg';
                                                            break;
                                                        }
                                                        case 7:
                                                        case 8:
                                                        case 9: {
                                                            $banner = 'banner_main_1111_2023_1600.jpg';
                                                            break;
                                                        }
                                                    }
                                                ?>
                                                <a class="banner-link-pPa" href="" aria-label="Hero banner primary">
                                                    <div class="banner-wrapper-WuE" style="background-image: url(&quot;./img/banner/<?= $banner ?>&quot;); background-size: cover; background-position: center center; background-attachment: scroll; background-repeat: no-repeat;">
                                                        <div class="banner-posterOverlay-M6t banner-overlay-EJq">
                                                            <div class="banner-content-rKR" style="width: 100%;"></div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="columnGroup-root-Q2r" style="display: flex;">
                                        <div class="column-root-k2m pagebuilder-column hero-banner-content" style="align-self: flex-start; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; text-align: center; width: 100%;">
                                        </div>
                                    </div>
                                </div>
                                <div class="row-contained-EzA">
                                    <div style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;">
                                        <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                            <style>
                                                .page .hp-hero-banner {
                                                    max-width: 1632px;
                                                }

                                                @media (max-width: 768px) {
                                                    .hp-hero-banner {
                                                        margin-bottom: 12px;
                                                    }
                                                }
                                            </style>
                                        </div>
                                        <div class=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-root-SkX departments-wrapper">
                        <div class="row-contained-EzA">
                            <div class="wrapper">
                                <div class="row-contained-EzA departments desktop">
                                    <div style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px 50px 17px;">
                                        <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                            <style>
                                                main .departments-wrapper:after {
                                                    max-width: 1440px;
                                                    position: relative;
                                                    align-self: center;
                                                }

                                                main .departments-wrapper .departments-circle-wrapper:hover img {
                                                    filter: brightness(80%) contrast(130%);
                                                }

                                                .departments-wrapper .departments-circle-wrapper img {
                                                    transition: filter 200ms ease-out;

                                                    width: 100%;
                                                    height: auto;
                                                    max-width: 150px;
                                                    max-height: 150px;
                                                }

                                                .departments-wrapper .departments-circle-wrapper a {
                                                    display: block;
                                                    padding-bottom: 20px;
                                                }

                                                main .departments-wrapper .departments-circle-wrapper:hover button.btn:after {
                                                    width: 100%;
                                                }

                                                main .departments-wrapper .departments-circle-wrapper button.btn:after {
                                                    -ms-transition: none;
                                                    -moz-transition: none;
                                                    -webkit-transition: none;
                                                    content: "";
                                                    position: absolute;
                                                    height: 2px;
                                                    width: 0;
                                                    bottom: -6px;
                                                    left: 0;
                                                    background: #4a4a4a;
                                                }

                                                main .departments-wrapper .departments-circle-wrapper button.btn {
                                                    color: #4a4a4a;
                                                    font-family: -apple-system, system-ui, BlinkMacSystemFont, segoe ui, Roboto, helvetica neue, Arial, sans-serif;
                                                    font-weight: 500;
                                                    font-size: 15px;
                                                }

                                                @media screen and (min-width: 1440px) {
                                                    main .departments-wrapper .departments.desktop {
                                                        width: 1300px;
                                                    }
                                                }

                                                @media screen and (min-width: 768px) and (max-width: 1280px) {
                                                    .departments-wrapper .departments.desktop>div {
                                                        margin: 0 auto !important;
                                                        padding-right: 20px !important;
                                                        padding-left: 20px !important;
                                                    }
                                                }
                                            </style>
                                        </div>
                                        <div class="columnGroup-root-Q2r" style="display: flex;">
                                            <div class="column-root-k2m pagebuilder-column departments-circle-wrapper" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; padding: 5px 10px 33px; text-align: center; width: 16.6667%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="">
                                                        <img loading="lazy" alt="watches for men" src="./img/catalog/mens.png" title="watches for men" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;" width="150" height="150">
                                                    </a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px; justify-content: flex-start;">
                                                    <div><button priority="high" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;">Men's Watches</button></div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column departments-circle-wrapper" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; padding: 5px 10px 33px; text-align: center; width: 16.6667%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="">
                                                        <img loading="lazy" alt="watches for women" src="./img/catalog/ladies.png" title="watches for women" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0;" width="150" height="150">
                                                    </a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding-bottom: 0px; justify-content: flex-start;">
                                                    <div><button priority="high" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;">Ladies Watches</button></div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column departments-circle-wrapper" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; padding: 5px 10px 33px; text-align: center; width: 16.6667%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="">
                                                        <img loading="lazy" alt="sunglasses" src="./img/catalog/sunglasses.png" title="sunglasses" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;" width="150" height="150">
                                                    </a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding-bottom: 0px; justify-content: flex-start;">
                                                    <div><button priority="high" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;">Sunglasses</button></div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column departments-circle-wrapper" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; padding: 5px 10px 33px; text-align: center; width: 16.6667%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="">
                                                        <img loading="lazy" alt="handbag accessories" src="./img/catalog/handbags_round_150.png" title="handbag accessories" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0;" width="150" height="150">
                                                    </a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding-bottom: 0px; justify-content: flex-start;">
                                                    <div><button priority="high" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;">Handbags</button></div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column departments-circle-wrapper" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; padding: 5px 10px 33px; text-align: center; width: 16.6667%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="">
                                                        <img loading="lazy" alt="luxury pends" src="./img/catalog/pens_round_150.png" title="luxury pends" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;" width="150" height="150">
                                                    </a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding-bottom: 0px; justify-content: flex-start;">
                                                    <div><button priority="high" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;">Luxury Pens</button></div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column departments-circle-wrapper" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; padding: 5px 10px 33px; text-align: center; width: 16.6667%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="">
                                                        <img loading="lazy" alt="beauty" src="./img/catalog/beauty_round_150.png" title="beauty" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;" width="150" height="150">
                                                    </a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding-bottom: 0px; justify-content: flex-start;">
                                                    <div><button priority="high" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;">Beauty</button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="columnGroup-root-Q2r" style="display: flex;">
                                            <div class="column-root-k2m pagebuilder-column departments-circle-wrapper" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; padding: 5px 10px 33px; text-align: center; width: 16.6667%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="">
                                                        <img loading="lazy" alt="flash sale offers" src="./img/catalog/sale_round_150.png" title="flash sale offers" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;" width="150" height="150">
                                                    </a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding-bottom: 0px; justify-content: flex-start;">
                                                    <div><button priority="high" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;">Sale</button></div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column departments-circle-wrapper" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; padding: 5px 10px 33px; text-align: center; width: 16.6667%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="">
                                                        <img loading="lazy" alt="jewelry" src="./img/catalog/jewelry_round_150.png" title="jewelry" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;" width="150" height="150">
                                                    </a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding-bottom: 0px; justify-content: flex-start;">
                                                    <div><button priority="high" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;">Jewelry</button></div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column departments-circle-wrapper" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; padding: 5px 10px 33px; text-align: center; width: 16.6667%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="">
                                                        <img loading="lazy" alt="accessories" src="./img/catalog/accessories_round_150.png" title="accessories" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;" width="150" height="150">
                                                    </a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding-bottom: 0px; justify-content: flex-start;">
                                                    <div><button priority="high" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;">Accessories</button></div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column departments-circle-wrapper" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; padding: 5px 10px 33px; text-align: center; width: 16.6667%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="">
                                                        <img loading="lazy" alt="apparel" src="./img/catalog/outerwear_round_150.png" title="apparel" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;" width="150" height="150">
                                                    </a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding-bottom: 0px; padding-left: 0px; justify-content: flex-start;">
                                                    <div><button priority="high" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;">Apparel</button></div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column departments-circle-wrapper" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; padding: 5px 10px 33px; text-align: center; width: 16.6667%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="">
                                                        <img loading="lazy" alt="shoes" src="./img/catalog/shoes_round_150.png" title="shoes" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;" width="150" height="150">
                                                    </a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding-bottom: 0px; justify-content: flex-start;">
                                                    <div><button priority="high" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;">Shoes</button></div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column departments-circle-wrapper" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; padding: 5px 10px 33px; text-align: center; width: 16.6667%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="">
                                                        <img loading="lazy" alt="preowned watches" src="./img/catalog/preowned_round_150.png" title="preowned watches" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;" width="150" height="150">
                                                    </a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding-bottom: 0px; justify-content: flex-start;">
                                                    <div><button priority="high" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;">Pre-Owned Watches</button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-contained-EzA popular-brand-wrapper">
                        <div>
                            <div class="">
                                <div class="row-contained-EzA slider-wrapper">
                                    <div style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;">
                                        <div class="">
                                            <div class="popular-wrapper" style="text-transform: uppercase;">
                                                <a href="" class="popular-item">Baume</a>
                                                <a href="" class="popular-item">Rolex</a>
                                                <a href="" class="popular-item">Tissot</a>
                                                <a href="" class="popular-item">Seiko</a>
                                                <a href="" class="popular-item">Tudor</a>
                                                <a href="" class="popular-item">Michael</a>
                                                <a href="" class="popular-item">Longines</a>
                                                <a href="" class="popular-item">Omega</a>
                                                <a href="" class="popular-item">Hamilton</a>
                                                <a href="" class="popular-item popular-active">SHOW ALL BRANDS</a>
                                            </div>
                                            <style>
                                                @media only screen and (min-width: 1280px) {
                                                    .popular-wrapper {
                                                        justify-content: center;
                                                    }
                                                }
                                            </style>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-contained-EzA mobile-top-departments departments mobile">
                        <div>
                            <div class="">
                                <div class="row-contained-EzA departments mobile">
                                    <div style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 6px 0px 10px; padding: 10px 0px 14px;">
                                        <h2 class="heading" style="text-align: center; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;">
                                            Top Departments
                                        </h2>
                                        <div class="columnGroup-root-Q2r" style="display: flex;">
                                            <div class="column-root-k2m pagebuilder-column department" style="align-self: stretch; border-style: solid; border-image: initial; display: flex; flex-direction: column; justify-content: center; text-align: left; width: 50%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href=""><img loading="lazy" alt="watches" src="./img/catalog/mens.png" title="watches"></a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH buttons" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px; justify-content: flex-start;">
                                                    <div>
                                                        <button priority="low" type="button" class="btn btn-primary" style="text-align: center; padding: 10px; justify-content: center;">Men's Watches</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column department" style="align-self: stretch; border-style: solid; border-image: initial; display: flex; flex-direction: column; justify-content: center; text-align: left; width: 50%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href=""><img loading="lazy" alt="all sales" src="./img/catalog/sale_round_150.png" title="all sales"></a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH buttons" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px; justify-content: flex-start;">
                                                    <div>
                                                        <button priority="low" type="button" class="btn btn-primary" style="text-align: center; padding: 10px; justify-content: center;">Sales</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="columnGroup-root-Q2r" style="display: flex;">
                                            <div class="column-root-k2m pagebuilder-column department" style="align-self: stretch; border-style: solid; border-image: initial; display: flex; flex-direction: column; justify-content: center; text-align: left; width: 50%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href=""><img loading="lazy" alt="Watches for women" src="./img/catalog/ladies.png" title="Watches for women"></a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH buttons" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px; justify-content: flex-start;">
                                                    <div>
                                                        <button priority="low" type="button" class="btn btn-primary" style="text-align: center; padding: 10px; justify-content: center;">Ladies Watches</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column department" style="align-self: stretch; border-style: solid; border-image: initial; display: flex; flex-direction: column; justify-content: center; text-align: left; width: 50%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href=""><img loading="lazy" alt="sunglasses" src="./img/catalog/sunglasses.png" title="preowned"></a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH buttons" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px; justify-content: flex-start;">
                                                    <div>
                                                        <button priority="low" type="button" class="btn btn-primary" style="text-align: center; padding: 10px; justify-content: center;">Sunglasses</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="columnGroup-root-Q2r" style="display: flex;">
                                            <div class="column-root-k2m pagebuilder-column department" style="align-self: stretch; border-style: solid; border-image: initial; display: flex; flex-direction: column; justify-content: center; text-align: left; width: 50%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href=""><img loading="lazy" alt="beauty" src="./img/catalog/beauty_round_150.png" title="beauty"></a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH buttons" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px; justify-content: flex-start;">
                                                    <div>
                                                        <button priority="low" type="button" class="btn btn-primary" style="text-align: center; padding: 10px; justify-content: center;">Fragrances</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column department" style="align-self: stretch; border-style: solid; border-image: initial; display: flex; flex-direction: column; justify-content: center; text-align: left; width: 50%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href=""><img loading="lazy" alt="wallets" src="./img/catalog/accessories_round_150.png" title="wallets"></a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH buttons" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px; justify-content: flex-start;">
                                                    <div>
                                                        <button priority="low" type="button" class="btn btn-primary" style="text-align: center; padding: 10px; justify-content: center;">Accessories</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="columnGroup-root-Q2r" style="display: flex;">
                                            <div class="column-root-k2m pagebuilder-column department" style="align-self: stretch; border-style: solid; border-image: initial; display: flex; flex-direction: column; justify-content: center; text-align: left; width: 50%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href=""><img loading="lazy" alt="handbags" src="./img/catalog/handbags_round_150.png" title="handbags"></a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH buttons" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px; justify-content: flex-start;">
                                                    <div>
                                                        <button priority="low" type="button" class="btn btn-primary" style="text-align: center; padding: 10px; justify-content: center;">Handbags</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column department" style="align-self: stretch; border-style: solid; border-image: initial; display: flex; flex-direction: column; justify-content: center; text-align: left; width: 50%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href=""><img loading="lazy" alt="jewelry" src="./img/catalog/jewelry_round_150.png" title="jewelry"></a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-stacked-Ylb buttons" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px; justify-content: flex-start;">
                                                    <div>
                                                        <button priority="low" type="button" class="btn btn-primary" style="text-align: center; padding: 10px; justify-content: center;">Jewelry</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="columnGroup-root-Q2r" style="display: flex;">
                                            <div class="column-root-k2m pagebuilder-column department" style="align-self: stretch; border-style: solid; border-image: initial; display: flex; flex-direction: column; justify-content: center; text-align: left; width: 50%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href=""><img loading="lazy" alt="outerwear" src="./img/catalog/outerwear_round_150.png" title="outerwear"></a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH buttons" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px; justify-content: flex-start;">
                                                    <div>
                                                        <button priority="low" type="button" class="btn btn-primary" style="text-align: center; padding: 10px; justify-content: center;">Apparel</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column department" style="align-self: stretch; border-style: solid; border-image: initial; display: flex; flex-direction: column; justify-content: center; text-align: left; width: 50%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href=""><img loading="lazy" alt="shoes" src="./img/catalog/shoes_round_150.png" title="shoes"></a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH buttons" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px; justify-content: flex-start;">
                                                    <div>
                                                        <button priority="low" type="button" class="btn btn-primary" style="text-align: center; padding: 10px; justify-content: center;">Shoes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="columnGroup-root-Q2r" style="display: flex;">
                                            <div class="column-root-k2m pagebuilder-column department" style="align-self: stretch; border-style: solid; border-image: initial; display: flex; flex-direction: column; justify-content: center; text-align: left; width: 50%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href=""><img loading="lazy" alt="pens" src="./img/catalog/pens_round_150.png" title="pens"></a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH buttons" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px; justify-content: flex-start;">
                                                    <div>
                                                        <button priority="low" type="button" class="btn btn-primary" style="text-align: center; padding: 10px; justify-content: center;">Luxury Pens</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column department" style="align-self: stretch; border-style: solid; border-image: initial; display: flex; flex-direction: column; justify-content: center; text-align: left; width: 50%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href=""><img loading="lazy" alt="preowned" src="./img/catalog/preowned_round_150.png" title="preowned"></a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH buttons" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px; justify-content: flex-start;">
                                                    <div>
                                                        <button priority="low" type="button" class="btn btn-primary" style="text-align: center; padding: 10px; justify-content: center;">Pre-owned</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-contained-EzA daily-deal-wrapper">
                        <div >
                            <div class="homepage-general-h2-style">
                                <div class="row-contained-EzA dd-heading">
                                    <div style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;">
                                        <h2 class="homepage-general-h2-style" style="text-align: center; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;">
                                            Featured Daily Deals
                                        </h2>
                                        <div class="buttons-root-nkA buttons-inline-zrH hp-block-btn homepage-general-button-style" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin-bottom: 9px; justify-content: center; text-align: center;">
                                            <div class="featured-daily-deals-button">
                                                <button priority="high" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;">SHOP ALL DEALS</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-contained-EzA dd-product-wrapper">
                                    <div style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;">
                                        <div class="text-root-zS_" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                            <p id="A677L2O"></p>
                                            <div class="widget block block-product-daily-deals">
                                                <ul>
                                                    <li data-content-type="product-daily-deails">
                                                        <a href="./detail.php?model=<?= $featuredDeals0['model'] ?>">
                                                            <img width="300" height="300" loading="lazy" src="./img/watches/<?php echo $featuredDeals0['img1'] ?>" alt="Rolex">
                                                            <span class="product-name">
                                                                <b><?php echo $featuredDeals0['brandName'] ?></b>
                                                                <?php echo $featuredDeals0['name'] ?>
                                                            </span>
                                                            <div class="price-wrapper">
                                                                <div class="was-price-wrapper">
                                                                    <span class="was-wrapper">
                                                                        Was:
                                                                        <span class="convert-currency">
                                                                            $<?php
                                                                                $was1 = $featuredDeals0['price'] / ($featuredDeals0['sale'] / 100);
                                                                                $was1 = number_format($was1, 2, '.', '');
                                                                                echo $was1;
                                                                            ?>
                                                                        </span>
                                                                    </span>
                                                                    <span class="discount-value ">
                                                                        <?php echo $featuredDeals0['sale'] ?>% Off </span>
                                                                </div>
                                                                <div class="now-price">
                                                                    Now:
                                                                    <span class="convert-currency">$<?php echo $featuredDeals0['price'] ?></span>
                                                                </div>
                                                                <div class="after-price">
                                                                    after
                                                                    <span class="convert-currency">
                                                                        $<?php
                                                                            $coupon1 = $was1 - $featuredDeals0['price'];
                                                                            echo $coupon1;
                                                                        ?>
                                                                    </span>
                                                                    coupon
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li data-content-type="product-daily-deails">
                                                        <a href="./detail.php?model=<?= $featuredDeals1['model'] ?>">
                                                            <img width="300" height="300" loading="lazy" src="./img/watches/<?php echo $featuredDeals1['img1'] ?>" alt="Rolex">
                                                            <span class="product-name">
                                                                <b><?php echo $featuredDeals1['brandName'] ?></b>
                                                                <?php echo $featuredDeals1['name'] ?>
                                                            </span>
                                                            <div class="price-wrapper">
                                                                <div class="was-price-wrapper">
                                                                    <span class="was-wrapper">
                                                                        Was:
                                                                        <span class="convert-currency">
                                                                            $<?php
                                                                                $was2 = $featuredDeals1['price'] / ($featuredDeals1['sale'] / 100);
                                                                                $was2 = number_format($was2, 2, '.', '');
                                                                                echo $was2;
                                                                            ?>
                                                                        </span>
                                                                    </span>
                                                                    <span class="discount-value ">
                                                                        <?php echo $featuredDeals1['sale'] ?>% Off </span>
                                                                </div>
                                                                <div class="now-price">
                                                                    Now:
                                                                    <span class="convert-currency">$<?php echo $featuredDeals1['price'] ?></span>
                                                                </div>
                                                                <div class="after-price">
                                                                    after
                                                                    <span class="convert-currency">
                                                                        $<?php
                                                                            $coupon2 = $was2 - $featuredDeals1['price'];
                                                                            echo $coupon2;
                                                                        ?>
                                                                    </span>
                                                                    coupon
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li data-content-type="product-daily-deails">
                                                        <a href="./detail.php?model=<?= $featuredDeals2['model'] ?>">
                                                            <img width="300" height="300" loading="lazy" src="./img/watches/<?php echo $featuredDeals2['img1'] ?>" alt="Rolex">
                                                            <span class="product-name">
                                                                <b><?php echo $featuredDeals2['brandName'] ?></b>
                                                                <?php echo $featuredDeals2['name'] ?>
                                                            </span>
                                                            <div class="price-wrapper">
                                                                <div class="was-price-wrapper">
                                                                    <span class="was-wrapper">
                                                                        Was:
                                                                        <span class="convert-currency">
                                                                            $<?php
                                                                                $was3 = $featuredDeals2['price'] / ($featuredDeals0['sale'] / 100);
                                                                                $was3 = number_format($was3, 2, '.', '');
                                                                                echo $was3;
                                                                            ?>
                                                                        </span>
                                                                    </span>
                                                                    <span class="discount-value ">
                                                                        <?php echo $featuredDeals2['sale'] ?>% Off </span>
                                                                </div>
                                                                <div class="now-price">
                                                                    Now:
                                                                    <span class="convert-currency">$<?php echo $featuredDeals2['price'] ?></span>
                                                                </div>
                                                                <div class="after-price">
                                                                    after
                                                                    <span class="convert-currency">
                                                                        $<?php
                                                                            $coupon3 = $was3 - $featuredDeals2['price'];
                                                                            echo $coupon3;
                                                                        ?>
                                                                    </span>
                                                                    coupon
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li data-content-type="product-daily-deails">
                                                        <a href="./detail.php?model=<?= $featuredDeals3['model'] ?>">
                                                            <img width="300" height="300" loading="lazy" src="./img/watches/<?php echo $featuredDeals3['img1'] ?>" alt="Rolex">
                                                            <span class="product-name">
                                                                <b><?php echo $featuredDeals3['brandName'] ?></b>
                                                                <?php echo $featuredDeals3['name'] ?>
                                                            </span>
                                                            <div class="price-wrapper">
                                                                <div class="was-price-wrapper">
                                                                    <span class="was-wrapper">
                                                                        Was:
                                                                        $<span class="convert-currency">
                                                                            <?php
                                                                                $was4 = $featuredDeals3['price'] / ($featuredDeals3['sale'] / 100);
                                                                                $was4 = number_format($was4, 2, '.', '');
                                                                                echo $was4;
                                                                            ?>
                                                                        </span>
                                                                    </span>
                                                                    <span class="discount-value ">
                                                                        <?php echo $featuredDeals3['sale'] ?>% Off </span>
                                                                </div>
                                                                <div class="now-price">
                                                                    Now:
                                                                    <span class="convert-currency">$<?php echo $featuredDeals3['price'] ?></span>
                                                                </div>
                                                                <div class="after-price">
                                                                    after
                                                                    <span class="convert-currency">
                                                                        $<?php
                                                                            $coupon4 = $was4 - $featuredDeals3['price'];
                                                                            echo $coupon4;
                                                                        ?>
                                                                    </span>
                                                                    coupon
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <p></p>
                                            <p>&nbsp;</p>
                                        </div>
                                        <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                            <style>
                                                @media screen and (min-width: 768px) {
                                                    .daily-deal-wrapper .products ul li a {
                                                        padding-top: 20px;
                                                    }
                                                }

                                                .daily-deal-wrapper ul li {
                                                    padding: 20px 10px 0;
                                                }
                                            </style>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-contained-EzA trending-wrapper">
                        <div >
                            <div class="homepage-general-h2-style" style="margin-bottom: 30px;">
                                <div class="row-contained-EzA trending-row-first">
                                    <div>
                                        <h2 class="homepage-general-h2-style">Trending Now</h2>
                                    </div>
                                </div>
                                <div class="row-contained-EzA trending-tabs-wrapper">
                                    <div >
                                        <div class="">
                                            
                                            <div class="trending-tabs" id="trending-tabs">
                                                <span class="btn-new-design tag tab-item active" data-trending-id="1">
                                                    Watches
                                                </span>
                                                <span class="btn-new-design tag tab-item " data-trending-id="3">
                                                    Fragrances
                                                </span>
                                                <span class="btn-new-design tag tab-item " data-trending-id="5">
                                                    Sunglasses
                                                </span>
                                                <span class="btn-new-design tag tab-item " data-trending-id="2">
                                                    Luxury Pens
                                                </span>
                                                <span class="btn-new-design tag tab-item " data-trending-id="4">
                                                    Jewelry
                                                </span>
                                                <span class="btn-new-design tag tab-item " data-trending-id="7">
                                                    Bags
                                                </span>
                                                <span class="btn-new-design tag tab-item " data-trending-id="8">
                                                    Shoes
                                                </span>
                                                <span class="btn-new-design tag tab-item " data-trending-id="9">
                                                    Apparel
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-contained-EzA trending-row algolia-id-1 active">
                                    <div style="border-style: none; border-image: initial; border-radius: 0px;">
                                        <div class="columnGroup-root-Q2r" style="display: flex;">
                                            <div class="column-root-k2m pagebuilder-column slider-wrapper" style="align-self: stretch; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; padding: 0px 10px 0px 0px; width: 100%;">
                                                <div class="trending-now-wrapper">
                                                    <div class="algolia-trending product-card">
                                                        <div class="trending-slider-wrapper trending-slider-algolia-id-1">
                                                            <div class="swiper" >
                                                                <style>
                                                    
                                                                    @media (max-width: 767px) {
                                                                        .swiper {
                                                                        display: none;
                                                                        }
                                                                    }
                                                                </style>
                                                                <div class="slider-container" style="position: relative;">
                                                                    <div aria-live="polite" aria-atomic="true" tabindex="-1" style="position: absolute; width: 1px; height: 1px; overflow: hidden; padding: 0px; margin: -1px; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; border: 0px;">
                                                                        Slide 1 of 20
                                                                    </div>
                                                                    <div style="align-items: center; justify-content: flex-start; position: absolute; display: flex; z-index: 1; inset: 0px; pointer-events: none;">
                                                                        <div class="slider-control-centerleft slider-navigation-wrapper" style="pointer-events: auto;">
                                                                            <div class="swiper-button-prev"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div style="align-items: center; justify-content: flex-end; position: absolute; display: flex; z-index: 1; inset: 0px; pointer-events: none;">
                                                                        <div class="slider-control-centerright slider-navigation-wrapper" style="pointer-events: auto;">
                                                                            <div class="swiper-button-next"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="slider-frame swiper-wrapper" aria-label="carousel-slider" role="region" tabindex="-1" style="overflow: hidden; width: 100%; position: relative; outline: none; height: auto; transition: height 300ms ease-in-out 0s; will-change: height; user-select: none;">
                                                                        <div id="slideshow1" class="slider-list" style="width: 400%;user-select: auto; display: flex; margin: 0 auto;transition: transform 0.3s ease;">
                                                                            <?php $indexTrending = 1; ?>
                                                                            <?php while($trendingRow = $trendingResult->fetch_assoc()) { ?>
                                                                                <div class="slide slide-visible <?php if($indexTrending==1 or $indexTrending==6 or $indexTrending==11 or $indexTrending==16) echo 'slide-current'; else echo ''?>" style="width: 1.66667%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;">
                                                                                    <div class="swiper-slide">
                                                                                        <div class="item-root-XLH product-content">
                                                                                            <a class="item-images-yv2 product-image" href="./detail.php?model=<?= $trendingRow['model'] ?>">
                                                                                                <img src="./img/watches/<?= $trendingRow['img1'] ?>" alt="" width="250" height="250" class="product-img" loading="lazy" draggable="false">
                                                                                            </a>
                                                                                            <a class="item-name-LrP product-name" href="./detail.php?model=<?= $trendingRow['model'] ?>">
                                                                                                <span class="brand-name"> <?= $trendingRow['brandName'] ?> </span>
                                                                                                <span>
                                                                                                    <?= $trendingRow['name'] ?>
                                                                                                </span>
                                                                                            </a>
                                                                                            <div class="price-wrapper trending">
                                                                                                <div class="now-price"><span>$<?= $trendingRow['price'] ?></span><span class="discount-value show-red"><?= $trendingRow['sale'] ?>% Off</span></div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <?php $indexTrending++; ?>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="trending-now-mobile">
                                                                <style>
                                                                    @media (min-width: 767px) {
                                                                        .trending-now-mobile {
                                                                        display: none;
                                                                        }
                                                                }
                                                                </style>
                                                                <?php 
                                                                    $sqlTrending = 'SELECT * FROM watches 
                                                                    JOIN brands ON watches.brand = brands.brandId
                                                                    JOIN styles ON watches.style = styles.styleId
                                                                    JOIN movements ON watches.movement = movements.moveId
                                                                    JOIN categories ON watches.category = categories.cateId
                                                                    JOIN features ON watches.features = features.feaId
                                                                    JOIN types ON watches.type = types.typeId
                                                                    JOIN caseshapes ON watches.caseShape = caseshapes.caseId
                                                                    ORDER BY watches.view DESC
                                                                    LIMIT 20';
                                                                    $stmt = $conn->prepare($sqlTrending);
                                                                    $stmt->execute(); 
                                                                    $trendingResult = $stmt->get_result();
                                                                ?>
                                                                <?php while($trendingRow = $trendingResult->fetch_assoc()) { ?>
                                                                    <div class="trending-now-item">
                                                                        <div class="item-root-XLH product-content">
                                                                            <a class="item-images-yv2 product-image" href="./detail.php?model=<?= $trendingRow['model'] ?>">
                                                                                <img src="./img/watches/<?= $trendingRow['img1'] ?>" alt="" width="250" height="250" class="product-img" loading="lazy">
                                                                            </a>
                                                                            <a class="item-name-LrP product-name" href="./detail.php?model=<?= $trendingRow['model'] ?>">
                                                                                <span class="brand-name"><?= $trendingRow['brandName'] ?> </span>
                                                                                <span><?= $trendingRow['name'] ?></span>
                                                                            </a>
                                                                            <div class="price-wrapper trending" wz_dt_ref="true">
                                                                                <div class="now-price"><span>$<?= $trendingRow['price'] ?></span><span class="discount-value show-red"><?= $trendingRow['sale'] ?>% Off</span></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div></div>
                        </div>
                    </div>
                    <div class="row-contained-EzA find-for-anyone-wapper">
                        <div style="display: flex; justify-content: flex-start; flex-direction: column;">
                            <div class="">
                                <div class="row-contained-EzA trust-since-block">
                                    <div style="display: flex; justify-content: flex-start; flex-direction: column;">
                                        <div class="">
                                            <style>
                                                .find-for-anyone-container {
                                                    background: #4d585e;
                                                    padding: 40px 20px 0 20px;
                                                    min-height: 580px;
                                                    border-radius: 10px;
                                                    margin: 0 16px;
                                                }

                                                .find-for-anyone-container .find-for-anyone-header-star-wrapper {
                                                    display: flex;
                                                    flex-direction: column;
                                                    justify-content: center;
                                                    gap: 6px;
                                                }

                                                .find-for-anyone-container .find-for-anyone-header-star-wrapper p {
                                                    text-align: center;
                                                }

                                                .find-for-anyone-container .find-for-anyone-header-star-wrapper .find-for-anyone-header-star p {
                                                    margin-left: 10px;
                                                }

                                                .find-for-anyone-container .find-for-anyone-header-title-text-desktop {
                                                    display: none;
                                                }

                                                .new-design .find-for-anyone-container {
                                                    display: block;
                                                }

                                                .find-for-anyone-container * {
                                                    /* font-family: "Inter"; */
                                                }

                                                .find-for-anyone-body {
                                                    margin-top: 30px;
                                                    display: flex;
                                                    flex-direction: column;
                                                    border-top: 1px solid rgba(255, 255, 255, 0.2);
                                                    max-width: 1440px;
                                                    margin-left: auto;
                                                    margin-right: auto;
                                                }

                                                .find-for-anyone-body .tw2023-find-for-anyone-collapsible-wrapper {
                                                    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
                                                }

                                                .find-for-anyone-container>.find-for-anyone-header {
                                                    display: flex;
                                                    flex-direction: column;
                                                    align-items: center;
                                                    gap: 15px;
                                                }

                                                .find-for-anyone-container>.find-for-anyone-header .find-for-anyone-header-title {
                                                    display: flex;
                                                    justify-content: center;
                                                    align-items: center;
                                                    gap: 15px;
                                                }

                                                .find-for-anyone-container .find-for-anyone-header .find-for-anyone-header-star {
                                                    display: flex;
                                                }

                                                .find-for-anyone-container>.find-for-anyone-header p {
                                                    font-weight: 600;
                                                    font-size: 14px;
                                                    color: #ffffff;
                                                    margin: 0;
                                                }

                                                .find-for-anyone-container>.find-for-anyone-header span {
                                                    font-weight: 400;
                                                    font-size: 14px;
                                                    opacity: 0.6;
                                                }

                                                .find-for-anyone-container .find-for-anyone-header .find-for-anyone-header-star p a {
                                                    color: white;
                                                    opacity: 1;
                                                }

                                                .find-for-anyone-container>.find-for-anyone-header h2 {
                                                    font-style: normal;
                                                    font-weight: 600;
                                                    font-size: 20px;
                                                    color: #ffffff;
                                                    margin: 0;
                                                    line-height: 24px;
                                                    text-align: left;
                                                }

                                                .find-for-anyone-collapsible {
                                                    font-style: normal;
                                                    font-weight: 600;
                                                    font-size: 14px;
                                                    color: #ffffff;
                                                    background-color: transparent;
                                                    cursor: pointer;
                                                    width: 100%;
                                                    letter-spacing: -0.02em;
                                                    text-align: left;
                                                    outline: none;
                                                    position: relative;
                                                    border: none;
                                                    padding: 16px 0;
                                                    display: flex;
                                                    align-items: center;
                                                    gap: 15px;
                                                }

                                                .find-for-anyone-collapsible:hover {
                                                    background-color: transparent;
                                                }

                                                .tw2023-find-for-anyone-collapsible-wrapper.active .find-for-anyone-collapsible {
                                                    color: #fffefe;
                                                }

                                                .find-for-anyone-collapsible::after,
                                                .find-for-anyone-collapsible::before {
                                                    content: "";
                                                    position: absolute;
                                                    width: 10.5px;
                                                    height: 1.5px;
                                                    background-color: #d5d5d5;
                                                    transition: 0.3s ease-in-out all;
                                                    top: 50%;
                                                    right: 0;
                                                    opacity: 0.4;
                                                }

                                                .find-for-anyone-collapsible::after {
                                                    transform: rotate(90deg);
                                                }

                                                .tw2023-find-for-anyone-collapsible-wrapper.active .find-for-anyone-collapsible::before {
                                                    transform: rotate(90deg) scale(0);
                                                    background-color: #fffefe;
                                                }

                                                .tw2023-find-for-anyone-collapsible-wrapper.active .find-for-anyone-collapsible::after {
                                                    transform: rotate(180deg);
                                                    background-color: #fffefe;
                                                }

                                                .find-for-anyone-content {
                                                    padding: 0 32px;
                                                    max-height: 0;
                                                    overflow: hidden;
                                                    transition: all 0.3s ease;
                                                }

                                                .find-for-anyone-content>p {
                                                    font-weight: 400;
                                                    font-size: 14px;
                                                    text-align: left;
                                                    margin: 0 0 15px 0;
                                                    color: rgba(255, 254, 254, 0.7);
                                                }

                                                .tw2023-find-for-anyone-collapsible-wrapper.active .find-for-anyone-content {
                                                    max-height: 150px !important;
                                                }

                                                /*Desktop*/
                                                @media screen and (min-width: 768px) {
                                                    .find-for-anyone-container {
                                                        padding: 60px 4px 60px 4px;
                                                        margin: 90px 0 0 0;
                                                        min-height: unset;
                                                    }

                                                    .find-for-anyone-container .find-for-anyone-header-star-wrapper .find-for-anyone-header-star p {
                                                        margin-left: 0px;
                                                    }

                                                    .find-for-anyone-container .find-for-anyone-header-title-text-desktop {
                                                        display: block;
                                                    }

                                                    .find-for-anyone-container .find-for-anyone-header-star-wrapper {
                                                        flex-direction: row;
                                                        align-items: center;
                                                        gap: 11px;
                                                    }

                                                    .find-for-anyone-container .find-for-anyone-header-star-wrapper .find-for-anyone-header-star svg {
                                                        width: 20px;
                                                        height: 20px;
                                                    }

                                                    .find-for-anyone-container .find-for-anyone-header-content {
                                                        gap: 17px;
                                                        display: flex;
                                                        flex-direction: column;
                                                    }

                                                    .find-for-anyone-container .find-for-anyone-header .find-for-anyone-header-title svg {
                                                        width: 120px;
                                                        height: 120px;
                                                    }

                                                    .find-for-anyone-container .find-for-anyone-header h2 {
                                                        font-size: 32px;
                                                    }

                                                    .find-for-anyone-container .find-for-anyone-header-title-text-mobile {
                                                        display: none;
                                                    }

                                                    .find-for-anyone-container>.find-for-anyone-header {
                                                        flex-direction: row;
                                                        gap: 40px;
                                                        justify-content: center;
                                                    }

                                                    .find-for-anyone-container>.find-for-anyone-header>svg {
                                                        height: 118px;
                                                        width: 118px;
                                                    }

                                                    .find-for-anyone-body {
                                                        flex-direction: row;
                                                        border: none;
                                                        margin-top: 60px;
                                                    }

                                                    .find-for-anyone-container>.find-for-anyone-header .find-for-anyone-header-title h2 {
                                                        font-size: 32px;
                                                        line-height: 38px;
                                                        margin-top: 3px;
                                                    }

                                                    .find-for-anyone-body .tw2023-find-for-anyone-collapsible-wrapper {
                                                        border: none;
                                                        flex: 1;
                                                    }

                                                    .find-for-anyone-content {
                                                        max-height: unset !important;
                                                        padding: 0 14px;
                                                    }

                                                    .find-for-anyone-content>p {
                                                        text-align: center;
                                                        font-size: 16px;
                                                    }

                                                    .find-for-anyone-container .find-for-anyone-body .tw2023-find-for-anyone-collapsible-wrapper .find-for-anyone-collapsible {
                                                        display: flex;
                                                        flex-direction: column;
                                                        padding: 0 0 6px 0;
                                                        font-size: 18px;
                                                        text-align: center;
                                                        cursor: default;
                                                    }

                                                    .find-for-anyone-container>.find-for-anyone-header p {
                                                        font-size: 18px;
                                                    }

                                                    .find-for-anyone-container>.find-for-anyone-header .find-for-anyone-header-star p {
                                                        padding: 0 11px;
                                                        border-right: 1px solid rgba(255, 255, 255, 0.2);
                                                    }

                                                    .find-for-anyone-container>.find-for-anyone-header span {
                                                        font-size: 18px;
                                                    }

                                                    .find-for-anyone-container .find-for-anyone-header-star {
                                                        display: flex;
                                                        align-items: center;
                                                    }

                                                    .find-for-anyone-header-star>svg {
                                                        width: 19px;
                                                        height: 19px;
                                                    }

                                                    .find-for-anyone-container>.find-for-anyone-header>.find-for-anyone-header-star p {
                                                        font-size: 18px;
                                                    }

                                                    .find-for-anyone-collapsible>svg {
                                                        width: 22px;
                                                        height: 27px;
                                                    }

                                                    .find-for-anyone-collapsible::after,
                                                    .find-for-anyone-collapsible::before {
                                                        display: none;
                                                    }
                                                }

                                                @media screen and (min-width: 1024px) {
                                                    .find-for-anyone-container {
                                                        padding: 60px 78px 60px 78px;
                                                    }
                                                }

                                                @media screen and (max-width: 785px) {
                                                    .find-for-anyone-container {
                                                        margin: 70px 0 0 0;
                                                    }
                                                }
                                            </style>

                                            <div class="find-for-anyone-container">
                                                <div class="find-for-anyone-header">
                                                    <div class="find-for-anyone-header-title">
                                                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M13.4356 31.6418L8.26504 26.7019L9.07094 25.0082L16.2817 25.6595L15.6115 27.0675L13.9806 26.8921L12.9142 29.1349L14.1058 30.2338L13.4356 31.6418ZM12.8016 26.7624L10.0944 26.4695L10.0719 26.5183L12.0505 28.3409L12.8016 26.7624Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M15.0537 16.4655L18.4787 19.2157C19.6319 20.1417 19.674 21.6459 18.5834 22.9728C17.4889 24.3047 15.9949 24.5668 14.8403 23.6411L11.4152 20.8909L12.3434 19.7621L15.673 22.4357C16.2752 22.9202 17.0646 22.8391 17.6028 22.1848C18.1421 21.5274 18.0587 20.7508 17.4566 20.2678L14.127 17.5942L15.0551 16.4653L15.0537 16.4655Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M16.8047 14.7765L21.3162 11.3237L22.0314 12.2579L20.3499 13.5452L23.7407 17.9709L22.5923 18.8492L19.2015 14.4234L17.5199 15.7107L16.8047 14.7765Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M23.4255 10.0575L24.7612 9.46539L25.8665 12.0275L28.5774 10.8245L27.4721 8.2624L28.8048 7.67071L31.4823 13.8803L30.1495 14.472L29.0439 11.907L26.333 13.11L27.4387 15.675L26.103 16.2671L23.4255 10.0575Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M31.3782 6.93783L35.9322 6.05592L36.1347 7.22097L33.0091 7.82638L33.2863 9.41857L36.1776 8.85773L36.3802 10.0228L33.4888 10.5836L33.7663 12.1787L36.905 11.57L37.1075 12.7351L32.5406 13.6203L31.3781 6.93639L31.3782 6.93783Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M43.8774 12.7836L42.627 12.742L39.8928 8.35692L39.8435 8.35499L39.5973 12.64L38.1496 12.5907L38.539 5.78241L39.8104 5.82548L42.5218 10.2064L42.5815 10.2083L42.8266 5.92638L44.2683 5.97508L43.8788 12.7834L43.8774 12.7836Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M46.6653 6.34974L52.054 7.85715L51.7049 9.00069L49.6963 8.43905L48.0446 13.8549L46.6731 13.4708L48.3249 8.05492L46.3163 7.49328L46.6653 6.34974Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M52.2359 15.5462L50.9383 14.9322L54.0042 8.77039L55.3018 9.38438L52.2359 15.5462Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M59.7451 15.0476C60.1085 14.375 59.9253 13.6728 59.2905 13.2151C58.4408 12.6017 57.3954 12.8571 56.5387 14.0112C55.659 15.1966 55.7596 16.2301 56.5931 16.8324C57.2116 17.2792 57.9263 17.2705 58.4768 16.7574L59.6466 17.6103C58.7633 18.5398 57.2121 18.8718 55.8057 17.8561C54.3374 16.796 54.0208 14.9721 55.3636 13.1635C56.7102 11.35 58.5853 11.1141 60.0341 12.1607C61.3038 13.0777 61.7177 14.5064 60.9189 15.897L59.7454 15.0505L59.7451 15.0476Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M59.9043 21.3976L58.9169 20.3645L63.945 15.6136L64.9324 16.6467L59.9043 21.3976Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M66.4107 18.2077L69.5013 22.8125L68.5013 23.4873L67.3494 21.7715L62.6151 24.9653L61.8285 23.7935L66.5628 20.5998L65.4108 18.884L66.4108 18.2092L66.4107 18.2077Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M70.9962 26.0788L68.7405 28.5809L68.7627 28.6426L72.0718 29.0414L72.6186 30.5487L67.5993 29.8073L65.3153 30.6706L64.8305 29.3344L67.1145 28.4711L70.4494 24.5715L70.9962 26.0788Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M15.3731 54.5643C14.8456 53.6867 13.786 53.4815 12.5492 54.1739C11.305 54.8691 10.9444 55.8379 11.4912 56.7482C11.9759 57.556 12.7354 57.7782 13.4846 57.3836L12.7428 56.1513L13.69 55.6213L15.1337 58.0233L14.3845 58.4421C12.8182 59.3168 11.2459 58.8139 10.3755 57.3665C9.40172 55.7467 9.913 54.0015 11.7971 52.9501C13.7269 51.8717 15.5622 52.4059 16.474 53.9232C17.2542 55.221 17.0266 56.6841 15.9435 57.4976L15.2017 56.2653C15.6672 55.7994 15.747 55.1897 15.3716 54.5643H15.3731Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M22.4721 61.0934L19.2817 64.1065C18.2074 65.1208 16.6913 65.0125 15.4944 63.8344C14.2945 62.6519 14.2176 61.1931 15.2919 60.1788L18.4823 57.1656L19.4989 58.1672L16.3972 61.0962C15.8357 61.6262 15.818 62.3912 16.4076 62.971C17.0001 63.5537 17.7907 63.5509 18.3522 63.0209L21.4539 60.0918L22.4706 61.0934H22.4721Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M19.3726 67.1922L24.9819 62.726L26.5808 63.6677L25.0203 70.5173L23.6904 69.7352L24.0717 68.1881L21.9541 66.9415L20.701 67.9758L19.3711 67.1937L19.3726 67.1922ZM24.3524 67.0697L24.9863 64.504L24.9405 64.4769L22.8629 66.1936L24.3524 67.0711V67.0697Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M29.276 65.051L31.8605 65.846C33.3486 66.3033 33.9411 67.3775 33.5259 68.6326C33.2392 69.4959 32.62 69.9959 31.7718 70.0743L32.3511 72.9577L30.8217 72.4876L30.3222 69.8663L29.3115 69.5557L28.5697 71.7952L27.1836 71.3693L29.276 65.0525V65.051ZM30.6074 68.7707C31.4009 69.0144 31.893 68.8192 32.0999 68.1938C32.3083 67.5641 32.0349 67.1025 31.234 66.8575L30.3001 66.5697L29.6661 68.4815L30.6074 68.7707Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M34.2227 73.351L37.0805 66.8988L38.9498 67.027L40.8265 73.8054L39.272 73.6986L38.8745 72.1557L36.3978 71.9847L35.7772 73.4578L34.2227 73.351ZM38.5893 71.0374L37.9302 68.4759L37.877 68.4716L36.847 70.9177L38.5893 71.0374Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M48.8454 72.6586L47.6086 72.8722L43.9025 69.2722L43.8538 69.2807L44.6148 73.388L43.1829 73.6344L41.9727 67.1082L43.2287 66.8916L46.9111 70.4931L46.9702 70.4831L46.2092 66.3788L47.6337 66.1337L48.844 72.66L48.8454 72.6586Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M48.4062 65.9001L53.5752 63.7033L54.0584 64.7604L52.1315 65.5796L54.4234 70.59L53.1083 71.1484L50.8164 66.138L48.8895 66.9572L48.4062 65.9001Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M54.2871 63.2346L58.0213 60.5862L58.732 61.518L56.1697 63.3358L57.142 64.6094L59.5123 62.9283L60.223 63.8601L57.8528 65.5411L58.8266 66.8162L61.3993 64.9912L62.11 65.9229L58.3656 68.5799L54.2886 63.2375L54.2871 63.2346Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M58.8457 59.8611L61.9267 56.5246L62.8222 57.2925L60.7076 59.5819L61.9311 60.6318L63.8861 58.5148L64.7816 59.2827L62.8266 61.3997L64.0531 62.4525L66.1766 60.1531L67.0721 60.921L63.9822 64.2661L58.8472 59.8582L58.8457 59.8611Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M68.6209 58.8995L62.5859 55.7211L63.7637 53.6411C64.7582 51.886 66.4989 51.4073 68.3785 52.3974C70.2641 53.3904 70.7931 55.0643 69.7882 56.8366L68.6194 58.8995H68.6209ZM68.6667 56.3123C69.2858 55.2182 69.0302 54.3349 67.6825 53.6255C66.3422 52.9188 65.4379 53.1924 64.8187 54.2822L64.374 55.0658L68.2234 57.093L68.6667 56.3109V56.3123Z"
                                                                fill="white"></path>
                                                            <circle opacity="0.3" cx="40" cy="40" r="39.6552" stroke="white"
                                                                stroke-width="0.689655"></circle>
                                                            <circle opacity="0.4" cx="40.0008" cy="40" r="20.6897" stroke="white"
                                                                stroke-width="4.13793" stroke-dasharray="0.69 2.07"></circle>
                                                            <g clip-path="url(#clip0_1370_35249)">
                                                                <path
                                                                    d="M13.0087 40.8959L14.0701 42.7921L11.9388 42.3686L10.4634 43.964L10.2076 41.8061L8.23437 40.8959L10.2076 39.9858L10.4634 37.8279L11.9388 39.4233L14.0701 38.9998L13.0087 40.8959Z"
                                                                    fill="white"></path>
                                                            </g>
                                                            <g clip-path="url(#clip1_1370_35249)">
                                                                <path
                                                                    d="M68.4192 42.5216L66.313 43.0561L67.2737 41.1069L66.1145 39.269L68.2651 39.5803L69.6549 37.9099L70.0233 40.0514L72.0415 40.8571L70.1186 41.8693L69.976 44.0376L68.4192 42.5216Z"
                                                                    fill="white"></path>
                                                            </g>
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M40.0001 53.7931C47.6179 53.7931 53.7932 47.6177 53.7932 40C53.7932 32.3823 47.6179 26.2069 40.0001 26.2069C32.3824 26.2069 26.207 32.3823 26.207 40C26.207 47.6177 32.3824 53.7931 40.0001 53.7931ZM45.1724 35.8621L38.4482 42.7181L34.8275 39.0264L33.7931 40.0812L38.4482 44.8276L46.2069 36.9169L45.1724 35.8621Z"
                                                                fill="white"></path>
                                                            <defs>
                                                                <clipPath id="clip0_1370_35249">
                                                                    <rect width="6.45185" height="6.45185" fill="white"
                                                                        transform="translate(8.09961 44.122) rotate(-90)"></rect>
                                                                </clipPath>
                                                                <clipPath id="clip1_1370_35249">
                                                                    <rect width="6.45185" height="6.45185" fill="white"
                                                                        transform="translate(66.5723 36.9451) rotate(15)"></rect>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>

                                                        <h2 class="find-for-anyone-header-title-text-mobile">
                                                            Finds for Anyone.<br>
                                                            Deals on Everything.
                                                        </h2>
                                                    </div>

                                                    <div class="find-for-anyone-header-content">
                                                        <h2 class="find-for-anyone-header-title-text-desktop">
                                                            Finds for Anyone. Deals on Everything.
                                                        </h2>
                                                        <div class="find-for-anyone-header-star-wrapper">
                                                            <div class="find-for-anyone-header-star">
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M8.50105 12.1733L3.79875 14.8054L4.84897 9.51991L0.892578 5.86118L6.24394 5.22669L8.50105 0.333313L10.7581 5.22669L16.1095 5.86118L12.1531 9.51991L13.2033 14.8054L8.50105 12.1733Z"
                                                                        fill="#FEE801"></path>
                                                                </svg>
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M8.50105 12.1733L3.79875 14.8054L4.84897 9.51991L0.892578 5.86118L6.24394 5.22669L8.50105 0.333313L10.7581 5.22669L16.1095 5.86118L12.1531 9.51991L13.2033 14.8054L8.50105 12.1733Z"
                                                                        fill="#FEE801"></path>
                                                                </svg>
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M8.50105 12.1733L3.79875 14.8054L4.84897 9.51991L0.892578 5.86118L6.24394 5.22669L8.50105 0.333313L10.7581 5.22669L16.1095 5.86118L12.1531 9.51991L13.2033 14.8054L8.50105 12.1733Z"
                                                                        fill="#FEE801"></path>
                                                                </svg>
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M8.50105 12.1733L3.79875 14.8054L4.84897 9.51991L0.892578 5.86118L6.24394 5.22669L8.50105 0.333313L10.7581 5.22669L16.1095 5.86118L12.1531 9.51991L13.2033 14.8054L8.50105 12.1733Z"
                                                                        fill="#FEE801"></path>
                                                                </svg>
                                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M8.50105 12.1733L3.79875 14.8054L4.84897 9.51991L0.892578 5.86118L6.24394 5.22669L8.50105 0.333313L10.7581 5.22669L16.1095 5.86118L12.1531 9.51991L13.2033 14.8054L8.50105 12.1733Z"
                                                                        fill="#FEE801"></path>
                                                                </svg>
                                                                <p>
                                                                    500,000+ <span>five star </span><a href="/reviews.html" target="__blank"
                                                                        rel="noreferrer">reviews</a>
                                                                </p>
                                                                <br>
                                                            </div>
                                                            <p><span>Over</span> 10 million packages shipped</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                    <div class="find-for-anyone-body">
                                                                    <div class="tw2023-find-for-anyone-collapsible-wrapper">
                                                                        <button type="button" class="find-for-anyone-collapsible">
                                                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <g clip-path="url(#clip0_1370_35302)">
                                                                                    <path
                                                                                        d="M9.79562 1.59244C9.89521 1.45107 10.1048 1.45107 10.2044 1.59244L10.8475 2.50545C11.3345 3.19667 12.246 3.44091 13.0133 3.08575L14.0268 2.61665C14.1837 2.54401 14.3652 2.64881 14.3808 2.82103L14.4813 3.9333C14.5574 4.77538 15.2246 5.44265 16.0667 5.51873L17.179 5.61922C17.3512 5.63478 17.456 5.81629 17.3834 5.97322L16.9142 6.98672C16.5591 7.75403 16.8033 8.66552 17.4946 9.15246L18.4076 9.79562C18.5489 9.8952 18.5489 10.1048 18.4076 10.2044L17.4946 10.8475C16.8033 11.3345 16.5591 12.246 16.9142 13.0133L17.3834 14.0268C17.456 14.1837 17.3512 14.3652 17.179 14.3808L16.0667 14.4813C15.2246 14.5574 14.5574 15.2246 14.4813 16.0667L14.3808 17.179C14.3652 17.3512 14.1837 17.456 14.0268 17.3834L13.0133 16.9142C12.246 16.5591 11.3345 16.8033 10.8475 17.4946L10.2044 18.4076C10.1048 18.5489 9.8952 18.5489 9.79562 18.4076L9.15245 17.4946C8.66552 16.8033 7.75402 16.5591 6.98672 16.9142L5.97322 17.3834C5.81629 17.456 5.63478 17.3512 5.61922 17.179L5.51873 16.0667C5.44265 15.2246 4.77538 14.5574 3.9333 14.4813L2.82103 14.3808C2.64881 14.3652 2.54401 14.1837 2.61665 14.0268L3.08575 13.0133C3.44091 12.246 3.19667 11.3345 2.50545 10.8475L1.59244 10.2044C1.45107 10.1048 1.45107 9.89521 1.59244 9.79562L2.50545 9.15245C3.19667 8.66552 3.44091 7.75403 3.08575 6.98672L2.61665 5.97322C2.54401 5.81629 2.64881 5.63478 2.82103 5.61922L3.9333 5.51873C4.77538 5.44265 5.44265 4.77538 5.51873 3.9333L5.61922 2.82103C5.63478 2.64881 5.81629 2.54401 5.97322 2.61665L6.98672 3.08575C7.75403 3.44091 8.66552 3.19667 9.15246 2.50545L9.79562 1.59244Z"
                                                                                        stroke="white" stroke-width="1.5"></path>
                                                                                    <path
                                                                                        d="M14 8.56666L12.9333 7.5L9.19945 11.2328L7.06667 9.09996L6 10.1667L9.19997 13.3667L14 8.56666Z"
                                                                                        fill="white"></path>
                                                                                </g>
                                                                                <defs>
                                                                                    <clipPath id="clip0_1370_35302">
                                                                                        <rect width="20" height="20" fill="white"></rect>
                                                                                    </clipPath>
                                                                                </defs>
                                                                            </svg>
                                                                            Authenticity
                                                                        </button>
                                                                        <div class="find-for-anyone-content" style="max-height: 0">
                                                                            <p>
                                                                                All products are 100% authentic guaranteed. We purchase our inventory
                                                                                via authorized dealers or respected industry wholesalers/distributors.
                                                                            </p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="tw2023-find-for-anyone-collapsible-wrapper">
                                                                        <button type="button" class="find-for-anyone-collapsible">
                                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M9 0.75L15.1627 2.11948C15.5059 2.19574 15.75 2.5001 15.75 2.85163V10.3417C15.75 11.8462 14.998 13.2513 13.7461 14.0859L9 17.25L4.25385 14.0859C3.00196 13.2513 2.25 11.8462 2.25 10.3417V2.85163C2.25 2.5001 2.49415 2.19574 2.8373 2.11948L9 0.75ZM9 2.28659L3.75 3.45326V10.3417C3.75 11.3447 4.2513 12.2814 5.0859 12.8378L9 15.4472L12.9141 12.8378C13.7487 12.2814 14.25 11.3447 14.25 10.3417V3.45326L9 2.28659ZM12.3393 6.16637L13.4 7.22703L8.62695 12L5.44499 8.81805L6.50566 7.75732L8.62642 9.87818L12.3393 6.16637Z"
                                                                                    fill="white"></path>
                                                                            </svg>
                                                                            Warranty
                                                                        </button>
                                                                        <div class="find-for-anyone-content" style="max-height: 0">
                                                                            <p>
                                                                                Jomashop warranties are now automatically registered when you purchase
                                                                                a watch.*
                                                                            </p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="tw2023-find-for-anyone-collapsible-wrapper">
                                                                        <button type="button" class="find-for-anyone-collapsible">
                                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M15.75 12.0013V5.99804C15.7498 5.80155 15.6981 5.60856 15.6001 5.43826C15.502 5.26796 15.3611 5.1263 15.1914 5.02738L9.84762 1.91746C9.59015 1.76757 9.29756 1.6886 8.99965 1.6886C8.70173 1.6886 8.40914 1.76757 8.15168 1.91746L2.80863 5.02738C2.63886 5.1263 2.49796 5.26796 2.39995 5.43826C2.30194 5.60856 2.25024 5.80155 2.25 5.99804V12.0013C2.25012 12.1979 2.30176 12.3911 2.39977 12.5615C2.49779 12.7319 2.63876 12.8737 2.80863 12.9727L8.15238 16.0826C8.40992 16.2323 8.70248 16.3111 9.00035 16.3111C9.29822 16.3111 9.59079 16.2323 9.84832 16.0826L15.1921 12.9727C15.3618 12.8736 15.5026 12.7318 15.6005 12.5614C15.6984 12.391 15.75 12.1979 15.75 12.0013Z"
                                                                                    stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                <path
                                                                                    d="M2.42578 5.4137L9 9.28088M9 9.28088L15.5742 5.4137M9 9.28088V16.3121"
                                                                                    stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                <path d="M8.625 4.5L12 6.75V14.25" stroke="white" stroke-linecap="round">
                                                                                </path>
                                                                            </svg>
                                                                            Fast &amp; Easy Returns
                                                                        </button>
                                                                        <div class="find-for-anyone-content" style="max-height: 0">
                                                                            <p>
                                                                                Not 100% satisfied with your purchase? Request a return within 30 days* for
                                                                                a refund.
                                                                            </p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="tw2023-find-for-anyone-collapsible-wrapper">
                                                                        <button type="button" class="find-for-anyone-collapsible">
                                                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M14.625 5.0625H3.375C2.44302 5.0625 1.6875 5.81802 1.6875 6.75V13.5C1.6875 14.432 2.44302 15.1875 3.375 15.1875H14.625C15.557 15.1875 16.3125 14.432 16.3125 13.5V6.75C16.3125 5.81802 15.557 5.0625 14.625 5.0625Z"
                                                                                    stroke="white" stroke-width="1.25" stroke-linejoin="round"></path>
                                                                                <path
                                                                                    d="M14.4619 5.06254V4.00786C14.4618 3.74918 14.4046 3.49371 14.2944 3.25967C14.1842 3.02564 14.0238 2.8188 13.8244 2.65393C13.6251 2.48905 13.3919 2.37021 13.1413 2.30586C12.8908 2.24152 12.6291 2.23326 12.375 2.28169L3.11625 3.86196C2.71418 3.93858 2.35144 4.15312 2.09062 4.46856C1.82979 4.784 1.68722 5.18058 1.6875 5.58989V7.31254"
                                                                                    stroke="white" stroke-width="1.25" stroke-linejoin="round"></path>
                                                                                <path
                                                                                    d="M12.9375 11.25C12.715 11.25 12.4975 11.184 12.3125 11.0604C12.1275 10.9368 11.9833 10.7611 11.8981 10.5555C11.813 10.35 11.7907 10.1238 11.8341 9.90552C11.8775 9.6873 11.9847 9.48684 12.142 9.32951C12.2993 9.17217 12.4998 9.06503 12.718 9.02162C12.9363 8.97821 13.1625 9.00049 13.368 9.08564C13.5736 9.17078 13.7493 9.31498 13.8729 9.49998C13.9965 9.68499 14.0625 9.9025 14.0625 10.125C14.0625 10.4234 13.944 10.7095 13.733 10.9205C13.522 11.1315 13.2359 11.25 12.9375 11.25Z"
                                                                                    fill="white"></path>
                                                                            </svg>
                                                                            Never Pay Retail
                                                                        </button>
                                                                        <div class="find-for-anyone-content" style="max-height: 0">
                                                                            <p>Buy what you love at a price you love even more.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="">
                                                            <script>
                                                                var coll = document.getElementsByClassName(
                                                                    "tw2023-find-for-anyone-collapsible-wrapper"
                                                                );
                                                                var i;

                                                                for (i = 0; i < coll.length; i++) {
                                                                    let index = i;
                                                                    coll[i]
                                                                        .getElementsByClassName("find-for-anyone-collapsible")[0]
                                                                        .addEventListener("click", function () {
                                                                            coll[index].classList.toggle("active");
                                                                            // var content = this.nextElementSibling;
                                                                            // content.classList.toggle("active");

                                                                            for (j = 0; j < coll.length; j++) {
                                                                                if (j !== index) {
                                                                                    console.log(index, j);
                                                                                    coll[j].classList.remove("active");
                                                                                }
                                                                            }
                                                                        });
                                                                }
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    </div>
                </div>
                </div>
                <div class="global-overlay overlay-hide "></div>
            </main>
            <div class="cross-sell-wrapper">
                <div class="container-width">
                    <h2>Shop by Category</h2>
                    <div>
                        <div>
                            <div class="click-handler">
                                <div class="row-contained-EzA entire-catalog-wrapper homepage-general-h2-style">
                                    <div style="display: flex; justify-content: flex-start; flex-direction: column;">
                                        <div class="">
                                            <style>
                                                .home-page .new-design .cross-sell-wrapper {
                                                display: none;
                                                }
                                            </style>
                                            <div class="entire-catalog-row">
                                                <div class="entire-catalog-item">
                                                    <a href="/watches-for-men.html" aria-label="Men's Watches">
                                                        <div class="entire-catalog-image">
                                                            <img loading="lazy" alt=""src="./img/catalog/home_mens_watches.png" title="Men's Watches">
                                                        </div>
                                                    </a>
                                                    <a href="/watches-for-men.html" aria-label="Men's Watches" class="entire-catalog-btn">Men’s Watches</a>
                                                </div>
                                                <div class="entire-catalog-item">
                                                    <a href="/watches-for-women.html" aria-label="Women’s watches">
                                                        <div class="entire-catalog-image">
                                                            <img loading="lazy" alt="" src="./img/catalog/home_womens_watches.png" title="Women’s watches">
                                                        </div>
                                                    </a>
                                                    <a href="/watches-for-women.html" aria-label="Women’s watches" class="entire-catalog-btn">Women’s watches</a>
                                                </div>
                                                <div class="entire-catalog-item">
                                                    <a href="/sunglasses.html" aria-label="SUNGLASSES">
                                                        <div class="entire-catalog-image">
                                                            <img loading="lazy" alt="" src="./img/catalog/home_sunglasses.png" title="SUNGLASSES">
                                                        </div>
                                                    </a>
                                                    <a href="/sunglasses.html" aria-label="SUNGLASSES" class="entire-catalog-btn">SUNGLASSES</a>
                                                </div>
                                                <div class="entire-catalog-item">
                                                    <a href="/fragrances.html" aria-label="Fragrances">
                                                        <div class="entire-catalog-image">
                                                            <img loading="lazy" alt="Fragrances" src="./img/catalog/home_fragrances.png" title="Fragrances">
                                                        </div>
                                                    </a>
                                                    <a href="/fragrances.html" aria-label="Fragrances" class="entire-catalog-btn">Fragrances</a>
                                                </div>
                                                <div class="entire-catalog-item">
                                                    <a href="/handbags-accessories.html" aria-label="Bags">
                                                        <div class="entire-catalog-image">
                                                            <img loading="lazy" alt="Bags" src="./img/catalog/home_bags.png" title="Bags">
                                                        </div>
                                                    </a>
                                                    <a href="/handbags-accessories.html" aria-label="Bags" class="entire-catalog-btn">Bags</a>
                                                </div>
                                                <div class="entire-catalog-item">
                                                    <a href="/shoes.html" aria-label="Shoes">
                                                        <div class="entire-catalog-image">
                                                            <img loading="lazy" alt="Shoes" src="./img/catalog/home_shoes.png" title="Shoes">
                                                        </div>
                                                    </a>
                                                    <a href="/shoes.html" aria-label="Shoes" class="entire-catalog-btn">Shoes</a>
                                                </div>
                                                <div class="entire-catalog-item">
                                                    <a href="/ladies-mens-apparel.html" aria-label="Apparel">
                                                        <div class="entire-catalog-image">
                                                            <img loading="lazy" alt="Apparel" src="./img/catalog/home_apparel.png" title="Apparel">
                                                        </div>
                                                    </a>
                                                    <a href="/ladies-mens-apparel.html" aria-label="Apparel" class="entire-catalog-btn">Apparel</a>
                                                </div>
                                                <div class="entire-catalog-item">
                                                    <a href="/fashion-and-apparel.html?apparel_type=Scarves%7CBelts%7CShoe+Accessories"
                                                        aria-label="Accessories">
                                                        <div class="entire-catalog-image">
                                                            <img loading="lazy" alt="Accessories" src="./img/catalog/home_accessories.png" title="Accessories">
                                                        </div>
                                                    </a>
                                                    <a href="" aria-label="Accessories" class="entire-catalog-btn">Accessories</a>
                                                </div>
                                                <div class="entire-catalog-item">
                                                    <a href="/jewelry.html" aria-label="Jewelry">
                                                        <div class="entire-catalog-image">
                                                            <img loading="lazy" alt="Jewelry" src="./img/catalog/home_jewelry.png" title="Jewelry">
                                                        </div>
                                                    </a>
                                                    <a href="/jewelry.html" aria-label="Jewelry" class="entire-catalog-btn">Jewelry</a>
                                                </div>
                                                <div class="entire-catalog-item">
                                                    <a href="/luxury-pens.html" aria-label="Luxury pens">
                                                        <div class="entire-catalog-image">
                                                            <img loading="lazy" alt="Luxury pens" src="./img/catalog/home_pens.png" title="Luxury pens">
                                                        </div>
                                                    </a>
                                                    <a href="/luxury-pens.html" aria-label="Luxury pens" class="entire-catalog-btn">Luxury pens</a>
                                                </div>
                                                <div class="entire-catalog-item">
                                                    <a href="/preowned.html" aria-label="Preowned">
                                                        <div class="entire-catalog-image">
                                                            <img loading="lazy" alt="Preowned" src="./img/catalog/home_preowned.png" title="Preowned">
                                                        </div>
                                                    </a>
                                                    <a href="/preowned.html" aria-label="Preowned" class="entire-catalog-btn">Preowned</a>
                                                </div>
                                                <div class="entire-catalog-item">
                                                    <a href="/flash-sale-offers.html" aria-label="Sales">
                                                        <div class="entire-catalog-image">
                                                            <img loading="lazy" alt="Sales" src="./img/catalog/home_sale.png" title="Sales">
                                                        </div>
                                                    </a>
                                                    <a href="/flash-sale-offers.html" aria-label="Sales" class="entire-catalog-btn">Sales</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="category-usps-wrapper">
                <div>
                    <div>
                        <div class="click-handler">
                            <div class="row-contained-EzA trust-since-block">
                                <div style="display: flex; justify-content: flex-start; flex-direction: column;">
                                    <div class="">
                                        <div>
                                            <div>
                                                <div class="trust-since-content">
                                                    <div class="trust-item" data-type-tab="Trust">
                                                        <img src="./img/svg/trusted.svg" alt="">
                                                        <p>Trusted <b>since 1999</b></p>
                                                    </div>
                                                    <div class="trust-item" data-type-tab="Authenticity">
                                                        <img src="./img/svg/authenticity_green.svg" alt="">
                                                        <p><b>75,000+ items</b> from authentic brands</p>
                                                    </div>
                                                    <div class="trust-item" data-type-tab="AboutUs">
                                                        <img src="./img/svg/fivestars.svg" alt="">
                                                        <p><b>500,000+ five star </b> reviews</p>
                                                    </div>
                                                    <div class="trust-item" data-type-tab="Shipping">
                                                        <img src="./img/svg/shipping.svg" alt="">
                                                        <p>Shipped <b>10M+ orders</b> to <b>150+ countries</b></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- The Modal -->
                                            <div id="ModalTrust" class="modal modal-trust">
                                                <!-- Modal content -->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="title">The Jomashop Promise</h2>
                                                        <span class="trust-close">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="black"></path>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div class="tabs-wrapper">
                                                        <div class="tabs">
                                                            <button class="tablinks active" data-electronic="AboutUs">About us</button>
                                                            <button class="tablinks" data-electronic="Authenticity">Authenticity</button>
                                                            <button class="tablinks" data-electronic="Trust">Trust</button>
                                                            <button class="tablinks" data-electronic="Shipping">Shipping</button>
                                                        </div>
                                                    </div>
                                                    <!-- Tab content -->
                                                    <div class="wrapper_tabcontent">
                                                        <div id="AboutUs" class="tabcontent active">
                                                            <p>
                                                                For over two decades, Jomashop has established itself as a premier online destination,
                                                                offering a diverse range of luxury and fashion items to discerning customers worldwide.
                                                                With an impressive catalog of over 75,000 unique products, whether it's a watch,
                                                                handbag, pair of sunglasses, shoes, or fragrance, Jomashop is the go-to platform for all
                                                                your luxury needs.
                                                            </p>
                                                        </div>
                                                        <div id="Authenticity" class="tabcontent">
                                                            <p>
                                                                Your trust is paramount to us. Every product listed on Jomashop.com comes with a 100%
                                                                authenticity guarantee. Our inventory sources directly from authorized dealers or
                                                                trusted industry wholesalers and distributors. Each watch we sell is brand new, boasting
                                                                its original manufacturer’s serial numbers. With Jomashop, authenticity isn't a promise;
                                                                it's a guarantee.
                                                            </p>
                                                        </div>
                                                        <div id="Trust" class="tabcontent">
                                                            <p>
                                                                Our commitment goes beyond just providing you with genuine products. We believe in
                                                                delivering unmatched value. We ensure every watch you purchase from Jomashop is backed
                                                                by our very own warranty. Your peace of mind is a priority, and with Jomashop's warranty
                                                                policy, trust is built in.
                                                            </p>
                                                        </div>
                                                        <div id="Shipping" class="tabcontent">
                                                            <p>
                                                                Jomashopoffers free Ground shipping on every order over $100, fulfilled via trusted
                                                                partners like FedEx, UPS, or USPS, with transit times ranging from 1 to 6 business days.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer id="footer" class="footer-container">
                <div id="Footer_Desktop">
                    <div class="footer-content-wrapper">
                        <div class="footer-top-wrapper">
                            <div class="footer-inner-content container-width">
                                <div class="footer-top">
                                    <div class="logo-footer">
                                        <img src="./dist/file/footer_logo.f00d90d3496073687709.png" alt="Logo Foolter">
                                        <p class="description-footer">— Since 1999</p>
                                        <p class="description-footer description-opacity">Your Online Shopping for Watches, Handbags and More.</p>
                                    </div>
                                    <div class="footer-social-links">
                                        <div class="social-new-design">
                                            <a href="https://www.facebook.com/JomaShop" target="_blank" class="social-item" rel="noreferrer">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2510_108117)">
                                                        <path d="M10.5 10.125H12.375L13.125 7.125H10.5V5.625C10.5 4.8525 10.5 4.125 12 4.125H13.125V1.605C12.8805 1.57275 11.9572 1.5 10.9822 1.5C8.946 1.5 7.5 2.74275 7.5 5.025V7.125H5.25V10.125H7.5V16.5H10.5V10.125Z" fill="white"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2510_108117">
                                                            <rect width="18" height="18" fill="white"></rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </a>
                                            <a href="https://twitter.com/Jomashop" target="_blank" class="social-item" rel="noreferrer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 18 18" fill="white">
                                                    <g>
                                                        <path
                                                            d="M 6 1.5 L 0.75 1.5 L 6.945312 9.761719 L 1.085938 16.5 L 3.074219 16.5 L 7.867188 10.988281 L 12 16.5 L 17.25 16.5 L 10.792969 7.890625 L 16.351562 1.5 L 14.363281 1.5 L 9.875 6.664062 Z M 12.75 15 L 3.75 3 L 5.25 3 L 14.25 15 Z M 12.75 15 ">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </a>
                                            <a href="https://www.instagram.com/jomashop/" target="_blank" class="social-item" rel="noreferrer">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2510_108127)">
                                                        <path d="M9 1.5C11.0378 1.5 11.292 1.5075 12.0915 1.545C12.8902 1.5825 13.434 1.70775 13.9125 1.89375C14.4075 2.08425 14.8245 2.34225 15.2415 2.7585C15.6229 3.13342 15.918 3.58694 16.1063 4.0875C16.2915 4.56525 16.4175 5.10975 16.455 5.9085C16.4903 6.708 16.5 6.96225 16.5 9C16.5 11.0378 16.4925 11.292 16.455 12.0915C16.4175 12.8902 16.2915 13.434 16.1063 13.9125C15.9185 14.4133 15.6233 14.867 15.2415 15.2415C14.8665 15.6227 14.413 15.9178 13.9125 16.1063C13.4347 16.2915 12.8902 16.4175 12.0915 16.455C11.292 16.4903 11.0378 16.5 9 16.5C6.96225 16.5 6.708 16.4925 5.9085 16.455C5.10975 16.4175 4.566 16.2915 4.0875 16.1063C3.58674 15.9184 3.13315 15.6232 2.7585 15.2415C2.37705 14.8666 2.08195 14.4131 1.89375 13.9125C1.70775 13.4347 1.5825 12.8902 1.545 12.0915C1.50975 11.292 1.5 11.0378 1.5 9C1.5 6.96225 1.5075 6.708 1.545 5.9085C1.5825 5.109 1.70775 4.566 1.89375 4.0875C2.08143 3.58663 2.3766 3.13299 2.7585 2.7585C3.13325 2.37692 3.58682 2.0818 4.0875 1.89375C4.566 1.70775 5.109 1.5825 5.9085 1.545C6.708 1.50975 6.96225 1.5 9 1.5ZM9 5.25C8.00544 5.25 7.05161 5.64509 6.34835 6.34835C5.64509 7.05161 5.25 8.00544 5.25 9C5.25 9.99456 5.64509 10.9484 6.34835 11.6517C7.05161 12.3549 8.00544 12.75 9 12.75C9.99456 12.75 10.9484 12.3549 11.6517 11.6517C12.3549 10.9484 12.75 9.99456 12.75 9C12.75 8.00544 12.3549 7.05161 11.6517 6.34835C10.9484 5.64509 9.99456 5.25 9 5.25ZM13.875 5.0625C13.875 4.81386 13.7762 4.5754 13.6004 4.39959C13.4246 4.22377 13.1861 4.125 12.9375 4.125C12.6889 4.125 12.4504 4.22377 12.2746 4.39959C12.0988 4.5754 12 4.81386 12 5.0625C12 5.31114 12.0988 5.5496 12.2746 5.72541C12.4504 5.90123 12.6889 6 12.9375 6C13.1861 6 13.4246 5.90123 13.6004 5.72541C13.7762 5.5496 13.875 5.31114 13.875 5.0625ZM9 6.75C9.59674 6.75 10.169 6.98705 10.591 7.40901C11.0129 7.83097 11.25 8.40326 11.25 9C11.25 9.59674 11.0129 10.169 10.591 10.591C10.169 11.0129 9.59674 11.25 9 11.25C8.40326 11.25 7.83097 11.0129 7.40901 10.591C6.98705 10.169 6.75 9.59674 6.75 9C6.75 8.40326 6.98705 7.83097 7.40901 7.40901C7.83097 6.98705 8.40326 6.75 9 6.75Z" fill="white"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2510_108127">
                                                            <rect width="18" height="18" fill="white"></rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </a>
                                            <a href="https://www.tiktok.com/@jomashop" target="_blank" class="social-item" rel="noreferrer">
                                                <svg fill="#ffffff" width="15" height="15" viewBox="0 0 24 24" role="img" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                                                    <g stroke-width="0"></g>
                                                    <g stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.8640000000000001"></g>
                                                    <g>
                                                        <path
                                                            d="M12.53.02C13.84 0 15.14.01 16.44 0c.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </a>
                                            <a href="https://www.youtube.com/@jomashop" target="_blank" class="social-item" rel="noreferrer">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_2510_108135)">
                                                        <path
                                                            d="M16.1572 4.8735C16.5 6.21 16.5 9 16.5 9C16.5 9 16.5 11.79 16.1572 13.1265C15.9667 13.8653 15.4095 14.4465 14.7037 14.643C13.422 15 9 15 9 15C9 15 4.58025 15 3.29625 14.643C2.5875 14.4435 2.031 13.863 1.84275 13.1265C1.5 11.79 1.5 9 1.5 9C1.5 9 1.5 6.21 1.84275 4.8735C2.03325 4.13475 2.5905 3.5535 3.29625 3.357C4.58025 3 9 3 9 3C9 3 13.422 3 14.7037 3.357C15.4125 3.5565 15.969 4.137 16.1572 4.8735ZM7.5 11.625L12 9L7.5 6.375V11.625Z" fill="white">
                                                        </path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2510_108135">
                                                            <rect width="18" height="18" fill="white"></rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer-top-content -left">
                                    <div class="styled-subscription-wrapper ">
                                        <div>
                                            <div>
                                                <div class="click-handler">
                                                    <div class="">
                                                        <div class="footer-sign-up-exclusive-email">
                                                            Subscribe for exclusive offers
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form id="newsLetterForm" novalidate="">
                                            <input type="hidden" name="crvs" value="gmOC6zTLL27NnfmNCVsSNn0QPJVmQGgJxEaNaandxymy_GqwvytQg7O3XE7dHn9ddMQdgK7-8jH3ZZ5AqMcZD422V8YcpJ4TTYFARIPJOZbcYjlDSKwxh0ROoYriww143AsH7IIbByY1YklU0W_szjYvBzo78w2tPGs6JZe3Voknsd0s8C4KpvmmTv3peNuF0TiPEbrBIQ8WF-2-TXHogTKaxLYSX2rSGdRj-dWXHkE">
                                            <input type="hidden" name="CheckBox.Source.Mini-Form" value="on">
                                            <div class="field-wrapper  can-focus  ">
                                                <label class="label">Enter your email</label>
                                                <div class="field-icons" style="--iconsBefore: 0; --iconsAfter: 0;">
                                                    <span class="input-block">
                                                        <input type="email" placeholder="Enter your email" class="" id="newsLetterEmail" name="email" value="">
                                                    </span>
                                                    <span class="before"></span>
                                                    <span class="after"></span>
                                                </div>
                                                <span class="message-root">
                                                    <p class="root"></p>
                                                </span>
                                                <button class="btn-new-design primary btn" id="newsLetterSubmit" type="submit">Subscribe</button>
                                                <span id="newsLetterError" class="root_error message-root">Please enter a valid email</span>
                                            </div>
                                            <span class="description-subscribing">By subscribing you agree with our 
                                                <a href="https://www.iubenda.com/privacy-policy/848793" title="privacy policy">Privacy Policy</a>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-links-wrapper container-width">
                            <ul class="item-sub-cat">
                                <div class="accordion-item col-0 contact-us opened">
                                    <div class="accordion-head">Contact Us</div>
                                    <div class="accordion-content collapse show">
                                        <li><a class="" href="/customer-service/">Customer Service</a></li>
                                        <li><a class="" href="/help-center/order-status/">Order Status</a></li>
                                        <li><a class="/email-preference-footer" href="/my-account/email-preferences/">Update Your Email Preferences</a></li>
                                        <li><a class="" href="/trade-in.html?transaction=trade&amp;referrer=footer">Trade-In Your Watch</a></li>
                                        <li><a class="" href="/sell-us-your-rolex.html?transaction=sell&amp;referrer=footerRolex">Sell my Rolex</a></li>
                                        <li><a class="" href="/sell-us-your-watch.html?transaction=trade&amp;referrer=footer">Sell my Watch</a></li>
                                        <li><a class="" href="/sell-on-jomashop-vendor-application-form.html">Become a Vendor</a></li>
                                    </div>
                                </div>
                                <div class="accordion-item col-1 company-info opened">
                                    <div class="accordion-head">Company Info</div>
                                    <div class="accordion-content collapse show">
                                        <li><a href="" class="">About Jomashop</a></li>
                                        <li><a class="" href="">Jomashop Reviews</a></li>
                                        <li><a href="" class="">The Parlor: Our Blog</a></li>
                                        <li><a href="" class="">Affiliate Program</a></li>
                                        <li><a href="" class="">Authenticity Guarantee</a></li>
                                        <li><a class="" href="">Jomashop Coupon Codes</a></li>
                                        <li><a class="" href="">Jomashop Gift Cards</a></li>
                                    </div>
                                </div>
                                <div class="accordion-item col-2 help-center opened">
                                    <div class="accordion-head">Help Center</div>
                                    <div class="accordion-content collapse show">
                                        <li><a href="" class="">Order Information</a></li>
                                        <li><a href="" class="">Shipping Options</a></li>
                                        <li><a href="" class="">International Shipping</a></li>
                                        <li><a href="" class="">Payment Options</a></li>
                                        <li><a class="" href="">Pay with Bitpay / Crypto</a></li>
                                    </div>
                                </div>
                                <div class="accordion-item col-3 returns-&amp;-warranty opened">
                                    <div class="accordion-head">Returns &amp; Warranty</div>
                                    <div class="accordion-content collapse show">
                                        <li><a href="" class="">Returns &amp; Exchange Policy</a></li>
                                        <li><a href="" class="">Returns Center</a></li>
                                        <li><a href="" class="">Warranty Policy</a></li>
                                        <li><a href="" class="">Warranty Repair Center</a></li>
                                    </div>
                                </div>
                                <div class="accordion-item col-4 customer-service opened">
                                    <div class="accordion-head">Customer Service</div>
                                    <div class="accordion-content contain-non-links collapse show">
                                        <div>
                                            <li><a href="tel:877-834-1434">877-834-1434</a></li>
                                            <li>
                                                <address>Brooklyn Army Terminal Building A <br>140A 58th Street, Suite 6N - 6th
                                                Floor<br>Brooklyn, NY 11220</address>
                                            </li>
                                        </div>
                                        
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="Footer_Mobile">
                    <div class="footer-top">
                        <div class="logo-footer">
                            <img src="./dist/file/footer_logo.f00d90d3496073687709.png" alt="Logo Foolter">
                            <p class="description-footer">— Since 1999</p>
                            <p class="description-footer description-opacity">Your Online Shopping for Watches, Handbags and More.</p>
                        </div>
                        <div class="footer-social-links">
                            <div class="social-new-design">
                                <a href="https://www.facebook.com/JomaShop" target="_blank" class="social-item" rel="noreferrer">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_2510_108117)">
                                            <path d="M10.5 10.125H12.375L13.125 7.125H10.5V5.625C10.5 4.8525 10.5 4.125 12 4.125H13.125V1.605C12.8805 1.57275 11.9572 1.5 10.9822 1.5C8.946 1.5 7.5 2.74275 7.5 5.025V7.125H5.25V10.125H7.5V16.5H10.5V10.125Z"
                                            fill="white"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_2510_108117">
                                                <rect width="18" height="18" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                                <a href="https://twitter.com/Jomashop" target="_blank" class="social-item" rel="noreferrer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 18 18" fill="white">
                                        <g>
                                            <path d="M 6 1.5 L 0.75 1.5 L 6.945312 9.761719 L 1.085938 16.5 L 3.074219 16.5 L 7.867188 10.988281 L 12 16.5 L 17.25 16.5 L 10.792969 7.890625 L 16.351562 1.5 L 14.363281 1.5 L 9.875 6.664062 Z M 12.75 15 L 3.75 3 L 5.25 3 L 14.25 15 Z M 12.75 15 ">
                                            </path>
                                        </g>
                                    </svg>
                                </a>
                                <a href="https://www.instagram.com/jomashop/" target="_blank" class="social-item" rel="noreferrer">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_2510_108127)">
                                            <path d="M9 1.5C11.0378 1.5 11.292 1.5075 12.0915 1.545C12.8902 1.5825 13.434 1.70775 13.9125 1.89375C14.4075 2.08425 14.8245 2.34225 15.2415 2.7585C15.6229 3.13342 15.918 3.58694 16.1063 4.0875C16.2915 4.56525 16.4175 5.10975 16.455 5.9085C16.4903 6.708 16.5 6.96225 16.5 9C16.5 11.0378 16.4925 11.292 16.455 12.0915C16.4175 12.8902 16.2915 13.434 16.1063 13.9125C15.9185 14.4133 15.6233 14.867 15.2415 15.2415C14.8665 15.6227 14.413 15.9178 13.9125 16.1063C13.4347 16.2915 12.8902 16.4175 12.0915 16.455C11.292 16.4903 11.0378 16.5 9 16.5C6.96225 16.5 6.708 16.4925 5.9085 16.455C5.10975 16.4175 4.566 16.2915 4.0875 16.1063C3.58674 15.9184 3.13315 15.6232 2.7585 15.2415C2.37705 14.8666 2.08195 14.4131 1.89375 13.9125C1.70775 13.4347 1.5825 12.8902 1.545 12.0915C1.50975 11.292 1.5 11.0378 1.5 9C1.5 6.96225 1.5075 6.708 1.545 5.9085C1.5825 5.109 1.70775 4.566 1.89375 4.0875C2.08143 3.58663 2.3766 3.13299 2.7585 2.7585C3.13325 2.37692 3.58682 2.0818 4.0875 1.89375C4.566 1.70775 5.109 1.5825 5.9085 1.545C6.708 1.50975 6.96225 1.5 9 1.5ZM9 5.25C8.00544 5.25 7.05161 5.64509 6.34835 6.34835C5.64509 7.05161 5.25 8.00544 5.25 9C5.25 9.99456 5.64509 10.9484 6.34835 11.6517C7.05161 12.3549 8.00544 12.75 9 12.75C9.99456 12.75 10.9484 12.3549 11.6517 11.6517C12.3549 10.9484 12.75 9.99456 12.75 9C12.75 8.00544 12.3549 7.05161 11.6517 6.34835C10.9484 5.64509 9.99456 5.25 9 5.25ZM13.875 5.0625C13.875 4.81386 13.7762 4.5754 13.6004 4.39959C13.4246 4.22377 13.1861 4.125 12.9375 4.125C12.6889 4.125 12.4504 4.22377 12.2746 4.39959C12.0988 4.5754 12 4.81386 12 5.0625C12 5.31114 12.0988 5.5496 12.2746 5.72541C12.4504 5.90123 12.6889 6 12.9375 6C13.1861 6 13.4246 5.90123 13.6004 5.72541C13.7762 5.5496 13.875 5.31114 13.875 5.0625ZM9 6.75C9.59674 6.75 10.169 6.98705 10.591 7.40901C11.0129 7.83097 11.25 8.40326 11.25 9C11.25 9.59674 11.0129 10.169 10.591 10.591C10.169 11.0129 9.59674 11.25 9 11.25C8.40326 11.25 7.83097 11.0129 7.40901 10.591C6.98705 10.169 6.75 9.59674 6.75 9C6.75 8.40326 6.98705 7.83097 7.40901 7.40901C7.83097 6.98705 8.40326 6.75 9 6.75Z"
                                            fill="white"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_2510_108127">
                                                <rect width="18" height="18" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                                <a href="https://www.tiktok.com/@jomashop" target="_blank" class="social-item" rel="noreferrer">
                                    <svg fill="#ffffff" width="15" height="15" viewBox="0 0 24 24" role="img" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                                        <g stroke-width="0"></g>
                                        <g stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.8640000000000001"></g>
                                        <g>
                                            <path d="M12.53.02C13.84 0 15.14.01 16.44 0c.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z">
                                            </path>
                                        </g>
                                    </svg>
                                </a>
                                <a href="https://www.youtube.com/@jomashop" target="_blank" class="social-item" rel="noreferrer">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_2510_108135)">
                                            <path d="M16.1572 4.8735C16.5 6.21 16.5 9 16.5 9C16.5 9 16.5 11.79 16.1572 13.1265C15.9667 13.8653 15.4095 14.4465 14.7037 14.643C13.422 15 9 15 9 15C9 15 4.58025 15 3.29625 14.643C2.5875 14.4435 2.031 13.863 1.84275 13.1265C1.5 11.79 1.5 9 1.5 9C1.5 9 1.5 6.21 1.84275 4.8735C2.03325 4.13475 2.5905 3.5535 3.29625 3.357C4.58025 3 9 3 9 3C9 3 13.422 3 14.7037 3.357C15.4125 3.5565 15.969 4.137 16.1572 4.8735ZM7.5 11.625L12 9L7.5 6.375V11.625Z"
                                            fill="white"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_2510_108135">
                                                <rect width="18" height="18" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="footer-content-wrapper">
                        <div class="footer-links-wrapper container-width">
                            <div class="chat-call-section" tabindex="0">
                                <div class="chat-call chat">
                                    <span class="chat-text">Chat </span>
                                    <strong class="chat-or">or </strong>
                                    <span class="call-text">Call </span>
                                    <span class="chat-call-phone-number">(877) 834-1434</span>
                                </div>
                                <ul class="chat-call-dropdown">
                                    <li>
                                        <a href="tel://1-877-834-1434" data-href="tel://1-877-834-1434" title="Tap here to call us!">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_448_68674)">
                                                    <path d="M9.366 10.682C10.3043 12.3305 11.6695 13.6957 13.318 14.634L14.202 13.396C14.3442 13.1969 14.5543 13.0569 14.7928 13.0023C15.0313 12.9478 15.2814 12.9825 15.496 13.1C16.9103 13.8729 18.4722 14.3378 20.079 14.464C20.3298 14.4839 20.5638 14.5975 20.7345 14.7823C20.9052 14.9671 21 15.2094 21 15.461V19.923C21.0001 20.1706 20.9083 20.4094 20.7424 20.5932C20.5765 20.777 20.3483 20.8927 20.102 20.918C19.572 20.973 19.038 21 18.5 21C9.94 21 3 14.06 3 5.5C3 4.962 3.027 4.428 3.082 3.898C3.10725 3.6517 3.22298 3.42352 3.40679 3.25763C3.5906 3.09175 3.82941 2.99995 4.077 3H8.539C8.79056 2.99997 9.0329 3.09475 9.21768 3.26545C9.40247 3.43615 9.51613 3.67022 9.536 3.921C9.66222 5.52779 10.1271 7.08968 10.9 8.504C11.0175 8.71856 11.0522 8.96874 10.9977 9.2072C10.9431 9.44565 10.8031 9.65584 10.604 9.798L9.366 10.682ZM6.844 10.025L8.744 8.668C8.20478 7.50409 7.83535 6.26884 7.647 5H5.01C5.004 5.166 5.001 5.333 5.001 5.5C5 12.956 11.044 19 18.5 19C18.667 19 18.834 18.997 19 18.99V16.353C17.7312 16.1646 16.4959 15.7952 15.332 15.256L13.975 17.156C13.4287 16.9437 12.898 16.6931 12.387 16.406L12.329 16.373C10.3676 15.2567 8.74328 13.6324 7.627 11.671L7.594 11.613C7.30691 11.102 7.05628 10.5713 6.844 10.025Z"
                                                    fill="black"></path>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_448_68674">
                                                        <rect width="24" height="24" fill="white"></rect>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <span class="dropdown-text">Call</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Tap here to Live Chat">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.27894 2.4375L5.28125 2.4375H20.7188L20.7211 2.4375C21.6893 2.44026 22.6171 2.82611 23.3017 3.51076C23.9864 4.19541 24.3722 5.1232 24.375 6.09144L24.375 6.09375V15.8438L24.375 15.8461C24.3722 16.8143 23.9864 17.7421 23.3017 18.4267C22.6171 19.1114 21.6893 19.4972 20.7211 19.5L20.7188 19.5H12.4793L7.83281 23.3741C7.59064 23.576 7.25352 23.6195 6.96797 23.4858C6.68242 23.3521 6.5 23.0653 6.5 22.75V19.5H5.28125L5.27894 19.5C4.3107 19.4972 3.38291 19.1114 2.69826 18.4267C2.01361 17.7421 1.62776 16.8143 1.625 15.8461L1.625 15.8438V6.09375L1.625 6.09144C1.62776 5.1232 2.01361 4.19541 2.69826 3.51076C3.38291 2.82611 4.3107 2.44026 5.27894 2.4375ZM12.5926 19.4055C12.5924 19.4057 12.5922 19.4058 12.592 19.406L12.5926 19.4055ZM5.2825 4.0625C4.74402 4.06431 4.22809 4.27902 3.84731 4.65981C3.46652 5.04059 3.25181 5.55652 3.25 6.095V15.8425C3.25181 16.381 3.46652 16.8969 3.84731 17.2777C4.22811 17.6585 4.74406 17.8732 5.28256 17.875H7.3125C7.76123 17.875 8.125 18.2388 8.125 18.6875V21.0147L11.5509 18.1584C11.551 18.1582 11.5512 18.1581 11.5514 18.1579C11.7705 17.9751 12.0469 17.875 12.3322 17.875C12.3323 17.875 12.3323 17.875 12.3324 17.875H20.7174C21.2559 17.8732 21.7719 17.6585 22.1527 17.2777C22.5335 16.8969 22.7482 16.3809 22.75 15.8424V6.09506C22.7482 5.55656 22.5335 5.04061 22.1527 4.65981C21.7719 4.27902 21.256 4.06431 20.7175 4.0625H5.2825Z"
                                                fill="black"></path>
                                                <path d="M8.125 12.5938C9.02246 12.5938 9.75 11.8662 9.75 10.9688C9.75 10.0713 9.02246 9.34375 8.125 9.34375C7.22754 9.34375 6.5 10.0713 6.5 10.9688C6.5 11.8662 7.22754 12.5938 8.125 12.5938Z"
                                                fill="black"></path>
                                                <path d="M13 12.5938C13.8975 12.5938 14.625 11.8662 14.625 10.9688C14.625 10.0713 13.8975 9.34375 13 9.34375C12.1025 9.34375 11.375 10.0713 11.375 10.9688C11.375 11.8662 12.1025 12.5938 13 12.5938Z"
                                                fill="black"></path>
                                                <path d="M17.875 12.5938C18.7725 12.5938 19.5 11.8662 19.5 10.9688C19.5 10.0713 18.7725 9.34375 17.875 9.34375C16.9775 9.34375 16.25 10.0713 16.25 10.9688C16.25 11.8662 16.9775 12.5938 17.875 12.5938Z"
                                                fill="black"></path>
                                            </svg>
                                            <span class="dropdown-text">Chat</span>
                                        </a>
                                    </li>
                                    <li class="whatsapp-item">
                                        <a href="" title="Tap here to Live Chat" target="_blank" rel="noreferrer">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_649_65720)">
                                                <path
                                                    d="M7.25301 18.494L7.97701 18.917C9.19795 19.6291 10.5866 20.0029 12 20C13.5823 20 15.129 19.5308 16.4446 18.6518C17.7602 17.7727 18.7855 16.5233 19.3911 15.0615C19.9966 13.5997 20.155 11.9911 19.8463 10.4393C19.5376 8.88743 18.7757 7.46197 17.6569 6.34315C16.538 5.22433 15.1126 4.4624 13.5607 4.15372C12.0089 3.84504 10.4004 4.00346 8.93855 4.60896C7.47674 5.21447 6.22731 6.23984 5.34826 7.55544C4.46921 8.87103 4.00001 10.4177 4.00001 12C4.00001 13.436 4.37701 14.813 5.08401 16.024L5.50601 16.748L4.85301 19.149L7.25301 18.494ZM2.00401 22L3.35601 17.032C2.46515 15.5049 1.99711 13.768 2.00001 12C2.00001 6.477 6.47701 2 12 2C17.523 2 22 6.477 22 12C22 17.523 17.523 22 12 22C10.2328 22.0029 8.49667 21.5352 6.97001 20.645L2.00401 22ZM8.39101 7.308C8.52501 7.298 8.66001 7.298 8.79401 7.304C8.84801 7.308 8.90201 7.314 8.95601 7.32C9.11501 7.338 9.29001 7.435 9.34901 7.569C9.64701 8.245 9.93701 8.926 10.217 9.609C10.279 9.761 10.242 9.956 10.124 10.146C10.0429 10.2745 9.95507 10.3986 9.86101 10.518C9.74801 10.663 9.50501 10.929 9.50501 10.929C9.50501 10.929 9.40601 11.047 9.44401 11.194C9.45801 11.25 9.50401 11.331 9.54601 11.399L9.60501 11.494C9.86101 11.921 10.205 12.354 10.625 12.762C10.745 12.878 10.862 12.997 10.988 13.108C11.456 13.521 11.986 13.858 12.558 14.108L12.563 14.11C12.648 14.147 12.691 14.167 12.815 14.22C12.877 14.246 12.941 14.269 13.006 14.286C13.0732 14.3031 13.1439 14.2999 13.2093 14.2767C13.2746 14.2536 13.3316 14.2116 13.373 14.156C14.097 13.279 14.163 13.222 14.169 13.222V13.224C14.2193 13.1771 14.2791 13.1415 14.3443 13.1196C14.4095 13.0977 14.4786 13.09 14.547 13.097C14.607 13.101 14.668 13.112 14.724 13.137C15.255 13.38 16.124 13.759 16.124 13.759L16.706 14.02C16.804 14.067 16.893 14.178 16.896 14.285C16.9 14.352 16.906 14.46 16.883 14.658C16.851 14.917 16.773 15.228 16.695 15.391C16.6416 15.5022 16.5707 15.6042 16.485 15.693C16.3841 15.7989 16.2736 15.8954 16.155 15.981C16.114 16.0119 16.0723 16.0419 16.03 16.071C15.9056 16.1499 15.7778 16.2233 15.647 16.291C15.3895 16.4278 15.1052 16.5063 14.814 16.521C14.629 16.531 14.444 16.545 14.258 16.535C14.25 16.535 13.69 16.448 13.69 16.448C12.2683 16.074 10.9534 15.3735 9.85001 14.402C9.62401 14.203 9.41501 13.989 9.20101 13.776C8.31101 12.891 7.63901 11.936 7.23101 11.034C7.02218 10.5913 6.90938 10.1094 6.90001 9.62C6.89589 9.01285 7.09436 8.42167 7.46401 7.94C7.53701 7.846 7.60601 7.748 7.72501 7.635C7.85201 7.515 7.93201 7.451 8.01901 7.407C8.13469 7.34903 8.26088 7.31502 8.39001 7.307L8.39101 7.308Z"
                                                    fill="#25D366">
                                                </path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_649_65720">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                </clipPath>
                                            </defs>
                                            </svg>
                                            <span class="dropdown-text">WhatsApp</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="item-sub-cat">
                                <div class="accordion-item col-0 contact-us opened">
                                    <div class="accordion-head">Contact Us</div>
                                    <div class="accordion-content collapse show">
                                        <li><a class="" href="">Customer Service</a></li>
                                        <li><a class="" href="">Order Status</a></li>
                                        <li><a class="/email-preference-footer" href="">Update Your Email Preferences</a></li>
                                        <li><a class="" href="">Trade-In Your Watch</a> </li>
                                        <li><a class="" href="">Sell my Rolex</a></li>
                                        <li><a class="" href="">Sell my Watch</a></li>
                                        <li><a class="" href="">Become a Vendor</a></li>
                                    </div>
                                </div>
                                <div class="accordion-item col-1 company-info opened">
                                    <div class="accordion-head">Company Info</div>
                                    <div class="accordion-content collapse show">
                                        <li><a href="/" class="">About Jomashop</a></li>
                                        <li><a class="" href="">Jomashop Reviews</a></li>
                                        <li><a href="" class="">The Parlor: Our Blog</a></li>
                                        <li><a href="" class="">Affiliate Program</a></li>
                                        <li><a href="" lass="">Authenticity Guarantee</a></li>
                                        <li><a class="" href="">Jomashop Coupon Codes</a></li>
                                        <li><a class="" href="">Jomashop Gift Cards</a></li>
                                    </div>
                                </div>
                                <div class="accordion-item col-2 help-center opened">
                                    <div class="accordion-head">Help Center</div>
                                    <div class="accordion-content collapse show">
                                        <li><a href="https://jomashop.zendesk.com/hc/en-us/articles/11922972264219-Where-is-my-order-/"
                                            class="">Order Information</a></li>
                                        <li><a
                                            href="https://jomashop.zendesk.com/hc/en-us/articles/11923107626907-Shipping-Options-Policies/"
                                            class="">Shipping Options</a></li>
                                        <li><a
                                            href="https://jomashop.zendesk.com/hc/en-us/articles/11923118455835-Do-you-ship-internationally-/"
                                            class="">International Shipping</a></li>
                                        <li><a
                                            href="https://jomashop.zendesk.com/hc/en-us/articles/11923107419419-Which-payment-methods-do-you-accept-/"
                                            class="">Payment Options</a></li>
                                        <li><a class="" href="/pay-with-bitcoin-ethereum-dogecoin-sale.html">Pay with Bitpay / Crypto</a>
                                        </li>
                                    </div>
                                </div>
                                <div class="accordion-item col-3 returns-&amp;-warranty opened">
                                    <div class="accordion-head">Returns &amp; Warranty</div>
                                    <div class="accordion-content collapse show">
                                        <li><a href="//help.jomashop.com/articles/4682-what-is-your-returns-and-exchanges-policy/"
                                            class="">Returns &amp; Exchange Policy</a></li>
                                        <li><a href="//help.jomashop.com/articles/31751-start-a-return-returns-center/" class="">Returns
                                            Center</a></li>
                                        <li><a
                                            href="https://jomashop.zendesk.com/hc/en-us/articles/11923055034139-Do-you-give-a-warranty-with-the-watch-/"
                                            class="">Warranty Policy</a></li>
                                        <li><a href="//help.jomashop.com/articles/5578-request-a-repair/" class="">Warranty Repair
                                            Center</a></li>
                                    </div>
                                </div>
                                <div class="accordion-item col-4 customer-service opened">
                                    <div class="accordion-head">Customer Service</div>
                                    <div class="accordion-content contain-non-links collapse show">
                                        <div>
                                            <li><a href="tel:877-834-1434">877-834-1434</a></li>
                                            <li>
                                                <address>Brooklyn Army Terminal Building A <br>140A 58th Street, Suite 6N - 6th Floor<br>Brooklyn, NY 11220
                                                </address>
                                            </li>
                                        </div>
                                        <div class="chat-call-section" tabindex="0">
                                            <div class="chat-call chat">
                                                <span class="chat-icon-support">
                                                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.27894 2.4375L5.28125 2.4375H20.7188L20.7211 2.4375C21.6893 2.44026 22.6171 2.82611 23.3017 3.51076C23.9864 4.19541 24.3722 5.1232 24.375 6.09144L24.375 6.09375V15.8438L24.375 15.8461C24.3722 16.8143 23.9864 17.7421 23.3017 18.4267C22.6171 19.1114 21.6893 19.4972 20.7211 19.5L20.7188 19.5H12.4793L7.83281 23.3741C7.59064 23.576 7.25352 23.6195 6.96797 23.4858C6.68242 23.3521 6.5 23.0653 6.5 22.75V19.5H5.28125L5.27894 19.5C4.3107 19.4972 3.38291 19.1114 2.69826 18.4267C2.01361 17.7421 1.62776 16.8143 1.625 15.8461L1.625 15.8438V6.09375L1.625 6.09144C1.62776 5.1232 2.01361 4.19541 2.69826 3.51076C3.38291 2.82611 4.3107 2.44026 5.27894 2.4375ZM12.5926 19.4055C12.5924 19.4057 12.5922 19.4058 12.592 19.406L12.5926 19.4055ZM5.2825 4.0625C4.74402 4.06431 4.22809 4.27902 3.84731 4.65981C3.46652 5.04059 3.25181 5.55652 3.25 6.095V15.8425C3.25181 16.381 3.46652 16.8969 3.84731 17.2777C4.22811 17.6585 4.74406 17.8732 5.28256 17.875H7.3125C7.76123 17.875 8.125 18.2388 8.125 18.6875V21.0147L11.5509 18.1584C11.551 18.1582 11.5512 18.1581 11.5514 18.1579C11.7705 17.9751 12.0469 17.875 12.3322 17.875C12.3323 17.875 12.3323 17.875 12.3324 17.875H20.7174C21.2559 17.8732 21.7719 17.6585 22.1527 17.2777C22.5335 16.8969 22.7482 16.3809 22.75 15.8424V6.09506C22.7482 5.55656 22.5335 5.04061 22.1527 4.65981C21.7719 4.27902 21.256 4.06431 20.7175 4.0625H5.2825Z"
                                                            fill="white"></path>
                                                        <path
                                                            d="M8.125 12.5938C9.02246 12.5938 9.75 11.8662 9.75 10.9688C9.75 10.0713 9.02246 9.34375 8.125 9.34375C7.22754 9.34375 6.5 10.0713 6.5 10.9688C6.5 11.8662 7.22754 12.5938 8.125 12.5938Z"
                                                            fill="white"></path>
                                                        <path
                                                            d="M13 12.5938C13.8975 12.5938 14.625 11.8662 14.625 10.9688C14.625 10.0713 13.8975 9.34375 13 9.34375C12.1025 9.34375 11.375 10.0713 11.375 10.9688C11.375 11.8662 12.1025 12.5938 13 12.5938Z"
                                                            fill="white"></path>
                                                        <path
                                                            d="M17.875 12.5938C18.7725 12.5938 19.5 11.8662 19.5 10.9688C19.5 10.0713 18.7725 9.34375 17.875 9.34375C16.9775 9.34375 16.25 10.0713 16.25 10.9688C16.25 11.8662 16.9775 12.5938 17.875 12.5938Z"
                                                            fill="white"></path>
                                                    </svg>
                                                </span>
                                                <span class="chat-text">Chat </span>
                                                <strong class="chat-or">or </strong>
                                                <span class="call-text">Call </span>
                                                <span class="chat-call-phone-number">(877) 834-1434</span>
                                            </div>
                                            <ul class="chat-call-dropdown">
                                                <li><a href="tel://1-877-834-1434" data-href="tel://1-877-834-1434"
                                                    title="Tap here to call us!"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_448_68674)">
                                                        <path
                                                        d="M9.366 10.682C10.3043 12.3305 11.6695 13.6957 13.318 14.634L14.202 13.396C14.3442 13.1969 14.5543 13.0569 14.7928 13.0023C15.0313 12.9478 15.2814 12.9825 15.496 13.1C16.9103 13.8729 18.4722 14.3378 20.079 14.464C20.3298 14.4839 20.5638 14.5975 20.7345 14.7823C20.9052 14.9671 21 15.2094 21 15.461V19.923C21.0001 20.1706 20.9083 20.4094 20.7424 20.5932C20.5765 20.777 20.3483 20.8927 20.102 20.918C19.572 20.973 19.038 21 18.5 21C9.94 21 3 14.06 3 5.5C3 4.962 3.027 4.428 3.082 3.898C3.10725 3.6517 3.22298 3.42352 3.40679 3.25763C3.5906 3.09175 3.82941 2.99995 4.077 3H8.539C8.79056 2.99997 9.0329 3.09475 9.21768 3.26545C9.40247 3.43615 9.51613 3.67022 9.536 3.921C9.66222 5.52779 10.1271 7.08968 10.9 8.504C11.0175 8.71856 11.0522 8.96874 10.9977 9.2072C10.9431 9.44565 10.8031 9.65584 10.604 9.798L9.366 10.682ZM6.844 10.025L8.744 8.668C8.20478 7.50409 7.83535 6.26884 7.647 5H5.01C5.004 5.166 5.001 5.333 5.001 5.5C5 12.956 11.044 19 18.5 19C18.667 19 18.834 18.997 19 18.99V16.353C17.7312 16.1646 16.4959 15.7952 15.332 15.256L13.975 17.156C13.4287 16.9437 12.898 16.6931 12.387 16.406L12.329 16.373C10.3676 15.2567 8.74328 13.6324 7.627 11.671L7.594 11.613C7.30691 11.102 7.05628 10.5713 6.844 10.025Z"
                                                        fill="black"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_448_68674">
                                                        <rect width="24" height="24" fill="white"></rect>
                                                        </clipPath>
                                                    </defs>
                                                    </svg><span class="dropdown-text">Call</span></a>
                                                </li>
                                                <li><a href="#" title="Tap here to Live Chat"><svg width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.27894 2.4375L5.28125 2.4375H20.7188L20.7211 2.4375C21.6893 2.44026 22.6171 2.82611 23.3017 3.51076C23.9864 4.19541 24.3722 5.1232 24.375 6.09144L24.375 6.09375V15.8438L24.375 15.8461C24.3722 16.8143 23.9864 17.7421 23.3017 18.4267C22.6171 19.1114 21.6893 19.4972 20.7211 19.5L20.7188 19.5H12.4793L7.83281 23.3741C7.59064 23.576 7.25352 23.6195 6.96797 23.4858C6.68242 23.3521 6.5 23.0653 6.5 22.75V19.5H5.28125L5.27894 19.5C4.3107 19.4972 3.38291 19.1114 2.69826 18.4267C2.01361 17.7421 1.62776 16.8143 1.625 15.8461L1.625 15.8438V6.09375L1.625 6.09144C1.62776 5.1232 2.01361 4.19541 2.69826 3.51076C3.38291 2.82611 4.3107 2.44026 5.27894 2.4375ZM12.5926 19.4055C12.5924 19.4057 12.5922 19.4058 12.592 19.406L12.5926 19.4055ZM5.2825 4.0625C4.74402 4.06431 4.22809 4.27902 3.84731 4.65981C3.46652 5.04059 3.25181 5.55652 3.25 6.095V15.8425C3.25181 16.381 3.46652 16.8969 3.84731 17.2777C4.22811 17.6585 4.74406 17.8732 5.28256 17.875H7.3125C7.76123 17.875 8.125 18.2388 8.125 18.6875V21.0147L11.5509 18.1584C11.551 18.1582 11.5512 18.1581 11.5514 18.1579C11.7705 17.9751 12.0469 17.875 12.3322 17.875C12.3323 17.875 12.3323 17.875 12.3324 17.875H20.7174C21.2559 17.8732 21.7719 17.6585 22.1527 17.2777C22.5335 16.8969 22.7482 16.3809 22.75 15.8424V6.09506C22.7482 5.55656 22.5335 5.04061 22.1527 4.65981C21.7719 4.27902 21.256 4.06431 20.7175 4.0625H5.2825Z"
                                                        fill="black"></path>
                                                    <path
                                                        d="M8.125 12.5938C9.02246 12.5938 9.75 11.8662 9.75 10.9688C9.75 10.0713 9.02246 9.34375 8.125 9.34375C7.22754 9.34375 6.5 10.0713 6.5 10.9688C6.5 11.8662 7.22754 12.5938 8.125 12.5938Z"
                                                        fill="black"></path>
                                                    <path
                                                        d="M13 12.5938C13.8975 12.5938 14.625 11.8662 14.625 10.9688C14.625 10.0713 13.8975 9.34375 13 9.34375C12.1025 9.34375 11.375 10.0713 11.375 10.9688C11.375 11.8662 12.1025 12.5938 13 12.5938Z"
                                                        fill="black"></path>
                                                    <path
                                                        d="M17.875 12.5938C18.7725 12.5938 19.5 11.8662 19.5 10.9688C19.5 10.0713 18.7725 9.34375 17.875 9.34375C16.9775 9.34375 16.25 10.0713 16.25 10.9688C16.25 11.8662 16.9775 12.5938 17.875 12.5938Z"
                                                        fill="black"></path>
                                                    </svg><span class="dropdown-text">Chat</span></a>
                                                </li>
                                                <li class="whatsapp-item"><a
                                                    href="https://api.whatsapp.com/send?phone=18778341450&amp;text=Hi&amp;source=&amp;data=&amp;app_absent="
                                                    title="Tap here to Live Chat" target="_blank" rel="noreferrer"><svg width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_649_65720)">
                                                        <path
                                                        d="M7.25301 18.494L7.97701 18.917C9.19795 19.6291 10.5866 20.0029 12 20C13.5823 20 15.129 19.5308 16.4446 18.6518C17.7602 17.7727 18.7855 16.5233 19.3911 15.0615C19.9966 13.5997 20.155 11.9911 19.8463 10.4393C19.5376 8.88743 18.7757 7.46197 17.6569 6.34315C16.538 5.22433 15.1126 4.4624 13.5607 4.15372C12.0089 3.84504 10.4004 4.00346 8.93855 4.60896C7.47674 5.21447 6.22731 6.23984 5.34826 7.55544C4.46921 8.87103 4.00001 10.4177 4.00001 12C4.00001 13.436 4.37701 14.813 5.08401 16.024L5.50601 16.748L4.85301 19.149L7.25301 18.494ZM2.00401 22L3.35601 17.032C2.46515 15.5049 1.99711 13.768 2.00001 12C2.00001 6.477 6.47701 2 12 2C17.523 2 22 6.477 22 12C22 17.523 17.523 22 12 22C10.2328 22.0029 8.49667 21.5352 6.97001 20.645L2.00401 22ZM8.39101 7.308C8.52501 7.298 8.66001 7.298 8.79401 7.304C8.84801 7.308 8.90201 7.314 8.95601 7.32C9.11501 7.338 9.29001 7.435 9.34901 7.569C9.64701 8.245 9.93701 8.926 10.217 9.609C10.279 9.761 10.242 9.956 10.124 10.146C10.0429 10.2745 9.95507 10.3986 9.86101 10.518C9.74801 10.663 9.50501 10.929 9.50501 10.929C9.50501 10.929 9.40601 11.047 9.44401 11.194C9.45801 11.25 9.50401 11.331 9.54601 11.399L9.60501 11.494C9.86101 11.921 10.205 12.354 10.625 12.762C10.745 12.878 10.862 12.997 10.988 13.108C11.456 13.521 11.986 13.858 12.558 14.108L12.563 14.11C12.648 14.147 12.691 14.167 12.815 14.22C12.877 14.246 12.941 14.269 13.006 14.286C13.0732 14.3031 13.1439 14.2999 13.2093 14.2767C13.2746 14.2536 13.3316 14.2116 13.373 14.156C14.097 13.279 14.163 13.222 14.169 13.222V13.224C14.2193 13.1771 14.2791 13.1415 14.3443 13.1196C14.4095 13.0977 14.4786 13.09 14.547 13.097C14.607 13.101 14.668 13.112 14.724 13.137C15.255 13.38 16.124 13.759 16.124 13.759L16.706 14.02C16.804 14.067 16.893 14.178 16.896 14.285C16.9 14.352 16.906 14.46 16.883 14.658C16.851 14.917 16.773 15.228 16.695 15.391C16.6416 15.5022 16.5707 15.6042 16.485 15.693C16.3841 15.7989 16.2736 15.8954 16.155 15.981C16.114 16.0119 16.0723 16.0419 16.03 16.071C15.9056 16.1499 15.7778 16.2233 15.647 16.291C15.3895 16.4278 15.1052 16.5063 14.814 16.521C14.629 16.531 14.444 16.545 14.258 16.535C14.25 16.535 13.69 16.448 13.69 16.448C12.2683 16.074 10.9534 15.3735 9.85001 14.402C9.62401 14.203 9.41501 13.989 9.20101 13.776C8.31101 12.891 7.63901 11.936 7.23101 11.034C7.02218 10.5913 6.90938 10.1094 6.90001 9.62C6.89589 9.01285 7.09436 8.42167 7.46401 7.94C7.53701 7.846 7.60601 7.748 7.72501 7.635C7.85201 7.515 7.93201 7.451 8.01901 7.407C8.13469 7.34903 8.26088 7.31502 8.39001 7.307L8.39101 7.308Z"
                                                        fill="#25D366"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_649_65720">
                                                        <rect width="24" height="24" fill="white"></rect>
                                                        </clipPath>
                                                    </defs>
                                                    </svg><span class="dropdown-text">WhatsApp</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script type="text/javascript" src="./dist/js/config.js"></script>
    <script type="text/javascript" src="./dist/js/modal.js"></script>















</body>
</html>