	
		<div id='preloader' >
		
			<div class='loader' >
				<img src='<?php echo base_url() ;?>/assets/img/load.gif' alt='symp' >
			</div>
			
		</div>
		
		
		<div id='wrapper' >
			
			<section id='post' class='blog-page blog-section' >
				
				<div class='posts-block section-block' >
					<div class='container' >
						<div class='row' >
							<div class='col-md-6 col-md-offset-3' >

								<div class='section-header text-center' >
									<h2 class='animate text-over-block' >Edit Blog</h2>
									<!--divider-->
									<div class='divider-draft center' ></div>
									<!--/divider-->
									<p>
										Edit Blog
									</p>
								</div>

							</div>
						</div>

						<div class='row' >
							<div class='col-md-8 col-md-offset-2' >
								<?php echo form_open('blog/submit_edit/' . $post->id_blog, array('class' => 'contact-form', 'data-toggle' => 'validator')) ?>
								<!-- <form id='contact' name='contact' class='contact-form' action='mail.php' method='post' data-toggle='validator' > -->

									<div id='contact-form-result' ></div>

									<div class='row' >

										<div class='col-md-6' >
											<div class='form-group' >
											<!-- <label><?php echo 'post title: ' . $post->title; ?></label> -->
												<input type='text' id='title'
												maxlength="64" name='title' class='form-control' value='<?php echo $post->title; ?>' required>
												<div class='help-block with-errors' ></div>

											</div>
										</div>
									
										<div class='col-md-6' >
											<div class='form-group' >
												<!-- <input type='text' id='title' name='title' class='form-control' placeholder='Title' required>-->
												<?php echo form_dropdown('subj', $this->arr_lib->subjects(), $post->subject, 'class="form-control"'); ?>
												<div class='help-block with-errors' ></div>

											</div>
										</div>
									</div>

									<div class='form-group' >
										<textarea rows='10' id='article' name='article' class='form-control' required><?php echo trim($post->text); ?></textarea>
										<div class='help-block with-errors' ></div>
									</div>

									<div class='form-group text-center' >
										<button type='submit' class='symp-btn' >Submit</button>&nbsp;<a href="<?php echo base_url() ;?>index.php/blog/posts" class="butn symp-btn"
										role="button">Back to Posts</a>
									</div>
								<?php echo form_close(); ?>
								<!-- </form> -->
							</div>
						</div>


					</div>
				</div>