<?php

namespace Controllers\PageNotFound;

use League\Plates\Engine;

class PageNotFound {
  public function show($uri) {
    $templates = new Engine('../src/Views');
    echo $templates->render('ErrorPage.view', ['uri' => $uri]);
  }
}
