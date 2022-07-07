
var selection;
$(document).ready(function() {

 
    $('#one').on('click', function() {
        // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty ').removeAttr('checked');
        $('#one').prop('checked','checked');
        $('#amount').val('1000');
      
      

    })
    $('#two').on('click', function() {
        // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty,#other').removeAttr('ckecked');
        $('#two').prop('checked','checked');
        $('#amount').val('2000');

    })
    $('#three').on('click', function() {
        // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty,#other').removeAttr('checked');
        $('#three').prop('checked','checked');
        $('#amount').val('5000');

    })
    $('#five').on('click', function() {
        // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty,#other').removeAttr('checked');
        $('#five').prop('checked','checked');
        $('#amount').val('10000');

    })

    $('#seven').on('click', function() {
        // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty,#other').removeAttr('checked');
        $('#seven').prop('checked','checked');
        $('#amount').val('15000');

    })

    $('#other').on('click', function() {
        // var amount = $('#other').val()
        // $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty,#other').removeAttr('checked');
        $('#other').prop('checked','checked');
        // $('#amount').val(amount);

    })
    $('#amount').on('keydown',function(){
       
        $('#other').prop('checked','checked')
    })
  


    // It has the name attribute "registration"
    $("#popup_paypal_donate_form_onetime_recurring").validate({
        // Specify validation rules

        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            full_name: "required",
            email: {
                required: true,
                // Specify that email should be validated
                // by the built-in "email" rule
                email: true
            },
            phone_number: {
                required: true,
                minlength: 10,
                maxlength: 12
            },
            pan_number: {
                required: true
            },
            amount: {
                required: true,
                number: true
            },
           
        },
        // Specify validation error messages
        messages: {
            name: "Please enter your firstname",
            mobile_number: {
                required: "Please provide a mobile_number",
                minlength: "Your mobile number must be at least 10 characters long",
                maxlength: "Your mobile number must not be more than 12 characters length"
            },
            email: "Please enter a valid email address",
            pan: "please enter pan number",
            amount: "Please enter amount",
           
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });
});

