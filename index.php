<!DOCTYPE html>
<html lang="en">
<?php 
    include 'config.php';

    session_start();
    $_SESSION['username'] = 'none';

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
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jomashop.com: Online Shopping for Watches &amp; More - Jomashop</title>
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
</head>
<body>
    <div id="root" data-react-rendered="true" class="home-page">
        <div class="Main search-sticky-bar" data-render-context="lazy">
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
            <div class="multi-slide-wrapper">
                <div class="multi-slideout-container">
                    <div class="multi-slideout-header">
                        <div class="slide-out-tabs open">
                            <button class="slide-out-tab wishlist-tab"><span>Wishlist</span>(0)</button>
                            <button class="slide-out-tab account-tab">My Account</button>
                            <button class="slide-out-tab cart-tab"><span>Bag</span>(0)</button>
                        </div>
                        <button class="btn-close">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.0007 5.5865L11.9504 0.636719L13.3646 2.05093L8.4149 7.0007L13.3646 11.9504L11.9504 13.3646L7.0007 8.4149L2.05093 13.3646L0.636719 11.9504L5.5865 7.0007L0.636719 2.05093L2.05093 0.636719L7.0007 5.5865Z" fill="black"></path>
                            </svg>
                        </button>
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
                                            <div class="banner-root-Wut hero-banner __PRIMARY_CONTENT_PRELOAD__"><a class="banner-link-pPa" href="" aria-label="Hero banner primary">
                                                    <div class="banner-wrapper-WuE" style="background-image: url(&quot;./img/banner/banner_main_HALLOWEEN_2023_1600_1.jpg&quot;); background-size: cover; background-position: center center; background-attachment: scroll; background-repeat: no-repeat;">
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
                                                        <a href="">
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
                                                        <a href="">
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
                                                        <a href="">
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
                                                        <a href="">
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
                                            <style>
            
                                                .trending-tabs {
                                                    display: none;
                                                }

                                                .btn-new-design.tag {
                                                    font-size: 16px;
                                                    font-family: 'Inter';
                                                    font-weight: 600;
                                                    line-height: 130%;
                                                    padding: 10px 13px 11px;
                                                    border-radius: 5px;
                                                    border: 1px solid rgba(0, 0, 0, 0.15);
                                                    color: #000;
                                                }

                                                .btn-new-design.tag.active {
                                                    border: 1px solid #000;
                                                    background-color: transparent;
                                                    color: #000;
                                                }

                                                .btn-new-design.tag:hover {
                                                    border: 1px solid #000;
                                                    background-color: transparent;
                                                    color: #000;
                                                }
                                            </style>
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
                                                            <div class="swiper">
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
                                                                        <div id="slideshow1" class="slider-list" style="width: 200%;user-select: auto; display: flex; margin: 0 auto;transition: transform 0.3s ease;">
                                                                            <div class="slide slide-current slide-visible" style="width: 1.66667%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;">
                                                                                <div class="swiper-slide">
                                                                                    <div class="item-root-XLH product-content"><a class="item-images-yv2 product-image" href="/tissot-watch-t035-407-16-051-03.html"><img src="https://cdn2.jomashop.com/media/catalog/product/cache/df24c858758eb768757877f23cd17493/t/i/tissot-couturier-black-dial-automatic-men_s-watch-t035.407.16.051.03.jpg" alt="Tissot Couturier Automatic Black Dial Men's Watch T035.407.16.051.03" width="250" height="250" class="product-img" loading="lazy" draggable="false"></a><a class="item-name-LrP product-name" href="/tissot-watch-t035-407-16-051-03.html"><span class="brand-name">Tissot </span><span title="Couturier Automatic Black Dial Men's Watch T035.407.16.051.03">Couturier
                                                                                                Automatic Black Dial Men's Watch T035.407.16.051.03</span></a>
                                                                                        <div class="price-wrapper trending">
                                                                                            <div class="now-price"><span>$299.00</span><span class="discount-value show-red">59% Off</span></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="slide slide-visible" style="width: 1.66667%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;">
                                                                                <div class="swiper-slide">
                                                                                    <div class="item-root-XLH product-content"><a class="item-images-yv2 product-image" href="/ice-watch-ice-steel-gold-blue-medium-ch-chronograph-quartz-blue-dial-unisex-watch-017674.html"><img src="https://cdn2.jomashop.com/media/catalog/product/cache/df24c858758eb768757877f23cd17493/i/c/icewatch-chronograph-quartz-blue-dial-goldtone-unisex-watch-017674.jpg" alt="Ice-Watch Chronograph Quartz Blue Dial Men's Watch 017674" width="250" height="250" class="product-img" loading="lazy" draggable="false"></a><a class="item-name-LrP product-name" href="/ice-watch-ice-steel-gold-blue-medium-ch-chronograph-quartz-blue-dial-unisex-watch-017674.html"><span class="brand-name">Ice-Watch </span><span title="Chronograph Quartz Blue Dial Men's Watch 017674">Chronograph
                                                                                                Quartz Blue Dial Men's Watch 017674</span></a>
                                                                                        <div class="price-wrapper trending">
                                                                                            <div class="was-price-wrapper">
                                                                                                <div class="was-wrapper"><span class="was-label">Was:</span><span>$88.88</span></div><span class="discount-value ">92% Off</span>
                                                                                            </div>
                                                                                            <div class="now-price"><span class="now-label">Now:</span><span>$28.88</span></div>
                                                                                            <div class="after-price">after $60 coupon</div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="slide slide-visible" style="width: 1.66667%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;">
                                                                                <div class="swiper-slide">
                                                                                    <div class="item-root-XLH product-content"><a class="item-images-yv2 product-image" href="/luminox-bear-grylls-x-tide-limited-quartz-blue-dial-mens-watch-xb-3703-c.html"><img src="https://cdn2.jomashop.com/media/catalog/product/cache/df24c858758eb768757877f23cd17493/l/u/luminox-bear-grylls-x-tide-limited-quartz-blue-dial-mens-watch-xb3703c-xb3703c.jpg" alt="Luminox Bear Grylls x Tide Limited Quartz Blue Dial Men's Watch XB.3703.C" width="250" height="250" class="product-img" loading="lazy" draggable="false"></a><a class="item-name-LrP product-name" href="/luminox-bear-grylls-x-tide-limited-quartz-blue-dial-mens-watch-xb-3703-c.html"><span class="brand-name">Luminox </span><span title="Bear Grylls x Tide Limited Quartz Blue Dial Men's Watch XB.3703.C">Bear
                                                                                                Grylls x Tide Limited Quartz Blue Dial Men's Watch XB.3703.C</span></a>
                                                                                        <div class="price-wrapper trending">
                                                                                            <div class="now-price"><span>$198.00</span><span class="discount-value show-red">60% Off</span></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="slide slide-visible" style="width: 1.66667%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;">
                                                                                <div class="swiper-slide">
                                                                                    <div class="item-root-XLH product-content"><a class="item-images-yv2 product-image" href="/salvatore-ferragamo-chronograph-legacy-quartz-white-mother-of-pearl-dial-watch-sfmw00322.html"><img src="https://cdn2.jomashop.com/media/catalog/product/cache/df24c858758eb768757877f23cd17493/s/a/salvatore-ferragamo-chronograph-legacy-quartz-white-mother-of-pearl-dial-watch-sfmw00322.jpg" alt="Salvatore Ferragamo Chronograph Legacy Quartz White Mother of Pearl Dial Watch SFMW00322" width="250" height="250" class="product-img" loading="lazy" draggable="false"></a><a class="item-name-LrP product-name" href="/salvatore-ferragamo-chronograph-legacy-quartz-white-mother-of-pearl-dial-watch-sfmw00322.html"><span class="brand-name">Salvatore Ferragamo </span><span title="Chronograph Legacy Quartz White Mother of Pearl Dial Watch SFMW00322">Chronograph
                                                                                                Legacy Quartz White Mother of Pearl Dial Watch SFMW00322</span></a>
                                                                                        <div class="price-wrapper trending">
                                                                                            <div class="was-price-wrapper">
                                                                                                <div class="was-wrapper"><span class="was-label">Was:</span><span>$749.99</span></div><span class="discount-value ">72% Off</span>
                                                                                            </div>
                                                                                            <div class="now-price"><span class="now-label">Now:</span><span>$424.99</span></div>
                                                                                            <div class="after-price">after $325 coupon</div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="slide slide-visible" style="width: 1.66667%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;">
                                                                                <div class="swiper-slide">
                                                                                    <div class="item-root-XLH product-content"><a class="item-images-yv2 product-image" href="/breitling-endurance-pro-black-dial-mens-watch-x82310d91b1s1.html"><img src="https://cdn2.jomashop.com/media/catalog/product/cache/df24c858758eb768757877f23cd17493/b/r/breitling-endurance-pro-chronograph-quartz-black-dial-mens-watch-x82310d91b1s1.jpg" alt="Breitling Endurance Pro Chronograph Quartz Black Dial Men's Watch X82310D91B1S1" width="250" height="250" class="product-img" loading="lazy" draggable="false"></a><a class="item-name-LrP product-name" href="/breitling-endurance-pro-black-dial-mens-watch-x82310d91b1s1.html"><span class="brand-name">Breitling </span><span title="Endurance Pro Chronograph Quartz Black Dial Men's Watch X82310D91B1S1">Endurance
                                                                                                Pro Chronograph Quartz Black Dial Men's Watch X82310D91B1S1</span></a>
                                                                                        <div class="price-wrapper trending">
                                                                                            <div class="was-price-wrapper">
                                                                                                <div class="was-wrapper"><span class="was-label">Was:</span><span>$2,545.00</span></div><span class="discount-value ">30% Off</span>
                                                                                            </div>
                                                                                            <div class="now-price"><span class="now-label">Now:</span><span>$2,395.00</span></div>
                                                                                            <div class="after-price">after $150 coupon</div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="slide slide-current slide-visible" style="width: 1.66667%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;">
                                                                                <div class="swiper-slide">
                                                                                    <div class="item-root-XLH product-content"><a class="item-images-yv2 product-image" href="/tissot-watch-t035-407-16-051-03.html"><img src="./img/watches/baume2.jpg" width="250" height="250" class="product-img" loading="lazy" draggable="false"></a><a class="item-name-LrP product-name" href="/tissot-watch-t035-407-16-051-03.html"><span class="brand-name">Tissot </span><span title="Couturier Automatic Black Dial Men's Watch T035.407.16.051.03">Couturier
                                                                                                Automatic Black Dial Men's Watch T035.407.16.051.03</span></a>
                                                                                        <div class="price-wrapper trending">
                                                                                            <div class="now-price"><span>$299.00</span><span class="discount-value show-red">59% Off</span></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="slide slide-visible" style="width: 1.66667%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;">
                                                                                <div class="swiper-slide">
                                                                                    <div class="item-root-XLH product-content"><a class="item-images-yv2 product-image" href="/ice-watch-ice-steel-gold-blue-medium-ch-chronograph-quartz-blue-dial-unisex-watch-017674.html"><img src="https://cdn2.jomashop.com/media/catalog/product/cache/df24c858758eb768757877f23cd17493/i/c/icewatch-chronograph-quartz-blue-dial-goldtone-unisex-watch-017674.jpg" alt="Ice-Watch Chronograph Quartz Blue Dial Men's Watch 017674" width="250" height="250" class="product-img" loading="lazy" draggable="false"></a><a class="item-name-LrP product-name" href="/ice-watch-ice-steel-gold-blue-medium-ch-chronograph-quartz-blue-dial-unisex-watch-017674.html"><span class="brand-name">Ice-Watch </span><span title="Chronograph Quartz Blue Dial Men's Watch 017674">Chronograph
                                                                                                Quartz Blue Dial Men's Watch 017674</span></a>
                                                                                        <div class="price-wrapper trending">
                                                                                            <div class="was-price-wrapper">
                                                                                                <div class="was-wrapper"><span class="was-label">Was:</span><span>$88.88</span></div><span class="discount-value ">92% Off</span>
                                                                                            </div>
                                                                                            <div class="now-price"><span class="now-label">Now:</span><span>$28.88</span></div>
                                                                                            <div class="after-price">after $60 coupon</div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="slide slide-visible" style="width: 1.66667%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;">
                                                                                <div class="swiper-slide">
                                                                                    <div class="item-root-XLH product-content"><a class="item-images-yv2 product-image" href="/luminox-bear-grylls-x-tide-limited-quartz-blue-dial-mens-watch-xb-3703-c.html"><img src="https://cdn2.jomashop.com/media/catalog/product/cache/df24c858758eb768757877f23cd17493/l/u/luminox-bear-grylls-x-tide-limited-quartz-blue-dial-mens-watch-xb3703c-xb3703c.jpg" alt="Luminox Bear Grylls x Tide Limited Quartz Blue Dial Men's Watch XB.3703.C" width="250" height="250" class="product-img" loading="lazy" draggable="false"></a><a class="item-name-LrP product-name" href="/luminox-bear-grylls-x-tide-limited-quartz-blue-dial-mens-watch-xb-3703-c.html"><span class="brand-name">Luminox </span><span title="Bear Grylls x Tide Limited Quartz Blue Dial Men's Watch XB.3703.C">Bear
                                                                                                Grylls x Tide Limited Quartz Blue Dial Men's Watch XB.3703.C</span></a>
                                                                                        <div class="price-wrapper trending">
                                                                                            <div class="now-price"><span>$198.00</span><span class="discount-value show-red">60% Off</span></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="slide slide-visible" style="width: 1.66667%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;">
                                                                                <div class="swiper-slide">
                                                                                    <div class="item-root-XLH product-content"><a class="item-images-yv2 product-image" href="/salvatore-ferragamo-chronograph-legacy-quartz-white-mother-of-pearl-dial-watch-sfmw00322.html"><img src="https://cdn2.jomashop.com/media/catalog/product/cache/df24c858758eb768757877f23cd17493/s/a/salvatore-ferragamo-chronograph-legacy-quartz-white-mother-of-pearl-dial-watch-sfmw00322.jpg" alt="Salvatore Ferragamo Chronograph Legacy Quartz White Mother of Pearl Dial Watch SFMW00322" width="250" height="250" class="product-img" loading="lazy" draggable="false"></a><a class="item-name-LrP product-name" href="/salvatore-ferragamo-chronograph-legacy-quartz-white-mother-of-pearl-dial-watch-sfmw00322.html"><span class="brand-name">Salvatore Ferragamo </span><span title="Chronograph Legacy Quartz White Mother of Pearl Dial Watch SFMW00322">Chronograph
                                                                                                Legacy Quartz White Mother of Pearl Dial Watch SFMW00322</span></a>
                                                                                        <div class="price-wrapper trending">
                                                                                            <div class="was-price-wrapper">
                                                                                                <div class="was-wrapper"><span class="was-label">Was:</span><span>$749.99</span></div><span class="discount-value ">72% Off</span>
                                                                                            </div>
                                                                                            <div class="now-price"><span class="now-label">Now:</span><span>$424.99</span></div>
                                                                                            <div class="after-price">after $325 couponsdkfhkdsfhkdshf</div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="slide slide-visible" style="width: 1.66667%; flex: 1 1 0%; height: auto; padding: 0px; opacity: 1;">
                                                                                <div class="swiper-slide">
                                                                                    <div class="item-root-XLH product-content"><a class="item-images-yv2 product-image" href="/breitling-endurance-pro-black-dial-mens-watch-x82310d91b1s1.html"><img src="https://cdn2.jomashop.com/media/catalog/product/cache/df24c858758eb768757877f23cd17493/b/r/breitling-endurance-pro-chronograph-quartz-black-dial-mens-watch-x82310d91b1s1.jpg" alt="Breitling Endurance Pro Chronograph Quartz Black Dial Men's Watch X82310D91B1S1" width="250" height="250" class="product-img" loading="lazy" draggable="false"></a><a class="item-name-LrP product-name" href="/breitling-endurance-pro-black-dial-mens-watch-x82310d91b1s1.html"><span class="brand-name">Breitling </span><span title="Endurance Pro Chronograph Quartz Black Dial Men's Watch X82310D91B1S1">Endurance
                                                                                                Pro Chronograph Quartz Black Dial Men's Watch X82310D91B1S1</span></a>
                                                                                        <div class="price-wrapper trending">
                                                                                            <div class="was-price-wrapper">
                                                                                                <div class="was-wrapper"><span class="was-label">Was:</span><span>$2,545.00</span></div><span class="discount-value ">30% Off</span>
                                                                                            </div>
                                                                                            <div class="now-price"><span class="now-label">Now:</span><span>$2,395.00</span></div>
                                                                                            <div class="after-price">after $150 coupon</div>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div></div>
                        </div>
                    </div>
                    <div class="row-contained-EzA usp-block">
                        <div style="display: flex; justify-content: flex-start; flex-direction: column;">
                            <div class="">
                                <div class="row-root-SkX usp-wrapper" style="background-color: rgb(83, 95, 110); border-style: none; border-image: initial; display: flex; justify-content: flex-start; flex-direction: column;">
                                    <div class="columnGroup-root-Q2r" style="display: flex;">
                                        <div class="column-root-k2m pagebuilder-column" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; width: 33.3333%;">
                                            <h2 class="headline" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;">
                                                ASSURANCE OF BUYING
                                            </h2>
                                            <h3 class="sub-headline"
                                                style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;">
                                                AUTHENTICITY GUARANTEED
                                            </h3>
                                            <div class="buttons-root-nkA buttons-inline-zrH links"
                                                style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; justify-content: flex-start;">
                                                <div>
                                                    <button priority="low" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;">
                                                        Find out more
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column-root-k2m pagebuilder-column" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; width: 33.3333%;">
                                            <h2 class="headline" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;">
                                                JOMASHOP PROMISE
                                            </h2>
                                            <h3 class="sub-headline" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;">
                                                WARRANTY INCLUDED
                                            </h3>
                                            <div class="buttons-root-nkA buttons-inline-zrH links"
                                                style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; justify-content: flex-start;">
                                                <div>
                                                    <button priority="low" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;">
                                                        Find out more
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column-root-k2m pagebuilder-column" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; width: 33.3333%;">
                                            <h2 class="headline" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;">
                                                EXPERT GUIDANCE
                                            </h2>
                                            <h3 class="sub-headline" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;">
                                                FAST &amp; EASY RETURNS
                                            </h3>
                                            <div class="buttons-root-nkA buttons-inline-zrH links" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; justify-content: flex-start;">
                                                <div>
                                                    <button priority="low" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;"> 
                                                        Find out more
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
                                        <style>
                                            .tw-2023-trust-since-1999 * {
                                                font-family: "Inter";
                                            }


                                            .tw-2023-trust-since-1999 {
                                                max-width: 100%;
                                                border-top: 1px solid rgba(0, 0, 0, 0.1);
                                            }

                                            .trust-since-content {
                                                padding: 50px 16px;
                                                flex-direction: column;
                                                gap: 8px;
                                                display: flex;
                                            }

                                            .trust-since-content .trust-item {
                                                display: flex;
                                                gap: 23px;
                                                align-items: center;
                                                cursor: pointer;
                                            }

                                            .trust-since-content .trust-item img {
                                                width: 60px;
                                                height: 60px;
                                                flex-shrink: 0;
                                                object-fit: cover;
                                            }

                                            .trust-since-content .trust-item p {
                                                font-size: 16px;
                                                line-height: 21px;
                                                color: #000000;
                                                margin: 0;
                                                text-align: left;
                                            }

                                            @media screen and (min-width: 768px) {
                                                .trust-since-content {
                                                padding: 50px 10px;
                                                gap: 16px;
                                                display: grid;
                                                grid-template-columns: repeat(4, 1fr);
                                                }

                                                .trust-since-content .trust-item {
                                                gap: 0;
                                                }

                                                .trust-since-content .trust-item p {
                                                margin-left: 20px;
                                                }

                                                .trust-since-content .trust-item img {
                                                width: 90px;
                                                height: 90px;
                                                }
                                            }

                                            @media screen and (min-width: 1024px) {
                                                .trust-since-content {
                                                padding: 50px 10px;
                                                }
                                            }

                                            /* The Modal (background) */
                                            .modal-trust {
                                                display: none;
                                                /* Hidden by default */
                                                position: fixed;
                                                /* Stay in place */
                                                z-index: 1;
                                                /* Sit on top */
                                                padding-top: 20px;
                                                padding-bottom: 20px;
                                                left: 0;
                                                top: 0;
                                                width: 100%;
                                                /* Full width */
                                                height: 100%;
                                                /* Full height */
                                                overflow: auto;
                                                /* Enable scroll if needed */
                                                background-color: rgb(0, 0, 0);
                                                /* Fallback color */
                                                background-color: rgba(0, 0, 0, 0.4);
                                                /* Black w/ opacity */
                                                z-index: 9999;
                                            }

                                            /* Modal Content */
                                            .modal-trust .modal-content {
                                                position: relative;
                                                background-color: #fefefe;
                                                margin: auto;
                                                padding: 0;
                                                border: 1px solid #888;
                                                width: 80%;
                                                max-width: 800px;
                                                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1),
                                                0 6px 20px 0 rgba(80, 62, 62, 0.1);
                                                -webkit-animation-name: animatemodal;
                                                -webkit-animation-duration: 0.4s;
                                                animation-name: animatemodal;
                                                animation-duration: 0.4s;
                                                padding: 70px;
                                                border-radius: 10px;

                                            }

                                            .modal-trust .trust-close {
                                                position: absolute;
                                                top: 30px;
                                                right: 30px;
                                                z-index: 1;
                                                cursor: pointer;
                                            }

                                            .modal-trust .modal-header {
                                                padding: 0;
                                            }

                                            .modal-trust .title {
                                                font-size: 32px;
                                                font-family: "Inter";
                                                font-weight: 600;
                                                line-height: 120%;
                                                color: #000;
                                                margin-top: 0;
                                                margin-bottom: 30px;
                                                text-align: left;
                                            }

                                            .modal-trust .tabs {
                                                display: flex;
                                                align-items: center;
                                                border-bottom: 1px solid rgba(0, 0, 0, 0.1);
                                                padding-bottom: 12px;
                                                clear: both;
                                            }

                                            .modal-trust .tabs-wrapper {
                                                overflow-y: hidden;
                                                overflow-x: auto;
                                                clear: both;
                                            }

                                            .modal-trust .tabs-wrapper::-webkit-scrollbar {
                                                width: 0;
                                                height: 0;
                                            }

                                            .modal-trust .tabs-wrapper::-webkit-scrollbar-track {
                                                background: transparent;
                                            }

                                            .modal-trust .tabs-wrapper::-webkit-scrollbar-thumb {
                                                background: transparent;
                                            }

                                            .modal-trust .tabs .tablinks {
                                                position: relative;
                                                font-size: 16px;
                                                font-family: "Inter";
                                                font-weight: 600;
                                                line-height: 130%;
                                                margin-right: 25px;
                                                color: rgba(0, 0, 0, 0.5);
                                                background: transparent;
                                                border: none;
                                                padding: 0;
                                                cursor: pointer;
                                                min-width: auto;
                                                white-space: nowrap;
                                            }

                                            .modal-trust .tabs .tablinks::after {
                                                content: "";
                                                position: absolute;
                                                width: 100%;
                                                height: 3px;
                                                background-color: #000;
                                                bottom: -13px;
                                                left: 0;
                                                display: none;
                                            }

                                            .modal-trust .tabs .tablinks.active {
                                                color: #000;
                                            }

                                            .modal-trust .tabs .tablinks.active::after {
                                                display: block;
                                            }

                                            .modal-trust .tabcontent {
                                                display: none;
                                                padding: 20px 0 0;
                                                text-align: left;
                                            }

                                            .modal-trust .tabcontent.active {
                                                display: block;
                                            }

                                            .modal-trust .tabcontent img {
                                                max-width: 100%;
                                            }

                                            .modal-trust .tabcontent p {
                                                font-size: 16px;
                                                font-family: "Inter";
                                                line-height: 130%;
                                                color: #000;
                                                margin-bottom: 0;
                                            }

                                            .modal-trust .tabcontent iframe {
                                                width: 100%;
                                                height: 380px;
                                                margin-bottom: 10px;
                                                margin-top: 10px;
                                            }

                                            /* Add Animation */
                                            @-webkit-keyframes animatemodal {
                                                from {
                                                opacity: 0;
                                                }

                                                to {
                                                top: 0;
                                                opacity: 1;
                                                }
                                            }

                                            /* Mobile view */
                                            @media (max-width: 767px) {
                                                .modal-trust {
                                                padding-top: 0;
                                                padding-bottom: 0;
                                                }

                                                .modal-trust .modal-content {
                                                padding: 50px 16px;
                                                width: 100%;
                                                height: 100%;
                                                border-radius: 0px;
                                                overflow: visible;
                                                border: 1px solid transparent;
                                                }

                                                .modal-trust .tabcontent iframe {
                                                width: 100%;
                                                height: 200px;
                                                max-width: 100%;
                                                }

                                                .modal-trust .trust-close {
                                                top: 16px;
                                                right: 16px;
                                                }

                                                .modal-trust .title {
                                                font-size: 26px;
                                                margin-bottom: 25px;
                                                }

                                                .modal-trust .tabs .tablinks {
                                                font-size: 14px;
                                                }

                                                .modal-trust .tabcontent p {
                                                font-size: 14px;
                                                }
                                            }
                                        </style>
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