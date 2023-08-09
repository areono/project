<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "db.php";
include 'config.php';

// Start the session (assuming it is not started already)
// session_start();

// Get user ID from the session (Assuming $_SESSION['userid'] contains the user ID)
$user = $_SESSION['userid'];

// Get the data from the form submission
$title = $_POST['title'];
$content = $_POST['content'];

// Process the uploaded file
$error = $_FILES['file']['error'];
$tmpfile = $_FILES['file']['tmp_name'];
$filename = $_FILES['file']['name'];
$folder = "./file/upload/".$filename;

// File upload error handling
if ($error !== UPLOAD_ERR_OK) {
    switch ($error) {
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            echo "<script>alert('파일이 너무 큽니다.');";
            echo "window.history.back()</script>";
            exit;
    }
}

// Move the uploaded file to the destination folder
move_uploaded_file($tmpfile, $folder);

// Check if both title and content are provided
if ($title && $content) {
    // Insert the data into the database table
    $sql = mc("INSERT INTO inform_board_table(title, content, name, file, view , reg_date) 
              VALUES('$title', '$content', '$user', '$filename', 0 , NOW())");

    // Check if the insertion was successful and redirect to the free board page
    if ($sql) {
        echo "<script>alert('글쓰기 완료되었습니다.');";
        echo "location.href='free_board.php';</script>";
    } else {
        // Display an error message if the insertion failed
        echo "<script>alert('글쓰기에 실패하였습니다.');</script>";
    }
} else {
    // Display an error message if title and content are not provided
    echo "<script>alert('제목과 내용을 확인해주세요.');";
    echo "history.back();</script>";
}
?>
