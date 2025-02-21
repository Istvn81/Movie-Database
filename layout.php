<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta lang="hu">
  <meta name="description" content="movie database">
  <meta name="keywords" content="movies, moviedatabase, filmek, filmadatbázis">
  <meta name="author" content="Báthori István">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link href="scss/custom.css" rel="stylesheet" type="text/css">
</head>
<body class="bg-black bg-opacity-75 p-5">
  <div class="row">
    <div class="col-2" id="left-header"></div>
    <div class="col-8">
      <!-- Navigációs sáv, másik oldalra navigál, kereső mezőt tartalamaz, valamint be lehet jelentkezni és módosításokat végezni a filmek adatain. -->
      <nav class="navbar navbar-expand-lg bg-light bg-light.bg-gradinent rounded-3">
        <div class="container-fluid">
          <img src="pictures/icons/movies-icon.256.png" width="64" height="64">
          <div class="collapse navbar-collapse">
            <span class="navbar-brand">Filmadatbázis</span>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" href="#">Filmek</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">Sorozatok</a>
              </li>
              <li class="nav-item">
                <div class="input-gropup">
                  <input type="search" class="form-control mx-5" id="search" placeholder="Keresés">
                </div>
              </li>
            </ul>
          </div>
          <span id="user" class="mx-2"></span>
          <a class="nav-link active" href="#"><img src="pictures/icons/login-icon.png" id="logstat" width="48" height="48"></a>
        </div>
      </nav>
    </div>
    <div class="col-2"></div>
    <?php
    require($content);
    ?>
  </div>
  <!-- A lábléc megjelenítése miden oldalon. -->
  <footer>
    <!-- A lábléc baloldalán elhelyezett tartalom -->
    <section class="d-flex justify-content-between m-2">
      <div class="me-5"><span>Készítette: Báthori István</span></div>
      <!-- A lábléc joboldalán elhelyezett tartalom -->
      <div class="me-4">
        <a href="https://www.facebook.com/istvan.bathori.54/"><img src="pictures/icons/icons8-facebook-48.png" class="footer-icon" alt="facebook profile"></a>
        <a href="mailto:bathori.istvan81@gmail.com"><img src="pictures/icons/icons8-gmail-48.png" class="footer-icon" alt="write mail"></a>
      </div>
    </section>
  </footer>
</body>
</html>