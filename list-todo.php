<?php
include "db.php";
?>
<meta http-equiv="refresh" content="3">
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

    if (isset($filter_by_user)) {
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