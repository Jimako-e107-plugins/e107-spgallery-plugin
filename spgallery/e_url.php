<?php
/*
 * e107 Bootstrap CMS
 *
 * Copyright (C) 2008-2015 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * IMPORTANT: Make sure the redirect script uses the following code to load class2.php:
 *
 * 	if (!defined('e107_INIT'))
 * 	{
 * 		require_once(__DIR__.'/../../class2.php');
 * 	}
 *
 */

if (!defined('e107_INIT')) { exit; }

// v2.x Standard  - Simple mod-rewrite module.

class spgallery_url // plugin-folder + '_url'
{
	function config()
	{
		$config = array();

		$config['gallery'] = array(
			'regex'			=> '^^gallery(?:\/([\w-]+))?(?:\/)?(?:\?.*)?$', 						// matched against url, and if true, redirected to 'redirect' below.
			'alias'         => 'gallery',
			'sef'			=> '{alias}/{gallery_sef}/', 							// used by e107::url(); to create a url from the db table.
			'redirect'		=> '{e_PLUGIN}spgallery/gallery.php?cat=$1$2'
		);


		$config['index'] = array(
		 	'regex'			=> '^gallery/?$', 						// matched against url, and if true, redirected to 'redirect' below.
			'alias'         => 'gallery',
			'sef'			=> '{alias}/', 							// used by e107::url(); to create a url from the db table.
			'redirect'		=> '{e_PLUGIN}spgallery/gallery.php' 
		);


		return $config;
	}



}
