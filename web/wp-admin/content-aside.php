<div class="blog-lg-area-left">
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
			<?php 
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
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></a></h3>
			<div class="aside-content"><?php the_content();?> </div>
		</div>
	</div>
</div>