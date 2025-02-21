<?php
require "connection.php";
session_start();

$title = "Kategóriák";
$content = "category.view.php";
$category = $_GET["category"];
echo "<script>var category = '$category'; var page = 1; </script>";
require "layout.php";
?>
<script type="text/javascript">
    const data = [page, category];

    $(document).ready(function() {
        $("#left-header").append("<p>Vissza...</p>");
        // Az oldal betöltése után az előzőleg kiválastott kategória mezőt kiválasztottként megjelöli.
        $("#" + category).css({"background-color": "black", "opacity": "50%", "color": "antiquewhite"});

        // Az oldal betöltődése után megjeleníti az első oldalt.
        $.post("controller.php", {action: "list_category", param: data}, function(list_data) {
            list_items.innerHTML = list_data;
            $("#" + page).css("color", "gold");
        });
        $(document).click(function(event) {
            // A kiválasztott elemnek (oldal/kategória) megfelelően megjeleníti a filmek listáját.
            if ($(event.target).attr("class") == "page") {
                data[0] = $(event.target).attr("id");

                $.post("controller.php", {action: "list_category", param: data}, function(list_data) {
                    list_items.innerHTML = list_data;
                    $("#" + data[0]).css("color", "gold");
                    $("#list_items").scrollTop(0);
                });
            }else if ($(event.target).attr("class") == "category") {
                data[1] = $(event.target).attr("id");

                $.post("controller.php", {action: "list_category", param: data}, function(list_data) {
                    list_items.innerHTML = list_data;
                    $(".category").css({"background-color": "antiquewhite", "color": "black", "opacity": "100%"});
                    $("#" + data[1]).css({"background-color": "black", "opacity": "50%", "color": "antiquewhite"});
                    $("#list_items").scrollTop(0);
                });
            // A listán kiválasztott film adatainak megjelentítése.
            }else if ($(event.target).attr("class") == "list-text") {
                //
            }
        });
    });
</script>