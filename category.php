<?php
require "connection.php";
session_start();

$title = "kategóriák";
$content = "category.view.php";
$category = $_GET["category"];
echo "<script>var category = '$category'; var page = 1; </script>";
require "layout.php";
?>
<script type="text/javascript" src="scripts/category.js"></script>