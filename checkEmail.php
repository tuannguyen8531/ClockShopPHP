<?php 
    // session_start();
    include 'config.php';
        $emailC = $_POST['emailC'];
        $errEmailC="";
        $mail_ex = "/[a-zA-Z0-9]*@[a-zA-Z0-9]*.[a-zA-Z0-9]*/i";
        if (empty($emailC)) {
            $errEmailC="This field is required";
            echo $errEmailC;
            // exit();
        } else { 
            if (!preg_match($mail_ex, $emailC)){
                $errEmailC="Invalid email";
                echo $errEmailC;
                // exit();
            } else {
                
                $sql = 'SELECT * FROM accounts WHERE accUsername LIKE ?';
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('s', $emailC);
                $stmt->execute();
                $num_rows = $stmt->get_result()->num_rows;

                if ($num_rows >0){
                    $errEmailC = "Email already exist";
                    echo $errEmailC;
                    // exit();
                    
                } else {                                        
                    echo $errEmailC;  
                    // exit();
                              
                }
            }
        }
        // $_SESSION['emailC'] = $emailC;
        // $_SESSION['errEmailC'] = $errEmailC;
        exit();
     
       
?>


