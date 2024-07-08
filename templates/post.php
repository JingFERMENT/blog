<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8" />
   <title>Le blog de l'AVBN</title>
   <link href="style.css" rel="stylesheet" />
</head>

<body>
   <h1>Le super blog de l'AVBN !</h1>
   <a href="index.php"><p>Retour à la liste des billets</p></a>

   <div class="news">
      <h3>
         <?= htmlspecialchars($post['title']) ?>
         <em>le <?= $post['creation_date'] ?></em>
      </h3>
      <p>
         <?= nl2br(htmlspecialchars($post['content'])); ?>
      </p>
   </div>

   <h2><a href="#">Commentaires</a></h2>

   <?php
   foreach ($comments as $comment) {
   ?>
      <p><strong><?= htmlspecialchars($comment['author'])?></strong>
      le <?=nl2br(htmlspecialchars($comment['creation_date']))?></p>
      <p><?=nl2br(htmlspecialchars($comment['comment']))?></p>
   <?php } ?>
</body>

</html>