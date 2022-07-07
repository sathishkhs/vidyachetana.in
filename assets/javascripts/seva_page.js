function seva_amount(value,name) {

   $('#amount').val(value);
   $('#seva_name').val(name);
   $('#custom_other_amount').html(value);
  }

  $(document).ready(function(){
      $('#amount').keyup(function(){
          var amount = $('#amount').val();
          $('#custom_other_amount').html(amount);
      })
      var characters = 200;
      var moretext = 'Read More';
      var lesstext = 'Show Less';
      var real_content =  $('#show_more').html();
      
      var cut_content = $('#show_more').html().substr(0,characters)+'....'
      
      $('#show_more').html(cut_content);

      $('#more_less_btn').click(function(){
          if($(this).hasClass('read_more')){
                $(this).removeClass('read_more');
                $(this).addClass('read_less');
                $(this).html(lesstext)
                $('#show_more').html(real_content)
            }else{
                $(this).removeClass('read_less');
                $(this).addClass('read_more');
                $(this).html(moretext)
            $('#show_more').html(cut_content)
          }
      })

console.log(cut_content);

  })