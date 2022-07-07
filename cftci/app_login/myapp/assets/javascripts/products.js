$(document).ready(function(){
    var product_category = $('#product_category_table').DataTable({
        "ajax":{
            url:"products/product_category_list"

        },
        "columnDefs":[{
            "targets":[ 0 ],
            "orderable": false
        }]
    })
    var products = $('#products_table').DataTable({
        "ajax":{
            url:"products/products_list"

        },
        "columnDefs":[{
            "targets":[ 0 ],
            "orderable": false
        }]
    })
    var videos = $('#product_video_table').DataTable({
        "ajax":{
            url:"products/product_video_list"

        },
        "columnDefs":[{
            "targets":[ 0 ],
            "orderable": false
        }]
    })
    var videos = $('#product_gallery_table').DataTable({
        "ajax":{
            url:"products/gallery_list"

        },
        "columnDefs":[{
            "targets":[ 0 ],
            "orderable": false
        }]
    })
})

function getproductcategory(productid){
    $.getJSON('products/getproductcategory/' + productid, function(data){
   
        $('.product_category').html(data);
    })
}

CKEDITOR.replace( 'page_content' );