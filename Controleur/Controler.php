<?php
require_once(dirname(__FILE__) . '/../Fonction/FonctionBD.php');
require_once(dirname(__FILE__) . '/../Fonction/OutilsDivers.php');
//Etape 1 : Création d'un objet de connexion à la base de données activités



//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!//
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////// information : "index.php?page=Controler&param=Message&var=" renvoi sur le page Message qui charge un msg selon la var rentré en param /////////////////////
////////////////////  exemple "index.php?page=Controler&param=Message&var=ErreurLogin" va afficher un message sur un login déja existant /////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!//

$Pdo = Pdosite_dj::getPdosite_dj();

if (isset($_REQUEST['param'])) {
    $param = $_REQUEST['param'];
    switch ($param) {
            //////////////////////////////////////// Action renvoie des pages //////////////////////////////////////////////
        case 'Accueil': {
                $lesLignes = $Pdo->getListActu();
                include(dirname(__FILE__) . '/../Vue/includes/accueil.php');
                break;
            }
        case 'Entree': {
                include(dirname(__FILE__) . '/../Vue/includes/connexion.php');
                break;
            }
        case 'Galerie': {
                $lesLignesGalerie = $Pdo->getListGalerie();
                include(dirname(__FILE__) . '/../Vue/includes/galerie.php');
                break;
            }
        case 'Message': {
                include(dirname(__FILE__) . '/../Vue/includes/message.php');
                break;
            }

        case 'Admin_Musique': {
                include(dirname(__FILE__) . '/../Vue/includes/Admin_Musique.php');
                break;
            }

        case 'Trance': {
                $ligneTrance = $Pdo->getListTrance();
                include(dirname(__FILE__) . '/../Vue/includes/trance.php');
                break;
            }

        case 'Raggatek': {
                $ligneRagga = $Pdo->getListRagga();
                include(dirname(__FILE__) . '/../Vue/includes/raggatek.php');
                break;
            }

        case 'Frenchcore': {
                $ligneFrenchcore = $Pdo->getListFrenchcore();
                include(dirname(__FILE__) . '/../Vue/includes/frenchcore.php');
                break;
            }

        case 'Hardstyle': {
                $ligneHard = $Pdo->getListHardstyle();
                include(dirname(__FILE__) . '/../Vue/includes/hardstyle.php');
                break;
            }

        case 'Electro': {
                $ligneElectro = $Pdo->getListElectro();
                include(dirname(__FILE__) . '/../Vue/includes/electro.php');
                break;
            }

        case 'Contact': {
                include(dirname(__FILE__) . '/../Vue/includes/contact.php');
                break;
            }

        case 'GestionComm': {
                $lesLignesComm = $Pdo->getListCommentairesParUtilisateur($_SESSION['login']);
                include(dirname(__FILE__) . '/../Vue/includes/GestionComm.php');
                break;
            }

        case 'Admin': {
                $LesLignesActu = $Pdo->getListActu();
                $lesLignesComm = $Pdo->getListCommentaire();
                $lesLignesGalerie = $Pdo->getListGalerie();
                include(dirname(__FILE__) . '/../Vue/includes/Admin.php');
                break;
            }
            ///////////////////Action Ajout//////////////////////////
        case 'ajoutActu': {
                if (empty($_POST['titre']) || empty($_POST['texteActu'])) {
?>
                    <script>
                        document.location.href = "index.php?page=Controler&param=Message&var=connexionFauxChampsActu";
                    </script>
                <?php
                } else {
                    $Pdo->insertActu(Conversion($_POST['titre']), Conversion($_POST['texteActu']));
                ?>
                    <script>
                        document.location.href = "index.php?page=Controler&param=Message&var=AjoutActu";
                    </script>
                <?php
                }
                break;
            }
        case 'AjoutImage': {
                if (!empty($_FILES['Image']['name'])) {
                    $var = TranfertImage();
                    $Pdo->insertGalerie($var, 1);
                ?>
                    <script>
                        document.location.href = "index.php?page=Controler&param=Message&var=AjoutMedia";
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        document.location.href = "index.php?page=Controler&param=Message&var=ErreurEmpty";
                    </script>
                <?php
                }
                break;
            }
        case 'EnvoyerCommentaire': {
                if (empty($_POST['commentaire'])) {
                ?>
                    <script>
                        document.location.href = "index.php?page=Controler&param=Message&var=connexionFauxChampsContact";
                    </script>
                <?php
                } else {
                    $Pdo->insertComment(Conversion($_POST['commentaire']), $_SESSION['idUser']);
                ?>
                    <script>
                        document.location.href = "index.php?page=Controler&param=Message&var=envoyerCommentaire";
                    </script>
                <?php
                }

                break;
            }
        case 'AjoutMusique': {
                if (!empty($_FILES['Image']['name'])) {
                    $var = TranfertImage();
                    $Pdo->insertMusique($var, 1);
                    //$Pdo->ajoutA("");
                ?>
                    <script>
                        document.location.href = "index.php?page=Controler&param=Message&var=AjoutMusique";
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        document.location.href = "index.php?page=Controler&param=Message&var=ErreurEmpty";
                    </script>
                <?php
                }
                break;
            }
            //////////////////////////////////////////////////////////////////////////////////////Modifier

            /// Envoie sur le formulaire de modification
        case 'ModifierForm': {
                $lesLignesActu = $Pdo->getListActu();
                $lesLignesComm = $Pdo->getListCommentaire();
                $lesLignesGalerie = $Pdo->getListGalerie();
                include(dirname(__FILE__) . '/../Vue/includes/Modifier.php');

                break;
            }
            ///fait les modif
        case 'modifierActu': {
                $Pdo->modifActu(Conversion($_POST['titre']), Conversion($_POST['texteActu']), $_POST['modifId']);
                ?>
                <script>
                    document.location.href = "index.php?page=Controler&param=Admin";
                </script>
            <?php

                break;
            }
        case 'modifierCom': {
                $Pdo->modifComment($_POST['modifIdComment'], Conversion($_POST['contenu']));
            ?>
                <script>
                    document.location.href = "index.php?page=Controler&param=GestionComm";
                </script>
                <?php

                break;
            }
        case 'modifierGalerie': {
                if (empty($_FILES['Image']['name'])) {
                ?>
                    <script>
                        document.location.href = "index.php?page=Controler&param=Message&var=AjoutMedia";
                    </script>
                <?php
                } else {
                    $var = TranfertImage();
                    $Pdo->modifGalerie($var, 1, $_POST['modifIdGalerie']);
                ?>
                    <script>
                        document.location.href = "index.php?page=Controler&param=Message&var=AjoutMedia";
                    </script>
                <?php
                }
                break;
            }
            ///////////////////// Action Suprimer/////////////////////////
        case 'supprimerActu': {
                $Pdo->supprimerActu($_REQUEST['idActu']);
                ?>
                <script>
                    document.location.href = "index.php?page=Controler&param=Admin";
                </script>
                <?php
                break;
            }
        case 'supprimerCom': {
                $Pdo->supprimerComment($_REQUEST['id']);
                if ($_SESSION['droit'] == 1) { ?>
                    <script>
                        document.location.href = "index.php?page=Controler&param=Admin";
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        document.location.href = "index.php?page=Controler&param=GestionComm";
                    </script>
                <?php
                }
                break;
            }
        case 'supprimerGalerie': {
                $Pdo->supprimerGalerie($_REQUEST['idGalerie']);
                ?>
                <script>
                    document.location.href = "index.php?page=Controler&param=Admin";
                </script>
            <?php
                break;
            }

        case 'supprimerMusique': {
                $Pdo->supprimerMusique($_REQUEST['idM']);
            ?>
                <script>
                    //document.location.href="index.php?page=Controler&param=Admin_Musique";
                </script>
                <?php
                break;
            }
            //////////////////////////////////////////////////////////////////////////////////////Action Connexion Inscription et Deconnexion
        case 'ValiderConnexion': {
                //on vérifie tout d'abord si les champs sont bien remplis
                if (!empty($_REQUEST['login']) && !empty($_REQUEST['mdp'])) {
                    $login = htmlspecialchars($_REQUEST['login']);
                    $mdp = sha1($_REQUEST['mdp']);
                    /*encrypt le mot de passe à comparé*/
                    $laLigne = $Pdo->connexion(Conversion($login), Conversion($mdp));
                    //on vérifie ensuite si un compte est bien retourné de la bdd (si $laLigne == 0 c'est qu'aucun compte Membre n'est retourné et qu'il y a forcément une erreur dans les logs)
                    if ($laLigne != 0) {
                        ///////// création des variales de session contenant les informations de l'utilisateur
                        $_SESSION['nom'] = $laLigne['nom'];
                        $_SESSION['login'] = $laLigne['login'];
                        $_SESSION['mdp'] = $laLigne['mdp'];
                        $_SESSION['prenom'] = $laLigne['prenom'];
                        $_SESSION['droit'] = $laLigne['droit'];
                        $_SESSION['idUser'] = $laLigne['idUser'];
                ?>
                        <script>
                            document.location.href = "index.php?page=Controler&param=Message&var=connexionVrai";
                        </script>
                    <?php
                    } else {
                    ?>
                        <script>
                            document.location.href = "index.php?page=Controler&param=Message&var=connexionFaux";
                        </script>
                    <?php
                    }
                } else {
                    ?>
                    <script>
                        document.location.href = "index.php?page=Controler&param=Message&var=connexionFauxChamps";
                    </script>
                <?php
                }
                ?>
                <?php
                break;
            }
        case 'Inscription': {
                // test si les champs sont remplient
                if (!empty($_REQUEST['mdp']) && !empty($_REQUEST['login']) && !empty($_REQUEST['prenom']) && !empty($_REQUEST['nom'])) {
                    // test si mdp et mdpConfirmation son egaux
                    if ($_REQUEST['mdp'] == $_REQUEST['mdpConfirmation']) {
                        // test si le login est dans la bd si pas trouvé =0 si existant =1
                        if (ComparePasse($_REQUEST['login']) == 0) {
                            $mdp = sha1(Conversion($_REQUEST['mdp']));
                            $Pdo->Inscription(Conversion($_REQUEST['nom']), Conversion($_REQUEST['prenom']), Conversion($_REQUEST['login']), $mdp);
                ?>
                            <script>
                                document.location.href = "index.php?page=Controler&param=Message&var=inscriptionVrai";
                            </script>
                        <?php
                        } else {
                        ?>
                            <script>
                                document.location.href = "index.php?page=Controler&param=Message&var=ErreurLogin";
                            </script>
                        <?php
                        }
                    } else {
                        ?>
                        <script>
                            document.location.href = "index.php?page=Controler&param=Message&var=ErreurPasse";
                        </script>
                    <?php
                    }
                } else {
                    ?>
                    <script>
                        document.location.href = "index.php?page=Controler&param=Message&var=ErreurEmpty";
                    </script>
                <?php
                }
                ?>
            <?php
                break;
            }
        case 'se-deconnecter': {
                //////////////////////////////////////// detruit les variable session chargé dans valid Connexion
                unset($_SESSION['nom']);
                unset($_SESSION['prenom']);
                unset($_SESSION['login']);
                unset($_SESSION['mdp']);
                unset($_SESSION['idUser']);
                unset($_SESSION['droit']);
                session_destroy();
            ?>
                <script>
                    document.location.href = "index.php?page=Controler&param=Connexion";
                </script>
<?php
                break;
            }
        default:
            include(dirname(__FILE__) . '/../Vue/includes/connexion.php');
            break;
    }
}
