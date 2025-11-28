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
    <!-- <meta http-equiv="refresh" content="3"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <input type="text">
    <!-- <iframe src="https://sanook.com" frameborder="0" width="300" height="100"></iframe> -->
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

    <iframe src="list-todo.php" frameborder="0" width="1024" height="768"></iframe>

    <br>
    <a href="user-own-todo.php">ดู To-Do ของฉันเท่านั้น</a>
</body>

</html>