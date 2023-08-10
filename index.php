<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";
require ('config.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>indexs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="bg-dark">
    <div class="container-fluid mt-3">
        <div class="card" style="height:590px;">
            <div class="card-header text-center">
                <h1>welcom my blog</h1>
            </div>
            <div class="card-body">
    <div style="background-color: #f8f9fa; padding: 10px;">
        <a href='index.php' style="font-weight: bold; font-size: 20px;">Home</a>
        <a href='free_board.php' style="font-weight: bold; font-size: 20px; margin-left: 15px;">Free</a>
        <a href='qna_board.php' style="font-weight: bold; font-size: 20px; margin-left: 15px;">Q&A</a>
        <a href='inform_board.php' style="font-weight: bold; font-size: 20px; margin-left: 15px;">Inform</a>
    </div>
    <div style="text-align: right; margin-top: 10px;">
        <?php 
            if (isset($_SESSION['userid']) && $_SESSION['userid'] == TRUE) {
                echo  $_SESSION['userid'] . "<a href='logout.php' class='btn btn-danger'>LOGOUT</a>";
            } else {
                echo "<button type='button' style='margin-right: 5px;' class='btn btn-success' onclick=\"location.href='login.php'\">Login</button>
                    <button type='button' class='btn btn-danger' onclick=\"location.href='register.php'\">Register</button>";
            }
        ?>
    </div>
    <?php
        if (isset($_SESSION['userid']) && $_SESSION['userid'] == TRUE) {
            echo "<div class=\"card-header text-center\">
                    <h4>어서오세요 여긴 홈 입니다.</h4>
                </div>";
        }
    ?>
</div>

        </div>
    
    </div>
</body>
</html>