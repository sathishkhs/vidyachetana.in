	<!-- Appointment Section -->
    <section class="appointment-section" id="appointment-form">
			<div class="image-layer"></div>
			<div class="container">
				<div class="row">
					<!-- Content Column -->
					<div class="content-column col-md-9 col-sm-12">
						<div class="inner-column">
							<span class="title">Need a Doctor?</span>
							<h2>Just Make an Appointment and You’re Done!</h2>
							<div class="number">Call: <strong><?php echo $settings->TELEPHONE_NUM; ?></strong></div>
						</div>
					</div>
					<div class="content-column col-md-3 col-sm-12">
						&nbsp;
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-sm-12">
						<div class="appoinment-form">
							<form method="post" action="index/appointment" id="appointmentform">
								<div class="row clearfix">
									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<input type="text" name="name" placeholder="Your Name" required="" id="name">
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<input type="text" name="phone" placeholder="Your Phone" required="" id="phone">
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<input type="email" name="email" placeholder="Email Address" required="" id="email">
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<input type="datetime-local" name="appointment_date" placeholder="Select Date" required="" id="appointment_date">
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<select name="speciality_id" id="speciality_id" onchange="appointment(this.value);" required="">
											<option >Select Speciality</option>
											<?php foreach($specialities as $key => $speciality){ ?>
											<option value="<?php echo $speciality->speciality_id; ?>"><?php echo $speciality->speciality_name; ?></option>
											<?php } ?>
											<!--<option value="1">Oncology Medical & Surgical</option>-->
											<!--<option value="2">Obstetrics & Gynaecology</option>-->
											<!--<option value="3">Urology</option>-->
											<!--<option value="4">Gastroenterology</option>-->
											<!--<option value="5">Orthopaedics</option>-->
											<!--<option value="6">ENT</option>-->
											<!--<option value="7">Paediatrics</option>-->
											<!--<option value="8">Neurology & Neurosurgery</option>-->
										</select>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<select name="doctors_id" id="doctors_id" onchange="" required="">
											<option >Select Doctor</option>
											<!--<?php foreach($specialities as $key => $speciality){ ?>-->
											<!--<option value="<?php echo $speciality->doctors_id; ?>"><?php echo $speciality->doctor_name; ?></option>-->
											<!--<?php } ?>-->
											<!--<option value="1">Oncology Medical & Surgical</option>-->
											<!--<option value="2">Obstetrics & Gynaecology</option>-->
											<!--<option value="3">Urology</option>-->
											<!--<option value="4">Gastroenterology</option>-->
											<!--<option value="5">Orthopaedics</option>-->
											<!--<option value="6">ENT</option>-->
											<!--<option value="7">Paediatrics</option>-->
											<!--<option value="8">Neurology & Neurosurgery</option>-->
										</select>
									</div>


								
									
									<div class="col-lg-12 col-md-12 col-sm-12 form-group">
										<textarea name="message" placeholder="Message" required="" id="message"></textarea>
									</div>
									
									<div class="col-lg-12 col-md-12 col-sm-12 form-group">
										<button class="small" type="submit" id="submit-form"><span class="btn-title">GET APPOINTMENT</span></button>
									</div>
								</div>

							</form>
						</div>
					</div>
					
				</div>
			</div>
		</section>