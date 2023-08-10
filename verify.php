<?php
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userInput = $_POST['verification_code'];
    
    if ($userInput === $_SESSION['auth_code']) {
        // Verification successful, redirect to login.php
        header("Location: login.php");
        exit();
    } else {
        // Verification failed, set error message
        $error_message = "Please enter the verification code again.";
    }
}
?>

<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<head>
    <meta charset='utf-8'>
    <style>
        body {
            background-color: #141414;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .verification-container {
            text-align: center;
            padding: 40px;
            background-color: #1E1E1E;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            width: 320px;
        }

        .verification-title {
            font-size: 25px;
            color: #E50914;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .verification-code {
            margin: 10px 0;
            padding: 10px;
            border: none;
            border-bottom: 1px solid #ccc;
            width: 100%;
            background-color: #1E1E1E;
            color: white;
            font-size: 16px;
        }

        .verification-button {
            background-color: #E50914;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .verification-button:hover {
            background-color: #FF141F;
        }

        .error-message {
            color: #FF141F;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
   
</head>

<body>
    <div class="verification-container">
        <?php if (isset($error_message)) { ?>
        <div class="error-message"><?php echo $error_message; ?></div>
        <?php } ?>

        <h2 class="verification-title">Verification Code</h2>
        <form method="post" action="verify.php">
            <input class="verification-code" type="text" name="verification_code" maxlength="6" required>
            <button class="verification-button" type="submit">Verify</button>
        </form>
    </div>
</body>

</html>
