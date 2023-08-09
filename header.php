
<?php
    include 'db.php';
    include 'config.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="bg-white">
    <div class="container-fluid mt-3">
        <div class="card" style="height:150px;">
            <div class="card-header text-center">
            </div>
            <div class="card-body">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="free_board.php"> free</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="qna_board.php">Q&A</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="inform_board.php">inform</a>
                            </li>
                        </ul>
                    </div>
                    <form class="justify-content-end">
                        <?php
                            if (isset($_SESSION['userid']) && $_SESSION['userid']) {
                                echo '<p class="navbar-text">' . $_SESSION['userid'] . '<a href="logout_action.php" class="btn btn-danger">Logout</a></p>';
                            } else {
                                echo '<button type="button" class="btn btn-success m-1" data-bs-toggle="modal" onclick="location.href=\'login.php\'">Login</button>';
                                echo '<button type="button" class="btn btn-danger m-1" data-bs-toggle="modal" onclick="location.href=\'register.php\'">Register</button>';
                            }
                        ?>
                    </form>
                    </div>
                </nav>
                
            </div>
        </div>
    
    </div>
</body>
</html>
