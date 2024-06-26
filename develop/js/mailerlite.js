jQuery(document).ready(function($) {
    $('#mailerlite-subscribe-form').on('submit', function(e) {
        e.preventDefault();

        var firstName = $('#subscriber-first-name').val();
        var lastName = $('#subscriber-last-name').val();
        var email = $('#subscriber-email').val();
        var marketingPermission = $('#marketing-permission').is(':checked');
        var groupNumber = $('#mailerlite-subscribe-form').data('group-number');
        var formName = $('#mailerlite-subscribe-form').data('form-name');

        // Check if the acceptance box is checked
        if (!marketingPermission) {
            // If it's not checked, show an error message and stop the form submission
            $("#response-message").html("You must agree to the marketing permissions to continue.");
            return;
        }

        // Check if firstName is empty
        if (firstName === '') {
            // If it's empty, show an error message and stop the form submission
            $("#response-message").html("First name cannot be empty.");
            return;
        }

        // Check if lastName is empty
        if (lastName === '') {
            // If it's empty, show an error message and stop the form submission
            $("#response-message").html("Last name cannot be empty.");
            return;
        }

        // Check if email is empty or invalid
        if (email === '' || !validateEmail(email)) {
            // If it's empty or invalid, show an error message and stop the form submission
            $("#response-message").html("Email cannot be empty or invalid.");
            return;
        }
      
        $.ajax({
            type: "POST",
            url: my_script_vars.ajax_url,
            data: {
                action: "subscribe_to_mailerlite",
                firstName: firstName,
                lastName: lastName,
                email: email,
                marketingPermission: marketingPermission,
                groupNumber: groupNumber,
                tracking: window.location.href 
            },
            success: function(response) {
                // Handle the response from the server
                onSuccessfulSubscribe(formName);
            },
            error: function(jqXHR, textStatus, errorThrown){
                // If there's an error, display it in the #response-message
                $("#response-message").html("Error: " + textStatus);
            }
        });
    });
});

function onSuccessfulSubscribe(formName) {
    document.querySelector('#mailerlite-subscribe-form').classList.toggle('hidden');
    document.querySelector('#form-success').classList.toggle('hidden');   
     // Push event to the Data Layer
     console.log(formName);
     window.dataLayer = window.dataLayer || [];
     window.dataLayer.push({
         'event': 'form_submit',
         'form_name': formName,
         'full_url': window.location.href
     });

}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
