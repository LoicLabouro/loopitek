<div class="card bg-dark">
    <div style="padding: 10px;">
        <h1 class="font2">Mes commentaires </h1>
    </div>
    <?php
    foreach ( $lesLignesComm as $unCommentaire )
    {
        echo '<div style="padding: 10px;">';
        echo '<div class="card mb-3">';
        echo '<div class="card-body">';
        echo '<span class="font3"><h5 class="card-title">Utilisateur :  '.$login = $unCommentaire['login'].'</h5></span>';
        echo '<p class="card-text"><span class="font3">Commentaire</span> : '.$contenu = $unCommentaire['contenu'].'</p>';
        ?>  <a type="submit" class="btn  marginAuto bg-secondary " href="index.php?page=Controler&param=ModifierForm&idComm=<?php echo $unCommentaire['idComment']?>">Modifier</a>
        <a type="submit" class="btn  marginAuto bg-secondary " href="index.php?page=Controler&param=supprimerCom&id=<?php echo $unCommentaire['idComment']?>">Supprimer</a>
        <?php
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    ?>
</div>