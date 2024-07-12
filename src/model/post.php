<?php

require_once(__DIR__ . '/../lib/database.php');

class Post
{
    public int $id;
    public string $title;
    public string $content;
    public string $creation_date;
}

// define the database instead of connecting unnecessarily to connect to the database 
class PostRepository
{
    //composition database connection ;
    public DatabaseConnection $connection;

    public function getPosts(): array
    {
        // get the last 5 posts
        $statement = $this->connection->getConnection()->query(
            'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS 
    creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 5'
        );

        $posts = [];

        while ($row = $statement->fetch()) {
            $post = new Post();

            $post->title = $row['title'];
            $post->creation_date = $row['creation_date'];
            $post->content = $row['content'];
            $post->id = $row['id'];

            $posts[] = $post;
        }

        return $posts;
    }


    public function getPost($id): Post
    {
        // get the post
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS 
    creation_date FROM posts WHERE id = ?"
        );

        $statement->execute([$id]);

        $row = $statement->fetch();

        $post = new Post();

        $post->title = $row['title'];
        $post->creation_date = $row['creation_date'];
        $post->content = $row['content'];
        $post->id = $row['id'];

        return $post;
    }

    public function modifyPost($id, $newTitle, $newContent)
    {
        // update the post 
        $statement = $this->connection->getConnection()->prepare(
            "UPDATE posts SET title = ?, content = ? where id = ?"
        );

        // executer with the new values
        $statement->execute([$newTitle, $newContent, $id]);

        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS 
    creation_date FROM posts WHERE id = ?"
        );

        $statement->execute([$id]);
        $post = $statement->fetch();

        return $post;
    }
}
