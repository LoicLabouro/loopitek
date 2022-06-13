<div class="colorfont">
    <div class="container" style="padding: 10px;">
        <h1 class="font2">Ajouter une actualité</h1>
        <div class="d-flex flex-row justify-content-center">
            <form enctype="multipart/form-data" method="POST" action="index.php?page=Controler&param=ajoutActu">
                <div class="form-group">
                    <label class="font3">Titre</label>
                    <input type="text" class="form-control"  placeholder="Titre..." name="titre">
                </div>
                <div class="form-group">
                    <label class="font3">Texte</label>
                    <textarea type="text" class="form-control"  placeholder="Texte..." name="texteActu" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-outline-secondary marginAuto w-100" value="connexion">Ajouter</button>
            </form>
        </div>
            <div style="padding: 10px;">
                <h1 class="font2">Ajouter une image</h1>
            </div>
            <div class="d-flex flex-row justify-content-center">
                <form enctype="multipart/form-data" method="POST" action="index.php?page=Controler&param=AjoutImage">
                    <div class="form-group">
                        <label class="font3">Image</label>
                        <input type="hidden" class="form-control" name="MAX_FILE_SIZE"  value="10000000"  />
                        <label class="btn btn-secondary">
                            Choisir une image&hellip; <input name="Image" type="file" style="display: none;">
                        </label>

                    </div>
                    <button type="submit" class="btn btn-outline-secondary marginAuto w-100">Ajouter</button>
                </form>
            </div>
        <div class="card bg-dark my-3">
            <div style="padding: 10px;">
            <h1 class="font2">Les Actualités</h1>
            </div>
        <?php
        foreach ( $LesLignesActu as $uneActu )
        {
            echo '<div style="padding: 10px;">';
            echo '<div class="card mb-3">';
            echo '<div class="card-body">';
            echo '<span class="font3"><h5 class="card-title">'.$titre = $uneActu['titreActu'].'</h5></span>';
            echo '<p class="card-text">'.$texte = $uneActu['texteActu'].'</p>';
            echo '<p class="card-text"><small class="text-muted">'.$date = $uneActu['dateActu'].'</small></p>';
            ?> <a type="submit" class="btn  marginAuto bg-secondary " href="index.php?page=Controler&param=ModifierForm&idActu=<?php echo $uneActu['idActu']?>">Modifier</a>
            <a type="submit" class="btn  marginAuto bg-secondary " href="index.php?page=Controler&param=supprimerActu&idActu=<?php echo $uneActu['idActu']?>">Supprimer</a><?php
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
        </div>
        <div class="card bg-dark my-3">
            <div style="padding: 10px;">
            <h1 class="font2">Les Commentaires</h1>
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
        </form>
        <div class="card bg-dark my-3">
            <div style="padding: 10px;">
                <h1 class="font2">Les images</h1>
                <?php
                foreach ( $lesLignesGalerie as $uneImage )
                {
                    echo '<div style="padding: 10px;">';
                        echo '<div class="card mb-3">';
                            echo '<div class="card-body">';
                            ?><span><img class="font3" style="height: 150px;width: 250px" src="Vue/img/Galerie/<?php echo $uneImage['nomMedia']?>"><h5 class="card-title"> </h5></img></span>
                            <a type="submit" class="btn  marginAuto bg-secondary " href="index.php?page=Controler&param=ModifierForm&idGalerie=<?php echo $uneImage['idMedia']?>">Modifier</a>
                            <a type="submit" class="btn  marginAuto bg-secondary " href="index.php?page=Controler&param=supprimerGalerie&idGalerie=<?php echo $uneImage['idMedia']?>">Supprimer</a>
                    <!-- <a type="submit" class="btn  marginAuto bg-secondary " href="index.php?page=Controler&param=supprimerCom&id=<?php echo $uneImage['idMedia']?>">Supprimer</a>-->
                            <?php
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>

        </div>
    </div>
</div>
