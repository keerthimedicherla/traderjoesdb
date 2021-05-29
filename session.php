<?php
// Start session
session_start();

// if user is logged in then redirect user to welcome page
if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] === true) {
   header("location:welcome.php");
   exit;
}