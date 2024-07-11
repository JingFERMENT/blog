<?php

require_once(__DIR__. '/src/controllers/homepage.php');
require_once(__DIR__. '/src/controllers/post.php');
require_once(__DIR__. '/src/controllers/comment.php');



if (isset($_GET['action']) && $_GET['action'] !== '') {
    // display the comment 
    if ($_GET['action'] === 'post') {

        if (isset($_GET['id']) && $_GET['id'] > 0) {

            $id = $_GET['id'];
            
            post($id);
        } else {
            echo "Erreur : aucun identifiant de billet envoyé.";
            
            die;
        }
        // add comments 
    } else if ($_GET['action'] === 'addComment') {
       

        if (isset($_GET['id']) && $_GET['id'] > 0) {

            $id = $_GET['id'];
           
            var_dump($_POST);
            addComment($id, $_POST);
            
        } else {
            echo "Erreur : aucun identifiant de billet envoyé.";
            
            die;
        }
    } else {
        echo "Erreur 404 : la page que vous recherchez n'existe pas.";
    }
} else {
    homePage();
}
