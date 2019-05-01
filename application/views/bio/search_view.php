	
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
								
								<div class='post-more' >
									<a href='#' class='more-link' >
										Next Post
									</a>
								</div>
								
							</div>
							
							<div class='col-md-4' >
								
								<div class='sidebar' >
									
									<div class='sidebar-widget' >
										<br><br>
										<div class='search-box' >
											
											<input type='text' placeholder='Search' class='search-input' >
											
											<a class='search-btn' href='#' >
												<i class='ion-ios-search' ></i>
											</a>
											
										</div>
										
									</div>
									
									<div class='sidebar-widget' >
										<div class='categories-widget' >
										
											<div class='widget-header' >
												<h4>
													<i class='ion-ios-folder' ></i> Categories
												</h4>
											</div>
											
											<ul class='sidebar-list' >
												
												<li>
													<a href='#' >Web Design</a>
												</li>
												
												<li>
													<a href='#' >Travel</a>
												</li>
												
												<li>
													<a href='#' >Life Style</a>
												</li>
												
												<li>
													<a href='#' >Photography</a>
												</li>
												
												<li>
													<a href='#' >Technology</a>
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
										
									</div>
									
								</div>
								
							</div>
							
						
						</div>
						
					</div>
					
				</div>