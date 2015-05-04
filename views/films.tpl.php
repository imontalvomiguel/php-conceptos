<?php
/**
 * Lógica de presentación
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title><?= $title; ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css">
  <style>
    p {
      color: rgba(0, 0, 0, 0.71);
    }
    .header {
      color: #ee6e73;
      font-weight: 300;
    }
  </style>
</head>
<body>

  <nav>
    <div class="nav-wrapper container">
      <a id="logo-container" href="./" class="brand-logo">Films</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="view-list"><i class="mdi-action-view-list"></i></a></li>
        <li><a href="search"><i class="mdi-action-search"></i></a></li>
        <li><a href="#"><i class="mdi-communication-quick-contacts-mail"></i></a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="view-list">View list</a></li>
        <li><a href="search">Search</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col s12">
        <h1 class="header"><?= $film['title']; ?></h1>
        <p><?= $film['description']; ?></p>
        <p><strong>Release year:</strong> <?= $film['release_year']; ?></p>
        <p><strong>Rating:</strong> <?= $film['rating']; ?></p>
        <p><strong>Rating Rate:</strong> <?= $film['rental_rate']; ?></p>
        <p><strong>Special features: </strong><?= $film['special_features']; ?></p>
        <p><strong>Length: </strong><?= $film['length']; ?></p>
      </div>
    </div>
  </div>

  <footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Films</h5>
          <p class="grey-text text-lighten-4">The most popular films.</p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Quick links</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="#!">View list</a></li>
            <li><a class="grey-text text-lighten-3" href="search">Search</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        © <?= date('Y'); ?> Copyright Text
        <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>
  <script>
    // Initialize collapse button
    $(".button-collapse").sideNav();
  </script>

</body>
</html>
