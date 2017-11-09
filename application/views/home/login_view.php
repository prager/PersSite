

		<!--=============================================================================
			Preloader
		===============================================================================-->
		<div id='preloader' >
			<div class='loader' >
				<img src='<?php echo base_url() ;?>/assets/img/load.gif' alt='symp' >
			</div>
		</div>
		<!--=============================================================================
			Main Wrapper
		===============================================================================-->
		<div id='wrapper' >
		<!--=============================================================================
				Front Section
			===============================================================================-->
			<section class='front-section' >
				<div class='container' >
				<div class='row' >&nbsp;</div>
				<div class='contact-block section-block' >
						<div class='row' >
							<div class='col-md-6 col-md-offset-3' >

								<div class='section-header text-center' >
									<h2 class='animate text-over-block' >User Login</h2>
									<!--divider-->
									<div class='divider-draft center' ></div>
									<!--/divider-->
									<p>
										Please, enter your Username and Password.
									</p>
								</div>

							</div>
						</div>

						<div class='row' >
							<div class='col-md-8 col-md-offset-2' >

								<?php echo form_open('login', array('class' => 'contact-form', 'data-toggle' => 'validator')) ?>								
								<!-- <form class='contact-form' action='mail.php' method='post' data-toggle='validator' > -->

									<div id='contact-form-result' ></div>

									<div class='row' >

										<div class='col-md-3' >&nbsp;</div>

										<div class='col-md-6' >
											<div class='form-group' >
												<input type='text' class='form-control' id='username' name='username' placeholder='Username' required>
												<div class='help-block with-errors' ></div>

											</div>
										</div>

									</div>

									<div class='row' >

										<div class='col-md-3' >&nbsp;</div>

										<div class='col-md-6' >
											<div class='form-group' >
												<input type='password' class='form-control' id='pass' name='pass' placeholder='password' required>
												<div class='help-block with-errors' ></div>

											</div>
										</div>

									</div>
									<div class='row' >&nbsp;</div>
									<div class='form-group text-center' >
										<button type='submit' class='symp-btn' >Login</button>
									</div>

								<!--  </form>-->
								<?php echo form_close(); ?>
							</div>
						</div>


					</div>
				</div>


				<div class='footer bg-lightgray section-block' >

					<div class='container' >

						<div class='row' >

							<div class='col-xs-6 text-left' >
								<h4>Johny Doe</h4>
							</div>

							<div class='col-xs-6 text-right' >
								<ul class='footer-social' >
									<li>
										<a href='#' >
											<i class='ion-social-facebook' ></i>
										</a>
									</li>
									<li>
										<a href='#' >
											<i class='ion-social-twitter' ></i>
										</a>
									</li>
									<li>
										<a href='#' >
											<i class='ion-social-pinterest' ></i>
										</a>
									</li>
									<li>
										<a href='#' >
											<i class='ion-social-dribbble' ></i>
										</a>
									</li>
								</ul>
							</div>

						</div>


					</div>

				</div>	
				
					
			</section>
			<!--=============================================================================
				/Front Section
			===============================================================================-->
		</div>
		<!--=============================================================================
			/Main Wrapper
		===============================================================================-->


		