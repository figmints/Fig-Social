<?php
namespace FigSocial\service;

class FigSocialTwitter {

	protected static $endpoint = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
	protected static $consumerKey = 'Htly8vttySJ6xj3cMaLm6qrwQ';
	protected static $consumerSecret = 'YZolGF641QmgB8SulyhVEz0djohk9bfF15E4dS9uL8feMhIB3o';
	protected static $accessToken = '506782653-oqlhkESVk4DW1ilxN5JuWIYUOH9h6KWWwqpdtjNJ';
	protected static $accessTokenSecret = '3Vm1m0ZpSAVxF38CHroD7Zejwp4yHsF7q0LMeK2o2w735';

	private function get_tweets() {
		require_once( dirname(dirname(__FILE__)) . "/twitteroauth/twitteroauth/twitteroauth.php");

		$username = get_field( 'twitter_handle', 'options' );

		$connection = new \TwitterOAuth( self::$consumerKey, self::$consumerSecret, self::$accessToken, self::$accessTokenSecret );

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
		$tweet['content']       = ( isset( $tweets->text ) )                    ? $tweets->text : '';
		$tweet['date']          = ( isset( $tweets->created_at ) )              ? $tweets->created_at : '';
		$tweet['profile_image'] = ( isset( $tweets->user->profile_image_url ) ) ? $tweets->user->profile_image_url : '';

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