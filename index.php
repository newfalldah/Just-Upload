<!DOCTYPE html>
<html>
<head>
	<title>// Just Upload //</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div id='lateral_panel_container'>
	<div id="panel_search_input_container">
		<form method='get' action="search.php">
			<input type="text" name="search" class='panel_search_input' spellcheck="false" autocomplete="off" placeholder="Search Image...">
		</form>
	</div><!--panel_search_input_container-->

	<div id="panel_upload_container">
		<!-- Upload image form --> 
		<form id="upload_image_form" method='post' action='back_end/upload_image.php' enctype="multipart/form-data">
			<input type="text" 		name="image_name" placeholder="Image Name" 	class="upload_image_input" spellcheck="false" autocomplete="off">
			<input type="file" 		name="image" 								class="upload_image_file_input">
			<input type="submit" 	name="upload_submit" value="Upload Image" 	class="upload_image_submit">
		</form><!--upload_image_form-->
	</div><!--panel_upload_container-->

	<button id="show_upload_image_container" onclick="show_upload_image_container()">Upload Image</button><!--show_upload_image_container-->
</div><!--lateral_panel_container-->

<div id="index_latest_uploads_container">
	

	<?php

		// Show some of the uploaded images 
		require 'back_end/connection.php';

		$get_images = mysqli_query($db_con,"SELECT * FROM uploaded_images order by 1 desc");

		// Fetch the results 

		while($row = $get_images->fetch_assoc()){


			$folder = "uploads/";
			$image_to_show = $row['image_path'];

			$final_image_to_show = $folder.$image_to_show;

			// Retrieve te single container and the image inside of it
			echo "<center><img id='single_upload_container' src='$final_image_to_show'></img></center>";
		}

	?>
</div><!--index_latest_uploads_container-->

<script type="text/javascript" src='js/general.js'></script>
</body>
</html>

