<?php
session_start();
include "db.php";

if (!isset($_SESSION["user_id"])) {
    echo "กรุณาเข้าสู่ระบบก่อน <a href='login.php'>คลิกตรงนี้</a>";
    exit();
}
?>

ยินดีต้อนรับคุณ <?php echo $_SESSION["username"]; ?><br>
<a href="logout.php">ออกจากระบบ</a>
<br><br>

<h3>📌 รายการ To-Do ทั้งหมดของทุกผู้ใช้</h3>
<a href="add-todo.php">+ เพิ่ม To-Do ใหม่</a>
<br><br>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Assigned To</th>
        <th>Task</th>
        <th>Created At</th>
    </tr>

<?php
// join เพื่อดูชื่อ user ด้วย
$sql = "
    SELECT todos.todo_text, todos.created_at, users.username
    FROM todos
    INNER JOIN users ON todos.user_id = users.id
    ORDER BY todos.created_at DESC
";
$result = mysqli_query($db_connection, $sql);

while ($row = mysqli_fetch_assoc($result)) {
?>
    <tr>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['todo_text']; ?></td>
        <td><?php echo $row['created_at']; ?></td>
    </tr>
<?php
}
?>
</table>

<br>
<a href="user-own-todo.php">ดู To-Do ของฉันเท่านั้น</a>
