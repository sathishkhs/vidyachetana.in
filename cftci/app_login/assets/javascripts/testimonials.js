$(document).ready(function(){
  
    var videos = $('#testimonials_table').DataTable({
        "ajax":{
            url:"testimonials/testimonials_list"

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