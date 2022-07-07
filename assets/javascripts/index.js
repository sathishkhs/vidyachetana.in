// Revolution slider code goes here
$(document).ready(function (e) {
  $(".rev_slider_default").revolution({
    sliderType: "standard",
    sliderLayout: "auto",
    dottedOverlay: "none",
    delay: 5000,
    navigation: {
      keyboardNavigation: "off",
      keyboard_direction: "horizontal",
      mouseScrollNavigation: "off",
      onHoverStop: "off",
      touch: {
        touchenabled: "on",
        swipe_threshold: 75,
        swipe_min_touches: 1,
        swipe_direction: "horizontal",
        drag_block_vertical: false
      },
      arrows: {
        style: "zeus",
        enable: true,
        hide_onmobile: true,
        hide_under: 600,
        hide_onleave: true,
        hide_delay: 200,
        hide_delay_mobile: 1200,
        tmp: '<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div> </div>',
        left: {
          h_align: "left",
          v_align: "center",
          h_offset: 30,
          v_offset: 0
        },
        right: {
          h_align: "right",
          v_align: "center",
          h_offset: 30,
          v_offset: 0
        }
      },
      bullets: {
        enable: true,
        hide_onmobile: true,
        hide_under: 600,
        style: "metis",
        hide_onleave: true,
        hide_delay: 200,
        hide_delay_mobile: 1200,
        direction: "horizontal",
        h_align: "center",
        v_align: "bottom",
        h_offset: 0,
        v_offset: 30,
        space: 5,
        tmp: '<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span><span class="tp-bullet-title">{{title}}</span>'
      }
    },
    responsiveLevels: [1240, 1024, 778],
    visibilityLevels: [1240, 1024, 778],
    gridwidth: [1170, 1024, 778, 480],
    gridheight: [550, 600, 700, 720],
    lazyType: "none",
    parallax: {
      origo: "slidercenter",
      speed: 1000,
      levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
      type: "scroll"
    },
    shadow: 0,
    spinner: "off",
    stopLoop: "on",
    stopAfterLoops: 0,
    stopAtSlide: -1,
    shuffle: "off",
    autoHeight: "off",
    fullScreenAutoWidth: "off",
    fullScreenAlignForce: "off",
    fullScreenOffsetContainer: "",
    fullScreenOffset: "0",
    hideThumbsOnMobile: "off",
    hideSliderAtLimit: 0,
    hideCaptionAtLimit: 0,
    hideAllCaptionAtLilmit: 0,
    debugMode: false,
    fallbacks: {
      simplifyAll: "off",
      nextSlideOnWindowFocus: "off",
      disableFocusListener: false,
    }
  });
 
});




//  Script for Donation Form Custom Amount 
$(document).ready(function (e) {
  var $donation_form = $("#paypal_donate_form_onetime_recurring");
  //toggle custom amount
  var $custom_other_amount = $donation_form.find("#custom_other_amount");
  $custom_other_amount.hide();
  $donation_form.find("select[name='amount']").change(function () {
    var $this = $(this);
    if ($this.val() == 'other') {
      $custom_other_amount.show().append('<div class="input-group"><span class="input-group-addon">$</span> <input id="input_other_amount" type="text" name="amount" class="form-control" value="100"/></div>');
    } else {
      $custom_other_amount.children(".input-group").remove();
      $custom_other_amount.hide();
    }
  });

  //toggle donation_type_choice
  var $donation_type_choice = $donation_form.find("#donation_type_choice");
  $donation_type_choice.hide();
  $("input[name='payment_type']").change(function () {
    if (this.value == 'recurring') {
      $donation_type_choice.show();
    } else {
      $donation_type_choice.hide();
    }
  });


  // submit form on click
  $donation_form.on('submit', function (e) {
    $("#paypal_donate_form-onetime").submit();
    var item_name = $donation_form.find("select[name='item_name'] option:selected").val();
    var currency_code = $donation_form.find("select[name='currency_code'] option:selected").val();
    var amount = $donation_form.find("select[name='amount'] option:selected").val();
    var t3 = $donation_form.find("input[name='t3']:checked").val();

    if (amount == 'other') {
      amount = $donation_form.find("#input_other_amount").val();
    }

    // submit proper form now
    if ($("input[name='payment_type']:checked", $donation_form).val() == 'recurring') {
      var recurring_form = $('#paypal_donate_form-recurring');

      recurring_form.find("input[name='item_name']").val(item_name);
      recurring_form.find("input[name='currency_code']").val(currency_code);
      recurring_form.find("input[name='a3']").val(amount);
      recurring_form.find("input[name='t3']").val(t3);

      recurring_form.find("input[type='submit']").trigger('click');

    } else if ($("input[name='payment_type']:checked", $donation_form).val() == 'one_time') {
      var onetime_form = $('#paypal_donate_form-onetime');

      onetime_form.find("input[name='item_name']").val(item_name);
      onetime_form.find("input[name='currency_code']").val(currency_code);
      onetime_form.find("input[name='amount']").val(amount);

      onetime_form.find("input[type='submit']").trigger('click');
    }
    return false;
  });

}); 

//    Quick Contact Form Validation

$("#footer_quick_contact_form").validate({
  submitHandler: function (form) {
    var form_btn = $(form).find('button[type="submit"]');
    var form_result_div = '#form-result';
    $(form_result_div).remove();
    form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
    var form_btn_old_msg = form_btn.html();
    form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
    $(form).ajaxSubmit({
      dataType: 'json',
      success: function (data) {
        if (data.status == 'true') {
          $(form).find('.form-control').val('');
        }
        form_btn.prop('disabled', false).html(form_btn_old_msg);
        $(form_result_div).html(data.message).fadeIn('slow');
        setTimeout(function () {
          $(form_result_div).fadeOut('slow')
        }, 6000);
      }
    });
  }
});
