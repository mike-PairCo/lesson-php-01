<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    echo "กรุณาเข้าสู่ระบบก่อน";
    exit();
}

include "db.php";

$todo_text = $_POST["todo_text"];
$user_id = $_SESSION["user_id"];

// ป้องกัน SQL Injection แบบพื้นฐาน
$todo_text = mysqli_real_escape_string($db_connection, $todo_text);

$sql = "INSERT INTO todos (user_id, todo_text) VALUES ('$user_id', '$todo_text')";
mysqli_query($db_connection, $sql);

echo "<script>
        alert('บันทึกสำเร็จ!');
        window.location='dashboard.php';
      </script>";
?>
