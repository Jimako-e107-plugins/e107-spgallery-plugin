<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2016 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * Templates for "gallery" plugin.
 */

/* --------------------------------------------------------------
   BOOTSTRAP DETECTION (keep exactly as you have it)
   -------------------------------------------------------------- */
$bs       = deftrue('BOOTSTRAP');
$isBs5    = ($bs === true || $bs === 5);
$isBs4    = ($bs === 4);
$isBs3    = ($bs === 2 || $bs === 3);
$isLegacy = !$bs;

/* --------------------------------------------------------------
   COMMON CLASSES (keep these – they are fine)
   -------------------------------------------------------------- */
$cardClass = $isBs5 ? 'card shadow-sm' : 'thumbnail';
$btnClass  = $isBs5 ? 'btn btn-outline-secondary' : 'btn btn-default';
$gx        = $isBs5 ? 'g-4' : '';

/* --------------------------------------------------------------
   READ PREFERENCE – images per row on large screens
   -------------------------------------------------------------- */
$plugPrefs = e107::getPlugConfig('gallery')->getPref();
$perRowLg  = max(2, min(6, (int)varset($plugPrefs['perrow'], 3)));   // 2-6 only
$lgWidth   = 12 / $perRowLg;                                        // 6,4,3,2

/* --------------------------------------------------------------
   BUILD RESPONSIVE COLUMN CLASSES
   -------------------------------------------------------------- */
if ($isBs5) {
    // BS5: mobile = 2 cols, large = $perRowLg cols
    $imageColClass = " col-lg-{$lgWidth}";
} else {
    // BS3/BS4: mobile = 2 cols, tablet = 3 cols, large = $perRowLg cols
    $imageColClass = "col-xs-6 col-sm-4 col-md-{$lgWidth}";
}


$GALLERY_TEMPLATE['list']['caption'] = '{GALLERY_CAPTION}';

$GALLERY_TEMPLATE['list']['start'] = '{GALLERY_BREADCRUMB}
<div class="row"> {MAIN_GALLERY_DESCRIPTION} </div>
<div class="row gallery-list ' . ($isBs5 ? 'g-4' : '') . '">';
 

$GALLERY_TEMPLATE['list']['item'] = '
    <div class="' . $imageColClass . ' mb-4">
        <div class="' . ($isBs5 ? 'card shadow-sm' : 'thumbnail') . ' h-100 hover-shadow">
            {GALLERY_IMAGE_THUMB: w=400&h=300&crop=1&class=' . ($isBs5 ? 'card-img-top' : 'img-responsive') . '}
            <div class="' . ($isBs5 ? 'card-body d-flex flex-column' : 'caption') . '">
                <h5 class="card-title mb-0">{GALLERY_IMAGE_CAPTION}</h5>
            </div>
        </div>
    </div>
';

$GALLERY_TEMPLATE['list']['end'] = '
</div>
<div class="text-center mt-4">
    <div class="gallery-list-nextprev d-inline-block">{GALLERY_NEXTPREV}</div>
    <div class="gallery-list-back d-inline-block ms-3">
        <a class="' . $btnClass . '" href="{GALLERY_BASEURL}">{LAN=BACK}</a>
    </div>
</div>
';

// Bootstrap3 Compatible.
$GALLERY_TEMPLATE['cat']['caption'] = '{MAIN_GALLERY_CAPTION}';

$GALLERY_TEMPLATE['cat']['start'] = '{GALLERY_BREADCRUMB}
<div class="row gallery-cat ' . $gx . '">';

$GALLERY_TEMPLATE['cat']['item']    = '
    <div class="' . ($isBs5 ? 'col-6 col-md-4 col-lg-3' : 'col-xs-6 col-sm-4') . ' mb-4">
        <a href="{GALLERY_CAT_URL}" class="text-decoration-none">
            <div class="' . $cardClass . ' h-100 text-center hover-shadow">
                {GALLERY_CAT_THUMB: w=400&h=300&crop=1&class=' . ($isBs5 ? 'card-img-top' : 'img-responsive') . '}
                <div class="card-body">
                    <h5 class="card-title">{GALLERY_CAT_TITLE}</h5>
                </div>
            </div>
        </a>
    </div>
';

$GALLERY_TEMPLATE['cat']['end'] = '
</div>
<style>
.gallery-cat h5 {
margin: 0 0 0 0;
}
</style>
';

// {GALLERY_SLIDESHOW=X}  X = Gallery Category. Default: 1 (ie. 'gallery_1') Overrides preference in admin. 
// {GALLERY_SLIDES=X}  X = number of items per slide. 
// {GALLERY_JUMPER=space} will remove numbers and just leave spaces. 

$GALLERY_TEMPLATE['slideshow_wrapper'] = '
<div id="gallery-slideshow-wrapper">
	<div id="gallery-slideshow-content">
		{GALLERY_SLIDES=4}
	</div>
</div>

<div class="gallery-slideshow-controls">
	<a href="#" class="gallery-control gal-next btn btn-sm btn-xs btn-default btn-secondary pull-right float-right">
		' . LAN_NEXT . ' {GLYPH=fa-chevron-right}
	</a>
	<a href="#" class="gallery-control gal-prev btn btn-sm btn-xs btn-default btn-secondary">
		{GLYPH=fa-chevron-left} ' . LAN_PREVIOUS . '
	</a>
	<span class="gallery-slide-jumper-container">
		{GALLERY_JUMPER}
	</span>
</div>
';

$GALLERY_TEMPLATE['slideshow_slide_item'] = '<span class="gallery-slide-item">{GALLERY_IMAGE_THUMB: w=150&h=120}</span>';

$GALLERY_TEMPLATE['prettyphoto']['content'] = '
<div class="pp_pic_holder">
	<div class="ppt">&nbsp;</div>
	<div class="pp_top">
		<div class="pp_left"></div>
		<div class="pp_middle"></div>
		<div class="pp_right"></div>
	</div>
	<div class="pp_content_container">
		<div class="pp_left">
			<div class="pp_right">
				<div class="pp_content">
					<div class="pp_loaderIcon"></div>
					<div class="pp_fade">
						<a href="#" class="pp_expand" title="'.LAN_EXPAND.'">'.LAN_EXPAND.'</a>
						<div class="pp_hoverContainer">
							<a class="pp_next" href="#">' . LAN_NEXT . '</a>
							<a class="pp_previous" href="#">' . LAN_PREVIOUS . '</a>
						</div>
						<div id="pp_full_res"></div>
						<div class="pp_details">
							<div class="pp_nav">
								<a href="#" class="pp_arrow_previous">' . LAN_PREVIOUS . '</a>
								<p class="currentTextHolder">0/0</p>
								<a href="#" class="pp_arrow_next">' . LAN_NEXT . '</a>
							</div>
							<p class="pp_description"></p>
							{pp_social}
							<a class="pp_close" href="#">' . LAN_CLOSE . '</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="pp_bottom">
		<div class="pp_left"></div>
		<div class="pp_middle"></div>
		<div class="pp_right"></div>
	</div>
</div>
<div class="pp_overlay"></div>
';

$GALLERY_TEMPLATE['prettyphoto']['gallery_item'] = '
<div class="pp_gallery">
	<a href="#" class="pp_arrow_previous">' . LAN_PREVIOUS . '</a>
	<div>
		<ul>
			{gallery}
		</ul>
	</div>
	<a href="#" class="pp_arrow_next">' . LAN_NEXT . '</a>
</div>
';

$GALLERY_TEMPLATE['prettyphoto']['image_item'] = '
<img id="fullResImage" src="{path}" />
';

$GALLERY_TEMPLATE['prettyphoto']['flash_item'] = '
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{width}" height="{height}">
	<param name="wmode" value="{wmode}" />
	<param name="allowfullscreen" value="true" />
	<param name="allowscriptaccess" value="always" />
	<param name="movie" value="{path}" />
	<embed src="{path}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="{width}" height="{height}" wmode="{wmode}"></embed>
</object>
';

$GALLERY_TEMPLATE['prettyphoto']['quicktime_item'] = '
<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" height="{height}" width="{width}">
	<param name="src" value="{path}">
	<param name="autoplay" value="{autoplay}">
	<param name="type" value="video/quicktime">
	<embed src="{path}" height="{height}" width="{width}" autoplay="{autoplay}" type="video/quicktime" pluginspage="http://www.apple.com/quicktime/download/"></embed>
</object>
';

$GALLERY_TEMPLATE['prettyphoto']['iframe_item'] = '
<iframe src ="{path}" width="{width}" height="{height}" frameborder="no"></iframe>
';

$GALLERY_TEMPLATE['prettyphoto']['inline_item'] = '
<div class="pp_inline">{content}</div>
';

$GALLERY_TEMPLATE['prettyphoto']['custom_item'] = '';

$GALLERY_TEMPLATE['prettyphoto']['social_item'] = '
<div class="pp_social">
	<div class="twitter">
		<a href="http://twitter.com/share" class="twitter-share-button" data-count="none">' . LAN_SHARE . '</a>
		<script src="http://platform.twitter.com/widgets.js"></script>
	</div>
	<div class="facebook">
		<iframe src="http://www.facebook.com/plugins/like.php?locale=en_US&href=\'+location.href+\'&amp;layout=button_count&amp;show_faces=true&amp;width=500&amp;action=like&amp;font&amp;colorscheme=light&amp;height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:23px;" allowTransparency="true"></iframe>
	</div>
</div>
';



$GALLERY_TEMPLATE['portfolio'] = $GALLERY_TEMPLATE['list']; 

$GALLERY_TEMPLATE['portfolio']['start'] = ' 
<div class="row gallery-list ' . ($isBs5 ? 'g-4' : '') . '">';
 
 