<section>
	<ul class="nav">
		<li class="Accueil"><a class="nav-link" href="index.php?page=Controler&param=Accueil">Accueil</a></li>
		<li class="Galerie"><a class="nav-link" href="index.php?page=Controler&param=Galerie">Galerie</a></li>
		<li class="Musique">
			<div class="dropdown">
	  			<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Musique</button>
	  			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
	    			<a class="dropdown-item" href="index.php?page=Controler&param=Trance">Trance</a>
	    			<a class="dropdown-item" href="index.php?page=Controler&param=Raggatek">Raggatek</a>
	    			<a class="dropdown-item" href="index.php?page=Controler&param=Frenchcore">Frenchcore</a>
	    			<a class="dropdown-item" href="index.php?page=Controler&param=Hardstyle">Hardstyle</a>
	    			<a class="dropdown-item" href="index.php?page=Controler&param=Electro">Electro</a>
	  			</div>
			</div>
		</li>
		<li class="menu-contact"><a class="nav-link" href="index.php?page=Controler&param=Contact">Contact</a></li>
        <?php
            if(isset($_SESSION['droit'])&&$_SESSION['droit']==1)
            {
                ?><li class="connexion"><a class="nav-link" href="index.php?page=Controler&param=Admin">Administration</a> <?php
            }
            if(!empty($_SESSION['prenom'])&&!empty($_SESSION['nom']))
            {
                ?><li class="Accueil"><a class="nav-link" href="index.php?page=Controler&param=GestionComm">Gérer mes commentaires</a></li><?php
            }
            if(!empty($_SESSION['prenom'])&&!empty($_SESSION['nom']))
            {
                ?><li class="Accueil"><a class="nav-link" href="index.php?page=Controler&param=se-deconnecter">Déconnexion de <?php echo $_SESSION['prenom']." ".$_SESSION['nom']?></a></li><?php
            }
            else
            {
                ?><li class="Galerie"><a class="nav-link" href="index.php?page=Controler&param=Entree">Connexion</a></li><?php
            }
            ?>
	</ul>
</section>