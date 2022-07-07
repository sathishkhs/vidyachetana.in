
    var minDate;
    var MaxDate;
    function datadraw(){
    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            var min = minDate.val();
            var max = maxDate.val();
            var date =  data[7].split(' ')[0] ;
            // console.log(data[7].split(' ')[0])
            // console.log(date)
            if (
                ( min === null && max === null ) ||
                ( min === null && date <= max ) ||
                ( min <= date   && max === null ) ||
                ( min <= date   && date <= max )
            ) {
                return true;
            }
            return false;
        }
    );
    }
$(document).ready(function(){
// $('#download-donations').click(function(e){
//    e.preventDefault();
//     $('#date-download').attr('action','donations/download_donations');
//     $('#download-donations').submit();
// })


// Create date inputs
minDate = $('#from_date');
maxDate = $('#to_date');

    var donations = $('#donations_table').DataTable({ 
        // 'processing': true,
        //  'serverSide': true,
        //  'serverMethod': 'post',
        //  "searching": true,
        "ajax": {
            url: "donations/donations_list",
           
        },
        
        // Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
    })


  
  

    var new_year_donations = $('#new_year_donations_table').DataTable({ 
        // 'processing': true,
        //  'serverSide': true,
        //  'serverMethod': 'post',
        //  "searching": true,
        "ajax": {
            url: "donations/new_year_donations_list",
           
        },
        
        // Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
    })
    
    var rp_donations = $('#rp_donations_table').DataTable({ 
        // 'processing': true,
        //  'serverSide': true,
        //  'serverMethod': 'post',
        //  "searching": true,
        "ajax": {
            url: "donations/rp_donations_list",
           
        },
        
        // Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
    })


      // Refilter the table
      $('#from_date, #to_date').on('change', function () {
        datadraw();
        donations.draw();
    });

});