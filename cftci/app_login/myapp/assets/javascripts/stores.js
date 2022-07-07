$(document).ready(function(){
    var stores = $('#stores-table').DataTable({ 
         // 'processing': true,
        //  'serverSide': true,
        //  'serverMethod': 'post',
        //  "searching": true,
        "ajax": {
            url: "stores/stores_list",
           
        },
        
      
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
    })
    var categories = $('#categories-table').DataTable({ 
         // 'processing': true,
        //  'serverSide': true,
        //  'serverMethod': 'post',
        //  "searching": true,
        "ajax": {
            url: "stores/categories_list",
           
        },
        
      
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
    })

    var branches = $('#branch-table').DataTable({ 
           
        "ajax": {
            url: "stores/branches_list/"+store_id,
           
        },
        
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
    })

})