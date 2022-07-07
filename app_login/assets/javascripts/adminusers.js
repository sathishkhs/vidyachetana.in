$(document).ready(function(){
    var adminusers = $('#admin-users-table').DataTable({ 
         // 'processing': true,
        //  'serverSide': true,
        //  'serverMethod': 'post',
        //  "searching": true,
        "ajax": {
            url: "adminusers/admin_users_list",
           
        },
        
      
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
    })

})