<div class="container format-video">
	<div class="row">
		<div class="col-md-6">
			<?php 
			$width = '540';
			$height = '360';
			
			$parsedUrl  = parse_url(get_the_content());
			
			//specified condition for YouTube URL
			if($parsedUrl['host'] == 'www.youtube.com' || $parsedUrl['host'] == 'youtube.com')	{
			//get Youtube id from URL
			$embed = $parsedUrl['query'];
			parse_str($embed, $out);
			$embedUrl   = $out['v'];
			$embedUrl = explode('__',$embedUrl);
			$url = '//www.youtube.com/embed/'.$embedUrl[0] ;
			
			//echo the embed code for you tube
			echo '<div class="video-frame"><iframe width="'.$width.'" height="'.$height.'" src="'.$url.'" frameborder="0" allowfullscreen></iframe></div>';
			}
			
			//specified condition for vimeo URL
			if($parsedUrl['host'] == 'www.vimeo.com' || $parsedUrl['host'] == 'vimeo.com') {
			//get vimeo id from URL	
			$urlid = $parsedUrl['path'];
			$number = preg_replace("/[^0-9]/", '', $urlid);
		    $url = '//player.vimeo.com/video/'.$number ;
		  
			//echo the embed code for Vimeo
			echo '<div class="video-frame"><iframe width="'.$width.'" height="'.$height.'" src="'.$url.'" frameborder="0" allowfullscreen></iframe></div>';
			}
			?>
		</div>
		<div class="col-md-6">
			<div class="video-content">
			<h1><?php the_title();?></h1>
			<?php  if($post->post_excerpt!=''){?>
				<p><?php echo(get_the_excerpt()); ?></p><?php
			}
			$slider_readmore_enable = sanitize_text_field( get_post_meta( get_the_ID(), 'slider_readmore_enable', true ));	
			$slider_readmore_txt = sanitize_text_field( get_post_meta( get_the_ID(), 'slider_readmore_txt', true ));
			$slider_readmore_link = sanitize_text_field( get_post_meta( get_the_ID(), 'slider_readmore_link', true ));
			$slider_readmore_target = sanitize_text_field( get_post_meta( get_the_ID(), 'slider_readmore_target', true ));		
			if($slider_readmore_enable == 'on'){
						?>
						<a  href="<?php echo $slider_readmore_link ;?>" <?php if($slider_readmore_target=='on'){ echo 'target="_blank"';} ?> class="format-video-btn-sm"><?php if($slider_readmore_txt!=''){ _e($slider_readmore_txt,"appointment");} else{ _e("Read More","appointment");}?></a>
						<?php
				}
			
			?>		
			</div>
		</div>   	
	</div>
</div>