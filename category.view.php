<div class="container-fluid">
  <div class="row mt-2">
    <div class="col-2"></div>
    <div class="col-8 d-flex justify-content-center">
    <?php
      // A film kategóriák megjelenítése a benne található filmek számára. Az index oldalon kiválasztott kategória aktívan kijelölt.
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
  <div class="row mt-2">
    <div class="col-2"></div>
    <div class="col-8 list-box" id="list_items"></div>
    <div class="col-2"></div>
  </div>
</div>