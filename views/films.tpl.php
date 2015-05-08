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
