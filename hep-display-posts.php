<?php 
/**
 * Plugin Name:     HEP Display Posts
 * Description:     This plugin is used to display posts. Posts can be displayed on the websites using both widgets and shortcodes. There are also different options to customize the display. 
 * Version:         1.0.0
 * Author:          Hasan Masroor Khan  
 * License:         GPLv2 or later
 * License URI:     https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain:     hep-display-posts
 */



/**
 * ==============================================
 * Register the widget
 * ==============================================
 */
function hep_register_display_posts_widget() {
    register_widget( 'HEP_Display_Posts_Widget' );
}
add_action( 'widgets_init', 'hep_register_display_posts_widget' );



/**
 * ==============================================
 * Widget class
 * ==============================================
 */
class HEP_Display_Posts_Widget extends WP_Widget {
    /**
     * ==============================================
     * Constructor
     * ==============================================
     */
    public function __construct() {
        parent::__construct(
            'hep_display_posts_widget', 
            __('HEP Display Posts', 'hep-display-posts'),
            array(
                'description' => esc_html__( 'Display posts in your website.', 'hep-display-posts' )
            )
        );
    }



    /**
     * ==============================================
     * Display widget on admin sidebar 
     * ==============================================
     */
    public function form( $instance ) {
        // Extract all instance items to variables
        extract( $instance );
?>

        <div class="hep-widget-content">
            <div>
                <div class="hep-widget-section-title">
                    <span class="dashicons dashicons-arrow-down"></span>
                    <span><?php echo esc_html__( 'Basic Settings', 'hep-display-posts' ); ?></span>
                </div>
                <div class="hep-widget-form-content">
                    
                    <!-- Enter widget title -->
                    <div class="hep-option">
                        <label for="<?php echo esc_attr( $this->get_field_id( 'hep_widget_title' ) ); ?>">
                            <?php echo esc_html__( 'Widget Title:', 'hep-display-posts' ); ?>
                        </label>
                        <input 
                            class="widefat" 
                            id="<?php echo esc_attr( $this->get_field_id( 'hep_widget_title' ) ); ?>" 
                            name="<?php echo esc_attr( $this->get_field_name( 'hep_widget_title' ) ); ?>" 
                            type="text" 
                            value="<?php echo esc_attr( $hep_widget_title ); ?>"
                        >
                    </div>

                    <!-- Enter number of posts to be displayed on widget -->
                    <div class="hep-option">
                        <label for="<?php echo esc_attr( $this->get_field_id( 'hep_no_of_posts' ) ); ?>">
                            <?php echo esc_html__( 'Number of Posts:', 'hep-display-posts' ); ?>
                        </label>
                        <input 
                            class="widefat" 
                            id="<?php echo esc_attr( $this->get_field_id( 'hep_no_of_posts' ) ); ?>" 
                            name="<?php echo esc_attr( $this->get_field_name( 'hep_no_of_posts' ) ); ?>" 
                            type="text" 
                            value="<?php echo esc_attr( $hep_no_of_posts ); ?>"
                        >
                    </div>

                    <!-- Select text alignment -->
                    <div class="hep-option">
                        <label for="<?php echo esc_attr( $this->get_field_id( 'hep_text_align' ) ); ?>">
                            <?php echo esc_html__( 'Text Alignment:', 'hep-display-posts' ); ?>
                        </label>
                        <select name="<?php echo esc_attr( $this->get_field_name('hep_text_align') ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('hep_text_align') ); ?>"> 
                            <option value="ltr" <?php if($hep_text_align != 'rtl') echo esc_html( 'selected' ); ?>>
                                <?php echo esc_html__( 'Left to Right', 'hep-display-posts' ); ?>
                            </option> 
                            <option value="rtl" <?php if($hep_text_align == 'rtl') echo esc_html( 'selected' ); ?>>
                                <?php echo esc_html__( 'Right to Left', 'hep-display-posts' ); ?>
                            </option> 
                        </select>
                    </div>

                    <!-- Select post sorting order -->
                    <div class="hep-option">
                        <label for="<?php echo esc_attr( $this->get_field_id( 'hep_post_sorting_order' ) ); ?>">
                            <?php echo esc_html__( 'Order Posts:', 'hep-display-posts' ); ?>
                        </label>
                        <select name="<?php echo esc_attr( $this->get_field_name('hep_post_sorting_order') ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('hep_post_sorting_order') ); ?>"> 
                            <option value="desc" <?php if($hep_post_sorting_order != 'asc') echo esc_html( 'selected' ); ?>>
                                <?php echo esc_html__( 'Descending', 'hep-display-posts' ); ?>
                            </option> 
                            <option value="asc" <?php if($hep_post_sorting_order == 'asc') echo esc_html( 'selected' ); ?>>
                                <?php echo esc_html__( 'Ascending', 'hep-display-posts' ); ?>
                            </option> 
                        </select>
                    </div>

                    <!-- Select post sorting order by -->
                    <div class="hep-option">
                        <label for="<?php echo esc_attr( $this->get_field_id( 'hep_post_sorting_order_by' ) ); ?>">
                            <?php echo esc_html__( 'Order Posts By:', 'hep-display-posts' ); ?>
                        </label>
                        <select name="<?php echo esc_attr( $this->get_field_name('hep_post_sorting_order_by') ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id('hep_post_sorting_order_by') ); ?>"> 
                            <option value="date" <?php if($hep_post_sorting_order_by == 'date') echo esc_html( 'selected' ); ?>>
                                <?php echo esc_html__( 'Date', 'hep-display-posts' ); ?>
                            </option> 
                            <option value="title" <?php if($hep_post_sorting_order_by == 'title') echo esc_html( 'selected' ); ?>>
                                <?php echo esc_html__( 'Title', 'hep-display-posts' ); ?>
                            </option> 
                            <option value="rand" <?php if($hep_post_sorting_order_by == 'rand') echo esc_html( 'selected' ); ?>>
                                <?php echo esc_html__( 'Random', 'hep-display-posts' ); ?>
                            </option> 
                        </select>
                    </div>
                </div>  
            </div>
            <div>
                <div class="hep-widget-section-title">
                    <span class="dashicons dashicons-arrow-down"></span>
                    <span><?php echo esc_html__('Post Settings', 'hep-display-posts'); ?></span>
                </div>
                <div class="hep-widget-form-content">

                    <!-- Enter post category slug (s) -->
                    <div class="hep-option">
                        <label for="<?php echo esc_attr( $this->get_field_id( 'hep_settings_post_category' ) ); ?>">
                            <?php echo esc_html__( 'Show By Category:' , 'hep-display-posts' ); ?>
                        </label>
                        <input  
                            type="text"
                            class="widefat"
                            id="<?php echo esc_attr( $this->get_field_id( 'hep_settings_post_category' ) ); ?>"
                            name="<?php echo esc_attr( $this->get_field_name( 'hep_settings_post_category' ) ); ?>"
                            value="<?php echo esc_attr( $hep_settings_post_category ); ?>"
                        >
                        <small>
                            <?php echo esc_html__( '* Multiple category slugs could be entered, separated by commas', 'hep-display-posts' );  ?> 
                        </small>
                    </div>

                    <!-- Enter post tag slug (s) -->
                    <div class="hep-option">
                        <label for="<?php echo esc_attr( $this->get_field_id( 'hep_settings_post_tag' ) ); ?>">
                            <?php echo esc_html__( 'Show By Tag:', 'hep-display-posts' ); ?>
                        </label>
                        <input 
                            type="text"
                            class="widefat"
                            id="<?php echo esc_attr( $this->get_field_id( 'hep_settings_post_tag' ) ); ?>"
                            name="<?php echo esc_attr( $this->get_field_name( 'hep_settings_post_tag' ) ); ?>"
                            value="<?php echo esc_attr( $hep_settings_post_tag ); ?>"
                        >
                        <small>
                            <?php echo esc_html__( '* Multiple tag slugs could be entered, separated by commas', 'hep-display-posts' );  ?> 
                        </small>
                    </div>

                    <!-- Enter post author -->
                    <div class="hep-option">
                        <label for="<?php echo esc_attr( $this->get_field_id( 'hep_settings_post_author' ) ); ?>">
                            <?php echo esc_html__( 'Show By Author:', 'hep-display-posts' ); ?>
                        </label>
                        <input 
                            type="text"
                            class="widefat"
                            id="<?php echo esc_attr( $this->get_field_id( 'hep_settings_post_author' ) ); ?>"
                            name="<?php echo esc_attr( $this->get_field_name( 'hep_settings_post_author' ) ); ?>"
                            value="<?php echo esc_attr( $hep_settings_post_author ); ?>"
                        >
                    </div>   

                    <!-- Hide post thumbnail -->
                    <div class="hep-option">
                        <label for="<?php echo esc_attr( $this->get_field_id( 'hep_hide_thumbnail' ) ); ?>" class="inline">
                            <?php echo esc_html__( 'Hide Thumbnail:', 'hep-display-posts' ); ?>
                        </label>
                        <input
                            type="checkbox"
                            value="on" 
                            id="<?php echo esc_attr( $this->get_field_id( 'hep_hide_thumbnail' ) ); ?>"
                            name="<?php echo esc_attr( $this->get_field_name( 'hep_hide_thumbnail' ) ); ?>"
                            <?php if( $hep_hide_thumbnail == "on" ) echo esc_html( 'checked="checked"' ); ?>
                        />
                    </div>  

                    <!-- Hide post date -->
                    <div class="hep-option">
                        <label for="<?php echo esc_attr( $this->get_field_id( 'hep_hide_date' ) ); ?>" class="inline">
                            <?php echo esc_html__( 'Hide Date:', 'hep-display-posts' ); ?>
                        </label>
                        <input
                            type="checkbox"
                            id="<?php echo esc_attr( $this->get_field_id( 'hep_hide_date' ) ); ?>"
                            name="<?php echo esc_attr( $this->get_field_name( 'hep_hide_date' ) ); ?>"
                            value="on" 
                            <?php if( $hep_hide_date == "on" ) echo esc_html( 'checked="checked"' ); ?>
                        />
                    </div>

                    <!-- Enter word limit for title -->
                    <div class="hep-option">
                        <label for="<?php echo esc_attr( $this->get_field_id( 'hep_title_word_limit' ) ); ?>">
                            <?php echo esc_html__( 'Word Limit for Title:', 'hep-display-posts' ); ?>
                        </label>
                        <input 
                            type="text" 
                            class="widefat" 
                            id="<?php echo esc_attr( $this->get_field_id( 'hep_title_word_limit' ) ); ?>" 
                            name="<?php echo esc_attr( $this->get_field_name( 'hep_title_word_limit' ) ); ?>" 
                            value="<?php echo esc_attr( $hep_title_word_limit ); ?>"
                        >
                        <small>
                            <?php echo esc_html__( '* Please enter 0 for no limitations', 'hep-display-posts' );  ?> 
                        </small>
                    </div>

                    <!-- Enter message to show if no posts found -->
                    <div class="hep-option">
                        <label for="<?php echo esc_attr( $this->get_field_id( 'hep_no_posts_message' ) ); ?>">
                            <?php echo esc_html__( 'Message for No Posts', 'hep-display-posts' ); ?>
                        </label>
                        <input 
                            class="widefat" 
                            type="text" 
                            id="<?php echo esc_attr( $this->get_field_id( 'hep_no_posts_message' ) ); ?>" 
                            name="<?php echo esc_attr( $this->get_field_name( 'hep_no_posts_message' ) ); ?>" 
                            value="<?php echo esc_attr( $hep_no_posts_message ); ?>"
                        >
                        <small>
                            <?php echo esc_html__( '* Example: No posts found!', 'hep-display-posts' );  ?> 
                        </small>
                    </div>
                </div>
            </div>
        </div>
<?php
    }



    /**
     * ==============================================
     * Save widget data into database
     * ==============================================
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        
        // Basic settings
        $instance['hep_widget_title']                   = !empty($new_instance['hep_widget_title']) ? sanitize_text_field($new_instance['hep_widget_title']) : '';
        $instance['hep_no_of_posts']                    = !empty($new_instance['hep_no_of_posts']) ? sanitize_text_field($new_instance['hep_no_of_posts']) : 5;
        $instance['hep_text_align']                     = !empty($new_instance['hep_text_align']) ? sanitize_text_field( $new_instance['hep_text_align'] ) : 'ltr';
        $instance['hep_post_sorting_order']             = !empty($new_instance['hep_post_sorting_order']) ? sanitize_text_field( $new_instance['hep_post_sorting_order'] ) : 'desc'; 
        $instance['hep_post_sorting_order_by']          = !empty($new_instance['hep_post_sorting_order_by']) ? sanitize_text_field( $new_instance['hep_post_sorting_order_by'] ) : 'date'; 
        
        // Post settings
        $instance['hep_settings_post_category']         = !empty($new_instance['hep_settings_post_category']) ? sanitize_text_field( $new_instance['hep_settings_post_category'] ) : '';
        $instance['hep_settings_post_author']           = !empty($new_instance['hep_settings_post_author']) ? sanitize_text_field( $new_instance['hep_settings_post_author'] ) : '';
        $instance['hep_settings_post_tag']              = !empty($new_instance['hep_settings_post_tag']) ? sanitize_text_field( $new_instance['hep_settings_post_tag'] ) : '';        
        $instance['hep_hide_thumbnail']                 = !empty($new_instance['hep_hide_thumbnail']) ? sanitize_text_field( $new_instance['hep_hide_thumbnail'] ) : '';
        $instance['hep_hide_date']                      = !empty($new_instance['hep_hide_date']) ? sanitize_text_field( $new_instance['hep_hide_date'] ) : '';
        $instance['hep_title_word_limit']               = !empty($new_instance['hep_title_word_limit']) ? sanitize_text_field( $new_instance['hep_title_word_limit'] ) : 0;
        $instance['hep_no_posts_message']               = !empty($new_instance['hep_no_posts_message']) ? sanitize_text_field( $new_instance['hep_no_posts_message'] ) : esc_html__( 'No posts found!', 'hep-display-posts' );

        return $instance;
    }



    /**
     * ==============================================
     * Display widget on front end
     * ==============================================
     */
    public function widget( $args, $instance ) {

        // The opening wrapper
        echo $args['before_widget'];

        // Title of the widget
        if( !empty( $instance['hep_widget_title'] ) ) :
            echo $args['before_title'] . esc_html( apply_filters( 'widget_title', $instance['hep_widget_title'] ) ) . $args['after_title'];            
            $instance['hep_widget_title'] = null;
        endif;

        // Display the layout on website
        hep_display_posts( $instance );
            
        // The closing wrapper
        echo $args['after_widget'];
    }
}



/**
 * ==============================================
 * Recieve values from shortcode
 * ==============================================
 */
function hep_display_posts_by_shortcode( $atts ) {

    $instance = shortcode_atts( array(
        'hep_no_of_posts'           => 5,
        'hep_text_align'            => 'ltr',
        'hep_post_sorting_order'    => 'desc',
        'hep_post_sorting_order_by' => 'date',
        'hep_settings_post_category'=> '',
        'hep_settings_post_author'  => '',
        'hep_settings_post_tag'     => '',
        'hep_hide_thumbnail'        => '',
        'hep_hide_date'             => '',
        'hep_title_word_limit'      => 0,
        'hep_no_posts_message'      => 'No posts found!',
	), $atts );

    ob_start();
    // Display posts on the template
    hep_display_posts( $instance );
    // Store buffered output content
    $hep_shortcode_content = ob_get_clean(); 
    // Return the content
    return $hep_shortcode_content; 
}
add_shortcode( 'hep_display_posts', 'hep_display_posts_by_shortcode' );



/**
 * ==============================================
 * Display the layout of posts on front end
 * ==============================================
 */
function hep_display_posts( $widget_values ) {

    // Extract the values to the variables
    extract( $widget_values );

    // Get the posts
    $hep_posts = get_posts( array(
        'numberposts'   => $hep_no_of_posts,
        'order'         => $hep_post_sorting_order,
        'orderby'       => $hep_post_sorting_order_by,
        'category_name' => $hep_settings_post_category,
        'author_name'   => $hep_settings_post_author,
        'tag'           => $hep_settings_post_tag
    ));

    // If posts are found
    if( !empty( $hep_posts ) ) :

        $hep_assets_url = plugins_url( 'assets', __FILE__ );   
        // Include template markup
        include( plugin_dir_path( __FILE__ ) . 'templates/style1/style1.php' );
        // Include template style
        hep_add_template_styles_and_scripts(); 

    else: 
        // Show message if posts are not found
        echo esc_html( $hep_no_posts_message );
    endif;
}



/**
 * ==============================================
 * Plugin styles and scripts 
 * ==============================================
 */
function hep_add_plugin_styles_and_scripts() {
    wp_enqueue_style( 'hep-display-post', esc_url( plugins_url( 'assets/css/hep_display_posts.css', __FILE__ ) ), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'hep_add_plugin_styles_and_scripts' );



/**
 * ==============================================
 * Template styles and scripts
 * ==============================================
 */
function hep_add_template_styles_and_scripts( ) {
    wp_enqueue_style( 'hep-post-style1', esc_url( plugins_url( 'templates/style1/style1.css', __FILE__ ) ), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'hep_add_template_styles_and_scripts' );



/**
 * ==============================================
 * Admin widget styles and scripts
 * ==============================================
 */
function hep_admin_widget_styles_and_scripts() {
    wp_enqueue_style( 'hep-admin-widget-style', esc_url( plugins_url( 'assets/css/hep_admin_widget_style.css', __FILE__ ) ), array(), '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'hep_admin_widget_styles_and_scripts' );



/**
 * ==============================================
 * Get limited words for any text
 * ==============================================
 */
function hep_get_limited_words( $text, $limit = 0 ) {
    $text = wp_strip_all_tags( $text ); 

    if( $limit ) :
        $words = explode( " ", $text );
        $new_text = "";

        if (count($words) > $limit) :
            for ($i = 0; $i < $limit; $i++) :
                $new_text = $new_text . $words[$i] . " ";
            endfor;
            return $new_text;
        endif;
    endif;

    return $text;
}