<div class="colorfont">
	<div class="container" style="padding: 10px;">
		<div class="card">
		  	<div class="card-header">
		    	<h1 class="font1">Présentation du compositeur</h1>
		  	</div>
		  	<div class="card-body">
		    	<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
		 	</div>
		</div>
		<br/>
		<div class="card bg-dark">
	  		<h1 style="padding: 10px;" class="font2">Liste des actualités </h1>
	        <?php      
	          foreach ( $lesLignes as $uneActu ) 
			  {
			  	echo '<div style="padding: 10px;">';
			  		echo '<div class="card mb-3">';
			  			echo '<div class="card-body">';
							echo '<span class="font3"><h5 class="card-title">'.$titre = $uneActu['titreActu'].'</h5></span>';
							echo '<p class="card-text">'.$texte = $uneActu['texteActu'].'</p>';
							echo '<p class="card-text"><small class="text-muted">'.$date = $uneActu['dateActu'].'</small></p>';
						echo '</div>';
					echo '</div>'; 
				echo '</div>';
	          }
			?>
		</div>
	</div>
</div>