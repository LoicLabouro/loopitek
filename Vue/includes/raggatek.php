<section>
	<div class="colorfont_Raggatek">
		<h1 align="center" class="font1">Raggatek</h1>
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

								foreach ($ligneRagga as $uneRagga)
								{
									echo "<tr>";
									echo "<td>".$uneRagga['idMusique']."</td>";
									echo "<td>".$uneRagga['titre']."</td>";
									echo "<td>".$uneRagga['libGenre']."</td>";
									echo "<td>";
									echo "<a href='".$uneRagga['lien']."' target='new'><i class='fas fa-play'></i></a> ";

									if(isset($_SESSION['droit'])&&$_SESSION['droit']==1)
									{
										echo "<a href='index.php?page=Controler&param=Trance&id=".$uneRagga['idMusique']."'><i class='fas fa-plus'></i></a> ";
									}

									if(isset($_SESSION['droit'])&&$_SESSION['droit']==1)
									{
										echo "<a href='index.php?page=Controler&param=Trance'><i class='fas fa-trash'></i></a>";
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