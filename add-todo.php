<?php 
session_start();

// เช็คว่าล็อกอินหรือไม่
if (!isset($_SESSION["user_id"])) {
    echo "กรุณาเข้าสู่ระบบก่อน <a href='login.php'>กลับไปหน้า login</a>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add To-Do</title>
</head>
<body>

<h2>เพิ่ม To-Do ใหม่</h2>

<form method="post" action="save-todo.php">
    <input type="text" name="todo_text" placeholder="สิ่งที่ต้องทำ..." required>
    <input type="submit" value="บันทึก">
</form>

<br>
<a href="dashboard.php">กลับสู่ Dashboard</a>

</body>
</html>
