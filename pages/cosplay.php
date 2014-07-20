<h2>Purdue Anime Cosplay Brigade</h2>
<div class="well">
	<p>
		This group gets together to create costumes and cosplay from all skill groups. It usually meets on Sunday nights
		during the normal semesters.
	</p>
	
	<div id="links">
		<?php
			$query = "SELECT * FROM home_cosplaypics ORDER BY Position ASC";
			$result = mysqli_query($con, $query);
			while ($row = mysqli_fetch_array($result)) {
				$href = $row['File'];
				$title = $row['Title'];
				echo '<a href="'.$href.'" title="'.$title.'"></a>';
			}
		?>
	</div>
	
	<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-carousel blueimp-gallery-controls">
		<div class="slides"></div>
		<h3 class="title"></h3>
		<a class="prev">‹</a>
		<a class="next">›</a>
		<a class="play-pause"></a>
		<ol class="indicator"></ol>
	</div>
</div>
