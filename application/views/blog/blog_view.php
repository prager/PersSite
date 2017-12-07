	
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
									<?php foreach($exerpts as $snip) {
									if($snip['published'] == 1) {?>
										<h4>
											<?php echo anchor('blog/show/' . $snip['id_blog'], $snip['title']); ?>
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

										<a href='<?php echo base_url(); ?>index.php/blog/show/<?php echo $snip['id_blog']; ?>' class='read-more' >
											Read More
											<i class='ion-ios-arrow-thin-right' ></i>
										</a>
										<hr />
									<?php
										$i++;
									 }
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
					
				</div>