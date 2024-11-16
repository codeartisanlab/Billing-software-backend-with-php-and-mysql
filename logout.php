<?php

session_start();
unset($_SESSION['loginstatus']);
header("location: login.php");

?>