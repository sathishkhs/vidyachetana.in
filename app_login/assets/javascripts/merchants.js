$(document).ready(function(){
    var adminusers = $('#merchants-table').DataTable({ 
         // 'processing': true,
        //  'serverSide': true,
        //  'serverMethod': 'post',
        //  "searching": true,
        "ajax": {
            url: "merchants/merchants_list",
           
        },
        
      
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
    })

})