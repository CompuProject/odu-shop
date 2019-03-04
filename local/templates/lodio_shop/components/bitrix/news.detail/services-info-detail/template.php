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
											?><h1><?=$arResult['NAME'];?></h1><?
										?></div><?
										if ($arResult['PICTURE_SRC'])
										{
											?><div class="itemImageBlock"><?
												?><span class="itemImage image-wrapper"><?
														?><img src="<?=$arResult['PICTURE_SRC'];?>" width="<?=$arResult['PICTURE_WIDTH'];?>" height="<?=$arResult['PICTURE_HEIGHT'];?>" alt="<?=$arResult['NAME'];?>" style="visibility: visible; opacity: 1;"><?
														?><span class="zoom-icon" style="opacity: 0; top: -50%;"></span><?
													?><strong></strong><?
												?></span><?
												?><div class="clr"></div><?
											?></div><?
										}
										?><div class="itemBody"><?
											?><div class="itemIntroText"><?										
												?><p class="b-custom-text"><?=$arResult['PREVIEW_TEXT']?></p><?
											?></div><?
											?><div class="itemFullText"><?
												?><p class="b-custom-text"><?=$arResult['DETAIL_TEXT'];?></p><?
											?></div><?	
										?></div><?							
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
}