import { isValidInput } from "../utilities/inputValidation.js";
import { isValidMonth } from "../utilities/inputValidation.js"


$(document).ready(function () {
    // Correct the form ID here
    $('#formUsage').submit(function (event) {
        //alert("AJAX CALLED");
        event.preventDefault();

        // Gather form data
        var formData = {
            id: $('#id').val(),
            month: $('#month').val(),
            usage: $('#usage').val(),
            action: 'insert'
        };

        if (!isValidMonth(formData.month)){
            alert('Invalid month:\nPlease enter a valid month (e.g., Jan, January, Feb, February).');
            return;
        }

        let inputsToCheck = [
            formData.id,
            formData.month,
            formData.usage,
        ];

        for (let i = 0; i < inputsToCheck.length; i++) {
            if (!isValidInput(inputsToCheck[i])) {
                alert('Invalid input: Please remove any special characters.');
                return; 
            }
        }

        // Send an AJAX request to the PHP script
        $.ajax({
            url: 'php/usage.php', // Adjust the path if necessary
            type: 'POST',
            data: formData,
            success: function (response) {
                $('#insertUsageResponse').html(response);

                // Check if the response indicates a successful insert
                if (response.includes("query successful")) {
                    location.reload();
                }
            },
            error: function () {
                $('#insertUsageResponse').html('Error: Unable to insert usage data.');
            }
        });
    });
});
