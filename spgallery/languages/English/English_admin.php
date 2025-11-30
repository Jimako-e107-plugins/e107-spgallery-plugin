<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2016 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * Language file for "gallery" plugin.
 */

define("LAN_GALLERY_ADMIN_01", "[x] is active. Simply import and assign images to the gallery categories using the [y]");
//define("LAN_GALLERY_ADMIN_02", "General");//LAN_GENERAL
define("LAN_GALLERY_ADMIN_03", "Slideshow Menu");
define("LAN_GALLERY_ADMIN_04", "Image Max. Width");
define("LAN_GALLERY_ADMIN_05", "Images will be auto-resized if greater than the width given here");
define("LAN_GALLERY_ADMIN_06", "Image Max. Height");
define("LAN_GALLERY_ADMIN_07", "Images will be auto-resized if greater than the height given here");
define("LAN_GALLERY_ADMIN_08", "Show \"download\" link");
define("LAN_GALLERY_ADMIN_09", "A download option will be shown next to the popup caption");
define("LAN_GALLERY_ADMIN_10", "Slideshow category");
define("LAN_GALLERY_ADMIN_11", "Images from this category will be used in the sliding menu.");
define("LAN_GALLERY_ADMIN_12", "Slide duration");
define("LAN_GALLERY_ADMIN_13", "The duration (in seconds) of a full jump.");
define("LAN_GALLERY_ADMIN_14", "Slide auto-start");
define("LAN_GALLERY_ADMIN_15", "When enabled image-rotation begins automatically when the page is loaded.");
define("LAN_GALLERY_ADMIN_16", "Slide frequency");
define("LAN_GALLERY_ADMIN_17", "When auto-start is enabled, this dictates how long a slides stays put before the next jump.");
define("LAN_GALLERY_ADMIN_18", "Slide effect");
define("LAN_GALLERY_ADMIN_19", "Type of effect.");
define("LAN_GALLERY_ADMIN_20", "Images per page");
define("LAN_GALLERY_ADMIN_21", "Number of images to be shown per page");
define("LAN_GALLERY_ADMIN_22", "Order images by");
define("LAN_GALLERY_ADMIN_23", "Media ID ASC");
define("LAN_GALLERY_ADMIN_24", "Media ID DESC");
define("LAN_GALLERY_ADMIN_25", "Media Name ASC");
define("LAN_GALLERY_ADMIN_26", "Media Name DESC");
define("LAN_GALLERY_ADMIN_27", "Media Caption ASC");
define("LAN_GALLERY_ADMIN_28", "Media Caption DESC");
define("LAN_GALLERY_ADMIN_29", "slide left");
define("LAN_GALLERY_ADMIN_30", "slide down");
define("LAN_GALLERY_ADMIN_31", "fade");

define("LAN_GALLERY_ADMIN_32", "prettyPhoto settings");
define("LAN_GALLERY_ADMIN_33", "Animation speed");
define("LAN_GALLERY_ADMIN_34", "Slideshow: Interval time");
define("LAN_GALLERY_ADMIN_35", "Slideshow: Autoplay");
define("LAN_GALLERY_ADMIN_36", "Opacity");
define("LAN_GALLERY_ADMIN_37", "Value between 0 and 1.");
define("LAN_GALLERY_ADMIN_38", "Show title");
define("LAN_GALLERY_ADMIN_39", "Allow resize");
define("LAN_GALLERY_ADMIN_40", "Resize the photos bigger than viewport.");
define("LAN_GALLERY_ADMIN_41", "Default width");
define("LAN_GALLERY_ADMIN_42", "Default height");
define("LAN_GALLERY_ADMIN_43", "Counter separator label");
define("LAN_GALLERY_ADMIN_44", "The separator for the gallery counter 1 \"of\" 2");
//define("LAN_GALLERY_ADMIN_45", "Theme");//LAN_THEME
define("LAN_GALLERY_ADMIN_46", "Horizontal padding");
define("LAN_GALLERY_ADMIN_47", "The padding on each side of the picture.");
define("LAN_GALLERY_ADMIN_48", "Hide flash");
define("LAN_GALLERY_ADMIN_49", "Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto.");
define("LAN_GALLERY_ADMIN_50", "Wmode");
define("LAN_GALLERY_ADMIN_51", "Set the flash wmode attribute.");
define("LAN_GALLERY_ADMIN_52", "Autoplay videos");
define("LAN_GALLERY_ADMIN_53", "Modal close");
define("LAN_GALLERY_ADMIN_54", "If set to true, only the close button will close the window.");
define("LAN_GALLERY_ADMIN_55", "Deep-linking");
define("LAN_GALLERY_ADMIN_56", "Allow prettyPhoto to update the url to enable deep-linking.");
define("LAN_GALLERY_ADMIN_57", "Overlay gallery");
define("LAN_GALLERY_ADMIN_58", "If set to true, a gallery will overlay the fullscreen image on mouse over.");
define("LAN_GALLERY_ADMIN_59", "Keyboard shortcuts");
define("LAN_GALLERY_ADMIN_60", "Set to false if you open forms inside prettyPhoto.");
define("LAN_GALLERY_ADMIN_61", "IE6 fallback");

define("LAN_GALLERY_ADMIN_62", "fast");
define("LAN_GALLERY_ADMIN_63", "slow");
define("LAN_GALLERY_ADMIN_64", "normal");

define("LAN_GALLERY_ADMIN_65", "Light rounded");
define("LAN_GALLERY_ADMIN_66", "Dark rounded");
define("LAN_GALLERY_ADMIN_67", "Light square");
define("LAN_GALLERY_ADMIN_68", "Dark square");
define("LAN_GALLERY_ADMIN_69", "Facebook");

define("LAN_GALLERY_ADMIN_70", "Load prettyPhoto globally");
define("LAN_GALLERY_ADMIN_71", "prettyPhoto attribute (hook)");

//// ADMIN - MENU ///////////////////////////////////////////////

define("SPG_MENU_TITLE", LAN_PLUGIN_GALLERY_TITLE . " - Options");
define("SPG_MENU_MANAGE", "Manage Gallery ");
define("SPG_MENU_MANAGE_001", "Manage Categories");
define("SPG_MENU_MANAGE_002", "Manage Galleries");
define("SPG_MENU_MANAGE_003", "Manage Images");
define("SPG_MENU_PREFS", "Preferences");

//// ADMIN - MANAGEMENT /////////////////////////////////////////

define("SPG_MAN_TITLE", LAN_PLUGIN_GALLERY_TITLE . " - Management");
define("SPG_MAN_TREELIST", "Categories & Galleries");
define("SPG_MAN_IMAGELIST", "Gallery Images");
define("SPG_MAN_IMAGELIST_HELP", "Drag & drop images here to upload. Click on image to edit. Drag images to order.");
define("SPG_MAN_BTN_NEWGALLERY", "New Gallery");
define("SPG_MAN_BTN_NEWIMAGE", "New Image");


//// ADMIN - PREFERENCES ////////////////////////////////////////

define("SPG_PREFS_TITLE", LAN_PLUGIN_GALLERY_TITLE . " - Preferences");
define("SPG_PREFS_SAVED", "Preferences Successfully Saved");
define("SPG_PREFS_NAME", "Gallery Title");
define("SPG_PREFS_DISPLAYTITLE", "Display Title");
define("SPG_PREFS_THUMB", "Thumbnail Size");
define("SPG_PREFS_THUMB_HELP", "Resize thumbnails to (width) x (height)");
define("SPG_PREFS_THUMBCROP", "Crop Thumbnails");
define("SPG_PREFS_THUMBCROP_HELP", "Resize thumbnails and crop or just resize");
define("SPG_PREFS_IMAGE", "Images Size");
define("SPG_PREFS_IMAGE_HELP", "Resize Images to (width) x (height)");
define("SPG_PREFS_IMAGECROP", "Crop Images");
define("SPG_PREFS_IMAGECROP_HELP", "Resize images and crop or just resize");
define("SPG_PREFS_PERROW", "Thumbnails Per Row");
define("SPG_PREFS_PERPAGE", "Thumbnails Per Page");
define("SPG_PREFS_DESCRIPTION", "Welcome Text");
define("SPG_PREFS_DESCRIPTION_HELP", "Displays on the first Page");
define("SPG_PREFS_BTNSAVE", "Save Preferences");

//// JS - MANAGEMENT ////////////////////////////////////////////

define("SPG_JS_NAME", "Name");
define("SPG_JS_CATEGORY", "Category");
define("SPG_JS_SUMMARY", "Summary");
define("SPG_JS_DESCRIPTION", "Description");
define("SPG_JS_ACTIVE", "Active");
 
define("SPG_JS_SELECT_NONE", "None");
define("SPG_JS_RENAME", "Rename File");
define("SPG_JS_GALLERY", "Gallery");

define("SPG_JS_CONFIRMDELETE", "These items will be permanently deleted and cannot be recovered. Are you sure?");

define("SPG_JS_BTN_DELETEGALLERY", "Delete Gallery");
define("SPG_JS_DELETEGALLERYTITLE", "Confirm Deletion of Gallery");

define("SPG_JS_BTN_DELETECATGEORY", "Delete Category");
define("SPG_JS_DELETECATEGORYTITLE", "Confirm Deletion of Category");

define("SPG_JS_BTN_SAVEIMAGE", "Save Image");
define("SPG_JS_EDITIMAGETITLE", "Edit Image Details");

define("SPG_JS_BTN_DELETEIMAGE", "Delete Image");
define("SPG_JS_DELETEIMAGETITLE", "Confirm Deletion of Image");

define("SPG_JS_FILEUPLOADTITLE", "File Upload Progress");
define("SPG_JS_FILEUPLOADHELP", "% upload of file ");

/////////////////////////////////////////////////////////////////

define("SPG_CG_CREATED", "Created");
define("SPG_CG_FRONTEND_PAGE", "Frontend Page");
define("SPG_CG_CATEGORY_PAGE", "Category Page");
define("SPG_CG_GENERAL", "General");

define("SPG_CG_DISPLAY_BREADCRUMBS", "Display Breadcrumbs");
define("SPG_CG_DISPLAY_BREADCRUMBS_HELP", "Set this off if your theme uses magic shortcode in gallery layout");

