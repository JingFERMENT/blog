<?php $title = 'Le blog de l\'AVBN' ?>

<?php ob_start(); ?>

<h1>Le super blog de l'AVBN !</h1>
<a href="index.php">
   <p>Retour à la liste des billets</p>
</a>

<form action="index.php?action=updatePost&id=<?=$post->id?>" method="post">
   <div class="mb-3">
      <label for="title" class="form-label">Titre</label>
      <textarea class="form-control" id="title" name="title"><?= htmlspecialchars($post->title) ?></textarea>
      <p>Date de création du billet : <em>le <?= $post->creation_date?></em></p>
   </div>
   <div class="mb-3">
      <label for="content" class="form-label">Contenu</label>
      <textarea id="content" class="form-control" name="content"><?= nl2br(htmlspecialchars($post->content)); ?></textarea>
   </div>
   <button type="submit" class="btn btn-primary">Modfier</button>
</form>

<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . '/layout.php');
