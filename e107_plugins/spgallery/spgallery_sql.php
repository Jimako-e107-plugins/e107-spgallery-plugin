 CREATE TABLE `gallery` (
 `gallery_id` INT(10) NOT NULL auto_increment,
 `gallery_category` INT(11) NOT NULL DEFAULT '0',
 `gallery_title` VARCHAR(254) NOT NULL DEFAULT '',
 `gallery_summary` VARCHAR(254) NOT NULL DEFAULT '',
 `gallery_description` TEXT NOT NULL,
 `gallery_folder` VARCHAR(12) NOT NULL DEFAULT '',
 `gallery_active` TINYINT(1) NOT NULL DEFAULT '0',
 `gallery_created` int(10) unsigned NOT NULL default '0',
 `gallery_sef` varchar(250) default NULL,
 `gallery_class` int(5) default '0',
 `gallery_image` varchar(255) NOT NULL default '',
 `gallery_order` INT(4) NOT NULL DEFAULT '0',
 PRIMARY KEY (`gallery_id`)
 ) ENGINE=InnoDB;


CREATE TABLE `gallery_image` (
 `image_id` INT(10) NOT NULL auto_increment,
 `image_caption` VARCHAR(254) NOT NULL DEFAULT '',
 `image_gallery` INT(11) NOT NULL DEFAULT '0',
 `image_url` VARCHAR(254) NOT NULL DEFAULT '',
 `image_summary` VARCHAR(254) NOT NULL DEFAULT '',
 `image_description` TEXT NOT NULL,
 `image_active` TINYINT(1) NOT NULL DEFAULT '0',
 `image_order` INT(4) NOT NULL DEFAULT '0',
 `image_created` int(10) unsigned NOT NULL default '0',
 PRIMARY KEY (`image_id`)
 ) ENGINE=InnoDB;
 
 
 
 