<?php
session_start();
unset($_SESSION['Fname']);
unset($_SESSION['Lname']);
session_destroy();
header("location:../index.html");
?>