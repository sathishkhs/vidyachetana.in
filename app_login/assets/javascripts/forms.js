$(document).ready(function(){
    $('#forms_table').DataTable({
        "ajax": {
            'url':'forms/form_list'
        },

        "columnDefs": [
            { 
                "targets": [ 0 ], //first column / numbering column
                "orderable": false, //set not orderable
            },
            ],
    });

})


$(document).ready(function() {

    var form_data = $('#form_data').val();
    if(form_data.length != ''){
       $('#created_form').append(form_data); 
    }

    $("#add").click(function() {
    		var lastField = $("#buildyourform div:last");
        var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
        var fieldWrapper = $("<div class=\"fieldwrapper d-flex\" id=\"field" + intId + "\"/>");
        fieldWrapper.data("idx", intId);
        var fName = $("<input type=\"text\" class=\"fieldname form-control mr-1 mb-1\" placeholder=\"Field Name \">");
        var fType = $("<select class=\"fieldtype form-control mr-1 mb-1\"><option value=\"textbox\">Text</option><option value=\"textarea\">Paragraph</option> </select>");
        var removeButton = $("<input type=\"button\" class=\"remove  btn btn-danger mb-1\" value=\"-\" />");
        removeButton.click(function() {
            $(this).parent().remove();
        });
       
        fieldWrapper.append(fName);
        fieldWrapper.append(fType);
        fieldWrapper.append(removeButton);
        $("#buildyourform").append(fieldWrapper);
    });

    $('#buildyourform div') 
   
    $("#preview").click(function() {
        $("#yourform").remove();
        var form_title = $('#form-title').val();
        var fieldSet = $("<fieldset id=\"yourform\"><legend>"+form_title+"</legend></fieldset>");
        $("#buildyourform div").each(function() {
            var field_name = $(this).find("input.fieldname").first().val();
            var id = field_name.replace(/\s+/g,'_').toLowerCase();
            var label = $("<label for=\"" + id + "\">" + field_name + "</label>");
            var input;
            switch ($(this).find("select.fieldtype").first().val()) {
                // case "checkbox":
                //     input = $("<input type=\"checkbox\" id=\"" + id + "\" name=\"" + id + "\" class=\"form-control \"/>");
                //     break;
                case "textbox":
                    input = $("<input type=\"text\" id=\"" + id + "\" name=\"" + id + "\" class=\"form-control \"/>");
                    break;
                case "textarea":
                    input = $("<textarea id=\"" + id + "\" name=\"" + id + "\" class=\"form-control \"></textarea>");
                    break;    
            }
            fieldSet.append(label);
            fieldSet.append(input);

        });
       console.log(fieldSet[0].innerHTML);
        $('#form_data').val(fieldSet[0].innerHTML)
        $("#created_form").append(fieldSet);
    });
});

