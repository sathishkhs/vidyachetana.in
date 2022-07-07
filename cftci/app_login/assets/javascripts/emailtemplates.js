$(document).ready(function(){

    var country = $('#email_templates_table').DataTable({ 
        "ajax": {
            url: "emailtemplates/email_templates_list",
           
        },
       
        "columnDefs": [
        { 
            "targets": [ 0 ], 
            "orderable": false,
        },
        ],
    })
})