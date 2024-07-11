<?php $title= 'Le blog de l\'AVBN';

ob_start(); ?>
<h1>Le super blog de l'AVBN !</h1>

<div class="alert alert-danger" role="alert">
    <p class="text-danger"><?= $errorMessage ?></p>
</div>

<?php $content = ob_get_clean(); 

require(__DIR__ . '/layout.php');?>