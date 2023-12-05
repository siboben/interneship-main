<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["email"]);
unset($_SESSION["firstname"]);
unset($_SESSION["lastname"]);
session_destroy();
header("Location:login.php");
