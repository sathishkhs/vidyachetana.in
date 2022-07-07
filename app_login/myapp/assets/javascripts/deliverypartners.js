$(document).ready(function(){
    var adminusers = $('#delivery-partners-table').DataTable({ 
         // 'processing': true,
        //  'serverSide': true,
        //  'serverMethod': 'post',
        //  "searching": true,
        "ajax": {
            url: "delivery_partners/delivery_partners_list",
           
        },
        
      
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
    })

})