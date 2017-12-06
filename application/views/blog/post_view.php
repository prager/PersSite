	
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
	
									<h2>K's Blog</h2>
									
									<div class='divider-draft center' ></div>
	
									<p>
										This is my blog where my thoughts live. Still under development, for example the Comments Section is coming. 
										Come back and be surprised!
									</p>
									<p> <?php //echo 'test'; ?></p>
								</div>
							</div>
						</div>
					</div>
					
					
					<div class='container' >
						
						<div class='row' >
							
							<div class='col-md-8' >
								
								<div class='post' >
									
									<!-- <div class='media' >
										<img src='<?php echo base_url() ;?>/assets/img/bg3.jpg' alt='symp' >
									</div>-->
									
									<div class='content' >
										
										<h4>
											<a href='#' >
												<?php echo $post->title; ?>
											</a>
										</h4>
										
										<ul class='post-icons' >
											
											<li>
												<i class='ion-ios-person' ></i>
												<span><?php echo $fname . ' ' . $lname?></span>
											</li>
											
											<li>
												<i class='ion-ios-clock' ></i>
												<span><?php echo $this->date_lib->set_date($post->date)['long']; ?></span>
											</li>
											
											<!-- <li>
												<i class='ion-ios-chatbubble' ></i>
												<span>5</span>
											</li> -->										
											
											
										</ul>
										
										<p><?php echo $post->text; ?></p>
										
									</div>
									
								</div>
								
								<?php if($logged) {?>
								<div class='post-more' >
									<a href='<?php echo base_url() ;?>index.php/blog/edit_blog/<?php echo $post->id_blog?>' class='more-link' >
										Edit Post
									</a>&nbsp;&nbsp;
									&nbsp;&nbsp;<a href='<?php echo base_url() ;?>index.php/blog/delete_blog/<?php echo $post->id_blog?>/0' class='more-link' >
										Delete Post
									</a>
									<?php if($post->published == 1) {?>
										&nbsp;&nbsp;<a href='<?php echo base_url() ;?>index.php/blog/publish/<?php echo $post->id_blog?>/0' class='more-link' >
										De-publish Post</a>
									<?php }
									else {?>
										&nbsp;&nbsp;<a href='<?php echo base_url() ;?>index.php/blog/publish/<?php echo $post->id_blog?>/1' class='more-link' >
										Publish Post</a>
									<?php }?>
								</div>
								<?php }?>
							</div>
							
							<div class='col-md-4' >
								
								<div class='sidebar' >
									
									<?php include 'sidebar_incl.php'; ?>
									
								</div>
								
							</div>
							
						
						</div>
						
					</div>
					
				</div>