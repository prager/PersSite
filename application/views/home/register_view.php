	
		<div id='preloader' >
		
			<div class='loader' >
				<img src='<?php echo base_url() ;?>/assets/img/load.gif' alt='symp' >
			</div>
			
		</div>
		
		
		<div id='wrapper' >
			
			<section id='register' class='blog-page blog-section' >
				
				<div class='posts-block section-block' >
				
					<div class='container' >
	
						<div class='row' >
	
							<div class='col-md-6 col-md-offset-3' >
							<div class='section-header text-center' >
	
									<h2>Register</h2>
									
									<div class='divider-draft center' ></div>
	
									<p>
										Register here
									</p>
									<p> <?php //echo 'test'; ?></p>
								</div>
							</div>
						</div>
					</div>
						
						<div class='row' >
							<div class='col-md-8 col-md-offset-2' >

								<?php echo form_open('home/reg_user', array('class' => 'contact-form', 'data-toggle' => 'validator')) ?>
								<!-- <form class='contact-form' action='mail.php' method='post' data-toggle='validator' > -->

									<div id='contact-form-result' ></div>

									<div class='row' >
										<div class='col-md-3' >&nbsp;</div>
										<div class='col-md-3' >
											<div class='form-group' >
												<input type='text' class='form-control' id='fname' name='fname' placeholder='First Name' required>
												<div class='help-block with-errors' ></div>

											</div>
										</div>
										<div class='col-md-3' >
											<div class='form-group' >
												<input type='text' class='form-control' id='lname' name='lname' placeholder='Last Name' required>
												<div class='help-block with-errors' ></div>

											</div>
										</div>
									</div>

									<div class='row' >
										<div class='col-md-3' >&nbsp;</div>
										<div class='col-md-3' >
											<div class='form-group' >
												<input type='text' class='form-control' id='username' name='username' placeholder='Username' required>
												<div class='help-block with-errors' ></div>

											</div>
										</div>
									</div>
									<div class='row' >
									<div class='col-md-3' >&nbsp;</div>

										<div class='col-md-3' >
											<div class='form-group' >
												<input type='password' class='form-control' id='pass1' name='pass1' placeholder='password' required>
												<div class='help-block with-errors' ></div>

											</div>
										</div>

										<div class='col-md-3' >
											<div class='form-group' >
												<input type='password' class='form-control' id='pass2' name='pass2' placeholder='confirm password' required>
												<div class='help-block with-errors' ></div>

											</div>
										</div>
									</div>
									<div class='row' >

										<div class='col-md-3' >&nbsp;</div>

										<div class='col-md-3' >
											<div class='form-group' >
												<input type='text' class='form-control' id='email' name='email' placeholder='email' required>
												<div class='help-block with-errors' ></div>

											</div>
										</div>

										<div class='col-md-3' >
											<div class='form-group' >
												<input type='text' class='form-control' id='email2' name='email2' placeholder='confirm email' required>
												<div class='help-block with-errors' ></div>

											</div>
										</div>


									</div>
									<div class='row' >&nbsp;</div>
									<div class='form-group text-center' >
										<button type='submit' class='symp-btn' >Submit</button>
									</div>

								<!--  </form>-->
								<?php echo form_close(); ?>
							</div>
						</div>
						
						
					</div>
					
				</section>
				</div>