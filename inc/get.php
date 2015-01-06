<?php
namespace FigTwit\Inc;

class FigTwit_Get {

	protected static $endpoint = 'https://api.twitter.com/1.1/statuses/user_timeline.json';

	private function get_tweets() {
		require_once( dirname(dirname(__FILE__)) . "/twitteroauth/twitteroauth/twitteroauth.php");

		$consumerkey = get_field( 'consumer_key', 'options' );
		$consumersecret = get_field( 'consumer_secret', 'options' );
		$accesstoken = get_field( 'access_token', 'options' );
		$accesstokensecret = get_field( 'access_token_secret', 'options' );
		$username = get_field( 'twitter_handle', 'options' );

		$connection = new \TwitterOAuth( $consumerkey, $consumersecret, $accesstoken, $accesstokensecret );

		$count = apply_filters( 'fig_tweet_count', 10 );
		$url = add_query_arg(
				array( 
					'screen_name' => $username,
					'count' => $count,
				),
				self::$endpoint
			);

		return $tweets = $connection->get($url);
	}

	private function map_obj( $tweets ) {
		$tweet = array();
		$tweet['content']      = ( isset( $tweets->text ) )       ? $tweets->text : '';
		$tweet['date']         = ( isset( $tweets->created_at ) ) ? $tweets->created_at : '';

		return (object) $tweet;
	}

	public function save() {
		$tweets = $this::get_tweets();
		$processedTweets = array();

		foreach ( $tweets as $tweet ) {
			$tweetObj = $this::map_obj( $tweet );
			$processedTweets[] = $tweetObj;
		}
		return $processedTweets;
	}

}


?>