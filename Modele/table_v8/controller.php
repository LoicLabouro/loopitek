<?php
require_once(dirname(__FILE__) . '/../Fonction/Function_BD.php');

/* On se connecte au PDO du projet qui à été créer dans function_BD.php */

$Pdo = Pdosite_EMC::getPdosite_EMC();

if (isset($_REQUEST['param'])) {
    $param = $_REQUEST['param'];
    switch ($param) {
            // Routes vers les pages publiques
            // On renvoie à la page Accueil 
        case 'accueil': {
                include(dirname(__FILE__) . '/../Vues/includes/accueil.php');
                break;
            }

            // On renvoie à la page Galerie
        case 'galerie': {
            $lesLignesGalerie=$Pdo->getImageGalerie();
                include(dirname(__FILE__) . '/../Vues/includes/galerie.php');
                break;
            }

            // On renvoie à la page Contact
        case 'contact': {
                include(dirname(__FILE__) . '/../Vues/includes/Formulaire/contact.php');
                break;
            }

            // On renvoie à la page Partenariats
        case 'partenariat': {
                $lesLignesPartenariatPair=$Pdo->getListPartenairePair();
                $lesLignesPartenariatImpair = $Pdo->getListPartenaireImpair();
                include(dirname(__FILE__) . '/../Vues/includes/partenariat.php');
                break;
            }

        case 'commentaire': {
            $lesLignesCommentaire = $Pdo->getListCommentaire();
            include(dirname(__FILE__) . '/../Vues/includes/Formulaire/commentaire.php');
            break;
        }

            // Routes vers les pages privées
            // On renvoi sur une page d'erreur
        case 'erreur': {
                include(dirname(__FILE__) . '/../Vues/includes/erreurs/erreur_chargement.php');
                break;
            }

            // On renvoi à la page admin
        case 'admin' : 
            {
                include(dirname(__FILE__).'/../Vues/includes/admin.php');
                break;
            }

        // Page de confirmation des formulaires
        case 'confirmeCommentaire':
            {
                include(dirname(__FILE__).'/../Vues/includes/confirmeCommentaire.php');
                break;
            }

    }
}
