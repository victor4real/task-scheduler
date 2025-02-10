<?php
session_start(); // Start the session here
session_unset();
session_destroy();
session_regenerate_id(true);
header('Location: login.php');
exit();
?>