<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db_host = "localhost";
$db_id = "shjeon";
$db_pw = "Shjeon1374!";
$db_name = "member_information";
$connect = mysqli_connect($db_host, $db_id, $db_pw, $db_name);

$id = $_POST['id'];
$pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
$nickname = $_POST['nickname'];
$email = $_POST['email'];

// Include the email sender functions
require('mail_sender.php');

// Check for duplicate id
$query1 = "SELECT * FROM member WHERE mb_id='$id'";
$result1 = $connect->query($query1);
$count = mysqli_num_rows($result1);

// Check for EMAIL duplicates
$query2 = "SELECT * FROM member  WHERE mb_email='$email'";
$result2 = $connect->query($query2);
$count2 = mysqli_num_rows($result2);

if ($count) {
    ?><script>
    alert('이미 존재하는 ID입니다.');
    history.back();
</script>
<?php } else if ($count2) {
    ?><script>
    alert('이미 존재하는 E-MAIL입니다.');
    history.back();
</script>
<?php } else {
    // Insert the user data into the database
    $query = "INSERT INTO member (mb_id, mb_pw, mb_nickname, mb_email,email_verified) VALUES('$id', '$pw', '$nickname', '$email','1')";
    $result = mysqli_query($connect, $query);

    if ($result) {
        // Send verification email
        $subject = 'Welcome to YourWebsite! Please Verify Your Email';
        $content = "Click the following link to verify your email address: ";
        $verification_code = send_email_naver($email, $nickname, $subject, $content);

        // If Naver email sending failed, try sending with Google
        if ($verification_code == -1) {
            $verification_code = send_email_google($email, $nickname, $subject, $content);
        }

        if ($verification_code != -1) {
            // Successfully sent email, show a message or redirect
            echo "<script>
                alert('Your registration was successful. Check your email to verify your account.');
                location.replace('./verify.php');
            </script>";
        } else {
            // Email sending failed
            echo "<script>
                alert('Your registration was successful, but email sending failed. Please contact support.');
                location.replace('./login.php');
            </script>";
        }
    } else {
        // Registration failed
        echo "<script>
            alert('Registration failed.');
        </script>";
    }
}
mysqli_close($connect);
?>
