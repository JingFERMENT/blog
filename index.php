<?php

require_once(__DIR__ . '/src/controllers/homepage.php');
require_once(__DIR__ . '/src/controllers/post.php');
require_once(__DIR__ . '/src/controllers/addComment.php');

use App\controllers\Post\Post;
use App\controllers\addComment\addComment;
use App\controllers\HomePage\HomePage;

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        // display the comment 
        if ($_GET['action'] === 'post') {
    
            if (isset($_GET['id']) && $_GET['id'] > 0) {
    
                $id = $_GET['id'];

                $post = new Post();

                $post->Post($id);
            } else {
                // stop the "try" bloc and go to catch and generate the exception
                throw new Exception("Aucun identifiant de billet envoyé.");
            }

            // add comments 
        } else if ($_GET['action'] === 'edit') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
    
                $id = $_GET['id'];

                $post = new Post();

                $post->editPost($id);
             
               
            } else {
                // stop the "try" bloc and go to catch and generate the exception
                throw new Exception("Aucun identifiant de billet envoyé.");
            }

        } else if($_GET['action'] === 'updatePost') {

            if (isset($_GET['id']) && $_GET['id'] > 0) {
    
                $id = $_GET['id'];

                $post = new Post();

                $post->updatePost($id, $_POST);
            } else {
                // stop the "try" bloc and go to catch and generate the exception
                throw new Exception("Aucun identifiant de billet envoyé.");
            }

        }else if ($_GET['action'] === 'addComment') {
    
            if (isset($_GET['id']) && $_GET['id'] > 0) {
    
                $id = $_GET['id'];

                $comment = new addComment();

                $comment->addComment($id, $_POST);
            } else {
                // stop the "try" bloc and go to catch and generate the exception
                throw new Exception("Aucun identifiant de billet envoyé.");
            }
        } else {
            // stop the "try" bloc and go to catch and generate the exception
            throw new Exception("La page que vous recherchez n'existe pas.");
        }
    } else {

        $homePage = new HomePage();
        $homePage->homePage();

    }
} catch (Exception $e) { // if there is an error 

   $errorMessage = $e->getMessage();
   
   require(__DIR__.'/templates/error.php');
}
