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

/**
 * Connection variables 
 */
$host = "localhost";                                    // MySQL host name eg. localhost
$user = "root";                                         // MySQL user. eg. root
$password = "";                                         // MySQL user password 
$database = "crud_test";                                 // MySQL Database name

$con = new mysqli($host, $user, $password, $database);  // Connect to MySQL Database

if ($con->connect_error) {                              // Check connection
    die("Connection failed: " . $con->connect_error);   // If fails to connect, show the error
}
?>