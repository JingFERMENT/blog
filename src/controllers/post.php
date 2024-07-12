<?php

namespace App\controllers\Post;

require_once(__DIR__ . '/../lib/database.php');
require_once(__DIR__ . '/../model/Post.php');
require_once(__DIR__ . '/../model/Comment.php');

// avoid the prefixes
use App\Model\Post\PostRepository;
use App\Model\Comment\CommentRepository;
use App\lib\database\DataBaseConnection;

class Post
{

    public function post(string $id)
    {

        // base connection 
        $connection = new DataBaseConnection();

        // post
        // $postRepository = new App\Model\Post\PostRepository();
        $postRepository = new PostRepository();
        $postRepository->connection = $connection;
        $post = $postRepository->getPost($id);

        // comment
        $commentRepository = new CommentRepository();
        $commentRepository->connection = $connection;
        $comments = $commentRepository->getComments($id);

        require(__DIR__ . '/../../templates/comment.php');
    }

    // edit a post 
    public function editPost(int $id)
    {

        $postRepository = new PostRepository();

        $postRepository->connection = new DataBaseConnection();

        $post = $postRepository->getPost($id);

        require(__DIR__ . '/../../templates/post.php');
    }


    public function updatePost(int $id, array $input)
    {

        $title = null;
        $content = null;

        if (!empty($input['title']) && !empty($input['content'])) {
            $title = $input['title'];
            $content = $input['content'];
        } else {
            throw new \Exception('Les données du formulaire sont invalides.');
        }

        $respository = new PostRepository();

        $editPost = $respository->modifyPost($id, $title, $content);

        if (!$editPost) {
            throw new \Exception('Impossible de modifier le billet.');
        } else {
            // diriger vers la page du post avec des commentaires
            header('Location: index.php?action=post&id=' . $id);
        }
    }
}
