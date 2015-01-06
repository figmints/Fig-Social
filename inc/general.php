<?php 
namespace FigTwit\Inc;

class FigTwitGeneral {
	
	function linkify($text) {
  	$text = preg_replace('#@([\\d\\w]+)#', '<a target="_blank" href="http://twitter.com/$1">$0</a>', $text);//converts hashtags to clickable links
		$text = preg_replace('/#([\\d\\w]+)/', '<a target="_blank" href="http://twitter.com/search?q=%23$1">$0</a>', $text);//converts @username to links
  	return $text;
  }

}