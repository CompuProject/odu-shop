<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if(!empty($arResult['ID']))
{
	?><div class="cont"><?
		?><div id="rt-utility"><?
			?><div class="rt-container"><?
				?><div class="clear"></div><?
			?></div><?
		?></div><?
		?><div id="rt-main" class="mb8-sa4"><?
			?><div class="rt-container"><?
				?><div class="rt-containerInner"><?
					?><div class="rt-grid-12"><?
						?><div class="rt-block"><?
							?><div id="rt-mainbody"><?
								?><div class="component-content"><?
									?><span id="startOfPageId69"></span><?
									?><div id="k2Container" class="itemView blog"><?
										?><div class="componentheading blog"><?
											?><h2><?=$arResult['NAME'];?></h2><?
										?></div><?
										?><div class="itemImageBlock" style="width:46px"><?
											?><span class="itemImage image-wrapper"><?
											?><a class="modal img" rel="{handler: 'image'}" href="<?=$arResult['PREVIEW_PICTURE']['SRC'];?>" title="<?=GetMessage("T_LODIO_ZOOM")?>"><?
											?><img src="<?=$arResult['PREVIEW_PICTURE']['SRC'];?>" width="46" height="31" alt="Image" style="visibility: visible; opacity: 1;"><?
											?><span class="zoom-icon" style="opacity: 0; top: -50%;"></span><?
											?><strong></strong></a><?
											?></span><?
											?><div class="clr"></div><?
										?></div><?
										?><div class="itemHeader"><?
											?><h4 class="itemTitle"><?=$arResult['NAME'];?></h4><?
										?></div><?
										?><div class="itemBody"><?
											?><div class="itemIntroText"><?
												?><p><strong><?=$arResult['PREVIEW_TEXT']?></strong></p><?
											?></div><?
											?><div class="itemFullText"><?
												?><p><?=$arResult['DETAIL_TEXT'];?></p><?
											?></div><?
											?><div class="clr"></div><?
											?><div class="clr"></div><?
										?></div><?
										?><div class="clr"></div><?
										?><div class="clr"></div><?
									?></div><?
								?></div><?
							?></div><?
						?></div><?
					?></div><?
					?><div class="clear"></div><?
				?></div><?
			?></div><?
		?></div><?
	?></div><?
}?>