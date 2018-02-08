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
 * CREATE Record
 */
function addRecord() {
    var first_name = $("#first_name").val();                        // get values
    var last_name = $("#last_name").val();
    var email = $("#email").val();

    $.post("ajax/addRecord.php", {                                  // Add record, sending it to the AJAX petition
        first_name: first_name,                                     // and passing the values as object
        last_name: last_name,
        email: email
    }, function (data, status) {                                    // define the callback function
        $("#add_new_record_modal").modal("hide");                   // close the popup
        readRecords();                                              // read records again
        $("#first_name").val("");                                   // clear fields from the popup
        $("#last_name").val("");
        $("#email").val("");
    });
}

/**
 * READ records
 */
function readRecords() {
    $.get("ajax/readRecords.php", {}, function (data, status) {     // Send the AJAX petition to obtain the records
        $(".records_content").html(data);                           // In the callback, show the html with the records
    });
}

/**
 * DELETE Record
 * @param {*} id The id of record to delete
 */
function DeleteUser(id) {
    var conf = confirm("Are you sure, do you really want to delete User?"); // Send a confirmation message
    if (conf == true) {                                             // If the deletion is confirmed
        $.post("ajax/deleteUser.php", {                             // Send the AJAX petition to delete the record
                id: id                                              // Sending the id as parameter
            },
            function (data, status) {
                readRecords();                                      // In the callback, reload Users by using readRecords()
            }
        );
    }
}

/**
 * Load an user to the edition modal
 * @param {*} id The id of the user to load
 */
function GetUserDetails(id) {
    $("#hidden_user_id").val(id);                                   // Add User ID to the hidden field for furture usage
    $.post("ajax/readUserDetails.php", {                            // Send the AJAX petition to load the user
            id: id                                                  // Sending the id as parameter
        },
        function (data, status) {
            var user = JSON.parse(data);                            // PARSE json data
            $("#update_first_name").val(user.first_name);           // Assing existing values to the modal popup fields
            $("#update_last_name").val(user.last_name);
            $("#update_email").val(user.email);
        }
    );
    $("#update_user_modal").modal("show");                          // Open modal popup
}

/**
 * UPDATE Records
 */
function UpdateUserDetails() {
    var first_name = $("#update_first_name").val();                 // Get values from the update modal
    var last_name = $("#update_last_name").val();
    var email = $("#update_email").val();
    var id = $("#hidden_user_id").val();                            // get hidden field value

    $.post("ajax/updateUserDetails.php", {                          // Send the AJAX request to update the user
            id: id,                                                 // sending the values as an object
            first_name: first_name,
            last_name: last_name,
            email: email
        },
        function (data, status) {
            $("#update_user_modal").modal("hide");                  // in the callback, hide modal popup
            readRecords();                                          // reload Users;
        }
    );
}

/**
 * READ recods on page load
 */
$(document).ready(function () {
    readRecords();                                                      // calling function
});