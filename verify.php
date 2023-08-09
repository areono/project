<?php 
require('db.php');

if (isset($_GET['email']) && isset($_GET['v_cod'])) {
    $email = $_GET['email'];    
    $v_cod = $_GET['v_cod'];

    $sql = "SELECT * FROM member WHERE mb_email = '$email' AND verification_token = '$v_cod'";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $fetch_Email = $row['mb_email'];
            
            if ($row['email_verified'] == 0) {
                $update = "UPDATE member SET email_verified = '1' WHERE mb_email = '$fetch_Email'";
                
                if ($conn->query($update) === TRUE) {
                    echo "
                        <script>
                            alert('Verification successful');
                            window.location.href = 'index.php'
                        </script>"; 
                } else {
                    echo "
                        <script>
                            alert('Query cannot run');
                            window.location.href = 'login.php' 
                        </script>";
                }
            } else {
                echo "
                    <script>
                        alert('Email already verified');
                        window.location.href = 'login.php'
                    </script>";
            }
        }
    }   
} else {
    echo "
        <script>
            alert('Server error');
            window.location.href = 'login.php'
        </script>";
}
?>
