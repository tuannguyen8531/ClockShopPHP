<!DOCTYPE html>
<html lang="en">
<?php 
    
    session_start();

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

        if(isset($_SESSION['customer'])) {
            if(isset($_POST['button-cart'])){
                $sqlCartId = 'SELECT * FROM carts 
                JOIN customers ON carts.cartCustomerId = customers.cusId
                WHERE customers.cusEmail LIKE ?';
                $stmt = $conn->prepare($sqlCartId);
                $stmt->bind_param('s', $_SESSION['customer']);
                $stmt->execute();
                $cartId = $stmt->get_result()->fetch_assoc()['cartId'];
                

                $checkExistence = "SELECT * FROM cartdetails WHERE cartId = ? AND watchId = ?";
                $stmt = $conn->prepare($checkExistence);
                $stmt->bind_param('ii', $cartId, $product['id']);
                $stmt->execute();
                $resultExistence = $stmt->get_result();
                $existence = $resultExistence->num_rows;

                if($existence==0){
                    $watchQuantity = 1;
                    $sqlAddToBag = 'INSERT INTO cartdetails(cartId,watchId,watchQuanlity)
                                    VALUES (?,?,?)';
                    $stmt = $conn->prepare($sqlAddToBag);
                    $stmt->bind_param('iii', $cartId, $product['id'], $watchQuantity);
                    $stmt->execute();
                }else{
                    $updateCartDetail = "UPDATE cartdetails 
                    SET watchQuanlity = watchQuanlity + 1 
                    WHERE cartId = ? AND watchId = ?";
                    $stmt = $conn->prepare($updateCartDetail);
                    $stmt->bind_param('ii', $cartId, $product['id']);
                    $stmt->execute();
                }
                // header("Refresh: 0; URL=detail.php");
            }
            
        }
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
<body id="body">
    <div id="root" data-react-rendered="true" class="home-page">
        <div class="Main" data-render-context="lazy">
            <?php include 'header.php' ?>
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
                                            <form action="" method="post">
                                            <button class="btn-new-design primary add-to-cart-btn" name="button-cart" id="add-to-cart-btn"><span>Add to Bag</span></button>
                                            </form>
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
                                    <div class="simple-slider-horizontal">
                                        <div class="arrow-carousal-new-design arrow-prev" id="more-prev"></div>
                                        <div class="arrow-carousal-new-design arrow-next" id="more-next"></div>
                                        <div class="simple-slider-wrapper simple-slider-wrapper-more">
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
                                <div class="slider-list-wrapper slider-grid-wrapper" id="item-list">
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
                                        <div class="product-content productItem productItem-also">
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
                            <div class="slider-list-wrapper slider-grid-wrapper" id="recent-list">
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
            <?php include 'footer.php' ?>
        </div>
    </div>
    <script type="text/javascript" src="./dist/js/detail.js"></script>
    <script type="text/javascript" src="./dist/js/modal.js"></script>
    
</body>
</html>