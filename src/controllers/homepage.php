<?php

namespace App\controllers\HomePage;

require_once(__DIR__. '/../model/Post.php');
require_once(__DIR__. '/../lib/database.php');

use App\Model\Post\PostRepository;
use App\lib\database\DataBaseConnection;

class HomePage {

    public function homePage() {

        $postRespository= new PostRepository();
        
        $postRespository->connection = new DataBaseConnection();
    
        $posts = $postRespository->getPosts();
       
        require(__DIR__.'/../../templates/homepage.php');
    }

}



