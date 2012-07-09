<?php

$hp_mb = new WPAlchemy_MetaBox(array
(
	'id' => '_homelogo_page_meta',
	'title' => 'Footer Company Logos',
	'types' => array('page'), // added only for pages and to custom post type "events"
	'context' => 'normal', // same as above, defaults to "normal"
	'priority' => 'high', // same as above, defaults to "high"
	'template' => get_stylesheet_directory() . '/metaboxes/homelogo-page-meta.php'
));

/* eof */