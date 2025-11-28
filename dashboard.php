<?php
session_start();
include "db.php";

if (!isset($_SESSION["user_id"])) {
    echo "กรุณาเข้าสู่ระบบก่อน <a href='login.php'>คลิกตรงนี้</a>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    ยินดีต้อนรับคุณ <?php echo $_SESSION["username"]; ?><br>
    <a href="logout.php">ออกจากระบบ</a>

    <h3>📌 รายการ To-Do ทั้งหมดของทุกผู้ใช้</h3>
    <div>
        <a href="dashboard.php">ทั้งหมด</a>

        <?php
        $users_sql = "SELECT * FROM users;";
        $user_result = mysqli_query($db_connection, $users_sql);
        while ($row = mysqli_fetch_assoc($user_result)) {
            ?>
            <a href="dashboard.php?filter_by_user=<?php echo $row["id"]; ?>">
                <?php echo $row["username"]; ?>
            </a>
            <?php
        }
        ?>
    </div>
    <div>
        <a href="add-todo.php">+ เพิ่ม To-Do ใหม่</a>
    </div>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Assigned To</th>
            <th>Task</th>
            <th>Created At</th>
        </tr>

        <?php
        $filter_by_user = $_GET["filter_by_user"];
        $sql = "
                SELECT todos.todo_text, todos.created_at, users.username
                FROM todos
                INNER JOIN users ON todos.user_id = users.id";

        if(isset($filter_by_user)) {
            $sql = $sql . " WHERE user_id = $filter_by_user";
        }

        $sql = $sql . " ORDER BY todos.id DESC";

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
</body>

</html>