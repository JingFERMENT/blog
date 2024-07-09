<?php

require_once(__DIR__. '/../model.php');

function homePage() {

    $posts = getPosts();

    require(__DIR__.'/../../templates/homepage.php');
}


