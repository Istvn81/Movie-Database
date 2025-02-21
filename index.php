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
<script type="text/javascript">
    // A filmszalagon a lapozás megvalósítása, melynél a szinkronizálást úgy értem el, hogy a váltás befejezésekor post-ol. Kattintás esetén elcsúszna a művelet, pl. dupla kattintás.
    var index = (index === undefined) ? 0 : index;
    var parameter;
    var empty = "nincs adat";
    $(document).ready(function() {
        $(document).click(function(event) {
            var direction = ($(event.target).attr("class").includes("next")) ? "next" : "prev";
            parameter = direction;
        });
        $("#cover-carousel").on("slid.bs.carousel", function() {
            $.post("controller.php", {action: "change", param: parameter, list_index: index}, function(data) {
                index = data.index;
                data.movie_relase = (data.movie_relase == null) ? empty : data.movie_relase;
                data.movie_actors = (data.movie_actors == null) ? empty : data.movie_actors;
                data.movie_category = (data.movie_category == null) ? empty : data.movie_category;
                data.movie_description = (data.movie_description == null) ? empty : data.movie_description;
                m_name.innerHTML = " Filmcíme: " + data.movie_name;
                m_relase.innerHTML = " Megjelenés: " + data.movie_relase;
                m_actors.innerHTML = " Szereplők: " + data.movie_actors;
                m_category.innerHTML = " Kategória: " + data.movie_category;
                m_description.innerHTML = " Leírás: " + data.movie_description;
            });
        });
        // Az adott film kakegóriára kattintás eseménye elküldi a paramétereket a megfelelő kontroller (eljárás számára) számára.
        $(".category").click(function(event) {
            $.post("controller.php", {action: "show_category", param: $(event.target).attr("id")}, function() {
                window.location.assign("http://www.localhost/movie/category.php?category=" + $(event.target).attr("id"));
            });
        });
    });
</script>