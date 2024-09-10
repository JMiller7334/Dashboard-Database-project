/**AJAX TO PROVIDE DYNAMIC UX:
 * prevents page from navigating away on php calls.
 */

import { isValidInput } from "../utilities/inputValidation.js";

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

        let inputsToCheck = [
            formData.type,
            formData.name,
            formData.phone,
            formData.address,
            formData.email,
        ];

        for (let i = 0; i < inputsToCheck.length; i++) {
            if (!isValidInput(inputsToCheck[i])) {
                alert('Invalid Inputs:\nPlease ensure all fields are filled out correctly.\n\n' +
                    '1. Phone Number:\nAllowed characters include digits, spaces, dashes (-), parentheses (()), Example: "(555) 123-4567".\n\n' +
                    '2. Email Address:\nMust be in the format "example@domain.com". Only alphanumeric characters, dots (.), underscores (_), percent signs (%), plus signs (+), and hyphens (-) are allowed.\n\n' +
                    '3. Other Fields:\nAllowed characters include letters, numbers, spaces, dashes (-), dots (.), and commas (,).\n\n');
              
                return; 
            }
        }


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
