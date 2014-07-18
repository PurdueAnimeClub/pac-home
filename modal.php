<?php
$id = htmlspecialchars($_GET['id']);

// parse xml from ann
$data = simplexml_load_file("http://cdn.animenewsnetwork.com/encyclopedia/api.xml?anime=".$id)->anime;
$mainTitle = "";
$thumbnail = "";
$summary = "";
$altTitles = array();
$genres = array();
$themes = array();

foreach($data->info as $info) {
	if($info['type'] == "Main title")
		$mainTitle = htmlspecialchars($info);
	if($info['type'] == "Picture")
		$thumbnail = htmlspecialchars($info['src']);
	if($info['type'] == "Plot Summary")
		$summary = htmlspecialchars($info);
	if($info['type'] == "Genres")
		array_push($genres, htmlspecialchars($info));
	if($info['type'] == "Themes")
		array_push($themes, htmlspecialchars($info));
	if($info['type'] == "Alternative title")
		array_push($altTitles, htmlspecialchars($info));
}
?>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4 class="modal-title" id="infoModalLabel<?php echo $id; ?>"><?php echo $mainTitle; ?></h4>
</div>
<div class="modal-body">
	<div class="row clearfix">
		<div class="col-md-4 column">
			<img alt="thumbnail" src="<?php echo $thumbnail; ?>" class="img-thumbnail" />
			<h4>Genres</h4>
			<?php
				for($x = 0; $x < count($genres); $x++) {
					echo "<span class='label label-default'>".$genres[$x]."</span> ";
				}
			?>
			<h4>Themes</h4>
			<?php
				for($x = 0; $x < count($themes); $x++) {
					echo "<span class='label label-default'>".$themes[$x]."</span> ";
				}
			?>
		</div>
		<div class="col-md-8 column">
			<h4>Summary</h4>
			<p>
				<?php echo $summary; ?>
			</p>
			<h4>Alternate Titles</h4>
			<ul>
				<?php
					for($x = 0; $x < count($altTitles); $x++) {
						echo "<li>".$altTitles[$x]."</li>";
					}
				?>
			</ul>
		</div>
	</div>
</div>
<div class="modal-footer">
	<table class="table">
	<tr>
	<td style="text-align:left; vertical-align:middle">Source: <a target="_blank" href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=<?php echo $id; ?>">ANN</a></td>
	<td style="text-align:right"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></td>
	</tr>
	</table>
</div>
