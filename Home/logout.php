<?php
session_start();
session_destroy(); // Logout karega
header("Location: admin_login.php"); // Wapas login page par bhej dega
exit();
?>
