<?php $this->layout('template', ['title' => 'Home']) ?>

<div class="section p-5">
  <div class="container">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
          <?= flash()->display(); ?>
        </div>
      </div>
    <div class="row">
      <?php foreach ( $posts as $post ): ?>
        <?php
        $name = $post[ 'name' ];
        $email = $post[ 'email' ];
        $title = $post[ 'title' ];
        $text = $post[ 'text' ];
        $time = $post[ 'time' ];
        ?>
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card mb-3">
            <h3 class="card-header"><?= $title ?></h3>
            <div class="card-body">
              <h5 class="card-title"><?= $name ?></h5>
              <h6 class="card-subtitle text-muted"><?= $email ?></h6>
            </div>
            <div class="card-body">
              <p class="card-text"><?= $text ?></p>
            </div>
            <div class="card-footer text-muted"><?= $time ?></div>
          </div>
        </div>
      <?php endforeach; ?>
      <div class="col-12 mt-2">
        <a href="/create" type="button" class="btn btn-success">New Post</a>
      </div>
    </div>
  </div>
</div>
