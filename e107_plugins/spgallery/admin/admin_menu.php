<?php

/**
 * Class plugin_gallery_admin.
 */


e107::lan('spgallery', true, true);


class spgallery_adminArea extends e_admin_dispatcher
{

    protected $modes = array(

        'main'    => array(
            'controller'     => 'galleries_ui',
            'path'             => null,
            'ui'             => 'galleries_form_ui',
            'uipath'         => null
        ),

 
        'gallery'    => array(
            'controller'     => 'galleries_ui',
            'path'             => null,
            'ui'             => 'galleries_form_ui',
            'uipath'         => null
        ),


        'images'    => array(
            'controller'     => 'galleries_ui',
            'path'             => null,
            'ui'             => 'galleries_form_ui',
            'uipath'         => null
        ),
  
    );


    protected $adminMenu = array(
       
 
        'gallery/list'            => array('caption' => SPG_MENU_MANAGE_002, 'perm' => 'P', 'url' => 'admin_galleries.php'),


        'images/list'            => array('caption' => SPG_MENU_MANAGE_003, 'perm' => 'P', 'url' => 'admin_images.php'),
       
  'main/prefs'         => array('caption' => SPG_MENU_PREFS, 'perm' => 'P', 'url' => 'admin_config.php'),

        // 'main/div0'      => array('divider'=> true),
        // 'main/custom'		=> array('caption'=> 'Custom Page', 'perm' => 'P'),

    );

    protected $adminMenuAliases = array(
        'main/edit'    => 'main/list'
    );

    protected $menuTitle = SPG_MENU_TITLE;
}
