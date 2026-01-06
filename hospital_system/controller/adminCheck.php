<?php
session_start();
setcookie('status', 'true', time() + 3000, '/');
?>