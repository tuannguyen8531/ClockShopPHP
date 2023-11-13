<?php 
    include 'config.php';
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $emailLogin = $_POST['emailLogin'];
        $passLogin = $_POST['passLogin'];
        $_SESSION['customer']='none';
        
        $response = []; 

        if (empty($emailLogin)) {
            $response['errorEmailLogin'] = "Email required";
        }
        if (empty($passLogin)) {
            $response['errorPassLogin'] = "This field is required";
        }

        if (empty($response)) {
            $sqlLogin = 'SELECT * FROM accounts WHERE accUsername = ?';
            $stmt = $conn->prepare($sqlLogin);
            $stmt->bind_param('s', $emailLogin);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows==0) {
                
            } else {
                $acc = $result->fetch_assoc();
                if(password_verify($passLogin, $acc['accPassword'])) {
                    $_SESSION['customer'] = $emailLogin;
                    $response['success'] = "Login successful";
                    // echo("<meta http-equiv='refresh' content='0'>");
                } else {
                    $response['errorPassLogin'] = "The account sign-in was incorrect please try again.";
                }
            }
            
        }

        echo json_encode($response); 
    } else {
        echo json_encode(['error' => 'Invalid request method']);
    }
?>