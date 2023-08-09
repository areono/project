
<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<head>
    <meta charset='utf-8'>
    <script>
        function check_input() {
        if (!$('#id').val()) {
            alert("아이디를 입력하세요.");
            $("#id").focus();
            return;
        }
        if (!$('#pw').val()) {
            alert("비밀번호를 입력하세요.");
            $("#pw").focus();
            return;
        }
        if (!$('#nickname').val()) {
            alert("닉네임을 입력하세요.");
            $("#nickname").focus();
            return;
        }
        if (!$('#email').val()) {
            alert("이메일을 입력하세요");
            $("#email").focus();
            return;
        }
        document.join.submit();
    }
    </script>
</head>

<body>
    <div align="center">
        <span>
            <p style="font-size: 25px;"><b>회원가입</b></p>
        </span>

        <form method='post' action='register_act.php'>
            <p><b>I &nbsp;D &nbsp;</b><input name="id" id="id" type="text" placeholder = "id"></p>
            <p><b>PW &nbsp;</b><input name="pw" id="pw" type="password" placeholder = "Password"></p>
            <p><b>NICKNAME &nbsp;</b><input name="nickname" id="nickname" type="text" placeholder = "Nickname"></p>
            <p><b>E-MAIL &nbsp;</b><input name="email" id="email" type="email" placeholder = "Email"></p>
            <br />
            <input type="submit" value="가입하기" onclick="check_input()">
        </form>
    </div>
</body>

</html>