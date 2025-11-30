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
	protected $table			= 'gallery';
	protected $pid				= 'gallery_id';
	protected $perPage			= 10;
	protected $batchDelete		= true;
	protected $batchExport     = true;
	protected $batchCopy		= true;

	//	protected $sortField		= 'somefield_order';
	//	protected $sortParent      = 'somefield_parent';
	//	protected $treePrefix      = 'somefield_title';

	//	protected $tabs				= array('tab1'=>'Tab 1', 'tab2'=>'Tab 2'); // Use 'tab'=>'tab1'  OR 'tab'=>'tab2' in the $fields below to enable. 

	//protected $listQry      	= "SELECT a. *, CASE WHEN a.gallery_parent = 0 THEN a.gallery_order ELSE b.gallery_order + (( a.gallery_order)/1000) END AS Sort FROM `#spg__categories` AS a LEFT JOIN `#spg__categories` AS b ON a.gallery_parent = b.gallery_id "; // Example Custom Query. LEFT JOINS allowed. Should be without any Order or Limit.

	///protected $listOrder		= 'Sort,gallery_order ';

	protected $fields 		= array(
		'checkboxes'             => array('title' => '', 'type' => null, 'data' => null, 'width' => '5%', 'thclass' => 'center', 'forced' => 'value', 'class' => 'center', 'toggle' => 'e-multiselect', 'readParms' => [], 'writeParms' => [],),
		'gallery_id'             => array('title' => LAN_ID, 'type' => 'number', 'data' => 'int', 'width' => '5%', 'readParms' => [],),
		'gallery_title'          => array('title' => SPG_JS_NAME, 'type' => 'method', 'data' => 'safestr', 'readParms' => [], 'writeParms' => [], 'thclass' => 'left',),
		'gallery_image'   		 => array('title' => LAN_IMAGE, 'type' => 'image', 'data' => 'safestr',  'readParms' => 'thumb=80x80', 'writeParms' => [], 'thclass' => 'left',),
		'gallery_summary'        => array('title' => SPG_JS_SUMMARY, 'type' => 'textarea', 'data' => 'safestr', 'readParms' => [], 'writeParms' => [], 'thclass' => 'left',),
		'gallery_description'    => array('title' => SPG_JS_DESCRIPTION, 'type' => 'bbarea', 'data' => 'str', 'width' => '40%', 'readParms' => [], 'writeParms' => [], 'thclass' => 'left',),
		'gallery_active'         => array('title' => SPG_JS_ACTIVE, 'type' => 'boolean', 'data' => 'int', 'batch' => true, 'inline' => true, 'readParms' => [], 'writeParms' => [], 'thclass' => 'left',),
		'gallery_order'          => array('title' => LAN_ORDER, 'type' => 'number', 'data' => 'int', 'readParms' => [], 'writeParms' => [], 'thclass' => 'left',),
		'gallery_created'        => array('title' => SPG_CG_CREATED, 'type' => 'datestamp', 'data' => 'int', 'readParms' => [], 'writeParms' => [], 'thclass' => 'left',),
		'gallery_sef'            => array('title' => LAN_SEFURL, 'type' => 'text', 'data' => 'safestr', 'readParms' => [],),
		'gallery_class'            => array('title' => LAN_VISIBILITY, 'type' => 'userclass', 'data' => 'safestr', 'readParms' => [],),	
		'options'                 => array('title' => LAN_OPTIONS, 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => 'value', 'readParms' => [], 'writeParms' => [],),
	);

	protected $fieldpref = array('gallery_parent', 'gallery_image', 'gallery_title', 'gallery_summary', 'gallery_active', 'gallery_order', 'gallery_sef');


	public function init()
	{
		$this->postFilterMarkup = $this->AddButton();

		//$this->fields['gallery_title']['writeParms']['size'] = "block-level"; method
		 
		$this->fields['gallery_summary']['writeParms']['size'] = "block-level";
		$this->fields['gallery_description']['writeParms']['size'] = "tiny";  //large, medium, small
		$this->fields['gallery_description']['writeParms']['template'] = "admin";
 
		$this->fields['gallery_description']['readParms'] = "expand=...&truncate=50&bb=1";
		$this->fields['gallery_sef']['writeParms']['sef'] = "gallery_title";
 
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
		$text .=            '<a href="' . e_SELF . '?mode=' . $mode . '&action=create" class="btn batch e-hide-if-js btn-success"><span>'. SPG_MAN_BTN_NEWGALLERY.'</span></a>';
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
