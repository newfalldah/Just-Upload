<?php
	
	// include the database connection
	include 'connection.php';
	// This is where we are going to upload our image to the server
	$image_info = array(

					'name'		=>mysqli_real_escape_string($db_con,$_POST['image_name']),
					'image'		=>$_FILES['image']['name'],
					'image_tmp'	=>$_FILES['image']['tmp_name']
		);


	// check the image etension

	if(!empty($image_info['name']) && !empty($image_info['image'])){

		// Next step - check the image extension

		$explode_name = explode('.', $image_info['image']);
		$extension_image = strtolower(end($explode_name));
		$random_number = rand(0,9999);

		// Check if the extension is correct or not 
		if($extension_image == 'jpg' || $extension_image == 'png' || $extension_image == 'jpeg'){

			// Proceed to save the image name in the database and save it in the folder too
			$final_name = $random_number.$image_info['image'];
			$n_img = $image_info['name'];
			// Save the data in the database and then save the image in the folder
			mysqli_query($db_con,"INSERT INTO uploaded_images(name,image_path) values('$n_img','$final_name')");

			move_uploaded_file($image_info['image_tmp'], '../uploads/'.$final_name);


			// Header to the index page
			header('location:../index.php');
		}else{

			// If the format (extension) is not a jpeg,jpg or a png [Standard image formats]

			echo "This is not an image";
			header('location:../index.php');
		}


	}else{

		echo "Please complete the form !";
		header('location:../index.php');
	}
?>