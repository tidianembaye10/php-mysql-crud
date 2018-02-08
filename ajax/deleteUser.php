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

// check for the id in the request (if it's not empty)
if(isset($_POST['id']) && isset($_POST['id']) != ""){
    include("db_connection.php");                           // include Database connection file

    $user_id = $_POST['id'];                                // get user id

    $query = "DELETE FROM users WHERE id = '$user_id'";     // create the query to delete the user
    if (!$result = mysqli_query($con, $query)) {            // if it couldn't excecute, show the error
        exit(mysqli_error($con));
    }
}
?>