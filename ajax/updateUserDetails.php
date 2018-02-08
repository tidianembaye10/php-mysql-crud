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

include("db_connection.php");                           // include Database connection file

if(isset($_POST)){                                      // Check if request parameters are set
    $id = $_POST['id'];                                 // get values
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    // Form the UPDATE query with the data received
    $query = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email' WHERE id = '$id'";
    if (!$result = mysqli_query($con, $query)) {        // If it cannot excecute, exit the script
        exit(mysqli_error($con));                       // while showing the error
    }
}