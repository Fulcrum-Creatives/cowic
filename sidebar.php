<aside class="body__aside" role="complementary">
	<ul class="widget-area">
		
		<?php // Show Main Sidebar
	        
	        dynamic_sidebar(); ?>

		
		 <?php  $aboutus = 59;
			 	$funding = 75;
			 	$employer = 7;
			 	$jobseeker = 21;
			 	$youth = 45;
			 	$newsevents = 52;
			 	$contact = 65; 	
		?>
		
        <?php if (is_singular( 'services' )) { ?> 
				    
	             <?php  $service_type =  get_field( 'cowic_service_type', $post_id ); ?>

                <!-- services specific widgets  -->
                
				        <?php if($service_type == 'jobseeker') : ?> 
				        
				         <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Services - Job Seeker')) : ?>
								<!-- no widget -->
					     <?php endif;  ?>

					        <li id="service-widget" class="widget widget_text">
							<div class="textwidget">
							<a href="/job-seeker/services/">View all Job Seeker Services</a>
							</div>
							</li>
				        
				        <?php elseif($service_type == 'employer') : ?> 
				        
				         <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Services - Employer')) : ?>
								<!-- no widget -->
					     <?php endif;  ?>
				        
					       <li id="service-widget" class="widget widget_text">
						   <div class="textwidget">
						   <a href="/employers/services/">View all Employer Services</a>
						   </div>
						   </li>

				        
				        <?php endif; ?>

			<?php  }  // End Services Sidebars ?>
				
				
				<?php // Show Event Specific Sidebar
	         if (is_singular( 'ai1ec_event' )) { ?>
		        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Event Sidebar')) : ?>
				<!-- no widget -->
				<?php endif; }  ?>
		
		 <?php // Show About Us Specific Sidebar
	         if (is_tree($aboutus) || is_page($aboutus)) { ?>
		        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('About Us Sidebar')) : ?>
				<!-- no widget -->
				<?php endif; } ?>
				
		 <?php // Show Funding Specific Sidebar
	         if (is_tree($funding) || is_page($funding)) { ?>
		        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Funding Sidebar')) : ?>
				<!-- no widget -->
				<?php endif; } ?>
				
		 <?php // Show Employer Specific Sidebar
	         if (is_tree($employer) || is_page($employer)) { ?>
		        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Employer Sidebar')) : ?>
				<!-- no widget -->
				<?php endif; } ?>
				
		 <?php // Show Job Seeker Specific Sidebar
	         if (is_tree($jobseeker) || is_page($jobseeker)) { ?>
		        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Job Seeker Sidebar')) : ?>
				<!-- no widget -->
				<?php endif; } ?>
				
		 <?php // Show Youth Specific Sidebar
	         if (is_tree($youth) || is_page($youth)) { ?>
		        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Youth Sidebar')) : ?>
				<!-- no widget -->
				<?php endif; } ?>
				
		 <?php // Show News & Events Specific Sidebar
	         if (is_tree($newsevents) || is_page($newsevents)) { ?>
		        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('News & Events Sidebar')) : ?>
				<!-- no widget -->
				<?php endif; } ?>
				
		 <?php // Show Contact Specific Sidebar
	         if (is_tree($contact) || is_page($contact)) { ?>
		        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Contact Sidebar')) : ?>
				<!-- no widget -->
				<?php endif; } ?>



		        
		        

        
               	              
	</ul>
</aside>
