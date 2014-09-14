<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	// Get title
	$title = $lineupTitle;
	
	// Load lineups for the three groups
	function load($club) {
		global $con;
		$return = Array();
		$result = $con -> query("SELECT * FROM home_lineup WHERE Club='".$club."' ORDER BY Slot ASC");
		while ($row = $result -> fetch_array()) {
			array_push($return, $row);
		}
		return $return;
	}
	$lineupPAC = load("pac");
	$lineupClassic = load("classic");
	$lineup27 = load("27");
	
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
								<thead><tr><th></th><th></th><th>Show</th><th>Episode</th></tr></thead><tbody>
									<?php
										$realSlot = 1;
										for ($x=0; $x<$count; $x++) {
											if($lineup[$x]['ANN_ID'] < 0) {
												echo '<tr><td></td><td></td><td><small>-Break-</small></td></tr>';
												continue;
											}
											$slot = $realSlot++;
											$id = $lineup[$x]['ANN_ID'];
											$name = $lineup[$x]['Name'];
											$episode = $lineup[$x]['Episode'];
											echo '<tr data-target="#infoModal'.$id.'" data-toggle="modal" href="./modal.php?id='.$id.'&name='.str_replace(' ', '+', $name).'" class="show-hand"><td><i class="fa fa-info-circle"></i></td><td>'.$slot.'</td><td>'.$name.'</td><td>'.$episode.'</td></tr>';
											?>
											<div class="modal fade" id="infoModal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel<?php echo $id; ?>" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
															<h4 class="modal-title" id="infoModalLabel<?php echo $id; ?>">Loading...</h4>
														</div>
														<div class="modal-body"><h1><i class="fa fa-circle-o-notch fa-spin"></i></h1></div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-check"></i> Close</button>
														</div>
													</div>
												</div>
											</div>	
											<?php
										}
									?>
							</tbody></table>
					<?php } ?>
				</div>
				<div class="panel-footer" style="text-align: center"><?php echo $foot; ?></div>
			</div>
		<?php
	}

	echo "<h3>".$title."</h3>";
	if($hideLineupPAC && $hideLineupClassic && $hideLineup27) {
		echo "<p>Nothing here right now.</p>";
	} else {
		if(!$hideLineupPAC) display("PAC", $lineupPAC, "Thursdays at 7pm");
		if(!$hideLineupClassic) display("PAC Classic", $lineupClassic, "Mondays at 7pm");
		if(!$hideLineup27) display("PAC 27+", $lineup27, "Wednesdays at 7pm");
	}
?>
