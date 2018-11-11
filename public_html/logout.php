<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 11/11/2018
 * Time: 7:16 AM
 * Project: Lab_12
 */

session_start();
$_SESSION = array();
setcookie(session_name(), '', time() - 2592000, '/');
session_destroy();

?>