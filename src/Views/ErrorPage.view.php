<?php $this->layout('template', ['title' => 'Page not found']) ?>

<div class="section p-5 text-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h1 class="pb-3">Page <?= $uri ?> Not Found</h1>
        <h4 class="pb-3">You Seem to have clicked on a broken link or entered a URL that doesn't exist on this site</h4>
        <a href="/" class="btn btn-primary">Go back to site</a>
      </div>
    </div>
  </div>
</div>