<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-2"></div>
        <div class="col-8">
            <?php
            echo "<p>" . ($_SESSION["selected_movie"])->get_name() . "</p>";
            ?>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <?php
            echo "<img class='movie-data-image' src='pictures/movie.posters/" . ($_SESSION["selected_movie"])->get_cover_path() 
            . "' alt='" . ($_SESSION["selected_movie"])->get_cover_path() . "'></img>";
            ?>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <?php
            echo "<p>Megjelenés: " . ($_SESSION["selected_movie"])->get_relase() . "</p>";
            echo "<p>Színészek: " . ($_SESSION["selected_movie"])->get_actors() . "</p>";
            echo "<p>Kategória: " . ($_SESSION["selected_movie"])->get_category() . "</p>";
            echo "<p>Leírás: " . ($_SESSION["selected_movie"])->get_description() . "</p>";
            ?>
        </div>
        <div class="col-2"></div>
    </div>
</div>