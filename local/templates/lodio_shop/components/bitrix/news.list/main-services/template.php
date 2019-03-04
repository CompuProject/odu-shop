<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (!empty($arResult))
{
	?><div id="rt-feature"><?
		?><div class="rt-container"><?
			foreach($arResult['ITEMS'] as $arItem)
			{
				?><div class="rt-grid-4 rt-alpha"><?
					?><div class="blocks"><?
						?><div class="rt-block"><?							
							?><div class="module-title"><?
								?><h2 class="title"><?=$arItem['NAME'];?></h2><?
							?></div><?
							?><div class="k2ItemsBlock blocks"><?
								?><ul><?
									?><li class="even lastItem"><?									 
										?><div class="moduleItemIntrotext"><?
											if ($arItem['PICTURE_SRC'])
											{
												?><img src="<?=$arItem['PICTURE_SRC'];?>" width="<?=$arItem['PICTURE_WIDTH'];?>" height="<?=$arItem['PICTURE_HEIGHT'];?>" alt="<?=$arItem['NAME']?>"/><?
											}
											?><p class="b-custom-text"><?=$arItem['PREVIEW_TEXT'];?></p><?
										?></div><?
										?><div class="clr"></div><?
									?></li><?
								?></ul><?
							?></div><?
						?></div><?
					?></div><?
				?></div><?
			}
			?><div class="clear"></div><?
		?></div><?
	?></div><?
}