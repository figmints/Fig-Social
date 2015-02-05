<?php

class FigFacebook_Widget extends WP_Widget {
	
	function __construct() {
		$widget_ops = array( 'classname' => 'fig-facebook-widget', 'description' => __('Facebook feed widget') );
		$control_ops = array( 'width' => 'auto', 'height' => 'auto' );
		parent::__construct( 'figfacebook', __('Facebook Feed'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {

		echo $args['before_widget'];
		if ( $instance['title'] ) {
			echo $args['before_title'] . $instance['title'] . $args['after_title'];
		}

		$template = $instance['template'];
		$posts = get_transient( 'figsocial_facebook' );
		$limit = $instance['limit'];
		$i = 1;

		if ( $posts ) {

			do_action( 'figface_before' );

			foreach ( $posts as $post ) {

				if ( $i <= $limit ) {

					$date = new Datetime($post->date);
					$contentFunc = new \FigSocial\Inc\FigSocialGeneral(); //instantiate general functions for our use
					$content = $contentFunc->createPost($post);

					if ( $template == 'default' ) {
						include dirname(dirname(__FILE__)) . '/views/facebook.php';
					} elseif ( file_exists( get_stylesheet_directory() . '/overrides/facebook/' . $template) ) {
						include ( get_stylesheet_directory() . '/overrides/facebook/' . $template );
					} else {
						include dirname(dirname(__FILE__)) . '/views/facebook.php';
					}

					$i++;
				}

			}

			do_action( 'figface_after' );

		}

		
		
		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {

		$instance['title'] = strip_tags( stripslashes($new_instance['title']) );
		$instance['limit'] = (int) $new_instance['limit'];
		$instance['template'] = $new_instance['template'];
		return $instance;

	}

	function form( $instance ) {

		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$limit = isset( $instance['limit'] ) ? absint( $instance['limit'] ) : 2;
		$template = isset( $instance['template'] ) ? $instance['template'] : 'default';
		?>

		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

    <p><label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php _e( 'Limit: '); ?></label>
    <input id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="text" value="<?php echo $limit; ?>" size="3"></p>

    <?php 
    $dir = get_stylesheet_directory().'/overrides/facebook/';

    if ( is_dir($dir) ) {
    	if ( $dh = opendir($dir) ) {
    		while (($file = readdir($dh)) !== false) {
    			if ($file != '.' && $file != '..') {
    				$files[] = $file;
    			}
    		}
    		closedir($dh);
    	}	
    }


    if ( !empty($files) ) : ?>

    <p><label for="<?php echo $this->get_field_id( 'template' ); ?>"><?php _e( 'Template Override: '); ?></label>
    <select id="<?php echo $this->get_field_id( 'template' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'template' ); ?>">
    	<option value="default" <?php selected( $template, 'default' ); ?>>Default</option>
    	<?php foreach ( $files as $file ) {
    		echo '<option value="' . $file . '"' . selected( $template, $file, false ) . '>' . $file . '</option>';
    	} 
    	?>
    </select></p>
  	<?php endif; 
	}

}

add_action( 'widgets_init', create_function( '', 'register_widget( "FigFacebook_Widget" );' ) );

?>