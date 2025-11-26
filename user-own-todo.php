<?php
session_start();
include "db.php";

if (!isset($_SESSION["user_id"])) {
    echo "กรุณาเข้าสู่ระบบก่อน <a href='login.php'>กลับสู่หน้า login</a>";
    exit();
}

$user_id = $_SESSION["user_id"];
?>

<h2>📌 To-Do ของคุณ: <?php echo $_SESSION["username"]; ?></h2>

<a href="dashboard.php">← กลับไป Dashboard</a>
<br><br>

<?php
$sql = "SELECT * FROM todos WHERE user_id = '$user_id' ORDER BY created_at DESC";
$result = mysqli_query($db_connection, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo "- " . $row["todo_text"] . "<br>";
}
?>
