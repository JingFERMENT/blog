<?php $title = 'Le blog de l\'AVBN' ?>

<?php ob_start(); ?>
<h1>Le super blog de l'AVBN !</h1>
<p>Derniers billets du blog :</p>

<?php
foreach ($posts as $post) {
?>
   <div class="news">
      <h3>
         <?= htmlspecialchars($post->title) ?>
         <em>le <?= $post->creation_date?></em>
      </h3>
      <div>
         <p><?= nl2br(htmlspecialchars($post->content)); ?></p>
         <!-- link for comments -->
         <em><a href="index.php?action=post&id=<?= urlencode($post->id) ?>">Commentaires</a></em>
         <!-- button for edit post -->
         <em class="m-5"><a href="index.php?action=edit&id=<?= urlencode($post->id) ?>">Modifier</a></em>
      </div>
   </div>
<?php } ?>
<!--prendre les contenus et nettoyer   -->
<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . '/layout.php');
