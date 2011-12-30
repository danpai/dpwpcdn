DP CDN Helper
===============

D(ifferent)P(lace) CDN Helper is a WordPress plugin to use CDNs as an alternative to local files.

Versions
--------
###Rel. 0.1
This version is released only for testing purposes. It can be used as long as you know what you are doing.

Known Issues
------------
###Rel. 0.1
* None

Prerequisites
-------------
* WordPress 2.5 or higher

Installation
------------
Copy the folder dpwpcdn and its content into 

	your-blog/wp-content/plugins

Usage
-----
Classic usage for CSS:

	<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/style.css"/>
	
Using plugin:

	<link rel="stylesheet" type="text/css" href="<?php echo get_cdn_host('css') ?>/style.css"/>
	
Classic usage for IMG:

	<img src="<?php bloginfo( 'template_directory' ); ?>/img/photo.png"/>
	
Using plugin:

	<img src="<?php echo get_cdn_host('img') ?>/img/photo.png"/>
	
Classic usage for JS:

	<script src="<?php bloginfo( 'template_directory' ); ?>/js/myscript.js" type="text/javascript"></script>
	
Using plugin:

	<script src="<?php echo get_cdn_host('js') ?>/js/myscript.js" type="text/javascript"></script>
	
In the *CDN Helper* option page you can setup all your URLs:

* CDN CSS URL
* CDN JS URL
* CDN IMG URL
* Default CSS URL (local on your server)
* Default JS URL (local on your server)
* Default IMG URL (local on your server)

It is also possible to choose if you want use default URLs or CDN URLs

License
-------
D(ifferent)P(lace) CDN Helper is released under the W3C Software Notice and License 

http://www.w3.org/Consortium/Legal/2002/copyright-software-20021231

By obtaining, using and/or copying this work, you (the licensee) agree that you have read, understood, and will comply with the following terms and conditions.

Permission to copy, modify, and distribute this software and its documentation, with or without modification, for any purpose and without fee or royalty is hereby granted, provided that you include the following on ALL copies of the software and documentation or portions thereof, including modifications:

* The full text of this NOTICE in a location viewable to users of the redistributed or derivative work.
* Any pre-existing intellectual property disclaimers, notices, or terms and conditions. If none exist, the W3C Software Short Notice should be included (hypertext is preferred, text is permitted) within the body of any redistributed or derivative code.
* Notice of any changes or modifications to the files, including the date changes were made. (We recommend you provide URIs to the location from which the code is derived.)

Author
------
List of authors:

* Danilo Paissan - danilo.paissan@differentplace.net