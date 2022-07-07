

if ($(".corporate-giving-form-validated").length) {
    $(".corporate-giving-form-validated").validate({
      // initialize the plugin
      rules: {
        company_name: {
          required: true,
        },
        city: {
          required: true,
        },
        name_of_primary_contact_person: {
          required: true,
        },
        contact_number_of_primary_contact_person: {
          required: true,
        },
        email_of_primary_contact_person: {
          required: true,
          email: true,
        },
        message: {
          required: true,
        }
        
      },
      submitHandler: function (form) {
        // sending value with ajax request
        $.post(
          $(form).attr("action"),
          $(form).serialize(),
          function (response) {
            $(form).parent().find(".result").append(response);
            $(form).find('input[type="text"]').val("");
            $(form).find('input[type="email"]').val("");
            $(form).find("textarea").val("");
            $(form).find('h2[id="error"]').html(response);
            setInterval(function(){ 
            	$(form).find('span[id="error"]').html('')
            }, 5000);
          }
        );
        return false;
      },
    });
  }