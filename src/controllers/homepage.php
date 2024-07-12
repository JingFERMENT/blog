<?php

require_once(__DIR__. '/../model/post.php');
require_once(__DIR__. '/../lib/database.php');

function homePage() {

    $postRespository= new PostRepository();
    
    $postRespository->connection = new DataBaseConnection();

    $posts = $postRespository->getPosts();
   
    require(__DIR__.'/../../templates/homepage.php');
}


