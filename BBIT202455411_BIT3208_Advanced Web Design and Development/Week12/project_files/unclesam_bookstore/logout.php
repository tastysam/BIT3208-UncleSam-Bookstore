<?php
include 'db_connect.php';

session_destroy();

header("Location: login.php?logout=1");
exit();
?>