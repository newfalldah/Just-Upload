<?php
# include the connection to the database 
require 'back_end/connection.php';
#Get the input we have to search
$search = mysqli_real_escape_string($db_con,htmlentities($_GET['search']));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Searching...</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="search_top_bar">
	<form method="get" action="search.php">
		<input type="text" name="search" placeholder="Search..." class="search_search_input">
	</form>
</div><!--search_top_bar-->

<a href="index.php" id="link_back_home">Go Home</a>
<div id="search_results_general_container">
	<?php
		$search_sql = mysqli_query($db_con,"SELECT * FROM uploaded_images WHERE name LIKE '%$search%' ");
		# check if there is results

		if (mysqli_num_rows($search_sql) > 0 ) {
			# There is results available
			#retrieve from database
			while($r = $search_sql->fetch_assoc()){
			    $image_search = $r['image_path'];
			    $f_search_image = "uploads/{$image_search}";
			    echo "<center><img id='single_upload_container' src="<?php echo $f_search_image?>"></img></center>";
			}
		} else {
			#die(mysqli_error($db_con));
			echo "<span style='color:red; font-size:14px;'>There's No results for this search :( <a href='index.php'>Go Home</a></span>";
		}
	?>
</div><!--search_results_general_container-->
</body>
</html>
