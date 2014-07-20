<!-- PAC Announcements -->
<div class="well">
	<h2>
		Announcements
	</h2>
	<?php echo get_news($con, 0); ?>
	<p><small><a href="./?page=news">Previous announcements</a></small></p>
</div>

<!-- PAC Theater -->
<div class="well">
	<h2>
		PAC Theater
	</h2>
	<div id="links">
		<?php
			$query = "SELECT * FROM home_theater ORDER BY Rand() ASC";
			$result = mysqli_query($con, $query);
			while ($row = mysqli_fetch_array($result)) {
				$video = $row['Video'];
				$url = 'http://www.youtube-nocookie.com/embed/'.$video.'?wmode=transparent';
				$poster = 'http://img.youtube.com/vi/'.$video.'/maxresdefault.jpg';
				$title = $row['Title'];
				echo '<a type="text/html" href="'.$url.'" title="'.$title.'" data-poster="'.$poster.'" data-youtube="'.$video.'"></a>';
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
	<p><small><a href="#">Suggest an AMV</a></small></p>
</div>

<!-- PAC Sub groups -->
<div class="well">
	<div class="row">
		<div class="col-sm-4">
			<div class="thumbnail">
				<img alt="600x200" src="assets/img/pac-thumbnail.jpg" />
				<div class="caption">
					<h3>
						PAC
					</h3>
					<p>
						Purdue Anime Club (PAC) is Purdue University's premier anime viewing club.  PAC
						meets once a week on Thursdays from 7 p.m. to around 11:30 p.m. and is typically
						held in Stewart Center.
					</p>
					<p>
						<a class="btn btn-primary" href="./?page=pac">Details</a>
					</p>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="thumbnail">
				<img alt="600x200" src="assets/img/classic-thumbnail.jpg" />
				<div class="caption">
					<h3>
						PAC Classic
					</h3>
					<p>
						PAC Classic is our sub-group dedicated to showing those classic anime series,
						ovas, and movies. Whether you missed them the first time around or if you enjoy
						rewatching your favorite old shows, this is the place to be.
					</p>
					<p>
						<a class="btn btn-primary" href="./?page=classic">Details</a>
					</p>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="thumbnail">
				<img alt="600x200" src="assets/img/27-thumbnail.jpg" />
				<div class="caption">
					<h3>
						PAC 27+
					</h3>
					<p>
						PAC 27+ is our sub-group that shows anime that otherwise would not fit in the
						regular lineup due to the length of the programs. It usually features shows
						which are greater than 27 episodes in length.
					</p>
					<p>
						<a class="btn btn-primary" href="./?page=27">Details</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
