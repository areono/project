<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/db.php";
require ('config.php');

if (isset($_SESSION['userid']) && $_SESSION['userid'] == TRUE) {
    echo $_SESSION['userid'] . "<a href='logout.php' class='btn btn-danger ml-2'>Logout</a>";
} else {
    echo "<button type='button' class='btn btn-login' onclick = \"location.href = 'login.php'\">Login</button>
        <button type='button' class='btn btn-register' onclick = \"location.href = 'register.php'\">Register</button>";
}
?>

<style>
/* Button styling */
.btn {
    padding: 8px 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.btn-login {
    background-color: #E50914;
    color: white;
    border: none;
}

.btn-register {
    background-color: transparent;
    border: 1px solid #E50914;
    color: #E50914;
}

.btn:hover {
    filter: brightness(1.2);
}
</style>
