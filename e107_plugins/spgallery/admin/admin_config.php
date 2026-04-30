<?php

// Generated e107 Plugin Admin Area 

require_once('../../../class2.php');
if (!getperms('P')) {
	e107::redirect('admin');
	exit;
}

require_once("admin_menu.php");

class galleries_ui extends e_admin_ui
{

	protected $pluginTitle		= LAN_PLUGIN_GALLERY_TITLE;
	protected $pluginName		= 'spgallery';


	protected $fields 		= array();


	protected $preftabs        = array(SPG_CG_GENERAL, SPG_CG_CATEGORY_PAGE,  LAN_GALLERY_ADMIN_03, LAN_GALLERY_ADMIN_32);
	protected $prefs = array(
		'page_title'		=> array('title' => SPG_PREFS_NAME, 'tab' => 0, 'type' => 'text', 'data' => 'str', 'help' => '', 'writeParms' => []),
		'display_title'		=> array('title' => SPG_PREFS_DISPLAYTITLE, 'tab' => 0, 'type' => 'boolean', 'data' => 'str', 'help' => '', 'writeParms' => []),
		'thumbnails'		=> array('title' => SPG_PREFS_THUMB, 'nolabel' => 1, 'tab' => 1, 'type' => 'method', 'data' => 'array',   'writeParms' => []),
		'images'		=> array('title' => SPG_PREFS_IMAGE, 'tab' => 1, 'type' => 'method', 'data' => 'array',   'writeParms' => []),
	    'perrow'		=> array('title' => SPG_PREFS_PERROW, 'tab' => 1, 'type' => 'radio', 'data' => 'str', 'help' => '', 'writeParms' => []),
		'perpage'		=> array('title' => SPG_PREFS_PERPAGE, 'tab' => 1, 'type' => 'radio', 'data' => 'str', 'help' => LAN_GALLERY_ADMIN_21, 'writeParms' => []),
		'page_description'		=> array('title' => SPG_PREFS_DESCRIPTION, 'tab' => 0, 'type' => 'bbarea', 'data' => 'str', 'help' => SPG_PREFS_DESCRIPTION_HELP, 'writeParms' => []),

		'display_breadcrumbs' => array(
			'title' => SPG_CG_DISPLAY_BREADCRUMBS,
			'tab' => 0,
			'type' => 'boolean',
			'data' => 'str',
			'help' => SPG_CG_DISPLAY_BREADCRUMBS_HELP,
			'writeParms' => []
		),
		'downloadable'               => array(
			'title' => LAN_GALLERY_ADMIN_08,
			'tab'   => 0,
			'type'  => 'boolean',
			'data'  => 'int',
			'help'  => LAN_GALLERY_ADMIN_09,
		),
		'orderby'                    => array(
			'title'      => LAN_GALLERY_ADMIN_22,
			'tab'        => 1,
			'type'       => 'dropdown',
			'data'       => 'str',
			'writeParms' => array(
				'optArray' => array(
					'image_id ASC'       => LAN_GALLERY_ADMIN_23,
					'image_id DESC'      => LAN_GALLERY_ADMIN_24,
					'image_caption ASC'     => LAN_GALLERY_ADMIN_25,
					'image_caption DESC'    => LAN_GALLERY_ADMIN_26
				),
			),
		),
		'slideshow_category'         => array(
			'title' => LAN_GALLERY_ADMIN_10,
			'tab'     => 2,
			'type'  => 'dropdown',
			'data'  => 'str',
			'help'  => LAN_GALLERY_ADMIN_11,
		),
		'slideshow_duration'         => array(
			'title' => LAN_GALLERY_ADMIN_12,
			'type'  => 'number',
			'tab'     => 2,
			'data'  => 'integer',
			'help'  => LAN_GALLERY_ADMIN_13,
		),
		'slideshow_auto'             => array(
			'title' => LAN_GALLERY_ADMIN_14,
			'type'  => 'boolean',
			'tab'     => 2,
			'data'  => 'integer',
			'help'  => LAN_GALLERY_ADMIN_15,
		),
		'slideshow_freq'             => array(
			'title' => LAN_GALLERY_ADMIN_16,
			'type'  => 'number',
			'tab'     => 2,
			'data'  => 'integer',
			'help'  => LAN_GALLERY_ADMIN_17,
		),
		'slideshow_effect'           => array(
			'title' => LAN_GALLERY_ADMIN_18,
			'type'  => 'dropdown',
			'tab'     => 2,
			'data'  => 'str',
			'help'  => LAN_GALLERY_ADMIN_19
		),
		'pp_global'                  => array(
			'title'      => LAN_GALLERY_ADMIN_70,
			'type'       => 'boolean',
			'data'       => 'int',
			'tab'     =>    3,
		),
		'pp_hook'                    => array(
			'title'      => LAN_GALLERY_ADMIN_71,
			'type'       => 'text',
			'data'       => 'str',
			'writeParms' => array(
				'default' => 'data-gal',
			),
			'tab'     =>    3,
		),
		'pp_animation_speed'         => array(
			'title'      => LAN_GALLERY_ADMIN_33,
			'type'       => 'dropdown',
			'data'       => 'str',
			'writeParms' => array(
				'optArray' => array(
					'fast'   => LAN_GALLERY_ADMIN_62,
					'slow'   => LAN_GALLERY_ADMIN_63,
					'normal' => LAN_GALLERY_ADMIN_64,
				),
			),
			'tab'     =>    3,
		),
		'pp_slideshow'               => array(
			'title'      => LAN_GALLERY_ADMIN_34,
			'type'       => 'text',
			'data'       => 'int',
			'writeParms' => array(
				'default' => 5000,
			),
			'tab'     =>    3,
		),
		'pp_autoplay_slideshow'      => array(
			'title'      => LAN_GALLERY_ADMIN_35,
			'type'       => 'boolean',
			'data'       => 'int',
			'tab'     =>    3,
		),
		'pp_opacity'                 => array(
			'title'      => LAN_GALLERY_ADMIN_36,
			'help'       => LAN_GALLERY_ADMIN_37,
			'type'       => 'text',
			'data'       => 'float',
			'writeParms' => array(
				'default' => 0.80,
			),
			'tab'     =>    3,
		),
		'pp_show_title'              => array(
			'title'      => LAN_GALLERY_ADMIN_38,
			'type'       => 'boolean',
			'data'       => 'int',
			'tab'     =>    3,
		),
		'pp_allow_resize'            => array(
			'title'      => LAN_GALLERY_ADMIN_39,
			'help'       => LAN_GALLERY_ADMIN_40,
			'type'       => 'boolean',
			'data'       => 'int',
			'tab'     =>    3,
		),
		'pp_default_width'           => array(
			'title'      => LAN_GALLERY_ADMIN_41,
			'type'       => 'text',
			'data'       => 'int',
			'writeParms' => array(
				'default' => 500,
			),
			'tab'     =>    3,
		),
		'pp_default_height'          => array(
			'title'      => LAN_GALLERY_ADMIN_42,
			'type'       => 'text',
			'data'       => 'int',
			'writeParms' => array(
				'default' => 344,
			),
			'tab'     =>    3,
		),
		'pp_counter_separator_label' => array(
			'title'      => LAN_GALLERY_ADMIN_43,
			'help'       => LAN_GALLERY_ADMIN_44,
			'type'       => 'text',
			'data'       => 'str',
			'writeParms' => array(
				'default' => '/',
			),
			'tab'     =>    3,
		),
		'pp_theme'                   => array(
			'title'      => LAN_THEME,
			'type'       => 'dropdown',
			'data'       => 'str',
			'writeParms' => array(
				'optArray' => array(
					'pp_default'    => LAN_DEFAULT,
					'light_rounded' => LAN_GALLERY_ADMIN_65,
					'dark_rounded'  => LAN_GALLERY_ADMIN_66,
					'light_square'  => LAN_GALLERY_ADMIN_67,
					'dark_square'   => LAN_GALLERY_ADMIN_68,
					'facebook'      => LAN_GALLERY_ADMIN_69,
				),
			),
			'tab'     =>    3,
		),
		'pp_horizontal_padding'      => array(
			'title'      => LAN_GALLERY_ADMIN_46,
			'help'       => LAN_GALLERY_ADMIN_47,
			'type'       => 'text',
			'data'       => 'int',
			'writeParms' => array(
				'default' => 20,
			),
			'tab'     =>    3,
		),
		'pp_hideflash'               => array(
			'title'      => LAN_GALLERY_ADMIN_48,
			'help'       => LAN_GALLERY_ADMIN_49,
			'type'       => 'boolean',
			'data'       => 'int',
			'tab'     =>    3,
		),
		'pp_wmode'                   => array(
			'title'      => LAN_GALLERY_ADMIN_50,
			'help'       => LAN_GALLERY_ADMIN_51,
			'type'       => 'text',
			'data'       => 'str',
			'writeParms' => array(
				'default' => 'opaque',
			),
			'tab'     =>    3,
		),
		'pp_autoplay'                => array(
			'title'      => LAN_GALLERY_ADMIN_52,
			'type'       => 'boolean',
			'data'       => 'int',
			'tab'     =>    3,
		),
		'pp_modal'                   => array(
			'title'      => LAN_GALLERY_ADMIN_53,
			'help'       => LAN_GALLERY_ADMIN_54,
			'type'       => 'boolean',
			'data'       => 'int',
			'tab'     =>    3,
		),
		'pp_deeplinking'             => array(
			'title'      => LAN_GALLERY_ADMIN_55,
			'help'       => LAN_GALLERY_ADMIN_56,
			'type'       => 'boolean',
			'data'       => 'int',
			'tab'     =>    3,
		),
		'pp_overlay_gallery'         => array(
			'title'      => LAN_GALLERY_ADMIN_57,
			'help'       => LAN_GALLERY_ADMIN_58,
			'type'       => 'boolean',
			'data'       => 'int',
			'tab'     =>    3,
		),
		'pp_keyboard_shortcuts'      => array(
			'title'      => LAN_GALLERY_ADMIN_59,
			'help'       => LAN_GALLERY_ADMIN_60,
			'type'       => 'boolean',
			'data'       => 'int',
			'tab'     =>    3,
		),
		'pp_ie6_fallback'            => array(
			'title'      => LAN_GALLERY_ADMIN_61,
			'type'       => 'boolean',
			'data'       => 'int',
			'tab'     =>    3,
		),

	);


	public function init()
	{

		$this->prefs['page_title']['writeParms']['size'] = "block-level";
		$perrow = array( 2 => 2, 3 => 3, 4 => 4, 6 => 6 );

		$this->prefs['perrow']['writeParms']['optArray'] = $perrow;
		//6,12,24,36,48,60,72,84,96,"all"
		$perpage = array(6 => 6, 12 => 12, 24 => 24, 36 => 36, 60 => 60, 72 => 72, 84 => 84, 96 => 96, 'all' => 'all');
		$this->prefs['perpage']['writeParms']['optArray'] = $perpage;


		$effects = array(
			'scrollHorz' => LAN_GALLERY_ADMIN_29,
			'scrollVert' => LAN_GALLERY_ADMIN_30,
			'fade'       => LAN_GALLERY_ADMIN_31,
		);

 
		$categories =  e107::getDb()->retrieve('gallery', "gallery_id, gallery_title",null, true, 'gallery_id');
        
		foreach($categories as $k => $var)
		{	 
			$cats[$k] = $var['gallery_title'];
		}

		$this->prefs['slideshow_effect']['writeParms'] = $effects;
		$this->prefs['slideshow_effect']['readParms'] = $effects;

		$this->prefs['slideshow_category']['writeParms'] = $cats;

	}



	// left-panel help menu area. (replaces e_help.php used in old plugins)
	// public function renderHelp()
	// {
	// 	$caption = LAN_HELP;
	// 	$text = 'Some help text';

	// 	return array('caption' => $caption, 'text' => $text);
	// }
}

class galleries_form_ui extends e_admin_form_ui
{

	function images($curVal, $mode)
	{

		switch ($mode) {
			case 'write': // Edit Page

				$thumbnailPrefs = is_array($curVal) ? $curVal : ['width' => 1920, 'height' => 1920, 'crop' => 1];

				// Thumbnail Size
				$spg_prefs  = "<table class='table adminform'>";
				$spg_prefs .= "<tr>";
				$spg_prefs .= "<td class='forumheader2' width='25%'>" . SPG_PREFS_IMAGE . ":<div class='smalltext'>" . SPG_PREFS_IMAGE_HELP . "</div></td>";
				$spg_prefs .= "<td class='forumheader3'>";
				$spg_prefs .= $this->text('images[width]', $thumbnailPrefs["width"], 4, 'size=4');

				$spg_prefs .=  " x ";
				$spg_prefs .= $this->text('images[height]', $thumbnailPrefs["height"], 4, 'size=4');


				$spg_prefs .= "</tr>";

				// Thumbnail Crop
				$spg_prefs .= "<tr>";
				$spg_prefs .= "<td class='forumheader2' width='25%'>" . SPG_PREFS_IMAGECROP . ":<div class='smalltext'>" . SPG_PREFS_IMAGECROP_HELP . "</div></td>";
				$spg_prefs .= "<td class='forumheader3'>";
				$spg_prefs .=  $this->renderElement("images[crop]",  $thumbnailPrefs["crop"], array('type' => 'boolean'));
				$spg_prefs .=  "</td>";
				$spg_prefs .= "</tr>";
				$spg_prefs .= "</table>";
				//$text = $this->text('thumbnails', $curVal, 255, 'size=large');
				return $spg_prefs;
				break;
		}

		return null;
	}

	function thumbnails($curVal = array(), $mode)
	{

		// Ensure $curVal is an array with default values if empty or not an array
		$thumbnailPrefs = is_array($curVal) ? $curVal : ['width' => 100, 'height' => 100, 'crop' => 1];

		switch ($mode) {
			case 'write': // Edit Page
				// Thumbnail Size
				$spg_prefs  = "<table class='table adminform'>";
				$spg_prefs .= "<tr>";
				$spg_prefs .= "<td class='forumheader2' width='25%'>" . SPG_PREFS_THUMB . ":<div class='smalltext'>" . SPG_PREFS_THUMB_HELP . "</div></td>";
				$spg_prefs .= "<td class='forumheader3'>";
				$spg_prefs .= $this->text('thumbnails[width]', $thumbnailPrefs['width'], 4, 'size=4');

				$spg_prefs .=  " x ";
				$spg_prefs .= $this->text('thumbnails[height]', $thumbnailPrefs["height"], 4, 'size=4');


				$spg_prefs .= "</tr>";

				// Thumbnail Crop
				$spg_prefs .= "<tr>";
				$spg_prefs .= "<td class='forumheader2' width='25%'>" . SPG_PREFS_THUMBCROP . ":<div class='smalltext'>" . SPG_PREFS_THUMBCROP_HELP . "</div></td>";
				$spg_prefs .= "<td class='forumheader3'>";
				$spg_prefs .=  $this->renderElement("thumbnails[crop]",  $thumbnailPrefs["crop"], array('type' => 'boolean'));
				$spg_prefs .=  "</td>";
				$spg_prefs .= "</tr>";
				$spg_prefs .= "</table>";
				//$text = $this->text('thumbnails', $curVal, 255, 'size=large');
				return $spg_prefs;
				break;
		}

		return null;
	}
}



new spgallery_adminArea();

require_once(e_ADMIN . "auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN . "footer.php");
exit;
