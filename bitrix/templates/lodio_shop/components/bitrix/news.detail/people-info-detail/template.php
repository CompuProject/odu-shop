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
								?><div class="component-content"> <?                               
									?><span id="startOfPageId69"></span><?
									?><div id="k2Container" class="itemView blog"><?
										?><div class="componentheading blog"><?
											?><h2><?=$arResult['NAME'];?></h2><?
										?></div><?
										if ($arResult['PICTURE_SRC'])
										{
											?><div class="itemImageBlock"><?
												?><span class="itemImage image-wrapper"><?
													?><img src="<?=$arResult['PICTURE_SRC']?>" width="<?=$arResult['PICTURE_WIDTH']?>" height="<?=$arResult['PICTURE_HEIGHT']?>" alt="<?=$arResult['NAME'];?>" title="<?=$arResult['NAME'];?>" style="visibility: visible; opacity: 1;"><?
												?></span><?
											?></div><?												
										}
										?><div class="itemHeader"><?
											?><h4 class="itemTitle"><?=$arResult['PROPERTIES']['POSITION']['VALUE'];?></h4><?                                       
										?></div><?
										
										?><div class="itemBody"><?
											?><div class="itemIntroText"><?
												?><p class="b-custom-text"><strong><?=$arResult['PREVIEW_TEXT']?></strong></p><?
											?></div><?
											?><div class="itemFullText"><?
												?><p class="b-custom-text"><?=$arResult['DETAIL_TEXT'];?></p><?
												if ($arResult['PROPERTIES']['PHONE']['VALUE'])
												{
													?><p><?=GetMessage("T_LODIO_PHONE")?><?=$arResult['PROPERTIES']['PHONE']['VALUE'];?></p><?
												}
												if ($arResult['PROPERTIES']['EMAIL']['VALUE'])
												{
													?><p><?=GetMessage("T_LODIO_EMAIL")?><a href="mailto:<?=$arResult['PROPERTIES']['EMAIL']['VALUE'];?>"><?=$arResult['PROPERTIES']['EMAIL']['VALUE'];?></a></p><?
												}												
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