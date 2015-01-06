<?php
namespace FigTwit;

class Controller {
	
	static $i = null;

	public static function i() {
		if ( is_null( self::$i ) ) {
			self::$i = new Controller;
		}
		return self::$i;
	}

	public function add_actions() {
		add_action( 'init', function() {
			$transient_valid = get_transient( 'figtwit_tweets' );

			if ( !$transient_valid ) {
				$tweets = new \FigTwit\Inc\FigTwit_Get();
				set_transient( 'figtwit_tweets', $tweets->save(), 900 ); //15 minutes
			}
		});

		add_action( 'figtwit_before', function() {
			echo '<ul>';
		});

		add_action( 'figtwit_after', function() {
			echo '</ul>';
		});

	}
}