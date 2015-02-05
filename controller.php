<?php
namespace FigSocial;

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
			$twitter_transient = get_transient( 'figsocial_twitter' );
			$facebook_transient = get_transient( 'figsocial_facebook' );

			if ( get_field( 'facebook_username', 'options' ) && !$facebook_transient ) {
				$posts = new \FigSocial\service\FigSocialFacebook();
				set_transient( 'figsocial_facebook', $posts->save(), 900 );
			}

			if ( get_field( 'twitter_handle', 'options' ) && !$twitter_transient ) {
				$tweets = new \FigSocial\service\FigSocialTwitter();
				set_transient( 'figsocial_twitter', $tweets->save(), 900 ); //15 minutes
			}
		});

		add_action( 'figtwit_before', function() {
			echo '<ul>';
		});

		add_action( 'figtwit_after', function() {
			echo '</ul>';
		});

		add_action( 'figface_before', function() {
			echo '<ul>';
		});

		add_action( 'figface_after', function() {
			echo '</ul>';
		});

	}
}