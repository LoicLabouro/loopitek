<?php
///////////////////////////////////////////////////Modif Actu
 if(!empty($_REQUEST['idActu'])) {
     ?>

     <div class="colorfont">
     <div class="container" style="padding: 10px;">
     <h1 class="font2">Modification d'une actualité</h1>

     <?php
     foreach ($lesLignesActu as $uneActu) {
         if ($_REQUEST['idActu'] == $uneActu['idActu']) {
             ?>
             <div class="d-flex flex-row justify-content-center">
                 <form enctype="multipart/form-data" method="POST" action="index.php?page=Controler&param=modifierActu">
                     <div class="form-group">
                         <label class="font3">Titre</label>
                         <input type="text" class="form-control" name="titre"
                                value="<?php echo $uneActu['titreActu'] ?>">
                     </div>
                     <div class="form-group">
                         <label class="font3">Texte</label>
                         <textarea type="text" class="form-control" name="texteActu"
                                   rows="4"><?php echo $uneActu['texteActu'] ?></textarea>
                     </div>
                     <input type="hidden" value="<?php echo $_REQUEST['idActu'] ?>" name="modifId">
                     <button type="submit" class="btn btn-outline-secondary marginAuto w-100">
                         Modifier
                     </button>
             </div>
             </form>
             </div>
             </div>
             <?php
         }
     }
 }
 ///////////////////////////////////////////////////Modif Comment
     if(!empty($_REQUEST['idComm'])) {
         ?>

         <div class="colorfont">
         <div class="container" style="padding: 10px;">
         <h1 class="font2">Modification d'un commentaire</h1>
         <?php
         foreach ($lesLignesComm as $unComm) {
             if ($_REQUEST['idComm'] == $unComm['idComment']) {
                 ?>
                 <div class="d-flex flex-row justify-content-center">
                     <form enctype="multipart/form-data" method="POST" action="index.php?page=Controler&param=modifierCom">
                         <div class="form-group">
                             <label class="font3">Texte</label>
                             <textarea type="text" class="form-control" name="contenu"
                                       rows="4"><?php echo $unComm['contenu'] ?></textarea>
                         </div>
                         <input type="hidden" value="<?php echo $_REQUEST['idComm'] ?>" name="modifIdComment">
                         <button type="submit" class="btn btn-outline-secondary marginAuto w-100">
                             Modifier
                         </button>
                 </div>

                 </form>
                 </div>
                 </div>
                 <?php
             }
         }
     }
    if(!empty($_REQUEST['idGalerie'])) {
        ?>

        <div class="colorfont">
        <div class="container" style="padding: 10px;">
        <h1 class="font2">Modification d'une image</h1>
        <?php
        foreach ($lesLignesGalerie as $unMedia) {
            if ($_REQUEST['idGalerie'] == $unMedia['idMedia']) {
                ?>
                <div class="d-flex flex-column justify-content-center">
                    <img class="font3 mx-auto" style="height: 150px;width: 250px" src="Vue/img/Galerie/<?php echo $unMedia['nomMedia']?>"><h5 class="card-title"> </h5></img>
                    <form enctype="multipart/form-data" method="POST" action="index.php?page=Controler&param=modifierGalerie">
                        <div class="form-group">
                            <label class="font3">Image</label>
                            <input type="hidden" name="MAX_FILE_SIZE"  value="10000000"  />
                            <label class="btn btn-secondary">
                                Choisir une image&hellip; <input name="Image" type="file" style="display: none;">
                            </label>
                            <input type="hidden" name="MAX_FILE_SIZE"  value="10000000"  />
                            <input type="hidden" value="<?php echo $_REQUEST['idGalerie'] ?>" name="modifIdGalerie">

                        </div>
                        <input type="hidden" value="<?php echo $_REQUEST['idGalerie'] ?>" name="modifIdGalerie">
                        <button type="submit" class="btn btn-outline-secondary marginAuto w-100">
                            Modifier
                        </button>
                </div>

                </form>
                </div>
                </div>
                <?php
            }
        }
    }




