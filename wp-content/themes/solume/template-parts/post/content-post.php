<?php $sticky_class = is_sticky()?'sticky':''; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-wrap '. $sticky_class); ?>  >
		
		<?php if( ( has_post_format('audio') || has_post_format('gallery') || has_post_format('video' ) || has_post_thumbnail() ) && solume_post_show_media() == 'yes' ): ?>	
			<div class="post-media">
				<?php 
					if( has_post_format('audio') ){

					 	get_template_part( 'template-parts/parts/audio' );

					}elseif(has_post_format('gallery')){

						get_template_part( 'template-parts/parts/gallery' );

					}elseif(has_post_format('video')){

						get_template_part( 'template-parts/parts/video' );

					}elseif(has_post_thumbnail()){

						get_template_part( 'template-parts/parts/thumbnail' );

			        }
				?>
			</div>
		<?php endif; ?>

		
		<?php if( solume_post_show_title() == 'yes' ){
			get_template_part( 'template-parts/parts/title' );
		} ?>
		

		<div class="post-meta">
			<?php get_template_part( 'template-parts/parts/meta' ); ?>
		</div>

		<div class="post-content">
			<?php get_template_part( 'template-parts/parts/content' ); ?>
		</div>

		<?php if(has_tag() &&  solume_post_show_tag() == 'yes' ){ ?>
			<div class="post-tags">
				<?php get_template_part( 'template-parts/parts/tags' ); ?>
			</div>
		<?php } ?>

		<!-- Next Preview Post -->
	    <div class="ova-next-pre-post">
			<?php
			$prev_post = get_previous_post();
			$next_post = get_next_post();
			?>
			
			<?php
			if($prev_post) {
				?>
				<a class="pre" href="<?php echo esc_attr(get_permalink($prev_post->ID)); ?>">
					<span class="num-1">
						<i class="icomoon icomoon-angle-left"></i>
					</span>
					<span  class="num-2">
						<span class="second_font text-label"><?php esc_html_e('Previous Post', 'solume'); ?></span>
						<span  class="second_font title" ><?php echo esc_html(get_the_title($prev_post->ID)); ?></span>
					</span>
				</a>

				<?php
			}

			?>		
			
			<?php
			if($next_post) {
				?>
				<a class="next" href="<?php echo esc_attr(get_permalink($next_post->ID)); ?> ">
					<span class="num-1">
						<i class="icomoon icomoon-angle-right"></i>
					</span>
					<span  class="num-2">
						<span class="second_font text-label"><?php esc_html_e('Next Post', 'solume'); ?></span>
						<span class="second_font title" ><?php echo esc_html(get_the_title($next_post->ID)); ?></span>
					</span>
				</a>
				<?php
			}
			?>
		</div>
		
</article>


