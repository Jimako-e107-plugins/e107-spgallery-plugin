<?php

/**
 * e107 website system
 *
 * Copyright (C) 2008-2012 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * @file
 * Render gallery pages.
 */
 
require_once(__DIR__.'/../../class2.php');

if(!e107::isInstalled('spgallery'))
{
	e107::redirect();
	exit;
}

e107_require_once(e_PLUGIN . 'spgallery/includes/gallery_load.php');

// [PLUGINS]/gallery/languages/[LANGUAGE]/[LANGUAGE]_front.php
e107::lan('spgallery', false, true);

e107::css('spgallery', 'css/gallery.css');

// Load prettyPhoto settings and files.
gallery_load_prettyphoto();

// @see: Issue #2938 Missing pagetitle in case of default urls.
if (!class_exists('plugin_gallery_index_controller') && !deftrue('e_PAGETITLE'))
{
	define('e_PAGETITLE', LAN_PLUGIN_GALLERY_TITLE);
}

require_once(HEADERF);

/**
 * Class gallery.
 */
class spgallery
{

	private $catList = array();

	function __construct()
	{
		 
		$where  = " gallery_class IN (" . USERCLASS_LIST . ") ";
 		$where .= " AND gallery_active=1 ORDER BY gallery_order ";

		$this->catList =  e107::getDb()->retrieve('gallery', "*",$where, true, 'gallery_sef');

		if((vartrue($_GET['cat'])) && isset($this->catList[$_GET['cat']]))
		{
			$cat = $this->catList[$_GET['cat']];
			$this->showImages($cat);
		}
		else
		{
			$this->listCategories();
		}
	}


	/**
	 * Convert legacy template from ['list_start'] etc. to ['list']['start']
	 * @return array|string
	 */
	private function getTemplate()
	{
		$template = e107::getTemplate('spgallery', 'gallery');

		return $template;
	}

	function listCategories()
	{

		$template = $this->getTemplate();
		$template = array_change_key_case($template);
		$sc = e107::getScBatch('spgallery', true);
 
		$sc->breadcrumb();
 
		$text = e107::getParser()->parseTemplate($template['cat']['start'], true, $sc);

		foreach($this->catList as $val)
		{
			$sc->setVars($val);
			$text .= e107::getParser()->parseTemplate($template['cat']['item'], true, $sc);
		}

		$text .= e107::getParser()->parseTemplate($template['cat']['end'], true, $sc);

		$caption = e107::getParser()->parseTemplate($template['cat']['caption'], true, $sc);

		e107::getRender()->tablerender($caption, $text);
	}


	function showImages($gallery = NULL)
	{
 
		$cat       = $gallery['gallery_sef'];
		$plugPrefs = e107::getPlugConfig('spgallery')->getPref();
		$mes       = e107::getMessage();
		$tp        = e107::getParser();
		$template  = $this->getTemplate();
		$template  = array_change_key_case($template);
		$sc        = e107::getScBatch('spgallery', true);


		// -----------------------------------------------------------------
		// 1. Pagination settings
		// -----------------------------------------------------------------

		$where = "WHERE  image_gallery = ". $gallery['gallery_id']  . " AND `image_active`=1 ";
		$list =  e107::getDb()->retrieve('gallery_image', "*", $where, true ) ;
		$totalImages = count($list);
 
		$perPage     = max(1, varset($plugPrefs['perpage'], 12));
		// 1-based page number
		$currentPage = max(1, intval($_GET['page'] ?? 1));

		// SQL offset
		$offset = ($currentPage - 1) * $perPage;

		// values for shortcode
		$sc->total   = $totalImages;                 // total RECORDS (used only for calculating pages internally)
		$sc->amount  = $perPage;
		$sc->page    = $currentPage;                 // <-- important for your own shortcode
		$sc->from    = $offset;                      // <-- correct offset for getImages()

		$sc->curCat = $gallery;
  
		$sc->breadcrumb();

		$orderBy = varset($plugPrefs['orderby'], 'image_order DESC');

		$where = "WHERE  image_gallery = ". $gallery['gallery_id']  . " AND `image_active`=1 ";
	    $where  .= " ORDER BY " . $orderBy;	
		$where  .= " LIMIT ". $sc->from. " ,".$sc->amount;	

		$list =  e107::getDb()->retrieve('gallery_image', "*", $where, true ) ;
		//$list = e107::getMedia()->getImages($cat, $sc->from, $sc->amount, null, $orderBy);  
		$catname = $tp->toHTML($this->catList[$cat]['gallery_title'], false, 'defs');
 
		$inner = "";

		foreach($list as $row)
		{
 			$row['gallery_title'] = $gallery['gallery_title'];
			$row['gallery_sef'] = $gallery['gallery_sef'];
			$sc->setVars($row);
			$inner .= $tp->parseTemplate($template['list']['item'], true, $sc);
		}

		$text = $tp->parseTemplate($template['list']['start'], true, $sc);
		$text .= $inner;
		$text .= $tp->parseTemplate($template['list']['end'], true, $sc);

		$caption = $tp->parseTemplate($template['list']['caption'], true, $sc);

		e107::getRender()->tablerender($caption, $mes->render() . $text);

	}

}


new spgallery;

require_once(FOOTERF);
