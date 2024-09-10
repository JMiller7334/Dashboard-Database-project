$(document).ready(function() {
    $('#formDelete').submit(function(event) {
        //alert('AJAX CALLED')
        event.preventDefault();

        // Gather form data
        var formData = {
            delId: $('#delId').val()
        };

        // Send an AJAX request to the PHP script
        $.ajax({
            url: 'php/delete.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                location.reload();
            },
            error: function() {
                alert('Error: Unable to delete the record.');
            }
        });
    });
});
