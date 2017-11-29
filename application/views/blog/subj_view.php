	
		<div id='preloader' >
		
			<div class='loader' >
				<img src='<?php echo base_url() ;?>/assets/img/load.gif' alt='symp' >
			</div>
			
		</div>
		
		
		<div id='wrapper' >
			
			<section id='blog' class='blog-section section' >
			<div class='container' >

					<div class='row' >

						<div class='col-md-6 col-md-offset-3' >
						<div class='section-header text-center' >

								<h2>My Blog</h2>
								
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
									<?php $i = 0;?>
									<?php foreach($exerpts as $snip) {?>
										<h4>
											<a href='post.html' >
												<?php echo $snip['title']; ?>
											</a>
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
									 }?>
									</div>

								</div>

								<div class='post-more' >
									<a href='#' class='more-link' >
										Load More
									</a>
								</div>

							</div>

							<div class='col-md-4' >

								<div class='sidebar' >
									<br>&nbsp;<br>
									<div class='sidebar-widget' >

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
											<?php foreach($subjects as $sub) { ?>
												<li>
													<a href='#' ><?php echo $sub;?></a>
												</li>
											<?php } ?>

											</ul>

										</div>
									</div>

									<div class='sidebar-widget' >

										<div class='widget-header' >
											<h4>
												<i class='ion-document' ></i>
												Recent Posts
											</h4>
										</div>


											<ul class='sidebar-list' >

												<li>
													<a href='#' >
														Your Recent Post's Title. Lorem ipsum dolor sit amet is simply a dummy text.
													</a>
												</li>

												<li>
													<a href='#' >
														Your Recent Post's Title. Lorem ipsum dolor sit amet is simply a dummy text.
													</a>
												</li>

												<li>
													<a href='#' >
														Your Recent Post's Title. Lorem ipsum dolor sit amet is simply a dummy text.
													</a>
												</li>

												<li>
													<a href='#' >
														Your Recent Post's Title. Lorem ipsum dolor sit amet is simply a dummy text.
													</a>
												</li>



											</ul>


									</div>

									<div class='sidebar-widget' >
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

									</div>

								</div>

							</div>


						</div>

					</div>

				</div>