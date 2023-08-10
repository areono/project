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

        .register-container {
            text-align: center;
            padding: 40px;
            background-color: #1E1E1E;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            width: 320px;
        }

        .register-title {
            font-size: 25px;
            color: #E50914;
            font-weight: bold;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            margin: 10px 0;
            padding: 10px;
            border: none;
            border-bottom: 1px solid #ccc;
            width: 100%;
            background-color: #1E1E1E;
            color: white;
            font-size: 16px;
        }

        input[type="submit"] {
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

        input[type="submit"]:hover {
            background-color: #FF141F;
        }
    </style>
    <script>
        function check_input() {
            if (!$('#id').val()) {
                alert("Please enter your ID");
                $("#id").focus();
                return;
            }
            if (!$('#pw').val()) {
                alert("Please enter your password");
                $("#pw").focus();
                return;
            }
            if (!$('#nickname').val()) {
                alert("Please enter a nickname");
                $("#nickname").focus();
                return;
            }
            if (!$('#email').val()) {
                alert("Please enter your email");
                $("#email").focus();
                return;
            }
            document.join.submit();
        }
    </script>
</head>

<body>
    <div class="register-container">
        <p class="register-title"><b>Sign up</b></p>
        <form method='post' action='register_act.php'>
            <input name="id" id="id" type="text" placeholder="ID">
            <input name="pw" id="pw" type="password" placeholder="Password">
            <input name="nickname" id="nickname" type="text" placeholder="Nickname">
            <input name="email" id="email" type="email" placeholder="Email">
            <input type="submit" value="Sign Up" onclick="check_input()">
        </form>
    </div>
</body>

</html>
