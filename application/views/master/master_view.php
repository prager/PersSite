

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
					<div class='transition-mask' ></div>
					<div class='front-person-img' >
						<img src='<?php echo base_url() ;?>/assets/img/me.png' alt='Symp' >
					</div>
					<!--person's titles-->
					<div class='front-person-titles' >
						<span class='t1' >
							Consultant
						</span>
						<span class='t2' >
							Programmer
						</span>
						<span class='t3' >
							Freelancer
						</span>
					</div>
					<nav class='front-person-links' >
						<!--
							navigation links, data-section attribute points towards the section with id to be opened.
						-->
						<ul>
							<!-- <li>
								<a href='#' data-section='services' >Services</a>
							</li>
							<li>
								<a href='#' data-section='portfolio' >Portfolio</a>
							</li>
							 -->
							<li>
								<a href='#' data-section='addBlog' >Add Blog</a>
							</li>
							<li>
								<a href='<?php echo base_url(); ?>index.php/blog/posts'>Edit Blog</a> 	
							</li>
							<li>
								<a href='#' data-section='blog' >Blog</a>
							</li>
							<li>
								<a href="#" data-section='addUser' >Add User</a> 	
							</li>
							<li>
								<a href='<?php echo base_url(); ?>index.php/logout'>Logout</a> 	
							</li>
						</ul>
					</nav>
					<div class='front-heading text-center' >
						<h2>
							&nbsp;
						</h2>
					</div>
				</div>
			</section>
			<!--=============================================================================
				/Front Section
			===============================================================================-->


			<!--=============================================================================
				Blog Section
			===============================================================================-->
			<section id='blog' class='blog-section section' >

				<div class='container' >

					<div class='row' >

						<div class='col-md-6 col-md-offset-3' >
						<div class='section-header text-center' >

								<h2>K's Blog</h2>
								
								<div class='divider-draft center' ></div>

								<p>
									This is my blog where my thoughts live.
								</p>
							</div>
						</div>
					</div>
				</div>

				<div class='posts-block section-block' >

					<div class='container' >

						<div class='row' >

							<div class='col-md-8' >

								<div class='post' >

									<div class='content' >
									<?php if($pinned != NULL) {?>
									<h4>
										<?php echo anchor('blog/article/' . $pinned['id_blog'], $pinned['title']); ?>
									</h4>
									<ul class='post-icons' >

										<li>
											<i class='ion-ios-person' ></i>
											<span><?php echo $pinned['fname'] . ' ' . $pinned['lname']; ?></span>
										</li>

										<li>
												<i class='ion-ios-clock' ></i>
												<span><?php echo $pinned['date']; ?></span>
										</li>

										<!-- <li>
												<i class='ion-ios-chatbubble' ></i>
												<span>5</span>
										</li> -->

									</ul>
									
									<p>
										<?php echo $pinned['snip']; ?>
									</p>

									<a href='<?php echo base_url(); ?>index.php/blog/article/<?php echo $pinned['id_blog']; ?>' class='read-more' >
										Read More
									<i class='ion-ios-arrow-thin-right' ></i>
									</a>
									<hr />
									
									<?php }?>
									<?php $i = 0;?>
									<?php foreach($exerpts as $snip) {?>
									
										<h4>
											<?php echo anchor('blog/article/' . $snip['id_blog'], $snip['title']); ?>
										</h4>

										<ul class='post-icons' >

											<li>
												<i class='ion-ios-person' ></i>
												<span><?php echo $snip['fname'] . ' ' . $snip['lname']; ?></span>
											</li>

											<li>
												<i class='ion-ios-clock' ></i>
												<span><?php echo $snip['date']; ?></span>
											</li>

											<!-- <li>
												<i class='ion-ios-chatbubble' ></i>
												<span>5</span>
											</li> -->

										</ul>
										
										<!--  <div class='media' >
											<img alt='symp' src='<?php echo base_url() ;?>/assets/img/bg2.jpg' >
										</div>
										<br>-->
										<p>
											<?php echo $snip['snip']; ?>
										</p>

										<a href='<?php echo base_url(); ?>index.php/blog/article/<?php echo $snip['id_blog']; ?>' class='read-more' >
											Read More
											<i class='ion-ios-arrow-thin-right' ></i>
										</a>
										<hr />
									<?php
										$i++;
									}?>
									</div>

								</div>

							<!--<div class='post-more' >
									<a href='#' class='more-link' >
										Load More
									</a>
								</div>-->

							</div>

							<div class='col-md-4' >

								<div class='sidebar' >
									
									<div class='sidebar-widget' >

										<!-- <div class='search-box' >

											<input type='text' placeholder='Search' class='search-input' >

											<a class='search-btn' href='#' >
												<i class='ion-ios-search' ></i>
											</a>

										</div> -->

									</div>

									<!-- <div class='sidebar-widget' >
										<div class='categories-widget' >

											<div class='widget-header' >
												<h4>
													<i class='ion-ios-folder' ></i> Categories
												</h4>
											</div>

											<ul class='sidebar-list' >
											<?php foreach($subjects as $sub) { ?>
												<li>
													<a href='#' ><?php echo $sub;?></a>
												</li>
											<?php } ?>

											</ul>

										</div> 
									</div>-->
									
									<?php include 'sidebar_incl.php'; ?>
																		
									<!-- <div class='sidebar-widget' >

										<div class='widget-header' >
											<h4>
												<i class='ion-document' ></i>
												Recent Posts
											</h4>
										</div>


											<ul class='sidebar-list' >
											<?php $i = 0;?>
											<?php foreach($exerpts as $snip) {?>
												<li>
													<?php 
													if($i < 4) {
														echo anchor('blog/show/' . $snip['id_blog'], $snip['title']);
													}
													else {
														break;
													}
													$i++;
													?>
												</li>
											<?php } ?>

											</ul>

									</div> -->

									<!-- <div class='sidebar-widget' >
										<div class='widget-header' >

											<h4>
												<i class='ion-archive' ></i>
												Archives
											</h4>

											<ul class='sidebar-list' >

												<li>
													<a href='#' >
														June (14)
													</a>
												</li>

												<li>
													<a href='#' >
														July (10)
													</a>
												</li>

												<li>
													<a href='#' >
														August(6)
													</a>
												</li>


												<li>
													<a href='#' >
														September(7)
													</a>
												</li>



											</ul>

										</div>
									</div>

									<div class='sidebar-widget' >
										<div class='widget-header' >
											<h4>
												<i class='ion-ios-pricetag' ></i>
												Tags
											</h4>
										</div>

										<ul class='sidebar-list list-inline' >
											<li>
												<a href='#' >Design</a>
											</li>
											<li>
												<a href='#' >Tech</a>
											</li>
											<li>
												<a href='#' >Web</a>
											</li>
											<li>
												<a href='#' >Modern</a>
											</li>
											<li>
												<a href='#' >Photography</a>
											</li>
											<li>
												<a href='#' >Life</a>
											</li>
											<li>
												<a href='#' >App</a>
											</li>
											<li>
												<a href='#' >Template</a>
											</li>

										</ul>

									</div>-->

								</div>

							</div>


						</div>

					</div>

				</div>


				<div class='footer bg-lightgray section-block' >

					<div class='container' >

						<div class='row' >

							<div class='col-xs-6 text-left' >
								<h4><?php echo $user['fname'] . ' ' . $user['lname']; ?></h4>
							</div>

							<div class='col-xs-6 text-right' >
								<ul class='footer-social' >
									<li>
										<a href='https://www.facebook.com/jkulisek' >
											<i class='ion-social-facebook' ></i>
										</a>
									</li>
									<li>
										<a href='https://plus.google.com/102144146559622259709' >
											<i class='ion-social-googleplus' ></i>
										</a>
									</li>
									<li>
										<a href='https://www.linkedin.com/in/jan-kul%C3%ADsek-13066b44' >
											<i class='ion-social-linkedin' ></i>
										</a>
									</li>
								</ul>
							</div>

						</div>


					</div>

				</div>


			</section>
			<!--=============================================================================
				/Blog Section
			===============================================================================-->


			<!--=============================================================================
				Add Blog Section 
			===============================================================================-->
			<section id='addBlog' class='contact-section section' >

				<div class='contact-block section-block' >
					<div class='container' >
						<div class='row' >
							<div class='col-md-6 col-md-offset-3' >

								<div class='section-header text-center' >
									<h2 class='animate text-over-block' >Add Blog</h2>
									<!--divider-->
									<div class='divider-draft center' ></div>
									<!--/divider-->
									<p>
										Add Blog
									</p>
								</div>

							</div>
						</div>

						<div class='row' >
							<div class='col-md-8 col-md-offset-2' >
								<?php echo form_open('master/add_blog', array('class' => 'contact-form', 'data-toggle' => 'validator')) ?>
								<!-- <form id='contact' name='contact' class='contact-form' action='mail.php' method='post' data-toggle='validator' > -->

									<div id='contact-form-result' ></div>

									<div class='row' >

										<div class='col-md-6' >
											<div class='form-group' >
												<input type='text' id='title' name='title' class='form-control' placeholder='Title' required>
												<div class='help-block with-errors' ></div>

											</div>
										</div>
									
										<div class='col-md-6' >
											<div class='form-group' >
												<!-- <input type='text' id='title' name='title' class='form-control' placeholder='Title' required>-->
												<?php echo form_dropdown('subj', $this->arr_lib->subjects(), '0', 'class="form-control"'); ?>
												<div class='help-block with-errors' ></div>

											</div>
										</div>
									</div>

									<div class='form-group' >
										<textarea rows='10' id='article' name='article' class='form-control' placeholder='Text' required></textarea>
										<div class='help-block with-errors' ></div>
									</div>

									<div class='form-group text-center' >
										<button type='submit' class='symp-btn' >Submit</button>
									</div>
								<?php echo form_close(); ?>
								<!-- </form> -->
							</div>
						</div>


					</div>
				</div>


				<div class='footer bg-lightgray section-block' >

					<div class='container' >

						<div class='row' >

							<div class='col-xs-6 text-left' >
								<h4><?php echo $user['fname'] . ' ' . $user['lname']; ?></h4>
							</div>

							<div class='col-xs-6 text-right' >
								<ul class='footer-social' >
									<li>
										<a href='https://www.facebook.com/jkulisek' >
											<i class='ion-social-facebook' ></i>
										</a>
									</li>
									<li>
										<a href='https://plus.google.com/102144146559622259709' >
											<i class='ion-social-googleplus' ></i>
										</a>
									</li>
									<li>
										<a href='https://www.linkedin.com/in/jan-kul%C3%ADsek-13066b44' >
											<i class='ion-social-linkedin' ></i>
										</a>
									</li>
								</ul>
							</div>

						</div>


					</div>

				</div>


			</section>
			<!--=============================================================================
				/Add Blog Section
			===============================================================================-->
			
			<!--=============================================================================
				Add User Section
			===============================================================================-->
			<section id='addUser' class='contact-section section' >

				<div class='contact-block section-block' >
					<div class='container' >
						<div class='row' >
							<div class='col-md-6 col-md-offset-3' >

								<div class='section-header text-center' >
									<h2 class='animate text-over-block' >Add User</h2>
									<!--divider-->
									<div class='divider-draft center' ></div>
									<!--/divider-->
									<p>
										Add User.
									</p>
								</div>
							</div>
						</div>
						
						<div class='row' >
							<div class='col-md-8 col-md-offset-2' >

								<?php echo form_open('master/set_user', array('class' => 'contact-form', 'data-toggle' => 'validator')) ?>
								<!-- <form class='contact-form' action='mail.php' method='post' data-toggle='validator' > -->

									<div id='contact-form-result' ></div>

									<div class='row' >
										<div class='col-md-2' >&nbsp;</div>
										<div class='col-md-3' >
											<div class='form-group' >
												<input type='text' class='form-control' id='username' name='username' placeholder='Username' required>
												<div class='help-block with-errors' ></div>

											</div>
										</div>

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
												<input type='text' class='form-control' id='email' name='email' placeholder='Email' required>
												<div class='help-block with-errors' ></div>

											</div>
										</div>

										<div class='col-md-1' >&nbsp;</div>

										<div class='col-md-3' >
											<div class='form-group' >
												<input type='text' class='form-control' id='phone' name='phone' placeholder='Phone' required>
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
				</div>
				
				<div class='footer bg-lightgray section-block' >

					<div class='container' >

						<div class='row' >

							<div class='col-xs-6 text-left' >
								<h4><?php echo $user['fname'] . ' ' . $user['lname']; ?></h4>
							</div>

							<div class='col-xs-6 text-right' >
								<ul class='footer-social' >
									<li>
										<a href='https://www.facebook.com/jkulisek' >
											<i class='ion-social-facebook' ></i>
										</a>
									</li>
									<li>
										<a href='https://plus.google.com/102144146559622259709' >
											<i class='ion-social-googleplus' ></i>
										</a>
									</li>
									<li>
										<a href='https://www.linkedin.com/in/jan-kul%C3%ADsek-13066b44' >
											<i class='ion-social-linkedin' ></i>
										</a>
									</li>
								</ul>
							</div>

						</div>


					</div>

				</div>


			</section>
				
			<!--close button-->
			<div class='close-btn' >
				<span></span>
				<span></span>
			</div>
			<!--/close button-->



		</div>
		<!--=============================================================================
			/Main Wrapper
		===============================================================================-->

