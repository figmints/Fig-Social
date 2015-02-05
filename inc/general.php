<?php 
namespace FigSocial\Inc;

class FigSocialGeneral {
	
	public function linkify( $text ) {
  	$text = preg_replace('#@([\\d\\w]+)#', '<a target="_blank" href="http://twitter.com/$1">$0</a>', $text);//converts hashtags to clickable links
		$text = preg_replace('/#([\\d\\w]+)/', '<a target="_blank" href="http://twitter.com/search?q=%23$1">$0</a>', $text);//converts @username to links
  	return $text;
  }

  public function createPost( $postData ) {

  	$image = $postData->image;
  	$link = $postData->link;
  	$content = $postData->content;

  	$post = '';

  	if ( $link ) {
  		$post .= '<a href="' . esc_url( $link ) . '" class="fb_post_link" target="_blank">';
  	}

  	if ( $image ) {
  		$post .= '<img src="' . $image . '" class="fb_post_img">';
  		if ( $link ) {
  			$post .= '</a>';
  		}
  	}

  	if ( $content ) {
  		$post .= '<p>' . $content . '</p>';
  	}

  	if ( $link && !$image ) {
  		$post .= '</a>';
  	}

  	return $post;

  }

}