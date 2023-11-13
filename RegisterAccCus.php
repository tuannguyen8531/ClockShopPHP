
<?php
include 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $passWord = $_POST['passWord'];
    $confirm = $_POST['confirmPass'];
    $_SESSION['customer'] = 'none';
    
    $response = []; 

    if (empty($email)) {
        $response['errorEmail'] = "Email required";
    }
    if (empty($firstName)) {
        $response['errorFirstName'] = "First Name required";
    }
    if (empty($lastName)) {
        $response['errorLastName'] = "Last Name required";
    }
    if (empty($passWord)) {
        $response['errorPass'] = "Password required";
    } else {
        if (strlen($passWord) < 8 || !preg_match('/[A-Z]/', $passWord) or !preg_match('/[a-z]/', $passWord) or !preg_match('/[0-9]/', $passWord) or !preg_match('/[^a-zA-Z0-9]/', $passWord)) {
            $response['errorPass'] = "Too short. A password must contain at least 3 of the following: lowercase, uppercase, digits, special characters.";
        }
    }
    if (empty($confirm)) {
        $response['errorConfirm'] = "Confirm Password required";
    } else {
        if ($passWord != $confirm) {
            $response['errorConfirm'] = "Passwords must match";
        }
    }

    if (empty($response)) {
       $option = [
                'cost' => 12,
            ];
        $passHash = password_hash($passWord, PASSWORD_DEFAULT, $option);    
        $accAuthority = 3;
        $sqlAcc = 'INSERT INTO accounts(accUsername, accPassword, accAuthority) VALUES (?,?,?)';
        $stmt = $conn->prepare($sqlAcc);
        $stmt->bind_param("ssi", $email, $passHash, $accAuthority);
        $stmt->execute();

        $sql = 'SELECT * FROM accounts WHERE accUsername LIKE ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        
        $cusCompany="";
        $cusPhone="";
        $cusAdd1="";
        $cusAdd2="";
        $cusCity="";
        $cusState="";
        $cusZip="";
        $cusCountry="";
        $accId = $result['accId'];
        $insertCus = 'INSERT INTO customers (cusFirstName, cusLastName, cusCompany, cusPhone, cusEmail, cusAdd1, cusAdd2, cusCity, cusState, cusZip, cusCountry, cusAccount) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
        $stmt = $conn->prepare($insertCus);
        $stmt->bind_param("sssssssssssi",$firstName, $lastName,$cusCompany, $cusPhone,$email, $cusAdd1, $cusAdd2, $cusCity, $cusState, $cusZip,$cusCountry, $accId);
        
        if (!$stmt->execute()) {
            $response['errorSQL'] = $stmt->error;
        } else {
            $response['success'] = "Registration successful";
            $_SESSION['customer'] = $email;
        }
    }

    // Encode the response array to JSON and send it back to the client
    echo json_encode($response);
    
} else {
    // Handle the case when the request method is not POST
    echo json_encode(['error' => 'Invalid request method']);
}
?>
