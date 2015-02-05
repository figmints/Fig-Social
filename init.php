<?php
/*
Plugin Name: Fig Social
Plugin URI: https://github.com/figmints/Fig-Social
Description: Social plugin.
Author: Ryan Kanner @ Figmints Delicious Design
Version: 1.1.0
Author Email: ryan@figmints.com
License: GPL v2 or newer
*/

require_once( 'services/twitter.php' );
require_once( 'services/facebook.php' );
require_once( 'controller.php' );
require_once( 'inc/widget-twitter.php' );
require_once( 'inc/widget-facebook.php' );
require_once( 'inc/fields.php' );
require_once( 'inc/general.php' );

\FigSocial\controller::i()->add_actions();