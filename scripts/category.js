const data = [page, category];

$(document).ready(function () {
    $("#left-header").append("<p>Vissza...</p>");
    // Az oldal betöltése után az előzőleg kiválastott kategória mezőt kiválasztottként megjelöli.
    $("#" + category).css({ "background-color": "black", "opacity": "50%", "color": "antiquewhite" });

    // Az oldal betöltődése után megjeleníti az első oldalt.
    $.post("controller.php", { action: "list_category", param: data }, function (list_data) {
        list_items.innerHTML = list_data;
        $("#" + page).css("color", "gold");
    });
    $(document).click(function (event) {
        // A kiválasztott elemnek (oldal/kategória) megfelelően megjeleníti a filmek listáját.
        if ($(event.target).attr("class") == "page") {
            data[0] = $(event.target).attr("id");

            $.post("controller.php", { action: "list_category", param: data }, function (list_data) {
                list_items.innerHTML = list_data;
                $("#" + data[0]).css("color", "gold");
                $("#list_items").scrollTop(0);
            });
        } else if ($(event.target).attr("class") == "category") {
            // A második megoldás, ami egyszerűen csak újratölti az oldalt a kattintás szerint módosult értékkel.
            window.location.assign("http://www.localhost/movie/category.php?category=" + $(event.target).attr("id"));

            // Az első megoldás, azonban nem változtatja meg az oldal címében a GET értéket, így kategória váltások után visszatérve nem az előző kategóriát jeleníti meg.
            /*                 data[0] = 1;
                            data[1] = $(event.target).attr("id");
            
                            $.post("controller.php", {action: "list_category", param: data}, function(list_data) {
                                list_items.innerHTML = list_data;
                                $(".category").css({"background-color": "antiquewhite", "color": "black", "opacity": "100%"});
                                $("#" + data[1]).css({"background-color": "black", "opacity": "50%", "color": "antiquewhite"});
                                $("#list_items").scrollTop(0);
                            }); */
            // A listán kiválasztott film adatainak megjelentítése.
        } else if ($(event.target).attr("class") == "list-text") {
            $.post("controller.php", { action: "movie_data", param: $(event.target).attr("id") }, function () {
                window.location.assign("http://www.localhost/movie/movie.data.php");
            });
        }
    });
    // A "vissza..." szövegre kattintva betölti az előző oldalt, ami a főoldal.
    $("#left-header").click(function () {
        window.location.assign("http://www.localhost/movie/index.php");
    });
});