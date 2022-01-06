<?php
require_once('conn.php');
session_start();
session_unset();
session_destroy();
session_write_close();
header("location: index.php");
die;
?>