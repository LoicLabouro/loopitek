<?php

/** 
 * Classe d'accès aux données. 
 * Utilise les services de la classe PDO
 * pour l'application GSB
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoActivite qui contiendra l'unique instance de la classe
 * @package default
 * @author A.C.
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */
class Pdosite_dj
{
    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=site_dj';
    private static $user = 'root';
    private static $mdp = '';
    private static $monPdo;
    private static $monPdosite_dj = null;


    /*	                    
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */
    private function __construct()
    {
        Pdosite_dj::$monPdo = new PDO(Pdosite_dj::$serveur . ';' . Pdosite_dj::$bdd, Pdosite_dj::$user, Pdosite_dj::$mdp);
        Pdosite_dj::$monPdo->query("SET names 'utf8'");
    }

    public function _destruct()
    {
        Pdosite_dj::$monPdo = null;
    }

    public static function getPdosite_dj()
    {
        if (Pdosite_dj::$monPdosite_dj == null) {
            Pdosite_dj::$monPdosite_dj = new Pdosite_dj();
        }
        return Pdosite_dj::$monPdosite_dj;
    }
    /////////////////function get()////////////////////
    public function getListActu()
    {
        $req = "select idActu, titreActu, texteActu, dateActu from actualite order by dateActu DESC ";
        //echo $req;
        $res = Pdosite_dj::$monPdo->query($req);
        $lesLignes = $res->fetchAll();
        $nbLignes = count($lesLignes);
        for ($i = 0; $i < $nbLignes; $i++) {
            $date = $lesLignes[$i]['dateActu'];
            $lesLignes[$i]['dateActu'] = dateAnglaisVersFrancais($date);
        }
        return $lesLignes;
    }
    public function getListCommentaire()
    {
        $req = "select idComment, contenu, commentaire.idUser, login from commentaire inner join users on users.idUser=commentaire.idUser order by commentaire.idUser ";
        //echo $req;
        $res = Pdosite_dj::$monPdo->query($req);
        $lesLignes2 = $res->fetchAll();
        $nbLignes = count($lesLignes2);
        return $lesLignes2;
    }
    public function getListCommentairesParUtilisateur($login)
    {
        $req = "SELECT idComment, contenu, commentaire.idUser, login from commentaire inner join users on users.idUser=commentaire.idUser where login='$login'order by commentaire.idUser ";
        //echo $req;
        $res = Pdosite_dj::$monPdo->query($req);
        $lesLignes2 = $res->fetchAll();
        $nbLignes = count($lesLignes2);
        return $lesLignes2;
    }
    public function getListUsers()
    {
        $req = "SELECT * FROM  users ";
        //echo $req;
        $var = Pdosite_dj::$monPdo->query($req);
        $lesLignes = $var->fetchAll();
        $nbLignes = count($lesLignes);
        return $lesLignes;
    }
    public function getListGalerie()
    {
        $req = "SELECT * FROM  galerie ";
        //echo $req;
        $var = Pdosite_dj::$monPdo->query($req);
        $lesLignes = $var->fetchAll();
        $nbLignes = count($lesLignes);
        return $lesLignes;
    }
    public function getListTrance()
    {
        $req = 'SELECT idMusique, titre, genre.libelleG as libGenre, lien
                        FROM musique
                        INNER JOIN genre on genre.idGenre = musique.genre
                        WHERE musique.genre= 1';
        $var = Pdosite_dj::$monPdo->query($req);
        $lesLignes = $var->fetchAll();
        $nbLignes = count($lesLignes);
        return $lesLignes;
    }

    public function getListRagga()
    {
        $req = 'SELECT idMusique, titre, genre.libelleG as libGenre
                        FROM musique
                        INNER JOIN genre on genre.idGenre = musique.genre
                        WHERE musique.genre= 2';
        $var = Pdosite_dj::$monPdo->query($req);
        $ligneRagga = $var->fetchAll();
        $nbLignes = count($ligneRagga);
        return $ligneRagga;
    }

    public function getListFrenchcore()
    {
        $req = 'SELECT idMusique, titre, genre.libelleG as libGenre
                        FROM musique
                        INNER JOIN genre on genre.idGenre = musique.genre
                        WHERE musique.genre= 3';
        $var = Pdosite_dj::$monPdo->query($req);
        $ligneFrenchcore = $var->fetchAll();
        $nbLignes = count($ligneFrenchcore);
        return $ligneFrenchcore;
    }

    public function getListHardstyle()
    {
        $req = 'SELECT idMusique, titre, genre.libelleG as libGenre
                        FROM musique
                        INNER JOIN genre on genre.idGenre = musique.genre
                        WHERE musique.genre= 4';
        $var = Pdosite_dj::$monPdo->query($req);
        $ligneHard = $var->fetchAll();
        $nbLignes = count($ligneHard);
        return $ligneHard;
    }

    public function getListElectro()
    {
        $req = 'SELECT idMusique, titre, genre.libelleG as libGenre
                        FROM musique
                        INNER JOIN genre on genre.idGenre = musique.genre
                        WHERE musique.genre= 5';
        $var = Pdosite_dj::$monPdo->query($req);
        $ligneElectro = $var->fetchAll();
        $nbLignes = count($ligneElectro);
        return $ligneElectro;
    }
    //////////////////////function insert//////////////////////////

    public function insertComment($commentaire, $idUser)
    {
        $req = "Insert into commentaire(idComment ,contenu, idUser)
        values(null,'$commentaire',$idUser)";
        //echo $req;
        Pdosite_dj::$monPdo->exec($req);
    }
    public function insertActu($titreActu, $texteActu)
    {
        $req = "INSERT INTO actualite (idActu, titreActu, texteActu, dateActu) VALUES(null,'$titreActu','$texteActu',now())";
        //echo $req;
        Pdosite_dj::$monPdo->exec($req);
    }
    public function insertGalerie($nomMedia, $typeMedia)
    {
        $req = "INSERT INTO galerie (idMedia, nomMedia, typeMedia) VALUES(null,'$nomMedia',$typeMedia)";
        //echo $req;
        Pdosite_dj::$monPdo->exec($req);
    }

    public function insertMusique($titre, $genre)
    {
        $req = "INSERT INTO musique (idMusique, genre, lien) VALUES(null,'$titre',$genre)";
        echo $req;
        Pdosite_dj::$monPdo->exec($req);
    }
    ////////////////////fonction modif////////////////////

    public function modifActu($titreActu, $texteActu, $id)
    {
        $req = "update actualite set titreActu ='$titreActu' ,texteActu ='$texteActu' where idActu=$id";
        //echo $req;
        Pdosite_dj::$monPdo->exec($req);
    }
    public function modifGalerie($nomMedia, $typeMedia, $idMedia)
    {
        $req = "update galerie set nomMedia ='$nomMedia' ,typeMedia ='$typeMedia' where idMedia=$idMedia";
        //echo $req;
        Pdosite_dj::$monPdo->exec($req);
    }
    //modification des comms
    public function modifComment($idComment, $contenu)
    {
        $req = "update commentaire set contenu ='$contenu' where idComment=$idComment";
        //echo $req;
        Pdosite_dj::$monPdo->exec($req);
    }
    //////////////////fonction supression//////////////////////

    public function supprimerActu($id)
    {
        $req = "delete from actualite where idActu=$id";
        //echo $req;
        Pdosite_dj::$monPdo->exec($req);
    }
    public function supprimerComment($idCom)
    {
        $req = "delete from commentaire where idComment=$idCom";
        //echo $req;
        Pdosite_dj::$monPdo->exec($req);
    }
    public function supprimerGalerie($idGalerie)
    {
        $req = "delete from galerie where idMedia=$idGalerie";
        //echo $req;
        Pdosite_dj::$monPdo->exec($req);
    }

    public function supprimerMusique($idM)
    {
        $req = "delete from musique where idMusique=$idM";
        //echo $req;
        Pdosite_dj::$monPdo->exec($req);
    }

    ////////////////////////function Connexion et inscription/////////////////////////
    public function connexion($login, $mdp)
    {
        $req = "SELECT * FROM users WHERE login='$login' AND mdp='$mdp'";
        //echo $req;
        $var = Pdosite_dj::$monPdo->query($req);
        // recupére la ligne corepondant au paramétré rentrés
        $laLigne = $var->fetch();
        return $laLigne;
    }
    public function Inscription($nom, $prenom, $login, $mdp)
    {
        $req = "Insert into users (idUser,nom, prenom, login, mdp,droit) VALUES(null,'$nom','$prenom','$login','$mdp',0/* par default le droit est défini à zero=utilisateur 1=admin*/)";
        //echo $req;
        Pdosite_dj::$monPdo->exec($req);
    }
}
