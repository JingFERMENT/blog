<?php

require_once(__DIR__ . '/../dbConnect.php');

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
        'id' =>$row ['id']    
    ];

    return $post;
}