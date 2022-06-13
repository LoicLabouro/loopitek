<section>
	<div class="colorfont_Trance">
		<h1 align="center" class="font1">Trance</h1>
		<div class="col">
			<div class="row">
				<div class="col">
					<div class="listeMP3">
						<table class="table">
							<thead class='thead-dark'>
								<tr>
									<th>Ordre</th>
									<th>Titre</th>
									<th>Genre</th>
									<th>Action</th>
								</tr>
							</thead>			
							<tbody>
								<?php

								foreach ($ligneTrance as $uneTrance)
								{
									echo "<tr>";
									echo "<td>".$uneTrance['idMusique']."</td>";
									echo "<td>".$uneTrance['titre']."</td>";
									echo "<td>".$uneTrance['libGenre']."</td>";
									echo "<td>";
									echo "<a href='".$uneTrance['lien']."' target='new'><i class='fas fa-play'></i></a> ";

									if(isset($_SESSION['droit'])&&$_SESSION['droit']==1)
									{
										echo "<a href='index.php?page=Controler&param=Admin_Musique'><i class='fas fa-plus'></i></a> ";
									}

									if(isset($_SESSION['droit'])&&$_SESSION['droit']==1)
									{
										echo "<a href='index.php?page=Controler&param=supprimerMusique&idM=".$uneTrance['idMusique']."'><i class='fas fa-trash'></i></a>";
									}
									echo "</td>";
									echo "</tr>";

								} 
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>