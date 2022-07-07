$(document).ready(function(){
    $('#gallery_table').DataTable(
        {
            "ajax" : 'gallery/gallery_list',
           
            "processing":'true',
            "columnDefs" : [
                {
                    "targets" : [0],
                    "orderable" : true
                },
            ], 
           
        }
    );






   
    var gallery_category = $('#gallery_category_table').DataTable({ 
        // 'processing': true,
        //  'serverSide': true,
        //  'serverMethod': 'post',
        //  "searching": true,
        "ajax": {
            url: "gallery/gallery_category_list",
           
        },
        
        // Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
    })

})