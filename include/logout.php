<?php
session_start();
session_destroy();
echo "<script>window.location.href = '../admin/login-v2.php';</script>"
?>