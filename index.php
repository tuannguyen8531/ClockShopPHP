<!DOCTYPE html>
<html lang="en">
<?php 
    include 'config.php';


    session_start();

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
        WHERE watches.id LIKE ? OR watches.id LIKE ? OR watches.id LIKE ? OR watches.id LIKE ?';
    $stmt = $conn->prepare($sqlFeaturedDailyDeals);
    $stmt->bind_param('iiii', $ramdomDisplay[0], $ramdomDisplay[1], $ramdomDisplay[2], $ramdomDisplay[3]);
    $stmt->execute();
    $result = $stmt->get_result();

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
    <link rel="stylesheet" type="text/css" href="./dist/css/1882.d22b2a4d319f5798c600.initial.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/1634.1a661808a4dbdbef312c.initial.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/3482.0051ec8bf96fa0b92067.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/591.af82319651e53c8c3f1a.bundle.css">

    <link rel="stylesheet" type="text/css" href="./dist/css/1312.31d6cfe0d16ae931b73c.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/5531.2501ef6314da696e9b86.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/2557.53c4e93c6ec21bc19e7c.bundle.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/9695.0508d067424b8b31465c.bundle.css">
   
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
    
</head>
<body id="body" >
    <div id="root" data-react-rendered="true" class="home-page">
        <div class="Main" data-render-context="lazy">
            <?php include 'header.php' ?>
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
                                                    <a href="./list.php?gender=1">
                                                        <img loading="lazy" alt="watches for men" src="./img/catalog/mens.png" title="watches for men" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;" width="150" height="150">
                                                    </a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px; justify-content: flex-start;">
                                                    <div><button priority="high" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;" onclick="location.href = './list.php?gender=1'">Men's Watches</button></div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column departments-circle-wrapper" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; padding: 5px 10px 33px; text-align: center; width: 16.6667%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="./list.php?gender=0">
                                                        <img loading="lazy" alt="watches for women" src="./img/catalog/ladies.png" title="watches for women" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0;" width="150" height="150">
                                                    </a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding-bottom: 0px; justify-content: flex-start;">
                                                    <div><button priority="high" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;" onclick="location.href = './list.php?gender=0'">Ladies Watches</button></div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column departments-circle-wrapper" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; padding: 5px 10px 33px; text-align: center; width: 16.6667%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="./error404.php">
                                                        <img loading="lazy" alt="sunglasses" src="./img/catalog/sunglasses.png" title="sunglasses" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;" width="150" height="150">
                                                    </a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding-bottom: 0px; justify-content: flex-start;">
                                                    <div><button priority="high" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;">Sunglasses</button></div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column departments-circle-wrapper" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; padding: 5px 10px 33px; text-align: center; width: 16.6667%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="./error404.php">
                                                        <img loading="lazy" alt="handbag accessories" src="./img/catalog/handbags_round_150.png" title="handbag accessories" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0;" width="150" height="150">
                                                    </a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding-bottom: 0px; justify-content: flex-start;">
                                                    <div><button priority="high" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;">Handbags</button></div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column departments-circle-wrapper" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; padding: 5px 10px 33px; text-align: center; width: 16.6667%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="./error404.php">
                                                        <img loading="lazy" alt="luxury pends" src="./img/catalog/pens_round_150.png" title="luxury pends" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;" width="150" height="150">
                                                    </a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding-bottom: 0px; justify-content: flex-start;">
                                                    <div><button priority="high" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;">Luxury Pens</button></div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column departments-circle-wrapper" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; padding: 5px 10px 33px; text-align: center; width: 16.6667%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="./error404.php">
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
                                                    <a href="./error404.php">
                                                        <img loading="lazy" alt="jewelry" src="./img/catalog/jewelry_round_150.png" title="jewelry" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;" width="150" height="150">
                                                    </a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding-bottom: 0px; justify-content: flex-start;">
                                                    <div><button priority="high" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;">Jewelry</button></div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column departments-circle-wrapper" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; padding: 5px 10px 33px; text-align: center; width: 16.6667%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="./error404.php">
                                                        <img loading="lazy" alt="accessories" src="./img/catalog/accessories_round_150.png" title="accessories" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;" width="150" height="150">
                                                    </a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding-bottom: 0px; justify-content: flex-start;">
                                                    <div><button priority="high" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;">Accessories</button></div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column departments-circle-wrapper" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; padding: 5px 10px 33px; text-align: center; width: 16.6667%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="./error404.php">
                                                        <img loading="lazy" alt="apparel" src="./img/catalog/outerwear_round_150.png" title="apparel" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;" width="150" height="150">
                                                    </a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding-bottom: 0px; padding-left: 0px; justify-content: flex-start;">
                                                    <div><button priority="high" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;">Apparel</button></div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column departments-circle-wrapper" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; padding: 5px 10px 33px; text-align: center; width: 16.6667%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="./error404.php">
                                                        <img loading="lazy" alt="shoes" src="./img/catalog/shoes_round_150.png" title="shoes" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px;" width="150" height="150">
                                                    </a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding-bottom: 0px; justify-content: flex-start;">
                                                    <div><button priority="high" type="button" class="btn btn-primary" style="text-align: center; justify-content: center;">Shoes</button></div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column departments-circle-wrapper" style="align-self: stretch; border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; padding: 5px 10px 33px; text-align: center; width: 16.6667%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="./error404.php">
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
                                                <?php
                                                    $sqlBrands = 'SELECT *, SUM(view) AS total
                                                    FROM brands
                                                    INNER JOIN watches ON brands.brandId = watches.brand
                                                    GROUP BY brands.brandName
                                                    ORDER BY total DESC
                                                    LIMIT 9';
                                                    $stmt = $conn->prepare($sqlBrands);
                                                    $stmt->execute();
                                                    $resultBrands = $stmt->get_result();
                                                ?>
                                                <?php while($brand = $resultBrands->fetch_assoc()) { ?>
                                                    <a href="./list.php?brand=<?= $brand['brandId'] ?>" class="popular-item"><?= $brand['brandName'] ?></a>
                                                <?php } ?>
                                                <a href="./error404.php" class="popular-item popular-active">SHOW ALL BRANDS</a>
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
                                                    <a href="./list.php?gender=1"><img loading="lazy" alt="watches" src="./img/catalog/mens.png" title="watches"></a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH buttons" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px; justify-content: flex-start;">
                                                    <div>
                                                        <button priority="low" type="button" class="btn btn-primary" style="text-align: center; padding: 10px; justify-content: center;" onclick="location.href = './list.php?gender=1'">Men's Watches</button>
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
                                                    <a href="./list.php?gender=0"><img loading="lazy" alt="Watches for women" src="./img/catalog/ladies.png" title="Watches for women"></a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH buttons" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px; justify-content: flex-start;">
                                                    <div>
                                                        <button priority="low" type="button" class="btn btn-primary" style="text-align: center; padding: 10px; justify-content: center;" onclick="location.href = './list.php?gender=0'">Ladies Watches</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column department" style="align-self: stretch; border-style: solid; border-image: initial; display: flex; flex-direction: column; justify-content: center; text-align: left; width: 50%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="./error404.php"><img loading="lazy" alt="sunglasses" src="./img/catalog/sunglasses.png" title="preowned"></a>
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
                                                    <a href="./error404.php"><img loading="lazy" alt="beauty" src="./img/catalog/beauty_round_150.png" title="beauty"></a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH buttons" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px; justify-content: flex-start;">
                                                    <div>
                                                        <button priority="low" type="button" class="btn btn-primary" style="text-align: center; padding: 10px; justify-content: center;">Fragrances</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column department" style="align-self: stretch; border-style: solid; border-image: initial; display: flex; flex-direction: column; justify-content: center; text-align: left; width: 50%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="./error404.php"><img loading="lazy" alt="wallets" src="./img/catalog/accessories_round_150.png" title="wallets"></a>
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
                                                    <a href="./error404.php"><img loading="lazy" alt="handbags" src="./img/catalog/handbags_round_150.png" title="handbags"></a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH buttons" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px; justify-content: flex-start;">
                                                    <div>
                                                        <button priority="low" type="button" class="btn btn-primary" style="text-align: center; padding: 10px; justify-content: center;">Handbags</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column department" style="align-self: stretch; border-style: solid; border-image: initial; display: flex; flex-direction: column; justify-content: center; text-align: left; width: 50%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="./error404.php"><img loading="lazy" alt="jewelry" src="./img/catalog/jewelry_round_150.png" title="jewelry"></a>
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
                                                    <a href="./error404.php"><img loading="lazy" alt="outerwear" src="./img/catalog/outerwear_round_150.png" title="outerwear"></a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH buttons" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px; justify-content: flex-start;">
                                                    <div>
                                                        <button priority="low" type="button" class="btn btn-primary" style="text-align: center; padding: 10px; justify-content: center;">Apparel</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column department" style="align-self: stretch; border-style: solid; border-image: initial; display: flex; flex-direction: column; justify-content: center; text-align: left; width: 50%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="./error404.php"><img loading="lazy" alt="shoes" src="./img/catalog/shoes_round_150.png" title="shoes"></a>
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
                                                    <a href="./error404.php"><img loading="lazy" alt="pens" src="./img/catalog/pens_round_150.png" title="pens"></a>
                                                </div>
                                                <div class="buttons-root-nkA buttons-inline-zrH buttons" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px; justify-content: flex-start;">
                                                    <div>
                                                        <button priority="low" type="button" class="btn btn-primary" style="text-align: center; padding: 10px; justify-content: center;">Luxury Pens</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column-root-k2m pagebuilder-column department" style="align-self: stretch; border-style: solid; border-image: initial; display: flex; flex-direction: column; justify-content: center; text-align: left; width: 50%;">
                                                <div class="" style="border-width: 1px; border-style: none; border-image: initial; border-radius: 0px; margin: 0px; padding: 0px;">
                                                    <a href="./error404.php"><img loading="lazy" alt="preowned" src="./img/catalog/preowned_round_150.png" title="preowned"></a>
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
                                                    <?php while($featuredDeals = $result->fetch_assoc()) { ?>
                                                    <li data-content-type="product-daily-deails">
                                                        <a href="./detail.php?model=<?= $featuredDeals['model'] ?>">
                                                            <img width="300" height="300" loading="lazy" src="./img/watches/<?php echo $featuredDeals['img1'] ?>" alt="<?= $featuredDeals['brandName'] ?>">
                                                            <span class="product-name">
                                                                <b><?php echo $featuredDeals['brandName'] ?></b>
                                                                <?php echo $featuredDeals['name'] ?>
                                                            </span>
                                                            <div class="price-wrapper">
                                                                <div class="was-price-wrapper">
                                                                    <span class="was-wrapper">
                                                                        Was:
                                                                        <span class="convert-currency">
                                                                            $<?php
                                                                                $was = $featuredDeals['price'] / (1 - ($featuredDeals['sale'] / 100));
                                                                                $was = number_format($was, 2, '.', '');
                                                                                echo $was;
                                                                            ?>
                                                                        </span>
                                                                    </span>
                                                                    <span class="discount-value ">
                                                                        <?php echo $featuredDeals['sale'] ?>% Off </span>
                                                                </div>
                                                                <div class="now-price">
                                                                    Now:
                                                                    <span class="convert-currency">$<?php echo $featuredDeals['price'] ?></span>
                                                                </div>
                                                                <div class="after-price">
                                                                    after
                                                                    <span class="convert-currency">
                                                                        $<?php
                                                                            $coupon1 = $was - $featuredDeals['price'];
                                                                            echo $coupon1;
                                                                        ?>
                                                                    </span>
                                                                    coupon
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <?php } ?>
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
                                                                                                <img src="./img/watches/<?= $trendingRow['img1'] ?>" alt="<?= $trendingRow['name'] ?>" width="250" height="250" class="product-img" loading="lazy" draggable="false">
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
                                                                                <img src="./img/watches/<?= $trendingRow['img1'] ?>" alt="<?= $trendingRow['name'] ?>" width="250" height="250" class="product-img" loading="lazy">
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
            <?php include 'footer.php' ?>
        </div>
    </div>
    <script type="text/javascript" src="./dist/js/config.js"></script>
    <script type="text/javascript" src="./dist/js/modal.js"></script>
</body>
</html>