<?php
namespace Provider;

require "movie.php";
require "connection.php";
session_start();
$_SESSION["index_movie"] = new Movie();
$title = "index";
$content = "index.view.php";
require "layout.php";
?>
<script type="text/javascript" src="scripts/index.js"></script>