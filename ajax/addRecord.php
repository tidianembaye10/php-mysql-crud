<?php
/**
 * @name: PHP-MySQL CRUD
 * @description: Sample project of CRUD Operations with PPHP-MySQL, using jQuery and Bootstrap
 * @version: 1.0
 * @author: Dheymer Leon
 *          Phone     : +593-98-7982998
 *          Email     : dheymer@gmail.com
 *          IG/TW     : @dheymer
 *          Facebook  : @dheymerleonweb
 *          Skype     : dheymer
 *          LinkedIn  : linkedin.com/in/dheymer
 *          DeviantArt: dheymer.deviantart.com
 *          Website   : dheymer.000webhostapp.com
 */
	// If all values have information, proceed to the insertion
	if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email'])){
		include("db_connection.php");							// include Database connection file 
		$first_name = $_POST['first_name'];						// get values 
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];

		// Excecute the INSERT query
		$query = "INSERT INTO users(first_name, last_name, email) VALUES('$first_name', '$last_name', '$email')";
		if (!$result = mysqli_query($con, $query)) {			// If the query couldn't excecute
	        exit(mysqli_error($con));							// Show the error
	    }
	    echo "1 Record Added!";									// otherwise, show the success message
	}
?>