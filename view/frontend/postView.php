<?php $title = htmlspecialchars($post['title']); 
require('header.php');

?>

<?php ob_start(); ?>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['post'])) ?>
    </p>
</div>

<h2>Commentaires</h2>

<?php     if(isset($_SESSION['pseudo'])&&isset($_SESSION['id'])){  ?>
<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">

    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" value="Ajouter"/>
    </div>
</form>

<?php
}
?>


<?php
while ($comment = $comments->fetch())
{
?>
<p><strong><?= htmlspecialchars($author['pseudo']) ?></strong></p>
     le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
<?php
}
?>

<?php 

$content = ob_get_clean(); ?>

<?php require('template.php'); ?>
