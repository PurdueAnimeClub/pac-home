<div class="">
	<h2>
		Announcements
	</h2>
	<?php
		$index = $_GET['index']+0;
		$count = 5;
		$prevIndex = $index-$count;
		$nextIndex = $index+$count;
		if($prevIndex < 0)
			$prevIndex = 0;
		$start = ($index == 0);
		$end = false;
		
		for ($x=$index; !$end && $x<$nextIndex; $x++) {
			$news = get_news($con, $x);
			if($news != '') {
				echo '<div class="well">'.$news.'</div>';
			} else {
				$end = true;
			}
		}
	?>
	<ul class="pager">
		<li class="previous<?php if($start) echo ' disabled'; ?>"><a href="./?page=news&index=<?php echo $start ? $index : $prevIndex; ?>">&larr; Newer</a></li>
		<li class="next<?php if($end) echo ' disabled'; ?>"><a href="./?page=news&index=<?php echo $end ? $index : $nextIndex; ?>">Older &rarr;</a></li>
	</ul>
</div>
