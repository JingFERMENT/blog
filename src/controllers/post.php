<?php

require_once(__DIR__. '/../model/post.php');
require_once(__DIR__. '/../model/comment.php');

function post(string $id) {

    $post = getPost($id);
    $comments = getComments($id);
    require(__DIR__. '/../../templates/post.php');
}






