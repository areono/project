<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login - Netflix</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

        .login-container {
            text-align: center;
            padding: 40px;
            background-color: #1E1E1E;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            width: 320px;
        }

        .netflix-logo {
            font-size: 36px;
            color: #E50914;
            margin-bottom: 20px;
        }

        .input-field {
            margin: 10px 0;
            padding: 10px;
            border: none;
            border-bottom: 1px solid #ccc;
            width: 100%;
            background-color: #1E1E1E;
            color: white;
            font-size: 16px;
        }

        .login-button {
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

        .login-button:hover {
            background-color: #FF141F;
        }

        .register-link {
            color: #E50914;
            text-decoration: none;
            margin-top: 15px;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .register-link:hover {
            color: #FF141F;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <i class="fas fa-film netflix-logo"></i>
        <form method="post" action="login_action.php">
            <input class="input-field" name="id" type="text" id="id" placeholder="ID">
            <input class="input-field" name="pw" type="password" id="pw" placeholder="Password">
            <input class="login-button" type="submit" value="Sign In">
        </form>
        <a href="./register.php" class="register-link">sSign up now.</a>
    </div>
</body>

</html>
