$(document).ready(function() {
	$('#formRead').submit(function(event) {
		// Prevent the form from submitting normally
		event.preventDefault();
		var readTerm = $('#read_term').val();

		// Send an AJAX request to the PHP script
        $.ajax({
            url: 'php/read.php',
            type: 'POST',
            data: { 
                read_term: readTerm,
                submit: 'true' // Add this parameter
            },
            success: function(response) {
                // Handle the response from the PHP script
                //alert(response);
                $('#search_results').html(response);
            },
            error: function() {
                alert('Error: Unable to search for customers.');
            }
        });
		});
	});