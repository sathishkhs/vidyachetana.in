$(document).ready(function(){
var products = $('#blog_table').DataTable({
    "ajax":{
        url:"blog/posts_list"

    },
    "columnDefs":[{
        "targets":[ 0 ],
        "orderable": false
    }]
})
var products = $('#category_table').DataTable({
    "ajax":{
        url:"blog/category_list"

    },
    "columnDefs":[{
        "targets":[ 0 ],
        "orderable": false
    }]
})
})