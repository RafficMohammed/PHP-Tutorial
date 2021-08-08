<?php
session_start();
function isLoggedIn()
{
    return $_SESSION['is_logged_in'] == true;
}
?>