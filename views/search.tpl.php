  <div class="container">
    <h1 class="header"><?= $title; ?></h1>
    <div class="row">
        <div class="col s12 nav-wrapper">
        <form>
          <div class="input-field">
            <i class="mdi-action-search prefix"></i>
            <input id="icon_prefix" type="text" class="validate" name="s">
            <label for="icon_prefix"><?php echo (isset($s) ? $s : 'Keyword'); ?></label>
          </div>
        </form>
        </div>
    </div>
    <div class="row">
      <?php if (isset($films)) : ?>
        <div class="col s12">
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
          </ul> <!-- Films list -->
        </div>
      <?php endif; ?>
    </div>
  </div>
