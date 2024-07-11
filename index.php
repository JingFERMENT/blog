<?php

require_once(__DIR__ . '/src/controllers/homepage.php');
require_once(__DIR__ . '/src/controllers/post.php');
require_once(__DIR__ . '/src/controllers/comment.php');


try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        // display the comment 
        if ($_GET['action'] === 'post') {
    
            if (isset($_GET['id']) && $_GET['id'] > 0) {
    
                $id = $_GET['id'];
    
                post($id);
            } else {
                // stop the "try" bloc and go to catch and generate the exception
                throw new Exception("Aucun identifiant de billet envoyé.");
            }
            // add comments 
        } else if ($_GET['action'] === 'addComment') {
    
            if (isset($_GET['id']) && $_GET['id'] > 0) {
    
                $id = $_GET['id'];

                addComment($id, $_POST);
            } else {
                // stop the "try" bloc and go to catch and generate the exception
                throw new Exception("Aucun identifiant de billet envoyé.");
            }
        } else {
            // stop the "try" bloc and go to catch and generate the exception
            throw new Exception("La page que vous recherchez n'existe pas.");
        }
    } else {
        homePage();
    }
} catch (Exception $e) { // if there is an error 

   $errorMessage = $e->getMessage();
   
   require(__DIR__.'/templates/error.php');
}
