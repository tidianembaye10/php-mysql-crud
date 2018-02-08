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

include("db_connection.php");                               // include Database connection file

if(isset($_POST['id']) && isset($_POST['id']) != ""){       // Check for the id in the request (if it's not empty)
    $user_id = $_POST['id'];                                // get User ID

    $query = "SELECT * FROM users WHERE id = '$user_id'";   // Form the query to get user details
    if (!$result = mysqli_query($con, $query)) {            // If it couldn't excecute, stop the script   
        exit(mysqli_error($con));                           // while showing the error
    }
    $response = array();                                    // initialize the result response variable
    if(mysqli_num_rows($result) > 0) {                      // if the query has records (user exists)
        while ($row = mysqli_fetch_assoc($result)) {        // organize the result as an associative array
            $response = $row;                               // and asign this array to the response
        }
    }else{                                                  // Otherwise, send the HTML response status 
        $response['status'] = 200;                          // status 200 (query excecuted correctly)
        $response['message'] = "Data not found!";           // but no data found with the id
    }
    echo json_encode($response);                            // format the response as a JSON object.
}else{                                                      // If the id is empty
    $response['status'] = 200;                              // Send an error message to the client.
    $response['message'] = "Invalid Request!";
}