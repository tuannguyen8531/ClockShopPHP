<?php 
      include 'config.php';
      session_start();

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $watchId = $_POST['watchId'];
            $increment = $_POST['increment'];
            $decrement = $_POST['decrement'];
            $checkExit=true;

                if( isset($_SESSION['customer'])) {
                    
                    $sqlCartId = 'SELECT * FROM carts 
                    JOIN customers ON carts.cartCustomerId = customers.cusId
                    WHERE customers.cusEmail LIKE ?';
                    $stmt = $conn->prepare($sqlCartId);
                    $stmt->bind_param('s', $_SESSION['customer']);
                    $stmt->execute();
                    $cartId = $stmt->get_result()->fetch_assoc()['cartId'];

                    if(isset($increment) and $increment==1){
                        $updateCartDetail = "UPDATE cartdetails 
                        SET watchQuanlity = watchQuanlity + 1 
                        WHERE cartId = ? AND watchId = ?";
                        $stmt = $conn->prepare($updateCartDetail);
                        $stmt->bind_param('ii', $cartId, $watchId);
                        $stmt->execute();
                    } 

                    if(isset($decrement) and $decrement==1){
                        $sqlQuanlity = 'SELECT * FROM cartdetails
                        WHERE cartId = ? AND watchId = ?';
                        $stmt = $conn->prepare($sqlQuanlity);
                        $stmt->bind_param('ii', $cartId, $watchId);
                        $stmt->execute();
                        $watchQuanlity = $stmt->get_result()->fetch_assoc()['watchQuanlity'];

                        if($watchQuanlity>=2){  
                            $updateCartDetail = "UPDATE cartdetails 
                            SET watchQuanlity = watchQuanlity - 1 
                            WHERE cartId = ? AND watchId = ?";
                            $stmt = $conn->prepare($updateCartDetail);
                            $stmt->bind_param('ii', $cartId, $watchId);
                            $stmt->execute();         
                        } 
                    } 
                    if ($checkExit) {
                        $sqlQuanlity = 'SELECT * FROM cartdetails
                        WHERE cartId = ? AND watchId = ?';
                        $stmt = $conn->prepare($sqlQuanlity);
                        $stmt->bind_param('ii', $cartId, $watchId);
                        $stmt->execute();
                        echo $watchQuanlity = $stmt->get_result()->fetch_assoc()['watchQuanlity'];
                    } else {
                        echo "-1";
                    }        
 
    

                }

            
                // header("Refresh: 0; URL=detail.php");
            
            
      }
?>