<?php
session_start();

$username = $_POST["username"];
$password = $_POST["password"];

include "db.php";

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";
$result = mysqli_query($db_connection, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    var_dump($row);
    $_SESSION["username"] = $row["username"];
    $_SESSION["user_id"] = $row["id"];
    echo "<script>window.location='dashboard.php'</script>";
}
else {
    echo "fail";
}

?>