<!DOCTYPE html>
<html lang="en">
<?php
    include "config.php";
    session_start();

    $products_per_page = 8;
    if(isset($_GET['page']) && is_numeric($_GET['page'])){
        $current_page = intval($_GET['page']);
    }else{
        $current_page = 1;
    }
    // $query_count = "SELECT COUNT(*) as total FROM watches";
    // $result_count = $conn->query($query_count);
    // $row_count = $result_count->fetch_assoc();
    // $total_product = $row_count['total'];
    // $total_pages = ceil($total_product/$products_per_page);
    // $offset = ($current_page-1) * $products_per_page;
    // $max_links = 5;
    // $start = max(1,$current_page - floor($max_links/2));
    // $end = min($start + $max_links - 1, $total_pages);
    // $start = max(1, $end - $max_links + 1);

    $watch = 'SELECT * FROM watches
    JOIN brands ON watches.brand = brands.brandId
    JOIN styles ON watches.style = styles.styleId
    JOIN movements ON watches.movement = movements.moveId
    JOIN categories ON watches.category = categories.cateId
    JOIN features ON watches.features = features.feaId
    JOIN types ON watches.type = types.typeId
    JOIN caseshapes ON watches.caseShape = caseshapes.caseId
    WHERE (1=1) ';
    if(isset($_GET['gender'])) {
        $watch .= ' AND watches.gender =' . $_GET['gender'];
    }
    if(isset($_GET['style'])) {
        $watch .= ' AND watches.style =' . $_GET['style'];
    }
    if(isset($_GET['move'])) {
        $watch .= ' AND watches.movement =' . $_GET['move'];
    }
    if(isset($_GET['fea'])) {
        $watch .= ' AND watches.features =' . $_GET['fea'];
    }
    if(isset($_GET['case'])) {
        $watch .= ' AND watches.caseShape =' . $_GET['case'];
    }
    if(isset($_GET['type'])) {
        $watch .= ' AND watches.type =' . $_GET['type'];
    }
    if(isset($_GET['min'])) {
        $watch .= ' AND watches.caseSize >' . $_GET['min'] . ' AND watches.caseSize <' . $_GET['max'];
    }
    if(isset($_GET['brand'])) {
        $watch .= ' AND watches.brand LIKE ' . $_GET['brand'];
    }
    $numRows = $conn->query($watch)->num_rows;
    $offset = ($current_page-1) * $products_per_page;
    $watch .= ' ORDER BY watches.view DESC LIMIT ?,?';
    $stmt = $conn->prepare($watch);
    $stmt->bind_param("ii", $offset, $products_per_page);
    $stmt->execute();
    $result = $stmt->get_result();
    $maxPages = floor($numRows/$products_per_page) + 1;
    $max_links = 5;
    $start = max(1, $current_page - floor($max_links/2));
    $end = min($start + $max_links - 1, $maxPages);
    $start = max(1, $end - $max_links + 1);

    
    
    // if(isset($_GET['gender'])) {
    //     $watch = 'SELECT * FROM watches
    //     JOIN brands ON watches.brand = brands.brandId
    //     JOIN styles ON watches.style = styles.styleId
    //     JOIN movements ON watches.movement = movements.moveId
    //     JOIN categories ON watches.category = categories.cateId
    //     JOIN features ON watches.features = features.feaId
    //     JOIN types ON watches.type = types.typeId
    //     JOIN caseshapes ON watches.caseShape = caseshapes.caseId
    //     WHERE watches.gender = ? LIMIT ?,?';
    //     $stmt = $conn->prepare($watch);
    //     $stmt->bind_param("iii",$_GET['gender'], $offset, $products_per_page);
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     $query_count = "SELECT COUNT(id) AS total FROM watches WHERE gender = ?";
    //     $stmt = $conn->prepare($query_count);
    //     $stmt->bind_param("i",$_GET['gender']);
    //     $stmt->execute();
    //     $total_product = $stmt->get_result()->fetch_assoc()['total'];
    // }
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

<body id="body">
    <div id="root" data-react-rendered="true" class="plp-page">
        <div class="Main no-sticky" data-render-context="lazy">
            <?php include 'header.php' ?>
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
                                                <div class="accordion"><button role="tab" aria-selected="false" aria-expanded="false" type="button" class="expanded btn btn-link">
                                                        <div class="filter-head"><strong class="filter-name" role="heading" aria-level="2">Brand</strong>
                                                            <span class="expand-icon" wz_dt_ref="true"></span>
                                                        </div>
                                                    </button>
                                                    <div role="tabpanel" aria-hidden="true" aria-expanded="true" class="add_section collapse " style="">
                                                        <ul class="item-sub-cat style">
                                                            <?php
                                                                $sqlBrand = 'SELECT * FROM brands';
                                                                $brandRows = $conn->query($sqlBrand);
                                                            ?>
                                                            <?php while ($row = $brandRows->fetch_assoc()) { ?>
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="" id="" class="checkbox-input" aria-label="<?= $row['brandName'] ?>" <?= (isset($_GET['brand']) and $_GET['brand']==$row['brandId']) ? 'checked' : '' ?>>
                                                                <a href="./list.php<?= !(!isset($_GET['brand']) or $_GET['brand']!=$row['brandId']) ? '' : '?brand=' . $row['brandId'] ?>" class="label-checkbox"><?= $row['brandName'] ?></a>
                                                            </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="filter-gender">
                                                <div class="accordion">
                                                    <button role="tab" aria-selected="false" aria-expanded="false" type="button" class="expanded btn btn-link">
                                                        <div class="filter-head"><strong class="filter-name" role="heading" aria-level="2">Gender</strong><span class="expand-icon"></span></div>
                                                    </button>
                                                    <div role="tabpanel" aria-hidden="true" aria-expanded="true" class="add_section collapse " style="">
                                                        <ul class="item-sub-cat gender">
                                                            <li class="filter-item checkbox-new-design"><input type="checkbox" name="26" id="product_checkbox_26" class="checkbox-input" aria-label="Ladies" <?= (isset($_GET['gender']) and $_GET['gender']==0) ? 'checked' : '' ?>><a href="./list.php<?= !(!isset($_GET['gender']) or $_GET['gender']!=0) ? '' : '?gender=0' ?>" class="label-checkbox">Ladies</a></li>
                                                            <li class="filter-item checkbox-new-design"><input type="checkbox" name="25" id="product_checkbox_25" class="checkbox-input" aria-label="Men's" <?= (isset($_GET['gender']) and $_GET['gender']==1) ? 'checked' : '' ?>><a href="./list.php<?= !(!isset($_GET['gender']) or $_GET['gender']!=1) ? '' : '?gender=1' ?>" class="label-checkbox">Men's</a></li>
                                                            <li class="filter-item checkbox-new-design"><input type="checkbox" name="27" id="product_checkbox_27" class="checkbox-input" aria-label="Unisex" <?= (isset($_GET['gender']) and $_GET['gender']==2) ? 'checked' : '' ?>><a href="./list.php<?= !(!isset($_GET['gender']) or $_GET['gender']!=2) ? '' : '?gender=2' ?>" class="label-checkbox">Unisex</a>
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
                                                            <?php
                                                                $sqlStyle = 'SELECT * FROM styles';
                                                                $styleRows = $conn->query($sqlStyle);
                                                            ?>
                                                            <?php while ($row = $styleRows->fetch_assoc()) { ?>
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="" id="" class="checkbox-input" aria-label="<?= $row['styleName'] ?>" <?= (isset($_GET['style']) and $_GET['style']==$row['styleId']) ? 'checked' : '' ?>>
                                                                <a href="./list.php<?= !(!isset($_GET['style']) or $_GET['style']!=$row['styleId']) ? '' : '?style=' . $row['styleId'] ?>" class="label-checkbox"><?= $row['styleName'] ?></a>
                                                            </li>
                                                            <?php } ?>
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
                                                            <?php
                                                                $sqlMovement = 'SELECT * FROM movements';
                                                                $movementRows = $conn->query($sqlMovement);
                                                            ?>
                                                            <?php while ($row = $movementRows->fetch_assoc()) { ?>
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="" id="" class="checkbox-input" aria-label="<?= $row['moveName'] ?>" <?= (isset($_GET['move']) and $_GET['move']==$row['moveId']) ? 'checked' : '' ?>>
                                                                <a href="./list.php<?= !(!isset($_GET['move']) or $_GET['move']!=$row['moveId']) ? '' : '?move=' . $row['moveId'] ?>" class="label-checkbox"><?= $row['moveName'] ?></a>
                                                            </li>
                                                            <?php } ?>
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
                                                            <?php
                                                                $sqlfeature = 'SELECT * FROM features';
                                                                $featureRows = $conn->query($sqlfeature);
                                                            ?>
                                                            <?php while ($row = $featureRows->fetch_assoc()) { ?>
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="" id="" class="checkbox-input" aria-label="<?= $row['feaName'] ?>" <?= (isset($_GET['fea']) and $_GET['fea']==$row['feaId']) ? 'checked' : '' ?>>
                                                                <a href="./list.php<?= !(!isset($_GET['fea']) or $_GET['fea']!=$row['feaId']) ? '' : '?fea=' . $row['feaId'] ?>" class="label-checkbox"><?= $row['feaName'] ?></a>
                                                            </li>
                                                            <?php } ?>
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
                                                            <?php
                                                                $sqlcaseshape = 'SELECT * FROM caseshapes';
                                                                $caseshapeRows = $conn->query($sqlcaseshape);
                                                            ?>
                                                            <?php while ($row = $caseshapeRows->fetch_assoc()) { ?>
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="7" id="" class="checkbox-input" aria-label="<?= $row['caseName'] ?>" <?= (isset($_GET['case']) and $_GET['case']==$row['caseId']) ? 'checked' : '' ?>>
                                                                <a href="./list.php<?= !(!isset($_GET['case']) or $_GET['case']!=$row['caseId']) ? '' : '?case=' . $row['caseId'] ?>" class="label-checkbox"><?= $row['caseName'] ?></a>
                                                            </li>
                                                            <?php } ?>
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
                                                            <?php
                                                                $sqltype = 'SELECT * FROM types';
                                                                $typeRows = $conn->query($sqltype);
                                                            ?>
                                                            <?php while ($row = $typeRows->fetch_assoc()) { ?>
                                                            <li class="filter-item checkbox-new-design">
                                                                <input type="checkbox" name="" id="" class="checkbox-input" aria-label="<?= $row['typeName'] ?>" <?= (isset($_GET['type']) and $_GET['type']==$row['typeId']) ? 'checked' : '' ?>>
                                                                <a href="./list.php<?= !(!isset($_GET['type']) or $_GET['type']!=$row['typeId']) ? '' : '?type=' . $row['typeId'] ?>" class="label-checkbox"><?= $row['typeName'] ?></a>
                                                            </li>
                                                            <?php } ?>
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
                                                            <li class="filter-item checkbox-new-design"><input type="checkbox" name="" id="" class="checkbox-input" aria-label="20-25 mm" <?= (isset($_GET['min']) and $_GET['min']==20) ? 'checked' : '' ?>><a href="./list.php<?= !(!isset($_GET['min']) or $_GET['min']!=20) ? '' : '?min=20&max=25'?>" class="label-checkbox">20-25 mm</a></li>
                                                            <li class="filter-item checkbox-new-design"><input type="checkbox" name="" id="" class="checkbox-input" aria-label="25-30 mm" <?= (isset($_GET['min']) and $_GET['min']==25) ? 'checked' : '' ?>><a href="./list.php<?= !(!isset($_GET['min']) or $_GET['min']!=25) ? '' : '?min=25&max=30'?>" class="label-checkbox">25-30 mm</a></li>
                                                            <li class="filter-item checkbox-new-design"><input type="checkbox" name="" id="" class="checkbox-input" aria-label="30-35 mm" <?= (isset($_GET['min']) and $_GET['min']==30) ? 'checked' : '' ?>><a href="./list.php<?= !(!isset($_GET['min']) or $_GET['min']!=30) ? '' : '?min=30&max=35'?>" class="label-checkbox">30-35 mm</a></li>
                                                            <li class="filter-item checkbox-new-design"><input type="checkbox" name="" id="" class="checkbox-input" aria-label="35-40 mm" <?= (isset($_GET['min']) and $_GET['min']==35) ? 'checked' : '' ?>><a href="./list.php<?= !(!isset($_GET['min']) or $_GET['min']!=35) ? '' : '?min=35&max=40'?>" class="label-checkbox">35-40 mm</a></li>
                                                            <li class="filter-item checkbox-new-design"><input type="checkbox" name="" id="" class="checkbox-input" aria-label="40-45 mm" <?= (isset($_GET['min']) and $_GET['min']==40) ? 'checked' : '' ?>><a href="./list.php<?= !(!isset($_GET['min']) or $_GET['min']!=40) ? '' : '?min=40&max=45'?>" class="label-checkbox">40-45 mm</a></li>
                                                            <li class="filter-item checkbox-new-design"><input type="checkbox" name="" id="" class="checkbox-input" aria-label="45-50 mm" <?= (isset($_GET['min']) and $_GET['min']==45) ? 'checked' : '' ?>><a href="./list.php<?= !(!isset($_GET['min']) or $_GET['min']!=45) ? '' : '?min=45&max=50'?>" class="label-checkbox">45-50 mm</a></li>
                                                            <li class="filter-item checkbox-new-design"><input type="checkbox" name="" id="" class="checkbox-input" aria-label="50-55 mm" <?= (isset($_GET['min']) and $_GET['min']==50) ? 'checked' : '' ?>><a href="./list.php<?= !(!isset($_GET['min']) or $_GET['min']!=50) ? '' : '?min=50&max=55'?>" class="label-checkbox">50-55 mm</a></li>
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
                                        <div class="products-toolbar-filter"><span class="clp-count"><?= $numRows ?>
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
                                                        <img alt="<?= $row['name']?>" src="./img/watches/<?= $row['img2']==null ? $row['img1'] : $row['img2'] ?>" title="<?= $row['name']?>" class="productImg secondProductImg loaded">
                                                        <img alt="<?= $row['name']?>" src="./img/watches/<?= $row['img1']?>" title="<?= $row['name']?>" class="productImg firstProductImg">
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="product-details">
                                                <h2 class="productName"><a class="productName-link" title="<?= $row['name']?>" href="./detail.php?model=<?= $row['model'] ?>"><span class="brand-name"><?= $row['brandName']?></span><span class="name-out-brand"><?= $row['name']?></span></a></h2>
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
                                                <?php 
                                                    $linkPrev = 'list.php?&page=' . ($current_page - 1);
                                                    isset($_GET['gender']) ? $linkPrev .= '&gender=' . $_GET['gender'] : $linkPrev = $linkPrev;
                                                    isset($_GET['style']) ? $linkPrev .= '&style=' . $_GET['style'] : $linkPrev = $linkPrev;
                                                    isset($_GET['move']) ? $linkPrev .= '&move=' . $_GET['move'] : $linkPrev = $linkPrev;
                                                    isset($_GET['fea']) ? $linkPrev .= '&fea=' . $_GET['fea'] : $linkPrev = $linkPrev;
                                                    isset($_GET['case']) ? $linkPrev .= '&case=' . $_GET['case'] : $linkPrev = $linkPrev;
                                                    isset($_GET['type']) ? $linkPrev .= '&type=' . $_GET['type'] : $linkPrev = $linkPrev;
                                                    isset($_GET['type']) ? $linkPrev .= '&min=' . $_GET['min'] . '&max=' . $_GET['max'] : $linkPrev = $linkPrev;
                                                    isset($_GET['brand']) ? $linkPrev .= '&brand=' . $_GET['brand'] : $linkPrev = $linkPrev;
                                                    
                                                ?>
                                                <a class="page-link" href="<?= $linkPrev ?>">
                                                    <span aria-hidden="true">&lt;</span>
                                                    <span class="sr-only">Prev</span>
                                                </a>
                                            </li>
                                        <?php } ?>

                                        <?php for ($page = $start; $page <= $end; $page++) { ?>
                                            <li class="page-item <?= ($page == $current_page) ? 'active' : '' ?>">
                                                <?php 
                                                    $link = 'list.php?&page=' . $page;
                                                    isset($_GET['gender']) ? $link .= '&gender=' . $_GET['gender'] : $link = $link;
                                                    isset($_GET['style']) ? $link .= '&style=' . $_GET['style'] : $link = $link;
                                                    isset($_GET['move']) ? $link .= '&move=' . $_GET['move'] : $link = $link;
                                                    isset($_GET['fea']) ? $link .= '&fea=' . $_GET['fea'] : $link = $link;
                                                    isset($_GET['case']) ? $link .= '&case=' . $_GET['case'] : $link = $link;
                                                    isset($_GET['type']) ? $link .= '&type=' . $_GET['type'] : $link = $link;
                                                    isset($_GET['type']) ? $link .= '&min=' . $_GET['min'] . '&max=' . $_GET['max'] : $link = $link;
                                                    isset($_GET['brand']) ? $link .= '&brand=' . $_GET['brand'] : $link = $link;
                                                ?>
                                                <a class="page-link" href="<?= $link ?>">
                                                    <span class="pagination-text"><?= $page ?></span>
                                                    <?php if ($page == $current_page) { ?>
                                                        <span class="sr-only">(current)</span>
                                                    <?php } ?>
                                                </a>
                                            </li>
                                        <?php } ?>

                                        <?php if ($current_page < $maxPages) { ?>
                                            <li class="pagination-next page-item">
                                                <?php 
                                                    $linkNext = 'list.php?&page=' . ($current_page + 1);
                                                    isset($_GET['gender']) ? $linkNext .= '&gender=' . $_GET['gender'] : $linkNext = $linkNext;
                                                    isset($_GET['style']) ? $linkNext .= '&style=' . $_GET['style'] : $linkNext = $linkNext;
                                                    isset($_GET['move']) ? $linkNext .= '&move=' . $_GET['move'] : $linkNext = $linkNext;
                                                    isset($_GET['fea']) ? $linkNext .= '&fea=' . $_GET['fea'] : $linkNext = $linkNext;
                                                    isset($_GET['case']) ? $linkNext .= '&case=' . $_GET['case'] : $linkNext = $linkNext;
                                                    isset($_GET['type']) ? $linkNext .= '&type=' . $_GET['type'] : $linkNext = $linkNext;
                                                    isset($_GET['type']) ? $linkNext .= '&min=' . $_GET['min'] . '&max=' . $_GET['max'] : $linkNext = $linkNext;
                                                    isset($_GET['brand']) ? $linkNext .= '&brand=' . $_GET['brand'] : $linkNext = $linkNext;
                                                ?>
                                                <a class="page-link" href="<?= $linkNext ?>">
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
            <?php include 'footer.php' ?>
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