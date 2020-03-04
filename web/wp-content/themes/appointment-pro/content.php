<div id="post-<?php the_ID(); ?>" <?php 
	if(is_page_template('blog-left-sidebar.php') ) 
	{ 
	post_class('blog-lg-area-right'); 
	} 
	else if(is_page_template('blog-fullwidth.php') ) 
	{ 
		post_class('blog-lg-area-full');
	}
    
	else{
		post_class('blog-lg-area-left'); 
	}
	?>>
	<div class="media">						
			<?php
			
			 if(!is_home() && !is_page_template('blog-masonry.php'))
			{
			appointment_aside_meta_content(); 
			}
			elseif(is_home())
			{
			appointment_aside_meta_content(); 
			}
			
			?>
		<div class="media-body">
				<?php // Check Image size for fullwidth template
				 appointment_post_thumbnail('','img-responsive');
				 
				if(is_page_template('blog-masonry.php'))
				{
				appointment_aside_masonry_meta_content();
				
				}
				 if(!is_home() && !is_page_template('blog-masonry.php'))
				{
				 appointment_post_meta_content();
				}
				elseif(is_home())
				{
				 appointment_post_meta_content();
				}
				?>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		        <?php  
                // call editor content of post/page	
				the_content( __( 'Read More' , 'appointment' ) );
				wp_link_pages( );
		       ?>
		</div>
	</div>
</div>