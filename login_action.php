<?php
session_start();

$db_host = "localhost";
$db_id = "shjeon";
$db_pw = "Shjeon1374!";
$db_name = "member_information";
$connect=mysqli_connect($db_host, $db_id, $db_pw, $db_name);

$id = $_POST['id'];
$pw = $_POST['pw'];

//아이디가 있는지 검사
$query = "SELECT * from member where mb_id='$id'";
$result = $connect->query($query);


//아이디가 있다면 비밀번호 검사
if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_assoc($result);

    //비밀번호가 맞다면 세션 생성
    if (password_verify($pw, $row['mb_pw'])) {    
        $_SESSION['userid'] = $row['mb_id'];
        $_SESSION['role'] = $row["role"];
        $_SESSION['idx'] = $row["num"];
        if (isset($_SESSION['userid'])) {
?> <script>
                location.replace("./index.php");
            </script>
        <?php
        } else {
            echo "session failed";
        }
    } else {
        ?> <script>
            alert("아이디 또는 비밀번호를 확인해주세요.");
            history.back(); //js 이 전페이지(login.php)로 돌아가기
        </script>
    <?php
    }
} else {
    ?> <script>
        alert("아이디 또는 비밀번호를 확인해주세요.");
        history.back();
    </script>
<?php
}
?> 