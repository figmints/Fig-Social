<?php
/*
Plugin Name: Fig Social
Plugin URI: https://github.com/figmints/Fig-Social
Description: Social plugin.
Author: Ryan Kanner @ Figmints Delicious Design
Version: 1.0.1
Author Email: ryan@figmints.com
License: GPL v2 or newer
*/

require_once( 'inc/get.php' );
require_once( 'controller.php' );
require_once( 'inc/widget.php' );
require_once( 'inc/fields.php' );
require_once( 'inc/general.php' );

\FigTwit\controller::i()->add_actions();