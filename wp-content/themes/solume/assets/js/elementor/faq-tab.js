(function($){
	"use strict";
	

	$(window).on('elementor/frontend/init', function () {
		
        elementorFrontend.hooks.addAction('frontend/element_ready/solume_elementor_faq_tab.default', function(){
	       
	        /* Add your code here */

                $( "div.ova-tabs .tab-title .item-title:first-child" ).addClass( "active_title" );
                $( "div.ova-tabs .tab-content .item-content:first" ).addClass( "active_content" );
                $( "div.ova-tabs .tab-content .item-title:first-child" ).addClass( "active_title" );

                $('.item-title').click( function() {

                        var tabID = $(this).attr('data-tab');

                        $('[data-mobile="' +tabID+ '"]').addClass('active_title').siblings().removeClass('active_title').fadeIn();

                        $('#tab-'+tabID).addClass('active_content').siblings().removeClass('active_content').fadeIn();

                        $('[data-desktop="' +tabID+ '"]').addClass('active_title').siblings().removeClass('active_title').fadeIn();

                });

        });

   });

})(jQuery);
