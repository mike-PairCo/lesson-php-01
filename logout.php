<?php
session_start();

$_SESSION["username"] = null;
$_SESSION["user_id"] = null;
echo "<script>window.location='dashboard.php'</script>"; 
?>