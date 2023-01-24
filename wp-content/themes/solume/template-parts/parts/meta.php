 <?php if( !is_search() ){ 

 	if( is_single() ){
 		$show_date = solume_post_show_date() == 'yes' ? true: false;
	 	$show_cat  = solume_post_show_cat() == 'yes' ? true: false;
	 	$show_author = solume_post_show_author() == 'yes' ? true: false;
	 	$show_comment = solume_post_show_comment() == 'yes' ? true: false;	
 	}else{
 		$show_date = solume_blog_show_date() == 'yes' ? true: false;
	 	$show_cat  = solume_blog_show_cat() == 'yes' ? true: false;
	 	$show_author = solume_blog_show_author() == 'yes' ? true: false;
	 	$show_comment = solume_blog_show_comment() == 'yes' ? true: false;	
 	}
 	

 	?>

 	<?php if( $show_date || $show_cat || $show_author || $show_comment ){ ?>
 		<ul class="post-meta">
 	<?php } ?>
 		
 		<?php if( $show_date ){ ?>
	 		<li class="date">
	 			<i class="ovaicon-calendar-1"></i>
			    <?php the_time( get_option( 'date_format' ));?>
	 		</li>
 		<?php } ?>

 		<?php if( $show_cat ){ ?>
	 		<li class="category">
	 			<i class="ovaicon-folder-1"></i>
	 			<?php 
	 				$categories = get_the_category();
	 				if ( !empty( $categories ) && is_array( $categories ) ) {
	 					printf( '<a href="%s">%s</a>', esc_url( get_category_link( $categories[0]->term_id ) ), esc_html( $categories[0]->name ) );
	 				}
	 			?>
	 		</li>
 		<?php } ?>

 		<?php if( $show_author ){ ?>
	 		<li class="author">
	 			<i class="ovaicon-user-1"></i>
	 			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
	 				<?php the_author_meta( 'display_name' ); ?>
	 			</a>
	 		</li>
 		<?php } ?>
 		
 		<?php if( $show_comment ){ ?>
	 		<li class="comment">
	 			<i class="ovaicon-chat-comment-oval-speech-bubble-with-text-lines"></i>
	            <?php comments_popup_link(
	            	esc_html__(' 0 Comments', 'solume'), 
	            	esc_html__(' 1 Comment', 'solume'), 
	            	' % '.esc_html__('Comments', 'solume'),
	            	'',
	          		esc_html__( 'Comment off', 'solume' )
	            ); ?>
	 		</li>
 		<?php } ?>

 	<?php if( $show_date || $show_cat || $show_author || $show_comment ){ ?>	
 		</ul>
 	<?php } ?>

	
    
<?php } ?>