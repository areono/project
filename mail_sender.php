<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require_once ('PHPMailer-master/src/PHPMailer.php');
require_once ('PHPMailer-master/src/Exception.php');
require_once ('PHPMailer-master/src/SMTP.php');

function send_email_naver ($user_email, $user_name, $subject, $content) {
    $USER		='shjeon0126@naver.com'; //보내는 사람 이메일
    $PASSWORD = 'shjeon1374'; //비밀번호
    $SEND_EMAIL = 'shjeon0126@naver.com';
    
    $mail = new PHPMailer(true);
    
    //Enable SMTP debugging.
    $mail->SMTPDebug = 3; // debug 표시 레벨
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();
    //Set SMTP host name
    $mail->Host = "smtp.naver.com";
    $mail->SMTPSecure = "tls";
    //Set TCP port to connect to
    $mail->Port = 587;
    
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;
    //Provide username and password
    $mail->Username = $USER;
    $mail->Password = $PASSWORD;
    $mail->SMTPKeepAlive = true;
    $mail->CharSet = "utf-8"; //이거 설정해야 한글 안깨짐
    //If SMTP requires TLS encryption then set it
    
    $mail->setFrom($USER,"밋유저스");
    // 이름은 적용이 되는데 메일 적용이 안되는데 네이버에서 막아놓음. 네이버는 아예 다른 메일이면 send가 실패함
    // 네이버에 별칭 추가 해야함. google이랑 마찬가지.
    $mail->addAddress($user_email, $user_name); //받는 사람    
    $mail->isHTML(true);
    
    $rand_num = sprintf("%06d",rand(000000,999999));
    $_SESSION['auth_code'] = $rand_num;
    
    $mail->Subject = $subject;
    $mail->Body = $content1.(string)$rand_num;
    $mail->AltBody = "";
    
    try {
        $mail->send();
    } catch (Exception $e) {
        $rand_num = -1;
    }
    return $rand_num;
}

function send_email_google ($user_email, $user_name, $subject, $content) {
    $USER		='shjeon0126@gmail.com'; //보내는 사람 이메일
    $PASSWORD   = 'fulfgeoajnwzpher';     
    $SEND_EMAIL = 'shjeon0126@gmail.com';
    $mail = new PHPMailer(true);
    
    //Enable SMTP debugging.
    $mail->SMTPDebug = 3; // debug 표시 레벨
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();
    //Set SMTP host name
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = "ssl";
    //Set TCP port to connect to
    $mail->Port = 465;
    
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;
    //Provide username and password
    $mail->Username = $USER;
    $mail->Password = $PASSWORD;
    $mail->SMTPKeepAlive = true;
    $mail->CharSet = "utf-8"; //이거 설정해야 한글 안깨짐h
    //If SMTP requires TLS encryption then set it
    
    $mail->setFrom($SEND_EMAIL,"reo"); 
    // 이름은 적용이 되는데 메일 적용이 안된다 구글에서 막아놓음. (보내지긴 하는데 user mail로 수정됨)
    // 보내는 사람 메일을 바꾸려면 User메일의 별칭 메일에 send mail을 추가해야 함. (master@mydomain.io가 실제 메일을 받을 수 있어야함)
    $mail->addAddress($user_email, $user_name); //받는 사람
    $mail->isHTML(true);
    
    $rand_num = sprintf("%06d",rand(000000,999999));
    $_SESSION['auth_code'] = $rand_num;
    
    $mail->Subject = $subject;
    $mail->Body = $content.(string)$rand_num;
    $mail->AltBody = "";
    
    try {
        $mail->send();
    } catch (Exception $e) {
        $rand_num = -1;
    }
    return $rand_num;
}

?>