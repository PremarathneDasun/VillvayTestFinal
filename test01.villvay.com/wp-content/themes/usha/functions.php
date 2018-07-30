<?php
/**
* Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which
* runs before the init hook. The init hook is too late for some features, such
* as indicating support for post thumbnails.
*/
function usha_setup() {

  global $content_width;
	/* Set the $content_width for things such as video embeds. */
	if ( !isset( $content_width ) )
	$content_width = 625;
	
/*
 * Woocommerce support.
 */	
add_theme_support( 'woocommerce' );

/*
 * Title support.
 */	
add_theme_support( "title-tag" );

    
/*
* Make theme available for translation.
* Translations can be filed in the /languages/ directory.
* If you're building a theme based on this theme, use a find and replace
* to change 'usha' to the name of your theme in all the template files
*/
load_theme_textdomain( 'usha', get_template_directory() . '/languages' );

// Add default posts and comments RSS feed links to head.
add_theme_support( 'automatic-feed-links' );

/*
* Enable support for Post Thumbnails on posts and pages.
*
* @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
*/
add_theme_support( 'post-thumbnails' );

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'usha' ),
) );

// Enable support for Post Formats.
add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
	
// Allows theme developers to link a custom stylesheet file to the TinyMCE visual editor.
    add_editor_style( 'custom-editor-style.css' );
	
// Setup the WordPress core custom background feature.
add_theme_support( 'custom-background', apply_filters( 'usha_custom_background_args', array(
	'default-color' => 'ffffff',
	'default-image' => '',
) ) );

// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
}

add_action( 'after_setup_theme', 'usha_setup' );
	
/**
 * Register widgetized area and update sidebar with default widgets.
 */
function usha_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'usha' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
		
// Area footer 1, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'usha' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'usha' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
// Area footer 2, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'usha' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'usha' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
// Area footer 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'usha' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'usha' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
// Area footer 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'usha' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'usha' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'usha_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function usha_scripts() {
	wp_enqueue_style( 'usha-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'usha_skeleton', get_template_directory_uri().'/css/skeleton.css' );
	
	wp_enqueue_style( 'usha_layout', get_template_directory_uri().'/css/layout.css' );

	wp_enqueue_script( 'usha-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'usha-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'usha_scripts' );

function usha_wp_head(){
	?>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js" type="text/javascript"></script>
	<![endif]-->
	<?php
}

add_action("wp_enqueue_scripts", "usha_jquery_enqueue", 11);
function usha_jquery_enqueue() {
   wp_enqueue_script('jquery');
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/*
 * Breadcrumb
 */ 
function usha_Breadcrumb() {
    echo '<div class="ushabreadcrumb">';
    if (!is_front_page()) {
        echo '<a href="'. esc_url(home_url('/')) .'">';
        echo 'Home';
        echo "</a> &#187; ";
        if (is_category() || is_single()) {
            the_category(' &#187; ');
            if (is_single()) {
                echo " &#187; ";
                the_title();
            }
        } elseif (is_page()) {
            echo the_title();
        }
    }
        echo '</div>';
}


/*
 * Custom xcerpt.
 */

// Changing excerpt length
function usha_new_excerpt_length($length) {
return 100;
}
add_filter('excerpt_length', 'usha_new_excerpt_length');

// Replaces the excerpt "more" text by a link
function usha_new_excerpt_more($more) {
       global $post;
	return '...<br><a class="moretag" href="'. get_permalink($post->ID) . '">'. __('Read more &#8594;' ,'usha') . '</a>';
}
add_filter('excerpt_more', 'usha_new_excerpt_more');


function usha_wrapper_start() {
  echo '<section id="main" class="twelve columns">';
}

function usha_wrapper_end() {
  echo '</section>';
}

//menu item for feedback
function mt_add_pages() {
	add_menu_page(_('Menu Title'), _('Feedbacks'), 'manage_options', 'mt-top-level-handle', 'mt_toplevel_page', 'dashicons-feedback');
}

//get feedback details
function mt_toplevel_page() {
	 echo "<h2>Feedback Details</h2>";
	?>
	<?php
	require_once('/var/www/html/test01.villvay.com/wp-config.php');
global $wpdb;
$results = $wpdb->get_results( "SELECT * FROM wp_feedback"); // Query to fetch data from database table and storing in $results
if(!empty($results))                        // Checking if $results have some values or not
{    
    echo "<table border='1'  style='border-collapse:collapse;'>"; // Adding <table> and <tbody> tag outside foreach loop so that it wont create again and again
    echo "<tr>";
	echo "<td width='20' align='center'><strong>#</strong></td>";
	echo "<td width='200' align='center'><strong>Name</strong></td>";
	echo "<td width='200' align='center'><strong>Email Address</strong></td>";
	echo "<td width='300' align='center'><strong>Message</strong></td>";
	echo "<td width='200' align='center'><strong>Date</strong></td>";
   
	echo "</tr>";     
	
    foreach($results as $row){   
	echo "<tr>";
    echo "<td align='center'>". $row->id. "</td>";
    echo "<td>" .$row->name. "</td>";
    echo "<td>" .$row->email. "</td>";
    echo "<td>" .$row->message. "</td>";
    echo "<td>" .$row->date. "</td>";
    echo "</tr>";
    }
    echo "</table>"; 
	}
?>
<?php
}

//Save Feedback
function save_feedback() {
    global $wpdb;
    $table = $wpdb->prefix . "feedback"; 
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE IF NOT EXISTS $table (
        `id` mediumint(9) NOT NULL AUTO_INCREMENT,
        `name` text NOT NULL,
		 `email` text NOT NULL,
		  `message` text NOT NULL,
		   `date` datetime  DEFAULT CURRENT_TIMESTAMP,
    UNIQUE (`id`)
    ) $charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
    ob_start();
    ?>
    <form action="#f_form" method="post" id="f_form">
        <label for="fname"><h3>Name</h3></label>
        <input type="text" name="fname" id="fname" style="background-color: #fff;" required />
		<label for="email"><h3>Email Address</h3></label>
        <input type="email" name="email" id="email" style="background-color: #fff;" required />
		<label for="message"><h3>Message</h3></label>
		 <textarea rows = "6" cols = "60" name = "message" id="message" style="background-color: #fff;" required></textarea>
		 <br>
		 <br>
        <input type="submit" name="submit_form" value="submit" style="background-color: #4CAF50;" />
    </form>
    <?php
    $html = ob_get_clean();
    if ( isset( $_POST["submit_form"] ) && $_POST["fname"] != "" ) {
        $table = $wpdb->prefix."feedback";
        $name = strip_tags($_POST["fname"], "");
		$email = strip_tags($_POST["email"], "");
		$message = strip_tags($_POST["message"], "");
        $wpdb->insert( 
            $table, 
            array( 
                'name' => $name,
				'email' => $email,
				'message' => $message
            )
        );
        $html = "<p>Your feedback was successfully recorded. Thank You!!</p><br><br><br><br><br><br><br><br><br><br><br><br>";
    }
    return $html;
}


/*
 * Woocommerce action support.
 */

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'usha_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'usha_wrapper_end', 10);
//feedback
add_action('admin_menu' , 'mt_add_pages');
add_shortcode('insert-feedback', 'save_feedback');

    
 
