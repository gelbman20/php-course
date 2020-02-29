<?php

use League\Plates\Engine;

$templates = new Engine('../src/Views');
echo $templates->render('ErrorPage.view');
