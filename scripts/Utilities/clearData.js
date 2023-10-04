function ajaxClearData(){
    $.ajax({
        url: 'php/utilities/clearData.php',
        type: 'POST',
        data: {},
        success: function(response){
            console.log('ajax-clear: cleared data - ' + response);
        },
        error: function() {
            console.log('ajax-clear: an error occured.');
        }
    });
}

document.getElementById('buttonKeep').addEventListener('click', function(){
    document.getElementById('clearPrompt').style.display = 'none';
});

document.getElementById('buttonClear').addEventListener('click', (e) => {
    ajaxClearData();
    window.location.reload();
});