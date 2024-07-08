<?php

function getPosts()
{
    $database = dbConnect();

    // get the last 5 posts
    $statement = $database->query(
        'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS 
    creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 5'
    );

    $posts = [];

    while ($row = $statement->fetch()) {
        $post = [
            'title' => $row['title'],
            'creation_date' => $row['creation_date'],
            'content' => $row['content'],
            'id' => $row['id']
        ];
        $posts[] = $post;
    }

    return $posts;
    
}


function getPost ($id) {

    $database = dbConnect();

    // get the post
    $statement = $database->prepare(
        "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS 
    creation_date FROM posts WHERE id = ?" 
    );

    $statement->execute([$id]);

    $row = $statement->fetch();

    $post = [
        'title' => $row['title'],
        'creation_date' => $row['creation_date'],
        'content' => $row['content'],
    ];

    return $post;
}

function getComments ($id) {

    $database = dbConnect();

    // get the comments
    $statement = $database->prepare(
        "SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS 
    comment_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC" 
    );

    $statement->execute([$id]);

    $row = $statement ->fetch();

    $comments = [];

    while ($row) {
        $comment = [
            'author' => $row ['author'],
            'comment_date' => $row ['comment_date'],
            'comment' => $row ['comment'],
        ];

        $comments[] = $comment;
    }

    return $comments;
}

function dbConnect() {

    // connect to the database
    try {
        $database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'blog', 'LAcway[VW@SHu9.O');
        return $database;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}