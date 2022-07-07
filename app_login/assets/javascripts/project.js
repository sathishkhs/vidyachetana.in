
$(document).ready(function(){

    var project_id = $('#project_id').val();
    
    var projects = $('#view_project_table').DataTable({ 
        //  'processing': true,
        //  'serverSide': true,
        //  'serverMethod': 'post',
        //  "searching": true,
        "ajax": {
            url: "project/view_project_list/"+project_id,
          
            
        },
        
        // Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
     })

	$('#target_capital, #min_investment').on('keyup change',function(){
        var target_capital = $('#target_capital').val();
        var min_investment = $('#min_investment').val();
        $('#total_shares').val(Math.round(target_capital/min_investment));
    });
    $("#no_of_shares").on('change',function(){
        $('#shares_count').html($(this).val())
       
    });
    $('#customer_type').change(function(){
        var customer_type = $(this).val();
        var project_id = $('#project_id').val();
        var sponser_id = $('#sponser_id').val();
       if(customer_type == 1){
        $.ajax({
            url: "project/investor_shares_left/"+sponser_id+"/"+project_id,
            method: "POST",
            success:function(data){
                console.log(data)
                if(data <= 5 && data > 0){
                    
                $('#no_of_shares').attr('max',data);
                $('#shares_count').html(data);
                $('#no_of_shares').val(data);
                $('#error_msg').html('');
                $('#buyshares').removeAttr('disabled');
                calcTotalShare(data);
                }else if(data > 5){
                    $('#no_of_shares').attr('max','5');
                    $('#shares_count').html('5');
                    $('#no_of_shares').val('5');
                    $('#error_msg').html('');
                    $('#buyshares').removeAttr('disabled');
                    calcTotalShare(5);
                    
                }else if(data <= 0){
                    $('#no_of_shares').attr('max','0');
                    $('#shares_count').html('0');
                    $('#no_of_shares').val('0');
                    $('#error_msg').html('Sorry! You cannot Invest in this project. Already Shares of the Project are sold.');
                    $('#buyshares').attr('disabled',"disabled");
                }
            }
        }) 
            
        // $('#no_of_shares').attr('max','5');
        // $('#shares_count').html('5');
        // $('#no_of_shares').val('5');
        // $('#error_msg').html('');
        // $('#buyshares').removeAttr('disabled');
        // calcTotalShare(5);
       }  
        else if(customer_type == 2){
       
      
            $.ajax({
                url: "projects/check_sponser_percent/"+customer_type+"/"+project_id,
                method: "POST",
                success:function(data){
                  
                    if(data['check'] == '0'){
                        $('#error_msg').html('');
                        $('#no_of_shares').attr('max',data['remain_shares']);
                        $('#shares_count').html(data['remain_shares']);
                        $('#no_of_shares').val(data['remain_shares']);
                        calcTotalShare(data['remain_shares']);
                    $('#buyshares').removeAttr('disabled');

               }else if(data['check'] == '1'){
                    $('#error_msg').html('Sorry! You cannot sponser this project. Already Minimum Shares of the Project are sold.');
                    $('#buyshares').attr('disabled',"disabled");
               }
            }

        })
    }else if(customer_type == 3){
        $('#error_msg').html('');
        $('#buyshares').removeAttr('disabled');
        $.ajax({
            url: "projects/check_shareholder/"+customer_type+"/"+project_id,
            method: "POST",
            success:function(data){
           
               if(data != '' && data > 0){
                $('#error_msg').html('');
                    $('#buyshares').removeAttr('disabled');
                    $('#no_of_shares').attr('max',data);
                    $('#no_of_shares').val(data);
                    $('#shares_count').html(data);
                    calcTotalShare(data);
               }else if(data < 0 ){
                    $('#error_msg').html('Sorry! You cannot be Shareholder to this project. Already Minimum Shares of the Project are sold.');
                    $('#buyshares').attr('disabled',"disabled");
               }
            }

        })
    }else{
        $('#error_msg').html('');
        $('#buyshares').removeAttr('disabled');
    }
    })





	$('#target_capital, #min_investment').on('keyup change',function(){
        var target_capital = $('#target_capital').val();
        var min_investment = $('#min_investment').val();
        $('#total_shares').val(Math.round(target_capital/min_investment));
	});
    
    $('#family_details_id').on('change',function(){
        $.ajax({
            url: "projects/check_member/",
            method: " POST",
            data: {family_details_id : $(this).val()},
            success:function(data){
                alert(data)
            }

        })
    })

    var projects = $('#projects_table').DataTable({ 
        'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        "searching": true,
       "ajax": {
           url: "project/projects_list",
           
       },
       
       // Set column definition initialisation properties.
       "columnDefs": [
       { 
           "targets": [ 0 ], //first column / numbering column
           "orderable": false, //set not orderable
       },
       ],
    })
  

});

function calc_duration(e)
{
    var date1 = new Date(e.value); 
    var date =new Date();
    var Time = date1.getTime() - date.getTime(); 
    var Days = Time / (1000 * 3600 * 24);
    $('#capital_raising_duration').val(Math.round(Days))
}

function getSubCategory(category_id){
    $.getJSON('project/getsubcategory/' + category_id, function(data){
    $('#subcategory_id').html(data);
    })


  
}
var project_id = $('#project_id').val();
var update = $('#updates_table').DataTable({ 
  
    "ajax": {
        url: "project/view_updates_list/"+project_id,
       
    },
    
    // Set column definition initialisation properties.
    "columnDefs": [
    { 
        "targets": [ 0 ], //first column / numbering column
        "orderable": false, //set not orderable
    },
    ],
})

var payments = $('#payments_table').DataTable({ 
  
    "ajax": {
        url: "project/view_payments_list/",
       
    },
    
    // Set column definition initialisation properties.
    "columnDefs": [
    { 
        "targets": [ 0 ], //first column / numbering column
        "orderable": false, //set not orderable
    },
    ],
})
function getstate(countryid){
    $.getJSON('customers/getstate/' + countryid, function(data){
        $('.states').html(data);
    })
}

function getcity(stateid){
    $.getJSON('customers/getcity/' + stateid, function(data){
        
        $('.cities').html(data);
    })
}