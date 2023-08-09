<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db_host = "localhost";
$db_id = "shjeon";
$db_pw = "Shjeon1374!";
$db_name = "member_information";
$connect=mysqli_connect($db_host, $db_id, $db_pw, $db_name);

$id = $_POST['id'];
$pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
$nickname = $_POST['nickname'];
$email = $_POST['email'];


//id 중복 확인
$query1 = "SELECT * FROM member WHERE mb_id='$id'";
$result1 = $connect->query($query1);
$count = mysqli_num_rows($result1);

// EMAIL 중복 확인
$query2 = "SELECT * FROM member  WHERE mb_email='$email'";
$result2 = $connect->query($query2);
$count2 = mysqli_num_rows($result2);

if ($count) {      //만약 중복된 id가 있다면
?><script>
        alert('이미 존재하는 ID입니다.');
        history.back();
    </script>
    <?php } 
else if($count2) {
    ?><script>
        alert('이미 존재하는 E-MAIL입니다.');
        history.back();
    </script>
    <?php }
    else {  //없다면
    //입력받은 데이터를 DB에 저장

    $query = "INSERT INTO member (mb_id, mb_pw, mb_nickname, mb_email,email_verified) VALUES('$id', '$pw', '$nickname', '$email','1')";
    $result = mysqli_query($connect, $query);

    //저장이 되었다면 (result = true) 가입 완료
    if ($result) {
    ?> <script>
            alert('회원가입에 성공하였습니다.');
            location.replace("./login.php");
        </script>

    <?php } else {
    ?> <script>
            alert("회원가입에 실패하였습니다.");
        </script>
<?php }
}
mysqli_close($connect);
?>