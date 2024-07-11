<?php

require_once(__DIR__ . '/../dbConnect.php');

function getComments ($id) {

    $database = dbConnect();

    // get the comments
    $statement = $database->prepare(
        "SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS 
    comment_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC" 
    );

    $statement->execute([$id]);

    $comments = [];

    while ($row = $statement->fetch()) {
        $comment = [
            'author' => $row ['author'],
            'comment_date' => $row ['comment_date'],
            'comment' => $row ['comment'],
        ];

        $comments[] = $comment;
    }
    return $comments;
}

function insertComment(string $post, string $author, string $comment): bool{

    $database = dbConnect();

    // insert the comment

    $statement = $database->prepare(
        'INSERT INTO comments(post_id, author, comment, comment_date) 
        VALUES (? , ? ,  ?, NOW())'
    );

    $insertData = $statement->execute([$post, $author, $comment]);

    return ($insertData > 0);
}