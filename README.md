#Fig Twitter Widget
This is the home of the official figmints twitter widget WordPress plugin. 

##Add a template
To add your own template to override the default front end view, simply create a directory called "overrides" in your theme folder, and then a folder called "twitter" in the overrides folder. You can then place any php file you want in there, and the widget will pull in that file instead of the default one. Take a look at the defualt template in views/front_end.php for a starting point. The template file will then get pulled into the widget options on the admin screen in a dropdown. Just select your custom template there and it will be pulled in on the frontend. 

##Adjust the number of tweets retrieved
We are using transients in WordPress to cache the retrieved tweet data in the database. By default we are grabbing 10 of them. If you need to increase or decrease this number for whatever reason, just use the filter for it. 
```
add_filter( 'fig_tweet_count', 'adjust_tweet_count' );
function adjust_tweet_count( $args ) {
	$args = 30;
}
```

##Adjust markup before and after template
There is some markup in the plugin before it grabs the template file, so if you want to override that container simply use the provided hook. By default there is a `<ul>` before the template and a `</ul>` after. 
```
add_action( 'figtwit_before', 'adjust_before' );
function adjust_before() {
	echo '<div>';
}

add_action( 'figtwit_after', 'adjust_after' );
function adjust_after() {
	echo '</div>';
}