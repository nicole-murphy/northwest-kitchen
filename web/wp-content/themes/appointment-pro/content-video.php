<!-- Post Format - Video -->
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
							<div class="video-wrapper">
								<?php 
			$width = '540';
			$height = '360';

			$parsedUrl  = parse_url(get_the_content());
			
			if(array_key_exists("host",$parsedUrl))
			{
				
				//specified condition for YouTube URL
				if($parsedUrl['host'] == 'www.youtube.com' || $parsedUrl['host'] == 'youtube.com')	{
				//get Youtube id from URL
				$embed = $parsedUrl['query'];
				parse_str($embed, $out);
				$embedUrl   = $out['v'];
				$embedUrl = explode('__',$embedUrl);
				$url = '//www.youtube.com/embed/'.$embedUrl[0] ;
				
				//echo the embed code for you tube
				echo '<iframe width="'.$width.'" height="'.$height.'" src="'.$url.'" frameborder="0" allowfullscreen></iframe>';
				}
				
				//specified condition for vimeo URL
				if($parsedUrl['host'] == 'www.vimeo.com' || $parsedUrl['host'] == 'vimeo.com') {
				//get vimeo id from URL	
				$urlid = $parsedUrl['path'];
				$number = preg_replace("/[^0-9]/", '', $urlid);
				$url = '//player.vimeo.com/video/'.$number ;
			  
			  
				//echo $url;
				//echo the embed code for Vimeo
				echo '<iframe width="'.$width.'" height="'.$height.'" src="'.$url.'" frameborder="0" allowfullscreen></iframe>';
				}
				
				//specified condition for vimeo URL
				if($parsedUrl['host'] == 'www.videopress.com' || $parsedUrl['host'] == 'videopress.com') {
				//get vimeo id from URL	
				$urlid = $parsedUrl['path'];
				//$number = preg_replace("/[^0-9]/", '', $urlid);
				$url = '//videopress.com'.$urlid ;
				//echo the embed code for Vimeo
				echo '<iframe width="'.$width.'" height="'.$height.'" src="'.$url.'" frameborder="0" allowfullscreen></iframe>
				<script src="https://videopress.com/videopress-iframe.js"></script>';
				}
			}
			?>
							</div>
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
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<?php the_excerpt(); ?>
						</div>
					</div>
				</div>
				<!-- /Post Format - Video -->