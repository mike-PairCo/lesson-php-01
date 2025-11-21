<?php
$username = $_POST["username"];
$password = $_POST["password"];

include "db.php";

$select_sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
$result = mysqli_query($db_connection, $select_sql);

if(mysqli_num_rows($result) == 0) {
    $insert_sql = "INSERT INTO users VALUES (NULL, '$username', '$password')";
    mysqli_query($db_connection, $insert_sql);
    echo "<script>alert('สมัครผ่านแล้วจ้า')</script>";
    echo "<script>window.location='login.php'</script>";
}
else {
    echo "$username username นี้มีผู้ใช้แล้ว";
}
?>