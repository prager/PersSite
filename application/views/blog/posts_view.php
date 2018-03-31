	
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
								
									<table class="table table-hover">
								    
								    <thead>
								      <tr>
								        <th>Date</th>
								        <th>Title</th>
								        <th>Show</th>
								        <th>Publish</th>
								        <th>Edit</th>
								        <th>Delete</th>
								      </tr>
								    </thead>
								    <tbody>
								    <?php foreach($posts as $row) {?>
								    <tr>
								    	<td><?php echo $this->date_lib->set_date($row->date)['short'];?></td>
								    	<td><?php echo $row->title; ?></td>
								    	<td><?php echo anchor('blog/article/' . $row->id_blog, 'Show'); ?></td>
								    	<td><?php 
								    		if($row->published == 1) {
								    			echo anchor('blog/publish/' . $row->id_blog . '/0', 'De-Publish');
								    		}
								    		else {
								    			echo anchor('blog/publish/' . $row->id_blog . '/1', 'Publish');
								    		}
								    	?></td>
								    	<td><?php echo anchor('blog/edit_blog/' . $row->id_blog, 'Edit'); ?></td>
								    	<td><?php echo anchor('blog/delete_blog/' . $row->id_blog . '/0', 'Delete'); ?>
								    </tr>
								    <?php }?>
								    </tbody>
								  </table>						
									
								</div>
							</div>
							
							<div class='col-md-4' >
								
								<div class='sidebar' >
									
									<?php //include 'sidebar_incl.php'; ?>
									
								</div>
								
							</div>
							
						
						</div>
						
					</div>
					
				</div>