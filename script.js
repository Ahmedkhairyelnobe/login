

$(document).ready(function() {
    $('#loginForm').on('submit', function(event) {
        event.preventDefault(); // Prevent page reload
        
        var formData = {
            username: $('#username').val(),
            password: $('#password').val()
        };

        $.ajax({
            url: 'login.php', // The PHP file to process the request
            type: 'POST',
            data: formData,
            success: function(response) {
                $('#message').html(response); // Display the server response in #message div
            },
            error: function(xhr, status, error) {
                $('#message').html('An error occurred: ' + error);
            }
        });
    });
});
