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

	include("db_connection.php");									// include Database connection file 
																	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>No.</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email Address</th>
							<th>Update</th>
							<th>Delete</th>
						</tr>';

	$query = "SELECT * FROM users";									// Form the read query

	if (!$result = mysqli_query($con, $query)) {					// If it couldn't excecute, closes the script
        exit(mysqli_error($con));									// while showing the error
    }

    
    if(mysqli_num_rows($result) > 0){								// if query results has rows then featch those rows
    	$number = 1;
    	while($row = mysqli_fetch_assoc($result)){					// ...and format those rows in HTML table rows
    		$data .= '<tr>
				<td>'.$number.'</td>
				<td>'.$row['first_name'].'</td>
				<td>'.$row['last_name'].'</td>
				<td>'.$row['email'].'</td>
				<td>
					<button onclick="GetUserDetails('.$row['id'].')" class="btn btn-warning">Update</button>
				</td>
				<td>
					<button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button>
				</td>
    		</tr>';
    		$number++;
    	}
    }else{															// If there's no records
    	$data .= '<tr><td colspan="6">Records not found!</td></tr>';// show the records not found message
    }

    $data .= '</table>';											// finish the HTML table

    echo $data;														// Show the table
?>