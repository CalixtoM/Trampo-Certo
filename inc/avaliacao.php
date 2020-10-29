
<?php
if(!isset($_GET['cdus'])){
	$nota_sql='SELECT SUM(ds_nota) as soma, COUNT(ds_nota) as count FROM nota WHERE id_usuarion = "'.$_SESSION['cd'].'" ';
		if ($nota_result=$mysqli->query($nota_sql)) {
			if ($nota_result->num_rows>0) {	
			$qtnd=$nota_result->num_rows;
				while ($nota = $nota_result ->fetch_object()) {
					$int =$nota->soma;
					$div =$nota->count;
					if ($int>0 && $div>0) {
						$total=$int/$div;				

										if ($total == 5) {
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo $qtnd.' Avaliações';
										}
										if ($total >= 4 && $total < 5) {
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo $qtnd.' Avaliações';

										}
										if ($total >= 3 && $total < 4) {
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo $qtnd.' Avaliações';

										}
										if ($total >= 2 && $total < 3) {
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo $qtnd.' Avaliações';

										}
										if ($total >= 1 && $total < 2) {
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo $qtnd.' Avaliações';

										}
										if ($total >= 0 && $total < 1) {
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo $qtnd.' Avaliações';

										}
										}else{
											echo 'Experiência insuficiente para geração de notas.';
										}
									}
								}
							}
						}if (isset($_GET['cdus'])) {
							$nota_sql='SELECT SUM(ds_nota) as soma, COUNT(ds_nota) as count FROM nota WHERE id_usuarion = "'.$_GET['cdus'].'" ';
							if ($nota_result=$mysqli->query($nota_sql)) {
							if ($nota_result->num_rows>0) {	
								$qtnd=$nota_result->num_rows;
								while ($nota = $nota_result ->fetch_object()) {
								$int =$nota->soma;
								$div =$nota->count;
									if ($int>0 && $div>0) {
									$total=$int/$div;				

										if ($total == 5) {
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo $qtnd.' Avaliações';
										}
										if ($total >= 4 && $total < 5) {
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo $qtnd.' Avaliações';

										}
										if ($total >= 3 && $total < 4) {
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo $qtnd.' Avaliações';

										}
										if ($total >= 2 && $total < 3) {
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo $qtnd.' Avaliações';

										}
										if ($total >= 1 && $total < 2) {
											echo '<img src="img/avaliacao/sim.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo $qtnd.' Avaliações';

										}
										if ($total >= 0 && $total < 1) {
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo '<img src="img/avaliacao/nao.png" widht="20" height="20">';
											echo $qtnd.' Avaliações';

										}
										}else{
											echo 'Experiência insuficiente para geração de notas.';
										}
									}
								}
							}
						}


?>