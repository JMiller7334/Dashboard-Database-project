/**AJAX TO PROVIDE DYNAMIC UX:
 * prevents page from navigating away on php calls.
 */

$(document).ready(function() {
    $('#formCustomers').submit(function(event) {
        //alert("AJAX CALLED");
        // Prevent the form from submitting normally
        event.preventDefault();

        // Gather form data
        var formData = {
            type: $('#type').val(),
            name: $('#name').val(),
            phone: $('#phone').val(),
            address: $('#address').val(),
            email: $('#email').val(),
            action: 'insert'
        };

        // Send an AJAX request to the PHP script
        $.ajax({
            url: 'php/customers.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                $('#insertResponse').html(response);

                //handle page refresh
                if (response.includes("query successful")) {
                    location.reload();
                }
            },
            error: function() {
                $('#insertResponse').html('Error: Unable to insert customer data.');
            }
        });
    });
});
