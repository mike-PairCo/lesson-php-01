<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="check-login.php">
        <input type="text" name="username">
        <input type="password" name="password">
        <input type="submit" value="login">
    </form>
</body>

</html>
<?php
    if($_SESSION['username'] != null && $_SESSION["user_id"] != null){
        echo "<script>window.location='dashboard.php'</script>";
    }
?>