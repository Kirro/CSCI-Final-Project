<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['MSG']);
session_destroy();
header ("location: index.php");