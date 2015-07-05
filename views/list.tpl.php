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
        </ul> <!-- Films list -->
        <ul id="pagination" class="pagination">
          <li class="waves-effect <?php echo ($pagesLimit <= $limit ? 'disabled' : ''); ?>">
            <a href="<?php echo ( $pagesStart > $limit  ? BASE_URL . '/list?page=' . ($pagesStart - 1) : '' ); ?>"><i class="mdi-navigation-chevron-left"></i></a>
          </li>
          <?php for ($i = $pagesStart; $i <= $pagesLimit; $i++) : ?>
          <li class="waves-effect <?php echo ($p == $i ? 'active' : ''); ?>"><a href="<?php echo BASE_URL . "/list?page=$i"; ?>"><?= $i; ?></a></li>
          <?php endfor; ?>
          <li class="waves-effect <?php echo ($pagesLimit >= $pagesTotal ? 'disabled' : ''); ?>">
            <a href="<?php echo ($pagesLimit < $pagesTotal ? BASE_URL . '/list?page=' . ($pagesLimit + 1): ''); ?>"><i class="mdi-navigation-chevron-right"></i></a>
          </li>
        </ul> <!-- Films pagination -->
      </div>
    </div>
  </div>
