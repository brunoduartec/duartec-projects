<?php
/*
Plugin Name: Comment Email Responder
Plugin URI: http://www.u-g-h.com/index.php/wordpress-plugins/wordpress-plugin-comment-email-responder/
Description: Emails commenter when an admin replies to the comment, if commenter is not subscribed to email updates via Subscribe-to-Comments. Original idea/coding by <a href="http://www.legalandrew.com">Andrew Flusche</a>
Author: Owen Cutajar
Version: 2.3
Author URI: http://www.u-g-h.com
*/

/* 
 * Version History:
 *   v1.0 - Andrew Flusche - Original concept and coding
 *   v2.0 - Owen Cutajar   - Added admin panel and hooks into presentation (so no template changes are needed)
 *   v2.1 - Owen Cutajar   - Corrected dependancy on Subscribe-To-Comments & assumption that WP is root folder
 *   v2.2 - Owen/Andrew    - Correct bug whereby multiple comments confused the plugin
 *   v2.21 - Owen Cutajar  - Bugfix - plugin will now run in any folder the user places it
 *   v2.22 - Owen Cutajar  - Refined header code
 *   v2.3 - Owen Cutajar   - Added post link and footer to email
 */

/*
 * Add helper function to page header
 *  - 21/4/7 - Only need to do this if user is admin
 */
function cer_add_code_header() {

	// Init
	global $userdata;
	get_currentuserinfo();

	if ($userdata->user_level == 10)  {
		$output ='<script>';
		$output .= 'function RespondToComment(commentID)';
		$output .= '{';
		$output .= 'document.getElementById("reply_comment").innerHTML="Replying to: " + commentID;';
		$output .= 'document.getElementById("reply_to").value=commentID;';
		$output .= 'document.getElementById("comment").focus();';
		$output .= '}';
		$output .= '</script>';
		
		echo $output;
   }  
}


/* 
 * Add comment icon following comment author link
 */
function cer_add_comment_icon($link) {
	
	// Init
	global $userdata;
	get_currentuserinfo();
	
	$commentID = get_comment_ID();
	$additionalcode = '';
	
	// Get comment icon code (if user is an admin)
	if ($userdata->user_level == 10) {	
		$additionalcode = '<img src="' . get_option("siteurl") . '/wp-content/plugins/comment-email-responder/comment-email-responder.png" alt="Comment Email Responder" title="Respond to this comment" onclick="javascript:RespondToComment(' . $commentID . ');">';
	}

	// return filter result
	return $link .' '. $additionalcode;
}


/*
 * Display "reply to comment ID" field in comment form.
 */
function cer_add_comment_footer() {

	// Init
	global $userdata;
	get_currentuserinfo();

	// Only display, IF user logged in & is admin.
	if ($userdata->user_level == 10)  {
		echo '<input type="hidden" name="user_ID" value="' . $userdata->ID . '"/></p>';
		echo '<input type="hidden" name="reply_to" id="reply_to" />';
		echo '<label id="reply_comment" id="reply_comment">Reply to Comment: None</label></p>';
	}
}


/*
 * Emails commenter, upon comment post.
 * Andrew Flusche - http://www.legalandrew.com
 */
function cer_respond() {

	global $wpdb;
   $options = get_option('cer_options');
	
   // assign default values (if not set)
   if ( !is_array($options) ) {
      $options = array( 'cer_from_name'=>'','cer_from_email'=>'','cer_subject'=>'','cer_sender_format'=>'on','cer_footer'=>'');
   }

   // retreive options for form
   $cer_from_name = $options['cer_from_name'];
   $cer_from_email = $options['cer_from_email'];
   $cer_subject = $options['cer_subject'];
   $cer_sender_format = $options['cer_sender_format'];
   $cer_footer = $options['cer_footer'];

	// Comment page only includes user_ID if user is level 10.
	// Only send an email, if a comment reply box is filled out.
	if (isset($_POST["user_ID"]) and (!empty($_POST["reply_to"]))) {
	
		// Comment ID
		$comment_id = $_POST["reply_to"];
	
		// Check if commenter is subscribed.
		if (function_exists('sg_subscribe')) {
			$subscribed = $wpdb->get_var("SELECT comment_subscribe FROM $wpdb->comments WHERE comment_ID = '$comment_id'");
		} else {
			$subscribed = "N";
		}
		
		// Only proceed if commenter NOT subscribed.
		if ($subscribed != "Y") {
	
			// Get post and comment data.
			$postData    = get_post($_POST["comment_post_ID"]);
			$commentData = get_comment($comment_id);
		
			// Setup email fields.
			if ($cer_sender_format == 'on') {
			   $headers = "From: '" . $cer_from_name . "' <" . $cer_from_email . ">\r\n";
			} else {
			   $headers = "From: " . $cer_from_email . "\r\n";
			}
			$to      = $commentData->comment_author_email;
			$subject = "[" . $cer_subject . "] Reply to your comment on '" . $postData->post_title . "'";
			$body    = stripslashes($_POST["comment"]) . "\n\nYour comment:\n\n" . stripslashes($commentData->comment_content);
			$body 	.= "\n\nLink: " . get_permalink($postData->ID);
			$body 	.= "\n\n--------------------------------------------\n" . $cer_footer;
			
			// Send the email.
			mail($to, $subject, $body, $headers);
		}
	}
}

/*
 * plugin options page
 */
function cer_options_page() {

   $options = get_option('cer_options');
	
   // assign default values (if not set)
   if ( !is_array($options) ) {
      $options = array( 'cer_from_name'=>'','cer_from_email'=>'','cer_subject'=>'','cer_sender_format'=>'on','cer_footer'=>'');
   }

   // if posted, update options
   if ( $_POST['cer-submit'] ) {
      $options['cer_from_name'] = $_POST['cer_from_name'];
      $options['cer_from_email'] = $_POST['cer_from_email'];
      $options['cer_subject'] = $_POST['cer_subject'];
      $options['cer_sender_format'] = $_POST['cer_sender_format'];
      $options['cer_footer'] = $_POST['cer_footer'];
      update_option('cer_options', $options);
   }

   // retreive options for form
   $cer_from_name = $options['cer_from_name'];
   $cer_from_email = $options['cer_from_email'];
   $cer_subject = $options['cer_subject'];
   $cer_sender_format = $options['cer_sender_format'];
   $cer_footer = $options['cer_footer'];

?>
<div class="wrap"> 
  <h2><?php _e('Comment Email Responder') ?></h2> 
  
  <form name="form1" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

    <table width="100%" cellspacing="2" cellpadding="5" class="editform"> 
      <tr valign="top"> 
        <th scope="row"><?php _e('Sender Name:') ?></th> 
        <td><input name="cer_from_name" type="text" id="cer_from_name" value="<?php echo $cer_from_name; ?>" size="80" />
        <br />
        <?php _e('Enter the name you would like the emails to be sent from') ?></td> 
      </tr> 
      <tr valign="top"> 
        <th scope="row"><?php _e('Sender Email:') ?></th> 
        <td><input name="cer_from_email" type="text" id="cer_from_email" value="<?php echo $cer_from_email; ?>" size="80" />
        <br />
        <?php _e('Enter the email address you would like the emails to be sent from') ?></td> 
      </tr> 
      <tr valign="top"> 
        <th scope="row"><?php _e('Subject:') ?></th> 
        <td><input name="cer_subject" type="text" id="cer_subject" value="<?php echo $cer_subject; ?>" size="80" />
        <br />
        <?php _e('Enter the prefix to be used in the message subject') ?></td> 
      </tr> 
      <tr valign="top"> 
        <th scope="row"><?php _e('Email Footer:') ?></th> 
        <td><textarea Name="cer_footer" rows="4" cols="40"><?php echo $cer_footer; ?></textarea>
        <br />
        <?php _e('Enter a footer to be used in your email') ?></td> 
      </tr> 
      <tr valign="top"> 
        <th scope="row"><?php _e('Alternative Format:') ?></th> 
        <td><input name="cer_sender_format" type="checkbox" id="cer_sender_format" <?php if ($cer_sender_format=='on') echo 'checked'; ?>" />
        <br />
        <?php _e('The standard format for sender is "Name &lt;email&gt;", which works fine most of the time. It can cause some problems in Windows hosting, so if you get an error when emailing a comment untick this box to use an alternative format') ?></td> 
      </tr> 
            
    </table>

	<input type="hidden" id="cer-submit" name="cer-submit" value="1" />

    <p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Update Options') ?> &raquo;" />
    </p>
  </form> 
  <hr>
  If you like this plugin, pop down to <a href="http://www.u-g-h.com/">my blog</a> and leave a comment. You can also head down to <a href="http://www.legalandrew.com">Andrew's blog</a> (the original author) and say hello. You can also <a href="http://www.legalandrew.com/donations/">support him</a> through his studies.
</div>

<?php
}


/*
 * Hook into Wordpress .. I just love that you can do this !
 */
// Admin Panel
function cer_configure_pages() {
	add_options_page('Comment Email Responder', 'Comment Email Responder', 8, __FILE__, 'cer_options_page');
}

// Hook into comment posting.
add_action('comment_post', 'cer_respond', 50);

// Hook into comment display
add_filter('get_comment_author_link', 'cer_add_comment_icon');
add_action('comment_form', 'cer_add_comment_footer');

// Bind Options Page to the admin menu
add_action('admin_menu', 'cer_configure_pages');

// Add Javascript bit to header
add_action('wp_head', 'cer_add_code_header');

?>