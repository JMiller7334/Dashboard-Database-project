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
