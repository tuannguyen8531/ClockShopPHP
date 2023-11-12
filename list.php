<!DOCTYPE html>
<html lang="en">
<?php
    include "config.php";
    $products_per_page = 9;
    if(isset($_GET['page']) && is_numeric($_GET['page'])){
        $current_page = intval($_GET['page']);
    }else{
        $current_page = 1;
    }
    $query_count = "SELECT COUNT(*) as total FROM watches";
    $result_count = $conn->query($query_count);
    $row_count = $result_count->fetch_assoc();
    $total_product = $row_count['total'];

    $total_pages = ceil($total_product/$products_per_page);
    $offset = ($current_page-1) * $products_per_page;
    
    $max_links = 5;

    $start = max(1,$current_page - floor($max_links/2));
    $end = min($start + $max_links - 1, $total_pages);

    $start = max(1, $end - $max_links + 1);

    $watch = 'SELECT * FROM watches
    JOIN brands ON watches.brand = brands.brandId
    JOIN styles ON watches.style = styles.styleId
    JOIN movements ON watches.movement = movements.moveId
    JOIN categories ON watches.category = categories.cateId
    JOIN features ON watches.features = features.feaId
    JOIN types ON watches.type = types.typeId
    JOIN caseshapes ON watches.caseShape = caseshapes.caseId
    LIMIT ?,?';
    $stmt = $conn->prepare($watch);
    $stmt->bind_param("ii",$offset,$products_per_page);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $price_sale = $row['price'] * ($row['sale']/100);
    $price_product = $row['price'] - $price_sale;
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#252d38">
    <meta name="p:domain_verify" content="bcct1LAxwyQRLZEnzzBMODZ9FlaZg3Xg">
    <title>Watches - Jomashop</title>
    <link rel="stylesheet" type="text/css" href="./dist/css/1312.31d6cfe0d16ae931b73c.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/1634.9eae8b323f9e73ea9273.initial.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/1882.e38ab4b9a94f0a06b024.initial.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/2557.53c4e93c6ec21bc19e7c.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/3409.9bd6de7ba69766f5a656.initial.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/3482.3bf6683f27a44ebcd105.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/5421.2501ef6314da696e9b86.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/5531.2501ef6314da696e9b86.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/591.af82319651e53c8c3f1a.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/629.ac02469f0d06a538712a.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/6468.2501ef6314da696e9b86.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/8890.6659a6f809d9fbafb555.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/1882.d22b2a4d319f5798c600.initial.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/1634.1a661808a4dbdbef312c.initial.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/256.9a4d8502ef8eea2ebf3f.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/3482.0051ec8bf96fa0b92067.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/5606.6b4ee6bd0876f7792e52.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/8825.51df8c031c82efbe88b4.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/9695.0508d067424b8b31465c.bundle.css">
    <style>
        .collapse:not(.show) {
            height: 0;
            overflow: hidden;
            visibility: hidden;
        }
    </style>
</head>

<body data-model-type="CATEGORY" data-model-id="871" data-model-relative-url="watches.html" data-model-redirect-code="0">
    <div id="root" data-react-rendered="true" class="plp-page">
        <div class="Main no-sticky" data-render-context="lazy">
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
                        <div class="slide-out-tabs open"><button
                                class="slide-out-tab wishlist-tab"><span>Wishlist</span>(0)</button><button
                                class="slide-out-tab account-tab">My Account</button><button
                                class="slide-out-tab cart-tab"><span>Bag</span>(0)</button></div><button
                            class="btn-close"><svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.0007 5.5865L11.9504 0.636719L13.3646 2.05093L8.4149 7.0007L13.3646 11.9504L11.9504 13.3646L7.0007 8.4149L2.05093 13.3646L0.636719 11.9504L5.5865 7.0007L0.636719 2.05093L2.05093 0.636719L7.0007 5.5865Z"
                                    fill="black"></path>
                            </svg></button>
                    </div>
                </div>
            </div>
            <main class="page" id="maincontent">
                <a id="contentarea" tabindex="-1"></a>
                <div class="category-page-wrapper container-width category-below-header" data-scroll-target=".category-banner-wrapper">
                    <div class="product-listing-page">
                        <div class="layered-navigations">
                            <div class="filter-wrap-mob">
                                <div>
                                    <div class="filter-body" role="tablist">
                                        <div class="filter-items-wrapper">
                                            <div class="filter-wrapper">
                                                <div class="filtered-by">Filters </div>
                                                <div class="selected-items-list">
                                                    <a href="#" class="selected-items-clear-all">Clear all</a>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="filter-list-wrap">
                                            <div class="checkbox-new-design filter-item filter-item-check">
                                                <input type="checkbox" id="get_it_fast" class="checkbox-input">
                                                <label title="Get It Fast" for="get_it_fast" class="checkbox-label">
                                                    Get It Fast 
                                                </label>
                                            </div>
                                            <div class="checkbox-new-design filter-item filter-item-check filter-item-check-last">
                                                <input type="checkbox" id="has_coupon" class="checkbox-input">
                                                <label title="Coupon Offers" for="has_coupon" class="checkbox-label">
                                                    Coupon Offers
                                                </label>
                                            </div>
                                            <li class="filter-price">
                                                <div class="accordion"><button role="tab" aria-selected="false"
                                                        aria-expanded="false" type="button"
                                                        class="expanded btn btn-link">
                                                        <div class="filter-head"><strong class="filter-name"
                                                                role="heading" aria-level="2">Price</strong><span
                                                                class="expand-icon"></span></div>
                                                    </button>
                                                    <div role="tabpanel" aria-hidden="true" aria-expanded="true"
                                                        class="add_section collapse " style="">
                                                        <ul class="item-sub-cat price">
                                                            <li class="filter-item"><a
                                                                    href="/watches.html?price=%7B%22from%22%3A0%2C%22to%22%3A100%7D"
                                                                    class="label-checkbox">$0-$100</a></li>
                                                            <li class="filter-item"><a
                                                                    href="/watches.html?price=%7B%22from%22%3A100%2C%22to%22%3A300%7D"
                                                                    class="label-checkbox">$100-$300</a></li>
                                                            <li class="filter-item"><a
                                                                    href="/watches.html?price=%7B%22from%22%3A300%2C%22to%22%3A500%7D"
                                                                    class="label-checkbox">$300-$500</a></li>
                                                            <li class="filter-item"><a
                                                                    href="/watches.html?price=%7B%22from%22%3A500%2C%22to%22%3A1000%7D"
                                                                    class="label-checkbox">$500-$1,000</a></li>
                                                            <li class="filter-item"><a
                                                                    href="/watches.html?price=%7B%22from%22%3A1000%2C%22to%22%3A5000%7D"
                                                                    class="label-checkbox">$1,000-$5,000</a></li>
                                                            <li class="filter-item"><a
                                                                    href="/watches.html?price=%7B%22from%22%3A5000%2C%22to%22%3A0%7D"
                                                                    class="label-checkbox">$5,000+</a></li>
                                                            <li></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="filter-manufacturer">
                                                <div class="accordion">
                                                    <button role="tab" aria-selected="false" aria-expanded="false" type="button" class="expanded btn btn-link">
                                                        <div class="filter-head"><strong class="filter-name"
                                                                role="heading" aria-level="2">Brand</strong><span
                                                                class="expand-icon"></span></div>
                                                    </button>
                                                    <div role="tabpanel" aria-hidden="true" aria-expanded="true"
                                                        class="add_section collapse " style="">
                                                        <div class="item-filter-search"><input class="filter-input"
                                                                type="text" placeholder="Find a brand"
                                                                aria-label="Find a brand" value=""></div>
                                                        <div class="alphabets-wrapper">
                                                            <div class="alphabet-item ">
                                                                <span tabindex="-1" class="alphabet-number">B</span>
                                                            </div>
                                                            <div class="alphabet-item">
                                                                <span tabindex="0" class="alphabet-number">C</span>
                                                            </div>
                                                            <div class="alphabet-item">
                                                                <span tabindex="0" class="alphabet-number">H</span>
                                                            </div>
                                                            <div class="alphabet-item ">
                                                                <span tabindex="-1" class="alphabet-number">I</span>
                                                            </div>
                                                            <div class="alphabet-item ">
                                                                <span tabindex="-1" class="alphabet-number">L</span>
                                                            </div>
                                                            <div class="alphabet-item">
                                                                <span tabindex="0" class="alphabet-number">O</span>
                                                            </div>
                                                            <div class="alphabet-item">
                                                                <span tabindex="0" class="alphabet-number">M</span>
                                                            </div>
                                                            <div class="alphabet-item ">
                                                                <span tabindex="-1" class="alphabet-number">P</span>
                                                            </div>
                                                            <div class="alphabet-item ">
                                                                <span tabindex="-1" class="alphabet-number">R</span>
                                                            </div>
                                                            <div class="alphabet-item ">
                                                                <span tabindex="-1" class="alphabet-number">S</span>
                                                            </div>
                                                            <div class="alphabet-item ">
                                                                <span tabindex="-1" class="alphabet-number">T</span>
                                                            </div>

                                            </li>
                                            <li class="filter-gender">
                                                <div class="accordion">
                                                    <button role="tab" aria-selected="false" aria-expanded="false" type="button" class="expanded btn btn-link">
                                                        <div class="filter-head"><strong class="filter-name" role="heading" aria-level="2">Gender</strong><span class="expand-icon"></span></div>
                                                    </button>
                                                    <div role="tabpanel" aria-hidden="true" aria-expanded="true" class="add_section collapse " style="">
                                                        <ul class="item-sub-cat gender">
                                                            <li class="filter-item checkbox-new-design"><input type="checkbox" name="26" id="product_checkbox_26" class="checkbox-input" aria-label="Ladies"><a href="/collections/watches/Ladies-Watches~Z2VuZGVyfkxhZGllcw?get_it_fast=Yes&amp;has_coupon=Yes" class="label-checkbox">Ladies</a></li>
                                                            <li class="filter-item checkbox-new-design"><input type="checkbox" name="25" id="product_checkbox_25" class="checkbox-input" aria-label="Men's"><a href="/collections/watches/Men's-Watches~Z2VuZGVyfk1lbidz?get_it_fast=Yes&amp;has_coupon=Yes" class="label-checkbox">Men's</a></li>
                                                            <li class="filter-item checkbox-new-design"><input type="checkbox" name="27" id="product_checkbox_27" class="checkbox-input" aria-label="Unisex"><a href="/collections/watches/Unisex-Watches~Z2VuZGVyflVuaXNleA?get_it_fast=Yes&amp;has_coupon=Yes" class="label-checkbox">Unisex</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="filter-style">
                                                <div class="accordion"><button role="tab" aria-selected="false" aria-expanded="false" type="button" class="expanded btn btn-link">
                                                        <div class="filter-head"><strong class="filter-name" role="heading" aria-level="2">Watch Style</strong>
                                                            <span class="expand-icon" wz_dt_ref="true"></span>
                                                        </div>
                                                    </button>
                                                    <div role="tabpanel" aria-hidden="true" aria-expanded="true" class="add_section collapse " style="">
                                                        <ul class="item-sub-cat style">
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="45099" id="product_checkbox_45099" class="checkbox-input" aria-label="Casual">
                                                                <a href="/collections/watches/Casual-Watches~c3R5bGV-Q2FzdWFs" class="label-checkbox">Casual</a>
                                                            </li>
                                                            <li class="filter-item checkbox-new-design"><input type="checkbox" name="45115" id="product_checkbox_45115" class="checkbox-input" aria-label="Dive">
                                                                <a href="/collections/watches/Dive-Watches~c3R5bGV-RGl2ZQ" class="label-checkbox">Dive</a>
                                                            </li>
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="45098" id="product_checkbox_45098" class="checkbox-input" aria-label="Dress">
                                                                <a href="/collections/watches/Dress-Watches~c3R5bGV-RHJlc3M" class="label-checkbox">Dress</a>
                                                            </li>
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="45476" id="product_checkbox_45476" class="checkbox-input" aria-label="Fashion">
                                                                <a href="/collections/watches/Fashion-Watches~c3R5bGV-RmFzaGlvbg" class="label-checkbox">Fashion</a>
                                                            </li>
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="45137" id="product_checkbox_45137" class="checkbox-input" aria-label="Luxury">
                                                                <a href="/collections/watches/Luxury-Watches~c3R5bGV-THV4dXJ5" class="label-checkbox">Luxury</a>
                                                            </li>
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="45128" id="product_checkbox_45128" class="checkbox-input" aria-label="Military">
                                                                <a href="/collections/watches/Military-Watches~c3R5bGV-TWlsaXRhcnk" class="label-checkbox">Military</a>
                                                            </li>
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="45395" id="product_checkbox_45395" class="checkbox-input" aria-label="Pilot">
                                                                <a href="/collections/watches/Pilot-Watches~c3R5bGV-UGlsb3Q" class="label-checkbox">Pilot</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="filter-movement">
                                                <div class="accordion">
                                                    <button role="tab" aria-selected="false" aria-expanded="false" type="button" class="expanded btn btn-link">
                                                        <div class="filter-head"><strong class="filter-name" role="heading" aria-level="2">Movement</strong>
                                                            <span class="expand-icon"></span>
                                                        </div>
                                                    </button>
                                                    <div role="tabpanel" aria-hidden="true" aria-expanded="true" class="add_section collapse " style="">
                                                        <ul class="item-sub-cat movement">
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="404" id="product_checkbox_404" class="checkbox-input" aria-label="Automatic">
                                                                <a href="/collections/watches/Automatic-Watches~bW92ZW1lbnR-QXV0b21hdGlj" class="label-checkbox">Automatic</a>
                                                            </li>
                                                            <li class="filter-item checkbox-new-design"><input type="checkbox" name="24345" id="product_checkbox_24345" class="checkbox-input" aria-label="Eco-Drive">
                                                                <a href="/collections/watches/Eco-Drive-Watches~bW92ZW1lbnR-RWNvLURyaXZl" class="label-checkbox">Eco-Drive</a>
                                                            </li>
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="1082" id="product_checkbox_1082" class="checkbox-input" aria-label="Hand Wind">
                                                                <a href="/collections/watches/Hand-Wind-Watches~bW92ZW1lbnR-SGFuZCUyMFdpbmQ" class="label-checkbox">Hand Wind</a>
                                                            </li>
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="1084" id="product_checkbox_1084" class="checkbox-input" aria-label="Quartz">
                                                                <a href="/collections/watches/Quartz-Watches~bW92ZW1lbnR-UXVhcnR6" class="label-checkbox">Quartz</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="filter-features">
                                                <div class="accordion">
                                                    <button role="tab" aria-selected="false" aria-expanded="false" type="button" class="expanded btn btn-link" wz_dt_ref="true">
                                                        <div class="filter-head">
                                                            <strong class="filter-name" role="heading" aria-level="2">Watch Features</strong>
                                                            <span class="expand-icon"></span>
                                                        </div>
                                                    </button>
                                                    <div role="tabpanel" aria-hidden="true" aria-expanded="false" class="add_section collapse " style="">
                                                        <ul class="item-sub-cat features">
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="437" id="product_checkbox_437" class="checkbox-input" aria-label="Alarm">
                                                                <a href="/collections/watches/Alarm-Watches~ZmVhdHVyZXN-QWxhcm0" class="label-checkbox">Alarm</a>
                                                            </li>
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="87311" id="product_checkbox_87311" class="checkbox-input" aria-label="Alligator Leather">
                                                                <a href="/collections/watches/Alligator-Leather-Watches~ZmVhdHVyZXN-QWxsaWdhdG9yJTIwTGVhdGhlcg" class="label-checkbox">Alligator Leather</a>
                                                            </li>
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="438" id="product_checkbox_438" class="checkbox-input" aria-label="Altimeter">
                                                                <a href="/collections/watches/Altimeter-Watches~ZmVhdHVyZXN-QWx0aW1ldGVy" class="label-checkbox">Altimeter</a>
                                                            </li>
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="82002" id="product_checkbox_82002" class="checkbox-input" aria-label="Analog">
                                                                <a href="/collections/watches/Analog-Watches~ZmVhdHVyZXN-QW5hbG9n" class="label-checkbox">Analog</a>
                                                            </li>
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="28313" id="product_checkbox_28313" class="checkbox-input" aria-label="Annual Calendar">
                                                                <a href="/collections/watches/Annual-Calendar-Watches~ZmVhdHVyZXN-QW5udWFsJTIwQ2FsZW5kYXI" class="label-checkbox">Annual Calendar</a>
                                                            </li>
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="439" id="product_checkbox_439" class="checkbox-input" aria-label="Atomic Timekeeping">
                                                                <a href="/collections/watches/Atomic-Timekeeping-Watches~ZmVhdHVyZXN-QXRvbWljJTIwVGltZWtlZXBpbmc" class="label-checkbox">Atomic Timekeeping</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="filter-case_shape">
                                                <div class="accordion">
                                                    <button role="tab" aria-selected="false" aria-expanded="false" type="button" class="expanded btn btn-link" wz_dt_ref="true">
                                                        <div class="filter-head">
                                                            <strong class="filter-name" role="heading" aria-level="2">Case Shape</strong>
                                                            <span class="expand-icon"></span>
                                                        </div>
                                                    </button>
                                                    <div role="tabpanel" aria-hidden="true" aria-expanded="true" class="add_section collapse">
                                                        <ul class="item-sub-cat case_shape">
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="25827" id="product_checkbox_25827" class="checkbox-input" aria-label="Cushion">
                                                                <a href="/collections/watches/Cushion-Watches~Y2FzZV9zaGFwZX5DdXNoaW9u" class="label-checkbox">Cushion</a>
                                                            </li>
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="351" id="product_checkbox_351" class="checkbox-input" aria-label="Dodecagon">
                                                                <a href="/collections/watches/Dodecagon-Watches~Y2FzZV9zaGFwZX5Eb2RlY2Fnb24" class="label-checkbox">Dodecagon</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="filter-band_type">
                                                <div class="accordion">
                                                    <button role="tab" aria-selected="false" aria-expanded="false" type="button" class="expanded btn btn-link" wz_dt_ref="true">
                                                        <div class="filter-head">
                                                            <strong class="filter-name" role="heading" aria-level="2">Band Type</strong>
                                                            <span class="expand-icon"></span>
                                                        </div>
                                                    </button>
                                                    <div role="tabpanel" aria-hidden="true" aria-expanded="true" class="add_section collapse " style="">
                                                        <ul class="item-sub-cat band_type">
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="24333" id="product_checkbox_24333" class="checkbox-input" aria-label="Bracelet">
                                                                <a href="/collections/watches/Bracelet-Watches~YmFuZF90eXBlfkJyYWNlbGV0" class="label-checkbox">Bracelet</a>
                                                            </li>
                                                            <li class="filter-item checkbox-new-design"><input type="checkbox" name="24331" id="product_checkbox_24331" class="checkbox-input" aria-label="Strap">
                                                                <a href="/collections/watches/Strap-Watches~YmFuZF90eXBlflN0cmFw" class="label-checkbox">Strap</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="filter-dial_type">
                                                <div class="accordion">
                                                    <button role="tab" aria-selected="false" aria-expanded="false" type="button" class="expanded btn btn-link">
                                                        <div class="filter-head">
                                                            <strong class="filter-name" role="heading" aria-level="2">Type</strong>
                                                            <span class="expand-icon"></span>
                                                        </div>
                                                    </button>
                                                    <div role="tabpanel" aria-hidden="true" aria-expanded="true" class="add_section collapse " style="">
                                                        <ul class="item-sub-cat dial_type">
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="24339" id="product_checkbox_24339" class="checkbox-input" aria-label="Analog">
                                                                <a href="/collections/watches/Analog-Watches~ZGlhbF90eXBlfkFuYWxvZw" class="label-checkbox">Analog</a>
                                                            </li>
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="24337" id="product_checkbox_24337" class="checkbox-input" aria-label="Analog-Digital">
                                                                <a href="/collections/watches/Analog-Digital-Watches~ZGlhbF90eXBlfkFuYWxvZy1EaWdpdGFs" class="label-checkbox">Analog-Digital</a>
                                                            </li>
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="24341" id="product_checkbox_24341" class="checkbox-input" aria-label="Digital">
                                                                <a href="/collections/watches/Digital-Watches~ZGlhbF90eXBlfkRpZ2l0YWw" class="label-checkbox">Digital</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="filter-watchsize">
                                                <div class="accordion">
                                                    <button role="tab" aria-selected="false" aria-expanded="false" type="button" class="expanded btn btn-link">
                                                        <div class="filter-head">
                                                            <strong class="filter-name" role="heading" aria-level="2">Case Size</strong>
                                                            <span class="expand-icon"></span>
                                                        </div>
                                                    </button>
                                                    <div role="tabpanel" aria-hidden="true" aria-expanded="true" class="add_section collapse " style="">
                                                        <ul class="item-sub-cat watchsize">
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="28379" id="product_checkbox_28379" class="checkbox-input" aria-label="<20 mm">
                                                                <a href="/collections/watches/%3C20-mm-Watches~d2F0Y2hzaXplfiUzQzIwJTIwbW0" class="label-checkbox">&lt;20 mm</a>
                                                            </li>
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="28363" id="product_checkbox_28363" class="checkbox-input" aria-label=">55 mm">
                                                                <a href="/collections/watches/%3E55-mm-Watches~d2F0Y2hzaXplfiUzRTU1JTIwbW0" class="label-checkbox">&gt;55 mm</a>
                                                            </li>
                                                            <li class="filter-item checkbox-new-design"><input type="checkbox" name="28377" id="product_checkbox_28377" class="checkbox-input" aria-label="20-25 mm"><a href="/collections/watches/20-25-mm-Watches~d2F0Y2hzaXplfjIwLTI1JTIwbW0" class="label-checkbox">20-25 mm</a></li>
                                                            <li class="filter-item checkbox-new-design"><input type="checkbox" name="28375" id="product_checkbox_28375" class="checkbox-input" aria-label="25-30 mm"><a href="/collections/watches/25-30-mm-Watches~d2F0Y2hzaXplfjI1LTMwJTIwbW0" class="label-checkbox">25-30 mm</a></li>
                                                            <li class="filter-item checkbox-new-design"><input type="checkbox" name="28373" id="product_checkbox_28373" class="checkbox-input" aria-label="30-35 mm"><a href="/collections/watches/30-35-mm-Watches~d2F0Y2hzaXplfjMwLTM1JTIwbW0" class="label-checkbox">30-35 mm</a></li>
                                                            <li class="filter-item checkbox-new-design"><input type="checkbox" name="28371" id="product_checkbox_28371" class="checkbox-input" aria-label="35-40 mm"><a href="/collections/watches/35-40-mm-Watches~d2F0Y2hzaXplfjM1LTQwJTIwbW0" class="label-checkbox">35-40 mm</a></li>
                                                            <li class="filter-item checkbox-new-design"><input type="checkbox" name="28369" id="product_checkbox_28369" class="checkbox-input" aria-label="40-45 mm"><a href="/collections/watches/40-45-mm-Watches~d2F0Y2hzaXplfjQwLTQ1JTIwbW0" class="label-checkbox">40-45 mm</a></li>
                                                            <li><a class="see-more" href="#">See More</a></li>
                                                            <li class="filter-item checkbox-new-design no-display"><input type="checkbox" name="28367" id="product_checkbox_28367" class="checkbox-input" aria-label="45-50 mm"><a href="/collections/watches/45-50-mm-Watches~d2F0Y2hzaXplfjQ1LTUwJTIwbW0" class="label-checkbox">45-50 mm</a></li>
                                                            <li class="filter-item checkbox-new-design no-display"><input type="checkbox" name="28365" id="product_checkbox_28365" class="checkbox-input" aria-label="50-55 mm"><a href="/collections/watches/50-55-mm-Watches~d2F0Y2hzaXplfjUwLTU1JTIwbW0" class="label-checkbox">50-55 mm</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-grids">
                            <div class="filter-desktop">
                                <div class="category-header">
                                    <div class="category-title-wrap">
                                        <h1 class="category-title">Watches</h1>
                                        <div class="products-toolbar-filter"><span class="clp-count">53,682
                                                results</span>
                                            <div class="tool-bar">
                                                <div class="sort-dropdown"><button type="button"
                                                        class="plp-action-btn btn-sort btn btn-primary">
                                                        <div class="btn-sort-icon"><svg
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                width="22" height="22" fill="none">
                                                                <path
                                                                    d="M20 4V16H23L19 21L15 16H18V4H20ZM12 18V20H3V18H12ZM14 11V13H3V11H14ZM14 4V6H3V4H14Z"
                                                                    fill="currentColor"></path>
                                                            </svg>SORT:</div><span class="plp-btn-txt">Most Viewed<svg
                                                                xmlns="http://www.w3.org/2000/svg" width="18"
                                                                height="18" viewBox="0 0 18 18" fill="none">
                                                                <path d="M9 12L4.5 7.5H13.5L9 12Z" fill="currentColor">
                                                                </path>
                                                            </svg></span>
                                                    </button></div><button varient="primary" type="button"
                                                    class="plp-action-btn btn-filter btn btn-primary btn-sm"><svg
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        width="24" height="24">
                                                        <path d="M10 18H14V16H10V18ZM3 6V8H21V6H3ZM6 13H18V11H6V13Z"
                                                            fill="currentColor"></path>
                                                    </svg><span class="plp-btn-txt">Filter</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="product-list-wrapper">
                                <ul class="productsList">
                                <?php while ($row = $result->fetch_assoc() ): ?>
                                    <li class="productItem">
                                        <div class="productItemBlock" data-product-scroll-target="">
                                            <div class="productImageBlock productImageBlockHover">
                                                <button class="wishlist-icon-new-design">
                                                    <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.9988 17.0223L17.8913 10.0644C18.6146 9.34447 19.021 8.36807 19.021 7.34998C19.021 6.33188 18.6146 5.35548 17.8913 4.63557C17.1679 3.91567 16.1869 3.51123 15.1639 3.51123C14.1409 3.51123 13.1599 3.91567 12.4365 4.63557L10.9988 5.96821L9.56105 4.63557C8.8377 3.91567 7.85663 3.51123 6.83366 3.51123C5.8107 3.51123 4.82963 3.91567 4.10628 4.63557C3.38293 5.35548 2.97656 6.33188 2.97656 7.34998C2.97656 8.36807 3.38293 9.34447 4.10628 10.0644L10.9988 17.0223Z" stroke="black" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </button>
                                                <a class="productImg-link" href="./detail.php?model=<?=$row['model']?>">
                                                    <span class="productImageRatio">
                                                        <img alt="<?= $row['name']?>" src="./img/watches/<?= $row['img1']?>" title="<?= $row['name']?>" class="productImg secondProductImg loaded">
                                                        <img alt="<?= $row['name']?>" src="./img/watches/<?= $row['img2']?>" title="<?= $row['name']?>" class="productImg firstProductImg">
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="product-details">
                                                <h2 class="productName"><a class="productName-link" title="<?= $row['name']?>" href="/seiko-chronograph-champagne-dial-mens-watch-ssb383.html"><span class="brand-name"><?= $row['brandName']?></span><span class="name-out-brand"><?= $row['name']?></span></a></h2>
                                                <div class="tag-wrapper"><span class="tag-new-design discount-label"><?= $row['sale']?>% Off</span></div>
                                                <div class="productPrice">
                                                    <div class="price-wrapper">
                                                        <div class="was-price-wrapper">
                                                            <div class="was-wrapper"><span class="was-label">Was:</span><span>$<?php $was = $row['price'] / (1 - ($row['sale'] / 100));
                                                            $was = number_format($was, 2, '.', '');
                                                            $retail = $was + 30.00;
                                                            $retail = number_format($retail, 2, '.', '');
                                                            echo $retail;?></span></div>
                                                            <span class="discount-value show-red"><?= $price_sale?></span>
                                                        </div>
                                                        <div class="now-price"><span class="now-label">Now:</span><span>$<?= $row['price'] ?></span></div>
                                                    </div>
                                                </div>
                                                <div class="social-proof">
                                                    <div class="limited-qty">
                                                        <svg width="12" height="15" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M2.25487 3.97881C3.28133 3.15773 4.58333 2.66675 6 2.66675C7.41667 2.66675 8.71867 3.15773 9.74513 3.97881L10.7141 3.00989L11.6569 3.9527L10.6879 4.92162C11.509 5.94807 12 7.25008 12 8.66675C12 11.9805 9.31373 14.6667 6 14.6667C2.68629 14.6667 0 11.9805 0 8.66675C0 7.25008 0.49098 5.94807 1.31207 4.92162L0.343147 3.9527L1.28595 3.00989L2.25487 3.97881ZM6 13.3334C8.57733 13.3334 10.6667 11.2441 10.6667 8.66675C10.6667 6.08942 8.57733 4.00008 6 4.00008C3.42267 4.00008 1.33333 6.08942 1.33333 8.66675C1.33333 11.2441 3.42267 13.3334 6 13.3334ZM6.66667 8.00008H8.66667L5.33333 12.3334V9.33342H3.33333L6.66667 4.99688V8.00008ZM3.33333 0.666748H8.66667V2.00008H3.33333V0.666748Z" fill="#E03400"></path>
                                                        </svg>
                                                        <span>Limited Quantity</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                                </ul>
                            </div>
                            <div class="pagination-wrapper ">
                                <ul class="pagination">
                                        <?php if ($current_page > 1) { ?>
                                            <li class="pagination-prev page-item">
                                                <a class="page-link" href="<?= 'list.php?page=' . ($current_page - 1) ?>">
                                                    <span aria-hidden="true">&lt;</span>
                                                    <span class="sr-only">Prev</span>
                                                </a>
                                            </li>
                                        <?php } ?>

                                        <?php for ($page = $start; $page <= $end; $page++) { ?>
                                            <li class="page-item <?= ($page == $current_page) ? 'active' : '' ?>">
                                                <a class="page-link" href="<?= 'list.php?page=' . $page ?>">
                                                    <span class="pagination-text"><?= $page ?></span>
                                                    <?php if ($page == $current_page) { ?>
                                                        <span class="sr-only">(current)</span>
                                                    <?php } ?>
                                                </a>
                                            </li>
                                        <?php } ?>

                                        <?php if ($current_page < $total_pages) { ?>
                                            <li class="pagination-next page-item">
                                                <a class="page-link" href="<?= 'list.php?page=' . ($current_page + 1) ?>">
                                                    <span aria-hidden="true">›</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        <?php } ?>
                                </ul>
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
                                                    <a href="./error404.php" aria-label="Accessories" class="entire-catalog-btn">Accessories</a>
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
    <script>
        var list_quey = document.querySelectorAll(".expanded");
        var list = document.querySelectorAll(".add_section");
        console.log(list);

        for (var i = 0; i < list_quey.length; i++) {
            let div = list[i];
            list_quey[i].onclick = function (e) {
                div.classList.toggle("show");
            };
        }
    </script>
    <script type="text/javascript" src="./dist/js/modal.js"></script>
</body>

</html>