<?php

require_once(__DIR__ . '/src/model.php');



if(isset($_GET['id']) && $_GET['id'] > 0) {
    $id = $_GET['id'];
} else {
    echo "Erreur identifiant ! ";
    die;
}

$post = getPost($id);

$comments = getComments($id);

require_once(__DIR__ .'\templates\post.php');