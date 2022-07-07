<div class="col-sm-12 col-md-12 mx-auto">
<!--<div class="form-body">-->
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
<!--                    <h3 class="text-center">Akshayachaitanya Donation Page</h3>-->
<!--                    <h4>Select any payment gateway to complete payment.</h4>-->
                    
                    <form id="razorpay-form" action="<?php echo base_url(); ?>campaigns/save_payment" method="POST">
                        <script type="text/javascript"  src="https://checkout.razorpay.com/v1/checkout.js"
                        data-buttontext=""
                        data-key="<?php echo $key; ?>"
                        data-amount="<?php echo $amount; ?>"
                        data-currency="INR"
                        data-name="<?php echo $name ?>"
                        data-image="<?php echo $image ?>"
                        data-description="<?php echo $description ?>"
                        data-prefill.name="<?php echo $prefill['name'] ?>"
                        data-prefill.email="<?php echo $prefill['email'] ?>"
                        data-prefill.contact="<?php echo $prefill['contact'] ?>"
                        data-notes.shopping_order_id="<?php echo $notes['merchant_order_id']; ?> "
                        data-modal.confirm_close = 'true'
                        data-modal.ondismiss="this.modal_close()"
                        <?php if ($displayCurrency !== 'INR') { ?>
                        data-display_amount="<?php echo $display_amount ?>" <?php } ?> <?php if ($displayCurrency !== 'INR') { ?>
                        data-display_currency="<?php echo $display_currency ?>" <?php } ?>
                        
                        >

                      
                        </script>
                      
                        <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
                        <input type="hidden" name="receipt" value="<?php echo $notes['merchant_order_id']; ?>">
                        <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                        <input type="hidden" name="name" value="<?php echo $prefill['name']  ?>">
                        <input type="hidden" name="email" value="<?php echo  $prefill['email']?>">
                        <input type="hidden" name="mobile_number" value="<?php echo $prefill['contact']; ?>">
                        <input type="hidden" name="city" value="<?php echo $notes['city']; ?>">
                        <input type="hidden" name="pan" value="<?php echo $prefill['pan']; ?>">
                        <input type="hidden" name="dob" value="<?php echo $prefill['dob']; ?>">
                        <input type="hidden" name="citizen" value="<?php echo $prefill['citizen']; ?>">
                        <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                        <input type="hidden" name="insert_id" value="<?php echo $insert_id; ?>">
                        <input type="hidden" name="savedate_check" value="<?php echo $savedate_check; ?>">
                        <input type="hidden" name="receive_updates" value="<?php echo $receive_updates; ?>">
                        <input type="hidden" name="save_the_date" value="<?php echo $save_the_date; ?>">
                        <input type="hidden" name="programme" value="<?php echo $programme; ?>">
                        <input type="hidden" name="table_name" value="<?php echo $table_name; ?>">
                      
                    </form>
                    
                
            </div>
        </div>
        </div>
    <!--</div>-->
</div>

<script type="text/javascript" >
    window.onload = function(){
    var button = document.getElementById('clickButton');
    $('#razorpay-form').submit();
    $('#modal-close').on('click',function(){
      
            //  window.location.replace("donate");
             window.location.href = 'donate';
        
    });

   
}

function modal_close(){
    window.location.href = 'donate';
}

</script>