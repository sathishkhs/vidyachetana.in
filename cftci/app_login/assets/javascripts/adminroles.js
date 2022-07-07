$(document).ready(function(){
    var adminusers = $('#admin-roles-table').DataTable({ 
         // 'processing': true,
        //  'serverSide': true,
        //  'serverMethod': 'post',
        //  "searching": true,
        "ajax": {
            url: "adminroles/admin_roles_list",
           
        },
        
      
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
    })

})