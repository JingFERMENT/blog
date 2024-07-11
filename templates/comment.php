<?php $title = 'Le blog de l\'AVBN' ?>

<?php ob_start(); ?>

<h1>Le super blog de l'AVBN !</h1>
<a href="index.php">
   <p>Retour à la liste des billets</p>
</a>

<div class="news">
   <h3>
      <?= htmlspecialchars($post['title']) ?>
      <em>le <?= $post['creation_date'] ?></em>
   </h3>
   <p>
      <?= nl2br(htmlspecialchars($post['content'])); ?>
   </p>
</div>

<h2>Commentaires</h2>
<form action="index.php?action=addComment&id=<?= $post['id'] ?>" method="post">
   <div class="mb-3">
      <label for="author" class="form-label">Auteur</label>
      <input type="text" class="form-control" id="author" name="author">
   </div>
   <div class="mb-3">
      <label for="comment" class="form-label">Commentaire</label>
      <textarea id="comment" class="form-control" name="comment"></textarea>
   </div>
   <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
<?php
foreach ($comments as $comment) {
?>
   <p><strong><?= htmlspecialchars($comment->author) ?></strong>
      le <?= nl2br(htmlspecialchars($comment->comment_date)) ?></p>
   <p><?= nl2br(htmlspecialchars($comment->comment)) ?></p>
<?php } ?>
<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . '/layout.php');
