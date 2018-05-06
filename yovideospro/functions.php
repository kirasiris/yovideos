<?php
 // Register Nav Walker Class
 require_once('wp-bootstrap-navwalker.php');
 
function wpb_theme_setup(){
// Register menus
	register_nav_menus(array(
      'primary' => __('Menu Principal','yovideospro'),
	  'secondary' => __('Menu Secundario','yovideospro'),
	  'tertiary' => __('Menu Terciario','yovideospro'),
    ));
	
// File support
		add_theme_support('custom-logo');
		add_theme_support('post-thumbnails');
		add_image_size('recientes', 509, 339);
		add_image_size('sidebar-recientes', 165, 84);
		add_image_size('blog', 244, 363);
		add_image_size('single-page', 1526, 858);
		add_image_size('search', 247, 139);
		add_image_size('second&third&fourth', 393, 213);
	}
	add_action('after_setup_theme','wpb_theme_setup');
	
// Excerpth length
	function set_excerpt_length(){
		return 20;
		}
	add_filter('excerpt_length' , 'set_excerpt_length');
// Function for search input. The input will look for keyworks only on posts
function search_filter( $query ) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ( $query->is_search ) {
      $query->set( 'post_type', array( 'post' ) );
    }
  }
}
add_action( 'pre_get_posts','search_filter' );
// Iframe
function iframe($postID){
	$iframe = 'Iframe';
	$iframe_player = get_post_meta($postID, $iframe, true);
	if($iframe_player==''){
		delete_post_meta($postID,$iframe);
		add_post_meta($postID,$iframe, '#');
		return "#";
		}
	return $iframe_player;
	}
// Login Page
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Mag Press';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
// Function to remove the welcome dashboard panel
remove_action('welcome_panel', 'wp_welcome_panel');
// Sidebar and Widgets Position
	function wpb_init_widgets($id){
		
		register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'before_widget' => '<div class="single-right-grids" id="sidebar">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		));
		
}
		
	add_action('widgets_init', 'wpb_init_widgets');
?>
<?php
// function to display number of posts.
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 Views";
    }
    return $count.' Views';
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
	if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}
?>
<?php //this function will be called in the next section
function advanced_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
<div class="media">
<h5><?php printf(__('%s'), get_comment_author()) ?></h5>
<!--<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">-->
	<div class="media-left">
        <div class="media img-circle">
			<?php echo get_avatar($comment,$size='65' ); ?>
     </div>
     </div>

     <?php if ($comment->comment_approved == '0') : ?>
       <em><?php _e('Your comment is awaiting moderation.') ?></em>
       <br />
     <?php endif; ?>
 
     <div class="media-body">	
         <?php comment_text() ?>
         <small><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?></small>
     </div>
 
   <div class="reply">
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
   </div>
   <div class="clear"></div>
<!--</li>-->
</div>
<?php } ?>
<?php
// Delete comments directly from the current page and not from the Wordpress dashboard
 function delete_comment_link($id) {
  if (current_user_can('edit_post')) {
    echo '<a href="'.admin_url("comment.php?action=cdc&c=$id").'">Delete/Borrar</a> ';
    echo '<a href="'.admin_url("comment.php?action=cdc&dt=spam&c=$id").'">Spam</a>';
  }
}
?>
<?php
//// Extra protection layer against spam
 function check_referrer() {
    if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == “”) {
        wp_die( __('Please enable referrers in your browser, or, if you\'re a spammer, get out of here!') );
    }
}
 
add_action('check_comment_flood', 'check_referrer');
 ?>
 <?php 
/// If you delete this, the sky will fall over you, and you will die.
function remove_footer_admin () {
echo 'Powered by <a href="http://www.wordpress.org" target="_blank" rel="noopener">WordPress</a> | Design by: <a href="https://blogpersonal.net/" target="_blank" rel="noopener">Kevin Fonseca</a></p>';
}
add_filter('admin_footer_text', 'remove_footer_admin');
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
 
wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'custom_dashboard_help');
}
 
function custom_dashboard_help() {
echo '<p>Welcome to '.wp_get_theme().' Custom Theme! Need help?</p>
<p>Contact the developer <a href="mailto:kebin1421@hotmail.com">here</a>.</p><p> For Theme Installation Instructions visit: <a href="https://blogpersonal.net/portfolio/" target="_blank">Kevin Fonseca Portfolio</a><br> and accessto the instructions by accessing into your theme name</p>';
}
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
?>