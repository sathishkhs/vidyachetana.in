$(document).ready(function(){

    var country = $('#country_table').DataTable({ 
        // 'processing': true,
        //  'serverSide': true,
        //  'serverMethod': 'post',
        //  "searching": true,
        "ajax": {
            url: "master/country_list",
           
        },
        
        // Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
    })

    var city = $('#city_table').DataTable({
        "ajax":{
            url:"master/city_list"

        },
        "columnDefs":[{
            "targets":[ 0 ],
            "orderable": false
        }]
    })
    var state = $('#state_table').DataTable({
        "ajax":{
            url:"master/state_list"

        },
        "columnDefs":[{
            "targets":[ 0 ],
            "orderable": false
        }]
    })

    var menu = $('#menu_table').DataTable({
        "ajax":{
            url:"master/menu_list"

        },
        "columnDefs":[{
            "targets":[ 0 ],
            "orderable": false
        }]
    })
    var menu = $('#form_table').DataTable({
        "ajax":{
            url:"master/form_list"

        },
        "columnDefs":[{
            "targets":[ 0 ],
            "orderable": false
        }]
    })
    var product_category = $('#product_category_table').DataTable({
        "ajax":{
            url:"master/product_category_list"

        },
        "columnDefs":[{
            "targets":[ 0 ],
            "orderable": false
        }]
    })
    var products = $('#products_table').DataTable({
        "ajax":{
            url:"master/products_list"

        },
        "columnDefs":[{
            "targets":[ 0 ],
            "orderable": false
        }]
    })
    var products = $('#banner_table').DataTable({
        "ajax":{
            url:"master/banner_list"
    
        },
        "columnDefs":[{
            "targets":[ 0 ],
            "orderable": false
        }]
    })
    var products = $('#pages_table').DataTable({
        "ajax":{
            url:"master/pages_list"
    
        },
        "columnDefs":[{
            "targets":[ 0 ],
            "orderable": false
        }]
    })
    
    var products = $('#features_table').DataTable({
        "ajax":{
            url:"master/features_list"
    
        },
        "columnDefs":[{
            "targets":[ 0 ],
            "orderable": false
        }]
    })
    
})


