
var table;
 
$(document).ready(function() {

    //datatables
   var table = $('#customer_table').DataTable({ 
 
        'processing': true,
         'serverSide': true,
         'serverMethod': 'post',
         "searching": true,
        "ajax": {
            url: "customers/customers_list",
            'data': function(data){
                data.city_id = $('#city_id').val();
                data.customer_type = $('#customer_type').val();
             }
        },
        
        // Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });

    $('#customer_type, #city_id').change(function(){
        table.draw();
     });
 
     
     var update = $('#customer_project_table').DataTable({ 
         'processing': true,
         'serverSide': true,
         'serverMethod': 'post',
         "searching": true,
         "ajax": {
             url: "customers/customer_project_list/",
             'data': function(data){
                 data.customer_id = $('#customer_id').val();
                 data.customer_type = $('#role').val();
              }
              
         },
         
         // Set column definition initialisation properties.
         "columnDefs": [
         { 
             "targets": [ 0 ], //first column / numbering column
             "orderable": false, //set not orderable
         },
         ],
     });
     $('#role').change(function(){
        update.draw();
     });
});

function getstate(countryid){
    $.getJSON('customers/getstate/' + countryid, function(data){
        $('.states').html(data);
    })
}

function getcity(stateid){
    $.getJSON('customers/getcity/' + stateid, function(data){
        
        $('.cities').html(data);
    })
}