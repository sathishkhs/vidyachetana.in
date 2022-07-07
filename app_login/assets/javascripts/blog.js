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
var authors = $('#authors_table').DataTable({
    "ajax":{
        url:"blog/authors_list"

    },
    "columnDefs":[{
        "targets":[ 0 ],
        "orderable": false
    }]
})
})

function getslug(val){
    $.getJSON('blog/getslug/blog_model/page_slug/' + val, function(data) {
        $("#" + data.field_id).val(data.field_val);
       
    });
}