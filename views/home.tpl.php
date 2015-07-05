  <div class="container">
    <div class="row">
      <div class="col s12">
        <h1 class="header"><?= $title; ?></h1>
        <ul class="collection">
          <?php foreach ( $films as $film ) : ?>
          <li class="collection-item avatar">
            <i class="mdi-av-videocam circle"></i>
            <span class="title"><?php echo $film['title']; ?></span>
            <p><strong>Rate: </strong><?php echo $film['rating']; ?> <br>
              <strong>Rental Rate</strong>: <?php echo $film['rental_rate']; ?>
            </p>
            <a href="<?php echo BASE_URL . '/films/single/' . $film['film_id']; ?>" class="secondary-content"><i class="mdi-action-grade"></i></a>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
