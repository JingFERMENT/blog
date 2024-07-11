<?php 

require_once(__DIR__.'/../model/comment.php');

// add a comment 
function addComment(string $post, array $input) {
    $author = null;
    $comment = null;
   
    if(!empty($input['author']) && !empty($input['comment'])) {
        $author = $input ['author'];
        $comment = $input ['comment'];
    } else {
        throw new Exception('Les données du formulaire sont invalides.');
    }

    $insertComment = insertComment ($post, $author, $comment);
    
    if(!$insertComment) {
        throw new Exception('Impossible d\'ajouter le commentaire.');
    } else {
        // diriger vers la page du post avec des commentaires
        header('Location: index.php?action=post&id='.$post);
    }


}