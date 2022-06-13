<section>
	<div class="colorfont_Electro">
		<h1 align="center" class="font1">Electro</h1>
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

								foreach ($ligneElectro as $uneElectro) {
									echo "<tr>";
									echo "<td>" . $uneElectro['idMusique'] . "</td>";
									echo "<td>" . $uneElectro['titre'] . "</td>";
									echo "<td>" . $uneElectro['libGenre'] . "</td>";
									echo "<td>";
									echo "<a href='" . $uneElectro['lien'] . "' target='new'><i class='fas fa-play'></i></a> ";

									if (isset($_SESSION['droit']) && $_SESSION['droit'] == 1) {
										echo "<a href='index.php?page=Controler&param=Trance&id=" . $uneElectro['idMusique'] . "'><i class='fas fa-plus'></i></a> ";
									}

									if (isset($_SESSION['droit']) && $_SESSION['droit'] == 1) {
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