<!DOCTYPE html>
<html lang="en">
<?php 
    if(isset($_GET['model'])) {
        include 'config.php';

        $model = $_GET['model'];
        $sqlProduct = 'SELECT * FROM watches
            JOIN brands ON watches.brand = brands.brandId
            JOIN styles ON watches.style = styles.styleId
            JOIN movements ON watches.movement = movements.moveId
            JOIN categories ON watches.category = categories.cateId
            JOIN features ON watches.features = features.feaId
            JOIN types ON watches.type = types.typeId
            JOIN caseshapes ON watches.caseShape = caseshapes.caseId
            WHERE watches.model LIKE ?';
        
        $stmt = $conn->prepare($sqlProduct);
        $stmt->bind_param('s', $model);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 0) {
            header('location: error404.php');
        }
        $product = $result->fetch_assoc();

        $upView = 'UPDATE watches SET view = view+1 WHERE watches.model LIKE ?';
        $stmt = $conn->prepare($upView);
        $stmt->bind_param('s', $model);
        $stmt->execute();
    } else {
        header('location: error404.php');
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jomashop.com: Online Shopping for Watches &amp; More - Jomashop</title>
    <link rel="shortcut icon" href="./dist/file/usd.0fb3ccd8c33808902bbd.svg" />
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
    <link rel="stylesheet" href="./dist/css/RootCmp_PRODUCT__default.d25d1be5857635f5e62e.initial.css">
</head>
<body>
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
                            <button class="rhs-item">
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
            <div class="multi-slide-wrapper ">
                <div class="multi-slideout-container">
                    <div class="multi-slideout-header">
                        <div class="slide-out-tabs open">
                            <button class="slide-out-tab wishlist-tab">
                                <span>Wishlist</span>(0)
                            </button>
                            <button class="slide-out-tab account-tab">My Account</button>
                            <button class="slide-out-tab cart-tab">
                                <span>Bag</span>(0)
                            </button>
                        </div>
                        <button class="btn-close">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.0007 5.5865L11.9504 0.636719L13.3646 2.05093L8.4149 7.0007L13.3646 11.9504L11.9504 13.3646L7.0007 8.4149L2.05093 13.3646L0.636719 11.9504L5.5865 7.0007L0.636719 2.05093L2.05093 0.636719L7.0007 5.5865Z" fill="black">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <main class="page" id="maincontent">
                <a id="contentarea" tabindex="-1"></a>
                <div class="pdp-content-wrapper">
                    <hr class="line-full-width">
                    <div class="container-width pdp-container ">
                        <div class="pdp-gallery">
                            <div class="image-gallery-wrapper">
                                <div class="image-gallery">
                                    <a id="gallery-prev-area" tabindex="-1"></a>
                                    <div class="image-main-container">
                                        <div class="image-main">
                                            <div class="image-main__gallery">
                                                <div class="slide-item slide-item-active">
                                                    <img id="product-main-image-gallery" src="./img/watches/<?= $product['img1'] ?>" alt="<?= $product['name'] ?>" aria-describedby="product-description-guarantee" width="546" height="546" title="<?= $product['name'] ?>" class="slide-item-main-image">
                                                </div>
                                                <div class="slide-item">
                                                    <img src="./img/watches/<?= $product['img2'] ?>" alt="<?= $product['name'] ?>" aria-describedby="product-description-guarantee" width="546" height="546" title="<?= $product['name'] ?>" class="slide-item-main-image">
                                                </div>
                                                <div class="slide-item">
                                                    <img src="./img/watches/<?= $product['img3'] ?>" alt="<?= $product['name'] ?>" aria-describedby="product-description-guarantee" width="546" height="546" title="<?= $product['name'] ?>" class="slide-item-main-image">
                                                </div>
                                                <div class="social-proof-pdp">
                                                    <div class="social-proof-wrapper">
                                                        <div class="limited-qty">
                                                            <svg width="12" height="15" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M2.25487 3.97881C3.28133 3.15773 4.58333 2.66675 6 2.66675C7.41667 2.66675 8.71867 3.15773 9.74513 3.97881L10.7141 3.00989L11.6569 3.9527L10.6879 4.92162C11.509 5.94807 12 7.25008 12 8.66675C12 11.9805 9.31373 14.6667 6 14.6667C2.68629 14.6667 0 11.9805 0 8.66675C0 7.25008 0.49098 5.94807 1.31207 4.92162L0.343147 3.9527L1.28595 3.00989L2.25487 3.97881ZM6 13.3334C8.57733 13.3334 10.6667 11.2441 10.6667 8.66675C10.6667 6.08942 8.57733 4.00008 6 4.00008C3.42267 4.00008 1.33333 6.08942 1.33333 8.66675C1.33333 11.2441 3.42267 13.3334 6 13.3334ZM6.66667 8.00008H8.66667L5.33333 12.3334V9.33342H3.33333L6.66667 4.99688V8.00008ZM3.33333 0.666748H8.66667V2.00008H3.33333V0.666748Z" fill="#E03400">
                                                                </path>
                                                            </svg><span>Limited Quantity</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="thumbs-wrapper slide-width simple-slider-vertical">
                                                <div class="simple-slider-prev swiper-prev"></div>
                                                <div class="simple-slider-next swiper-next"></div>
                                                <div class="thumbs-items-wrapper simple-slider-wrapper">
                                                    <div class="thumb-item simple-slider-slide" style="<?= $product['img1']!=null ? '' : 'display: none' ?>">
                                                        <a href="#" aria-label="View Image 1">
                                                            <img id="img-1" loading="lazy" alt="<?= $product['name'] ?>" src="./img/watches/<?= $product['img1'] ?>" class="image-wrapper" longdesc="#product-description-guarantee">
                                                        </a>
                                                    </div>
                                                    <div class="thumb-item simple-slider-slide" style="<?= $product['img2']!=null ? '' : 'display: none' ?>">
                                                        <a href="#" aria-label="View Image 2">
                                                            <img id="img-2" loading="lazy" alt="<?= $product['name'] ?>" src="./img/watches/<?= $product['img2'] ?>" class="image-wrapper" longdesc="#product-description-guarantee">
                                                        </a>
                                                    </div>
                                                    <div class="thumb-item simple-slider-slide" style="<?= $product['img3']!=null ? '' : 'display: none' ?>">
                                                        <a href="#" aria-label="View Image 3">
                                                            <img id="img-3" loading="lazy" alt="<?= $product['name'] ?>" src="./img/watches/<?= $product['img3'] ?>" class="image-wrapper" longdesc="#product-description-guarantee">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a id="gallery-next-area" tabindex="-1"></a>
                                </div>
                            </div>
                            <div class="action-top-gallery">
                                <div class="social-sharing" tabindex="0">
                                    <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="3 0 48 48" width="20px" height="20px">
                                        <path d="M 36 5 C 32.151772 5 29 8.1517752 29 12 C 29 12.585766 29.198543 13.109464 29.335938 13.654297 L 17.345703 19.652344 C 16.059118 18.073938 14.181503 17 12 17 C 8.1517722 17 5 20.151775 5 24 C 5 27.848225 8.1517722 31 12 31 C 14.181503 31 16.059118 29.926062 17.345703 28.347656 L 29.335938 34.345703 C 29.198543 34.890536 29 35.414234 29 36 C 29 39.848225 32.151772 43 36 43 C 39.848228 43 43 39.848225 43 36 C 43 32.151775 39.848228 29 36 29 C 33.818497 29 31.940882 30.073938 30.654297 31.652344 L 18.664062 25.654297 C 18.801457 25.109464 19 24.585766 19 24 C 19 23.414234 18.801457 22.890536 18.664062 22.345703 L 30.654297 16.347656 C 31.940882 17.926062 33.818497 19 36 19 C 39.848228 19 43 15.848225 43 12 C 43 8.1517752 39.848228 5 36 5 z M 36 8 C 38.226909 8 40 9.7730927 40 12 C 40 14.226907 38.226909 16 36 16 C 33.773091 16 32 14.226907 32 12 C 32 9.7730927 33.773091 8 36 8 z M 12 20 C 14.226909 20 16 21.773093 16 24 C 16 26.226907 14.226909 28 12 28 C 9.7730915 28 8 26.226907 8 24 C 8 21.773093 9.7730915 20 12 20 z M 36 32 C 38.226909 32 40 33.773093 40 36 C 40 38.226907 38.226909 40 36 40 C 33.773091 40 32 38.226907 32 36 C 32 33.773093 33.773091 32 36 32 z" stroke="#161616" stroke-width="1.25">
                                        </path>
                                    </svg>
                                </div>
                                <button class="wishlist-icon-new-design">
                                    <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.9988 17.0223L17.8913 10.0644C18.6146 9.34447 19.021 8.36807 19.021 7.34998C19.021 6.33188 18.6146 5.35548 17.8913 4.63557C17.1679 3.91567 16.1869 3.51123 15.1639 3.51123C14.1409 3.51123 13.1599 3.91567 12.4365 4.63557L10.9988 5.96821L9.56105 4.63557C8.8377 3.91567 7.85663 3.51123 6.83366 3.51123C5.8107 3.51123 4.82963 3.91567 4.10628 4.63557C3.38293 5.35548 2.97656 6.33188 2.97656 7.34998C2.97656 8.36807 3.38293 9.34447 4.10628 10.0644L10.9988 17.0223Z" stroke="black" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="product-info-main">
                            <div class="product-info-details">
                                <div class="pdp-heading-wrapper">
                                    <h1 class="brand-name-container">
                                        <a href="">
                                            <span class="brand-name" data-promo="Holiday Early Bird Sale"><?= $product['brandName'] ?> </span>
                                        </a>
                                        <span class="product-name-container">
                                            <span id="product-h1-product-name" class="product-name"><?= $product['name'] ?></span>
                                            <span class="product-info-stock-sku">Item No. <?= $product['model'] ?></span>
                                        </span>
                                    </h1>
                                    <div class="product-info-block">
                                        <div class="product-info-rating">
                                            <div class="pdp-review-stars">
                                                <div class="yotpo yotpo-from-product">
                                                    <div class="yotpo-display-wrapper">
                                                        <div class="standalone-bottomline" data-source="product" tabindex="-1">
                                                            <div class="yotpo-clr"></div>
                                                        </div>
                                                        <div class="yotpo-clr"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tag-wrapper">
                                        <span class="tag-new-design stock-label">
                                            <?php 
                                                if($product['instock'] > 0) echo 'IN STOCK'; else echo 'OUT OF STOCK';
                                            ?>
                                        </span>
                                        <span class="tag-new-design discount-label"><?= $product['sale'] ?>% Off</span>
                                    </div>
                                </div>
                                <div class="box-to-cart">
                                    <div class="product-info-price">
                                        <div class="price-wrapper ">
                                            <div class="retail-price-wrapper">
                                                <div class="retail-wrapper">
                                                    <span class="retail-label">Retail</span>
                                                    <span>
                                                        $<?php 
                                                            $was = $product['price'] / (1 - ($product['sale'] / 100));
                                                            $was = number_format($was, 2, '.', '');
                                                            $retail = $was + 30.00;
                                                            $retail = number_format($retail, 2, '.', '');
                                                            echo $retail;
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="was-price-wrapper">
                                                <div class="was-wrapper">
                                                    <span class="was-label">Was</span>
                                                    <span>$<?= $was ?></span>
                                                </div>
                                            </div>
                                            <div class="now-price">
                                                <span>$<?= $product['price'] ?></span><span class="spacer"></span>
                                                <p class="affirm-as-low-as" data-page-type="product" data-amount="45900">As low as 
                                                    <span class="affirm-ala-price">$<?= (int)(($was-$product['price']) / 12) ?></span>
                                                    <span class="month">/mo</span> with 
                                                    <span class="__affirm-logo __affirm-logo-blue __ligature__affirm_full_logo__ __processed">Affirm</span>. 
                                                    <a class="affirm-modal-trigger" aria-label="Learn more about Affirm Financing (opens in modal)" href="javascript:void(0)">Prequalify now</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item-block"></div>
                                    <div class="product-buttons">
                                        <div class="stock-wrapper stock-active">
                                            <div class="stock-content"><span class="stock-dot"></span>Enjoy Free Shipping</div>
                                        </div>
                                        <div class="add-to-cart ">
                                            <button class="btn-new-design primary add-to-cart-btn"><span>Add to Bag</span></button>
                                        </div>
                                    </div>
                                    <div class="product-info-wrapper">
                                        <div class="free-shipping-message ">
                                            <div class="text bold">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1146_82528)">
                                                        <path d="M7.96953 15.0001C7.87047 15.6953 7.52388 16.3315 6.99343 16.7917C6.46298 17.2519 5.7843 17.5053 5.08203 17.5053C4.37977 17.5053 3.70108 17.2519 3.17063 16.7917C2.64019 16.3315 2.2936 15.6953 2.19453 15.0001H1.33203V5.00008C1.33203 4.77907 1.41983 4.56711 1.57611 4.41083C1.73239 4.25455 1.94435 4.16675 2.16536 4.16675H13.832C14.053 4.16675 14.265 4.25455 14.4213 4.41083C14.5776 4.56711 14.6654 4.77907 14.6654 5.00008V6.66675H17.1654L19.6654 10.0467V15.0001H17.9695C17.8705 15.6953 17.5239 16.3315 16.9934 16.7917C16.463 17.2519 15.7843 17.5053 15.082 17.5053C14.3798 17.5053 13.7011 17.2519 13.1706 16.7917C12.6402 16.3315 12.2936 15.6953 12.1945 15.0001H7.96953ZM12.9987 5.83341H2.9987V12.5417C3.3275 12.2061 3.73253 11.9548 4.17933 11.8093C4.62612 11.6639 5.10144 11.6285 5.56485 11.7062C6.02825 11.784 6.46601 11.9725 6.84087 12.2558C7.21574 12.5391 7.5166 12.9088 7.71787 13.3334H12.4462C12.5862 13.0392 12.7737 12.7717 12.9987 12.5417V5.83341ZM14.6654 10.8334H17.9987V10.5959L16.3254 8.33342H14.6654V10.8334ZM15.082 15.8334C15.4137 15.8334 15.7317 15.7017 15.9662 15.4672C16.2007 15.2327 16.3324 14.9146 16.3324 14.583C16.3324 14.2514 16.2007 13.9333 15.9662 13.6988C15.7317 13.4643 15.4137 13.3326 15.082 13.3326C14.7504 13.3326 14.4324 13.4643 14.1979 13.6988C13.9634 13.9333 13.8316 14.2514 13.8316 14.583C13.8316 14.9146 13.9634 15.2327 14.1979 15.4672C14.4324 15.7017 14.7504 15.8334 15.082 15.8334ZM6.33203 14.5834C6.33203 14.4193 6.2997 14.2567 6.23688 14.1051C6.17406 13.9534 6.08199 13.8156 5.96592 13.6995C5.84984 13.5835 5.71204 13.4914 5.56039 13.4286C5.40873 13.3657 5.24618 13.3334 5.08203 13.3334C4.91788 13.3334 4.75533 13.3657 4.60368 13.4286C4.45202 13.4914 4.31422 13.5835 4.19815 13.6995C4.08207 13.8156 3.99 13.9534 3.92718 14.1051C3.86436 14.2567 3.83203 14.4193 3.83203 14.5834C3.83203 14.9149 3.96373 15.2329 4.19815 15.4673C4.43257 15.7017 4.75051 15.8334 5.08203 15.8334C5.41355 15.8334 5.73149 15.7017 5.96592 15.4673C6.20034 15.2329 6.33203 14.9149 6.33203 14.5834Z" fill="black" stroke="#F5F5F5" stroke-width="0.3"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1146_82528">
                                                            <rect width="20" height="20" fill="white" transform="translate(0.5)"></rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>Want it by <?php 
                                                    $now = date("l, F d");
                                                    $delivery = date('l, F d', strtotime($now .' +5 day'));
                                                    echo $delivery;
                                                 ?>?
                                            </div>
                                            <div class="text">Choose Next Day Shipping at Checkout.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="more-choice">
                                <h2 class="title">
                                    <a href="">View more <strong><?= $product['brandName'] ?></strong></a>
                                </h2>
                                <div>
                                    <div class="simple-slider-horizontal" style="overflow: hidden;">
                                        <div class="arrow-carousal-new-design arrow-prev" id="more-prev"></div>
                                        <div class="arrow-carousal-new-design arrow-next" id="more-next"></div>
                                        <div class="simple-slider-wrapper simple-slider-wrapper-more" sr-scroll-left="1692" sr-scroll-top="0" style="overflow: visible; transition: transform 0.3s ease;">
                                            <?php 
                                                $sqlMoreChoice = 'SELECT * FROM watches
                                                    JOIN brands ON watches.brand = brands.brandId
                                                    JOIN styles ON watches.style = styles.styleId
                                                    JOIN movements ON watches.movement = movements.moveId
                                                    JOIN categories ON watches.category = categories.cateId
                                                    JOIN features ON watches.features = features.feaId
                                                    JOIN types ON watches.type = types.typeId
                                                    JOIN caseshapes ON watches.caseShape = caseshapes.caseId
                                                    WHERE (watches.brand LIKE ?) AND (watches.id NOT LIKE ?)';
                                                $stmt = $conn->prepare($sqlMoreChoice);
                                                $stmt->bind_param('ii', $product['brand'], $product['id']);
                                                $stmt->execute();
                                                $resultMoreChoice = $stmt->get_result();
                                            ?>
                                            <?php while($rowMore = $resultMoreChoice->fetch_assoc()) { ?>
                                                <div class="simple-slider-slide simple-slider-more">
                                                    <div class="product-content">
                                                        <a href="detail.php?model=<?= $rowMore['model'] ?>">
                                                            <img loading="lazy" alt="<?= $rowMore['name'] ?>" src="./img/watches/<?= $rowMore['img1'] ?>" class="render-img" title="<?= $rowMore['name'] ?>">
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="description-guarantee" id="product-description-guarantee">
                                <div class="dg-wrap">
                                    <div class="guarantee-list">
                                        <div class="g-items">
                                            <div data-content-type="text" data-appearance="default" data-element="main" data-pb-style="A1M70AS">
                                                <div class="authenticity-guaranteed">
                                                    <div>
                                                        <div>
                                                            <strong>Authenticity Guaranteed</strong>
                                                        </div>
                                                        <div>
                                                            <div>
                                                                <p id="KEPTVB5">We have over 18,000 5-star reviews on Trustpilot.
                                                                </p>
                                                            </div>
                                                            <div>
                                                                <p>All products onJomashop are 100% authentic.</p>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <p>
                                                                <a class="view-links" tabindex="0" data-guarantee-type="authenticity" href="https://help.jomashop.com/articles/4806-are-your-watches-authentic" target="_blank" rel="noopener">Learn more</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.0791 23.7317L6.20122 20.0268L6.80564 18.7566L12.2137 19.245L11.711 20.3011L10.4879 20.1695L9.68808 21.8516L10.5818 22.6757L10.0791 23.7317ZM9.60365 20.0722L7.57322 19.8525L7.55637 19.8891L9.04028 21.2561L9.60365 20.0722Z" fill="black"></path>
                                                        <path d="M11.2912 12.3495L13.86 14.4122C14.7249 15.1066 14.7565 16.2348 13.9385 17.23C13.1177 18.2289 11.9972 18.4255 11.1312 17.7312L8.56239 15.6685L9.25849 14.8219L11.7557 16.8272C12.2074 17.1905 12.7995 17.1297 13.2031 16.639C13.6076 16.1459 13.545 15.5635 13.0935 15.2013L10.5962 13.196L11.2923 12.3494L11.2912 12.3495Z" fill="black"></path>
                                                        <path d="M12.603 11.0824L15.9867 8.49278L16.5231 9.19341L15.2619 10.1589L17.805 13.4782L16.9437 14.1369L14.4006 10.8176L13.1395 11.783L12.603 11.0824Z" fill="black"></path>
                                                        <path d="M17.5692 7.54278L18.5709 7.0987L19.3999 9.02031L21.433 8.11807L20.6041 6.19646L21.6036 5.75269L23.6117 10.4099L22.6121 10.8537L21.7829 8.9299L19.7498 9.83214L20.579 11.7559L19.5772 12.2L17.5692 7.54278Z" fill="black"></path>
                                                        <path d="M23.5332 5.20411L26.9486 4.54267L27.1005 5.41646L24.7563 5.87052L24.9642 7.06466L27.1327 6.64403L27.2847 7.51782L25.1161 7.93845L25.3243 9.13476L27.6782 8.67824L27.8302 9.55203L24.405 10.2159L23.5331 5.20302L23.5332 5.20411Z" fill="black"></path>
                                                        <path d="M32.908 9.58822L31.9702 9.55703L29.9196 6.26824L29.8826 6.26679L29.6979 9.48056L28.6122 9.44357L28.9043 4.33736L29.8578 4.36966L31.8913 7.65531L31.9362 7.65678L32.12 4.44533L33.2012 4.48186L32.9091 9.58806L32.908 9.58822Z" fill="black"></path>
                                                        <path d="M35.0019 4.76248L39.0434 5.89303L38.7816 6.75068L37.2752 6.32946L36.0364 10.3913L35.0078 10.1032L36.2466 6.04136L34.7401 5.62013L35.0019 4.76248Z" fill="black"></path>
                                                        <path d="M39.1794 11.6599L38.2062 11.1994L40.5056 6.578L41.4788 7.0385L39.1794 11.6599Z" fill="black"></path>
                                                        <path d="M44.8117 11.286C45.0843 10.7816 44.9469 10.2549 44.4708 9.91159C43.8336 9.45159 43.0495 9.64309 42.407 10.5087C41.7472 11.3978 41.8226 12.1729 42.4477 12.6246C42.9117 12.9597 43.4477 12.9532 43.8606 12.5683L44.7379 13.208C44.0754 13.9052 42.912 14.1542 41.8572 13.3924C40.756 12.5973 40.5185 11.2294 41.5256 9.87294C42.5356 8.51277 43.9419 8.33585 45.0285 9.12082C45.9807 9.80856 46.2912 10.8801 45.6921 11.923L44.812 11.2882L44.8117 11.286Z" fill="black"></path>
                                                        <path d="M44.9277 16.0487L44.1872 15.2738L47.9583 11.7106L48.6988 12.4854L44.9277 16.0487Z" fill="black"></path>
                                                        <path d="M49.808 13.6568L52.126 17.1104L51.376 17.6165L50.512 16.3296L46.9614 18.7249L46.3714 17.8461L49.9221 15.4508L49.0581 14.164L49.8081 13.6579L49.808 13.6568Z" fill="black"></path>
                                                        <path d="M53.2506 19.5587L51.5588 21.4353L51.5755 21.4816L54.0573 21.7807L54.4674 22.9112L50.7029 22.3551L48.9899 23.0026L48.6263 22.0005L50.3393 21.353L52.8405 18.4283L53.2506 19.5587Z" fill="black"></path>
                                                        <path d="M11.5284 40.9235C11.1327 40.2653 10.3381 40.1115 9.41045 40.6307C8.47728 41.1522 8.20686 41.8787 8.61692 42.5615C8.98044 43.1673 9.55009 43.334 10.112 43.038L9.55563 42.1138L10.266 41.7163L11.3488 43.5178L10.7869 43.8319C9.61215 44.4879 8.43295 44.1108 7.78017 43.0252C7.04982 41.8103 7.43328 40.5015 8.84633 39.7129C10.2937 38.9041 11.6702 39.3048 12.354 40.4427C12.9392 41.4161 12.7685 42.5134 11.9562 43.1235L11.3998 42.1993C11.7489 41.8499 11.8087 41.3926 11.5272 40.9235H11.5284Z" fill="black"></path>
                                                        <path d="M16.8536 45.8205L14.4608 48.0804C13.6551 48.8411 12.518 48.7599 11.6203 47.8763C10.7204 46.9895 10.6627 45.8953 11.4685 45.1346L13.8612 42.8748L14.6237 43.6259L12.2974 45.8227C11.8763 46.2202 11.863 46.7939 12.3052 47.2288C12.7496 47.6658 13.3425 47.6637 13.7637 47.2662L16.09 45.0694L16.8524 45.8205H16.8536Z" fill="black"></path>
                                                        <path d="M14.5285 50.3939L18.7355 47.0442L19.9346 47.7505L18.7643 52.8877L17.7668 52.3011L18.0528 51.1407L16.4646 50.2058L15.5248 50.9815L14.5273 50.3949L14.5285 50.3939ZM18.2633 50.302L18.7388 48.3776L18.7044 48.3573L17.1462 49.6449L18.2633 50.303V50.302Z" fill="black"></path>
                                                        <path d="M21.956 48.7883L23.8944 49.3845C25.0104 49.7275 25.4549 50.5332 25.1434 51.4745C24.9284 52.122 24.4641 52.497 23.8279 52.5558L24.2624 54.7184L23.1153 54.3658L22.7407 52.3998L21.9826 52.1669L21.4263 53.8465L20.3867 53.527L21.956 48.7894V48.7883ZM22.9546 51.5781C23.5497 51.7608 23.9188 51.6144 24.0739 51.1454C24.2302 50.6731 24.0252 50.3269 23.4245 50.1432L22.7241 49.9273L22.2486 51.3612L22.9546 51.5781Z" fill="black"></path>
                                                        <path d="M25.6641 55.0137L27.8075 50.1746L29.2094 50.2707L30.6169 55.3545L29.451 55.2744L29.1529 54.1172L27.2954 53.989L26.83 55.0938L25.6641 55.0137ZM28.939 53.2785L28.4447 51.3574L28.4048 51.3542L27.6324 53.1887L28.939 53.2785Z" fill="black"></path>
                                                        <path d="M36.6311 54.494L35.7035 54.6542L32.924 51.9542L32.8874 51.9606L33.4582 55.041L32.3842 55.2259L31.4766 50.3312L32.4186 50.1688L35.1804 52.8699L35.2247 52.8624L34.654 49.7841L35.7224 49.6003L36.63 54.495L36.6311 54.494Z" fill="black"></path>
                                                        <path d="M36.3008 49.4247L40.1775 47.7771L40.5399 48.5699L39.0947 49.1843L40.8137 52.9421L39.8273 53.361L38.1084 49.6031L36.6632 50.2175L36.3008 49.4247Z" fill="black"></path>
                                                        <path d="M40.7148 47.4262L43.5155 45.4399L44.0485 46.1387L42.1268 47.5021L42.856 48.4573L44.6337 47.1965L45.1668 47.8953L43.3891 49.1561L44.1195 50.1124L46.049 48.7437L46.582 49.4425L43.7737 51.4352L40.716 47.4284L40.7148 47.4262Z" fill="black"></path>
                                                        <path d="M44.1328 44.8957L46.4436 42.3933L47.1152 42.9692L45.5292 44.6863L46.4469 45.4737L47.9131 43.886L48.5848 44.4619L47.1185 46.0496L48.0384 46.8392L49.631 45.1147L50.3026 45.6906L47.9852 48.1994L44.1339 44.8935L44.1328 44.8957Z" fill="black"></path>
                                                        <path d="M51.4637 44.1749L46.9375 41.7911L47.8208 40.2312C48.5667 38.9148 49.8722 38.5558 51.2819 39.2984C52.6961 40.0431 53.0929 41.2986 52.3392 42.6278L51.4626 44.1749H51.4637ZM51.498 42.2346C51.9624 41.414 51.7707 40.7515 50.7599 40.2194C49.7547 39.6894 49.0765 39.8946 48.6121 40.712L48.2785 41.2996L51.1656 42.8201L51.498 42.2335V42.2346Z" fill="black"></path>
                                                        <circle opacity="0.3" cx="30" cy="30" r="29.5" stroke="black"></circle>
                                                        <g clip-path="url(#clip0_649_41732)">
                                                        <path d="M9.75656 30.6724L10.5526 32.0945L8.95409 31.7769L7.84758 32.9734L7.65569 31.355L6.17578 30.6724L7.65569 29.9897L7.84758 28.3713L8.95409 29.5679L10.5526 29.2502L9.75656 30.6724Z" fill="black"></path>
                                                        </g>
                                                        <g clip-path="url(#clip1_649_41732)">
                                                        <path d="M51.3154 31.8915L49.7357 32.2923L50.4562 30.8305L49.5868 29.452L51.1998 29.6855L52.2422 28.4327L52.5185 30.0389L54.0321 30.6431L52.5899 31.4022L52.483 33.0285L51.3154 31.8915Z" fill="black"></path>
                                                        </g>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M30.0001 46.4995C39.1129 46.4995 46.5002 39.1121 46.5002 29.9994C46.5002 20.8866 39.1129 13.4993 30.0001 13.4993C20.8873 13.4993 13.5 20.8866 13.5 29.9994C13.5 39.1121 20.8873 46.4995 30.0001 46.4995ZM36.1884 25.0506L28.1445 33.2522L23.8133 28.836L22.5758 30.0978L28.1445 35.7757L37.4258 26.3124L36.1884 25.0506Z" fill="black"></path>
                                                        <defs>
                                                        <clipPath id="clip0_649_41732">
                                                            <rect width="4.83889" height="4.83889" fill="white" transform="translate(6.07422 33.0918) rotate(-90)"></rect>
                                                        </clipPath>
                                                        <clipPath id="clip1_649_41732">
                                                            <rect width="4.83889" height="4.83889" fill="white" transform="translate(49.9297 27.7087) rotate(15)"></rect>
                                                        </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-desc show-more-content">
                                            <div class="pdp-info-wrap">
                                                <div class="info-accordion-element accordion-element-top-description">
                                                    <h2 class="desc-head" id="des">Decription</h2>
                                                    <div class="desc-content">
                                                        <div>
                                                            <?= $product['description'] ?>
                                                        </div>
                                                    </div>
                                                    <div class="more-detail-wrapper">
                                                        <div class="desc-head">Product Details</div>
                                                    </div>
                                                    <div class="more-detail-body">
                                                        <div class="more-detail-Row">
                                                            <h3 class="more-detail-head">General</h3>
                                                            <div class="more-detail-content" wz_dt_ref="true">
                                                                <h4 class="more-label">Color </h4>
                                                                <span class="more-value"><?= $product['bezelColor'] ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="more-detail-Row">
                                                            <h3 class="more-detail-head">Infomation</h3>
                                                            <div class="more-detail-content" wz_dt_ref="true">
                                                                <h4 class="more-label">brand </h4>
                                                                <span class="more-value"><?= $product['brandName'] ?></span>
                                                            </div>
                                                            <div class="more-detail-content" wz_dt_ref="true">
                                                                <h4 class="more-label">Gender </h4>
                                                                <span class="more-value">
                                                                    <?php 
                                                                        if($product['gender']==1) {
                                                                            echo "Men's";
                                                                        } else if($product['gender']==0) echo "Ladies";
                                                                        else echo 'Unisex';
                                                                    ?>
                                                                </span>
                                                            </div>   
                                                            <div class="more-detail-content" wz_dt_ref="true">
                                                                <h4 class="more-label">model </h4>
                                                                <span class="more-value"><?= $product['model'] ?></span>
                                                            </div>
                                                            <div class="more-detail-content" wz_dt_ref="true">
                                                                <h4 class="more-label">Watch label </h4>
                                                                <span class="more-value"><?= $product['watchLabel']!= null ? $product['watchLabel'] : 'No information'; ?></span>
                                                            </div>
                                                            <div class="more-detail-content" wz_dt_ref="true">
                                                                <h4 class="more-label">Movement </h4>
                                                                <span class="more-value"><?= $product['moveName'] ?></span>
                                                            </div>
                                                            <div class="more-detail-content" wz_dt_ref="true">
                                                                <h4 class="more-label">Engine </h4>
                                                                <span class="more-value"><?= $product['engine']!= null ? $product['engine'] : 'No information'; ?></span>
                                                            </div>
                                                            <div class="more-detail-content" wz_dt_ref="true">
                                                                <h4 class="more-label">Power reserve </h4>
                                                                <span class="more-value"><?= $product['powerReserve']!= 0 ? $product['powerReserve'] . ' hours' : 'No information'; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="more-detail-Row">
                                                            <h3 class="more-detail-head">Case</h3>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Case Size </h4>
                                                                <span class="more-value"><?= $product['caseSize'] ?> mm</span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Case Thickness </h4>
                                                                <span class="more-value"><?= $product['caseThickness'] != 0 ? $product['caseThickness'] . ' mm' : 'No information' ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Case Material </h4>
                                                                <span class="more-value"><?= $product['caseMaterial'] ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Case Shape </h4>
                                                                <span class="more-value"><?= $product['caseName'] ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Case Back </h4>
                                                                <span class="more-value"><?= $product['caseBack']!= null ? $product['caseBack'] : 'No information'; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="more-detail-Row">
                                                            <h3 class="more-detail-head">Band</h3>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Band Material </h4>
                                                                <span class="more-value"><?= $product['bandMaterial'] ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Band Type </h4>
                                                                <span class="more-value"><?= $product['bandType'] ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Band Color </h4>
                                                                <span class="more-value"><?= $product['bandColor'] ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Band Length </h4>
                                                                <span class="more-value"><?= $product['bandLength'] != 0 ? $product['bandLength'] . ' mm' : 'No information' ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Band Width </h4>
                                                                <span class="more-value"><?= $product['bandWidth'] != 0 ? $product['bandWidth'] . ' mm' : 'No information' ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Clasp </h4>
                                                                <span class="more-value"><?= $product['clasp'] ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="more-detail-Row">
                                                            <h3 class="more-detail-head">Dial</h3>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Dial Color </h4>
                                                                <span class="more-value"><?= $product['dialColor'] ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Type </h4>
                                                                <span class="more-value"><?= $product['typeName'] ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Crystal </h4>
                                                                <span class="more-value"><?= $product['crystal']!= null ? $product['crystal'] : 'No information'; ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Hands </h4>
                                                                <span class="more-value"><?= $product['hands']!= null ? $product['hands'] : 'No information'; ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Dial Markers </h4>
                                                                <span class="more-value"><?= $product['dialMarkers']!= null ? $product['dialMarkers'] : 'No information'; ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Second Markers </h4>
                                                                <span class="more-value"><?= $product['secondMarkers']!= null ? $product['secondMarkers'] : 'No information'; ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Luminiscence </h4>
                                                                <span class="more-value"><?= $product['lumine']!= null ? $product['lumine'] : 'No information'; ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Bezel </h4>
                                                                <span class="more-value"><?= $product['bezel'] ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Bezel Color </h4>
                                                                <span class="more-value"><?= $product['bezelColor']!= null ? $product['bezelColor'] : 'No information'; ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Bezel Material </h4>
                                                                <span class="more-value"><?= $product['bezelMaterial']!= null ? $product['bezelMaterial'] : 'No information'; ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Crown </h4>
                                                                <span class="more-value"><?= $product['crown']!= null ? $product['crown'] : 'No information'; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="more-detail-Row">
                                                            <h3 class="more-detail-head">Features</h3>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Water Resistance </h4>
                                                                <span class="more-value"><?= $product['waterRes'] ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Calendar </h4>
                                                                <span class="more-value"><?= $product['calendar']!= null ? $product['calendar'] : 'No information'; ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Functions </h4>
                                                                <span class="more-value"><?= $product['func'] ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Watch Features </h4>
                                                                <span class="more-value"><?= $product['feaName'] ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="more-detail-Row">
                                                            <h3 class="more-detail-head">Additional Info</h3>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Watch Style </h4>
                                                                <span class="more-value"><?= $product['styleName'] ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Warranty </h4>
                                                                <span class="more-value"><?= $product['warranty']!= null ? $product['warranty'] : 'No information'; ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Department </h4>
                                                                <span class="more-value"><?= $product['department'] ?></span>
                                                            </div>
                                                            <div class="more-detail-content">
                                                                <h4 class="more-label">Category </h4>
                                                                <span class="more-value"><?= $product['cateName'] ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="show-text" wz_dt_ref="true" id="showText" onclick="window.location.href='#des'">
                                                <span class="show-more">
                                                    <span id="textShowMore">Show more</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                                        <path d="M10.4982 11.5249L14.8292 7.19385L16.0667 8.43128L10.4982 13.9998L4.92969 8.43128L6.16713 7.19385L10.4982 11.5249Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="not-pre-owned g-items">
                                            <div data-content-type="text" data-appearance="default" data-element="main" data-pb-style="IA4JJX5">
                                                <div>
                                                    <p><strong>Easy Returns</strong></p>
                                                </div>
                                                <p>This item can be returned within 30 days. <a class="view-links" data-guarantee-type="return" tabindex="0" href="https://help.jomashop.com/articles/4682-what-is-your-returns-and-exchanges-policy" target="_blank" rel="noopener">  View our return policy</a></p>
                                            </div>
                                        </div>
                                        <div class="g-items">
                                            <div data-content-type="text" data-appearance="default" data-element="main" data-pb-style="OTY43XF">
                                                <div><strong>Need Help?</strong></div>
                                                <div>
                                                    <span>Call our Jomashop customer service team at <a tabindex="0" href="tel:8778341434">+1 877-834-1434</a>.</span>
                                                    <a tabindex="0" href="/customer-service/" rel="noopener">Email</a><span> or </span><a data-guarantee-type="chat-call" tabindex="0" href="/customer-service/" target="_blank" rel="noopener">Chat</a>
                                                    <span>by visiting our<a tabindex="0" data-guarantee-type="need-help" href="/customer-service/" target="_blank" rel="noopener">Customer Service center.</a></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="g-items">
                                            <div data-content-type="text" data-appearance="default" data-element="main" data-pb-style="KEU3NAO">
                                                <div><strong>USA Shipping</strong></div>
                                                <p>All of our items ship from the United States. 
                                                    <a class="view-links" data-guarantee-type="shipping" tabindex="0" href="https://help.jomashop.com/articles/4699-shipping-options-policies" target="_blank" rel="noopener">Learn more</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="info-wrapper">
                        <div class="you-may-also-like">
                            <h3 class="title">You may also like </h3>
                            <div class="slider-root">
                                <div class="arrow-carousal-new-design arrow-next" id="also-next"></div>
                                <div class="arrow-carousal-new-design arrow-prev" id="also-prev"></div>
                                <div class="slider-list-wrapper slider-grid-wrapper" id="item-list" style="overflow: visible; transition: transform 0.3s ease 0s;">
                                    <?php 
                                        $sqlMinId = 'SELECT MIN(brandId) AS minId FROM brands';
                                        $result = $conn->query($sqlMinId)->fetch_assoc();
                                        $minId = $result['minId'];

                                        $sqlMaxId = 'SELECT MAX(brandId) AS maxId FROM brands';
                                        $result = $conn->query($sqlMaxId)->fetch_assoc();
                                        $maxId = $result['maxId'];

                                        do {
                                            $random = rand($minId, $maxId);
                                        } while($random==$product['brandId']);
                                        
                                        $sqlAlsoLike = 'SELECT * FROM watches
                                            JOIN brands ON watches.brand = brands.brandId
                                            JOIN styles ON watches.style = styles.styleId
                                            JOIN movements ON watches.movement = movements.moveId
                                            JOIN categories ON watches.category = categories.cateId
                                            JOIN features ON watches.features = features.feaId
                                            JOIN types ON watches.type = types.typeId
                                            JOIN caseshapes ON watches.caseShape = caseshapes.caseId
                                            WHERE (watches.brand LIKE ?) AND (watches.id NOT LIKE ?) OR (watches.brand LIKE ?)';
                                        $stmt = $conn->prepare($sqlAlsoLike);
                                        $stmt->bind_param('iii', $product['brand'], $product['id'], $random);
                                        $stmt->execute();
                                        $resultAlsoLike = $stmt->get_result();
                                    ?>
                                    <?php while($rowAlso = $resultAlsoLike->fetch_assoc()) { ?>
                                        <div class="product-content productItem productItem-more">
                                            <button class="wishlist-icon-new-design">
                                                <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.9988 17.0223L17.8913 10.0644C18.6146 9.34447 19.021 8.36807 19.021 7.34998C19.021 6.33188 18.6146 5.35548 17.8913 4.63557C17.1679 3.91567 16.1869 3.51123 15.1639 3.51123C14.1409 3.51123 13.1599 3.91567 12.4365 4.63557L10.9988 5.96821L9.56105 4.63557C8.8377 3.91567 7.85663 3.51123 6.83366 3.51123C5.8107 3.51123 4.82963 3.91567 4.10628 4.63557C3.38293 5.35548 2.97656 6.33188 2.97656 7.34998C2.97656 8.36807 3.38293 9.34447 4.10628 10.0644L10.9988 17.0223Z" stroke="black" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                            </button>
                                            <a class="product-image" href="detail.php?model=<?= $rowAlso['model'] ?>">
                                                <img loading="lazy" alt="<?= $rowAlso['name'] ?>" src="./img/watches/<?= $rowAlso['img1'] ?>" title="<?= $rowAlso['name'] ?>" width="250" height="250" class="product-img">
                                            </a>
                                            <a class="product-name" href="detail.php?model=<?= $rowAlso['model'] ?>">
                                                <span class="brand-name"><?= $rowAlso['brandName'] ?></span>
                                                <span title="" class="productName-link"><?= $rowAlso['name'] ?></span>
                                            </a>
                                            <div class="tag-wrapper">
                                                <span class="tag-new-design discount-label"><?= $rowAlso['sale'] ?>% Off</span>
                                            </div>
                                            <div class="price-wrapper trending">
                                                <div class="was-price-wrapper">
                                                    <div class="was-wrapper">
                                                        <span>$<?php
                                                            $was = $rowAlso['price'] / (1 - ($rowAlso['sale'] / 100));
                                                            $was = number_format($was, 2, '.', '');
                                                            echo $was;
                                                        ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="now-price">
                                                    <span>$<?= $rowAlso['price'] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="recently-view">
                        <h3 class="title">Most Viewed</h3>
                        <div class="slider-root">
                            <div class="arrow-carousal-new-design arrow-next" id="view-next"></div>
                            <div class="arrow-carousal-new-design arrow-prev" id="view-prev"></div>
                            <div class="slider-list-wrapper slider-grid-wrapper" id="recent-list" style="overflow: visible; transition: transform 0.3s ease 0s; ">
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
                                <?php while($rowTrending = $trendingResult->fetch_assoc()) { ?>
                                    <div class="product-content productItem recent-item-more">
                                        <button class="wishlist-icon-new-design">
                                            <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.9988 17.0223L17.8913 10.0644C18.6146 9.34447 19.021 8.36807 19.021 7.34998C19.021 6.33188 18.6146 5.35548 17.8913 4.63557C17.1679 3.91567 16.1869 3.51123 15.1639 3.51123C14.1409 3.51123 13.1599 3.91567 12.4365 4.63557L10.9988 5.96821L9.56105 4.63557C8.8377 3.91567 7.85663 3.51123 6.83366 3.51123C5.8107 3.51123 4.82963 3.91567 4.10628 4.63557C3.38293 5.35548 2.97656 6.33188 2.97656 7.34998C2.97656 8.36807 3.38293 9.34447 4.10628 10.0644L10.9988 17.0223Z" stroke="black" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                        </button>
                                        <a class="product-image" href="detail.php?model=<?= $rowTrending['model'] ?>">
                                            <img loading="lazy" alt="<?= $rowTrending['name'] ?>" src="./img/watches/<?= $rowTrending['img1'] ?>" title="<?= $rowTrending['name'] ?>" width="250" height="250" class="product-img">
                                        </a>
                                        <a class="product-name" href="detail.php?model=<?= $rowTrending['model'] ?>">
                                            <span class="brand-name"><?= $rowTrending['brandName'] ?></span>
                                            <span title="" class="productName-link"><?= $rowTrending['name'] ?></span>
                                        </a>
                                        <div class="tag-wrapper">
                                            <span class="tag-new-design discount-label"><?= $rowTrending['sale'] ?>% Off</span>
                                        </div>
                                        <div class="price-wrapper trending">
                                            <div class="was-price-wrapper">
                                                <div class="was-wrapper">
                                                    <span>$<?php
                                                        $was = $rowTrending['price'] / (1 - ($rowTrending['sale'] / 100));
                                                        $was = number_format($was, 2, '.', '');
                                                        echo $was;
                                                    ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="now-price">
                                                <span>$<?= $rowTrending['price'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </main>
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
                                        <li><a class="" href="">Customer Service</a></li>
                                        <li><a class="" href="">Order Status</a></li>
                                        <li><a class="">Update Your Email Preferences</a></li>
                                        <li><a class="" href="">Trade-In Your Watch</a></li>
                                        <li><a class="" href="">Sell my Rolex</a></li>
                                        <li><a class="" href="">Sell my Watch</a></li>
                                        <li><a class="" href="">Become a Vendor</a></li>
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
    <script type="text/javascript" src="./dist/js/detail.js"></script>
    <script>
      // xử lý slide
      

let slideshow = document.querySelector(".simple-slider-wrapper-more");
let alsoLike = document.querySelector("#item-list");
let recent = document.querySelector("#recent-list");
let currentSlide = 0;
const slides = document.querySelectorAll(".simple-slider-more");

const  alsoLikes = document.querySelectorAll(".productItem-more");
const  recentList = document.querySelectorAll(".recent-item-more");
// const slidesToShow = 4; // Số lượng slide được hiển thị cùng lúc

// Hàm chuyển slide trước
function prevSlide(slidesToShow, slideshow, slides) {
currentSlide = (currentSlide - slidesToShow + slides.length) % slides.length;
updateSlide(slideshow,slides);
}

//Hàm chuyển slide tiếp theo
function nextSlide(slidesToShow, slideshow, slides) {
currentSlide = (currentSlide + slidesToShow) % slides.length;
updateSlide(slideshow,slides);
}


// Cập nhật trạng thái hiển thị slide
function updateSlide(slideshow, slides) {
const slideWidth = slides[0].clientWidth;
slideshow.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
}


// Thêm sự kiện cho nút trước
document.querySelector("#more-prev").addEventListener("click", function() {
    prevSlide(4, slideshow, slides);
});

// Thêm sự kiện cho nút sau
document.querySelector("#more-next").addEventListener("click", function() {
    nextSlide(4, slideshow, slides);
});  
currentSlide = 0;
document.querySelector("#also-prev").addEventListener("click", function() {
    prevSlide(5, alsoLike, alsoLikes);
});
document.querySelector("#also-next").addEventListener("click", function() {
    nextSlide(5, alsoLike, alsoLikes);
});
currentSlide = 0;
document.querySelector("#view-prev").addEventListener("click", function() {
    prevSlide(5, recent, recentList);
});
document.querySelector("#view-next").addEventListener("click", function() {
    nextSlide(5, recent, recentList);
});  
    </script>
</body>
</html>