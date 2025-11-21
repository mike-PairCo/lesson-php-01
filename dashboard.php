<?php
session_start();

if (isset($_SESSION["user_id"])) {
    ?>
    ยินดีต้อนรับคุณ <?php echo $_SESSION["username"]; ?> เข้าสู่ระบบ
    <a href="logout.php">ออกจากระบบ</a>
    <?php
} else {
    ?>
    กรุณาเข้าสู่ระบบก่อน <a href="login.php">คลิกตรงนี้</a>
    <?php
}
?>