<?php

session_start();
session_destroy();
header("Location: advanced_task.php");
exit; // Optional but recommended to stop further script execution after redirect
?>
