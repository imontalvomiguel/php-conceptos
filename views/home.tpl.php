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
      <a id="logo-container" href="#" class="brand-logo">Films</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Link 1</a></li>
        <li><a href="#">Link 2</a></li>
        <li><a href="#">Link 3</a></li>
        <li><a href="#">Link 4</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col s12">
        <h1 class="header"><?= $title; ?></h1>
        <ul class="collection">
          <?php foreach ( $films as $film ) : ?>
          <li class="collection-item avatar">
            <i class="mdi-av-videocam circle"></i>
            <span class="title"><?php echo $film['title']; ?></span>
            <p><?php echo $film['rating']; ?> <br>
              <?php echo $film['special_features']; ?>
            </p>
            <a href="films.php?id=<?php echo $film['film_id']; ?>" class="secondary-content"><i class="mdi-action-grade"></i></a>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>

  <footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Footer Content</h5>
          <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Links</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        © 2014 Copyright Text
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
