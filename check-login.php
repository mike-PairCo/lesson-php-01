<?php
session_start();

$username = $_POST["username"];
$password = $_POST["password"];

include "db.php";

$sql = sprintf(
    "SELECT * FROM users WHERE username = '%s' AND password = '%s' LIMIT 1",
    mysqli_real_escape_string($db_connection, $username),
    mysqli_real_escape_string($db_connection, $password)
);

$result = mysqli_query($db_connection, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    var_dump($row);
    $_SESSION["username"] = $row["username"];
    $_SESSION["user_id"] = $row["id"];
    echo "<script>window.location='dashboard.php'</script>";
} else {
    echo "fail";
}

?>