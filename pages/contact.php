<h2>Contact Information</h2>
<div class="well">
	<div id="email">
		<table id="contacts" class="table table-hover">
			<tr><th>Position</th><th>Name</th><th>Contact</th></tr>
		</table>
	</div>

	<script type="text/javascript">
		var elements = [
			<?php
				$query = "SELECT * FROM home_contact where Contact <> ''";
				$result = mysqli_query($con, $query);
				while($row = mysqli_fetch_array($result)) {
					echo '["'.$row['Position'].'", "'.$row['Name'].'", "'.str_rot13($row['Contact']).'"],';
				}
			?>
		];
		
		for(var i = 0; i < elements.length; i++) {
			var position = elements[i][0];
			var name = elements[i][1];
			var contact = rot13(elements[i][2]);
			var html = '<tr href="mailto:'+contact+'?subject=PAC" class="clickable show-hand"><td>'+position+'</td><td>'+name+'</td><td>'+contact+'</td></tr>';
			$("#contacts").append(html);
		}
	</script>
</div>
