<?php
require('../config/database.php');
$id = $_GET['id'];

$query_delete = "DELETE FROM users WHERE id = $id";
$result_delete = pg_query($conn, $query_delete);



header("Location: list_users.php");
exit;
?>
