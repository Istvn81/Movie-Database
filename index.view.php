<div class="container-fluid">
  <div class="row mt-2">
    <div class="col-2"></div>
    <div class="col-4">
      <!-- A filmszalag feltöltése azokkal a filmekkel, melyekhez tartozik borító. -->
      <div class="carousel slide carousel-fade" id="cover-carousel">
        <div class="carousel-inner">
          <?php
          $sql = "SELECT * FROM movies WHERE cover IS NOT NULL ORDER BY RAND()";
          $result = $conn->query($sql);
          $carousel_active = false;
          $_SESSION["mlist"] = array();

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              if (!$carousel_active) {
                $_SESSION["mlist"][] = $row["id"];
                ($_SESSION["index_movie"])->set_name($row["name"]);
                ($_SESSION["index_movie"])->set_relase($row["relase"]);
                ($_SESSION["index_movie"])->set_actors($row["actors"]);
                ($_SESSION["index_movie"])->set_category($row["category"]);
                ($_SESSION["index_movie"])->set_description($row["description"]);
                ?>
                <div class="carousel-item active"><img src="pictures/movie.posters/<?php echo $row["cover"]; ?>" alt=""></div>
                <?php
                $carousel_active = true;
                continue;
              }
              ?>
              <div class="carousel-item"><img src="pictures/movie.posters/<?php echo $row["cover"]; ?>" alt=""></div>
              <?php
              $_SESSION["mlist"][] = $row["id"];
            }
          }
          ?>
        </div>
        <button type="button" class="carousel-control-prev" data-bs-target="#cover-carousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button type="button" class="carousel-control-next" data-bs-target="#cover-carousel" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>
    <!-- Az index oldalon megjelenített film adatainak a megjelenítése. -->
    <div class="col-4" id="data">
      <p class="movie_text" id="m_name">Filmcíme: <?php echo ($_SESSION["index_movie"])->get_name(); ?></p>
      <p class="movie_text" id="m_relase">Megjelenés: <?php echo ($_SESSION["index_movie"])->get_relase(); ?></p>
      <p class="movie_text" id="m_actors">Szereplők: <?php echo ($_SESSION["index_movie"])->get_actors(); ?></p>
      <p class="movie_text" id="m_category">Kategória: <?php echo ($_SESSION["index_movie"])->get_category(); ?></p>
      <p class="movie_text" id="m_description">Leírás: <?php echo ($_SESSION["index_movie"])->get_description(); ?></p>
    </div>
    <div class="col-2"></div>
  </div>
   <!-- A film kategóriákat darab szerint megjelenítő sáv. -->
  <div class="row mt-5">
    <div class="col-2"></div>
    <div class="col-8 d-flex justify-content-center">
      <?php
      // A film kategóriák eltárolása tömbbe, majd bejárás foreach segítségével és az adatbázis lekérdezések végrehajtása, eredmény kiíratása, ami a kategóriánkénti darabszám lesz.
      $categorys = array("akció", "dráma", "háborús", "horror", "kaland", "romantikus", "sci-fi", "történelmi", "vígjáték");
      foreach ($categorys as $item) {
        $sql = "SELECT count(category) as category FROM movies WHERE category like '%" . $item . "%'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            ?>
            <span class="category" id="<?php echo $item; ?>"><?php echo $item . "(" . $row["category"] . ")"; ?></span>
            <?php
          }
        }
      }
      ?>
    </div>
    <div class="col-2"></div>
  </div>
</div>