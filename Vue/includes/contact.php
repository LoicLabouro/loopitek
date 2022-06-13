<div class="colorfont">
    <?php
        if(!empty($_SESSION['nom'])&&!empty($_SESSION['prenom'])){
            ?>
            <div class="container" style="padding: 10px;">
                <form enctype="multipart/form-data" method="POST" action="index.php?page=Controler&param=EnvoyerCommentaire">
                    <div class="form-group">
                        <h1 class="font1">Commentaire</h1>
                        <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" placeholder="Ecrire un commentaire..." rows="10" name="commentaire" ></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-secondary marginAuto w-100">Envoyer</button>
                </form>
            </div>
            <?php
        }
        else{
            ?>
            <div class="card">
                            <div class="card-body bg-danger">
                            <h1 class="card-text"><b class="font2">Veuillez vous connecter ou inscrire !</b></h1>
                            </div>
            </div>
            <form enctype="multipart/form-data" method="POST" action="index.php?page=Controler&param=entree">
                <button type="submit" class="btn btn-outline-secondary marginAuto" value="connexion">Page connexion</button>
            </form>
            <?php
        }

    ?>
</div>