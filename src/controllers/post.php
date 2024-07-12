<?php

require_once(__DIR__ . '/../model/post.php');
require_once(__DIR__ . '/../model/comment.php');

function post(string $id)
{

    // base connection 
    $connection = new DataBaseConnection();

    // post
    $postRepository = new PostRepository();
    $postRepository->connection = $connection ;
    $post = $postRepository->getPost($id);

    // comment
    $commentRepository = new CommentRepository();
    $commentRepository->connection = $connection;
    $comments= $commentRepository->getComments($id);

    require(__DIR__ . '/../../templates/comment.php');
}

// edit a post 
function editPost(int $id)
{

    $postRepository = new PostRepository();

    $postRepository->connection = new DataBaseConnection();

    $post = $postRepository->getPost($id);

    require(__DIR__ . '/../../templates/post.php');
}


function updatePost(int $id, array $input)
{

    $title = null;
    $content = null;

    if (!empty($input['title']) && !empty($input['content'])) {
        $title = $input['title'];
        $content = $input['content'];
    } else {
        throw new Exception('Les données du formulaire sont invalides.');
    }

    $respository = new PostRepository();
    
    $editPost = $respository->modifyPost($id, $title, $content);

    if (!$editPost) {
        throw new Exception('Impossible de modifier le billet.');
    } else {
        // diriger vers la page du post avec des commentaires
        header('Location: index.php?action=post&id=' . $id);
    }
}
