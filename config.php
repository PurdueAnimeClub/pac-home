<?php
$hideLineupPAC = false;
$hideLineupClassic = false;
$hideLineup27 = false;

$result = mysqli_query($con, 'SELECT * FROM home_config');
while($row = mysqli_fetch_array($result)) {
	if($row['Option'] == 'hideLineupPAC') $hideLineupPAC = $row['Value'];
	if($row['Option'] == 'hideLineupClassic') $hideLineupClassic = $row['Value'];
	if($row['Option'] == 'hideLineup27') $hideLineup27 = $row['Value'];
}
?>
