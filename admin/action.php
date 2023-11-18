<?php
    include '../config.php';
    if($_GET['act']=='accept') {
        $sql = 'UPDATE bills SET
            billManager = ?,
            billStatus = 2
            WHERE billId = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ii', $_GET['man'], $_GET['id']);
        $stmt->execute();
    }

    if($_GET['act']=='cancel') {
        $sql = 'UPDATE bills SET
            billManager = ?,
            billStatus = 5
            WHERE billId = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ii', $_GET['man'], $_GET['id']);
        $stmt->execute();
    }
    
    header('location: bill_accept.php');
?>