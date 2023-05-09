$(document).ready(function() {
	$('#formSearch').submit(function(event) {
		// Prevent the form from submitting normally
		event.preventDefault();

		var searchTerm = $('#search_term').val();

		// Send an AJAX request to the PHP script
        $.ajax({
            url: 'php/search.php',
            type: 'POST',
            data: { 
                search_term: searchTerm,
                submit: 'true' // Add this parameter
            },
            success: function(response) {
                // Handle the response from the PHP script
                $('#search_results').html(response);
            },
            error: function() {
                alert('Error: Unable to search for customers.');
            }
        });
		});
	});