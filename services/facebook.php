<?php
namespace FigSocial\service;

class FigSocialFacebook {
	
	protected static $appId = '335519799984159';
	protected static $appSecret = 'c80f8a98880feb5a6c6e4abb84697426';

	public static $endpoint = 'https://graph.facebook.com/v2.1/';

	public function get_posts() {

		$username = get_field( 'facebook_username', 'options' );

		$count = apply_filters( 'fig_facebook_count', 10 );

		$url = add_query_arg(
			array(
				'access_token' => self::$appId . '|' . self::$appSecret,
				'fields' => 'feed.limit(' . $count . ').include_hidden(false)',
			),
			self::$endpoint . $username
		);

		$response = wp_remote_get( $url );

		if ( !is_wp_error( $response ) ) {
			$r = wp_remote_retrieve_body($response);
			return $r;
		}

	}

	private function map_obj( $posts ) {

		$post = array();
		$post['content'] = ( isset( $posts->message ) )      ? $posts->message      : '';
		$post['image']   = ( isset( $posts->picture ) )      ? $posts->picture      : '';
		$post['link']    = ( isset( $posts->link ) )         ? $posts->link         : '';
		$post['type']    = ( isset( $posts->type ) )         ? $posts->type         : '';
		$post['date']    = ( isset( $posts->created_time ) ) ? $posts->created_time : '';

		if ( $post['content'] || $post['image'] ) {
			return (object) $post;
		} else {
			return;
		}

	}

	public function save() {

		$posts = json_decode($this::get_posts());
		$processedPosts = array();
		foreach ( $posts->feed->data as $post ) {
			$postObj = $this::map_obj( $post );
			if ( $postObj ) {
				$processedPosts[] = $postObj;
			}
		}

		return $processedPosts;

	}

}


?>