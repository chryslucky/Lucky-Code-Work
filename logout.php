<?php
session_start();
session_destroy();
header("Location: add.php");
exit();
