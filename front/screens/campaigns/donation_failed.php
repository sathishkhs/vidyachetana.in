
		<style>
    .centralized-title {
    font-size: 30px;
    margin-bottom: 20px;
    color: #5ab941;
}
.centralized-content {
    font-family: 'Lato', sans-serif;
    color: #343a40;
    font-size: 18px;
    font-weight: 300;
    margin-bottom: 30px;
    line-height: 1.5em;
}
.text-danger {
    color: #dc3545 !important;
}
.social-meida-icons-footer.copy-footer {
    margin-right: 0;
}
.copy-footer {
    width: unset;
    margin-right: 80px;
}
.social-meida-icons-footer {
    width: 100%;
    display: flex;
    justify-content: center;
}
.ym-social {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}
.social-meida-icons-footer .ym-social li a {
    background: transparent;
}
.social-meida-icons-footer .ym-social li a {
    width: 35px;
    height: 35px;
    font-size: 16px;
    display: flex;
}
.social-meida-icons-footer .ym-social li a {
    color: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
}
.ym-social li a {
    background-color: #3b5a9a;
    color: #ffffff;
}
.ym-social li a {
    background-color: #686f7c;
    width: 23px;
    height: 23px;
    text-align: center;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    margin-left: 8px;
    color: #ffffff !important;
    font-size: 13px;
    transition: 0.4s ease all;
    -webkit-transition: 0.4s ease all;
    -moz-transition: 0.4s ease all;
}

</style>

<div class="conainer mx-auto my-5 section-padding">
			<div class="row mx-auto">
				<div class="col-sm-10 col-md-10 mx-auto">
					<div class="inner-absolute-banner text-dark">
						<div class="centralized-title text-center">
						Sorry, <?php echo $this->session->flashdata('name'); ?> your transaction was unsuccessful. 
						</div>
						<div class="centralized-content ">
							<p class="text-center ">We appreciate your generosity and attempt to support our Scholarship Programme. However, we regret to inform that your online donation transaction could not be completed due to possible technical error. </p>
						</div>
						<div class="centralized-content ">
                            <p class="text-center ">Your contribution is of utmost significance. Hence, we request you to kindly try donating once again through this link <a class="btn btn-primary" href="sponsor-a-child">Click Here</a>. You can also choose to try an alternate payment method like credit card, debit card, UPI, net banking, or wallet.  </p>
						</div>
                        <div class="centralized-content ">
                            <p class="text-center ">If you again face the same concern, please call us at <a href="tel:7349246271">+91 7349246271</a> or email us at <a href="vidyachetana@youthforseva.org">vidyachetana@youthforseva.org</a>. We will do our best to assist you. </p>
                        </div>
						
                        <?php if(!empty($this->session->flashdata('error_msg'))){ ?>
                            <div class="row">
                                <div class="col-sm-10 mx-auto">
                                    <h2 class="centralized-title">Donation Details</h2>
                                    <table>
                                        <tbody>
                                        
                                            <tr>
                                                <th >Transaction Id:</th>&nbsp;&nbsp;
                                                <td colspan="4"><?php echo $this->session->flashdata('error_msg'); ?></td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php } ?>
                          
					</div>
					 <div class="association-social-center text-center">
            <div class="social-meida-icons-footer copy-footer">
                <ul class="ym-social">
                 <li><a href="https://www.facebook.com/"><i class="fab fa-facebook-f text-dark" aria-hidden="true"></i></a></li>
        <li><a href="https://www.instagram.com/"><i class="fab fa-instagram text-dark" aria-hidden="true"></i></a></li>
        <li><a href="https://twitter.com/"><i class="fab fa-twitter text-dark"></i></a></li>
        <li><a href="javascript:void(0)"><i class="fab fa-linkedin-in text-dark" aria-hidden="true"></i></a></li>
        <li><a href="https://www.youtube.com"><i class="fab fa-youtube text-dark"></i></a></li>
                </ul>
            </div>
             <a style="text-align:center;color:#fff;" href="privacy-policy">Privacy and Donation refund policy, Terms and Conditions</a>
        </div>
				</div>
			</div>
		
			
	
		</div>



		<script>
// Measures product impressions and also tracks a standard
// pageview for the tag configuration.
// Product impressions are sent by pushing an impressions object
// containing one or more impressionFieldObjects.
// dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
// dataLayer.push({
//   'ecommerce': {
//     'currencyCode': 'INR',                       // Local currency is optional.
//     'impressions': [
//      {
//        'name': '<?php echo $name; ?>',       // Name or ID is required.
//        'id': '<?php echo $this->session->flashdata("order_id"); ?>',
//        'price': '<?php echo $amount; ?>',
//        'brand': 'XXXXXX',
//        'category': 'XXXXXX',
//        'variant': 'XXXXXX',
//        'list': 'XXXXXXXX',
//        'position': 1
//      },
//     ]
//   }
// });
 </script>