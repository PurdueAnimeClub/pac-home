<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	// Paths
	$root = "assets/lineup/";
	$pathTitle = $root."title";
	$pathPAC = $root."pac";
	$pathClassic = $root."classic";
	$path27 = $root."27";

	// Get title
	$file = fopen($pathTitle, "r") or die("An error occured!");
	$title = fread($file, filesize($pathTitle));
	fclose($file);
	
	// Load lineups for the three groups
	function load($path) {
		$result = Array();
		$file = fopen($path, "r") or die("An error occured!");
		$slot = 0;
		$index = 0;
		while(!feof($file)) {
			$line = rtrim(fgets($file), "\n");
			$show = NULL;
			
			if(strlen($line) > 0) {
				$split = explode('	', $line);
				
				$show = Array();
				$show['slot'] = "".(++$slot);
				$show['id'] = $split[0];
				$show['episode'] = $split[1];
				$show['name'] = $split[2];
			}
			
			if(!feof($file)) $result[$index++] = $show;
		}
		fclose($file);
		return $result;
	}
	$lineupPAC = load($pathPAC);
	$lineupClassic = load($pathClassic);
	$lineup27 = load($path27);
	
	// Display lineups
	function display($head, $lineup, $foot) {
		?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<?php echo $head; ?>
					</h3>
				</div>
				<div class="panel-body">
					<?php
						$count = count($lineup);
						if($count > 0) {
					?>
							<table class="table table-hover table-condensed">
								<tr><th></th><th>Show</th><th>Episode</th></tr>
									<?php
										for ($x=0; $x<$count; $x++) {
											if($slot = $lineup[$x] == NULL) {
												echo '<tr><td></td><td><small>-Break-</small></td><td></td></tr>';
												continue;
											}
											$slot = $lineup[$x]['slot'];
											$id = $lineup[$x]['id'];
											$name = $lineup[$x]['name'];
											$episode = $lineup[$x]['episode'];
											echo '<tr data-target="#infoModal'.$id.'" data-toggle="modal" href="./modal.php?id='.$id.'&name='.str_replace(' ', '+', $name).'" class="anime"><td>'.$slot.'</td><td>'.$name.'</td><td>'.$episode.'</td></tr>';
											?>
											<div class="modal fade" id="infoModal<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel<?php echo $id ?>" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
													</div>
												</div>
											</div>	
											<?php
										}
									?>
							</table>
					<?php } ?>
				</div>
				<div class="panel-footer">
					<?php echo $foot; ?>
				</div>
			</div>
		<?php
	}

	echo "<h3>".$title."</h3>";
	display("PAC", $lineupPAC, "Thursdays at 7pm");
	echo "<hr />";
	display("PAC Classic", $lineupClassic, "Mondays at 7pm");
	echo "<hr />";
	display("PAC 27+", $lineup27, "Wednesdays at 7pm");
?>
