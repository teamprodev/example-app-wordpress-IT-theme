<?php
    if ( has_post_thumbnail()  && ! post_password_required() || has_post_format( 'image') )  :
      the_post_thumbnail( 'solume_thumbnail' , array('class'=> 'img-responsive' ));
    endif;
?>
