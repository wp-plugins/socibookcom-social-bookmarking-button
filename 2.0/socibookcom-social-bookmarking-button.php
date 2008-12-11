<?php
/*
Plugin Name: SociBook.com Social Bookmarking Button
Version: 0.1
Plugin URI: http://socibook.com/button.php
Description: A Social Bookmarking button from SociBook. With the button you can add your Blog or Website content to the biggest Social Bookmarking sites (SociBook.com, Digg.com, Yahoo Buzz, Google, Delisious.com and Facebook). The button is a great way of getting traffic from the Social Bookmarking networks.
Author: Biser Markov
Author URI: http://socibook.com/
*/

function add_me($content) {

    global $post;
	
	// DIV-width
	$my_width = '100%';
	
	// Choose button align
	$my_align = 'left';
	
	// Location of the folder with the icons of the buttons
	$my_images_folder = get_settings('home') . '/wp-content/plugins/socibookcom-social-bookmarking-button/images/';
	
	// We take the post details in the following variables
	$my_link = get_permalink($post->ID);	
    $my_title = get_the_title($post->ID);

	if ( !is_feed() && !is_page() ) {
		$content .= "\n\n" . '<!-- Begin SociBook.com social bookmarks plugin -->' . "\n"
                  . '<!-- http://socibook.com/button.php -->' . "\n"
                  . '<div style="padding:16px 0 16px 0;text-align:' . $my_align . ';width:' . $my_width . ';">' . "\n"
				  
                  . '<p>
<a href="http://www.socibook.com" name="a2a_dd" onmouseout="a2a_onMouseOut_delay()" onmouseover="a2a_show_dropdown(this)">
<img alt="Share with SociBook.com" border="0" src="http://www.socibook.com/bookmark.png" title="Bookmark" width="125" height="16"></a>
<script type="text/javascript"> a2a_linkname=parent.document.title; a2a_linkurl=parent.location.href;
</script>
<script src="http://www.socibook.com/js.dropdowntwo.js?type=page" type="text/javascript">
</script>
</p>' . "\n"
                  . '</div>' . "\n"
				  . '<!-- End SociBook.com social bookmarks plugin -->' . "\n\n";				  
    }				  
	return $content;
}

add_filter('the_content', 'add_me', 1097);

?>