<?php
session_start();
require './include_dao.php';
session_destroy();
Utils::redirect("login.php");
?>
