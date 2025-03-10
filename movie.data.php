<?php
namespace Provider;

require "movie.php";
session_start();
$title = "film adatok";
$content = "movie.data.view.php";
require "layout.php";
?>
<script type="text/javascript" src="scripts/movie.data.js"></script>