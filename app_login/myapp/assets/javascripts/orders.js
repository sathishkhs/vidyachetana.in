var minDate, maxDate;
 
// Custom filtering function which will search data in column four between two values
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = data[7] ;
        if (
            ( min === null && max === null || min == '' && max=='') ||
            ( (min === null || min =='') && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
        return false;
    }
);
$(document).ready(function() {
    
    minDate = $('#from_date');
    maxDate = $('#to_date');
  
    var orders_table = $('#orders-table').DataTable({ 
        
        // "scrollY":      700,
            "scrollX":        true,
            "scrollCollapse": true,
            "order": [ 7, "desc" ],
        "ajax": {
            url: "orders/orders_list",
           
        },
        "columnDefs": [
            
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
       
    })
    // Check all 
    $('#checkall').click(function(){
        if($(this).is(':checked')){
            $('.delete_check').prop('checked', true);
        }else{
            $('.delete_check').prop('checked', false);
        }
    });

      // Delete record
      $('#cancel_bulk').click(function(){

        var deleteids_arr = [];
        // Read all checked checkboxes
        $("input:checkbox[class=delete_check]:checked").each(function () {
            deleteids_arr.push($(this).val());
        });
        
        // Check checkbox checked or not
        if(deleteids_arr.length > 0){

            // Confirm alert
            var confirmcancel = confirm("Do you really want to Cancel Selected Orders?");
            if (confirmcancel == true) {
                $.ajax({
                    url: 'orders/cancel_bulk_orders',
                    type: 'post',
                    data: {deleteids_arr: deleteids_arr},
                    success: function(response){
                        orders_table.ajax.reload();
                        if(response == 1){
                            alert('Succesfully Canceled Selected Bulk orders');
                        }else{
                            alert('Failed to cancel selected bulk orders');
                        }
                        
                    }
                });
            } 
        }
    });

 

    var active_orders_table = $('#active-orders-table').DataTable({ 
        
       
        "scrollX":        true,
        "scrollCollapse": true,
        "order": [ 7, "desc" ],
    "ajax": {
        url: "orders/active_orders_list",
       
    },
    "columnDefs": [
        
    { 
        "targets": [ 0 ], //first column / numbering column
        "orderable": false, //set not orderable
    },
    ],
    dom: 'Bfrtip',
    buttons: [
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
    ],
})
 
    var hub_orders_table = $('#hub-orders-table').DataTable({ 
        
       
        "scrollX":        true,
        "scrollCollapse": true,
        "order": [ 7, "desc" ],
    "ajax": {
        url: "orders/hub_orders_list",
       
    },
    "columnDefs": [
        
    { 
        "targets": [ 0 ], //first column / numbering column
        "orderable": false, //set not orderable
    },
    ],
    dom: 'Bfrtip',
    buttons: [
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
    ],
});
   
  
    var inactive_orders_table = $('#inactive-orders-table').DataTable({ 
        
        
        "scrollX":        true,
        "scrollCollapse": true,
        "order": [ 7, "desc" ],
    "ajax": {
        url: "orders/inactive_orders_list",
       
    },
    "columnDefs": [
        
    { 
        "targets": [ 0 ], //first column / numbering column
        "orderable": false, //set not orderable
    },
    ],
    dom: 'Bfrtip',
    buttons: [
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
    ],
})
   
var completed_orders_table = $('#completed-orders-table').DataTable({ 
        
    // "scrollY":      700,
        "scrollX":        true,
        "scrollCollapse": true,
        "order": [ 7, "desc" ],
    "ajax": {
        url: "orders/completed_orders_list",
       
    },
    "columnDefs": [
        
    { 
        "targets": [ 0 ], //first column / numbering column
        "orderable": false, //set not orderable
    },
    ],
    dom: 'Bfrtip',
    buttons: [
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
    ],
})
  // Refilter the table
  $('#from_date, #to_date').on('change', function () {
    orders_table.draw();
    active_orders_table.draw();
    hub_orders_table.draw();
    inactive_orders_table.draw();
    completed_orders_table.draw();
});
$('#sorting_code').on('change', function () {
    hub_orders_table.columns(11).search( this.value ).draw();
} );


})

 // Checkbox checked
 function checkcheckbox(){

    // Total checkboxes
    var length = $('.delete_check').length;

    // Total checked checkboxes
    var totalchecked = 0;
    $('.delete_check').each(function(){
        if($(this).is(':checked')){
            totalchecked+=1;
        }
    }); 

    // Checked unchecked checkbox
    if(totalchecked == length){
        $("#checkall").prop('checked', true);
    }else{
        $('#checkall').prop('checked', false);
    }
}