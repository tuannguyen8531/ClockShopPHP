<!DOCTYPE html>
<html lang="en">
<?php
    include 'config.php';
    
    if (isset($_POST['signout'])) {
        unset($_SESSION['customer']);
        header('location: index.php');
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="shortcut icon" href="./dist/file/usd.0fb3ccd8c33808902bbd.svg" />
    <link rel="stylesheet" href="./dist/css/1882.d22b2a4d319f5798c600.initial.css">
    <link rel="stylesheet" href="./dist/css/1312.31d6cfe0d16ae931b73c.bundle.css">
    <link rel="stylesheet" href="./dist/css/1634.1a661808a4dbdbef312c.initial.css">
    <link rel="stylesheet" href="./dist/css/2557.53c4e93c6ec21bc19e7c.bundle.css">
    <link rel="stylesheet" href="./dist/css/256.9a4d8502ef8eea2ebf3f.bundle.css">
    <link rel="stylesheet" href="./dist/css/3482.0051ec8bf96fa0b92067.bundle.css">
    <link rel="stylesheet" href="./dist/css/5531.2501ef6314da696e9b86.bundle.css">
    <link rel="stylesheet" href="./dist/css/5606.6b4ee6bd0876f7792e52.bundle.css">
    <link rel="stylesheet" href="./dist/css/591.af82319651e53c8c3f1a.bundle.css">
    <link rel="stylesheet" href="./dist/css/629.ac02469f0d06a538712a.bundle.css">
    <link rel="stylesheet" href="./dist/css/8825.51df8c031c82efbe88b4.bundle.css">
    <link rel="stylesheet" href="./dist/css/9695.0508d067424b8b31465c.bundle.css">
    <link rel="stylesheet" href="./dist/css/RootCmp_CATEGORY.css">
    <link rel="stylesheet" href="./dist/css/RootCmp_PRODUCT__default.d25d1be5857635f5e62e.initial.css"> -->
    <link rel="stylesheet" type="text/css" href="./dist/css/1882.d22b2a4d319f5798c600.initial.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/1634.1a661808a4dbdbef312c.initial.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/3482.0051ec8bf96fa0b92067.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/591.af82319651e53c8c3f1a.bundle.css">

    <link rel="stylesheet" type="text/css" href="./dist/css/1312.31d6cfe0d16ae931b73c.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/5531.2501ef6314da696e9b86.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/2557.53c4e93c6ec21bc19e7c.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/9695.0508d067424b8b31465c.bundle.css">
   
    <link rel="stylesheet" type="text/css" href="./dist/css/5832.9cb994dbcd939cdf2742.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/5458.6250c0fd295eeca21e3a.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/629.ac02469f0d06a538712a.bundle.css">

    <link rel="stylesheet" type="text/css" href="./dist/css/256.9a4d8502ef8eea2ebf3f.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/5606.6b4ee6bd0876f7792e52.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/8825.51df8c031c82efbe88b4.bundle.css">


    <link rel="stylesheet" href="./dist/css/256.9a4d8502ef8eea2ebf3f.bundle.css">
    <link rel="stylesheet" href="./dist/css/5606.6b4ee6bd0876f7792e52.bundle.css">
    <link rel="stylesheet" href="./dist/css/8825.51df8c031c82efbe88b4.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/3409.9bd6de7ba69766f5a656.initial.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/3482.3bf6683f27a44ebcd105.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/5421.2501ef6314da696e9b86.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/6468.2501ef6314da696e9b86.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/8890.6659a6f809d9fbafb555.bundle.css">
 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        let acLoginForm = $(".account-login-form-1");
        let acLoginForm2 = $(".account-login-form-2");
        let acRegisterForm = $(".account-register-form");
        let acSignInForm = $(".signin");
            $("#continue").on("click", function(){
                let emailC = $("#emailC").val();
                let email = $("#email_register");
                let emailLogin = $("#email_address");             
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
                       
                        emailLogin.val(emailC);
        
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
                            location.reload();
                        }
                        
                    },
                    error: function(xhr, status, error) {
                        console.log("Error in AJAX request:", status, error);
                    }
                });
            });

            $("#login").on("click", function() {
                let emailLogin = $("#email_address").val();
                console.log(emailLogin);
                let passLogin = $("#password").val();                           
                let errEmailLogin = $(".errEmailLogin");
                let errPassLogin = $(".errPassLogin");
   
                $.ajax({
                    url: "LoginAccCus.php",
                    method: "POST",
                    data: { emailLogin: emailLogin, passLogin: passLogin},
                    dataType: 'json', // Expect JSON response
                    success: function(response) {
                        // Clear previous error messages
                        errEmailLogin.html("");
                        errPassLogin.html("");

                        // Check for specific errors and display messages
                        if (response.errorEmailLogin) {
                            errEmailLogin.html(response.errorEmailLogin);
                            errEmailLogin.addClass("root_error");
                        }
    
                        if (response.errorPassLogin) {
                            errPassLogin.html(response.errorPassLogin);
                            errPassLogin.addClass("root_error");
                        }
      

                        if (response.success) {
                            acLoginForm2.css("display", "none");
                            acSignInForm.css("display", "block");
                            location.reload();
                        }
                        
                    },
                    error: function(xhr, status, error) {
                        console.log("Error in AJAX request:", status, error);
                    }
                });
            });

   

            $('#email_register').on('input', function() {
         
                acLoginForm.css("display", "block");
                acRegisterForm.css("display", "none");
            });
            // // Kiểm tra sự thay đổi khi người dùng chỉnh sửa giá trị
            $('#email_address').on('input', function() {
                
                acLoginForm.css("display", "block");
                acLoginForm2.css("display", "none");
            });


 
          
        });

    </script>
</head>
<body>
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
                        <a href="index.php"><img src="./dist/file/jomashop_logo.7c0762d85d36b44f0c59.png" alt="logo"></a>
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
                                        <a class="levelTop" href="./list.php?gender=1" aria-label="Men's" tabindex="-1">Men's</a>
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
                                        <a class="levelTop" href="./list.php?gender=0" aria-label="Ladies" tabindex="-1">Ladies</a>
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
                                        <a class="levelTop" href="./list.php" aria-label="Watches" tabindex="-1">Watches</a>
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
                                        <a class="levelTop" href="./list.php?sale=true" aria-label="Sale" tabindex="-1">Sale</a>
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
                <div class="account-form" >
                    <div class="account-form-steps open">
                        <div aria-labelledby="account-login-form-heading" class="account-login-form account-login-form-1 account-form-wrapper" style="display: <?= isset($_SESSION['customer']) ? 'none' : 'block'?>">
                            <h3 class="title">Sign In To Jomashop</h3>
                            <form>
                                <div id="error" style="color: red;"></div>
                                <div id="ok" style="color: green"></div>
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
                                        <span class="input-block">
                                            <input class="input-box-new-design" field="email" type="email" autocomplete="email" placeholder="Email" id="emailC" name="emailC" aria-required="true" value="">
                                        </span>
                                        <span class="before"></span>
                                        <span class="after"></span>
                                    </div>
                                    <span class="message-root">
                                        <p class="errEmailC"></p>
                                    </span>
                                </div>
                                <div class="actions-toolbar">
                                    <button class="btn-new-design primary" type="button" name="continue" id="continue">Continue</button>
                                </div>
                            </form>
                        </div>
                        <div aria-labelledby="account-register-form-heading" class="account-register-form account-form-wrapper"
                            style="display: none;">
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
                                        <span class="before"></span>
                                        <span class="after"></span>
                                    </div>
                                    <span class="message-root"> 
                                        <p class="errEmail"></p>
                                    </span>
                                </div>
                                <div class="field-wrapper  can-focus  ">
                                    <label for="first_name" class="label">First Name<span class="requiredSymbol">*</span></label>
                                    <div class="field-icons" style="--iconsBefore: 0; --iconsAfter: 0;">
                                        <span class="input-block">
                                            <input type="text" autocomplete="given-name" placeholder="First Name" aria-required="true" class="" id="first_name" name="firstname" value="<?php if (isset($firstName)) echo $firstName ?>">
                                        </span>
                                        <span class="before"></span>
                                        <span class="after"></span>
                                    </div>
                                    <span class="message-root">
                                        <p class="errFirstName"></p>
                                    </span>
                                </div>
                                <div class="field-wrapper  can-focus  ">
                                    <label for="last_name" class="label">Last Name<span class="requiredSymbol">*</span></label>
                                    <div class="field-icons" style="--iconsBefore: 0; --iconsAfter: 0;">
                                        <span class="input-block">
                                            <input type="text" autocomplete="family-name" placeholder="Last Name" aria-required="true" class="" id="last_name" name="lastname" value="<?php if (isset($lastName)) echo $lastName ?>">
                                        </span>
                                        <span class="before"></span>
                                        <span class="after"></span>
                                    </div>
                                    <span class="message-root">
                                        <p class="errLastName"></p>
                                    </span>
                                </div>
                                <div class="ReactPasswordStrength input-password-wrapper is-strength-null">
                                    <div class="field-wrapper  can-focus  " style="position: relative;">
                                        <label class="label">Password
                                            <span class="requiredSymbol">*</span>
                                        </label>
                                        <input type="password" class="ReactPasswordStrength-input input-password" autocomplete="off" placeholder="Password" id="pass_word" name="password" value="<?php if (isset($passWord)) echo $passWord ?>" style="transition: none 0s ease 0s;">
                                        <span class="message-root">
                                            <p class="errPass"></p>
                                        </span>
                                    </div>
                                    <div class="ReactPasswordStrength-strength-bar"></div>
                                </div>
                                <div class="field-wrapper  can-focus  ">
                                    <label for="confirm_password" class="label">Confirm Password<span class="requiredSymbol">*</span></label>
                                    <div class="field-icons" style="--iconsBefore: 0; --iconsAfter: 0;">
                                        <span class="input-block">
                                            <input type="password" placeholder="Confirm Password" aria-required="true" class="" id="confirm_password" name="confirm" value="<?php if (isset($confirm)) echo $confirm ?>">
                                        </span>
                                        <span class="before"></span>
                                        <span class="after"></span>
                                    </div>
                                    <span class="message-root">
                                            <p class="errConfirm"></p>
                                    </span>
                                </div>
                                <div></div>
                                <button class="btn-new-design primary" type="button" name="create" id="create">Create Account</button>
                                <div aria-hidden="true" class="ownid-form-clearfix" style="overflow:hidden;z-index:-100;position:absolute;width:1px;-webkit-filter:blur(5vw);-moz-filter:blur(5px);-o-filter:blur(5px);-ms-filter:blur(5px);height:1px;background-color:#fff;">
                                    <input id="password-text-field-8wadnr2zbem" aria-hidden="true" type="password" autocomplete="current-password" tabindex="-1">
                                    <input id="password-text-field-8wadnr2zbem2" aria-hidden="true" type="password" autocomplete="current-password" tabindex="-1">
                                </div>
                            </form>
                            <div class="terms-wrapper">
                                <div class="terms">
                                    <span>By creating an account, you are agreeing to our 
                                        <a title="privacy policy" href="https://help.jomashop.com/hc/en-us/articles/19861667238939-Privacy-Policy">privacy policy</a>and
                                        <a title="terms of use" href="https://help.jomashop.com/articles/61058-terms-conditions">terms of use</a>.
                                    </span>
                                </div>
                            </div>
                            <div class="sign-in-link-wrapper">
                                <span class="text">Have an account?</span>
                                <button class="btn-new-design link" title="Sign In">Sign In</button>
                            </div>
                        </div>
                        <div aria-labelledby="account-login-form-heading" class="account-login-form account-login-form-2 account-form-wrapper" 
                            style="display:none">
                            <div id="account-login-form-heading" class="customer exist"><span>Enter your password to continue</span></div>
                            <form method="post">
                                <div class="field-wrapper  can-focus  ">
                                    <label for="email_address" class="label">Email<span class="requiredSymbol">*</span></label>
                                    <div class="field-icons" style="--iconsBefore: 0; --iconsAfter: 0;">
                                        <span class="input-block">
                                            <input class="input-box-new-design" field="email" type="email" autocomplete="email" placeholder="Email" id="email_address" aria-required="true" name="emailLogin" value="<?php if (isset($emailC)) echo $emailC ?>" sr-value="*************">
                                        </span>
                                        <span class="before"></span>
                                        <span class="after"></span>
                                    </div>
                                    <span class="message-root">
                                        <p class="errEmailLogin"></p>
                                    </span>
                                </div>
                                <div class="field-wrapper  can-focus  ">
                                    <label for="password" class="label">Password<span class="requiredSymbol">*</span></label>
                                    <div class="field-icons" style="--iconsBefore: 0; --iconsAfter: 0;">
                                        <span class="input-block" style="position: relative;">
                                            <input class="input-box-new-design" field="password" type="password" autocomplete="new-password" placeholder="Password" id="password" aria-required="true" value="" name="passLogin" style="width: 290px !important; margin-right: 78px !important; transition: none 0s ease 0s;">
                                        </span>
                                        <span class="before"></span>
                                        <span class="after"></span>
                                    </div>
                                    <span class="message-root">
                                        <p class="errPassLogin"></p>
                                    </span>
                                </div>
                                <div class="actions-toolbar">
                                    <button class="btn-new-design primary" type="button" name="login" id="login">Sign In</button>
                                    <div></div>
                                    <a title="Forgot password?" class="forgot-password-link" href="/">Forgot password?</a>
                                </div>
                            </form>
                            <p class="text-align-center">Or</p>
                            <form class="form-email-onetime"><button class="btn-new-design primary" type="submit">Email One Time Link</button></form>
                        </div>
                    </div>
                </div>
                <div class="account-form signin" style="display: none;" >
                    <div class="account-form-dropdown" style="display: <?= isset($_SESSION['customer']) ? 'block' : 'none'?>">
                        <h3 class="account-form-title">
                            <a href="#">Welcome, <?php  if (isset($_SESSION['customer'])) echo $_SESSION['customer'] ?></a>
                        </h3>
                        <div class="account-form-group">
                            <h4 class="group-title">Recent Orders</h4>
                            <a href="#" class="group-item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path
                                        d="M12 1L21.5 6.5V17.5L12 23L2.5 17.5V6.5L12 1ZM5.49388 7.0777L12.0001 10.8444L18.5062 7.07774L12 3.311L5.49388 7.0777ZM4.5 8.81329V16.3469L11.0001 20.1101V12.5765L4.5 8.81329ZM13.0001 20.11L19.5 16.3469V8.81337L13.0001 12.5765V20.11Z"
                                        fill="currentColor">
                                    </path>
                                </svg>
                                <span class="group-item-name">View All Orders</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-right">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                            <h4 class="group-title">My Payment Data</h4>
                            <a href="#" class="group-item group-item-card">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path
                                        d="M3.00488 3H21.0049C21.5572 3 22.0049 3.44772 22.0049 4V20C22.0049 20.5523 21.5572 21 21.0049 21H3.00488C2.4526 21 2.00488 20.5523 2.00488 20V4C2.00488 3.44772 2.4526 3 3.00488 3ZM20.0049 12H4.00488V19H20.0049V12ZM20.0049 8V5H4.00488V8H20.0049Z"
                                        fill="currentColor">
                                    </path>
                                </svg>
                                <span class="group-item-name">Manage Cards</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-right">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                            <h4 class="group-title">Gift Cards</h4>
                            <a href="#" class="group-item group-item-card">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path
                                        d="M14.5049 2.00293C16.4379 2.00293 18.0049 3.56993 18.0049 5.50293C18.0049 6.04014 17.8839 6.54908 17.6676 7.00397L21.0049 7.00293C21.5572 7.00293 22.0049 7.45064 22.0049 8.00293V12.0029C22.0049 12.5552 21.5572 13.0029 21.0049 13.0029H20.0049V21.0029C20.0049 21.5552 19.5572 22.0029 19.0049 22.0029H5.00488C4.4526 22.0029 4.00488 21.5552 4.00488 21.0029V13.0029H3.00488C2.4526 13.0029 2.00488 12.5552 2.00488 12.0029V8.00293C2.00488 7.45064 2.4526 7.00293 3.00488 7.00293L6.34219 7.00397C6.12591 6.54908 6.00488 6.04014 6.00488 5.50293C6.00488 3.56993 7.57189 2.00293 9.50488 2.00293C10.4849 2.00293 11.3708 2.40569 12.0061 3.05471C12.639 2.40569 13.5249 2.00293 14.5049 2.00293ZM18.0049 13.0029H6.00488V20.0029H18.0049V13.0029ZM20.0049 9.00293H4.00488V11.0029H20.0049V9.00293ZM9.50488 4.00293C8.67646 4.00293 8.00488 4.6745 8.00488 5.50293C8.00488 6.28263 8.59977 6.92338 9.36042 6.99606L9.50488 7.00293H11.0049V5.50293C11.0049 4.72323 10.41 4.08248 9.64934 4.0098L9.50488 4.00293ZM14.5049 4.00293L14.3604 4.0098C13.6473 4.07794 13.0799 4.64536 13.0117 5.35847L13.0049 5.50293V7.00293H14.5049L14.6493 6.99606C15.41 6.92338 16.0049 6.28263 16.0049 5.50293C16.0049 4.72323 15.41 4.08248 14.6493 4.0098L14.5049 4.00293Z"
                                        fill="currentColor">
                                    </path>
                                </svg>
                                <span class="group-item-name">Gift Cards</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-right">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                            <h4 class="group-title">Settings</h4>
                            <a href="./account_setting.php" class="group-item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path
                                        d="M3.33946 17.0002C2.90721 16.2515 2.58277 15.4702 2.36133 14.6741C3.3338 14.1779 3.99972 13.1668 3.99972 12.0002C3.99972 10.8345 3.3348 9.824 2.36353 9.32741C2.81025 7.71651 3.65857 6.21627 4.86474 4.99001C5.7807 5.58416 6.98935 5.65534 7.99972 5.072C9.01009 4.48866 9.55277 3.40635 9.4962 2.31604C11.1613 1.8846 12.8847 1.90004 14.5031 2.31862C14.4475 3.40806 14.9901 4.48912 15.9997 5.072C17.0101 5.65532 18.2187 5.58416 19.1346 4.99007C19.7133 5.57986 20.2277 6.25151 20.66 7.00021C21.0922 7.7489 21.4167 8.53025 21.6381 9.32628C20.6656 9.82247 19.9997 10.8336 19.9997 12.0002C19.9997 13.166 20.6646 14.1764 21.6359 14.673C21.1892 16.2839 20.3409 17.7841 19.1347 19.0104C18.2187 18.4163 17.0101 18.3451 15.9997 18.9284C14.9893 19.5117 14.4467 20.5941 14.5032 21.6844C12.8382 22.1158 11.1148 22.1004 9.49633 21.6818C9.55191 20.5923 9.00929 19.5113 7.99972 18.9284C6.98938 18.3451 5.78079 18.4162 4.86484 19.0103C4.28617 18.4205 3.77172 17.7489 3.33946 17.0002ZM8.99972 17.1964C10.0911 17.8265 10.8749 18.8227 11.2503 19.9659C11.7486 20.0133 12.2502 20.014 12.7486 19.9675C13.1238 18.8237 13.9078 17.8268 14.9997 17.1964C16.0916 16.5659 17.347 16.3855 18.5252 16.6324C18.8146 16.224 19.0648 15.7892 19.2729 15.334C18.4706 14.4373 17.9997 13.2604 17.9997 12.0002C17.9997 10.74 18.4706 9.5632 19.2729 8.6665C19.1688 8.4405 19.0538 8.21822 18.9279 8.00021C18.802 7.78219 18.667 7.57148 18.5233 7.36842C17.3457 7.61476 16.0911 7.43414 14.9997 6.80405C13.9083 6.17395 13.1246 5.17768 12.7491 4.03455C12.2509 3.98714 11.7492 3.98646 11.2509 4.03292C10.8756 5.17671 10.0916 6.17364 8.99972 6.80405C7.9078 7.43447 6.65245 7.61494 5.47428 7.36803C5.18485 7.77641 4.93463 8.21117 4.72656 8.66637C5.52881 9.56311 5.99972 10.74 5.99972 12.0002C5.99972 13.2604 5.52883 14.4372 4.72656 15.3339C4.83067 15.5599 4.94564 15.7822 5.07152 16.0002C5.19739 16.2182 5.3324 16.4289 5.47612 16.632C6.65377 16.3857 7.90838 16.5663 8.99972 17.1964ZM11.9997 15.0002C10.3429 15.0002 8.99972 13.6571 8.99972 12.0002C8.99972 10.3434 10.3429 9.00021 11.9997 9.00021C13.6566 9.00021 14.9997 10.3434 14.9997 12.0002C14.9997 13.6571 13.6566 15.0002 11.9997 15.0002ZM11.9997 13.0002C12.552 13.0002 12.9997 12.5525 12.9997 12.0002C12.9997 11.4479 12.552 11.0002 11.9997 11.0002C11.4474 11.0002 10.9997 11.4479 10.9997 12.0002C10.9997 12.5525 11.4474 13.0002 11.9997 13.0002Z"
                                        fill="currentColor">
                                    </path>
                                </svg>
                                <span class="group-item-name">Account Settings</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-right">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                            <a href="./account_address.php" class="group-item">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path
                                        d="M12 20.8995L16.9497 15.9497C19.6834 13.2161 19.6834 8.78392 16.9497 6.05025C14.2161 3.31658 9.78392 3.31658 7.05025 6.05025C4.31658 8.78392 4.31658 13.2161 7.05025 15.9497L12 20.8995ZM12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364L12 23.7279ZM12 13C13.1046 13 14 12.1046 14 11C14 9.89543 13.1046 9 12 9C10.8954 9 10 9.89543 10 11C10 12.1046 10.8954 13 12 13ZM12 15C9.79086 15 8 13.2091 8 11C8 8.79086 9.79086 7 12 7C14.2091 7 16 8.79086 16 11C16 13.2091 14.2091 15 12 15Z"
                                        fill="currentColor">
                                    </path>
                                </svg>
                                <span class="group-item-name">My Addresses</span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-right">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                            <form method="post">
                                <button name="signout" class="btn-new-design secondary">Sign Out</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="cart-page">
                    <div class="cart-container">
                        <div class="empty-cart">
                            <div class="empty-cart-face">
                                <svg width="168" height="188" viewBox="0 0 168 188" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <g>
                                            <g>
                                                <path
                                                    d="M154.082 172.793a19.266 19.266 0 0 1-14.327 6.394H25.988c-4.654 0-9.1-1.985-12.195-5.444a16.271 16.271 0 0 1-4.05-12.693L21.795 55.192h24.01v11.225c0 2.434 1.982 4.404 4.419 4.404 2.437 0 4.418-1.975 4.418-4.404V55.192h59.316v11.225c0 2.434 1.981 4.404 4.418 4.404a4.412 4.412 0 0 0 4.419-4.404V55.192h24.347l11.692 102.687a19.113 19.113 0 0 1-4.75 14.914zM54.642 38.368c0-16.297 13.303-29.555 29.654-29.555 16.352 0 29.66 13.258 29.66 29.555v8.017H54.642zm112.98 118.524l-12.137-106.6a4.412 4.412 0 0 0-4.391-3.907h-28.295v-8.017C122.8 17.208 105.527 0 84.302 0c-21.23 0-38.498 17.214-38.498 38.368v8.017H17.847a4.412 4.412 0 0 0-4.392 3.907L.96 160.057a25.095 25.095 0 0 0 6.24 19.557A25.256 25.256 0 0 0 25.993 188h113.768c7.98 0 15.607-3.4 20.92-9.336a27.951 27.951 0 0 0 6.94-21.772z"
                                                    fill="#d0d0d0">
                                                </path>
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
                                                    fill="#d0d0d0">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <h2 class="subtitle">Your Shopping Bag is empty</h2>
                            <p class="text">You have no items in your shopping bag Let’s go buy something!</p>
                            <button class="btn-new-design primary button-wrap">Continue Shopping</button>
                        </div>
                        <div style="display: <?= isset($_SESSION['customer']) ? 'block' : 'none' ?>">
                            <div class="lhs">
                                <div class="cart-items-container">
                                    <div class="cart-item-list-wrapper ">
                                        <div class="cart-item-list">
                                            <div class="cart-item">
                                                <div class="cart-item-wrapper">
                                                    <div class="cart-item-image"><a href="/victorinox-alliance-sport-watch-241818.html"><img src="https://cdn2.jomashop.com/media/catalog/product/cache/65076e0eec254d6ea41c2ba023b4122a/v/i/victorinox-alliance-sport-chronograph-grey-dial-mens-watch-241818--.jpg?width=80&amp;height=80" alt="Victorinox Alliance Sport Chronograph Grey Dial Men's Watch 241818"></a></div>
                                                    <div class="cart-item-content">
                                                        <div class="cart-item-details">
                                                            <div class="cart-item-info">
                                                                <div class="cart-item-name"><span class="item-brand-name">Victorinox</span><a href="/victorinox-alliance-sport-watch-241818.html">Alliance Sport Chronograph Grey Dial Men's Watch 241818</a></div>
                                                            </div>
                                                        </div>
                                                        <div class="cart-item-data">
                                                            <div class="cart-item-data-inner">
                                                                <div class="price-wrapper">
                                                                    <div class="discount-wrapper"><span>You saved $326.00</span></div><span class="cart-item-subtotal" data-label="Subtotal">$299.00</span><span class="was-wrapper">$625.00</span>
                                                                </div>
                                                                <div class="cart-item-data-actions">
                                                                    <div class="cart-item-qty" data-label="Qty"><label class="qty-label" for="qty-victorinox-alliance-sport-watch-241818" aria-label="quantity">Qty</label>
                                                                        <div class="qty-selector-items"><button type="button" class="qty-btn decrement-btn" aria-label="Decrease product item quantity"><span class="icon-style" aria-hidden="true">–</span></button><input class="quantity-input" type="number" id="qty-victorinox-alliance-sport-watch-241818" title="Quantity" placeholder="1" name="product-qty" value="1"><button type="button" class="qty-btn increment-btn" aria-label="Increase product item quantity"><span class="icon-style" aria-hidden="true">+</span></button></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="cart-item-actions">
                                                            <div class="move-to-wishlist "><a title="Move to Wishlist" href="/victorinox-alliance-sport-watch-241818.html">Move to Wishlist</a></div>
                                                            <div class="cart-item-action"><span class="cart-item-edit"><a title="Edit" href="/victorinox-alliance-sport-watch-241818.html"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="edit-icon">
                                                                            <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path>
                                                                            <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon>
                                                                        </svg>Edit</a></span></div>
                                                            <div class="save-for-later-sec"><a class="" href="/victorinox-alliance-sport-watch-241818.html"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <g opacity="0.5">
                                                                            <path d="M8.00033 13.3337L13.4418 7.84053C14.0128 7.27219 14.3337 6.50134 14.3337 5.69758C14.3337 4.89382 14.0128 4.12298 13.4418 3.55463C12.8707 2.98629 12.0962 2.66699 11.2886 2.66699C10.481 2.66699 9.70645 2.98629 9.13538 3.55463L8.00033 4.60671L6.86527 3.55463C6.29421 2.98629 5.51968 2.66699 4.71207 2.66699C3.90447 2.66699 3.12994 2.98629 2.55888 3.55463C1.98781 4.12298 1.66699 4.89382 1.66699 5.69758C1.66699 6.50134 1.98781 7.27219 2.55888 7.84053L8.00033 13.3337Z" stroke="black" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </g>
                                                                    </svg>Move to Favorites</a></div>
                                                            <div class="cart-item-action"><span class="cart-item-remove"><a title="Remove" class="" href="/victorinox-alliance-sport-watch-241818.html"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M12.75 4.5H16.5V6H15V15.75C15 16.1642 14.6642 16.5 14.25 16.5H3.75C3.33579 16.5 3 16.1642 3 15.75V6H1.5V4.5H5.25V2.25C5.25 1.83579 5.58579 1.5 6 1.5H12C12.4142 1.5 12.75 1.83579 12.75 2.25V4.5ZM13.5 6H4.5V15H13.5V6ZM6.75 8.25H8.25V12.75H6.75V8.25ZM9.75 8.25H11.25V12.75H9.75V8.25ZM6.75 3V4.5H11.25V3H6.75Z" fill="black"></path>
                                                                        </svg></a></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cart-item">
                                                <div class="cart-item-wrapper">
                                                    <div class="cart-item-image"><a href="/victorinox-alliance-sport-watch-241819.html"><img src="https://cdn2.jomashop.com/media/catalog/product/cache/65076e0eec254d6ea41c2ba023b4122a/v/i/victorinox-alliance-sport-chronograph-quartz-white-dial-mens-watch-241819.jpg?width=80&amp;height=80" alt="Victorinox Alliance Sport Chronograph Quartz White Dial Men's Watch 241819"></a></div>
                                                    <div class="cart-item-content">
                                                        <div class="cart-item-details">
                                                            <div class="cart-item-info">
                                                                <div class="cart-item-name"><span class="item-brand-name">Victorinox</span><a href="/victorinox-alliance-sport-watch-241819.html">Alliance Sport Chronograph Quartz White Dial Men's Watch 241819</a></div>
                                                            </div>
                                                        </div>
                                                        <div class="cart-item-data">
                                                            <div class="cart-item-data-inner">
                                                                <div class="price-wrapper">
                                                                    <div class="discount-wrapper"><span>You saved $351.00</span></div><span class="cart-item-subtotal" data-label="Subtotal">$224.00</span><span class="was-wrapper">$575.00</span>
                                                                    <div class="coupon-tag"><span>$45.00 coupon</span></div>
                                                                </div>
                                                                <div class="cart-item-data-actions">
                                                                    <div class="cart-item-qty" data-label="Qty"><label class="qty-label" for="qty-victorinox-alliance-sport-watch-241819" aria-label="quantity">Qty</label>
                                                                        <div class="qty-selector-items"><button type="button" class="qty-btn decrement-btn" aria-label="Decrease product item quantity"><span class="icon-style" aria-hidden="true">–</span></button><input class="quantity-input" type="number" id="qty-victorinox-alliance-sport-watch-241819" title="Quantity" placeholder="1" name="product-qty" value="1"><button type="button" class="qty-btn increment-btn" aria-label="Increase product item quantity"><span class="icon-style" aria-hidden="true">+</span></button></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="cart-item-actions">
                                                            <div class="move-to-wishlist "><a title="Move to Wishlist" href="/victorinox-alliance-sport-watch-241818.html">Move to Wishlist</a></div>
                                                            <div class="cart-item-action"><span class="cart-item-edit"><a title="Edit" href="/victorinox-alliance-sport-watch-241818.html"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="edit-icon">
                                                                            <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path>
                                                                            <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon>
                                                                        </svg>Edit</a></span></div>
                                                            <div class="save-for-later-sec"><a class="" href="/victorinox-alliance-sport-watch-241818.html"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <g opacity="0.5">
                                                                            <path d="M8.00033 13.3337L13.4418 7.84053C14.0128 7.27219 14.3337 6.50134 14.3337 5.69758C14.3337 4.89382 14.0128 4.12298 13.4418 3.55463C12.8707 2.98629 12.0962 2.66699 11.2886 2.66699C10.481 2.66699 9.70645 2.98629 9.13538 3.55463L8.00033 4.60671L6.86527 3.55463C6.29421 2.98629 5.51968 2.66699 4.71207 2.66699C3.90447 2.66699 3.12994 2.98629 2.55888 3.55463C1.98781 4.12298 1.66699 4.89382 1.66699 5.69758C1.66699 6.50134 1.98781 7.27219 2.55888 7.84053L8.00033 13.3337Z" stroke="black" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </g>
                                                                    </svg>Move to Favorites</a></div>
                                                            <div class="cart-item-action"><span class="cart-item-remove"><a title="Remove" class="" href="/victorinox-alliance-sport-watch-241818.html"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M12.75 4.5H16.5V6H15V15.75C15 16.1642 14.6642 16.5 14.25 16.5H3.75C3.33579 16.5 3 16.1642 3 15.75V6H1.5V4.5H5.25V2.25C5.25 1.83579 5.58579 1.5 6 1.5H12C12.4142 1.5 12.75 1.83579 12.75 2.25V4.5ZM13.5 6H4.5V15H13.5V6ZM6.75 8.25H8.25V12.75H6.75V8.25ZM9.75 8.25H11.25V12.75H9.75V8.25ZM6.75 3V4.5H11.25V3H6.75Z" fill="black"></path>
                                                                        </svg></a></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rhs-cart">
                                <div class="coupon-form ">
                                    <div class="discount-coupon-form accordion-wrapper">
                                        <div class="collapsible-wrapper false">
                                            <div class="collapsible-header"><button class="collapsible-toggle" type="button" aria-expanded="true" tabindex="-1">
                                                    <div class="collapsible-title">Apply Code</div>
                                                    <div class="collapsible-arrow-wrapper" tabindex="0"><span class="collapsible-arrow"></span></div>
                                                </button></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shipping-form">
                                    <div class="accordion-wrapper">
                                        <div class="collapsible-wrapper false">
                                            <div class="collapsible-header"><button class="collapsible-toggle" type="button" aria-expanded="true" tabindex="-1">
                                                    <div class="collapsible-title">Estimate Shipping</div>
                                                    <div class="collapsible-arrow-wrapper" tabindex="0"><span class="collapsible-arrow"></span></div>
                                                </button></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="summary-wrapper ">
                                    <div class="summary-block">
                                        <div class="cart-subtotal">
                                            <div class="row">
                                                <div class="col-left">Item(s) total</div>
                                                <div class="col-right cart-subtotal-value">$568.00</div>
                                            </div>
                                        </div>
                                        <div class="cart-savings">
                                            <div class="row">
                                                <div class="col-left">Savings</div>
                                                <div class="col-right cart-savings-value">56%</div>
                                            </div>
                                        </div>
                                        <div class="cart-tax">
                                            <div class="row">
                                                <div class="col-left">Tax </div>
                                                <div class="col-right"><span><i>calculated in checkout</i></span></div>
                                            </div>
                                        </div>
                                        <div class="cart-discount">
                                            <div class="row">
                                                <div class="col-left">Discount <span class="rmv-coupon">"VIC45"<a>X</a></span></div>
                                                <div class="col-right cart-discount-value">-$45.00</div>
                                            </div>
                                        </div>
                                        <div class="cart-grand-total">
                                            <div class="row">
                                                <div class="col-left"><b>Total</b></div>
                                                <div class="col-right cart-discount-value"><b>$523.00</b></div>
                                            </div>
                                        </div>
                                        <div class="shipping-wrapper shipping-active">
                                            <div class="shipping-message"><svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                    <g clip-path="url(#clip0_2510_63950)">
                                                        <path d="M6.72375 13.5C6.63459 14.1257 6.32266 14.6983 5.84526 15.1125C5.36786 15.5267 4.75704 15.7547 4.125 15.7547C3.49296 15.7547 2.88214 15.5267 2.40474 15.1125C1.92734 14.6983 1.61541 14.1257 1.52625 13.5H0.75V4.5C0.75 4.30109 0.829018 4.11032 0.96967 3.96967C1.11032 3.82902 1.30109 3.75 1.5 3.75H12C12.1989 3.75 12.3897 3.82902 12.5303 3.96967C12.671 4.11032 12.75 4.30109 12.75 4.5V6H15L17.25 9.042V13.5H15.7238C15.6346 14.1257 15.3227 14.6983 14.8453 15.1125C14.3679 15.5267 13.757 15.7547 13.125 15.7547C12.493 15.7547 11.8821 15.5267 11.4047 15.1125C10.9273 14.6983 10.6154 14.1257 10.5263 13.5H6.72375ZM11.25 5.25H2.25V11.2875C2.54592 10.9854 2.91045 10.7593 3.31257 10.6283C3.71468 10.4974 4.14247 10.4656 4.55953 10.5355C4.9766 10.6055 5.37058 10.7752 5.70796 11.0302C6.04533 11.2852 6.31611 11.6179 6.49725 12H10.7528C10.8788 11.7353 11.0475 11.4945 11.25 11.2875V5.25ZM12.75 9.75H15.75V9.53625L14.244 7.5H12.75V9.75ZM13.125 14.25C13.4235 14.25 13.7097 14.1314 13.9208 13.9204C14.1318 13.7093 14.2504 13.4231 14.2504 13.1246C14.2504 12.8262 14.1318 12.5399 13.9208 12.3289C13.7097 12.1178 13.4235 11.9993 13.125 11.9993C12.8265 11.9993 12.5403 12.1178 12.3292 12.3289C12.1182 12.5399 11.9996 12.8262 11.9996 13.1246C11.9996 13.4231 12.1182 13.7093 12.3292 13.9204C12.5403 14.1314 12.8265 14.25 13.125 14.25ZM5.25 13.125C5.25 12.9773 5.2209 12.831 5.16437 12.6945C5.10783 12.558 5.02496 12.434 4.9205 12.3295C4.81603 12.225 4.69201 12.1422 4.55552 12.0856C4.41903 12.0291 4.27274 12 4.125 12C3.97726 12 3.83097 12.0291 3.69448 12.0856C3.55799 12.1422 3.43397 12.225 3.32951 12.3295C3.22504 12.434 3.14217 12.558 3.08564 12.6945C3.0291 12.831 3 12.9773 3 13.125C3 13.4234 3.11853 13.7095 3.32951 13.9205C3.54048 14.1315 3.82663 14.25 4.125 14.25C4.42337 14.25 4.70952 14.1315 4.9205 13.9205C5.13147 13.7095 5.25 13.4234 5.25 13.125Z" fill="black" stroke="#F5F5F5" stroke-width="0.3"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2510_63950">
                                                            <rect width="18" height="18" fill="white"></rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <div class="tooltip-wrapper"><strong>Congratulations! You've got free USA shipping</strong>
                                                    <div class="tooltip-overlay-wrapper">
                                                        <div class="tooltip-overlay">
                                                            <div class="tooltip-dropdown"><span class="tooltip-text">Orders over $100 are automatically Eligible for Free Shipping (Contiguous USA Only)</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="shipping-progress">
                                                <div class="progress-line">
                                                    <div class="progress-current" style="width: 523%;"></div>
                                                </div>
                                                <p class="progress-label">$0</p>
                                                <p class="progress-label">$100</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="button-sticky-wrap"><button class="btn-new-design primary"><span class="text-co">Checkout </span><span class="btn-co">$523.00</span></button>
                                <p class="checkout-with">or checkout with</p>
                                <div class="button-wrap">
                                    <div class="paypal-button">
                                        <div class="paypal-payment-button">
                                            <div class=" undefined"></div><a id="paypal-payment-button" href="#" class=""><img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="Check out with PayPal"></a>
                                        </div>
                                    </div>
                                    <div class="amazon-pay-button">
                                        <div class="amazon-button amazonpay-button-parent-container-checkout-A2TPIY28J6VK2X" id="AmazonPayButton" role="button" aria-label="Amazon Pay - Use your Amazon account" title="Pay using the information already stored in your Amazon account" style="height: 45px; position: relative; width: 166.5px;">
                                            <div class="amazonpay-button-container amazonpay-button-enabled amazonpay-button-container-rows-affirm" id="maxo-button-wrapper-1699883603458">
                                                <div class="amazonpay-button-view1 amazonpay-button-view1-gold" tabindex="0">
                                                    <picture class="amazonpay-button-logo"><img src="https://m.media-amazon.com/images/G/01/AmazonPay/Maxo/PWA_dark-en_US._CB620220074_.svg"></picture>
                                                    <picture class="amazonpay-button-chevrons"><img src="https://m.media-amazon.com/images/G/01/AmazonPay/Maxo/AmazonPay_button_chevron._CB1558391205_.svg"></picture>
                                                </div>
                                                <div class="amazonpay-button-view2"></div>
                                                <div class="amazonpay-button-view3">
                                                    <div class="ala-sm"><span>As low as $48/mo </span><img src="https://cdn-assets.affirm.com/images/black_logo-white_bg.svg"></div>
                                                </div>
                                            </div>
                                    
                                        </div>

                                        <div class="amazon-button" id="AmazonPayButton"></div>
                                    </div>
                                    <div class="google-pay-button">
                                        <div>
                                            <div id="google-pay-container">
                                                <div class="gpay-card-info-container-fill">
                                                    <button type="button" aria-label="Buy with GPay" class="gpay-card-info-container black long en">
                                                        <div class="gpay-card-info-animation-container black gpay-card-info-animation-container-fade-out">
                                                            <div class="gpay-card-info-placeholder-container">
                                                                <div class="gpay-card-info-animation-gpay-logo black"></div>
                                                                <div class="gpay-card-info-placeholder-svg-container"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" direction="ltr" viewBox="0 0 130 36">
                                                                        <style>
                                                                            @import url(//fonts.googleapis.com/css?family=Google+Sans:500)
                                                                        </style>
                                                                        <line x1="8" y1="7" x2="8" y2="26" ></line>
                                                                        <image x="16" y="2.5" width="37.5" height="29" preserveAspectRatio="none" xlink:href="https://www.gstatic.com/images/icons/material/system/1x/payment_white_36dp.png"></image><text x="57" y="22" class="small">••••••</text>
                                                                    </svg></div>
                                                            </div>
                                                            <div class="gpay-card-info-animated-progress-bar-container">
                                                                <div class="gpay-card-info-animated-progress-bar">
                                                                    <div class="gpay-card-info-animated-progress-bar-indicator"></div>
                                                                </div>
                                                            </div>
                                                        </div><iframe class="gpay-card-info-iframe gpay-card-info-iframe-fade-in" scrolling="no" src="https://pay.google.com/gp/p/generate_gpay_btn_img?buttonColor=black&amp;browserLocale=en&amp;buttonSizeMode=fill&amp;enableGpayNewButtonAsset=false"></iframe>
                                                    </button>
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
    <script>
        // xử lý        
        let swaper = document.querySelector(".multi-slide-wrapper");
        let slideOuts = document.querySelector(".slide-out-tabs");

        let body = document.querySelector("#body"); 

        let cartTab = document.querySelector(".cart-tab");
        let accountTab = document.querySelector(".account-tab");

        let slideOutContent = document.querySelector(".slide-out-content");
        let accountForm = document.querySelector(".account-form");
        let cartPage = document.querySelector(".cart-page");

        
        // let signIn = document.querySelector(".signin");
        // let globalOverlay = document.querySelector(".global-overlay");

        function open(a){
            body.classList.add('page-overlay');
            body.style.paddingRight = '21px';
            
            swaper.classList.add('open');

            // globalOverlay.classList.remove('overlay-hide');
            // globalOverlay.classList.add('overlay-open');
            if (a==1) {
                if (slideOuts.classList.contains("cart")) {
                    slideOuts.classList.remove("cart");

                }
                slideOuts.classList.add('my-account');
                accountTab.classList.add('active');

                cartTab.classList.remove('active');

                slideOutContent.classList.remove('no-minicart');
                cartPage.style.display = "none";
                accountForm.style.display = "block";
                document.querySelector(".signin").style.display = 'block';
                
                
            } else if (a==2){
                if (slideOuts.classList.contains("my-account")) {
                    slideOuts.classList.remove("my-account");

                }
                slideOuts.classList.add('cart');
                cartTab.classList.add('active');

                accountTab.classList.remove('active');

                slideOutContent.classList.add('no-minicart');
                accountForm.style.display = "none";
                cartPage.style.display = "block";
                document.querySelector(".signin").style.display = 'none';

            }

            // signIn.style.display = "none";
            
        }

        function close(){
            swaper.classList.remove('open');
            body.classList.remove('page-overlay');

            // globalOverlay.classList.remove('overlay-open');
            // globalOverlay.classList.add('overlay-hide');
        }

        document.querySelector(".rhs-account").addEventListener("click", function() {
            open(1);
        });
        document.querySelector(".account-tab").addEventListener("click", function() {
            open(1);
        });
        document.querySelector(".bag").addEventListener("click", function() {
            open(2);
        });
        document.querySelector(".cart-tab").addEventListener("click", function() {
            open(2);
        });

        document.querySelector(".btn-close").addEventListener("click", close);
    </script>
</body>
</html>