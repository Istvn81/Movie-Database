<?php
namespace Provider;
require "movie.php";
require "connection.php";
session_start();

$action = $_POST["action"];
$param = (isset($_POST["param"]) ? $_POST["param"] : "");
$index = (isset($_POST["list_index"]) ? $_POST["list_index"] : "");
// A megfelelő funkció hívása.
switch ($action) {
    case "change":
        changeMovie($param, $index, $conn);
        break;
    case "list_category":
        list_Category($param, $conn);
        break;
    case "proba":
        proba($param);
        break;
}
// film adatok feltöltése a megjelenített borítóképnek megfelelően.
function changeMovie($param, $index, $conn) {
    $max_index = count($_SESSION["mlist"]) - 1;
    if ($param == "next") {
        if ($index == $max_index) {
            $index = 0;
        }else {
            $index ++;
        }
    }else {
        if ($index == 0) {
            $index = $max_index;
        }else {
            $index --;
        }
    }
    $sql = "SELECT * FROM movies WHERE id=" . $_SESSION['mlist'][$index] . "";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ($_SESSION["index_movie"])->set_name($row["name"]);
            ($_SESSION["index_movie"])->set_relase($row["relase"]);
            ($_SESSION["index_movie"])->set_actors($row["actors"]);
            ($_SESSION["index_movie"])->set_category($row["category"]);
            ($_SESSION["index_movie"])->set_description($row["description"]);
        }
    }
    $data = array("index" => $index,
    "id" => $_SESSION['mlist'][$index],
    "movie_name" => ($_SESSION["index_movie"])->get_name(),
    "movie_relase" => ($_SESSION["index_movie"])->get_relase(),
    "movie_actors" => ($_SESSION["index_movie"])->get_actors(),
    "movie_category" => ($_SESSION["index_movie"])->get_category(),
    "movie_description" => ($_SESSION["index_movie"])->get_description()
);

    header("Content-Type: application/json");
    echo json_encode($data);
    exit();
}
// Az index oldalon kiválasztott film kategória értékének eltárolása.
function list_Category($parameter, $conn) {
    $min_rows = ($parameter[0] > 1) ? $parameter[0] * 50 - 50 + 1 : $parameter[0];
    $max_rows = $parameter[0] * 50;
    $row_index = 1;

    $sql = "SELECT * FROM movies WHERE category like '%$parameter[1]%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while (($row = $result->fetch_assoc()) && $row_index <= $max_rows) {
            if ($row_index >= $min_rows) {
                $img_path = (is_null($row["cover"])) ? "pictures/icons/icons8-movie-94.png" : "pictures/movie.posters/" . $row["cover"];
                echo "<img src='" . $img_path . "' class='list-cover'><span class='list-text' id='" . $row["id"] . "'>" . $row["name"] . "</span><br>";
            }
            $row_index ++;
        }
    }
    // A megjelenített filmek oldalszámának a meghatározása a lapozáshoz.
    $quanty = 1;
    echo "<div class='page-container'>";
    for ($i=1; $i < $result->num_rows / 50; $i++) {
        echo "<span class='page' id=$i> | " . $quanty . "-" . $i * 50 . "</span>";
        $quanty += 50;
    }
    if ($result->num_rows > ($i - 1) * 50) {
        echo "<span class='page' id=$i> | " . $quanty . "-" . $result->num_rows . "</span>";
    }
    echo "</div>";
}
function proba($param) {}
?>