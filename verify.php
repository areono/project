<!DOCTYPE html>
<html>
<head>
    <title>Verification</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .verification-box {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="verification-box">
        <h2>인증 번호 6자리를 입력해주세요.</h2>
        <form method="post" action="verify.php">
            <input type="text" name="verification_code" maxlength="6" required>
            <button type="submit">Verify</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userInput = $_POST['verification_code'];

            if ($userInput === $_SESSION['auth_code']) {
                // Verification successful, redirect to login.php
                header("Location: login.php");
                exit();
            } else {
                // Verification failed, display error message
                echo "<div class='error-message'>Please enter the verification code again.</div>";
            }
        }
        ?>
    </div>
</body>
</html>
