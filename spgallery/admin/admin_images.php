<?php

// Generated e107 Plugin Admin Area 

require_once('../../../class2.php');
if (!getperms('P')) 
{
	e107::redirect('admin');
	exit;
}

require_once("admin_menu.php");
 
class galleries_ui extends e_admin_ui
{

	protected $pluginTitle		= LAN_PLUGIN_GALLERY_TITLE;
	protected $pluginName		= 'spgallery';
	//	protected $eventName		= 'spgallery-spg__categories'; // remove comment to enable event triggers in admin. 		
	protected $table			= 'gallery_image';
	protected $pid				= 'image_id';
	protected $perPage			= 10;
	protected $batchDelete		= true;
	protected $batchExport      = true;
	protected $batchCopy		= true;

	protected $fields 		= array (
		'checkboxes'              => array ( 'title' => '', 'type' => null, 'data' => null, 'width' => '5%', 'thclass' => 'center', 'forced' => 'value', 'class' => 'center', 'toggle' => 'e-multiselect', 'readParms' => [], 'writeParms' => [],),
		'image_id'                => array ( 'title' => LAN_ID, 'type' => 'number', 'data' => 'int', 'width' => '5%', 'help' => '', 'readParms' => [], 'writeParms' => [], 'class' => 'left', 'thclass' => 'left',),
		'image_caption'           => array ( 'title' => LAN_CAPTION, 'type' => 'text', 'data' => 'safestr', 'width' => 'auto', 'inline' => true, 'help' => '', 'readParms' => [], 'writeParms' => [], 'class' => 'left', 'thclass' => 'left',),
		'image_gallery'           => array ( 'title' => SPG_JS_GALLERY, 'type' => 'dropdown', 'data' => 'int', 'width' => 'auto', 'help' => '', 'readParms' => [], 'writeParms' => [], 'class' => 'left', 'thclass' => 'left', 'filter' => false, 'batch' => false,),
		'image_url'              => array ( 'title' =>  LAN_IMAGE, 'type' => 'image', 'data' => 'safestr', 'width' => 'auto', 'help' => '', 'readParms' => 'thumb=80x80', 'writeParms' => [], 'class' => 'left', 'thclass' => 'left',),
		'image_summary'           => array ( 'title' => LAN_TITLE, 'type' => 'textarea', 'data' => 'safestr', 'width' => 'auto', 'inline' => true, 'help' => '', 'readParms' => [], 'writeParms' => [], 'class' => 'left', 'thclass' => 'left',),
		'image_description'       => array ( 'title' => LAN_DESCRIPTION, 'type' => 'bbarea', 'data' => 'str', 'width' => '40%', 'help' => '', 'readParms' => [], 'writeParms' => [], 'class' => 'left', 'thclass' => 'left',),
		'image_active'            => array ( 'title' => LAN_ACTIVE, 'type' => 'boolean', 'data' => 'int', 'width' => 'auto', 'help' => '', 'readParms' => [], 'writeParms' => [], 'class' => 'left', 'thclass' => 'left',),
		'image_order'             => array ( 'title' => LAN_ORDER, 'type' => 'number', 'data' => 'int', 'width' => 'auto', 'help' => '', 'readParms' => [], 'writeParms' => [], 'class' => 'left', 'thclass' => 'left',),
		'image_created'           => array ( 'title' => SPG_CG_CREATED, 'type' => 'datestamp', 'data' => 'int', 'width' => 'auto', 'help' => '', 'readParms' => [], 'writeParms' => [], 'class' => 'left', 'thclass' => 'left',),
		'options'                 => array ( 'title' => LAN_OPTIONS, 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => 'value', 'readParms' => [], 'writeParms' => [],),
	);	

	protected $fieldpref = array('image_id', 'image_caption', 'image_gallery', 'image_url', 'image_active', 'image_order' );


	public function init()
	{
		$this->postFilterMarkup = $this->AddButton();

		//$this->fields['gallery_title']['writeParms']['size'] = "block-level"; method
		$this->fields['image_caption']['writeParms']['size'] = "block-level"; 
		$this->fields['image_summary']['writeParms']['size'] = "block-level";
		$this->fields['image_description']['writeParms']['size'] = "tiny";  //large, medium, small
		$this->fields['image_description']['writeParms']['template'] = "admin";
 
		$this->fields['image_description']['readParms'] = "expand=...&truncate=50&bb=1";

		// === POPULATE image_gallery DROPDOWN FROM DATABASE ===
		$galleryOptions = array(0 => '-- ' . SPG_JS_SELECT_NONE . ' --');

		$sql = e107::getDb();
		$rows = $sql->retrieve('gallery', "*", ' WHERE TRUE ORDER BY gallery_title', true, 'gallery_id');
	
		foreach($rows AS $row)
		{
		  $galleryOptions[$row['gallery_id']] = $row['gallery_title'];
		}

		// Apply to both Edit/Create form AND filter dropdown in list
		$this->fields['image_gallery']['writeParms']['optArray'] = $galleryOptions;
		$this->fields['image_gallery']['readParms']['optArray']  = $galleryOptions;	
 
	}

	function AddButton()
	{
		$mode = $this->getRequest()->getMode();

		$text = "</fieldset>
					</form>
					<div class='e-container'>
						<table  style='" . ADMIN_WIDTH . "' class='table adminlist table-striped'>
							<tr>
								<td>";
		$text .=            '<a href="' . e_SELF . '?mode=' . $mode . '&action=create" class="btn batch e-hide-if-js btn-success"><span>'. SPG_MAN_BTN_NEWIMAGE.'</span></a>';
		$text .= "		</td>
							</tr>
						</table>
					</div>
					<form>
						<fieldset>";
		return $text;
	}

	public function beforeCreate($new_data, $old_data)
	{
		if (empty($new_data['gallery_sef']))
		{
			$new_data['gallery_sef'] = eHelper::title2sef($new_data['gallery_title']);
		}
		else
		{
			$new_data['gallery_sef'] = eHelper::secureSef($new_data['gallery_sef']);
		}

		$sef = e107::getParser()->toDB($new_data['gallery_sef']);

		if (e107::getDb()->count('news_category', '(*)', "gallery_sef='$sef'"))
		{
			e107::getMessage()->addError(LAN_NEWS_65);
			return false;
		}

		if (empty($new_data['gallery_order']))
		{
			$c = e107::getDb()->count('spg__categories');
			$new_data['gallery_order'] = $c ? $c : 0;
		}

		$new_data['gallery_created'] = time();

		return $new_data;
	}

	 
}

class galleries_form_ui extends e_admin_form_ui
{

	// Custom Method/Function 
	function gallery_parent($curVal, $mode)
	{
		switch ($mode)
		{
			case 'read': // List Page
				if ($curVal == 0)
				{
					return SPG_JS_SELECT_NONE;
				}
				else
				{
					return e107::getDb()->retrieve('spg__categories', 'gallery_title', 'gallery_id=' . intval($curVal));
				}
				break;

			case 'write': // Edit Page
				$sql = e107::getDb();
				$sql->select("spg__categories", "gallery_id, gallery_title", "gallery_parent='0' ORDER BY gallery_order ASC");
				$tmp = array(0 => SPG_JS_SELECT_NONE);
				while ($row = $sql->fetch())
				{
					$tmp[$row['gallery_id']] = $row['gallery_title'];
				}
				return $this->select('gallery_parent', $tmp, $curVal);
				break;
		}

		return null;
	}

	// Custom Method/Function 
	function gallery_title($curVal, $mode)
	{
		switch ($mode)
		{
			case 'read': // List Page
				$parent = $this->getController()->getListModel()->get('gallery_parent');
				$text = $curVal;
				if ($parent != 0)
				{
					$text = "&nbsp;&nbsp;- " . $text;
				}
				return $text;
				break;

			case 'write': // Edit Page
				return $this->text('gallery_title', $curVal, 255, 'size=block-level');
				break;
		}

		return null;
	}
 
}
 
		
new spgallery_adminArea();

require_once(e_ADMIN."auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN."footer.php");
exit;
